<#
.SYNOPSIS
  Dump database from container to version control.

.DESCRIPTION
  This script uses `docker exec` to dump the database from the db container
  and add to version control. Run whenever there are updates to the database in the
  container that you wish to load into version control.
#>

Import-Module -Name "$PSScriptRoot\helpers.psm1"

$container_id = Find-DatabaseContainerID
$db_root_password = Get-DatabaseRootPassword

docker exec -w /var/db $container_id sh -c "mysqldump -u root -p$db_root_password wordpress > db.sql"