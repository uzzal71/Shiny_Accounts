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
		$this->load->model('User_model');
    }
    

	// public function index()
	// {
	// 	 $data = array();
 //         $data['title']="2RA Technology Limited";
 //         $data['keyword']="";
 //         $data['description']="";
 //       	$data['companies']=$this->Login_model->retrieve_company_names();
 //         $data['menu'] = $this->load->view('login_menu', $data, true);
	// 	 $data['sidenavbar'] = $this->load->view('blank', $data, true);
 //        $data['maincontent'] = $this->load->view('login', $data, true);
		
 //        $this->load->view('master', $data);
        
	// }

	public function index()
	{

       	$data['companies']=$this->Login_model->retrieve_company_names();	
        $this->load->view('ulogin', $data);
        
	}


	 public function check_login_info()
    {
        $user_name=$this->input->post('user_name',true);
        $password=$this->input->post('password',true);
        $company_id=$this->input->post('company_id',true);
        
        $result= $this->Login_model->check_login_info($user_name,$password,$company_id);

        $sdata=array();
       
		if($result)
		{
			$sdata['user_name']=$result->full_name;
			$sdata['user_id']=$result->user_name;
			$sdata['id']=$result->id;
			$sdata['company_id']=$company_id;
			if($result->user_type == "Admin"){
				//$roles= $this->Login_model->User_model->select_all_user_role_list($company_id);
	
				//$sdata['permitted_action'] = $roles->id;
					$sdata['permitted_action']=$result->permitted_action;
					$sdata['user_type']=$result->user_type;
			}
			else
			{

				$sdata['permitted_action']=$result->permitted_action;
				$sdata['user_type']=$result->user_type;

			}

			$this->session->set_userdata($sdata);

			//print_r($sdata);exit();
			//$sdata[]
		redirect('Welcome');
		}
		else
		{
			$sdata['message']='Your User Id / Password Invalid !';
			$this->session->set_userdata($sdata);
			redirect('Login','refresh');
       }
    }

    public function pick_user_list(){

    	

    	$company_id=$this->input->post('company_id',true);
    	$users=$this->Login_model->retrieve_user_names($company_id);
    	//print_r($users);
    	if($users)
		{
			$return_html = '<option value="select">Select</option>';
			foreach($users as $user_list)
			{
				
				$return_html = $return_html.'<option value = "'.$user_list->user_name.'">'.$user_list->user_name.'</option>';
			}
		
				echo $return_html;
		}

		else
			{
				echo "No User Found!";
			}
		
		
  
	}
    
	
	
}
