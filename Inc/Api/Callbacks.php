<?php
/**
 * 
 * @package PluginPackage
 *
 */

namespace Inc\Api;

use Inc\Base\BaseController;

class Callbacks extends BaseController{

    public function fakeViewsTemplate(){
        return require_once ("$this->plugin_path/inc/templates/fake-views-settings.php");
    }

    public function fakeViewsOptionGroup ($input){
        return $input;
    }

    public function fakeViewsSection (){
        
    }

    public function fakeViewsFieldInputNumber($args){
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $label = $args['label'];
        $value = isset(get_option($option_name)[$name])?get_option($option_name)[$name]:"";
        echo '<input type="text" class = "'.$classes.'" name="'.$option_name.'['.$name.']" value="'.$value.'" placeholder="Write '.$label.'">';
    }

    public function fakeViewsFieldSelector($args){
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $label = $args['label'];
        $value = isset(get_option($option_name)[$name])?get_option($option_name)[$name]:"";?>
        <select class = "<?php echo $classes;?>" name="<?php echo $option_name.'['.$name.']'?>" value="<?php echo $value; ?>">
            <option value="Before Add To Cart Button"<?php if('Before Add To Cart Button'===$value)echo'selected'?>>Before Add To Cart Button</option>
            <option value="After Add To Cart Button"<?php if('After Add To Cart Button'===$value)echo'selected'?>>After Add To Cart Button</option>
        </select>
        <?php
    }
}