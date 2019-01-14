<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
          $this->load->model('Supplier_model');
    }


	public function add_new_supplier()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['last_id']=$this->Supplier_model->select_last_supplier_id();
         $data['maincontent'] = $this->load->view('supplier/create_supplier', $data, true);
		
        $this->load->view('master', $data);
        
	}
	 public function save_new_supplier() {
        $data = array();
        $company_id = $this->session->userdata('company_id');
        $data['company_id'] = $company_id;
        $data['supplier_id'] = $this->input->post('supplier_id', true);
        $data['full_name'] = $this->input->post('full_name', true);
        $data['short_name'] = $this->input->post('short_name', true);
        $data['supplier_address'] = $this->input->post('supplier_address', true);
        $data['factory_address'] = $this->input->post('factory_address', true);
        $data['supplier_contact'] = $this->input->post('supplier_contact', true);
        $data['factory_contact'] = $this->input->post('factory_contact', true);
        $data['supplier_designation'] = $this->input->post('supplier_designation', true);
        $data['factory_designation'] = $this->input->post('factory_designation', true);
        $data['supplier_email'] = $this->input->post('supplier_email', true);
        $data['factory_email'] = $this->input->post('factory_email', true);
        $data['supplier_mobile'] = $this->input->post('supplier_mobile', true);
        $data['factory_mobile'] = $this->input->post('factory_mobile', true);
        $data['supplier_phone'] = $this->input->post('supplier_phone', true);
        $data['factory_phone'] = $this->input->post('factory_phone', true);
        $data['web_address'] = $this->input->post('web_address', true);
        $data['reference'] = $this->input->post('reference', true);
        $data['is_active'] = $this->input->post('is_active', true);
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
        $this->Supplier_model->save_new_supplier_info($data);
		echo "Supplier Information Saved";
    }
	public function supplier_list()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['view_supplier_list']=$this->Supplier_model->select_all_supplier_list();
        $data['maincontent'] = $this->load->view('supplier/supplier_list', $data, true);
        $this->load->view('master', $data);
        
    
	}
	
	public function edit_supplier($id)
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['view_each_supplier']=$this->Supplier_model->select_each_supplier($id);
        $data['maincontent'] = $this->load->view('supplier/edit_supplier', $data, true);
        $this->load->view('master', $data);
	}
	public function update_supplier() {
        $data = array();
        $id = $this->input->post('id', true);
        $company_id = $this->session->userdata('company_id');
        $data['company_id'] = $company_id;
        $data['supplier_id'] = $this->input->post('supplier_id', true);
        $data['full_name'] = $this->input->post('full_name', true);
        $data['short_name'] = $this->input->post('short_name', true);
        $data['supplier_address'] = $this->input->post('supplier_address', true);
        $data['factory_address'] = $this->input->post('factory_address', true);
        $data['supplier_contact'] = $this->input->post('supplier_contact', true);
        $data['factory_contact'] = $this->input->post('factory_contact', true);
        $data['supplier_designation'] = $this->input->post('supplier_designation', true);
        $data['factory_designation'] = $this->input->post('factory_designation', true);
        $data['supplier_email'] = $this->input->post('supplier_email', true);
        $data['factory_email'] = $this->input->post('factory_email', true);
        $data['supplier_mobile'] = $this->input->post('supplier_mobile', true);
        $data['factory_mobile'] = $this->input->post('factory_mobile', true);
        $data['supplier_phone'] = $this->input->post('supplier_phone', true);
        $data['factory_phone'] = $this->input->post('factory_phone', true);
        $data['web_address'] = $this->input->post('web_address', true);
        $data['reference'] = $this->input->post('reference', true);
        $data['is_active'] = $this->input->post('is_active', true);
		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');
        $this->Supplier_model->update_supplier_info($data,$id);
		echo "supplier Information Updated";
    }
	
	    public function delete_supplier($id)
    {
        $this->Supplier_model->delete_supplier_info($id);
        redirect('Supplier/supplier_list');
		$sdata['message']='supplier Deleted';
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
		 $data['view_each_supplier']=$this->Supplier_model->select_each_supplier($id);
         $data['maincontent'] = $this->load->view('supplier/details_view', $data, true);
         $this->load->view('master', $data);
        
	}
	
	
	
}
