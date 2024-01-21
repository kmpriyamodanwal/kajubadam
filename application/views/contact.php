<?php 
$sitesetting = $this->crud->fetchdatabyid('1','site_setting');
include ("header.php"); ?>
            
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active">Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area end -->
            
            <!-- content-wraper start -->
            <div class="content-wraper">
                <div class="container-fluid  p-0">
                    <div class="row no-gutters">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <div class="contact-form-inner">
                                <h2>TELL US YOUR PROJECT</h2>
                                <p><?php echo $this->session->flashdata('message'); ?></p>
                                <form  method="POST" action="<?=base_url('welcome/enquiry_form') ?>">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <input type="text" placeholder="Full name*" name="name">
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <input type="text"  placeholder="Email*" name="email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <input type="text"  placeholder="Mobile*" name="mobile">
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <input type="text" placeholder="Subject*" name="subject">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <textarea placeholder="Message *" name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="contact-submit-btn">
                                        <button class="submit-btn" type="submit" name="submit">Send Email</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12 plr-0">
                            <div class="contact-address-area">
                                <h2>CONTACT US</h2>
                                <!-- <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est</p> -->
                                <ul>
                                    <li>
                                        <i class="fa fa-fax">&nbsp;</i> Address : <?=$sitesetting[0]->address ?></li>
                                    <li>
                                        <i class="fa fa-phone">&nbsp;</i> <?=$sitesetting[0]->mobile ?>, <?=$sitesetting[0]->alt_mobile ?></li>
                                    <li>
                                        <i class="fa fa-envelope-o"></i>&nbsp; <?=$sitesetting[0]->email ?>, <?=$sitesetting[0]->alt_email ?></li>
                                </ul>
                                <!-- <h3>
                                    Working hours
                                </h3>
                                <p class="m-0"><strong>Monday &ndash; Saturday</strong>: &nbsp;08AM &ndash; 22PM</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-page-map">
                    <!-- Google Map Start -->
                    <div class="container-fluid p-5">
                        <div id="map">
                            <?=$sitesetting[0]->map ?>
                        </div>
                    </div>
                    <!-- Google Map End -->
                </div>
            </div>
            <!-- content-wraper end -->
      <?php include ("footer.php"); ?>