<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
        $this->load->model('Welcome_model');
    }

	public function index()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
        $data['maincontent'] = $this->load->view('home_page_content', $data, true);
		
        $this->load->view('master', $data);
        
    
	}
	public function user()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
        $data['maincontent'] = $this->load->view('home_page_content', $data, true);
		
        $this->load->view('master', $data);
        
    
	}
	 public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('company_id');
        $sdata=array();
        $sdata['message']='You are Successfully Logout !';
        $this->session->set_userdata($sdata);
        redirect('Login');
        
    }
	 public function change_password()
    {
       $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
        $data['maincontent'] = $this->load->view('change_password', $data, true);
		 $this->load->view('master', $data);
        
    }
	
	public function update_password() {
        $data = array();
         
        $password = $this->input->post('password', true);
		
		$result=$this->Welcome_model->check_password($password);
	    
		if($result)
       {
		    $new_password = $this->input->post('new_password', true);
			$confirm_password= $this->input->post('confirm_password', true);
			// echo '<pre>';
			//print_r($_POST);
			//  exit();
			if($new_password==$confirm_password){
					$password = md5($confirm_password);
					$id=$this->session->userdata('id');
			  
					$this->Welcome_model->update_password($password,$id);
		
					$sdata['message']='Password Updated!';
					$this->session->set_userdata($sdata);
					redirect('Welcome/change_password');
			 
			}
			else{
					$sdata['message']='Confirm password does not match with new Password!';
					$this->session->set_userdata($sdata);
					redirect('Welcome/change_password');
			 
			}
         
       }
       else{
           $sdata['message']='Please Enter Correct Old Password !';
           $this->session->set_userdata($sdata);
           redirect('Welcome/change_password');
       }
                
    }
}
