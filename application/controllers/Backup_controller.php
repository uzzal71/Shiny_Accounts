<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup_controller extends CI_Controller {
	
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('login','refresh');
        }
          $this->load->model('department_model');
          $this->load->model('employee_model');
          $this->load->model('device_model');
          $this->load->model('shift_model');
          $this->load->model('unit_model');
    }

	
	

	public function create()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
		 $data['all_department']=$this->department_model->select_all_department_list($company_id);
		 $data['all_device']=$this->device_model->select_all_device_list();
		 $data['all_shift']=$this->shift_model->select_all_shift_list($company_id);
		 $data['all_designation']=$this->designation_model->select_all_designation_list($company_id);
		 $data['all_unit']=$this->unit_model->select_all_unit_list($company_id);
		 $data['maincontent'] = $this->load->view('employee/create_employee', $data, true);
		
        $this->load->view('master', $data);
        
	}
	public function save_employee(){

        $data=array();
        $company_id = $this->session->userdata('company_id');
		$data['company_id']=$company_id;
        $employee_id=$this->input->post('employee_id');
        $data['employee_id']=$employee_id;
		$data['department']=$this->input->post('department');
		$data['first_name']=$this->input->post('first_name');
		$data['last_name']=$this->input->post('last_name');
		$data['fatherName']=$this->input->post('fatherName');
		$data['motherName']=$this->input->post('motherName');
		$data['employType']=$this->input->post('employType');
		$data['employGrade']=$this->input->post('employGrade');
		$data['deviceID']=$this->input->post('deviceID');
		$data['designation']=$this->input->post('designation');
		$data['card_id']=$this->input->post('card_id');
		$data['group_id']=$this->input->post('group_id');
		$data['shift']=$this->input->post('shift');
		$data['unit']=$this->input->post('unit');
		$data['blood_group']=$this->input->post('blood_group');
		$data['joining_date']=$this->input->post('joining_date');
		$data['contact_no']=$this->input->post('contact_no');
		$data['date_of_birth']=$this->input->post('date_of_birth');
		$data['status']=$this->input->post('status');
		$data['present_address']=$this->input->post('present_address');
		$data['permanent_address']=$this->input->post('permanent_address');
		$data['remarks']=$this->input->post('remarks');
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
		//echo '<pre>';
		//print_r($data);
		//exit();
      
        $config['upload_path'] = 'images/employee/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '';
        $config['max_width']  = '';
        $config['max_height']  = '';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $error='';
        $fdata=array();
        if ($this->upload->do_upload('image_location'))
        {
                 $fdata = $this->upload->data();
                $data['imagePath']=$config['upload_path'] .$fdata['file_name'];
        }
        
     
        
        
        $check_employee_id = $this->employee_model->check_employee_id($employee_id,$company_id);
		if($check_employee_id)
		{
			echo "Employee ID Already Exits";
		}
		else
		{
			        $save_employee=$this->employee_model->save_employee_info($data);
					if($save_employee)
					{
						echo "Saved";
					}
					else
					{
						echo "Something went wrong!!";
					}
					
		}

    }
	public function employee_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['view_employee_list']=$this->employee_model->select_all_employee_list();
        $data['maincontent'] = $this->load->view('employee/list', $data, true);
		
        $this->load->view('master', $data);
        
    
	}	
	
	public function pick_employee_name()
	{
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
		 $employee_id=$this->input->post('employee_id');
		 $employee_name=$this->employee_model->select_employee_name_by_employee_id($employee_id);
		 if( $employee_name){
			 echo $employee_name->first_name." ".$employee_name->last_name;
			 
			 }
			 else{
				echo "Select Employee ID";
			 }
	   
    
	}
	
	
	
}
