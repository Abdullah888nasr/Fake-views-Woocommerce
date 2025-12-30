<?php
/**
 * 
 * @package PluginPackage
 *
 */

namespace Inc\Base;

class Uninstall{
    public static function uninstall(){
        global $wpdb;
        $table_prefix = $wpdb->prefix;
        echo "<script>";
        echo 'confirm("Do you want to delete data from database?")';
        $wpdb->query("DELETE FORM $table_prefix"."options WHERE option_name='woo-fv'");
        echo "</script>";
    }
}