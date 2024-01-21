<?php include('header.php'); ?>
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active"> <?=$EDITDATA[0]->name ?></li>
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
                            
                          
                            <div class="single-categories-1 recent-post">
                                <h3 class="blog-categorie-title">recent posts</h3>
                                <div class="all-recent-post">
                                    <?php
                                    $this->db->limit(10);
                                        $this->db->order_by('id desc');
                                        $blog = $this->crud->selectDataByMultipleWhere('blog',array('status'=>1,));
                                        foreach($blog as $data)
                                            { ?>
                                    <div class="single-recent-post">
                                        <div class="recent-img">
                                            <a href="<?=base_url('blog-details/'.$data->slug) ?>"><img alt="blog-img" src="<?=base_url() ?>media/uploads/blog/<?=$data->image ?>"></a>
                                        </div>
                                        <div class="recent-desc">
                                            <h6><a href="<?=base_url('blog-details/'.$data->slug) ?>"><?=$data->name ?></a></h6>
                                            <span><?=date('M d, Y',strtotime($data->addeddate)) ?></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 order-1 order-lg-2">
                            <div class="blog-details mt-95">
                                <div class="blog-hero-img">
                                    <img src="<?=base_url() ?>media/uploads/blog/<?=$EDITDATA[0]->image ?>" alt="">
                                </div>
                                <div class="blog-details-contend mb-60">
                                    <h3 class="blog-dtl-header"><?=$EDITDATA[0]->name ?></h3>
                                    <ul class="meta-box meta-blog d-flex">
                                        <li class="meta-date"><span><i aria-hidden="true" class="fa fa-calendar"></i><?=date('M d, Y',strtotime($EDITDATA[0]->addeddate)) ?></span></li>
                                    </ul>
                                    <?=$EDITDATA[0]->content ?>
                                   
                                </div>
                                
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
           <?php include('footer.php'); ?>
