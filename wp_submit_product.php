<?php
/**
 * Plugin Name:       افزونه ارسال محصولات سارشی
 * Plugin URI:        https://aimweb.ir
 * Description:      محصولی  هست برای ارسال سفارشی محصولات  از سمت کاربران و گرفتن و اعلام تاریخ و قیمت
 * Version:           1.0.0
 * Requires at least: 4.0
 * Requires PHP:      7.4
 * Author:            اسعد نظیفی
 * Author URI:        https://nazifi_22/
 * License:           GNU Public License v3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       wpsh
 * @package WPSH
 */

defined('ABSPATH')|| exit('NO ACCESS');


define('WPADS_DIR', trailingslashit(plugin_dir_path(__FILE__)));
define('WPADS_INC', trailingslashit(WPADS_DIR.'inc'));
define('WPADS_LIBS', trailingslashit(WPADS_DIR.'libs'));
define('WPADS_TPLS', trailingslashit(WPADS_DIR.'tpls'));
define('WPADS_URL',trailingslashit(plugin_dir_url(__FILE__)) );
define('WPADS_ASSETS',trailingslashit(WPADS_URL.'assets') );



// define main hooks

function wp_submit_product_active(){
    $options = get_option('wp_submit_options');
    if (empty($options)||(is_array($options) &&count($options ==0))){
        $options = array();
        update_option('wp_submit_options',$options);
    }
}

function wp_submit_product_deactive(){

}
register_activation_hook(__FILE__ , 'wp_submit_product_active');
register_deactivation_hook(__FILE__ , 'wp_submit_product_deactive');

//do include

if (is_admin()){
    if (!defined('DOING_AJAX')){
        include WPADS_INC.'admin_page.php';
        include WPADS_INC.'admin_menu.php';
    }
}
include WPADS_INC.'shurtcode.php';

add_action('wp_head', function (){
    if (isset($_GET['name'])){
        header('Location:index.php');

    }
});