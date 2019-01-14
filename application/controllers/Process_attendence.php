<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manual_attendence extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
        //  $this->load->model('Manual_attendence_model');
    }


	public function index()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
        $data['maincontent'] = $this->load->view('processdata/process_attendence.php', $data, true);
		
        $this->load->view('master', $data);
        
	}
	
		public function manual_attendence()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
        $data['maincontent'] = $this->load->view('manual_attendence/attendence_entry_form.php', $data, true);
		
        $this->load->view('master', $data);
        
	}
		
   
}
