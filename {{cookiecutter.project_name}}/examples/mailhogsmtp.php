<?php

/**
 * Mailhog SMTP
 *
 * A simple plugin to use Mailhog with WordPress for development.
 *
 * @wordpress-plugin
 * Plugin Name:       mailhogsmtp
 * Plugin URI:        https://www.billdeitrick.com
 * Description:       A simple plugin to use Mailhog with WordPress for development.
 * Version:           1.0.0
 * Author:            Bill Deitrick
 * Author URI:        https://www.billdeitrick.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function send_smtp_email( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host        = 'mailhog';
    $phpmailer->SMTPAuth    = false;
    $phpmailer->Port        = '1025';
    $phpmailer->From        = 'wordpress@localhost';
    $phpmailer->FromName    = 'WordPress';
}
add_action( 'phpmailer_init', 'send_smtp_email');