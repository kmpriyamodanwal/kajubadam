<?php
// print_r($order_id);
$sitesetting = $this->crud->fetchdatabyid('1','site_setting');
$EDITDATA = $this->crud->selectDataByMultipleWhere('finalorder',array('order_id'=>$order_id,));
?>

  <table border="0" align="center" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;background:#e9e9e9;padding:50px 0px">
    <tr>
      <td>
        <table border="0" align="center" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;background:#ffffff;padding:0px 25px">
          <tbody>
            <tr>
              <td style="margin:0;padding:0">
                <table border="0" cellpadding="20" cellspacing="0" width="100%" style="background:#ffffff;color:#1a1a1a;line-height:150%;text-align:center;border-bottom:1px solid #e9e9e9;font-family:300 14px &#39;Helvetica Neue&#39;,Helvetica,Arial,sans-serif">
                  <tbody>
                    <tr>
                      <td valign="top" align="center" width="100" style="background-color:#ffffff">
                        <img alt="Swiggy" style="width:134px" src="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>">
                      </td>
                    </tr>
                  </tbody>
                </table>

                <br>

                <table border="0" cellpadding="" cellspacing="0" width="100%" style="background:#ffffff;color:#000000;line-height:150%;text-align:center;font:300 16px &#39;Helvetica Neue&#39;,Helvetica,Arial,sans-serif">
                  <tbody>
                    <tr>
                      <td valign="top" width="100">
                        <h3 style="text-align:center;text-transform:uppercase"><?=website_name ?></h3>
                        <p>Payment method: <span style="font-size:18px;font-weight:bold"><?=paymenttype($EDITDATA[0]->payment_type) ?> </span></p>
                        <!-- <p>Last Delivery Boy: <span style="font-size:18px;font-weight:bold">NA</span></p> -->
                      </td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <table border="0" cellpadding="20" cellspacing="0" width="100%" style="color:#000000;line-height:150%;text-align:left;font:300 16px &#39;Helvetica Neue&#39;,Helvetica,Arial,sans-serif">
                  <tbody>
                    <tr>
                      <td valign="top" style="font-size:24px;">
                        <span style="text-decoration:underline;">Order No: <?=$order_id ?></span>
                        <h2 style="display:inline-block;font-family:Arial;font-size:24px;font-weight:bold;margin-top:5px;margin-right:0;margin-bottom:5px;margin-left:0;text-align:left;line-height:100%"><?=date('d M, Y',strtotime($EDITDATA[0]->addeddate)) ?></h2>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <table align="center" cellspacing="0" cellpadding="6" width="95%" style="border:0;color:#000000;line-height:150%;text-align:left;font:300 14px/30px &#39;Helvetica Neue&#39;,Helvetica,Arial,sans-serif;" border=".5px">
                  <thead>
                    <tr style="background:#efefef">
                      <th scope="col" width="30%" style="text-align:left;border:1px solid #eee">Product</th>
                      <th scope="col" width="15%" style="text-align:right;border:1px solid #eee">Quantity</th>
                      <th scope="col" width="20%" style="text-align:right;border:1px solid #eee">Price</th>
                    </tr>
                  </thead>
                  <tbody>

                  	<?php $i=0;
                       // $order_id = $order_id;
                       $ALLDATA = $this->crud->selectDataByMultipleWhere('orders',array('order_id'=>$order_id,'user_id'=>temp_session_id()));


                       foreach($ALLDATA as $order)
                        { 
                          
                           $i++; 
                           $coupon = $this->crud->selectDataByMultipleWhere('order_coupon',array('user_id'=>$order->user_id,'order_id'=>$order_id));
                           $product = $this->crud->selectDataByMultipleWhere('product',array('id'=>$order->p_id,));

                           $this->db->group_by('p_id');
                           $allimage = $this->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$order->p_id,'size_id'=>$order->size_id,'color_id'=>$order->color_id,));
                           // print_r($allimage);

                           $color_id = 0;
                           $this->db->group_by('color_id');
                           $this->db->limit(1);
                           $this->db->select("color_id");
                           $color = $this->db->get_where('all_images',array('p_id'=>$order->p_id,'color_id'=>$order->color_id))->result_object();
                           if(!empty($color))
                           {
                               foreach ($color as $key => $value3) 
                               { 
                                   $color_id = $value3->color_id;
                                   break;
                               } 
                           }
                           $size_id = 0;
                           $this->db->group_by('size_id');
                           $this->db->limit(1);
                           $this->db->select("size_id");
                           $color = $this->db->get_where('all_images',array('p_id'=>$order->p_id,'size_id'=>$order->size_id,))->result_object();
                           if(!empty($color))
                           {
                               foreach ($color as $key => $value4) 
                               { 
                                   $size_id = $value4->size_id;
                                   break;
                               } 
                           }
                                       
                       ?>

                    <tr width="100%">
                      <td width="30%" style="text-align:left;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:0;border-top:0;word-wrap:break-word">
                      	<img src="<?php echo base_url(); ?>media/uploads/product/<?php echo $allimage[0]->image; ?>" class="mw-100 mh-100" style="height: 100px;"/><br>
                        <?php echo $product[0]->name; ?><br>
                        Color: <?php echo colorname($color_id); ?><br>
                        Size: <?php echo sizename($size_id); ?>
                      </td>
                      <td width="15%" style="text-align:right;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:0;border-top:0">
                        <?php echo $order->quantity; ?>
                      </td>
                      <td width="20%" style="text-align:right;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:1px solid #eee;border-top:0"><span>₹ <?php echo number_format($order->quantity*$allimage[0]->price,2); ?></span></td>
                    </tr>
                <?php } ?>
                  </tbody>

                  <tfoot>
                    <tr>
                      <th scope="row" colspan="2" style="text-align:right;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:0;border-top:0">Subtotal </th>
                      <th style="text-align:right;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:1px solid #eee;border-top:0"><span>₹ <?php echo number_format($EDITDATA[0]->sub_total,2); ?></span></th>
                    </tr>
                    <tr>
                      <th scope="row" colspan="2" style="text-align:right;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:0;border-top:0">
                        Shipping Charge</th>
                      <td style="text-align:right;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:1px solid #eee;border-top:0"><span>+₹ <?php echo number_format($EDITDATA[0]->shipping_charge,2); ?></span></td>
                    </tr>
                    <?php
                    if(!empty($coupon))
                        { 
                       $couponamout = $EDITDATA[0]->finalprice-$EDITDATA[0]->after_discount_final_price;
                       $couponname = $this->crud->selectDataByMultipleWhere('coupen_code',array('name'=>$coupon[0]->coupon,));

                      ?>
                    <tr>
                      <th scope="row" colspan="2" style="text-align:right;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:0;border-top:0">
                        Promo Code</th>
                      <td style="text-align:right;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:1px solid #eee;border-top:0"><span>-₹ (<strike><?php echo number_format($couponamout,2); ?></span></td>
                    </tr>
                <?php } ?>

                    <tr>
                      <th scope="row" colspan="2" style="text-align:right;background:#efefef;text-align:right;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:0;border-top:0">Order Total</th>
                      <td style="background:#efefef;text-align:right;vertical-align:middle;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:1px solid #eee;border-top:0;color:#7db701;font-weight:bold"><span><?php echo number_format($EDITDATA[0]->after_discount_final_price,2); ?></span></td>
                    </tr>
                  </tfoot>
                </table>
                <br>
                <br>
                <table border="0" cellpadding="20" cellspacing="0" width="100%" style="color:#000000;line-height:150%;text-align:left;font:300 14px &#39;Helvetica Neue&#39;,Helvetica,Arial,sans-serif">
                  <tbody>
                    <tr>
                      <td valign="top">
                        <h4 style="font-size:24px;margin:0;padding:0;margin-bottom:10px;">Customer Details</h4>
                        <p style="margin:0;margin-bottom:10px;padding:0;"><strong>Email:</strong> <a href="mailto:<?=$EDITDATA[0]->email ?>" target="_blank"><?=$EDITDATA[0]->email ?></a></p>
                        <p style="margin:0;margin-bottom:10px;padding:0;"><strong>Tel:</strong> <?=$EDITDATA[0]->mobile ?></p>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <table border="0" cellpadding="20" cellspacing="0" width="100%" style="color:#000000;line-height:150%;text-align:left;font:300 14px &#39;Helvetica Neue&#39;,Helvetica,Arial,sans-serif">
                  <tbody>
                    <tr>
                      <td valign="top">
                        <h4 style="font-size:24px;margin:0;padding:0;margin-bottom:10px;">Delivery address</h4>
                        <p><?=$EDITDATA[0]->full_name ?>
                          <br /> <?=$EDITDATA[0]->address ?>
                          <br />
                          <br /> <?=$EDITDATA[0]->city ?>, <?=$EDITDATA[0]->state ?>, <?=$EDITDATA[0]->pincode ?>
                          <br /> <?=$EDITDATA[0]->country ?>
                        </p>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <br>
                
                <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;padding:0px;font-size:12px;color:#9b9b9b;">
                  <tbody>
                    <tr>
                      <td align="center" width="33.3333%">
                        <?=$sitesetting[0]->address ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <br>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </table>
