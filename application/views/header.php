<?php
$sitesetting = $this->crud->fetchdatabyid('1','site_setting');
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Galaxy 23</title>
        <meta name="author" content="Galaxy 23">
        <meta name="keywords" content="Galaxy 23">
        <meta name="description" content="Welcome to Galaxy23 - Your Celestial Destination for Exceptional Footwear">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">	-->
        <!-- Place favicon.ico in the root directory -->
	    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>">	
		<!-- all CSS hear -->		
        <link rel="stylesheet" href="<?=base_url() ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url() ?>css/font-awesome.min.css">
        <link rel="stylesheet" href="<?=base_url() ?>css/ionicons.min.css">
        <link rel="stylesheet" href="<?=base_url() ?>css/animate.css">
        <link rel="stylesheet" href="<?=base_url() ?>css/nice-select.css">
        <link rel="stylesheet" href="<?=base_url() ?>css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?=base_url() ?>css/mainmenu.css">
        <link rel="stylesheet" href="<?=base_url() ?>css/style.css">
        <link rel="stylesheet" href="<?=base_url() ?>css/responsive.css">	
        <script src="<?=base_url() ?>js/vendor/modernizr-2.8.3.min.js"></script>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

      
      
      <script src="<?=base_url() ?>js/vendor/jquery-3.5.1.min.js"></script>

    </head>
    <style>
  .skiptranslate.goog-te-gadget>span {
    display: none;
    }
    .goog-te-gadget .goog-te-combo {
        margin: 0 0!important;
    }

    select.goog-te-combo
    {
        background: transparent!important;
        border: transparent!important;
        color: white!important;
        font-weight: 600!important;
    }
    select.goog-te-combo>option {
        background: black;
    }
    .search-form-input input {
        padding: 0 135px 0 300px;
    }
    .search-form-input .nice-select {
        width: 286px;
    }

    </style>
    <body>
        
        <div class="wrapper">
            <header>
                <!-- header-top start -->
                <div class="header-top bg-black">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 col-md-4">
                                <!-- welcome-msg start-->
                                <div class="welcome-msg">
                                    <p>Welcome to Galaxy23 !</p>
                                </div>
                                <!-- welcome-msg end-->
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <!-- full-setting-area start -->
                                <div class="full-setting-area">
                                    <div class="top-dropdown">
                                        <ul>
                                            <!-- <li class="drodown-show"><span>Currency:</span> <a href="#">USD <i class="fa fa-angle-down"></i></a>
                                                <ul class="open-dropdown">
                                                    <li><a href="#">EUR €</a></li>
                                                    <li><a href="#">USD $</a></li>
                                                </ul>
                                            </li> -->
                                            <li><div id="google_translate_element"></div></li>
                                            <li class="drodown-show"><a href="#"> Setting <i class="fa fa-angle-down"></i></a>
                                                <ul class="open-dropdown setting">
                                                    <li><a href="<?=base_url() ?>my-account">My account</a></li>
                                                    <li><a href="<?=base_url() ?>checkout">Checkout</a></li>
                                                    <li><a href="<?=base_url() ?>login">Sign in</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- full-setting-area end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header-top end -->
                
                <!-- header-mid-area start -->
                <div class="header-mid-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col md-custom-12">
                                <!-- logo start -->
                                <div class="logo">
                                    <a href="<?=base_url() ?>"><img class="ziya" src="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>" alt=""></a>
                                </div>
                                <!-- logo end -->
                            </div>
                            <div class="col-lg-9 md-custom-12">
                                

                                <div class="shopping-cart-box">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span class="item-cart-inner">
                                                    <span class="item-cont">
                                                        <?php 
                                                        $user_temp_session_id = temp_session_id();
                                                        $this->db->where('temp_user_id',$user_temp_session_id);
                                                         $query = $this->db->get('add_to_temp_cart');
                                                         echo $query->num_rows(); ?>
                                                    </span> 
                                                    My Cart
                                                </span>
                                                <div class="item-total">
                                                    ₹ <span id="cart_sub_total"></span>
                                                </div>
                                            </a>
                                            <ul class="shopping-cart-wrapper">
                                                <?php
                                                $sub_total = 0; 
                                                $shipping_charge = shippingcharge;
                                                $this->db->order_by('id desc');
                                                $cartpro = $this->crud->selectDataByMultipleWhere('add_to_temp_cart',array('temp_user_id'=>temp_session_id())); 
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
                                                <li>
                                                    <div class="shoping-cart-image">
                                                        <a href="<?=base_url('product-details/'.$product[0]->slug) ?>">
                                                            <img src="<?php echo base_url(); ?>media/uploads/product/<?php echo $product[0]->thumb_img; ?>" alt="" width="80">
                                                            <span class="product-quantity"><?=$value->quantity ?>x</span>
                                                        </a>
                                                    </div>
                                                    <div class="shoping-product-details">
                                                        <h3><a href="<?=base_url('product-details/'.$product[0]->slug) ?>"><?=$product[0]->name ?></a></h3>
                                                        <div class="price-box">
                                                            <span>₹ <?=number_format($price,2) ?></span>
                                                        </div>
                                                        <div class="sizeandcolor">
                                                            <span>Size: <?php if(!empty($size_id)) echo $size_id[0]->name; ?></span>
                                                            <span>Color: <?php if(!empty($color_id)) echo $color_id[0]->name; ?></span>
                                                        </div>
                                                        <div class="remove">
                                                            <button title="Remove" onclick="deletecart(<?=$value->id ?>)"><i class="ion-android-delete"></i></button>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                            <script>
                                                $("#cart_sub_total").html('<?=number_format($sub_total,2) ?>');
                                            </script>
                                                
                                                <!-- <li>
                                                    <div class="cart-subtotals">
                                                        <h5>Subtotal <span class="float-right"> $698.00</span></h5>
                                                        <h5>Shipping <span class="float-right"> $7.00 </span></h5>
                                                        <h5>Taxes <span class="float-right">$0.00</span></h5>
                                                        <h5> Total <span class="float-right">$705.00</span></h5>
                                                    </div>
                                                </li> -->
                                                <li class="shoping-cart-btn">
                                                    <a class="checkout-btn" href="<?=base_url() ?>cart">Cart</a>
                                                    <a class="checkout-btn" href="<?=base_url() ?>checkout">Buy Now</a>
                                                    <!-- <a class="checkout-btn" href="<?=base_url() ?>checkout">Buy Now</a> -->
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

