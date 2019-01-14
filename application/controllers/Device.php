<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device extends CI_Controller {
	
	function __construct()
	{
		
		parent::__construct();
		$id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
		
		$this->load->model('Device_model');
		$this->load->model('Company_model');
		$this->load->model('Employee_model');

		}

	public function add_new_device()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['all_company'] = $this->Company_model->select_all_company_list();
        $data['maincontent'] = $this->load->view('device/add_new_device', $data, true);
		
        $this->load->view('master', $data);
        
	}
	
	public function save_new_device() 
	{
        $data = array();
        $DevId = $this->input->post('DevId', true);
        $data['DevId'] = $DevId;
        $data['serial'] = $this->input->post('serial', true);
        $serial = $data['serial'];
        $data['type'] = $this->input->post('type', true);
        $type = $data['type'];
		$DeviceName = $this->input->post('DeviceName', true);
		$data['DeviceName'] = $DeviceName;
		$data['Active'] = $this->input->post('Active', true);
		$Active = $data['Active'];
		$data['Slave'] = $this->input->post('Slave', true);
		$Slave = $data['Slave'];
		$data['Group_id'] = $this->input->post('Group_id', true);
		$Group_id = $data['Group_id'];
		$company_id = $this->session->userdata('company_id');
		$data['company_id'] = $company_id;
		$data['location'] = $this->input->post('location', true);
		
		$data['IpAddress'] = $this->input->post('IpAddress', true);
		$IpAddress = $data['IpAddress'];
		$data['recorded_by'] = $this->session->userdata('id');
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['created_at'] = date("y-m-d h:i:s");

		$device_id_name_exist = $this->Device_model->select_device_id_name($DevId,$DeviceName,$company_id);
		$IpAddress_exist = $this->Device_model->select_IpAddress($IpAddress,$company_id);

		if($device_id_name_exist)
		{
			echo "Device Id or Name already Exist";
			exit();
		}

		elseif($IpAddress_exist)
		{

			echo "IpAddress already Assigned.";
			exit();

		}
		else
		{

			$save_device = $this->Device_model->save_device_info($data);
			$command_data = array();
			$command_data['deviceId'] = $DevId;
			$command_data['value'] = $Active .':' .$IpAddress .':' .$DeviceName .':' .$serial .':' .$Slave .':' .$Group_id .':' .$type;
			
			$command_data['actionCode'] = '7';
			$command_data['status'] = '1';
			$save_device_to_command = $this->Device_model->save_device_to_command_info($command_data);

			if($save_device)
			{
				echo "New Device Saved";
			}
			else
			{
				echo "Not Saved";
			}

		}
		              
    }
	public function device_list()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_devices']=$this->Device_model->select_all_device_list($company_id);
        $data['maincontent'] = $this->load->view('device/list', $data, true);
        $this->load->view('master', $data);
	}
