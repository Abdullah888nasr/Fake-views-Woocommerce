<?php
/**
 * 
 * @package PluginPackage
 *
 */

namespace Inc\Base;

class Frontend{
    function register(){
        $position = get_option('woo-fv')['position'];
        switch($position){
            case 'Before Add To Cart Button':
                add_action( 'woocommerce_before_add_to_cart_button', array($this, 'woo_fake_views'), 10);
            break;
            case 'After Add To Cart Button':
                add_action( 'woocommerce_after_add_to_cart_button', array($this, 'woo_fake_views'), 10);
            break;
        }
    }
    function woo_fake_views(){
        $low_range = get_option('woo-fv')['low_range'];
        $high_range = get_option('woo-fv')['high_range'];
        $current_visitor = rand($low_range, $high_range);
        echo "<div class='fake-view-text'>Current time <span class='rand-number'>$current_visitor</span> Visitors right now</div>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            .rand-number{
               background-color: <?php echo '#ddd';?>;
               padding: 3px 5px;
               color: <?php echo '#00f';?>;
            }
        </style>
    </head>
    <body></body>
</html>