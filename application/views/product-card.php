<?php
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