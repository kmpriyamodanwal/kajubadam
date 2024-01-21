<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Size_color_image extends CI_Controller {

	
	
	function image_by_colorsize()
    {
        $result = array();        

        $p_id = $this->input->post("p_id");
        $size_id = $this->input->post("size_id");
        $color_id = $this->input->post("color_id");

        $rowd = array();
        if(!empty($p_id) && !empty($size_id) && !empty($color_id))
        {
            $where = array(
                    "p_id"=>$p_id,
                    "size_id"=>$size_id,
                    "color_id"=>$color_id,
                );
            $rowd = $this->db->get_where("all_images",$where)->result_object();
        }

        $image1 = '';
        $image2 = '';

        $i=0;
		foreach($rowd as $key => $row)
        {
            $i++;
            $imageget = base_url()."media/uploads/product/$row->image";
            $image1 .= ' <div class="mySlides">
                        <img src="'.$imageget.'" style="width:100%">
                      </div>'; 
            $image2 .= '<div class="column">
                          <img class="demo cursor" src="'.$imageget.'" style="width:100%" onclick="currentSlide('.$i.')" >
                        </div>'; 
        }
        $price = 0;
        $cut_price = 0;
            if(!empty($rowd))
                   $price = $rowd[0]->price;
            if(!empty($rowd))
                   $cut_price = $rowd[0]->cut_price;
        $html = array(
            "price"=>$price,
            "cut_price"=>$cut_price,
        );
        // $html .= $this->load->view("product-image",array('rowd'=>$rowd),true);      

		
        if(!empty($image1))
        {
            $result['message'] = "data fetch successfully";
            $result['status']  = "200";
            $result['data1']    = $image1;
            $result['data2']    = $image2;
            $result['html']    = $html;
        }
        else
        {
            $result['message'] = "Somthing Wrong..";
            $result['status']  = "400";
            $result['data1']    = $image1;
            $result['data2']    = $image2;
            $result['html']    = $html;
        }

        echo json_encode($result);
    }






}
