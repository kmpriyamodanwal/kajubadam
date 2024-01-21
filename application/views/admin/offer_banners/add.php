<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Add <?php echo $page_title; ?></title>
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
                     <li class="breadcrumb-item active"><i class="fa fa-arrow-back"></i> Add <?php echo $page_title; ?></li>
                  </ol>
                  <h1 class="page-header mb-0">Add <?php echo $page_title; ?></h1>
               </div>
               <div>
                  <button onclick="history.back();" class="btn btn-primary">Back</button>
               </div>
            </div>


            
            
               <form  class="row" method="post" enctype="multipart/form-data" action="#">
                 <!--  <div class="col-lg-8">
                     <div class="card border-0 mb-4">
                        <div class="card-header h6 mb-0 bg-none p-3">
                           <i class="fa fa-fa fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Content
                        </div>
                        <div class="card-body">
                           <div class="row">
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" >
                                 </div>
                              </div>
                              
                              <div class="col-lg-6 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Sub Title</label>
                                    <input type="text" class="form-control" name="sub_title">
                                 </div>
                              </div>
                              
                              
                              <div class="col-lg-12 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Link</label>
                                    <input type="text" class="form-control" name="link" required>
                                 </div>
                              </div>
                              
                           </div>
                        </div>
                     </div>
                  </div> -->

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
                                       <option value="1">Image</option>
                                       <option value="2">Video</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-4"  id="imageid" style="display:none;">
                                 <div class="mb-lg-0 mb-3 bg-light">
                                    <label class="form-label"style="width: 100%;text-align: center; position: relative;border: 1px solid aliceblue;">Upload image
                                       <img id="blah" src="#" class="sd" style="display: none;width: 100%; height: 100%; position: relative; top: -22px;">
                                       <input style="display: none;" type="file" class="form-control" name="image"  id="imgInp">
                                   </label>
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-4" id="videoid" style="display:none;">
                                 <div class="mb-lg-0 mb-3 bg-light">
                                    <label class="form-label">Video</label>
                                    <input type="file" name="video" class="form-control">
                                 </div>
                              </div>

                             <!--  <div class="col-lg-12 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Type</label>
                                    <select class="form-select" name="type" required>
                                       <option value="">-- Select Type --</option>
                                       <option value="1" selected>Top Offer Banner</option>
                                       <option value="2">Bottom Offer Banner</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Mobile/PC</label>
                                    <select class="form-select" name="mobile" required>
                                       <option value="">-- Select Mobile/PC --</option>
                                       <option value="1" selected>For Mobile</option>
                                       <option value="2">For PC</option>
                                    </select>
                                 </div>
                              </div>
 -->
                              <div class="col-lg-4 mb-4">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Link</label>
                                    <input type="text" class="form-control" name="link" required>
                                 </div>
                              </div>

                              <div class="col-lg-4 mb-3">
                                 <div class="mb-lg-0 mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                       <option value="">-- Select Status --</option>
                                       <option value="1" selected>Show</option>
                                       <option value="0">Hide</option>
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-12 mb-4 text-center">
                                 <div class="mb-lg-0 mb-3">
                                    <button class="btn btn-primary d-block" type="submit" name="submit">
                                       Add <?php echo $page_title; ?>
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



</script>
   </body>
</html>