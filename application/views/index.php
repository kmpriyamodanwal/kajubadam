<?php include("header.php"); ?>
            
            <!-- slider-main-area start -->
            <!-- <div>
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                  <div class="carousel-indicators">

                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 0"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="" aria-current="true" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" class="" aria-current="true" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" class="" aria-current="true" aria-label="Slide 4"></button>
                  </div>
                  <div class="carousel-inner">

                    <div class="carousel-item active">
                        <video width="100%" height="100%" class="d-block w-100" autoplay muted loop>
                          <source src="<?=base_url() ?>media/1.mp4" type="video/mp4" >
                        </video>
                    </div>
                    <div class="carousel-item">
                        <video width="100%" height="100%" class="d-block w-100" autoplay muted loop>
                          <source src="<?=base_url() ?>media/2.mp4" type="video/mp4" >
                        </video>
                    </div>
                    <div class="carousel-item">
                        <video width="100%" height="100%" class="d-block w-100" autoplay muted loop>
                          <source src="<?=base_url() ?>media/3.mp4" type="video/mp4" >
                        </video>
                    </div>
                    <div class="carousel-item">
                        <video width="100%" height="100%" class="d-block w-100" autoplay muted loop>
                          <source src="<?=base_url() ?>media/4.mp4" type="video/mp4" >
                        </video>
                    </div>
                    <div class="carousel-item">
                        <video width="100%" height="100%" class="d-block w-100" autoplay muted loop>
                          <source src="<?=base_url() ?>media/5.mp4" type="video/mp4" >
                        </video>
                    </div>


                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>  
            </div> -->


            <div>
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                  <div class="carousel-indicators">
                   <?php
                    $this->db->order_by('id desc');
                    $slider = $this->crud->selectDataByMultipleWhere('slider',array('status'=>1,));
                    foreach($slider as $key => $data)
                        { ?>

                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$key ?>" class="<?php if($key==0) echo 'active'; ?>" aria-current="true" aria-label="Slide <?=$key ?>"></button>
                    <?php } ?>
                  </div>
                  <div class="carousel-inner">
                    <?php
                    $this->db->order_by('id desc');
                    $slider = $this->crud->selectDataByMultipleWhere('slider',array('status'=>1,));
                    foreach($slider as $key => $data)
                        { ?>
                    <div class="carousel-item <?php if($key==0) echo 'active'; ?>">
                        <?php
                        if($data->type==1)
                            { ?>
                      <img src="<?=base_url() ?>media/uploads/slider/<?=$data->image ?>" class="d-block w-100" alt="...">
                      <?php } else { ?>
                        <video width="100%" height="100%" class="d-block w-100" autoplay muted loop>
                          <source src="<?=base_url() ?>media/uploads/slider/<?=$data->video ?>" type="video/mp4" >
                        </video>
                      <?php } ?>
                    </div>
                     <?php } ?>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>  
            </div>
           
            <!-- slider-main-area end -->

