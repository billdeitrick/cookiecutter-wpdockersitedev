#! /usr/bin/env php

<?php

$args = getopt("d:u:s:h:");

foreach ( array("d", "u", "s", "h") as $option ) {
    if ( !array_key_exists($option, $args) ) {
        print("Example command line: php clean_uploads.php -d \"/opt/db/db.sql\" -u \"/var/www/html/wp-content/uploads\" -s \"/var/www/html/purged_images\" -h \"www.cwc.life\"");
        print("Required arguments:\n");
        print("-d Path to database dump.\n");
        print("-u Path to uploads directory.\n");
        print("-s Path to temp delete/staging directory.\n");
        print("-h Website hostname for pattern matching.");
        die;
    }
}

print("Supplied args:\n");
print_r($args);

$hostname = $args["h"];

print("Getting file extensions...\n");

$extensions = [];
$total_files = 0;

$it = new RecursiveDirectoryIterator($args["u"]);

foreach(new RecursiveIteratorIterator($it) as $file) {
    if ( strlen($file->getExtension()) > 0) {
        $extensions[$file->getExtension()] = null;
    }
    $total_files++;
}

print("Got " . sizeof($extensions) . " file extension(s).\n");

$extensions_string = implode("|", array_keys($extensions));

print("Searching for media objects...\n");

$fhandle = fopen($args["d"], "read");

$urls = [];

while( !feof($fhandle) ) {
    $line = fgets($fhandle);

    if (preg_match_all( "/$hostname\/wp-content\/uploads.*?\.($extensions_string)/", $line, $matches )) {
        foreach ( $matches[0] as $match ) {
            $urls[$match] = null; //use associative array as set
        }
    }
}

fclose($fhandle);

print("Found " . sizeof($urls) . " used objects.\n");

print("Relocating files...\n");

$processed_files = 0;
$relocated_files = 0;

$it = new RecursiveDirectoryIterator($args["u"]);

foreach(new RecursiveIteratorIterator($it) as $file) {
    $source_path = $file->getPath() . "/" . $file->getFilename();

    if ($file->isFile()) {
        $partial_path = explode("wp-content/uploads/", $source_path)[1];

        $web_path = "$hostname/wp-content/uploads/$partial_path";

        if ( !array_key_exists($web_path, $urls) ) {
            $destination_path = $args["s"] . "/" . $partial_path;

            $path_parts = explode("/", $destination_path);
            $containing_dir = implode("/", array_slice( $path_parts, 0, sizeof($path_parts) - 1));

            if ( !is_dir($containing_dir)) {
                mkdir($containing_dir, 0777, true);
            }

            rename($source_path, $destination_path);

            $relocated_files++;

        }

    }

    $processed_files++;

    print("Processed $processed_files of $total_files (Relocated $relocated_files), Analyzed: $source_path\n");

}

print("\n");

print("Done!\n");
