<?php

class Registration extends CI_Controller
{

	//-define everything for here
	protected $arr_values = array(
						   	'page_title'=>'Registration',
						   	'table_name'=>'registration',
						   	'upload_path'=>'media/uploads/',
						   	'load_path'=>'admin/registration/',
						   	'redirect_path'=>'admin_con/registration/',
						   	'back_url'=>'registration',
						   	'add_url'=>'registration',
						   	'edit_url'=>'registration',
						   	'delete_url'=>'registration',
						   	'view_url'=>'registration',
						   	'status_value'=>'registration',
						   );
	

	///------author for login--
	function chech_admin_login()
	{
		$ci = & get_instance();
	    if(empty($ci->session->userdata('id')))
	    {
	      redirect(base_url().'admin');
	    }
	}

	
	//----listing list dekhney ke lia 

	function listing()
	{
		$this->chech_admin_login();
		$this->db->order_by("id desc");
		$data['ALLDATA'] = $this->crud->get_data($this->arr_values['table_name']);
		$data['page_title'] = $this->arr_values['page_title'];
		$data['add_url'] = base_url('admin_con/'.$this->arr_values['add_url'].'/add');
		$data['edit_url'] = base_url('admin_con/'.$this->arr_values['edit_url'].'/edit/');
		$data['delete_url'] = base_url('admin_con/'.$this->arr_values['delete_url'].'/delete/');
		$data['view_url'] = base_url('admin_con/'.$this->arr_values['view_url'].'/view/');
		$data['status_value'] = base_url('admin_con/'.$this->arr_values['status_value'].'/new_status');
		$data['upload_path'] = $this->arr_values['upload_path'];
		$this->load->view($this->arr_values['load_path'].'list',$data);
	}


	//--delete ke lia

	public function delete($id)//for deleting the user
	  {
	    $delete=$this->crud->delete($this->arr_values['table_name'],$id);
	    if($delete)
        {
          echo "Success";
        }
        else
        {
          echo "Error";
        }
	  }


	function view()
	{
		$this->chech_admin_login();
		$args=func_get_args();
		$data['back_url'] = base_url('admin_con/'.$this->arr_values['back_url'].'/listing');
		$data['page_title'] = $this->arr_values['page_title'];
		$data['upload_path'] = $this->arr_values['upload_path'];
		$data['EDITDATA'] = $this->crud->fetchdatabyid($args[0],$this->arr_values['table_name']);
		$this->load->view($this->arr_values['load_path'].'view',$data);
	}




}