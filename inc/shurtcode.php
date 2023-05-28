<?php


add_shortcode('show_view_form','wp_fun_submit_product_form');


function wp_fun_submit_product_form(){
    if (is_user_logged_in()){

        ob_start();
        require_once WPADS_LIBS.'show_html_submit_form.php';
        return ob_get_clean();
    }else{
        echo "<h3>برای ثبت سفارش حتما باید در سایت ورود یا ثبت نام کنید</h3>";
    }

}
