<style>
    .tabs {
        display: flex;
        flex-wrap: wrap; // make sure it wraps
    }
    .tabs label {
        margin: 1px 3px;
        padding: 1px 15px;

    display: block;


        cursor: pointer;
        background: #90CAF9;

        transition: background ease 1s;
    }
    .tabs .tab {
        order: 99; // Put the tabs last
    flex-grow: 1;
        width: 100%;
        display: none;
        padding: 1rem;
        background: #fff;
    }
    .tabs input[type="radio"] {
        display: none !important;
    }
    .tabs input[type="radio"]:checked + label {
        background: #cbcbcb;
    }
    .tabs input[type="radio"]:checked + label + .tab {
        display: block;
    }
    .w-b{
        width: 200px!important;
        background: #FFFFFF!important;
    }
    .btn_submit{
        padding: 8px 16px;
        background: #0a6f92;
        color: #FFFFFF;
        border: none;
        border-radius: 5px;
    }
    .text-center{
        text-align: center !important;
    }
    .p-2-5{
        padding: 2px 5px;
        border-radius: 10px;

    }
    .p_style{
        margin: 0;
        background: #419f9f;
        padding: 0;
        border-radius: 27px;
       
    }

    @media (max-width: 45em) {
        .tabs .tab,
        .tabs label {
            order: initial;
        }
        .tabs label {
            width: 100%;
            margin-right: 0;
            margin-top: 0.2rem;
        }

    }
    .not_amunt {
        display: flex;
        justify-content: space-between;
        background: bisque;
        align-items: center;
        border-radius: 5px;
        padding: 2px 10px;

    }
    .name_product{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .name_product img{
        width: 50px;
    }


</style>
<div>
    <div class="tabs">
        <input type="radio" name="tabs" id="tabone" checked="checked">

        <label class="text-center p-2-5" for="tabone"> <p class="p_style text-center">0</p>ثبت سفارش</label>
        <div class="tab">
            <form action=""method="post" enctype="multipart/form-data">
               <label for="name" class="w-b"> نام قطعه</label>
                  <input type="text"name="name_product" id="name"required><br>
                <label class="w-b" for="name_product_decription">نوع پکیج</label>
                <input type="text" name="name_product_decription" id="name_product_decription" required><br>
                <label class="w-b" for="compane"> شرکت سازنده</label>
                <input type="text" name="compane" id="compane" required><br>
                <label class="w-b" for="count"> تعداد درخواست</label>
                <input  type="number" id="count" name="count" min="1" max="100" required><br>
                <label class="w-b" for="quality"> کیفییت قطعه </label>

                <select name="quality">
                    <option value="0">انتخاب کن</option>
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="opel">Opel</option>
                    <option value="audi">Audi</option>
                </select>
                <p>نام و محصولات کی انتخاب میکنید یکی از بهترین کیفت های به اسم کوپانس ویر چوال هاشست</p>

                <label class="w-b" for="decription">توضیحات</label>
                <input type="text" name="decription" id="decription"><br>
                <label class="w-b" for="url_product"> آدس  url</label>
                <input type="text" name="url_product" id="url_product"><br>
                <label class="w-b" for="image">عکس</label>
                <input type="file" name="image" id="image"><br>
                    <div class="text-center" >
                        <input class="btn_submit" type="submit" value="درج در فهرست سفارش" name="submit_product_wp">
                    </div>


            </form>
        </div>

        <input type="radio" name="tabs" id="tabtwo">
        <?php global $wpdb;$user_id = get_current_user_id();?>

        <?php $count = $wpdb->get_results("SELECT * FROM `wp_submite_product` WHERE status = 'not_amunt' && user_id = '$user_id'")?>
        <label class="text-center p-2-5" for="tabtwo"> <p class="p_style text-center"><?php echo count($count)?></p>در انتظار قیمت</label>

        <div class="tab">
            <h5 class="not_amunt">سفارشتای که هنوز از سمت مدیریت سایت قیمت گزاری نشده</h5>
            <div >
                <div class="name_product">
                    <div>نام قطعه</div>
                    <div>نوع پکیج</div>
                    <div>تعداد</div>
                    <div>عکس محصول</div>
                    <div> وضعیت</div>
                </div>
                <?php foreach ($count as $res):?>
                <div class="name_product" >
                    <div><?php echo $res->name_product;?></div>
                    <div><?php echo $res->name_product_decription;?></div>
                    <div><?php echo $res->count;?></div>
                    <div><img src="<?php echo WPADS_ASSETS.'img/'.$res->image?>" alt=""></div>
                    <div> انتظار قیمت</div>


                </div>
                <?php endforeach;?>
            </div>


        </div>

        <input type="radio" name="tabs" id="tab3">
        <?php $count = $wpdb->get_results("SELECT * FROM `wp_submite_product` WHERE status = 'amunt' && user_id ='$user_id'")?>
        <label class="text-center p-2-5" for="tab3"> <p class="p_style text-center"><?php echo count($count)?></p>قیمت کالا</label>
        <div class="tab">




                <h5 class="not_amunt">قیمت تعین شده برای مرسوله شما</h5>
                <?php if (count($count)>0):?>
                    <?php foreach ($count as $res):?>

                        <div class="name_product" >
                            <div>نام:<?php echo $res->name_product;?></div>
                            <div> نوع پکیج:<?php echo $res->name_product_decription;?></div>
                            <div>شرکت:<?php echo $res->compane;?></div>
                            <div> تعداد:<?php echo $res->count;?></div>
                            <div> کیفیت:<?php echo $res->quality;?></div>
                            <div> تاریخ تحویل:<?php echo $res->date;?></div>


                            <div>قیمت:<?php echo number_format($res->amunt);?> ریال</div>


                            <div>
                                <form action="" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $res->id?>">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                    <input type="hidden" name="count" value="<?php echo $res->count?>">
                                    <input type="submit" value="پرداخت" name="payment">
                                </form></div>



                        </div>


                    <?php endforeach;?>
                <?php else:?>
                    <h2>هیچ سفارشی ثبت نشد</h2>
                <?php endif;?>





        </div>
        <input type="radio" name="tabs" id="tab4">
        <?php $count = $wpdb->get_results("SELECT * FROM `wp_submite_product` WHERE status = 'paemynt' && user_id ='$user_id'")?>
        <label class="text-center p-2-5" for="tab4"> <p class="p_style text-center"><?php echo count($count); ?></p>خرید ها</label>
        <div class="tab">
            <h5 class="not_amunt">قیمت تعین شده برای مرسوله شما</h5>
            <?php if (count($count)>0):?>
                <?php foreach ($count as $res):?>

                    <div class="name_product" >
                        <div>نام:<?php echo $res->name_product;?></div>
                        <div> نوع پکیج:<?php echo $res->name_product_decription;?></div>
                        <div>شرکت:<?php echo $res->compane;?></div>
                        <div> تعداد:<?php echo $res->count;?></div>
                        <div> کیفیت:<?php echo $res->quality;?></div>
                        <div> تاریخ ارسال:<?php echo $res->date;?></div>
                        <div> کد پیگیری:<?php echo $res->code_paement;?></div>
                        <div>هزینه پرداخت شده:<?php echo number_format($res->amunt_secceful);?> ریال</div>






                    </div>


                <?php endforeach;?>
            <?php else:?>
                <h2>خریدی انجام نشده</h2>
            <?php endif;?>

        </div>
        <input type="radio" name="tabs" id="tab5">
        <label class="text-center p-2-5" for="tab5"> <p class="p_style text-center">0</p>ارسال ها</label>
        <div class="tab">
            <h1>Tab Three Content</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
        <input type="radio" name="tabs" id="tab6">
        <label class="text-center p-2-5" for="tab6"> <p class="p_style text-center">0</p>تحویل داده شده</label>
        <div class="tab">
            <h1>Tab Three Content</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
        <input type="radio" name="tabs" id="tab7">
        <?php $count = $wpdb->get_results("SELECT * FROM `wp_submite_product` WHERE status = 'paemynt' && user_id ='$user_id'")?>
        <label class="text-center p-2-5" for="tab4"> <p class="p_style text-center"><?php echo count($count); ?></p>فاکتور ها</label>
        <div class="tab">
            <h5 class="not_amunt">قیمت تعین شده برای مرسوله شما</h5>
            <?php if (count($count)>0):?>
                <?php foreach ($count as $res):?>

                    <div class="name_product" >
                        <div>نام:<?php echo $res->name_product;?></div>
                        <div> نوع پکیج:<?php echo $res->name_product_decription;?></div>
                        <div>شرکت:<?php echo $res->compane;?></div>
                        <div> تعداد:<?php echo $res->count;?></div>
                        <div> کیفیت:<?php echo $res->quality;?></div>
                        <div> تاریخ ارسال:<?php echo $res->date;?></div>
                        <div> کد پیگیری:<?php echo $res->code_paement;?></div>
                        <div>هزینه پرداخت شده:<?php echo number_format($res->amunt_secceful);?> ریال</div>






                    </div>


                <?php endforeach;?>
            <?php else:?>
                <h2>خریدی انجام نشده</h2>
            <?php endif;?>

        </div>
        <input type="radio" name="tabs" id="tab8">
        <label class="text-center p-2-5" for="tab8"> <p class="p_style text-center">0</p>برسی مجدد</label>
        <div class="tab">
            <h1>Tab Three Content</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
        <input type="radio" name="tabs" id="tab9">
        <label class="text-center p-2-5" for="tab9"> <p class="p_style text-center">0</p> لغو شده</label>
        <div class="tab">
            <h1>Tab Three Content</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>

</div>