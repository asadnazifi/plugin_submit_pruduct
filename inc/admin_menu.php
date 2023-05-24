<?php
if (isset($_POST['name'])){
   add_post_meta(1,'product','dsadsaa');
}
function wp_function_submit_product_admin_page(){
    ?>

    <form action="" method="post">
        <input type="text" name="name">
        <input type="submit" value="ارسال مطالب">


    </form>

<?php
}