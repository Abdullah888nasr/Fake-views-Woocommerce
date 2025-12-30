<?php
/**
 * 
 * @package PluginPackage
 *
 */

namespace Inc\Pages;

use Inc\Api\SettingsApi;

use Inc\Api\Callbacks;

class FVController{

    public $settings;

    public $callbacks;

    public $subPages = array();

    public function register(){

        $this->settings = new SettingsApi();

        $this->callbacks = new Callbacks();

		$this->setSettings();
		
		$this->setSections();

		$this->setFields();

		$this->setSubPages();
    }

    public function setSubPages(){
		$args = array(
			array(
				'parent_slug'=> 'options-general.php',
				'page_title' => 'Fake Views Plugin',
				'menu_title' => 'Fake Views Settings',
				'capability' => 'manage_options',
				'menu_slug'  => 'fake_views_settings',
				'callback'   =>  array($this->callbacks, 'fakeViewsTemplate'),
			)
		);
		$this->settings->addSubPages($args)->register();
	}

	public function setSettings(){
        $args = array(
            array(
                'option_group'=>'fake_views_option_group',
                'option_name'=>'woo-fv',
                'callback'=>array($this->callbacks, 'fakeViewsOptionGroup'),
            )
        );
        $this->settings->setSettings($args);
    }

    public function setSections(){
        $args = array(
            array(
                'id'=>'fake_views_section',
                'title'=>'Fake Views Settings',
                'callback'=>array($this->callbacks, 'fakeViewsSection'),
                'page'=>'options-general.php?page=fake_views_settings'
            ),
        );
        $this->settings->setSections($args);
    }

    public function setFields(){
        $args = array(
            array(
            'id'=>'low_range',
            'title'=>'Low Range',
            'callback'=>array($this->callbacks, 'fakeViewsFieldInputNumber'),
            'page'=>'options-general.php?page=fake_views_settings',
            'section'=>'fake_views_section',
            'args'=> array(
                    'option_name'=>'woo-fv',
                    'label_for'=>'low_range',
                    'class'=>'fv-low-range',
					'label'=>'Low Range',
                )
			),
			array(
				'id'=>'high_range',
				'title'=>'High Range',
				'callback'=>array($this->callbacks, 'fakeViewsFieldInputNumber'),
				'page'=>'options-general.php?page=fake_views_settings',
				'section'=>'fake_views_section',
				'args'=> array(
						'option_name'=>'woo-fv',
						'label_for'=>'high_range',
						'class'=>'fv-high-range',
						'label'=>'Low Range',
					)
                ),
            array(
                'id'=>'position',
                'title'=>'Position in Single Product',
                'callback'=>array($this->callbacks, 'fakeViewsFieldSelector'),
                'page'=>'options-general.php?page=fake_views_settings',
                'section'=>'fake_views_section',
                'args'=> array(
                        'option_name'=>'woo-fv',
                        'label_for'=>'position',
                        'class'=>'fv-position',
                        'label'=>'Position in Single Product',
                    )
                ),
        );
        $this->settings->setFields($args);
    }
}