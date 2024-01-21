<!DOCTYPE html>
<html lang="en">
   <head>
      <title><?php echo $page_title; ?> List</title>
       <?php $this->load->view('admin/include/allcss') ?>

   </head>
   <body>
      <div id="snackbar"><?php echo $this->session->flashdata('message'); ?></div>
     <?php if($this->session->flashdata('message')){ ?>
       <script>
         function myFunction() {
           var x = document.getElementById("snackbar");
           x.className = "show";
           setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
         }
         myFunction();
         </script>
  
   <?php } ?>
      <?php echo loder; ?>
      <!--  -->
      <div id="app" class="app app-header-fixed app-sidebar-fixed ">


        
          <?php $this->load->view('admin/include/header') ?>
          <?php $this->load->view('admin/include/sidebar') ?>


         
         <div id="content" class="app-content">
           
            <h1 class="page-header"><?php echo $page_title; ?> List</h1>

           

            <div class="row">
               
               <div class="col-xl-12">
                  <div class="panel panel-inverse">
                     <div class="panel-heading">
                        <h4 class="panel-title">All <?php echo $page_title; ?></h4>
                        <div class="panel-heading-btn">
                           <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                           <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                           <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                           <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                     </div>

                     <div class="panel-body">
                        <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
                           <thead>
                              <tr>
                                 <th width="1%">#</th>
                                 <th>Username</th>
                                 <th>Order ID</th>
                                 <th>Date</th>                             
                                 <th class="text-nowrap">Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $i=0;
                              foreach ($ALLDATA as $key => $data) 
                                 {  $i++;

                                    $regista = $this->crud->selectDataByMultipleWhere('registration',array('id'=>$data->user_id,));
                                    $finalorder = $this->crud->selectDataByMultipleWhere('finalorder',array('order_id'=>$data->order_id,));
                                 ?>
                              <tr class="odd gradeX">
                                 <td width="1%" class="fw-bold text-dark"><?php echo $i; ?></td>
                                 <td><?php if(!empty($regista)) echo $regista[0]->username; ?></td>
                                 <td>
                                    <?php
                                    if(!empty($finalorder))
                                       { ?>
                                    <a href="<?=base_url('admin_con/finalorder/view/'.$finalorder[0]->id,) ?>">Click to View<br><?php echo $data->order_id; ?></a>
                                 <?php } ?>
                                 </td>
                                 <td><?php echo date('d-M-Y',strtotime($data->cancel_date)); ?></td>
                                
                                 <td class="">
                                    <?php
                                    if(!empty($finalorder))
                                       { ?>
                                    <form method="post" action="<?php echo base_url('admin_con/finalorder/status_change'); ?>" enctype="multipart/form-data">
                                       <input type="hidden" name="id" value="<?=$finalorder[0]->id ?>">
                                       <select class="form-select mb-2" name="status">
                                          <option value="6" <?php if($finalorder[0]->status==6) echo 'selected' ?>>Order Cancel Request</option>
                                          <option value="7" <?php if($finalorder[0]->status==7) echo 'selected' ?>>Accept Order Cancel Request</option>
                                          <option value="8" <?php if($finalorder[0]->status==8) echo 'selected' ?>>Decline Order Cancel Request</option>
                                       </select>
                                       <!-- <br> -->
                                       <input class="btn btn-dark" type="submit" name="submit" value="Update">
                                    </form>
                                    <?php } else{?>
                                       <p>order Not Found</p>
                                    <?php } ?>
                                 </td>

                              </tr>
                           <?php } ?>
                              
                            
                           </tbody>
                        </table>
                     </div>
                    
                  </div>
               </div>
            </div>
         </div>
       
      </div>



   <?php $this->load->view('admin/include/footer') ?>

  <script type="text/javascript">
        function click_here(id)
        {
            current_element = $('#statusbyid'+id);
            if($('#customSwitch-'+id).prop("checked")==true)
                var status = 1;
            else
                var status = 0;
            $.ajax({
                url:'<?php echo $status_value; ?>',
                method:'post',
                data:{status:status,id:id},
                success:function(data){
                    console.log(data);
                    // location.reload();
                    var result = JSON.parse(data);
                    current_element.html(result.data['status']);
                }
            });
        }
   </script>

   </body>
</html>