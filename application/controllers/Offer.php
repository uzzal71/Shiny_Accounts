<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
          $this->load->model('Offer_model');
          $this->load->model('Customer_model');
          $this->load->model('Employee_model');
    }


	public function create_new_offer()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['last_id']=$this->Offer_model->select_last_offer_id();
		 $company_id=$this->session->userdata('company_id');
		 $data['all_customers']=$this->Customer_model->select_all_customer_list($company_id);
		 $data['all_employees']=$this->Employee_model->select_all_employee_list($company_id);
         $data['maincontent'] = $this->load->view('offer/create_offer', $data, true);
		
        $this->load->view('master', $data);
        
	}	
	
	 public function save_new_offer() {
		$data = array();
        $data['offer_code'] = $this->input->post('offer_code', true);
        $data['amount'] = $this->input->post('amount', true);
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['phone_no'] = $this->input->post('phone_no', true);
		$data['contact_person'] = $this->input->post('contact_person', true);
		$data['mobile_phone_no'] = $this->input->post('mobile_phone_no', true);
		$data['promoted_by'] = $this->input->post('promoted_by', true);
		$data['offer_date'] = $this->input->post('offer_date', true);
		$data['description'] = $this->input->post('description', true);
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
               
//echo '<pre>';
//print_r($data);
//exit();
		//$lastid=$this->Offer_model->select_last_offer_id();
		$this->Offer_model->save_new_offer_info($data);
		 echo "New Offer added Successfully";
		               
    }
	
	public function offer_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['view_offer_list']=$this->Offer_model->select_all_offer_list();
         $data['maincontent'] = $this->load->view('offer/offer_list', $data, true);
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
