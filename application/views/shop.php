<?php include ("header.php"); ?>
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Shop</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area end -->
            
            <!-- content-wraper start -->
            <div class="content-wraper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 order-2 order-lg-1">
                            <!--sidebar-categores-box start  -->
                            <div class="sidebar-categores-box mt-95">
                                <div class="sidebar-title">
                                    <h2>Our Category</h2>
                                </div>
                                <!-- category-sub-menu start -->
                                <div class="category-sub-menu">
                                    <ul>
                                        <?php 
                                        $cate = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));

                                        foreach ($cate as $key => $value) 
                                            {
                                                $product = $this->crud->selectDataByMultipleWhere('product',array('cat_id'=>$value->id));
                                             ?>
                                        <li class="has-sub"><a href="<?=base_url('shop/'.$value->slug) ?>"><?php echo $value->name; ?></a>
                                            <ul>
                                                <?php
                                                foreach($product as $data)
                                                    { ?>
                                                <li><a href="<?=base_url('product-details/'.$data->slug) ?>"><?=$data->name ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                       <?php } ?>
                                    </ul>
                                </div>
                                <!-- category-sub-menu end -->
                            </div>
                           
                        </div>


                        <div class="col-lg-9 order-1 order-lg-2">
                            <div class="shop-top-bar mt-95">
                                <div class="shop-bar-inner">
                                    <div class="product-view-mode">
                                        <ul class="nav shop-item-filter-list" role="tablist">
                                            <li class="active" role="presentation"><a aria-selected="true" class="active show" data-bs-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                            <li role="presentation"><a data-bs-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

<?php
if(!empty($productlist))
{ ?>

                            <div class="shop-products-wrapper mb-80">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="shop-product-area">
                                            <div class="row">
                                                <?php
                                                foreach ($productlist as $key => $data) 
                                                    { 
                                                        $cate = $this->crud->selectDataByMultipleWhere('categories',array('id'=>$data->cat_id,));
                                                        $subcate = $this->crud->selectDataByMultipleWhere('sub_categories',array('id'=>$data->sub_cat_id,));

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

                                                <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                    <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="<?=base_url('product-details/'.$data->slug) ?>">
                                                                <img class="primary-image" src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_img ?>" alt="">
                                                                <img class="secondary-image" src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_img2 ?>" alt="">
                                                            </a>
                                                            <!-- <div class="label-product"><?php echo discount($cut_price,$price); ?>% off</div> -->
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
                                                                <div class="manufacturer"><a href="<?=base_url('shop/'.$data->slug) ?>"><?php if(!empty($cate)) echo $cate[0]->name  ?></a></div>
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
                                                    <!-- single-product-wrap end -->
                                                </div>
                                                <?php } ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div id="list-view" class="tab-pane fade" role="tabpanel">
                                        <div class="row">
                                            <div class="col">
                                                <?php
                                                foreach ($productlist as $key => $data) 
                                                    { 
                                                        $cate = $this->crud->selectDataByMultipleWhere('categories',array('id'=>$data->cat_id,));
                                                        $subcate = $this->crud->selectDataByMultipleWhere('sub_categories',array('id'=>$data->sub_cat_id,));

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
                                                <div class="row product-layout-list">
                                                    <div class="col-lg-4 col-md-5 ">
                                                        <div class="product-image">
                                                            <a href="<?=base_url('product-details/'.$data->slug) ?>">
                                                                <img alt="" src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_img ?>" class="primary-image">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-7">
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
                                                                <h4><a href="<?=base_url('product-details/'.$data->slug) ?>" class="product_name"><?=$data->name ?></a></h4>
                                                                <div class="manufacturer"><a href="<?=base_url('shop/'.$data->slug) ?>"><?php if(!empty($cate)) echo $cate[0]->name ?></a></div>
                                                                <div class="price-box">
                                                                    <span class="new-price">₹ <?php echo number_format($price,2); ?></span>
                                                                    <span class="old-price">₹ <?php echo number_format($cut_price,2); ?></span>
                                                                </div>
                                                                <?=$data->small_info ?>
                                                                <div class="list-add-actions">
                                                                    <ul>
                                                                        <li style="cursor: pointer;" class="add-cart addtocart" data-p_id="<?=$data->id ?>" data-color_val="<?=$color_id ?>" data-size_val="<?=$size_id ?>"><a>Add to cart</a></li>
                                                                        <!-- <li><a href="#" data-bs-target="#exampleModalCenter" data-bs-toggle="modal" class="quick-view"><i class="ion-android-open"></i></a></li> -->
                                                                        <li><a href="<?=base_url('product-details/'.$data->slug) ?>" class="links-details"><i class="ion-clipboard"></i></a></li>
                                                                    </ul>
                                                                </div>
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
                            <?php } else  { ?>
    <img src="<?php echo base_url(); ?>media/admin/no-found.png" style="width: 100%;">
<?php } ?>
                        </div>



                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
<?php include ("footer.php"); ?>