<?php
/*
 * ZarinPal Advanced Class
 *
 * version 	: 1.0
 * link 	: https://vrl.ir/zpc
 *
 * author 	: milad maldar
 * e-mail 	: miladworkshop@gmail.com
 * website 	: https://miladworkshop.ir
*/
global $wpdb,$amunt;


if (isset($_POST['payment'])){
require_once(WPADS_DIR."zarinpal/zarinpal_function.php");
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $count = $_POST['count'];

    $results = $wpdb->get_results("SELECT * FROM `wp_submite_product` WHERE `id`='$product_id'");
    $user = new WP_User( $results[0]->user_id);
   $amunt = $results[0]->amunt*$results[0]->count;

    $user_email = $user->user_email;





$MerchantID 	= "62720868-335b-11e9-8e24-005056a205be";
$Amount 		= $amunt;
$Description 	= "تراکنش زرین پال";
$Email 			= $user_email;
$Mobile 		= "";
$CallbackURL 	="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$ZarinGate 		= false;
$SandBox 		= true;

$zp 	= new zarinpal();
$result = $zp->request($MerchantID, $Amount, $Description, $Email, $Mobile, $CallbackURL, $SandBox, $ZarinGate);

if (isset($result["Status"]) && $result["Status"] == 100)
{
    $zp->redirect($result["StartPay"]);
	// Success and redirect to pay




} else {
	// error
    var_dump("dadasd");
	echo "خطا در ایجاد تراکنش";
	echo "<br />کد خطا : ". $result["Status"];
	echo "<br />تفسیر و علت خطا : ". $result["Message"];
}
}

if ($_GET['Status'] == 'OK'){
    var_dump($amunt);
    $res = $wpdb->update( 'wp_submite_product', array( 'status' => 'paemynt' ,'amunt_secceful'=>$amunt ), array( 'id' => "$product_id") );
    if ($res){
        ?>
        <script>
            alert("پرداخت با موفقیت انجام شد برای پیگیری به صفحه سفارشات بروید")
        </script>
        <?php
    }
}