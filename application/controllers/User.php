<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct()
	{
		
		parent::__construct();
		 $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
		
		$this->load->model('User_model');
		$this->load->model('Employee_model');

		}

	public function add_new_user()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_user_role']=$this->User_model->select_all_user_role_list($company_id);
		// $data['all_self_parent_role']=$this->User_model->select_all_self_parent_role_list($company_id);
		 $data['all_company']=$this->User_model->select_all_company_list();
		 $data['all_employee']=$this->User_model->select_all_employee_list($company_id);
         $data['maincontent'] = $this->load->view('user/manage_user/create_new_user', $data, true);
         $this->load->view('master', $data);
	}


	public function pick_employee_name()
	{
		 $data = array();
		  $employee_id = $this->input->post('employee_id', true);
		  if($employee_id == 'select'){
		  	echo '';
		  	exit();
		  }
		 $company_id= $this->session->userdata('company_id');
		 $pick_employee_name =$this->Employee_model->select_each_employee_full_name($company_id,$employee_id);
		 $employee_name = $pick_employee_name->full_name;
		 echo $employee_name;
	}
	
	public function save_user(){

		if($_POST['company'] == '')
		{
			echo "Please Select at Least One Company";
			exit();
		}
        $data=array();
        $employee_id = $this->input->post('employee_id', true);
		//$data['employee_id'] = $employee_id;
        $data['user_name']=$employee_id;
        $data['full_name']=$this->input->post('employee_name', true);;
		$user_role_name = $this->input->post('user_role_name', true);
        $user_type = $this->input->post('user_type');
        $data['user_type']=$user_type;
        $data['is_active']=1;
        $company_id = $this->session->userdata('company_id');
        $all_roles = $this->User_model->select_all_user_role_id_list($company_id);
        $update_employee_user=$this->User_model->update_is_user($employee_id,$company_id);
        $all_role_id = array();
        $id = 0;
        foreach($all_roles as $each_role){
        	$id++;
        	$all_role_id[$id] = $each_role->id;
        }
        $all_role_id = implode(",",$all_role_id);
        //echo "<pre>"; print_r($all_role_id);exit();
		if($user_type=="Super Admin"){
			$data['is_admin']="1";
			$data['permitted_action'] = $all_role_id;

		}
		elseif($user_type=="Admin"){
			$data['is_admin']="2";
			$data['permitted_action']=$this->input->post('user_role');
		}
		else{
			$data['is_admin']="0";
			$data['permitted_action']=$this->input->post('user_role');
		}
        $password=$this->input->post('password');
        $retype_password=$this->input->post('retype_password');
		if($password != $retype_password){
			echo "Retype Password doesn't match with Password!";
			exit();
		}
        $data['password']=md5($password);
        
        $data['permitted_company']=$this->input->post('company');
        $data['company_id']=$this->input->post('company');
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
		//echo '<pre>';
		//print_r($data);
		//exit();
		$check_employee_id = $this->User_model->check_employee_id($employee_id);
		if($check_employee_id){
			echo "This Employee Id Already Added. Try Another!";
			exit();
		}
		else{

			$save_user = $this->User_model->save_user_info($data);

			if($save_user){
				echo"Saved";
				
		}	else{
				echo"Not saved";
				
		}
		}

    }
	public function user_list()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
       
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_user']=$this->User_model->select_all_user_list($company_id);
        $data['maincontent'] = $this->load->view('user/manage_user/user_list', $data, true);
        $this->load->view('master', $data);
        
	}
	public function edit_user($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['each_user']=$this->User_model->select_each_user_info($id,$company_id);
		 $data['all_user_role']=$this->User_model->select_all_user_role_list($company_id);
		// $data['all_self_parent_role']=$this->User_model->select_all_self_parent_role_list($company_id);
		 $data['all_company'] = $this->User_model->select_all_company_list();
		 $data['all_employee']=$this->Employee_model->select_all_employee_list($company_id);
         $data['maincontent'] = $this->load->view('user/manage_user/edit_user', $data, true);
         $this->load->view('master', $data);
	}
	public function update_user()
	{
		//echo"<pre>";print_r($_POST);exit();

		if($_POST['company'] == '')
		{
			echo "Please Select at Least One Company";
			exit();
		}
        $data=array();
		$company_id = $this->input->post('company');
        $employee_id=$this->input->post('employee_id');
		$each_employee = $this->Employee_model->pick_employee_info_by_employee_id($company_id,$employee_id);
		if($each_employee)
		{
			$data['full_name'] = $each_employee->first_name. $each_employee->last_name;
			$data['email'] = $each_employee->email;
			//$full_name = $each_employee->first_name.$each_employee->last_name;
		}
        $id = $this->input->post('id');
        $data['user_name']=$employee_id;
		$user_role_name = $this->input->post('user_role_name', true);
        $user_type = $this->input->post('user_type');
        $data['user_type']=$user_type;
         $data['is_active']=1;
        $all_roles = $this->User_model->select_all_user_role_id_list($company_id);
        $all_role_id = array();
        $index = 0;
        foreach($all_roles as $each_role){
        	$index++;
        	$all_role_id[$index] = $each_role->id;
        }
        $all_role_id = implode(",",$all_role_id);
        //echo "<pre>"; print_r($all_role_id);exit();
		if($user_type=="Super Admin"){
			$data['is_admin']="1";
			$data['permitted_action'] = $all_role_id;

		}
		elseif($user_type=="Admin"){
			$data['is_admin']="2";
			$data['permitted_action']=$this->input->post('user_role');
		}
		else{
			$data['is_admin']="0";
			$data['permitted_action']=$this->input->post('user_role');
		}
		/*
        $password=$this->input->post('password');
        $retype_password=$this->input->post('retype_password');
		if($password != $retype_password){
			echo "Retype Password doesn't match with Password!";
			exit();
		}
        $data['password']=md5($password);
		*/
        $data['permitted_company']=$this->input->post('company');
        $data['company_id']= $this->input->post('company');
		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');

		$update_user = $this->User_model->update_user_info($id,$company_id,$data);

		if($update_user)
		{
			echo "Updated User Info";
		}	
		else
		{
			echo "Not Updated";
		}
		

    }
	public function delete_user($id) {
		$company_id = $this->session->userdata('company_id');
        $this->User_model->delete_user_info($id,$company_id);
       // $this->User_Model->update_deleted_employee($id,$company_id);
		redirect('User/user_list');
                
    }
	
	public function add_new_user_role()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['all_role']=$this->User_model->select_all_parent_list();
         $data['maincontent'] = $this->load->view('user/user_role/create_new_user_role', $data, true);
         $this->load->view('master', $data);
        
	}
	public function save_new_user_role()
	 {
        $data = array();
        $company_id= $this->session->userdata('company_id');
        $data['user_role_name'] = $this->input->post('user_role_name', true);
        $user_role_name = $this->input->post('user_role_name', true);
        $data['parent_id'] = $this->input->post('parent_id', true);
        $data['url_link'] = $this->input->post('url_link', true);
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
		$data['company_id'] = $company_id;
		$check_user_role_name= $this->User_model->check_user_role_name($user_role_name,$company_id);
		if($check_user_role_name)
		{
			echo "User Role Name already Exits.";
		}
		else
		{
			$this->User_model->save_new_user_role_info($data);
			echo "User Role Added Successfully";
		}
                       
    }
	public function user_role_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_user_role']=$this->User_model->select_all_user_role_list($company_id);
         $data['maincontent'] = $this->load->view('user/user_role/user_role_list', $data, true);
         $this->load->view('master', $data);
	}
	
	public function edit_user_role($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['each_user_role']=$this->User_model->select_each_user_role($id);
		 $data['all_role']=$this->User_model->select_all_parent_list();
         $data['maincontent'] = $this->load->view('user/user_role/edit_user_role', $data, true);
         $this->load->view('master', $data);
        
	}
	public function update_user_role()
	 {

        $data = array();
        $company_id= $this->session->userdata('company_id');
        $id = $this->input->post('id', true);
        $data['user_role_name'] = $this->input->post('user_role_name', true);
		$data['parent_id'] = $this->input->post('parent_id', true);
        $data['url_link'] = $this->input->post('url_link', true);
		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');
		$data['company_id'] = $company_id;

        $update_user_role = $this->User_model->update_user_role_info($id,$company_id,$data);
		if($update_user_role)
		{
			echo "User Role Updated Successfully!"; 
		}
		else
		{
			echo "User Role Not Updated!";
		}
		         
    }
	public function delete_user_role($id) {
        $this->User_model->delete_user_role_info($id);
		redirect('User/user_role_list');
                
    }
	
}
