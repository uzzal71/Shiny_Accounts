<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
          $this->load->model('Customer_model');
    }


	public function add_new_customer()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['last_id']=$this->Customer_model->select_last_customer_id();
         $data['maincontent'] = $this->load->view('customer/create_customer', $data, true);
		
        $this->load->view('master', $data);
        
	}	
	public function pick_customer_id()
	{
	     $customer_name= $this->input->post('customer_name', true);
		 $each_customer_id=$this->Customer_model->pick_customer_id($customer_name);
		 echo $each_customer_id->customer_id;
        
	}
	 public function save_new_customer()
     {
        $data = array();
        $company_id = $this->session->userdata('company_id');
        $data['company_id'] = $company_id;
        $data['customer_id'] = $this->input->post('customer_id', true);
        $data['full_name'] = $this->input->post('full_name', true);
        $data['short_name'] = $this->input->post('short_name', true);
        $data['customer_address'] = $this->input->post('customer_address', true);
        $data['factory_address'] = $this->input->post('factory_address', true);
        $data['customer_contact'] = $this->input->post('customer_contact', true);
        $data['factory_contact'] = $this->input->post('factory_contact', true);
        $data['customer_designation'] = $this->input->post('customer_designation', true);
        $data['factory_designation'] = $this->input->post('factory_designation', true);
        $data['customer_email'] = $this->input->post('customer_email', true);
        $data['factory_email'] = $this->input->post('factory_email', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);
        $data['factory_mobile'] = $this->input->post('factory_mobile', true);
        $data['customer_phone'] = $this->input->post('customer_phone', true);
        $data['factory_phone'] = $this->input->post('factory_phone', true);
        $data['web_address'] = $this->input->post('web_address', true);
        $data['reference'] = $this->input->post('reference', true);
        $data['is_active'] = $this->input->post('is_active', true);
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
        $this->Customer_model->save_new_customer_info($data);
		echo "Customer Information Saved";
    }
	public function customer_list()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['view_customer_list']=$this->Customer_model->select_all_customer_list();
        $data['maincontent'] = $this->load->view('customer/customer_list', $data, true);
        $this->load->view('master', $data);
	}
	
	public function edit_customer($id)
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['view_each_customer']=$this->Customer_model->select_each_customer($id);
        $data['maincontent'] = $this->load->view('customer/edit_customer', $data, true);
        $this->load->view('master', $data);
        
	}
	public function update_customer() {
        $data = array();
        $id = $this->input->post('id', true);
        $company_id = $this->session->userdata('company_id');
        $data['company_id'] = $company_id;
        $data['customer_id'] = $this->input->post('customer_id', true);
        $data['full_name'] = $this->input->post('full_name', true);
        $data['short_name'] = $this->input->post('short_name', true);
        $data['customer_address'] = $this->input->post('customer_address', true);
        $data['factory_address'] = $this->input->post('factory_address', true);
        $data['customer_contact'] = $this->input->post('customer_contact', true);
        $data['factory_contact'] = $this->input->post('factory_contact', true);
        $data['customer_designation'] = $this->input->post('customer_designation', true);
        $data['factory_designation'] = $this->input->post('factory_designation', true);
        $data['customer_email'] = $this->input->post('customer_email', true);
        $data['factory_email'] = $this->input->post('factory_email', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);
        $data['factory_mobile'] = $this->input->post('factory_mobile', true);
        $data['customer_phone'] = $this->input->post('customer_phone', true);
        $data['factory_phone'] = $this->input->post('factory_phone', true);
        $data['web_address'] = $this->input->post('web_address', true);
        $data['reference'] = $this->input->post('reference', true);
        $data['is_active'] = $this->input->post('is_active', true);
		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');
        $this->Customer_model->update_customer_info($data,$id);
		echo "Customer Information Updated";
    }
	
	    public function delete_customer($id)
    {
        $this->Customer_model->delete_customer_info($id);
        redirect('Customer/customer_list');
		$sdata['message']='Customer Deleted';
        $this->session->set_userdata($sdata);
    }
	
	public function details_view($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['view_each_customer']=$this->Customer_model->select_each_customer($id);
         $data['maincontent'] = $this->load->view('customer/details_view', $data, true);
		
        $this->load->view('master', $data);
        
	}
	
}
