<?php 
$about = $this->crud->fetchdatabyid('2','site_setting');
include ("header.php"); ?>
            
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active">About us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area end -->
            
            <!-- content-wraper start -->
            <div class="content-wraper mt-95">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-12">
                            <div class="about-info-wrapper">
                                <?php echo $about[0]->content ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <!-- testimonials-area start -->
            <div class="testimonials-area">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-lg-8">
                            <div class="testimonials-active owl-carousel">
                                <?php
                                $this->db->order_by('id desc');
                                $testi = $this->crud->selectDataByMultipleWhere('testimonials',array('status'=>1,));
                                foreach($testi as $data)
                                    { ?>
                                <div class="single-testimonial text-center">
                                    <img alt="" src="<?=base_url() ?>media/uploads/testimonials/<?=$data->image ?>" style="max-height: 75px;border-radius: 20px;">
                                    <p><?=$data->content ?></p>
                                    <h4><?=$data->name ?></h4>
                                    <span><?=$data->position ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- testimonials-area end -->
         <?php include ("footer.php"); ?>