<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
 

class Ccavanue extends CI_Controller{

//paymoney payment gatway 
	public function pay(){
		
		$order_id = $this->input->get('order_id');
		$user_session_id = $this->session->userdata('userdashboard');

		if(isset($user_session_id))
		{
			$data = array();
			$where = array('user_id'=>$user_session_id,'status'=>0,"order_id"=>$order_id,);
			$fwd = $this->db->get_where('finalorder',$where)->result_object();
			if(is_array($fwd) || is_object($fwd))
			{
				$fwd = $fwd[0];
				$data['order_detail'] = $fwd;
		 		$this->load->view('dataform.php',$data); 
	   		}
	   		else
	   		{
	   			redirect('checkout');	
	   		}
		}
		else
		{
			$data = array();
			$where = array('status'=>0,"order_id"=>$order_id,);
			$fwd = $this->db->get_where('finalorder',$where)->result_object();
			if(is_array($fwd) || is_object($fwd))
			{
				$fwd = $fwd[0];
				$data['order_detail'] = $fwd;
		 		$this->load->view('dataform.php',$data); 
	   		}
	   		else
	   		{
	   			redirect('checkout');	
	   		}
		}
	}



	public function requestHandler()
	{
		$data = array();
		$this->load->view('ccavenue/ccavRequestHandler',$data); 
	}

	
	public function response(){

		include(APPPATH.'views/ccavenue/Crypto.php');


		$add_date         = date('Y-m-d');
		$add_time         = date('H:i:m');
		$displayCurrency  = "INR";
	     
		$user_session_id  = $this->session->userdata('userdashboard');
		$success = true;
		$error = "Payment Failed";

		if(empty($_POST["encResp"]))
		{
			redirect(base_url());
			die;
		}
		$workingKey=ccavanue_working_key;	//Working Key should be provided here.
		$encResponse=$_POST["encResp"];		//This is the response sent by the CCAvenue Server
		$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
		$order_status="";
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);		

		for($i = 0; $i < $dataSize; $i++) 
		{
			$information=explode('=',$decryptValues[$i]);
			if($i==3)	$order_status=$information[1];
			if($i==1)	$txnid=$information[1];
		}

		if($order_status==="Success")
			$success = true;			
		else if($order_status==="Aborted")
			$success = false;		
		else if($order_status==="Failure")
			$success = false;
		else
			$success = false;		
		for($i = 0; $i < $dataSize; $i++) 
		{
			$information=explode('=',$decryptValues[$i]);
		}

		if ($success === true)
		{
			$order_table_id = $_GET['shopping_order_id'];           
         		$where = array('id'=>$order_table_id,'status'=>0);    
		     $fwd = $this->db->get_where('finalorder',$where)->result_object();
		     if(!empty($fwd))
		     { 
		     	$fwd = $fwd[0];
		     	$order_id = $fwd->order_id;
		     	$user_session_id = $fwd->user_id;
		     	$data = array();
		     	$this->db->update("orders",array("status"=>1,),array("status"=>0,"order_id"=>$order_id,));
		     	$this->db->update("finalorder",array("status"=>1,),array("status"=>0,"id"=>$order_table_id,));
		     	$this->db->delete("add_to_temp_cart",array("temp_user_id"=>$user_session_id,));
		     	$this->db->update("order_coupon",array("order_id"=>$order_id,'status'=>1,),array('user_id'=>$user_session_id,'status'=>0,));

				$this->load->view('success-message.php',$data);
			}
			else
			{
				redirect('checkout');
			}
		}
		else
		{
			$order_table_id = $_GET['shopping_order_id'];
			$fwd = $this->db->get_where('finalorder',array('id'=>$order_table_id))->result_object();

			$order_table_id = $fwd[0]->order_id;

			$this->db->delete("orders",array("order_id"=>$order_table_id,));
			$this->db->delete("finalorder",array("order_id"=>$order_table_id,));
			$this->load->view('failed');
			// $html = "<p>Your payment failed</p><p>{$error}</p>";
		}
				
	}

}

?>