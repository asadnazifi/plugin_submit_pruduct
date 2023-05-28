<?php


function wp_function_submit_product_admin_page(){
    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM `wp_submite_product` WHERE 1" );?>
         <div class="wrap">
          <h1>پرداخت های موفق و ناقص</h1>
                <hr>
                    <table class="wp-list-table widefat fixed striped table-view-list users">
                    <thead>
                    <tr>
                        <td class="manage-column column-cb check-column">
                        <th class="manage-column column-username column-primary sortable desc">نام کاربر</th>
                        <th class="manage-column column-username column-primary sortable desc">نام قطعه</th>
                        <th class="manage-column column-username column-primary sortable desc"> نوع پکیج</th>
                        <th class="manage-column column-username column-primary sortable desc">نام شرکت</th>
                        <th class="manage-column column-username column-primary sortable desc"> تعداد درخواست</th>
                        <th class="manage-column column-username column-primary sortable desc"> نوع کیفیت</th>
                        <th class="manage-column column-username column-primary sortable desc">عکس قطعه</th>
                        <th class="manage-column column-username column-primary sortable desc">تاریخ خرید</th>
                        <th class="manage-column column-username column-primary sortable desc">وضعیت خرید</th>
                        <th class="manage-column column-username column-primary sortable desc">عملیات</th>

                        </td>
                    </tr>
                    </thead>
                        <?php
    foreach ($results as $result){
        if ($result->status == "Paid" or $result->status =='incomplete'){
            $user = new WP_User( $result->user_id);
            ?>



                    <tbody>
                    <tr>
                        <td class="col"><span></span></td>
                        <td class="col mb-15"><span><?php echo $user->display_name?></span></td>
                        <td class="col"><span><?php echo $result->name_product?></span></td>
                        <td class="col"><span><?php echo $result->name_product_decription?></span></td>
                        <td class="col"><span><?php echo $result->quality?></span></td>
                        <td class="col"><span><?php echo $result->count?></span></td>
                        <td class="col"><span><?php echo $result->compane?></span></td>

                        <td class="col"><span><?php echo $result->image?></span></td>
                        <td class="col"><span><?php echo $result->date?></span></td>
                        <td class="col"><span><?php echo $result->status?></span></td>
                        <td class="col"><span>ویرایش  حذف </span></td>

                    </tr>

                    </tbody>

            </div>


<?php
        }

    }?>
                <thead>
                    <tr>
                        <td class="manage-column column-cb check-column">
                        <th class="manage-column column-username column-primary sortable desc">نام کاربر</th>
                        <th class="manage-column column-username column-primary sortable desc">نام قطعه</th>
                        <th class="manage-column column-username column-primary sortable desc"> نوع پکیج</th>
                        <th class="manage-column column-username column-primary sortable desc">نام شرکت</th>
                        <th class="manage-column column-username column-primary sortable desc"> تعداد درخواست</th>
                        <th class="manage-column column-username column-primary sortable desc"> نوع کیفیت</th>
                        <th class="manage-column column-username column-primary sortable desc">عکس قطعه</th>
                        <th class="manage-column column-username column-primary sortable desc">تاریخ خرید</th>
                        <th class="manage-column column-username column-primary sortable desc">وضعیت خرید</th>
                        <th class="manage-column column-username column-primary sortable desc">عملیات</th>

                        </td>
                    </tr>
                    </thead>

                </table>
<?php

}
?>
<?php
function wp_function_submit_product_loding_amunt_admin_page (){
    require_once "loding_amunt.php";
}
