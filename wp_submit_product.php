<?php
/**
 * Plugin Name:       افزونه ارسال محصولات سفارشی
 * Plugin URI:        https://aimweb.ir
 * Description:      افزونه ای است برای دریفات محصولی که در سایت نیست از سمت کاربر و تعین قیمت برای مشتری و  پرداخت کردن ان از سمت مشتری
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
    global $wpdb;
    $wpdb->query('CREATE TABLE `wp_submite_product` (
  `id` int(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  `name_product` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `name_product_decription` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `compane` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `count` int(50) NOT NULL,
  `quality` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `decription` text COLLATE utf8mb4_persian_ci NOT NULL,
  `url_product` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_persian_ci NOT NULL,
  `status` text COLLATE utf8mb4_persian_ci NOT NULL,
  `amunt` int(100) NOT NULL,
  `date` text COLLATE utf8mb4_persian_ci NOT NULL,
  `code_paement` int(250) NOT NULL,
  `amunt_secceful` int(11) NOT NULL
)');
    $wpdb->query('ALTER TABLE `wp_submite_product`ADD PRIMARY KEY (`id`)');
    $wpdb->query('ALTER TABLE `wp_submite_product`MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT');
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
    if (isset($_POST['submit_product_wp'])){
   require_once WPADS_INC."fun_add_form_in_databes.php";


    }
    require_once WPADS_DIR."zarinpal/request.php";

});