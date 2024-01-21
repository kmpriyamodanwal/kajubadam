<?php include("header.php"); ?>
<style>
.slider-images
{
    position: relative;
}
/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: black;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}



/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a> </li>
                                <li class="breadcrumb-item active"> <?=$EDITDATA[0]->name ?></li>
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
                        <div class="col">
                            <div class="row single-product-area">
                                <div class="col-xl-4  col-lg-6 offset-xl-1 col-md-5 col-sm-12" id="image-fetch">
                                    <div class="slider-images" >
                                        <div id="image1"></div>
                                                                              
                                      <a class="prev" onclick="plusSlides(-1)">❮</a>
                                        <a class="next" onclick="plusSlides(1)">❯</a>

                                      
                                      <div class="row" id="image2">
                                                                                
                                      </div>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-6 col-md-7 col-sm-12">
                                    <!-- product-thumbnail-content start -->
                                    <div class="quick-view-content">
                                        <div class="product-info">
                                            <h2><?=$EDITDATA[0]->name ?></h2>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <?php
                                                    $i=1;
                                                    while($i<=5)
                                                    {
                                                        if($i<=$EDITDATA[0]->rating)
                                                            {  ?>
                                                    <li><i class="fa fa-star"></i></li>
                                                            <?php } else { ?>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                    <?php } $i++; } ?>
                                                </ul>
                                            </div>
                                            <div class="price-box">
                                               <span class="new-price">₹ <span id="price"></span></span>
                                               <span class="old-price">₹ <span id="cut_price"></span></span>
                                            </div>
                                            <?=$EDITDATA[0]->small_info ?>

                                            <div class="modal-color">
                                                <h4>Size</h4>
                                                <div class="size-list">
                                                    <ul>
                                                        <?php
                                                        $this->db->group_by('size_id');
                                                        $size = $this->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$EDITDATA[0]->id,));
                                                        if(!empty($size))
                                                        {
                                                            foreach ($size as $key => $value) 
                                                            {
                                                            $size_name = $this->crud->selectDataByMultipleWhere('size',array('id'=>$value->size_id));
                                                            ?>
                                                        <li>
                                                            <a data-size_select_id="<?=$size_name[0]->id ?>" class="size_value <?php if($key==0) echo 'active'; ?>" style="background: black;    padding: 2px 10px;height: 100%;width: 100%;color: white;"><?=$size_name[0]->name ?></a></li>
                                                        <?php } } ?>
                                                    </ul>
                                                </div>
                                            </div>

                                            

                                            <div class="modal-color">
                                                <h4>Color</h4>
                                                <div class="color-list">
                                                    <ul>
                                                        <?php
                                                        $this->db->group_by('color_id');
                                                        $color = $this->db->get_where('all_images',array('p_id'=>$EDITDATA[0]->id,))->result_object();

                                                        if(!empty($color))
                                                        {
                                                            foreach ($color as $key => $value) 
                                                                { 
                                                        $color_name = $this->db->get_where('color',array('id'=>$value->color_id))->result_object();
                                                        ?>
                                                        <li>
                                                            <a data-color_select_id="<?=$color_name[0]->id ?>" class="color_value <?php if($key==0) echo 'active'; ?>" style="background: <?=$color_name[0]->color_code ?> none repeat scroll 0 0;"></a></li>
                                                        <?php } } ?>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="quick-add-to-cart">
                                                <form class="modal-cart">
                                                    <div class="quantity">
                                                        <label>Quantity</label>
                                                        <div class="cart-plus-minus">
                                                            <input class="cart-plus-minus-box" type="text" value="1" id="quantity">
                                                        </div>
                                                    </div>
                                                    <button class="add-to-cart single-add-cart" type="button">Add to cart</button>
                                                    <button class="add-to-cart single-add-cart btn-dark" style="background: black;color: white;" type="button">Buy Now</button>
                                                </form>
                                            </div>
                                            <!-- <div class="instock">
                                                <p>In stock </p>
                                            </div> -->
                                            <!-- <div class="social-sharing">
                                                <h3>Share</h3>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                </ul>
                                            </div> -->
                                        </div>
                                    </div>
                                    <!-- product-thumbnail-content end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-info-review">
                        <div class="row">
                            <div class="col">
                                <div class="product-info-detailed">
                                    <div class="discription-tab-menu">
                                        <ul role="tablist" class="nav">
                                            <li class="active"><a href="#description" data-bs-toggle="tab" class="active show">Description</a></li>
                                            <li><a href="#additional" data-bs-toggle="tab">Additional Information</a></li>
                                            <?php
                                            if(!empty($EDITDATA[0]->upload_video))
                                                { ?>
                                            <li><a href="#video" data-bs-toggle="tab">Video</a></li>
                                        <?php } ?>
                                            <!-- <li><a href="#review" data-bs-toggle="tab">Reviews (1)</a></li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="discription-content">
                                    <div class="tab-content">

                                        <div class="tab-pane fade in active show" id="description">
                                            <div class="description-content">
                                                <?=$EDITDATA[0]->description ?>
                                            </div>
                                        </div>

                                        <div id="additional" class="tab-pane fade">
                                            <div class="description-content">
                                                <?=$EDITDATA[0]->additional_info ?>
                                            </div>
                                        </div>
                                        <?php
                                            if(!empty($EDITDATA[0]->upload_video))
                                                { ?>
                                       <!-- <div id="video" class="tab-pane fade">
                                            <div class="description-content text-center">
                                                  <video width="320" height="240" controls>
                                                    <source src="<?=base_url() ?>media/uploads/product/<?php echo $EDITDATA[0]->upload_video; ?>" type="video/mp4">
                                                  </video>
                                            </div>
                                        </div>-->
                                    <?php } ?>
                                        <div id="review" class="tab-pane fade">
                                            <form class="form-review">
                                                <div class="review">
                                                    <table class="table table-striped table-bordered table-responsive">
                                                        <tbody>
                                                            <tr>
                                                                <td class="table-name"><strong>Palora Themes</strong></td>
                                                                <td class="text-right">08/06/2018</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <p>It’s both good and bad. If Nikon had achieved a high-quality wide lens camera with a 1 inch sensor, that would have been a very competitive product. So in that sense, it’s good for us. But actually, from the perspective of driving the 1 inch sensor market, we want to stimulate this market and that means multiple manufacturers.</p>    
                                                                    <ul>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="review-wrap">
                                                    <h2>Write a review</h2>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="control-label">Your Name</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="control-label">Your Review</label>
                                                            <textarea class="form-control"></textarea>
                                                            <div class="help-block"><span class="text-danger">Note:</span> php is not translated!</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="control-label">Rating</label>
                                                            &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                            <input type="radio" value="1" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="2" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="3" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="4" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="5" name="rating">
                                                            &nbsp;Good
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="buttons clearfix">
                                                    <div class="pull-right">
                                                        <button class="button-review" type="button">Continue</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
            
            <!-- product-area start -->
            <div class="product-area ptb-95">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="section-title-3">
                                <h2>Same Category:</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="product-active-3 owl-carousel">
                            <?php
                            $this->db->order_by('id desc');
                            $Featured = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,'cat_id'=>$EDITDATA[0]->cat_id,));
                            foreach($Featured as $data)
                                { 

                                    $cate = $this->crud->selectDataByMultipleWhere('categories',array('id'=>$data->cat_id,));

                                    $color_id = 0;
                                    $this->db->group_by('color_id');
                                    $this->db->limit(1);
                                    $this->db->select("color_id");
                                    $color = $this->db->get_where('all_images',array('p_id'=>$data->id,))->result_object();
                                    if(!empty($color))
                                    {
                                        foreach ($color as $key => $value) 
                                        { 
                                            $color_id = $value->color_id;
                                            break;
                                        } 
                                    }

                                    $size_id = 0;
                                    $this->db->group_by('size_id');
                                    $this->db->limit(1);
                                    $this->db->select("size_id");
                                    $color = $this->db->get_where('all_images',array('p_id'=>$data->id,))->result_object();
                                    if(!empty($color))
                                    {
                                        foreach ($color as $key => $value) 
                                        { 
                                            $size_id = $value->size_id;
                                            break;
                                        } 
                                    }

                                    $price = 0;
                                    $this->db->group_by('price');
                                    $this->db->limit(1);
                                    $this->db->select("price");
                                    $color = $this->db->get_where('all_images',array('p_id'=>$data->id,))->result_object();
                                    if(!empty($color))
                                    {
                                        foreach ($color as $key => $value) 
                                        { 
                                            $price = $value->price;
                                            break;
                                        } 
                                    }

                                    $cut_price = 0;
                                    $this->db->group_by('cut_price');
                                    $this->db->limit(1);
                                    $this->db->select("cut_price");
                                    $color = $this->db->get_where('all_images',array('p_id'=>$data->id,))->result_object();
                                    if(!empty($color))
                                    {
                                        foreach ($color as $key => $value) 
                                        { 
                                            $cut_price = $value->cut_price;
                                            break;
                                        } 
                                    }
                                ?>

                            <div class="col">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="<?=base_url('product-details/'.$data->slug) ?>">
                                            <img class="primary-image" src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_img ?>" alt="">
                                            <img class="secondary-image" src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_img2 ?>" alt="">
                                        </a>
                                        <div class="label-product"><?php echo discount($cut_price,$price); ?>% off</div>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <?php
                                                    $i=1;
                                                    while($i<=5)
                                                    {
                                                        if($i<=$data->rating)
                                                            {  ?>
                                                    <li><i class="fa fa-star"></i></li>
                                                            <?php } else { ?>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                    <?php } $i++; } ?>
                                                </ul>
                                            </div>
                                            <h4><a class="product_name" href="<?=base_url('product-details/'.$data->slug) ?>"><?=$data->name ?></a></h4>
                                            <div class="manufacturer"><a href="<?=base_url('shop/'.$cate[0]->slug) ?>"><?php echo $cate[0]->name; ?></a></div>
                                            <div class="price-box">
                                                <span class="new-price">₹ <?php echo number_format($price,2); ?></span>
                                                <span class="old-price">₹ <?php echo number_format($cut_price,2); ?></span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li style="cursor: pointer;" class="add-cart addtocart" data-p_id="<?=$data->id ?>" data-color_val="<?=$color_id ?>" data-size_val="<?=$size_id ?>"><a href="#"><i class="ion-android-cart"></i> Add to cart</a></li>

                                                <!-- <li><a class="quick-view" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" href="#"><i class="ion-android-open"></i></a></li> -->

                                                <li><a class="links-details" href="<?=base_url('product-details/'.$data->slug) ?>"><i class="ion-clipboard"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                           
                           <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product-area end -->
            
        <?php include("footer.php"); ?>

<script>
    var color_value = 0;
    var size_value = 0;

    $(document).on("click", ".size_value",(function(e) {
        $(".size_value").removeClass('active');
        $(this).addClass('active');
      color_size_image();
      event.preventDefault();
    }));

    $(document).on("click", ".color_value",(function(e) {
          $(".color_value").removeClass('active');
          $(this).addClass('active');
          color_size_image();
          event.preventDefault();
    }));



    function color_size_image()
        {
            // var size_value = $('.size_value').find(":selected").val();
            size_value = $(".size_value.active").data("size_select_id");
            color_value = $(".color_value.active").data("color_select_id");
            
            var form = new FormData();
            form.append("p_id", <?=$EDITDATA[0]->id ?>);
            form.append("size_id", size_value);
            form.append("color_id", color_value);


            var settings = {
              "url": "<?=base_url() ?>size_color_image/image_by_colorsize",
              "method": "POST",
              "timeout": 0,
              "dataType": "json",
              "processData": false,
              "mimeType": "multipart/form-data",
              "contentType": false,
              "data": form
            };

            $.ajax(settings).done(function (response) {
              console.log(response);
              $('#image1').html(response.data1);
              $('#image2').html(response.data2);
              $('#price').html(response.html.price);
              $('#cut_price').html(response.html.cut_price);

              let slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
              showSlides(slideIndex += n);
            }

            function currentSlide(n) {
              showSlides(slideIndex = n);
            }

            function showSlides(n) {
              let i;
              let slides = document.getElementsByClassName("mySlides");
              let dots = document.getElementsByClassName("demo");
              let captionText = document.getElementById("caption");
              if (n > slides.length) {slideIndex = 1}
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
              }
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";
              dots[slideIndex-1].className += " active";
              captionText.innerHTML = dots[slideIndex-1].alt;
            }
            });

        }
        color_size_image();

        $(document).on("click", ".single-add-cart",(function(e) {
          single_add_to_cart();
          event.preventDefault();
        }));

        function single_add_to_cart()
        {
            var quantity = $("#quantity").val();
            // var size_value = $('.size_value').find(":selected").val();
            size_value = $(".size_value.active").data("size_select_id");
            color_value = $(".color_value.active").data("color_select_id");

            var form = new FormData();
            form.append("p_id", <?=$EDITDATA[0]->id ?>);
            form.append("size_id", size_value);
            form.append("color_id", color_value);
            form.append("quantity", quantity);

            var settings = {
              "url": "<?=base_url() ?>cart/add_to_cart_from_product_details",
              "method": "POST",
              "dataType": "json",
              "timeout": 0,
              "processData": false,
              "mimeType": "multipart/form-data",
              "contentType": false,
              "data": form
            };

            $.ajax(settings).done(function (response) {
              console.log(response);
              window.location.href = "<?=base_url() ?>cart";
              swal({title: response.message, text: "", type: 
                    "success"}).then(function(){ 
                       window.location.href = "<?=base_url() ?>cart";
                       }
                    ); 
            });
        }
</script>


<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

