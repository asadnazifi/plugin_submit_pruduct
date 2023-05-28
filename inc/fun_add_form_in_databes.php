<?php
$target_dir = "uploads/";
$file_name = rand(1,9999999999).$_FILES["image"]["name"];
$target_file =WPADS_DIR."assets/img/".$file_name;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

// Check if file already exists

// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    }
}
global $wpdb;
$table = 'wp_submite_product';
$data = array('user_id' => get_current_user_id(),
    'name_product'=>trim($_POST['name_product']),
    'name_product_decription'=> trim($_POST['name_product_decription']),
    'compane'=> trim($_POST['compane']),
    'count'=> intval($_POST['count']),
    'quality'=> trim($_POST['quality']),
    'decription'=> trim($_POST['decription']),
    'url_product'=> trim($_POST['url_product']),
    'image'=>$file_name,
    'status'=>'not_amunt',
    'date'=>date('Y/m/d')



);
$format = array('%s','%d');

$wpdb->insert($table,$data);

$my_id = $wpdb->insert_id;
if ($my_id){
   ?>
    <script>
        alert("درخواست شما با موفقیت ثبت شده در انتظار تایید قیمت باشید")
    </script>
<?php

}else{
    ?>
    <script>
        alert("فایل با موفقیت ثبیت نشده")
    </script>
<?php
}
