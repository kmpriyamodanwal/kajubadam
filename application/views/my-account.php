<?php 
$sitesetting =  $this->crud->fetchdatabyid('1','site_setting');
$temp_session_id = temp_session_id();
$userdetails = $this->crud->selectDataByMultipleWhere('registration',array('id'=>$temp_session_id));
// print_r($userdetails);

include('header.php'); ?>
            
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active">My Account</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area end -->
<style>
    tr{
        border-bottom: 1px solid black;
    }

    li.pagination__list>strong {
        display: inline-block;
        width: 4rem;
        height: 4rem;
        line-height: 3.8rem;
        background: var(--secondary-color);
        border-color: var(--secondary-color);
        color: var(--white-color);
        font-size: 1.6rem;
        font-weight: 600;
        text-align: center;
        border-radius: 50%;
        border: 1px solid var(--border-color2);
    }

    .center>strong:hover {
    background-color: #ddd;
    }

li.pagination__list>a
{
    display: inline-block;
        width: 4rem;
        height: 4rem;
        line-height: 3.8rem;
        background: white;
        border-color: var(--secondary-color);
        color: black;
        font-size: 1.6rem;
        font-weight: 600;
        text-align: center;
        border-radius: 50%;
        border: 1px solid var(--border-color2);
}
</style>         
            <!-- content-wraper start -->
            <div class="content-wraper mt-95">
                <div class="container-fluid">
                    <div class="account-dashboard mtb-60">
                        <div class="dashboard-upper-info">
                           <div class="row align-items-center no-gutters">
                               <div class="col-lg-3 col-md-12">
                                   <div class="d-single-info">
                                       <p class="user-name">Hello <span><?=$userdetails[0]->username ?></span></p>
                                       <p>(not <?=$userdetails[0]->username ?>? <a href="<?=base_url('user/userlogout') ?>">Log Out</a>)</p>
                                   </div>
                               </div>
                               <div class="col-lg-4 col-md-12">
                                   <div class="d-single-info">
                                       <p>Need Assistance? Customer service at.</p>
                                       <p><?=$sitesetting[0]->email ?></p>
                                   </div>
                               </div>
                               <div class="col-lg-3 col-md-12">
                                   <div class="d-single-info">
                                       <p>E-mail them at </p>
                                       <p><?=$sitesetting[0]->alt_email ?></p>
                                   </div>
                               </div>
                               <div class="col-lg-2 col-md-12">
                                   <div class="d-single-info text-lg-center">
                                       <a class="view-cart" href="<?=base_url() ?>cart"><i class="fa fa-cart-plus"></i>view cart</a>
                                   </div>
                               </div>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-2">
                                <!-- Nav tabs -->
                                <ul class="nav flex-column dashboard-list" role="tablist">
                                    <li><a class="nav-link active" data-bs-toggle="tab" href="#dashboard">Dashboard</a></li>
                                    <li> <a class="nav-link" data-bs-toggle="tab" href="#orders">Orders</a></li>
                                    <li><a class="nav-link"  href="<?=base_url() ?>cart">Cart</a></li>
                                    <li><a class="nav-link" data-bs-toggle="tab" href="#account-details">Account details</a></li>
                                    <li><a class="nav-link" href="<?=base_url() ?>user/userlogout">logout</a></li>
                                </ul>
                            </div>
                            <div class="col-md-12 col-lg-10">
                                <!-- Tab panes -->
                                <div class="tab-content dashboard-content">
                                    <div id="dashboard" class="tab-pane fade show active">
                                        <h3>Dashboard </h3>
                                        <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                    </div>
                                    <div id="orders" class="tab-pane fade">
                                        <h3>Orders</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Order ID</th>
                                                        <th>Date</th>
                                                        <th>Product Details</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>	 	 	 	
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $i=0;
                                                   
                                                    foreach($temp as $data)
                                                        { $i++;
                                                            $user_id = $data->user_id;
                                                        $orders = $this->crud->selectDataByMultipleWhere('orders',array('order_id'=>$data->order_id,'user_id'=>$temp_session_id,));   
                                                        $product = $this->crud->selectDataByMultipleWhere('product',array('id'=>$orders[0]->p_id,)); 
                                                                                               
                                                    ?>
                                                    <tr>
                                                        <td><?=$i ?></td>
                                                        <td><?php echo $data->order_id; ?></td>
                                                        <td><?php echo date('M d, Y',strtotime($data->addeddate)); ?></td>
                                                        <td style="display: ;align-items: center;justify-content: start;">
                                                            <?php
                                                            if(!empty($product))
                                                                { ?>
                                                            <img src="<?php echo base_url(); ?>media/uploads/product/<?php echo $product[0]->thumb_img; ?>" style="height: 90px;border-radius: 50%;margin-right: 19px;">
                                                            <strong><?php echo $product[0]->name; ?></strong>
                                                        <?php } ?>
                                                        </td>
                                                        <td><?=order_status($data->status) ?></td>

                                                        <td>
                                                            <?php
                                                            if($data->status!=6 && $data->status!=7 && $data->status!=8)
                                                                { ?>
                                                            <a class="btn btn-sm btn-primary" target="_blank" href="<?php echo base_url('userinvoice/'.$data->id); ?>">view</a>
                                                            <br>
                                                            <a class="mt-2 btn btn-sm btn-danger cancel-order-btn" data-order_id="<?=$data->order_id ?>">Cancel Order</a>
                                                        <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <?php
                                            if($user_id==temp_session_id())
                                                { ?>
                                            <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
                                                <li class="pagination__list"><?php echo $links; ?></li>                                    
                                            </ul>
                                        <?php } ?>
                                        </div>
                                    </div>
                                    
                                    
                                    <div id="account-details" class="tab-pane fade">
                                        <h3>Account details </h3>
                                        <div class="login">
                                            <div class="login-form-container">
                                                <div class="account-login-form">
                                                    <form action="<?php echo base_url('user/user_update'); ?>" method="post">
                                                        <p><?php echo $this->session->flashdata('update_message'); ?></p>

                                                        <label>Username</label>
                                                        <input name="username" type="text" value="<?php echo $userdetails[0]->username; ?>">

                                                        <label>Mobile</label>
                                                        <input name="mobile" type="number" value="<?php echo $userdetails[0]->mobile; ?>">

                                                        <label>Email</label>
                                                        <input name="email" type="text" value="<?php echo $userdetails[0]->email; ?>">

                                                        <label>Street address </label>
                                                        <input name="address" type="text" value="<?php echo $userdetails[0]->address; ?>">

                                                        <label>Town / City * </label>
                                                        <input name="city" type="text" value="<?php echo $userdetails[0]->city; ?>">
                                                        <label>State * </label>
                                                        <input name="state" type="text" value="<?php echo $userdetails[0]->state; ?>">
                                                        <label>Pincode * * </label>
                                                        <input name="pincode" type="text" value="<?php echo $userdetails[0]->pincode; ?>">

                                                        <label>Password</label>
                                                        <input name="password" type="text" value="<?php echo $userdetails[0]->password; ?>" disabled>
                                                        <label>Create New Password</label>
                                                        <input name="password" type="password" value="<?php echo $userdetails[0]->password; ?>" >

                                                       
                                                        <div class="button-box">
                                                            <button type="submit" name="submit" class="default-btn">save</button>
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
                </div>
            </div>
            <!-- content-wraper end -->
            
       <?php include('footer.php'); ?>


<script>
var order_id = 0;
$(document).on("click", ".cancel-order-btn",(function(e) {
    order_id = $(this).data("order_id");
    order_cancel();
  }));


    function order_cancel()
    {
        var form = new FormData();
        form.append("order_id", order_id);

        var settings = {
          "url": "<?=base_url() ?>user/order_cancel",
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
          swal({title: "Order Cancel Request Send successfully.", text: "", type: 
                        "success"}).then(function(){ 
                           location.reload();
                           }
                        );
        });
    }
</script>