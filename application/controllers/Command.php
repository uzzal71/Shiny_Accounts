<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Command extends CI_Controller {
		
	function __construct()
	{
		
		parent::__construct();
		$id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
		
		$this->load->model('Command_model');
		$this->load->model('Device_model');
		$this->load->model('Schedule_model');

		}

	public function create()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_devices']=$this->Device_model->select_all_device_list($company_id);
		 $data['schedule_list']=$this->Schedule_model->select_all_schedule_list();
		 $data['all_employee']=$this->Employee_model->select_all_employee_list($company_id);

        $data['maincontent'] = $this->load->view('command/create', $data, true);
        $data['employee_list_main_content'] = $this->load->view('employee/list',$data,true);
		
        $this->load->view('master', $data);
        
	}
	public function save_new_command(){
		$data=array();
		$actionCode = $this->input->post('actionCode');
		$no_of_index = sizeof($_POST['deviceId']);
		//echo $no_of_index; exit();
		for($index = 0; $index < $no_of_index; $index++){

        $data['actionCode'] = $actionCode;
        $data['deviceId'] = $_POST['deviceId'][$index];
        $data['status'] = '1';

		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');

        $this->Command_model->save_command_info($data);
		}
       
		$sdata['message']='Command saved sucessfully';
           $this->session->set_userdata($sdata);
        redirect('Command/create');
    }
	public function command_list()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
       
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['command_list']=$this->Command_model->select_all_command_list();
        $data['maincontent'] = $this->load->view('command/list', $data, true);

		
        $this->load->view('master', $data);
        
    
	}
	
}