<style>
    .buy-now {
        position: relative;
        top: 14px;
        right: 36px;
    }
</style>
                                <!-- <div class="shopping-cart-box">
                                    <a class="buy-now btn btn-small btn-dark" href="<?=base_url() ?>checkout">Buy Now</a>
                                </div> -->
                                <!-- shopping-cart-box end -->
                                
                                <!-- searchbox start -->
                               <!-- <div class="searchbox">
                                    <form  action="<?php echo base_url('welcome/serch'); ?>">
                                        <div class="search-form-input">
                                            <select id="select" name="cat_id" class="nice-select">
                                                <?php
                                                $categories = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));
                                                foreach($categories as $data)
                                                    { ?>
                                                <option value="<?=$data->id ?>"><?=$data->name ?></option>
                                                <?php } ?>
                                            </select>
                                            <input type="text" placeholder="Enter your search key ... " name="search">
                                            <button class="top-search-btn" name="submit" type="submit">Search</button>
                                        </div>
                                    </form>
                                </div> -->
                                <!-- searchbox end -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header-mid-area end -->
                
                <!-- header-bottom-area start -->
                <div class="header-bottom-area bg-black sticky-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-9 d-none d-lg-block">
                                <!-- main-menu-area start -->
                                <div class="main-menu-area">
                                    <nav>
                                        <ul>
                                            <li class="active"><a href="<?=base_url() ?>">Home</a></li>
                                          
                                            <li><a href="<?=base_url() ?>about">About Us</a></li>
                                            <?php
                                                $categories = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));
                                                foreach($categories as $data)
                                                    { ?>
                                            <li><a href="<?=base_url('shop/'.$data->slug) ?>"><?=$data->name ?></a></li>
                                            <?php } ?>
                                            <li><a href="<?=base_url() ?>blog">Blog</a></li>
                                            <li><a href="<?=base_url() ?>contact">Contact</a></li>
                                            <?php
                                            if(!empty($this->session->userdata('userdashboard')))
                                                { ?>
                                            <li><a href="<?=base_url() ?>my-account">My Account</a></li>
                                        <?php } else { ?>
                                            <li><a href="<?=base_url() ?>login">Login</a></li>
                                        <?php } ?>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- main-menu-area end -->
                            </div>
                            <div class="col-lg-3">
                                <!-- social-follow-box start -->
                                <div class="social-follow-box">
                                    <div class="follow-title">
                                        <h2>Follow us:</h2>
                                    </div>
                                    <ul class="social-follow-list">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <!-- social-follow-box end -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-block d-lg-none">
                                <!-- Mobile Menu Area Start -->
                                <div class="mobile-menu-area">
                                    <div class="mobile-menu">
                                        <nav id="mobile-menu-active">
                                            <ul>
                                                <li class="active"><a href="<?=base_url() ?>">Home</a>
                                                </li>
                                            
                                                 <li><a href="<?=base_url() ?>about">About Us</a></li>
                                                <?php
                                                $categories = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));
                                                foreach($categories as $data)
                                                    { ?>
                                                <li><a href="<?=base_url('shop/'.$data->slug) ?>"><?=$data->name ?></a></li>
                                                <?php } ?>
                                                <li><a href="<?=base_url() ?>blog">Blog</a></li>
                                                <li><a href="<?=base_url() ?>contact">Contact</a></li>
                                                <?php
                                                if(!empty($this->session->userdata('id')))
                                                    { ?>
                                                <li><a href="<?=base_url() ?>my-account">My Account</a></li>
                                            <?php } else { ?>
                                                <li><a href="<?=base_url() ?>login">Login</a></li>
                                            <?php } ?>
                                            </ul>
                                        </nav>							
                                    </div>
                                </div>
                                <!-- Mobile Menu Area End -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header-bottom-area end -->
            </header>