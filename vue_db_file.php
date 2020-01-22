<?php
/*
Creating database table for Plugin
*/

global $jal_db_version;
$jal_db_version = '1.0';

function jal_install()
{
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . 'personalization';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id int(10) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00',
        text varchar(40),
        photo text,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    add_option('jal_db_version', $jal_db_version);
}
