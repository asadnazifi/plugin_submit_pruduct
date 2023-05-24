<?php


function wp_add_edit_submit_product(){

    add_menu_page('ارسال محصولات سفارشی','ارسال محصولات سفارشی','manage_options','wp_submit_product_admin','wp_function_submit_product_admin_page');
    add_submenu_page('wp_submit_product_admin' , 'داشبورد','داشبورد','manage_options','wp_submenu_submit_product','wp_function_submit_product_admin_page');
}

add_action('admin_menu','wp_add_edit_submit_product');

