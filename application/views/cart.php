<?php include('header.php');
$sub_total = 0; 
$shipping_charge = shippingcharge;
$this->db->order_by('id desc');

$cartpro = $this->crud->selectDataByMultipleWhere('add_to_temp_cart',array('temp_user_id'=>temp_session_id()));
if(!empty($cartpro))
        { 
?>
            
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active">Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area end -->
            
            <!-- content-wraper start -->
            <div class="content-wraper mt-95">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <form action="#" class="cart-table">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="plantmore-product-remove">remove</th>
                                                <th class="plantmore-product-thumbnail">images</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="plantmore-product-price">Unit Price</th>
                                                <th class="plantmore-product-quantity">Quantity</th>
                                                <th class="plantmore-product-subtotal">Total</th>
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
                                            <tr>
                                                <td class="plantmore-product-remove"><a onclick="deletecart(<?=$value->id ?>)"><i class="fa fa-times"></i></a></td>

                                                <td class="plantmore-product-thumbnail"><a href="<?=base_url('product-details/'.$product[0]->slug) ?>"><img src="<?php echo base_url(); ?>media/uploads/product/<?php echo $product[0]->thumb_img; ?>" width="80" alt=""></a></td>

                                                <td class="plantmore-product-name">
                                                    <a href="<?=base_url('product-details/'.$product[0]->slug) ?>"><?=$product[0]->name ?></a><br>
                                                    <span>
                                                        Size: <?php if(!empty($size_id)) echo $size_id[0]->name; ?>
                                                    </span><br>
                                                    <span>
                                                        Color: <?php if(!empty($color_id)) echo $color_id[0]->name; ?>
                                                    </span>
                                                </td>

                                                <td class="plantmore-product-price"><span class="amount">₹ <?=number_format($price,2) ?></span></td>

                                                <td class="plantmore-product-quantity">
                                                    <input class="qty_set" name="quantity" data-id="<?php echo $value->id; ?>" value="<?=$value->quantity ?>" type="number" min="1">

                                                </td>
                                                <td class="product-subtotal"><span class="amount">₹  <?=number_format($product_total,2) ?></span></td>
                                            </tr>
                                        <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                               <!--  <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                                <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                            </div>
                                            <div class="coupon2">
                                                <input class="button" name="update_cart" value="Update cart" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row justify-content-end mb-5">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Cart totals</h2>
                                            <ul>
                                                <li>Subtotal <span>₹ <?=number_format($sub_total,2) ?></span></li>
                                                <li>Shipping <span>₹ <?=number_format($shipping_charge,2) ?></span></li>
                                                <li>Total <span>₹ <?=number_format($finalprice,2) ?></span></li>
                                            </ul>
                                            <a href="<?=base_url('checkout') ?>">Proceed to checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
<?php } else { ?>
            <section class="content text-center">
                <img src="https://i.pinimg.com/736x/2e/ac/fa/2eacfa305d7715bdcd86bb4956209038--android.jpg">
            </section>
        <?php }  ?>
       <?php include('footer.php'); ?>
