<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Edit <?php echo $page_title; ?></title>
      <?php $this->load->view('admin/include/allcss') ?>

   </head>
   <body>
       <?php echo loder; ?> 
      <div id="app" class="app app-header-fixed app-sidebar-fixed ">


          <?php $this->load->view('admin/include/header') ?>
          <?php $this->load->view('admin/include/sidebar') ?>


         
         <div id="content" class="app-content">
            <div class="d-flex align-items-center justify-content-between mb-3">
               <div>
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                     <li class="breadcrumb-item active"><i class="fa fa-arrow-back"></i> Edit <?php echo $page_title; ?></li>
                  </ol>
                  <h1 class="page-header mb-0">Edit <?php echo $page_title; ?></h1>
               </div>
                <div>
                  <button onclick="history.back();" class="btn btn-primary">Back</button>
               </div>
            </div>



               <form  class="row" method="post" enctype="multipart/form-data" action="#">
                  
                  <div class="col-lg-12">
                      <div class="card border-0 mb-4">
                        <div class="card-header h6 mb-0 bg-none p-3">
                           <i class="fa fa-fa fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Upload Image
                        </div>
                        <div class="card-body">
                           <div class="row">

                              <div class="col-lg-4 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Select Type</label>
                                    <select class="form-select" name="type" id="colorselector">
                                       <option value="">-- Select Type --</option>
                                       <option <?php if($EDITDATA[0]->type==1)echo 'selected'; ?> value="1">Image</option>
                                       <option value="2" <?php if($EDITDATA[0]->type==2)echo 'selected'; ?>>Video</option>
                                    </select>
                                 </div>
                              </div>

                              
                              
                              <div class="col-lg-4 mb-4" id="videoid"  style="display: <?php if($EDITDATA[0]->type==2){ echo "block";}else{echo "none";} ?>;">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Upload Video</label>
                                    <?php
                                    if(!empty($EDITDATA[0]->video))
                                       { ?>
                                    <div class="">
                                       <video width="320" height="240" controls>
                                         <source src="<?php echo base_url($upload_path); ?><?php echo $EDITDATA[0]->video; ?>" type="video/mp4">
                                       </video>
                                       <div class="col-lg mb-4" style="padding-top: 10px;">
                                            <button type="button" class="btn btn-sm mb-2 btn-danger remove-video-btn mt-3">Remove</button>
                                        </div>
                                        <input  type="hidden" class="form-control" name="oldvideo" value="<?php echo $EDITDATA[0]->video; ?>">

                                       <input type="file" class="form-control" name="video"  value="<?php echo $EDITDATA[0]->video; ?>" >
                                    </div>
                                 <?php } else { ?>
                                    <input type="file" class="form-control" name="video"  value="" >
                                 <?php }  ?>
                                 
                                 </div>
                              </div>

                             
                              <div class="col-lg-4 mb-4" id="imageid" style="display: <?php if($EDITDATA[0]->type==1){ echo "block";}else{echo "none";} ?>;">
                                 <div class="mb-lg-0 mb-3 bg-light">
                                    <label class="form-label"style="width: 100%;text-align: center; position: relative;border: 1px solid aliceblue;">Upload image
                                       <img id="blah" src="<?php echo base_url($upload_path); ?><?php echo $EDITDATA[0]->image; ?>" class="sd" style="width: 100%; height: 100%; position: relative; top: -22px;">
                                       <input  type="hidden" class="form-control" name="oldimage" value="<?php echo $EDITDATA[0]->image; ?>">
                                       <input style="display: none;" type="file" class="form-control" name="image"  id="imgInp">
                                   </label>
                                 </div>
                              </div>
                          

                              <div class="col-lg-4 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                       <option value="">-- Select Status --</option>
                                       <option value="1"  <?php if($EDITDATA[0]->status==1)echo 'selected'; ?>>Show</option>
                                       <option value="0" <?php if($EDITDATA[0]->status==0)echo 'selected'; ?>>Hide</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-4 text-center">
                                 <div class="mb-lg-0 mb-3">
                                    <button class="btn btn-primary d-block" type="submit" name="submit">
                                       Update <?php echo $page_title; ?>
                                   </button>
                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>                  
                  </div>
               </form>
           
         </div>
       
      </div>



   <?php $this->load->view('admin/include/footer') ?>
<script>

   // $("#divid1").hide();

$(document).ready(function(){
    $('#colorselector').on('change', function() 
    {
      if (this.value == 1)
      {
        $("#imageid").show();
        $("#videoid").hide();
      }
      else if (this.value == 2)
      {
        $("#imageid").hide();
        $("#videoid").show();
      }
    });
});


$(document).on("click", ".remove-video-btn",(function(e) {
     $(this).parent().parent().remove();
 }));

</script>
   </body>
</html>