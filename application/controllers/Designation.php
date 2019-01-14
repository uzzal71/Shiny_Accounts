<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designation extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
          $this->load->model('Designation_model');
    }


	public function add_new_designation()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
        $data['maincontent'] = $this->load->view('designation/create_new_designation', $data, true);
		
        $this->load->view('master', $data);
        
	}
	 public function save_new_designation() {
        $data = array();

        $designation_name = $this->input->post('designation_name', true);
        $data['designation_name'] = $designation_name;
        $data['is_active'] = $this->input->post('is_active', true);
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
		$company_id = $this->session->userdata('company_id');
		$data['company_id'] = $company_id;
		$check_designation_name = $this->Designation_model->check_designation_name($designation_name,$company_id);
		if($check_designation_name){
			echo"Designation Already Exist";
		}

		else
		{	
			$save_designation = $this->Designation_model->save_new_designation_info($data);
			if($save_designation)
			{
				echo "New Designation Saved!";
			}
			else
			{
				echo "Not Saved";
			}
				
		}

    }
		public function designation_list()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
       
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_designation']=$this->Designation_model->select_all_designation_list($company_id);
        $data['maincontent'] = $this->load->view('designation/designation_list', $data, true);
        $this->load->view('master', $data);
	}
		
	public function edit_designation($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
		 $data['each_designation']=$this->Designation_model->select_each_designation($id,$company_id);
         $data['maincontent'] = $this->load->view('designation/edit_designation', $data, true);
         $this->load->view('master', $data);
        
	}
	public function update_designation()
	 {

        $data = array();
        $company_id= $this->session->userdata('company_id');
        $id = $this->input->post('id', true);
        $data['designation_name'] = $this->input->post('designation_name', true);
        $data['is_active'] = $this->input->post('is_active', true);
		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');
		$data['company_id'] = $company_id;

		$update_designation = $this->Designation_model->update_designation_info($id,$company_id,$data);
		if($update_designation)
		{
			echo "Designation Updated!";
		}
		else
		{
			echo "Not Updated";
		}        
    }
	
	public function delete_designation($id)
	{
		$company_id = $this->session->userdata('company_id');
        $delete_designation = $this->Designation_model->delete_designation_info($id,$company_id);
		if($delete_designation)
		{
			redirect('Designation/designation_list');
		}
		
    }
	
	
	
}
