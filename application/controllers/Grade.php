<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade extends CI_Controller {
	
	function __construct()
	{
		
		parent::__construct();
		$id = $this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
		
		$this->load->model('Grade_model');

		}

	public function add_new_grade()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
        $data['maincontent'] = $this->load->view('grade/add_new_grade', $data, true);
		
        $this->load->view('master', $data);
        
	}
	
	public function save_new_grade() 
	{

        $data = array();
		$grade_name = $this->input->post('grade_name', true);
        $data['grade_name'] = $grade_name;
		$data['description'] = $this->input->post('description', true);
		$company_id = $this->session->userdata('company_id');
		$data['company_id'] = $company_id;
		$data['recorded_by'] = $this->session->userdata('id');
		$data['recording_time'] = date("y-m-d h:i:s");

		$grade_name_exist = $this->Grade_model->select_grade_name($grade_name,$company_id);

		if($grade_name_exist)
		{
			echo "Grade Id or Name already Exist";
			exit();
		}
		else
		{
			$save_grade = $this->Grade_model->save_grade_info($data);
				if($save_grade)
				{
					echo "New Grade Saved";
				}
				else
				{
					echo "Not Saved";
				}

		}
		              
    }
	public function grade_list()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_grade']=$this->Grade_model->select_all_grade_list($company_id);
        $data['maincontent'] = $this->load->view('grade/grade_list', $data, true);
        $this->load->view('master', $data);
	}
	public function edit_grade($id)
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['each_grade']=$this->Grade_model->select_each_grade($id,$company_id);
        $data['maincontent'] = $this->load->view('grade/edit_grade', $data, true);
        $this->load->view('master', $data);
        
	}
	public function update_grade()
	{	
        $data = array();
        $company_id= $this->session->userdata('company_id');
        $id = $this->input->post('id', true);
		$data['grade_name'] = $this->input->post('grade_name', true);
		$data['description'] = $this->input->post('description', true);
		$data['updated_by'] = $this->session->userdata('id');
		$data['updating_time'] = date("y-m-d h:i:s");

        $update_grade = $this->Grade_model->update_grade_info($data,$id,$company_id);
		if($update_grade)
		{
			echo "Grade Updated Successfully!"; 
		}
		else
		{
			echo "Grade Not Updated!";
		}
		         
    }
	public function delete_grade($id) {
		$company_id= $this->session->userdata('company_id');
        $this->Grade_model->delete_grade_info($id,$company_id);
		redirect('grade/grade_list');
                
    }
	
}
