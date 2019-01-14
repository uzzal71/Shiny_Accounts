<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Negotiator extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
          $this->load->model('Negotiator_model');
    }


	public function add_new_negotiator()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		   $data['view_negotiator_type']=$this->Negotiator_model->select_all_negotiator_type();
        $data['maincontent'] = $this->load->view('negotiator/create_new_negotiator', $data, true);
		
        $this->load->view('master', $data);
        
	}
	 public function save_new_negotiator() {
        $data = array();
         
        $data['full_name'] = $this->input->post('full_name', true);
        $data['type'] = $this->input->post('type', true);
        $data['address'] = $this->input->post('address', true);
        $data['contact_no'] = $this->input->post('contact_no', true);
        $data['email'] = $this->input->post('email', true);
        $data['is_active'] = $this->input->post('is_active', true);
        
		$data['recording_time'] = $this->input->post('recording_time', true);
		$data['recorded_by'] = $this->input->post('recorded_by', true);
		
        $this->Negotiator_model->save_new_negotiator_info($data);
		$sdata['message']='Negotiator Information saved sucessfully';
        $this->session->set_userdata($sdata);
        redirect('Negotiator/add_new_negotiator');
                       
    }
		public function negotiator_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		   $data['view_nigotiator_list']=$this->Negotiator_model->select_all_negotiator_list();
        $data['maincontent'] = $this->load->view('negotiator/negotiator_list', $data, true);
		
        $this->load->view('master', $data);
        
    
	}
	
	
	
}
