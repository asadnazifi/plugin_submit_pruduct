<style>
    .not_amunt {
        display: flex;
        justify-content: space-between;
        background: bisque;
        align-items: center;
        border-radius: 5px;
        padding: 2px 10px;
        justify-content: space-between;
    }
    .name_product{
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    .name_product img{
        width: 50px;
    }
</style>
<?php
if (isset($_POST['amunt'])){
    global $wpdb;
    $amunt = $_POST['amunt'];
    $date = $_POST['date'];
    $id=$_POST['id'];
    $res = $wpdb->update( 'wp_submite_product', array( 'amunt' => $amunt, 'date' => $date ,'status'=>'amunt'), array( 'id' => "$id ") );
    if ($res){
        ?>
        <script>
            alert("قیمت و تاریخ برای مشتری ارسال و ثبت شد ")
        </script>
<?php
    }
}

?>

<?php global $wpdb;$user_id = get_current_user_id();?>

<?php $count = $wpdb->get_results("SELECT * FROM `wp_submite_product` WHERE status = 'not_amunt'")?>
<div class="tab">
    <h5 class="not_amunt">سفارشتای که هنوز از سمت مدیریت سایت قیمت گزاری نشده</h5>
    <div >

        </div>
    <?php if (count($count)>0):?>
        <?php foreach ($count as $res):?>

            <div class="name_product" >
                <div><?php echo $res->name_product;?></div>
                <div><?php echo $res->name_product_decription;?></div>
                <div><?php echo $res->compane;?></div>
                <div><?php echo $res->count;?></div>
                <div><?php echo $res->quality;?></div>
                <div><?php echo $res->decription;?></div>
                <div><?php echo $res->url_product;?></div>


                <div><img src="<?php echo WPADS_ASSETS.'img/'.$res->image?>" alt=""></div>
                <div>
                    <form action="" method="post">
                        <label for="amunt">قیمت</label>
                        <input type="text" placeholder="قیمت" name="amunt">
                        <label for="date">تاریخ</label>
                        <input type="text" placeholder="تاریخ" name="date">
                        <input name="id" type="hidden"value="<?php echo $res->id?>">
                        <input type="submit" value="ثبت" name="submit">

                    </form>
                </div>


            </div>


        <?php endforeach;?>
    <?php else:?>
        <h2>هیچ سفارشی ثبت نشد</h2>
    <?php endif;?>
    </div>


</div>