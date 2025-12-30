<?php 
/**
 * 
 * @package PluginPackage
 *
 */

namespace Inc;

final class Init{

    // function for calling classes in plugin 
    public static function get_actions(){
        return [
            Pages\FVController::class,
            Base\Frontend::class,
            Base\Enqueue::class,
        ];
    }

    // loop for calling function register in every class
    public static function register_actions(){
        foreach(self::get_actions() as $class):
            $service = self::instanciate($class);
            if(method_exists($service, 'register')):
                $service->register();
            endif;
        endforeach;
    }

    // to make object for all classes
    public static function instanciate($class){
        return new $class;
    }
}