<?php
$sitesetting = $this->crud->fetchdatabyid('1','site_setting');
?> 
            <!-- footer-area start -->
            <footer class="footer-area">
                <!-- our-service-area  start -->
                <div class="our-service-area">
                    <div class="container-fluid">
                        <div class="our-service-inner">
                            <div class="col-custom">
                                <div class="single-service">
                                    <div class="service-icon">
                                        <img src="<?=base_url() ?>img/icon/f-1.png" alt="">
                                    </div>
                                    <div class="serivce-cont">
                                        <h3>Free delivery</h3>
                                        <p>Free shipping on all order</p>
                                    </div>
                                </div>
                                <!--fbgfnbfgng -->
                            </div>
                            <div class="col-custom">
                                <div class="single-service">
                                    <div class="service-icon">
                                        <img src="<?=base_url() ?>img/icon/f-2.png" alt="">
                                    </div>
                                    <div class="serivce-cont">
                                        <h3>Online Support 24/7</h3>
                                        <p>Support online 24 hours</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-custom">
                                <div class="single-service">
                                    <div class="service-icon">
                                        <img src="<?=base_url() ?>img/icon/f-3.png" alt="">
                                    </div>
                                    <div class="serivce-cont">
                                        <h3>Money Return</h3>
                                        <p>guarantee under 7 days</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-custom">
                                <div class="single-service">
                                    <div class="service-icon">
                                        <img src="<?=base_url() ?>img/icon/f-5.png" alt="">
                                    </div>
                                    <div class="serivce-cont">
                                        <h3>Member Discount</h3>
                                        <p>Onevery order over $130</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-custom">
                                <div class="single-service">
                                    <div class="service-icon">
                                        <img src="<?=base_url() ?>img/icon/f-6.png" alt="">
                                    </div>
                                    <div class="serivce-cont">
                                        <h3>SECURE PAYMENT</h3>
                                        <p>All cards accepted</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- our-service-area  end -->
                <div class="footer-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="about-us-footer">
                                    <div class="footer-logo">
                                        <a href="#"><img class="footer-logo" src="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>" alt=""></a>
                                    </div>
                                    <div class="footer-info">
                                        <p class="phone"><?=$sitesetting[0]->mobile ?></p>
                                        <p class="desc_footer">We are a team of designers and developers that create high quality Magento, Prestashop, Opencart.</p>
                                        <div class="social_follow">
                                            <ul class="social-follow-list">
                                                <li class="facebook"><a href="<?=$sitesetting[0]->facebook ?>"><i class="fa fa-facebook"></i></a></li>
                                                <li class="twitter"><a href="<?=$sitesetting[0]->twitter ?>"><i class="fa fa-twitter"></i></a></li>
                                                <li class="youtube"><a href="<?=$sitesetting[0]->youtube ?>"><i class="fa fa-youtube"></i></a></li>
                                                <li class="instagram"><a href="<?=$sitesetting[0]->instagram ?>"><i class="fa fa-instagram"></i></a></li>
                                            </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="footer-info-inner">
                                    <div class="row">

                                        <div class="col-lg-2 col-md-6 col-sm-6">
                                            <div class="footer-title">
                                                <h3>Quick Links</h3>
                                            </div>
                                            <ul>
                                                <li><a href="<?=base_url() ?>">Home </a></li>
                                                <li><a href="<?=base_url() ?>about">About Us </a></li>
                                                <li><a href="<?=base_url() ?>shop">Shop  </a></li>
                                                <li><a href="<?=base_url() ?>blog">Blog </a></li>
                                                <li><a href="<?=base_url() ?>contact">Contact Us </a></li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-2 col-md-6 col-sm-6">
                                            <div class="footer-title">
                                                <h3>Our Category</h3>
                                            </div>
                                            <ul>
                                                <?php
                                                $cate = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));
                                                foreach($cate as $data)
                                                    { ?>

                                                <li><a href="<?=base_url('shop/'.$data->slug) ?>"><?=$data->name ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>

                                        <div class="col-lg-2 col-md-6 col-sm-6">
                                            <div class="footer-title">
                                                <h3>Your account </h3>
                                            </div>
                                            <ul>
                                                <li><a href="<?=base_url() ?>login">Login</a></li>
                                                <li><a href="<?=base_url() ?>my-account">My Account</a></li>
                                                <li><a href="<?=base_url() ?>cart">Cart</a></li>
                                                <li><a href="<?=base_url() ?>checkout">Checkout</a></li>
                                                <li><a href="<?=base_url() ?>privacy-policy">Privacy Policy</a></li>
                                                <li><a href="<?=base_url() ?>term-condition">Term & Condition</a></li>
                                                <li><a href="<?=base_url() ?>shipping-policy">Shipping Policy</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-5 offset-xl-1 col-md-6 col-sm-6">
                                            <div class="footer-title">
                                                <h3>Get in touch</h3>
                                            </div>
                                            <div class="block-contact-text">
                                                <p>Call us: <span><?=$sitesetting[0]->mobile ?></span></p>
                                                <p>Email us: <span><?=$sitesetting[0]->email ?></span></p>
                                                <p>Address: <span><?=$sitesetting[0]->address ?></span></p>
                                            </div>
                                            <!-- <div class="time">
                                                <h3 class="time-title">Opening time</h3>
                                                <div class="time-text">
                                                    <p>
                                                        Open: <span>8:00 AM</span> - Close: <span>18:00 PM</span>
                                                        Saturday - Sunday: Close
                                                    </p>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="copyright">Copyright &copy; <a href="#">Galaxy 23</a>. All Rights Reserved</div>
                            </div>	
                            <div class="col-lg-6 col-md-6">
                                 <div class="payment"><img alt="" src="<?=base_url() ?>img/icon/payment.png"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer-area start -->
            
            <!-- Modal start-->
            <div class="modal fade modal-wrapper" id="exampleModalCenter" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-inner-area row">
                                <div class="col-lg-5 col-md-5 col-sm-12">
                                    <div class="single-product-tab">
                                        <div class="zoomWrapper">
                                            <div id="img-1" class="zoomWrapper single-zoom">
                                                <a href="#">
                                                    <img id="zoom1" src="<?=base_url() ?>img/product/1.jpg" data-zoom-image="<?=base_url() ?>img/product/1.jpg" alt="big-1">
                                                </a>
                                            </div>
                                            <div class="single-zoom-thumb">
                                                <ul class="s-tab-zoom single-product-active owl-carousel" id="gallery_01">
                                                    <li>
                                                        <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?=base_url() ?>img/product/1.jpg" data-zoom-image="<?=base_url() ?>img/product/1.jpg"><img src="<?=base_url() ?>img/product/1.jpg" alt="zo-th-1"/></a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#" class="elevatezoom-gallery" data-image="<?=base_url() ?>img/product/2.jpg" data-zoom-image="<?=base_url() ?>img/product/2.jpg"><img src="<?=base_url() ?>img/product/2.jpg" alt="zo-th-2"></a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#" class="elevatezoom-gallery" data-image="<?=base_url() ?>img/product/3.jpg" data-zoom-image="<?=base_url() ?>img/product/3.jpg"><img src="<?=base_url() ?>img/product/3.jpg" alt="ex-big-3" /></a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#" class="elevatezoom-gallery" data-image="<?=base_url() ?>img/product/4.jpg" data-zoom-image="<?=base_url() ?>img/product/4.jpg"><img src="<?=base_url() ?>img/product/4.jpg" alt="zo-th-4"></a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#" class="elevatezoom-gallery" data-image="<?=base_url() ?>img/product/5.jpg" data-zoom-image="<?=base_url() ?>img/product/5.jpg"><img src="<?=base_url() ?>img/product/5.jpg" alt="zo-th-5"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <!-- product-thumbnail-content start -->
                                    <div class="quick-view-content">
                                        <div class="product-info">
                                            <h2>Brand Name FREE RN 2018</h2>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="price-box">
                                               <span class="new-price">$225.00</span>
                                               <span class="old-price">$250.00</span>
                                            </div>
                                            <p>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom.</p>
                                            <div class="modal-size">
                                                <h4>Size</h4>
                                                <select>
                                                    <option title="S" value="1">S</option>
                                                    <option title="M" value="2">M</option>
                                                    <option title="L" value="3">L</option>
                                                </select>
                                            </div>
                                            <div class="modal-color">
                                                <h4>Color</h4>
                                                <div class="color-list">
                                                    <ul>
                                                        <li><a href="#" class="orange active"></a></li>
                                                        <li><a href="#" class="paste"></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="quick-add-to-cart">
                                                <form class="modal-cart">
                                                    <div class="quantity">
                                                        <label>Quantity</label>
                                                        <div class="cart-plus-minus">
                                                            <input class="cart-plus-minus-box" type="text" value="0">
                                                        </div>
                                                    </div>
                                                    <button class="add-to-cart" type="submit">Add to cart</button>
                                                </form>
                                            </div>
                                            <div class="instock">
                                                <p>In stock </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product-thumbnail-content end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
            <!-- Modal end-->
        </div>   
           
<style>
    .modal-dialog {
        position: relative;
    top: 15%;
        max-width: 725px;
    }
</style>

 <div id="myModal" class="modal fade">
        <div class="modal-dialog" >
          <!--  <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title"><?php echo website_name; ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <img src="<?=base_url() ?>img/model.jpeg" class="img-fluid" style="height: 275px;">
                    <h2 class="mt-3">Sign Up</h2>
                    <form  method="POST" action="<?php echo base_url('user/registration'); ?>" class="contact-form-inner" style="padding: 18px 23px;">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <label>Your Full Name <span class="required">*</span></label>
                                <input type="text" name="username">
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label>Your Mobile No: <span class="required">*</span></label>
                                <input type="number" name="mobile">
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label>Email <span class="required">*</span></label>
                                <input type="text" name="email">
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label>Password <span class="required">*</span></label>
                                <input type="password" name="password">
                            </div>
                        </div>
                        
                        <div class="contact-submit-btn">
                            <button class="button-login" type="submit" name="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>-->
        </div>
    </div>






        
		<!-- jQuery JS -->
        
        <script src="<?=base_url() ?>js/vendor/jquery-migrate-3.3.0.min.js"></script>
		<!-- all plugins JS hear -->	
        <script src="<?=base_url() ?>js/bootstrap.min.js"></script>	
        <script src="<?=base_url() ?>js/owl.carousel.min.js"></script>
        <script src="<?=base_url() ?>js/jquery.mainmenu.js"></script>	
        <script src="<?=base_url() ?>js/ajax-email.js"></script>
        <script src="<?=base_url() ?>js/plugins.js"></script>
		<!-- main JS -->		
        <script src="<?=base_url() ?>js/main.js"></script>

<script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<style>
       .goog-te-gadget {
    font-family: arial;
    font-size: 0!important;
    color: #666;
    white-space: nowrap;
}
</style>


  <script>
         $(document).on("click", ".modelview",(function(e) {
          var id = $(this).data("id");
          
          $.ajax({
                dataType:"json",
                url:"<?php echo base_url('welcome/modelviews'); ?>",
                method: "post",
                data:{id:id},

                success: function(data)
                {
                    var result = data;
                    var detail = data.data;
                    console.log(detail.image);
                    if(result.status==200)
                    {
                        
                        $("#p_name").html(detail.name);
                        $("#p_rating").html(detail.rating);
                        $("#p_original_price").html(detail.original_price);
                        $("#p_cut_price").html(detail.cut_price);
                        $("#p_small_info").html(detail.small_info);
                        $("#color_id").html(detail.color_id);
                        $("#size_id").html(detail.size);
                        $("#images").html(detail.image);
                        $("#modal1").addClass("is-visible");
                    }
                    else{
                        $("#p_name").html("error");
                        $("#p_rating").html("error");
                        $("#p_original_price").html("error");
                        $("#p_cut_price").html("error");
                        $("#p_small_info").html("error");
                        $("#size_id").html("error");
                    }
                }
            });          
        }));
    </script>

    <!-- ------add to cart----------- -->
    <script>
         $(document).on("click", ".addtocart",(function(e) {

          event.preventDefault();
          var p_id = $(this).data("p_id");
          var color_val = $(this).data("color_val");
          var size_val = $(this).data("size_val");
          var quantity = 1;

          $.ajax({
                url:"<?php echo base_url('cart/add'); ?>",
                method: "post",
                data:{p_id:p_id,quantity:quantity,color_val:color_val,size_val:size_val},
                success: function(data)
                {                    
                    console.log(data);
                    swal({title: "Item Added Successfully...", text: "", type: 
                        "success"}).then(function(){ 
                           location.reload();
                           }
                        );
                }
            });          
        }));
    </script>
    <!-- -------------delete cart item--------- -->
    <script>
        function deletecart(id)
        {
            console.log(id);

            $.ajax({
                url : "<?php echo base_url('cart/add_to_cart_delete'); ?>",
                method : "POST",
                data : {id:id,submit:1},
                success: function(data)
                {
                    console.log(data);
                    swal({title: "Item Delete Successfully...", text: "", type: 
                        "success"}).then(function(){ 
                           location.reload();
                           }
                        );
                }
            });
        }
    </script>
    <!-- -------------update cart item--------- -->
    <script>
        $(document).on('change', '.qty_set', function(){
           var quantity = $(this).val();
           var id = $(this).data("id");
           $.ajax({
            url:"<?php echo base_url('cart/update'); ?>",
            method:"POST",
            data:{id:id, quantity:quantity},
            success:function(data)
            {
                swal({title: "Quantity Update Successfully...", text: "", type: 
                    "success"}).then(function(){ 
                       location.reload();
                       }
                    );         
            }
           });
       });
    </script>


    <!-- ------add to wishlist----------- -->
    <script>
         $(document).on("click", ".addtowishlist",(function(e) {
          event.preventDefault();
          var p_id = $(this).data("p_id");
          var quantity = 1;
          $.ajax({
                url:"<?php echo base_url('wishlist/add'); ?>",
                method: "post",
                data:{p_id:p_id,quantity:quantity},
                success: function(data)
                {
                    swal({title: "Item Added Successfully...", text: "", type: 
                        "success"}).then(function(){ 
                           location.reload();
                           }
                        );
                    console.log(data);                   
                }
            });          
        }));
    </script>


    <!-- -------------deletewishlist item--------- -->
    <script>
        function deletewishlist(id)
        {
            console.log(id);

            $.ajax({
                url : "<?php echo base_url('wishlist/add_to_wishlist_delete'); ?>",
                method : "POST",
                data : {id:id,submit:1},
                success: function(data)
                {
                    swal({title: "Item Delete Successfully...", text: "", type: 
                        "success"}).then(function(){ 
                           location.reload();
                           }
                        );
                    console.log(data);
                }
            });
        }         
    </script>
    <!-- -------------update wishlist item--------- -->
    <script>
        $(document).on('change', '.qty_set_wishlist', function(){
           var quantity = $(this).val();
           var id = $(this).data("id");
           $.ajax({
            url:"<?php echo base_url('wishlist/update'); ?>",
            method:"POST",
            data:{id:id, quantity:quantity},
            success:function(data)
            {
            swal({title: "Quantity Update Successfully...", text: "", type: 
                "success"}).then(function(){ 
                   location.reload();
                   }
                );           
            }
           });
       });
    </script>


<script>
    $(document).ready(function(){
        if (window.location.href === "<?php echo base_url(); ?>") {
            setTimeout(function () {
        $("#myModal").modal('show');
  },);
    }
    });

    $(".close").click(function(){
            $("#myModal").modal('hide');
        });
</script>














    </body>


</html>