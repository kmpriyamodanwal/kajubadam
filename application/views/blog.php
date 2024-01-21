<?php include ("header.php"); ?>
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active">Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area end -->
            
            <!-- content-wraper start -->
            <div class="content-wraper">
                <div class="container">
                    <div class="row">

                        <!--  -->

                        <div class="col-lg-12 order-1 order-lg-2">
                            <div class="blog-content-wrap mt-95">
                                <div class="row">
                                    <?php
                                        $this->db->order_by('id desc');
                                        $blog = $this->crud->selectDataByMultipleWhere('blog',array('status'=>1,));
                                        foreach($blog as $data)
                                            { ?>
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <!-- blog-wrapper start -->
                                        <div class="blog-wrapper mb-30 main-blog">
                                            <div class="blog-img mb-20">
                                                <a href="<?=base_url('blog-details/'.$data->slug) ?>">
                                                    <img alt="" src="<?=base_url() ?>media/uploads/blog/<?=$data->image ?>">
                                                </a>
                                            </div>
                                            <h3><a href="<?=base_url('blog-details/'.$data->slug) ?>"><?=$data->name ?></a></h3>
                                            <ul class="meta-box">
                                                <li class="meta-date"><span><i aria-hidden="true" class="fa fa-calendar"></i><?=date('M d, Y',strtotime($data->addeddate)) ?></span></li>
                                            </ul>
                                            <div class="blog-meta-bundle">
                                                <div class="blog-readmore">
                                                    <a href="<?=base_url('blog-details/'.$data->slug) ?>">Read more <i class="fa fa-angle-double-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- blog-wrapper end -->
                                    </div>

                               <?php } ?>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
        <?php include ("footer.php"); ?>