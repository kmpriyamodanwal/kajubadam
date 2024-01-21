<?php
$userdetails = $this->crud->selectDataByMultipleWhere('registration',array('id'=>temp_session_id()));

 $coponapply = $this->db->get_where('order_coupon',array('user_id'=>temp_session_id(),"status"=>0,))->result_object();
$coupon = 0;
if(!empty($coponapply[0]->coupon)) 
{
    $coupon = $coponapply[0]->coupon;
}
$applied_coupon = applied_coupon($coupon,'');
 $this->load->view('header'); 
 ?>
            
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area end -->
              <!-- breadcrumb-area end -->
            
            <!-- content-wraper start -->
            <div class="content-wraper mt-95">
                <div class="container-fluid">
<?php

$sub_total = 0; 
$shipping_charge = shippingcharge;
$this->db->order_by('id desc');

$cartpro = $this->crud->selectDataByMultipleWhere('add_to_temp_cart',array('temp_user_id'=>temp_session_id()));
if(!empty($cartpro))
{  
?>
                    <div class="row">
                        <div class="col-lg-12 col-xl-10 offset-xl-1">
                            <!-- coupon-area start -->
                            <div class="coupon-area mb-60">
                               <p><?php echo $this->session->flashdata('coupon_mesg'); ?></p>
                                <div class="coupon-accordion">
                                    <h3>Have a coupon? <span id="showcoupon" class="coupon">Click here to enter your code</span></h3>
                                    <div id="checkout-coupon" class="coupon-content" style="display: <?php if(!empty($coponapply[0]->coupon)) echo 'block'; else echo 'none'; ?>">
                                        <div class="coupon-info">
                                            <form action="<?php echo base_url('checkout/couponcode'); ?>" method="post"> 
                                                <p class="checkout-coupon">
                                                    <input type="text" placeholder="Coupon code" name="coupon" value="<?php if(!empty($coponapply[0]->coupon)) echo $coponapply[0]->coupon; ?>">

                                                    <button value="Apply coupon" name="submit" class="button-apply-coupon" type="submit">Apply coupon</button>
                                                    <?php if(!empty($coponapply[0]->coupon))
                                                    { ?>
                                                        <a href="<?php echo base_url('checkout/delete_coupon'); ?>" class="btn btn-danger" name="submit" type="submit">Remove</a>
                                                <?php } ?>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- coupon-area end -->
                        </div>
                    </div>

                    <!-- checkout-area start -->
                    <div class="checkout-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="row" action="<?php echo base_url('checkout/final_cart'); ?>" method="post">
                                    <div class="col-lg-6 offset-xl-1 col-xl-5 col-sm-12">
                                        <!-- <form action="#"> -->
                                            <div class="checkbox-form">
                                                <h3 class="shoping-checkboxt-title">Billing Details</h3>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <p class="single-form-row">
                                                            <label>Full name <span class="required">*</span></label>
                                                            <input type="text" name="full_name" value="<?=$userdetails[0]->username ?>">
                                                        </p>
                                                    </div>
                                                    
                                                    <div class="col-lg-12">
                                                        <div class="single-form-row">
                                                           <label>Country <span class="required">*</span></label>
                                                           <div class="nice-select wide">
                                                              <select name="country"> 
                                                                    <option selected value="India">India</option>
                                                              </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p class="single-form-row">
                                                            <label>Street address <span class="required">*</span></label>
                                                            <input type="text" name="address" placeholder="House number and street name" value="<?=$userdetails[0]->address ?>">
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p class="single-form-row">
                                                            <label>Town / City <span class="required">*</span></label>
                                                            <input type="text" name="city" value="<?=$userdetails[0]->city ?>">
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p class="single-form-row">
                                                            <label>State</label>
                                                            <input type="text" name="state" value="<?=$userdetails[0]->state ?>">
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p class="single-form-row">
                                                            <label>Pincode <span class="required">*</span></label>
                                                            <input type="text" name="pincode" value="<?=$userdetails[0]->pincode ?>">
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p class="single-form-row">
                                                            <label>Phone</label>
                                                            <input type="text" name="mobile" value="<?=$userdetails[0]->mobile ?>">
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p class="single-form-row">
                                                            <label>Email address <span class="required">*</span></label>
                                                            <input type="text" name="email" value="<?=$userdetails[0]->email ?>">
                                                        </p>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-lg-12">
                                                        <p class="single-form-row m-0">
                                                            <label>Order notes</label>
                                                            <textarea cols="5" rows="2" class="checkout-mess" placeholder="Notes about your order, e.g. special notes for delivery." name="order_note"></textarea>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- </form> -->
                                    </div>
                                    <div class="col-lg-6  col-xl-5 col-sm-12">
                                        
                                        <div class="checkout-review-order">
                                          
                                                <h3 class="shoping-checkboxt-title">Your order</h3>
                                                <table class="checkout-review-order-table">
                                                    <thead>
                                                        <tr>
                                                            <th class="t-product-name">Product</th>
                                                            <th>Color Size</th>
                                                            <th class="product-total">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                foreach ($cartpro as $key => $value) 
                                                    {

                                                        $product = $this->crud->selectDataByMultipleWhere('product',array('id'=>$value->p_id,));

                                                        $price = 0;
                                                        $this->db->group_by('price');
                                                        $this->db->limit(1);
                                                        $this->db->select("price");
                                                        $price = $this->db->get_where('all_images',array('p_id'=>$value->p_id,'color_id'=>$value->color_id,'size_id'=>$value->size_id,))->result_object();
                                                        if(!empty($price))
                                                        {
                                                            foreach ($price as $key => $value2) 
                                                            { 
                                                                $price = $value2->price;
                                                                break;
                                                            } 
                                                        }

                                                       $size_id = $this->crud->selectDataByMultipleWhere('size',array('id'=>$value->size_id));
                                                       $color_id = $this->crud->selectDataByMultipleWhere('color',array('id'=>$value->color_id));

                                                        $product_total = 0;
                                                        $product_total = $price*$value->quantity;
                                                        $sub_total += $product_total;
                                                        $finalprice = $sub_total+$shipping_charge;


                                                    ?>
                                                        <tr class="cart_item">
                                                            <td class="t-product-name"><?php echo $product[0]->name; ?><strong class="product-quantity"> × <?=$value->quantity ?></strong></td>
                                                            <td>
                                                                <span>
                                                                    Size: <?php if(!empty($size_id)) echo $size_id[0]->name; ?>
                                                                </span><br>
                                                                <span>
                                                                    Color: <?php if(!empty($color_id)) echo $color_id[0]->name; ?>
                                                                </span>
                                                            </td>
                                                             <td class="t-product-price"><span>₹ <?php echo number_format($product_total,2); ?></span></td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>

                                                    <tfoot>
                                                        <tr class="cart-subtotal">
                                                            <th>Subtotal</th>
                                                            <td></td>
                                                            <td><span>₹ <?php echo number_format($applied_coupon['sub_total'],2); ?></span></td>
                                                        </tr>
                                                        <tr class="shipping">
                                                            <th>Shipping</th>
                                                            <td></td>
                                                            <td>₹ <?php echo number_format($applied_coupon['shipping_charge'],2); ?></td>
                                                        </tr>
                                                        <?php if($applied_coupon['discount_amount']>0){ ?>
                                                        <tr class="shipping">
                                                            <th>Coupon Discount (<?php if($applied_coupon['type']==1)echo $applied_coupon['discount'].'%'; else echo 'Flat' ?>)</th>
                                                            <td></td>

                                                            <td>-₹ <?php echo number_format($applied_coupon['discount_amount'],2); ?></td>
                                                        </tr>
                                                         <?php  } ?>
                                                        <tr class="order-total">
                                                            <th>Total</th>
                                                            <td></td>
                                                            <td><strong><span>₹ <?php echo number_format($applied_coupon['after_discount_final_price'],2); ?></span></strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <div class="checkout-payment">
                                                    <div class="payment_methods">
                                                        <p>
                                                            <label>
                                                            <input type="radio" name="payment_type" value="1" required> CASH ON DELIVERY
                                                            </label>
                                                        </p>
                                                        <p>
                                                            <label>
                                                            <input type="radio" name="payment_type" value="2" required> ONLINE
                                                            </label>
                                                        </p>
                                                    </div>
                                                    
                                                    <button class="button-continue-payment" type="submit" name="submit">Continue to payment</button>
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                       
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-area end -->
 <?php } else { ?>
                                             <section class="content text-center">
                                                <img src="https://i.pinimg.com/736x/2e/ac/fa/2eacfa305d7715bdcd86bb4956209038--android.jpg">
                                            </section>
                                        <?php } ?>
                </div>
            </div>
            <!-- content-wraper end -->
            
     <?php include('footer.php'); ?>