<style>
/*    .product-area.pt-95 {
    background: black;
}
.product-tabs-list .nav {
    background: #000000 none repeat scroll 0 0;
}
.product-tabs-list .nav li {
    background: #060505 none repeat scroll 0 0;
}
.product-tabs-list .nav li a.active {
    color: #fffcfc;
}*/
</style>
            <div class="product-area pt-95">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="section-title"> 
                                <div class="product-tabs-list">
                                    <ul role="tablist" class="nav">
                                       <li class="active" role="presentation"><a data-bs-toggle="tab" role="tab" aria-controls="new-arrivals" href="#new-arrivals" class="active show" aria-selected="true">New Arrival</a></li>
                                       <li role="presentation"><a data-bs-toggle="tab" role="tab" aria-controls="best-sellers" href="#best-sellers">Bestseller</a></li>
                                       <li role="presentation"><a data-bs-toggle="tab" role="tab" aria-controls="on-sellers" href="#on-sellers"> Featured Products</a></li>
                                   </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">

                        <div id="new-arrivals" class="tab-pane active show" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    <?php
                                    $this->db->order_by('id desc');
                                    $newarrival = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,'new_arrival'=>1,));
                                    foreach($newarrival as $data)
                                        { ?>
                                    <?php $this->load->view('product-card',array('data'=>$data)); ?>
                                <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div id="best-sellers" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    <?php
                                    $this->db->order_by('id desc');
                                    $Bestseller = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,'our_best'=>1,));
                                    foreach($Bestseller as $data)
                                        { ?>
                                    <?php $this->load->view('product-card',array('data'=>$data)); ?>
                                <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div id="on-sellers" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    <?php
                                    $this->db->order_by('id desc');
                                    $Featured = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,'feauture_product'=>1,));
                                    foreach($Featured as $data)
                                        { ?>
                                    <?php $this->load->view('product-card',array('data'=>$data)); ?>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
$this->db->order_by('id desc');
$this->db->limit(1);
$dela_of_day = $this->crud->selectDataByMultipleWhere('dela_of_day',array('status'=>1,));
if(!empty($dela_of_day))
{
?>
            <div class="banner-area ptb-95" style="padding-bottom: 0px;">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        foreach($dela_of_day as $data)
                        {
                        ?>
                        <div class="col-lg-12">
                            <div class="single-banner-box-2">
                                <a href="<?=$data->url ?>">
                                     <?php
                        if($data->type==1)
                            { ?>

                            <img src="<?=base_url() ?>media/uploads/dela_of_day/<?=$data->image ?>" alt="">
                      <?php } else { ?>
                        <video width="100%" height="100%" class="d-block w-100" autoplay muted loop>
                          <source src="<?=base_url() ?>media/uploads/dela_of_day/<?=$data->video ?>" type="video/mp4" >
                        </video>
                      <?php } ?>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
<?php } ?>
            

                  
        <?php
$categories = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));
foreach($categories as $data)
{
    $product = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,'cat_id'=>$data->id,));
    if(!empty($product))
    {
?>
            <div class="product-area ptb-40">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="section-title-3">
                                        <h2><?=$data->name ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="tab-content">
                                        <div id="for-men" class="tab-pane active show" role="tabpanel">
                                            <div class="row">
                                                <div class="product-active-3 owl-carousel">
                                                    <?php
                                                    foreach($product as $value2)
                                                        { 
                                                            $cate = $this->crud->selectDataByMultipleWhere('categories',array('id'=>$value2->cat_id,));

                                                            $color_id = 0;
                                                            $this->db->group_by('color_id');
                                                            $this->db->limit(1);
                                                            $this->db->select("color_id");
                                                            $color = $this->db->get_where('all_images',array('p_id'=>$value2->id,))->result_object();
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
                                                            $color = $this->db->get_where('all_images',array('p_id'=>$value2->id,))->result_object();
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
                                                            $color = $this->db->get_where('all_images',array('p_id'=>$value2->id,))->result_object();
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
                                                            $color = $this->db->get_where('all_images',array('p_id'=>$value2->id,))->result_object();
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
                                                        <div class="single-product-wrap">
                                                            <div class="product-image">
                                                                <a href="<?=base_url('product-details/'.$value2->slug) ?>">
                                                                    <img class="primary-image" src="<?=base_url() ?>media/uploads/product/<?=$value2->thumb_img ?>" alt="">
                                                                    <img class="secondary-image" src="<?=base_url() ?>media/uploads/product/<?=$value2->thumb_img2 ?>" alt="">
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
                                                                                    if($i<=$value2->rating)
                                                                                        {  ?>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                        <?php } else { ?>
                                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                                <?php } $i++; } ?>
                                                                        </ul>
                                                                    </div>
                                                                    <h4><a class="product_name" href="<?=base_url('product-details/'.$value2->slug) ?>"><?=$value2->name ?></a></h4>
                                                                    <div class="price-box">
                                                                        <span class="new-price">₹ <?php echo number_format($price,2); ?></span>
                                                                        <span class="old-price">₹ <?php echo number_format($cut_price,2); ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="add-actions">
                                                                    <ul class="add-actions-link">

                                                                        <li style="cursor: pointer;" class="add-cart addtocart" data-p_id="<?=$data->id ?>" data-color_val="<?=$color_id ?>" data-size_val="<?=$size_id ?>" ><a><i class="ion-android-cart"></i> Add to cart</a></li>
                                                                        <!-- <li><a class="quick-view" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" href="#"><i class="ion-android-open"></i></a></li> -->
                                                                        <li><a class="links-details" href="<?=base_url('product-details/'.$value2->slug) ?>"><i class="ion-clipboard"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php } } ?>




        <?php
