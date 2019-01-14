<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id !=NULL)
        {
            redirect('Welcome','refresh');
        }
		$this->load->model('Login_model');
    }
    

	public function index()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('login_menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('blank', $data, true);
        $data['maincontent'] = $this->load->view('login', $data, true);
		
        $this->load->view('master', $data);
        
	}
	
	 public function check_login_info()
    {
        $user_name=$this->input->post('user_name',true);
        $password=$this->input->post('password',true);
        $company_id=$this->input->post('company_id',true);
        
        $result= $this->Login_model->check_login_info($user_name,$password,$company_id);
        //echo '<pre>';
        // print_r($result);
	    // exit();
        $sdata=array();
       
		if($result)
			{
           
				$sdata['user_name']=$result->user_name;
				$sdata['id']=$result->id;
				$sdata['company_id']=$company_id;
				$this->session->set_userdata($sdata);
				//$sdata[]
				redirect('Welcome');
			}
			else{
				$sdata['message']='Your User Id / Password Invalide !';
				$this->session->set_userdata($sdata);
				redirect('Login','refresh');
       }
    }
	
	
}
