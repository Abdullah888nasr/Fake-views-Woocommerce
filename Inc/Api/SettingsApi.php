<?php
/**
 * 
 * @package PluginPackage
 *
 */

namespace Inc\Api;

class SettingsApi{

    public $admin_pages = array();

    public $admin_subpages = array();

    public $settings = array();

    public $sections = array();

    public $fields = array();

    function register(){
        if(!empty($this->admin_subpages)){
            add_action('admin_menu', array($this, 'addAdminMenu'));
        }
        if(!empty($this->settings)){
            add_action('admin_init', array($this, 'registerCustomField'));
        }
    }
    function addAdminMenu(){
        foreach($this->admin_subpages as $page){
            add_submenu_page( $page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback']);
        }
    }

    function addSubPages($pages){
        $this->admin_subpages = array_merge($this->admin_subpages, $pages);
        return $this;
    }
    
    function registerCustomField(){
        foreach($this->sections as $section){
            add_settings_section( $section['id'], $section['title'], isset($section['callback'])?$section['callback'] : '', $section['page']);
        }
        foreach($this->fields as $field){
            add_settings_field( $field['id'], $field['title'], isset($field['callback'])?$field['callback'] : '', $field['page'], $field['section'], isset($field['args'])?$field['args'] : '' );
        }
        foreach($this->settings as $setting){
            register_setting( $setting['option_group'], $setting['option_name'], isset($setting['callback'])?$setting['callback'] : '' );
        }
    }

    function setSettings($settings_args){
        $this->settings = $settings_args;
        return $this;
    }

    function setSections($sections){
        $this->sections = $sections;
        return $this;
    }

    function setFields($fields){
        $this->fields = $fields;
        return $this;
    }
}