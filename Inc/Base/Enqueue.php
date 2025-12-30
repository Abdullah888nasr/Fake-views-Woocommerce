<?php 

/**
 * 
 * @package PluginPackage
 *
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class Enqueue extends BaseController{

    public function register(){
        // add_action('admin_enqueue_scripts', array($this, 'styles_fantasy'));
        // add_action('admin_enqueue_scripts', array($this, 'scripts_fantasy'));
        add_action('wp_enqueue_scripts', array($this, 'styles_fantasy'));
    }

    function styles_fantasy(){
        wp_enqueue_style('style-plugin', $this->plugin_url . 'assets/css/style.css');
    }

    function scripts_fantasy(){
        
    }
}