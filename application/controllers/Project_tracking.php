<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_tracking extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
          $this->load->model('Project_tracking_model');
          $this->load->model('Customer_model');
          $this->load->model('Employee_model');
    }


	public function create_new_project()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id=$this->session->userdata('company_id');
		 $data['last_id']=$this->Project_tracking_model->select_last_project_id();
		 $company_id = $this->session->userdata('company_id');
		 $data['all_customer']=$this->Customer_model->select_all_customer_list();
		 $data['all_employee']=$this->Employee_model->select_all_employee_list($company_id);
		 $data['view_customer_list']=$this->Customer_model->select_all_customer_list();
         $data['maincontent'] = $this->load->view('project_tracking/create_new_project', $data, true);
         $this->load->view('master', $data);
        
	}	
	
	 public function save_new_project() {

	 	//print_r($_POST);exit();
        $data = array();
        $company_id = $this->session->userdata('company_id');
        $data['company_id'] = $company_id;
         $data['type'] = $this->input->post('type', true);
        $data['project_id'] = $this->input->post('project_id', true);
        $data['project_name'] = $this->input->post('project_name', true);
        $data['project_short_name'] = $this->input->post('project_short_name', true);
        $data['project_manager'] = $this->input->post('project_manager', true);
		$data['customer_name'] = $this->input->post('customer_name', true);
		$data['customer_id'] = $this->input->post('customer_id', true);
		$data['project_description'] = $this->input->post('project_description', true);
		$data['project_status'] = $this->input->post('project_status', true);
		$data['po_date'] = $this->input->post('po_date', true);
		$data['delivery_date'] = $this->input->post('delivery_date', true);
		$data['project_payment'] = $this->input->post('project_payment', true);
		$data['project_price'] = $this->input->post('project_price', true);
		$data['project_start_date'] = $this->input->post('project_start_date', true);
		$data['project_finished_date'] = $this->input->post('project_finished_date', true);
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
		$this->Project_tracking_model->save_new_project_info($data);
		echo "New project Added Successfully";
		               
    }
	
	public function pick_project_id_for_voucher()
	{
		$data = array();
		$customer_id = $this->input->post('customer_id', true);
		$project_info_by_customer_id = $this->Project_tracking_model->select_all_project_by_customer_id($customer_id);

		//echo "<pre>";print_r($project_info_by_customer_id);exit();
		if($project_info_by_customer_id)
		{
			$return_html = '<option value="select">Select</option>';
			foreach($project_info_by_customer_id as $each_project_id)
			{
				
				$return_html = $return_html.'<option value = "'.$each_project_id->project_id.'">'.$each_project_id->project_name.'</option>';
			}
		
				echo $return_html;
		}

		else
			{
				echo "No Project Found!";
			}
		
		
  
	} 

	public function pick_project_info_for_expense()
	{
		$data = array();
		$customer_name = $this->input->post('customer_name', true);

		//print_r($_POST);exit();
		$project_info_by_customer_id = $this->Project_tracking_model->select_all_project_by_customer_name($customer_name);

		//echo "<pre>";print_r($project_info_by_customer_id);exit();
		if($project_info_by_customer_id)
		{
			$return_html = '<option value="select">Select</option>';
			foreach($project_info_by_customer_id as $each_project_id)
			{
				
				$return_html = $return_html.'<option value = "'.$each_project_id->project_id.'">'.$each_project_id->project_name.'</option>';
			}
		
				echo $return_html;
		}

		else
			{
				echo "No Project Found!";
			}
		
		
  
	}

	public function pick_project_name_description()
	{
		$data = array();
		$project_id = $this->input->post('project_id', true);
		$project_info_by_project_id = $this->Project_tracking_model->select_project_info_by_project_id($project_id);

		//echo "<pre>";print_r($project_info_by_project_id);exit();
		if($project_info_by_project_id)
		{
			echo $project_info_by_project_id->project_name.'#'.$project_info_by_project_id->project_description.'#'.$project_info_by_project_id->type.'#'.$project_info_by_project_id->customer_name;
		}
		
	}	
	
	public function project_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		//$data['view_project_info']=$this->project_tracking_model->select_project_info();
		 $data['all_project']=$this->Project_tracking_model->select_all_project_info();
		 $data['each_project']=$this->Project_tracking_model->select_all_project_info();
         $data['maincontent'] = $this->load->view('project_tracking/project_list', $data, true);
         $this->load->view('master', $data);
	}	
	
	public function edit_project($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
		 $data['last_id']=$this->Project_tracking_model->select_last_project_id();
		 $data['all_customer']=$this->Customer_model->select_all_customer_list();
		 $data['all_employee']=$this->Employee_model->select_all_employee_list($company_id);
		 $data['each_project']=$this->Project_tracking_model->select_each_project($id);
         $data['maincontent'] = $this->load->view('project_tracking/edit_project', $data, true);
         $this->load->view('master', $data);
        
	}
	public function update_project()
	{

        $data = array();
        $id = $this->input->post('id', true);
        $company_id = $this->session->userdata('company_id');
        $data['company_id'] = $company_id;
        $data['type'] = $this->input->post('type', true);
        $data['project_id'] = $this->input->post('project_id', true);
        $data['project_name'] = $this->input->post('project_name', true);
        $data['project_short_name'] = $this->input->post('project_short_name', true);
        $data['project_manager'] = $this->input->post('project_manager', true);
		$data['customer_name'] = $this->input->post('customer_name', true);
		$data['customer_id'] = $this->input->post('customer_id', true);
		$data['project_description'] = $this->input->post('project_description', true);
		$data['project_status'] = $this->input->post('project_status', true);
		$data['po_date'] = $this->input->post('po_date', true);
		$data['delivery_date'] = $this->input->post('delivery_date', true);
		$data['project_payment'] = $this->input->post('project_payment', true);
		$data['project_price'] = $this->input->post('project_price', true);
		$data['project_start_date'] = $this->input->post('project_start_date', true);
		$data['project_finished_date'] = $this->input->post('project_finished_date', true);
		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');
		$update_project = $this->Project_tracking_model->update_project_info($data,$id);
		if($update_project){
			echo "Project Updated Successfully";
		}
		else{
			echo "Project Not Updated";
		}
	    

                       
    }
	
	public function delete_project($id)
    {
        $this->Project_tracking_model->delete_project_info($id);
        redirect('Project_tracking/project_list');
		$sdata['message']='Project Deleted';
        $this->session->set_userdata($sdata);
    }
	public function finish_project($id)
	{
		$data = array();
		$company_id = $this->session->userdata('company_id');
		$finish_project = $this->Project_tracking_model->finish_project($id);
        redirect('Project_tracking/project_list');
        
	}
	public function details_view($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['each_project']=$this->Project_tracking_model->select_each_project($id);
         $data['maincontent'] = $this->load->view('project_tracking/details_view', $data, true);
		
         $this->load->view('master', $data);
        
	}
	public function create_new_task()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('project_tracking/create_new_task', $data, true);
		
         $this->load->view('master', $data);
        
	}
	
	public function task_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('project_tracking/task_list', $data, true);
		
        $this->load->view('master', $data);
        
	}	
	
	public function project_report()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('project_tracking/performance_report', $data, true);
		
         $this->load->view('master', $data);
        
	}	
	
	public function performance_report()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('project_tracking/performance_report', $data, true);
		
         $this->load->view('master', $data);
        
	}
	
	
	
	
}
