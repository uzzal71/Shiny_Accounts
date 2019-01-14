<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
	
	function __construct()
	{
		
		parent::__construct();
		 $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
		
		$this->load->model('Company_model');

		}

	public function add_new_company()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('company/add_new_company', $data, true);
         $this->load->view('master', $data);
	}
	
	public function save_new_company(){

        $data=array();
        $company_id = $this->input->post('company_id', true);
        $data['company_id'] = $company_id;
        $data['short_name'] = $this->input->post('short_name');
        $data['full_name'] = $this->input->post('full_name');
        $data['address'] = $this->input->post('address');
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');

		$check_company_id = $this->Company_model->check_company_id($company_id);
		if($check_company_id)
		{
			echo "Company ID already Exist";
			exit();
		}
		else
		{
			$save_company = $this->Company_model->save_new_company_info($data);
			if($save_company){
				echo "New Company Saved successfully";
		}	else{
				echo "Not saved";
		}
		}

    }
	public function company_list()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
       
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['all_company'] = $this->Company_model->select_all_company_list();
        $data['maincontent'] = $this->load->view('company/company_list', $data, true);
        $this->load->view('master', $data);
        
	}


	public function edit_company($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['each_company']=$this->Company_model->select_each_company($id);
         $data['maincontent'] = $this->load->view('company/edit_company', $data, true);
         $this->load->view('master', $data);
        
	}
	public function update_company()
	 {
        $data=array();
        $company_id = $this->input->post('company_id', true);
        $id = $this->input->post('id', true);
        $data['company_id'] = $company_id;
        $data['short_name'] = $this->input->post('short_name');
        $data['full_name'] = $this->input->post('full_name');
        $data['address'] = $this->input->post('address');
		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');

        $update_company = $this->Company_model->update_company_info($id,$data);
		if($update_company)
		{
			echo "Company Info Updated Successfully!"; 
		}
		else
		{
			echo "Company Info Not Updated!";
		}
		         
    }
	public function delete_company($id)
	{
        $this->Company_model->delete_company_info($id);
		redirect('Company/company_list');
                
    }

	
}