public function edit_device($id)
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_company'] = $this->Company_model->select_all_company_list();
		$data['each_device']=$this->Device_model->select_each_device($id,$company_id);
        $data['maincontent'] = $this->load->view('device/edit_device', $data, true);
        $this->load->view('master', $data);
        
	}
	public function update_device()
	 {	
        $data = array();
        $company_id= $this->session->userdata('company_id');
        $id = $this->input->post('id', true);
        $DevId = $this->input->post('DevId', true);
        $data['DevId'] = $DevId;
        $data['serial'] = $this->input->post('serial', true);
        $serial = $data['serial'];
        $data['type'] = $this->input->post('type', true);
        $type = $data['type'];
		$DeviceName = $this->input->post('DeviceName', true);
		$data['DeviceName'] = $DeviceName;
		$data['Active'] = $this->input->post('Active', true);
		$Active = $data['Active'];
		$data['Slave'] = $this->input->post('Slave', true);
		$Slave = $data['Slave'];
		$data['Group_id'] = $this->input->post('Group_id', true);
		$Group_id = $data['Group_id'];
		$company_id = $this->session->userdata('company_id');
		$data['company_id'] = $company_id;
		$data['location'] = $this->input->post('location', true);
		
		$data['IpAddress'] = $this->input->post('IpAddress', true);
		$IpAddress = $data['IpAddress'];
		$data['updated_by'] = $this->session->userdata('id');
		$data['updating_time'] = date("y-m-d h:i:s");

        $update_device = $this->Device_model->update_device_info($data,$id,$company_id);

    	$command_data = array();
		$command_data['deviceId'] = $DevId;
		$command_data['value'] = $Active .':' .$IpAddress .':' .$DeviceName .':' .$serial .':' .$Slave .':' .$Group_id .':' .$type;
		
		$command_data['actionCode'] = '7';
		$command_data['status'] = '1';

		$save_device_to_command = $this->Device_model->save_device_to_command_info($command_data);
		if($update_device)
		{
			echo "Device Updated Successfully!"; 
		}
		else
		{
			echo "Device Not Updated!";
		}
		         
    }
	public function delete_device($id) {

		$company_id= $this->session->userdata('company_id');

        $command_data = array();
        $device_info = $this->Device_model->select_each_device($id,$company_id);
        $deviceId = $device_info->DevId;
		$command_data['deviceId'] = $deviceId;
		$command_data['value'] = $deviceId ;
		
		$command_data['actionCode'] = '6';
		$command_data['status'] = '1';
		$command_data['recording_time'] = date("y-m-d h:i:s");
		$command_data['recorded_by'] = $this->session->userdata('id');

		$save_device_to_command = $this->Device_model->save_device_to_command_info($command_data);



        $this->Device_model->delete_device_info($id,$company_id);
		redirect('Device/device_list');
                
    } 

    public function employee_sync_add(){

		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_company'] = $this->Company_model->select_all_company_list();

		//print_r($data['all_company']);exit();
		//$data['each_device']=$this->Device_model->select_each_device_for_sync($company_id);
        $data['maincontent'] = $this->load->view('device/employee_sync_add', $data, true);
        $this->load->view('master', $data);
        


    }

    public function pick_devices(){

    	$company_id=$this->input->post('company_id', true);


    		$devices=$this->Device_model->select_each_device_for_sync($company_id);
    	//print_r($devices);exit();

    	if($devices)
		{
			$return_html = '<option value="select">Select</option>';
			
			foreach($devices as $device)
			{
				
				$return_html = $return_html.'<option value = "'.$device->DevId.'">'.$device->DevId.'</option>';
			}
		
				echo $return_html;
		}

		else
			{
				echo "No Project Found!";
			}


    }
	
	   public function pick_target_devices(){

    	$company_id=$this->input->post('company_id', true);
    	$source_device=$this->input->post('source_device',true);

    	// $company_id=1;
    	// $source_device=101;

    		$devices=$this->Device_model->select_target_device_for_sync($company_id,$source_device);
    	//print_r($devices);exit();

    	if($devices)
		{
			
			$return_html = '<option value="all">All</option>';
			foreach($devices as $device)
			{
				
				$return_html = $return_html.'<option value = "'.$device->DevId.'">'.$device->DevId.'</option>';
			}
		
				echo $return_html;
		}

		else
			{
				echo "No Project Found!";
			}


    }


		public function save_sync_add(){


			//print_r($_POST);exit();

			$company_id=$this->input->post('company_id',true);
			$source_type=$this->input->post('source_type',true);
			$source_device=$this->input->post('source_device',true);
			$target_device=$this->input->post('target_device',true);

			// $company_id=1;
			// $source_type='device';
			// $source_device=101;
			// $target_device=103;


			if ($source_type=='device' && $target_device !=='all') { ///first starts
				
				$pick_source_device_data=$this->Device_model->source_device_info($company_id,$source_device);

				//print_r($pick_source_device_data);exit();

				foreach ($pick_source_device_data as $device) {
						$command_data = array();
			$command_data['deviceId'] =$target_device;


				//print_r($command_data['deviceId']);exit();

			$command_data['value'] = $device->employee_id .':' .$device->first_name .' ' .$device->last_name. ':' .$device->card_id .':' .'0' .':' .'1' ;
			
			$command_data['actionCode'] = '4';
			$command_data['status'] = '1';
			$command_data['recording_time'] = date("y-m-d h:i:s");
			$command_data['recorded_by'] = $this->session->userdata('id');
			$command_data['actionCode'] = '4';
			//print_r($command_data);exit();

					$active=array();
					$active['devId']=$target_device;
					$active['employee_id']=$device->employee_id;
					$active['card_id']=$device->card_id ;
					$active['action_code']='4';
					$active['datetime']=date("y-m-d h:i:s");
					$active['company_id']=$company_id;
					$active['status']=1;
					$active_employee =$this->Employee_model->insert_to_active_history($active);

					$save_employee_to_command = $this->Employee_model->save_employee_to_command_info($command_data);
				}

					$command_data=array();
					$command_data['actionCode']=12;
					$command_data['value']='0';
					$command_data['status']=1;
					$command_data['deviceId']=$target_device;
					$command_data['recorded_by']=$this->session->userdata('id');
					$command_data['recording_time'] = date("y-m-d h:i:s");
					$save_employee_to_command = $this->Employee_model->save_employee_to_command_info($command_data);
					if ($save_employee_to_command) {
						echo "Employee Added Successfully";
					}
				

			}// first ends here


			if ($source_type=='list' && $target_device !=='all') { //second starts

				$pick_list_device_data=$this->Device_model->list_source_device_info($company_id);

				//print_r($pick_source_device_data);exit();

				foreach ($pick_list_device_data as $device) {
						$command_data = array();
			$command_data['deviceId'] =$target_device;


				//print_r($command_data['deviceId']);exit();

			$command_data['value'] = $device->employee_id .':' .$device->first_name .' ' .$device->last_name. ':' .$device->card_id .':' .'0' .':' .'1' ;
			
			$command_data['actionCode'] = '4';
			$command_data['status'] = '1';
			$command_data['recording_time'] = date("y-m-d h:i:s");
			$command_data['recorded_by'] = $this->session->userdata('id');
			$command_data['actionCode'] = '4';
			//print_r($command_data);exit();

					$active=array();
					$active['devId']=$target_device;
					$active['employee_id']=$device->employee_id;
					$active['card_id']=$device->card_id ;
					$active['action_code']='4';
					$active['datetime']=date("y-m-d h:i:s");
					$active['company_id']=$company_id;
					$active['status']=1;
					$active_employee =$this->Employee_model->insert_to_active_history($active);

					$save_employee_to_command = $this->Employee_model->save_employee_to_command_info($command_data);
				}


					$command_data=array();
					$command_data['actionCode']=12;
					$command_data['value']='0';
					$command_data['status']=1;
					$command_data['deviceId']=$target_device;
					$command_data['recorded_by']=$this->session->userdata('id');
					$command_data['recording_time'] = date("y-m-d h:i:s");
					$save_employee_to_command = $this->Employee_model->save_employee_to_command_info($command_data);
					if ($save_employee_to_command) {
						echo "Employee Added Successfully";
					}
				 
			}//second ends

			if (($source_type=='list'||$source_type=='device') && $target_device =='all'){ //third starts

				
				$pick_all_device_id=$this->Device_model->pick_all_device($company_id);

				//print_r($pick_all_device_id);exit();

				foreach ($pick_all_device_id as  $devices) {

					$target_device=$devices->DevId;

					//print_r($target_device);

					if ($source_type=='device' && $target_device !=='all') {  //fourth statrts
				
				$pick_source_device_data=$this->Device_model->source_device_info($company_id,$source_device);

				//print_r($target_device);
				foreach ($pick_source_device_data as $device) {
						$command_data = array();
			$command_data['deviceId'] =$target_device;


				//print_r($command_data['deviceId']);exit();

			$command_data['value'] = $device->employee_id .':' .$device->first_name .' ' .$device->last_name. ':' .$device->card_id .':' .'0' .':' .'1' ;
			
			$command_data['actionCode'] = '4';
			$command_data['status'] = '1';
			$command_data['recording_time'] = date("y-m-d h:i:s");
			$command_data['recorded_by'] = $this->session->userdata('id');
			$command_data['actionCode'] = '4';
			//print_r($command_data);exit();

					$active=array();
					$active['devId']=$target_device;
					$active['employee_id']=$device->employee_id;
					$active['card_id']=$device->card_id ;
					$active['action_code']='4';
					$active['datetime']=date("y-m-d h:i:s");
					$active['company_id']=$company_id;
					$active['status']=1;
					$active_employee =$this->Employee_model->insert_to_active_history($active);

					$save_employee_to_command = $this->Employee_model->save_employee_to_command_info($command_data);
				}

						$command_data=array();
					$command_data['actionCode']=12;
					$command_data['value']='0';
					$command_data['status']=1;
					$command_data['deviceId']=$target_device;
					$command_data['recorded_by']=$this->session->userdata('id');
					$command_data['recording_time'] = date("y-m-d h:i:s");
					$save_employee_to_command = $this->Employee_model->save_employee_to_command_info($command_data);
					// if ($save_employee_to_command) {
					// 	echo "Employee Added Successfully";
					// }
				

			} // fourth_ends here
			if ($source_type=='list' && $target_device !=='all') { //sixth starts 

				$pick_list_device_data=$this->Device_model->list_source_device_info($company_id);

				//print_r($pick_source_device_data);exit();

				foreach ($pick_list_device_data as $device) {
						$command_data = array();
			$command_data['deviceId'] =$target_device;


				//print_r($command_data['deviceId']);exit();

			$command_data['value'] = $device->employee_id .':' .$device->first_name .' ' .$device->last_name. ':' .$device->card_id .':' .'0' .':' .'1' ;
			
			$command_data['actionCode'] = '4';
			$command_data['status'] = '1';
			$command_data['recording_time'] = date("y-m-d h:i:s");
			$command_data['recorded_by'] = $this->session->userdata('id');
			$command_data['actionCode'] = '4';
			//print_r($command_data);exit();

					$active=array();
					$active['devId']=$target_device;
					$active['employee_id']=$device->employee_id;
					$active['card_id']=$device->card_id ;
					$active['action_code']='4';
					$active['datetime']=date("y-m-d h:i:s");
					$active['company_id']=$company_id;
					$active['status']=1;
					$active_employee =$this->Employee_model->insert_to_active_history($active);

					$save_employee_to_command = $this->Employee_model->save_employee_to_command_info($command_data);
				}

					$command_data=array();
					$command_data['actionCode']=12;
					$command_data['value']='0';
					$command_data['status']=1;
					$command_data['deviceId']=$target_device;
					$command_data['recorded_by']=$this->session->userdata('id');
					$command_data['recording_time'] = date("y-m-d h:i:s");
					$save_employee_to_command = $this->Employee_model->save_employee_to_command_info($command_data);
					// if ($save_employee_to_command) {
					// 	echo "Employee Added Successfully";
					// }
				
				 
			}// sixth_ends_here

					
				}


					echo "Employee Added Successfully";

			} //third ends here


		}

}
