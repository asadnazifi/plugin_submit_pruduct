<?php


add_shortcode('show_view_form','wp_fun_submit_product_form');


function wp_fun_submit_product_form(){

    ob_start();
    require_once WPADS_LIBS.'show_html_submit_form.php';
    return ob_get_clean();
}
add_action('save_post', function (){
    if (isset($_GET['name'])){
        header('Location:localhost/elemo ');
    }
});