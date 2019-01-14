<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {
	function __construct()
	{
		
		parent::__construct();
		 $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
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
        $data['maincontent'] = $this->load->view('schedule/create', $data, true);
        $this->load->view('master', $data);
        
	}
	
	public function save_schedule() {
        $data = array();
        $data['scheduleName'] = $this->input->post('scheduleName', true);
        $scheduleName = $data['scheduleName'];

        $data['scheduleTime'] = $this->input->post('scheduleTime', true);
        $scheduleTime = $data['scheduleTime'];

        $data['down_flag'] = $this->input->post('down_flag', true);
        $down_flag = $data['down_flag'];

		$data['sync_flag'] = $this->input->post('sync_flag', true);
		$sync_flag = $data['sync_flag'];

		$data['data_flag'] = $this->input->post('data_flag', true);
		$data_flag = $data['data_flag'];

		$data['emp_down'] = $this->input->post('emp_down', true);
		$emp_down = $data['emp_down'];

		$data['time_update'] = $this->input->post('time_update', true);
		$time_update = $data['time_update'];

		$data['finger_temp'] = $this->input->post('finger_temp', true);
		$finger_temp = $data['finger_temp'];

		$data['finger_temp_down'] = $this->input->post('finger_temp_down', true);
		$finger_temp_down = $data['finger_temp_down'];


		$data['erase_emp'] = $this->input->post('erase_all_employee', true);
		$erase_emp = $data['erase_emp'];

		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
        $lastId = $this->Schedule_model->save_schedule_info($data);

        $command_data = array();
		$command_data['deviceId'] = 0;
		$command_data['value'] = $scheduleName .':' .str_replace(' ','T',str_replace(':','-',$scheduleTime)) .':'.$down_flag .':' .$sync_flag .':'.$data_flag .':' .$emp_down .':'.$time_update .':' .$finger_temp .':'.$finger_temp_down.':' .$lastId .':'.$erase_emp;
		
		$command_data['actionCode'] = '8';
		$command_data['status'] = '1';

		$command_data['recording_time'] = date("y-m-d h:i:s");
		$command_data['recorded_by'] = $this->session->userdata('id');

		$save_schedule_to_command = $this->Schedule_model->save_schedule_to_command_info($command_data);


		$sdata['message']='Schedule Added Sucessfully';
        $this->session->set_userdata($sdata);
        redirect('Schedule/create');
                       
    }
	
		public function schedule_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['schedule_list']=$this->Schedule_model->select_all_schedule_list();
         $data['maincontent'] = $this->load->view('schedule/schedule_list', $data, true);
		
        $this->load->view('master', $data);
        
    
	}


	public function edit_schedule($id)
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['each_schedule']=$this->Schedule_model->select_each_schedule_list($id);
        $data['maincontent'] = $this->load->view('schedule/edit', $data, true);
        $this->load->view('master', $data);
        
	}	

	public function update_schedule() {
        $data = array();
        $id = $this->input->post('id', true);
        $data['scheduleName'] = $this->input->post('scheduleName', true);
        $scheduleName = $data['scheduleName'];

        $data['scheduleTime'] = $this->input->post('scheduleTime', true);
        $scheduleTime = $data['scheduleTime'];

        $data['down_flag'] = $this->input->post('down_flag', true);
        $down_flag = $data['down_flag'];

		$data['sync_flag'] = $this->input->post('sync_flag', true);
		$sync_flag = $data['sync_flag'];

		$data['data_flag'] = $this->input->post('data_flag', true);
		$data_flag = $data['data_flag'];

		$data['emp_down'] = $this->input->post('emp_down', true);
		$emp_down = $data['emp_down'];

		$data['time_update'] = $this->input->post('time_update', true);
		$time_update = $data['time_update'];

		$data['finger_temp'] = $this->input->post('finger_temp', true);
		$finger_temp = $data['finger_temp'];

		$data['finger_temp_down'] = $this->input->post('finger_temp_down', true);
		$finger_temp_down = $data['finger_temp_down'];

		$data['erase_emp'] = $this->input->post('erase_all_employee', true);
		$erase_emp = $data['erase_emp'];

		$data['recording_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');
        $update_schedule = $this->Schedule_model->update_schedule_info($id,$data);
        $lastId = $id;

        $command_data = array();
		$command_data['deviceId'] = 0;
		$command_data['value'] = $scheduleName .':' .str_replace(' ','T',str_replace(':','-',$scheduleTime)) .':'.$down_flag .':' .$sync_flag .':'.$data_flag .':' .$emp_down .':'.$time_update .':' .$finger_temp .':'.$finger_temp_down.':' .$lastId .':'.$erase_emp;
		
		$command_data['actionCode'] = '8';
		$command_data['status'] = '1';

		$command_data['recording_time'] = date("y-m-d h:i:s");
		$command_data['recorded_by'] = $this->session->userdata('id');

		$save_schedule_to_command = $this->Schedule_model->save_schedule_to_command_info($command_data);

		$sdata['message']='Schedule Updated Sucessfully';
        $this->session->set_userdata($sdata);
        redirect('Schedule/schedule_list');
                       
    }

    public function delete_schedule($id)
	{

        $command_data = array();
		$command_data['deviceId'] = 0;
		$command_data['value'] = $id ;
		
		$command_data['actionCode'] = '9';
		$command_data['status'] = '1';
		$command_data['recording_time'] = date("y-m-d h:i:s");
		$command_data['recorded_by'] = $this->session->userdata('id');

		$save_schedule_to_command = $this->Schedule_model->save_schedule_to_command_info($command_data);


		$data = array();
		$this->Schedule_model->delete_schedule_info($id);

		$sdata['message']='Schedule Deleted';
        $this->session->set_userdata($sdata);
        redirect('Schedule/schedule_list');
        
	}
	
}
