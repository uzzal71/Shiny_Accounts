<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {
	  public function __construct() 
	  {
         parent::__construct();
         $id=$this->session->userdata('id');
         if($id ==NULL)
         {
            redirect('Login','refresh');
         }
          $this->load->model('Group_model');
          $this->load->model('Shift_model');
          $this->load->model('Employee_model');
       }
	public function add_new_group()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('group/create_new_group', $data, true);
         $this->load->view('master', $data);
        
	}	

	public function save_new_group()
	 {
        $data = array();
        $company_id= $this->session->userdata('company_id');
        $data['group_name'] = $this->input->post('group_name', true);
        $group_name = $this->input->post('group_name', true);
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
		$data['company_id'] = $company_id;
		$check_group_name= $this->Group_model->check_group_name($group_name,$company_id);
		if($check_group_name)
		{
			echo "Group Name already Exits.";
			exit();
		}
		else
		{
			$this->Group_model->save_new_group_info($data);
			echo "Group Added Successfully";
		}
                       
    }
	public function group_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_group']=$this->Group_model->select_all_group_list($company_id);
         $data['maincontent'] = $this->load->view('group/group_list', $data, true);
         $this->load->view('master', $data);
	}
	
	public function edit_group($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['each_group']=$this->Group_model->select_each_group($id);
         $data['maincontent'] = $this->load->view('group/edit_group', $data, true);
         $this->load->view('master', $data);
        
	}
	public function update_group()
	 {
		 //echo '<pre>';
		//print_r($_POST);
		// exit();
        $data = array();
        $company_id= $this->session->userdata('company_id');
        $id = $this->input->post('id', true);
        $data['group_name'] = $this->input->post('group_name', true);
		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');
		$data['company_id'] = $company_id;
		//echo '<pre>';
		//print_r($data);
		// exit();
        $this->Group_model->update_group_info($data,$id,$company_id);
		echo "Group Updated Successfully!";         
    }
	
	public function delete_group($id) {

        $this->Group_model->delete_group_info($id);
		redirect('Group/group_list');
                
    }
	public function group_shift_allocation()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_group']=$this->Group_model->select_all_group_list($company_id);
		 $data['all_shift']=$this->Shift_model->select_all_shift_list($company_id);
         $data['maincontent'] = $this->load->view('group/group_shift_allocation_form', $data, true);
         $this->load->view('master', $data);
	}
	public function save_group_shift_allocation()
	{
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		
		$data = array();
		
        $data['group_id'] = $this->input->post('group_id', true);
        $starting_shift[] = $this->input->post('starting_shift', true);
        $other_shift_string = $this->input->post('other_shift', true);
		$other_shift = explode(",",$other_shift_string);
        //$shift_id = $this->input->post('shift_id', true);
        //$data['shift_id'] = $shift_id;
        $from_date = $this->input->post('from_date', true);
		$company_id= $this->session->userdata('company_id');
		$all_shift=$this->Shift_model->select_all_shift_list($company_id);
		$to_date= $this->input->post('to_date', true);
        $working_day = $this->input->post('working_day', true);
        $gap= $this->input->post('gap', true);
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
		$data['company_id'] = $company_id;
		
		$shift = array();
			//array_push($shift,$starting_shift,$other_shift);	
		$shift = array_merge($shift, $starting_shift,$other_shift);
		//echo sizeof($shift);
		//echo '<pre>';
		//print_r($shift);
		//exit();
		$shift_array_index = 0;
		
		while($from_date <= $to_date) 
		{ 
			//$to_date=$this->input->post('to_date', true);
			$data['from_date'] = $from_date ;
			//$data['shift_id'] = $this->input->post('shift_id', true);

			$last_working_day=date_create($from_date);
			
			date_add($last_working_day,date_interval_create_from_date_string(($working_day-1)."days"));
			
			$last_working_day = date_format($last_working_day,"Y-m-d");
			//echo $last_working_day;
			$data['to_date'] = $last_working_day;
			if($last_working_day > $to_date){
				$data['to_date'] = $to_date;
			}

			$data['shift_id'] = $shift[$shift_array_index++];
	
			$this->Group_model->save_group_shift_allocation_info($data);
		
			$from_date=date_create($last_working_day);
			date_add($from_date,date_interval_create_from_date_string(($gap+1)."days"));
			$from_date = date_format($from_date,"Y-m-d");
			//echo $from_date;
			
			if($shift_array_index == sizeof($shift))
				$shift_array_index = 0;
		}


		echo "Success";
        
	}
	
	
	
}
