<?php


function wp_add_edit_submit_product(){

    add_menu_page('ارسال محصولات سفارشی','ارسال محصولات سفارشی','manage_options','wp_submit_product_admin','wp_function_submit_product_admin_page');
    add_submenu_page('wp_submit_product_admin' , 'پرداختی ها','پرداختی ها','manage_options','wp_submenu_submit_product','wp_function_submit_product_admin_page');
    add_submenu_page('wp_submit_product_admin' , 'در انتظار تعین قیمت','در انتظار تعین قیمت','manage_options','wp_submenu_submit_product_loding_amunt','wp_function_submit_product_loding_amunt_admin_page');
}

add_action('admin_menu','wp_add_edit_submit_product');

