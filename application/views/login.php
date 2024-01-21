<?php include('header.php'); ?>
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active">Login and Register</li>
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
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="customer-login-register">
                                <h3>Login</h3>
                                <p><?php echo $this->session->flashdata('login_message'); ?></p>
                                <div class="login-Register-info">
                                    <form action="<?php echo base_url('user/user_login'); ?>" method="post"> 
                                        <p class="coupon-input form-row-first">
                                            <label>Email <span class="required">*</span></label>
                                            <input type="text" name="email">
                                        </p>
                                        <p class="coupon-input form-row-last">
                                            <label>password <span class="required">*</span></label>
                                            <input type="password" name="password">
                                        </p>
                                       <div class="clear"></div>
                                        <p>
                                            <button  name="submit" class="button-login" type="submit">Login</button>
                                            <!-- <label><input type="checkbox" value="1"><span>Remember me</span></label> -->
                                            <!-- <a href="#" class="lost-password">Lost your password?</a> -->
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-12">
                            <div class="customer-login-register">
                                <h3>Register</h3>
                                <p><?php echo $this->session->flashdata('register_message'); ?></p>
                                <div class="login-Register-info">
                                    <form action="<?php echo base_url('user/registration'); ?>" method="post"> 
                                        <p class="coupon-input form-row-first">
                                            <label>Your Full Name <span class="required">*</span></label>
                                            <input type="text" name="username">
                                        </p>
                                        <p class="coupon-input form-row-first">
                                            <label>Your Mobile No: <span class="required">*</span></label>
                                            <input type="number" name="mobile">
                                        </p>
                                        <p class="coupon-input form-row-first">
                                            <label>Email <span class="required">*</span></label>
                                            <input type="text" name="email">
                                        </p>
                                        <p class="coupon-input form-row-last">
                                            <label>Password <span class="required">*</span></label>
                                            <input type="password" name="password">
                                        </p>
                                       <div class="clear"></div>
                                        <p>
                                            <button class="button-login" type="submit" name="submit">Register</button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
            
   <?php include('footer.php'); ?>