$this->db->limit(3);
        $this->db->order_by('id desc');
        $offer = $this->crud->selectDataByMultipleWhere('offer_banners',array('status'=>1,));
        if(!empty($offer))
        {
        ?>
            <div class="banner-area mt-40">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        foreach($offer as $data)
                        {
                        ?>
                        <div class="col-lg-4 col-custom-4 col">
                            <div class="single-banner-box mb-20">
                                <a href="<?=$data->link ?>">
                                    <?php
                        if($data->type==1)
                            { ?>

                            <img src="<?=base_url() ?>media/uploads/offer_banners/<?=$data->image ?>" alt="">
                      <?php } else { ?>
                        <video width="100%" height="100%" class="d-block w-100" autoplay muted loop>
                          <source src="<?=base_url() ?>media/uploads/offer_banners/<?=$data->video ?>" type="video/mp4" >
                        </video>
                      <?php } ?>
                                    <!-- <img src="<?=base_url() ?>media/uploads/offer_banners/<?=$data->image ?>" alt=""> -->
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
            

      
             
            <div class="content-wraper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shop-top-bar mt-95 justify-content-center">
                                <div class="customer-login-register">
                                    <h3>Our Product</h3>
                                </div>                                
                            </div>
                            
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="shop-product-area">
                                            <div class="row">
                                                        <?php
                                                        $this->db->order_by('id desc');
                                                        $product = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,));
                                                        foreach($product as $data)
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
                                                <div class="col-xl-2 col-lg-3 laptop-5 col-md-4 col-sm-6 mt-40">
                                                    <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="<?=base_url('product-details/'.$data->slug) ?>">
                                                                <img class="primary-image" src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_img ?>" alt="">
                                                                <img class="secondary-image" src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_img2 ?>" alt="">
                                                            </a>
                                                            <div class="label-product">-<?php echo discount($cut_price,$price); ?>% off</div>
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
                                                                    <li style="cursor: pointer;" class="add-cart addtocart" data-p_id="<?=$data->id ?>" data-color_val="<?=$color_id ?>" data-size_val="<?=$size_id ?>"><a ><i class="ion-android-cart"></i> Add to cart</a></li>

                                                                    <!-- <li><a class="quick-view" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" href="#"><i class="ion-android-open"></i></a></li> -->
                                                                    <li><a class="links-details" href="<?=base_url('product-details/'.$data->slug) ?>"><i class="ion-clipboard"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>

                                                
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>





<?php
$this->db->limit(1);
$this->db->order_by('id desc');
$offer = $this->crud->selectDataByMultipleWhere('singlebanner',array('status'=>1,));
if(!empty($offer))
{
?>
            <div class="banner-area ptb-95">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        foreach($offer as $data)
                        {
                        ?>
                        <div class="col-lg-12">
                            <div class="single-banner-box-2">
                                <a href="<?=$data->link ?>">
                                     <?php
                        if($data->type==1)
                            { ?>

                            <img src="<?=base_url() ?>media/uploads/singlebanner/<?=$data->image ?>" alt="">
                      <?php } else { ?>
                        <video width="100%" height="100%" class="d-block w-100" autoplay muted loop>
                          <source src="<?=base_url() ?>media/uploads/singlebanner/<?=$data->video ?>" type="video/mp4" >
                        </video>
                      <?php } ?>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
<?php } ?>


            

           

          
            <!-- newsletter-area start --> 
            <div class="newsletter-area ptb-95" style="padding-top:0px">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="newsletter-inner text-center newsletter-bg">
                                <h4 class="text">Join our</h4>
                                <h2>Newsletters now!</h2>
                                <p class="desc">Subscribe to the Juta mailing list to receive updates on new arrivals, offers and other discount information.</p>
                                <form action="" method="post" class="newletter-input popup-subscribe-form validate">
                                    <input id="mc-email" type="email" autocomplete="off" placeholder="Your email address">
                                    <button id="mc-submit" type="submit" class="btn btn-primary"><span>Subscribe !</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- newsletter-area end -->
     <?php include("footer.php"); ?>




   
