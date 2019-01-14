<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {
	  public function __construct() 
	  {
         parent::__construct();
         $id=$this->session->userdata('id');
         if($id ==NULL)
         {
            redirect('Login','refresh');
         }
          $this->load->model('Department_model');
       }
	public function add_new_department()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('department/create_new_department', $data, true);
         $this->load->view('master', $data);
        
	}
	public function save_new_department()
	 {
        $data = array();
        $company_id= $this->session->userdata('company_id');
        $data['department_name'] = $this->input->post('department_name', true);
        $department_name = $this->input->post('department_name', true);
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
		$data['company_id'] = $company_id;
		$check_department_name= $this->Department_model->check_department_name($department_name,$company_id);
		
	
		if($check_department_name)
		{
			echo "Department Name already Exist.";
		}
		else
		{
			$this->Department_model->save_new_department_info($data);
			echo "Department Added Successfully";
		}
                       
    }
	public function department_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_department']=$this->Department_model->select_all_department_list($company_id);
         $data['maincontent'] = $this->load->view('department/department_list', $data, true);
         $this->load->view('master', $data);
	}
	
	public function edit_department($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['each_department']=$this->Department_model->select_each_department($id);
         $data['maincontent'] = $this->load->view('department/edit_department', $data, true);
         $this->load->view('master', $data);
        
	}
	public function update_department()
	 {
		 
		
		
        $data = array();
        $company_id= $this->session->userdata('company_id');
        $id = $this->input->post('id', true);
        $data['department_name'] = $this->input->post('department_name', true);
		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');
		$data['company_id'] = $company_id;
        $this->Department_model->update_department_info($data,$id,$company_id);
		echo "Department Updated Successfully!";         
    }
	
	public function delete_department($id) {

        $this->Department_model->delete_department_info($id);
		redirect('Department/department_list');
                
    }
	
	
}
