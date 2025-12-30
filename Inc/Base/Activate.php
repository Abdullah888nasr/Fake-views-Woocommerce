<?php
/**
 * 
 * @package PluginPackage
 *
 */

namespace Inc\Base;

class Activate{
    public static function activate(){
        if(!get_option('woo-fv')):
            $default = array(
                'lowValue'  => 20,
                'highValue' => 60,
                'colorBox'  => '#ddd',
                'fontSize'  => '16px',
            );
            add_option('woo-fv', $default);
        endif;
    }
}