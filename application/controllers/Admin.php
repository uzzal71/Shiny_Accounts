<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
          $this->load->model('Admin_model');
          $this->load->model('Employee_model');
          $this->load->model('User_model');
    }

public function approve_attendence()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('admin/approve_attendence.php', $data, true);
		
        $this->load->view('master', $data);
        
	}
		
public function approve_outstation()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('admin/approve_outstation.php', $data, true);
		
        $this->load->view('master', $data);
        
	}
	
	public function approve_voucher()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
        $data['maincontent'] = $this->load->view('admin/approve_voucher.php', $data, true);
        $this->load->view('master', $data);
        
	}	
	public function change_password()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
        $data['maincontent'] = $this->load->view('admin/change_password.php', $data, true);
        $this->load->view('master', $data);
	}
	public function update_password() 
	{
        $data = array();
        $password = $this->input->post('password', true);
		$confirm_password= $this->input->post('confirm_password', true);
		$user_name = $this->input->post('employee_id', true);
		$company_id = $this->session->userdata('company_id');
		$check_user_name = $this->User_model->check_user_name($company_id,$user_name);
		if($check_user_name)
		{
			if($password == $confirm_password)
			{
				$update_password = $this->Admin_model->update_password($password,$company_id,$user_name);

				if($update_password)
				{
					echo "Password Updated For Employee ID: ".$user_name;
				}
				else
				{
					echo "Password Not Updated";
				}
			 
			}
			else
			{
				echo "Password Not Matched with Confirm password";
				exit();
			}
		}
		else
		{
			echo "Sorry, This User is Unavailable ";
			exit();
			 
		}


        
    }
		
   
}
