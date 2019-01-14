<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
          $this->load->model('Shift_model');
          $this->load->model('Employee_model');
    }


	public function add_new_shift()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
        $data['maincontent'] = $this->load->view('shift/create_shift', $data, true);
		
        $this->load->view('master', $data);
        
	}
	 public function save_new_shift() {
        $data = array();
        $company_id= $this->session->userdata('company_id');
        $shift_name= $this->input->post('shift_name', true);
        $data['shift_name'] = $shift_name;
        $data['shift_start'] = $this->input->post('shift_start', true);
        $data['second_half_start'] = $this->input->post('second_half_start', true);
        $data['shift_end'] = $this->input->post('shift_end', true);
        $data['shift_start_from'] = $this->input->post('shift_start_from', true);
        $data['shift_end_from'] = $this->input->post('shift_end_from', true);
        $data['grace'] = $this->input->post('grace', true);
        $data['lunch_start'] = $this->input->post('lunch_start', true);
        $data['lunch_end'] = $this->input->post('lunch_end', true);
        $data['first_half_margin'] = $this->input->post('first_half_margin', true);
        $data['second_half_margin'] = $this->input->post('second_half_margin', true);
        $data['over_time_start'] = $this->input->post('over_time_start', true);
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
		$data['company_id'] = $company_id;
		$data['internal_division']=$this->input->post('internal_division', true);
		//echo '<pre>';
		//print_r($data);
		//exit();
		
        $check_shift_name=$this->Shift_model->check_shift_name($shift_name,$company_id);
		if($check_shift_name){
			echo "Shift Name already Exits!";
		}
		else{
			    $save_shift=$this->Shift_model->save_new_shift_info($data);
				if($save_shift)
				{
					echo "Shift Name Saved Successfully!";
				}
				else
				{
					echo "Something Went Wrong";
				}
			
		}


    }
	public function shift_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_shift']=$this->Shift_model->select_all_shift_list($company_id);
         $data['maincontent'] = $this->load->view('shift/shift_list', $data, true);
         $this->load->view('master', $data);
       
	}
	
	public function edit_shift($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['each_shift']=$this->Shift_model->select_each_shift($id,$company_id);
         $data['maincontent'] = $this->load->view('shift/edit_shift', $data, true);
         $this->load->view('master', $data);
        
	}
	public function update_shift()
	 {
		//echo '<pre>';print_r($_POST);exit();
        $data = array();
        $company_id= $this->session->userdata('company_id');
        $id= $this->input->post('id', true);
        $data['shift_name'] = $this->input->post('shift_name', true);
        $data['shift_start'] = $this->input->post('shift_start', true);
        $data['second_half_start'] = $this->input->post('second_half_start', true);
        $data['shift_end'] = $this->input->post('shift_end', true);
        $data['grace'] = $this->input->post('grace', true);
        $data['lunch_start'] = $this->input->post('lunch_start', true);
        $data['lunch_end'] = $this->input->post('lunch_end', true);
        $data['shift_start_from'] = $this->input->post('shift_start_from', true);
        $data['shift_end_from'] = $this->input->post('shift_end_from', true);
        $data['first_half_margin'] = $this->input->post('first_half_margin', true);
        $data['second_half_margin'] = $this->input->post('second_half_margin', true);
        $data['over_time_start'] = $this->input->post('over_time_start', true);
		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');
		$data['company_id'] = $company_id;

        $update_shift=$this->Shift_model->update_shift_info($data,$id,$company_id);
		if($update_shift)
		{
			echo "Shift Updated Successfully!";
		}
		else
		{	
		
			echo "Something Went wrong!";  
		}
		       
    }
	
	public function delete_shift($id) {
		$company_id= $this->session->userdata('company_id');
        $this->Shift_model->delete_shift_info($id,$company_id);
		redirect('Shift/shift_list');
                
    }


	public function special_shift_allocation()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_employee']=$this->Employee_model->select_all_employee_list($company_id);
		 $data['all_shift']=$this->Shift_model->select_all_shift_list($company_id);
         $data['maincontent'] = $this->load->view('shift/special_shift_allocation', $data, true);
         $this->load->view('master', $data);
        
	}
	public function save_special_shift_allocation()
	{
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		
		$data = array();
		
        $data['date'] = $this->input->post('date', true);
        $data['employee_id'] = $this->input->post('employee_id', true);
        $data['shift_id'] = $this->input->post('shift_id', true);
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
		$company_id= $this->session->userdata('company_id');
		$data['company_id'] = $company_id;
		//echo '<pre>';
		//print_r($data);
		//exit();
		$save_special_shift_allocation=$this->Shift_model->save_special_shift_allocation_info($data);
		if($save_special_shift_allocation){
			echo "Saved";
		}
		else{
				echo "OPPs!! Not saved!!";
		}
	}
	public function special_shift_allocation_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_special_shift']=$this->Shift_model->select_all_special_shift_list($company_id);
         $data['maincontent'] = $this->load->view('shift/special_shift_allocation_list', $data, true);
         $this->load->view('master', $data);
        
	}	
	public function edit_special_shift_allocation($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 
		 $company_id= $this->session->userdata('company_id');
		 $data['all_employee']=$this->Employee_model->select_all_employee_list($company_id);
		 $data['all_shift']=$this->Shift_model->select_all_shift_list($company_id);
		 $data['each_special_shift']=$this->Shift_model->select_each_special_shift($company_id,$id);
		 
         $data['maincontent'] = $this->load->view('shift/edit_special_shift_allocation', $data, true);
         $this->load->view('master', $data);
        
	}
	public function update_special_shift_allocation()
	{
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		
		$data = array();
		
        $id = $this->input->post('id', true);
        $data['date'] = $this->input->post('date', true);
        $data['employee_id'] = $this->input->post('employee_id', true);
        $data['shift_id'] = $this->input->post('shift_id', true);
		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');
		$company_id= $this->session->userdata('company_id');
		$data['company_id'] = $company_id;
		//echo '<pre>';
		//print_r($data);
		//exit();
		$update_special_shift_allocation=$this->Shift_model->update_special_shift_allocation_info($data,$id,$company_id);
		if($update_special_shift_allocation){
			echo "Updated";
		}
		else{
				echo "OPPs!! Not Updated!!";
		}

		}
	public function delete_special_shift_allocation($id) {
		$company_id= $this->session->userdata('company_id');
        $delete_special_shift_allocation=$this->Shift_model->delete_special_shift_allocation_info($id,$company_id);
		
		if($delete_special_shift_allocation){
			
			redirect('Shift/special_shift_allocation_list');
		}
		else{
			redirect('Shift/special_shift_allocation_list');
			alert("Not Deleted");
		}
                
    }
 
	
	
	
}
