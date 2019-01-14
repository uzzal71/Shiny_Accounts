<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
	
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
          $this->load->model('Department_model');
          $this->load->model('Employee_model');
          $this->load->model('Device_model');
          $this->load->model('Shift_model');
          $this->load->model('Group_model');
          $this->load->model('Grade_model');
    }

	
	

	public function create()
	{
		 $data = array();
         $data['title'] = "2RA Technology Limited";
         $data['keyword'] = "";
         $data['description'] = "";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
		 $data['all_department'] = $this->Department_model->select_all_department_list($company_id);
		 $data['all_device'] = $this->Device_model->select_all_device_list($company_id);
		 $data['all_shift'] = $this->Shift_model->select_all_shift_list($company_id);
		 $data['all_designation'] = $this->Designation_model->select_all_designation_list($company_id);
		 $data['all_grade']=$this->Grade_model->select_all_grade_list($company_id);
		 $data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
		 $data['all_group'] = $this->Group_model->select_all_group_list($company_id);
		 $data['maincontent'] = $this->load->view('employee/create_employee', $data, true);
		
        $this->load->view('master', $data);
        
	}
	public function save_employee(){

        $data=array();

        $company_id = $this->session->userdata('company_id');
		$data['company_id']=$company_id;
        $employee_id = $this->input->post('employee_id');
        $data['employee_id']=$employee_id;
		$data['department']=$this->input->post('department');
		$data['line_manager']=$this->input->post('line_manager');
		$data['first_name']=$this->input->post('first_name');
		$first_name = $data['first_name'];
		$data['last_name']=$this->input->post('last_name');
		$last_name = $data['last_name'];
		$data['fatherName']=$this->input->post('fatherName');
		$data['motherName']=$this->input->post('motherName');
		$data['employType']=$this->input->post('employType');
		$data['employGrade']=$this->input->post('employGrade');
		$data['deviceID']=$this->input->post('deviceID');
		$deviceID = $data['deviceID'];
		$data['designation']=$this->input->post('designation');
		
		$input_card_id = $this->input->post('card_id');



$num1 = $input_card_id;
$diff1 = 0;

if (strlen($num1) < 10) 
 { 
 	$diff1 = 10 - strlen($num1);
 }

for ($i = 0; $i< $diff1; $i++ )
	{ $num1 = '0'.$num1; }

		if ($num1=='0000000000') {
			$num1=" ";
		}
		$data['card_id'] = $num1;
		$card_id = $num1;
		$data['nid']=$this->input->post('nid');
		$data['shift']=$this->input->post('shift');
		$data['email']=$this->input->post('email');
		$data['blood_group']=$this->input->post('blood_group');
		$data['joining_date']=$this->input->post('joining_date');
		$data['contact_no']=$this->input->post('contact_no');
		$data['date_of_birth']=$this->input->post('date_of_birth');
		$data['status']=$this->input->post('status');
		$data['present_address']=$this->input->post('present_address');
		$data['permanent_address']=$this->input->post('permanent_address');
		$data['weekend']=$this->input->post('weekend');
		$data['remarks']=$this->input->post('remarks');
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');

        $config['upload_path'] = 'images/employee/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100000';
        $config['max_width']  = '2024000';
        $config['max_height']  = '1968000';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $error='';
        $fdata=array();
        if ( ! $this->upload->do_upload('image_location'))
        { 
        	// echo "wrong"; exit();
         //    $error =  $this->upload->display_errors();
         //        echo $error;
         //        exit();
                
       
        }
        else
        {
        	//echo "Right"; exit();
                $fdata = $this->upload->data();
                $data['imagePath']=$config['upload_path'].$fdata['file_name'];
        }
        //echo "<pre>"; print_r($data);exit();

      if ($card_id==" ") {
      	$card_id=0;
      }
      $check_card_id_exists=$this->Employee_model->check_card_id($card_id,$company_id);

       if ($check_card_id_exists) {

       	$sdata['message']='Card ID Already Exists';
			$this->session->set_userdata($sdata);
			redirect('Employee/create');
       }

        $check_employee_id = $this->Employee_model->check_employee_id($employee_id,$company_id);
		if($check_employee_id)
		{
			//echo "Employee ID Already Exits";
			$sdata['message']='Employee ID Already Exists';
			$this->session->set_userdata($sdata);
			redirect('Employee/create');
			
		}
		else
		{	
			if ($deviceID=='all') {

			$deviceids=$this->Employee_model->select_devid($company_id);

			//print_r($deviceids);exit();
			$command_data = array();
			$active=array();
			foreach ($deviceids as  $devices) {
				
			
			$device=$devices->devId;
			$active['devId']=$device;
			$command_data['deviceId'] = $device;
			$command_data['value'] = $employee_id .':' .$first_name .' ' .$last_name. ':' .$card_id .':' .'0' .':' .'1' ;
			
			$active['employee_id']=$employee_id;
			$active['card_id']=$card_id;
			$active['action_code']='4';
			$active['datetime']=date("y-m-d h:i:s");
			$active['company_id']=$company_id;
			$command_data['actionCode'] = '4';
			$command_data['status'] = '1';
			$command_data['recording_time'] = date("y-m-d h:i:s");
			$command_data['recorded_by'] = $this->session->userdata('id');

			$save_employee_to_command = $this->Employee_model->save_employee_to_command_info($command_data);
			$active_employee = $this->Employee_model->insert_to_active_history($active);




			}}else{




			$command_data = array();
			$command_data['deviceId'] = $deviceID;
			$command_data['value'] = $employee_id .':' .$first_name .' ' .$last_name. ':' .$card_id .':' .'0' .':' .'1' ;
			
			$command_data['actionCode'] = '4';
			$command_data['status'] = '1';
			$command_data['recording_time'] = date("y-m-d h:i:s");
			$command_data['recorded_by'] = $this->session->userdata('id');

			$save_employee_to_command = $this->Employee_model->save_employee_to_command_info($command_data);

		}
			$save_employee=$this->Employee_model->save_employee_info($data);

			if($save_employee)
					{
						$sdata['message']='Employee Added Successfully';
						$this->session->set_userdata($sdata);
						redirect('employee/create');
					}
					else
					{	
						$sdata['message']='Something Went Wrong.';
						$this->session->set_userdata($sdata);
						redirect('Employee/create');
					}
					
		}

    }
// 	public function save_employee(){

//         $data=array();

//         $company_id = $this->session->userdata('company_id');
// 		$data['company_id']=$company_id;
//         $employee_id = $this->input->post('employee_id');
//         $data['employee_id']=$employee_id;
// 		$data['department']=$this->input->post('department');
// 		$data['line_manager']=$this->input->post('line_manager');
// 		$data['first_name']=$this->input->post('first_name');
// 		$first_name = $data['first_name'];
// 		$data['last_name']=$this->input->post('last_name');
// 		$last_name = $data['last_name'];
// 		$data['fatherName']=$this->input->post('fatherName');
// 		$data['motherName']=$this->input->post('motherName');
// 		$data['employType']=$this->input->post('employType');
// 		$data['employGrade']=$this->input->post('employGrade');
// 		$data['deviceID']=$this->input->post('deviceID');
// 		$deviceID = $data['deviceID'];
// 		$data['designation']=$this->input->post('designation');
		
// 		$input_card_id = $this->input->post('card_id');



// $num1 = $input_card_id;
// $diff1 = 0;

// if (strlen($num1) < 10) 
//  { 
//  	$diff1 = 10 - strlen($num1);
//  }

// for ($i = 0; $i< $diff1; $i++ )
// 	{ $num1 = '0'.$num1; }


// 		$data['card_id'] = $num1;
// 		$card_id = $num1;
// 		$data['nid']=$this->input->post('nid');
// 		$data['shift']=$this->input->post('shift');
// 		$data['email']=$this->input->post('email');
// 		$data['blood_group']=$this->input->post('blood_group');
// 		$data['joining_date']=$this->input->post('joining_date');
// 		$data['contact_no']=$this->input->post('contact_no');
// 		$data['date_of_birth']=$this->input->post('date_of_birth');
// 		$data['status']=$this->input->post('status');
// 		$data['present_address']=$this->input->post('present_address');
// 		$data['permanent_address']=$this->input->post('permanent_address');
// 		$data['weekend']=$this->input->post('weekend');
// 		$data['remarks']=$this->input->post('remarks');
// 		$data['recording_time'] = date("y-m-d h:i:s");
// 		$data['recorded_by'] = $this->session->userdata('id');

//         $config['upload_path'] = 'images/employee/';
//         $config['allowed_types'] = 'gif|jpg|png';
//         $config['max_size']	= '100000';
//         $config['max_width']  = '2024000';
//         $config['max_height']  = '1968000';

//         $this->load->library('upload', $config);
//         $this->upload->initialize($config);
//         $error='';
//         $fdata=array();
//         if ( ! $this->upload->do_upload('image_location'))
//        { 
//        	//echo "wrong"; exit();
//         //     $error =  $this->upload->display_errors();
//         //         echo $error;
//         //         exit();
       
//         }
//         else
//         {
//         	//echo "Right"; exit();
//                 $fdata = $this->upload->data();
//                 $data['imagePath']=$config['upload_path'].$fdata['file_name'];
//         }
//         //echo "<pre>"; print_r($data);exit();
        
//         $check_employee_id = $this->Employee_model->check_employee_id($employee_id,$company_id);
// 		if($check_employee_id)
// 		{
// 			//echo "Employee ID Already Exits";
// 			$sdata['message']='Employee ID Already Exist';
// 			$this->session->set_userdata($sdata);
// 			redirect('Employee/create');
			
// 		}
// 		else
// 		{
// 			$command_data = array();
// 			$command_data['deviceId'] = $deviceID;
// 			$command_data['value'] = $employee_id .':' .$first_name .' ' .$last_name. ':' .$card_id .':' .'0' .':' .'1' ;
			
// 			$command_data['actionCode'] = '4';
// 			$command_data['status'] = '1';
// 			$command_data['recording_time'] = date("y-m-d h:i:s");
// 			$command_data['recorded_by'] = $this->session->userdata('id');

// 			$save_employee_to_command = $this->Employee_model->save_employee_to_command_info($command_data);


// 			$save_employee=$this->Employee_model->save_employee_info($data);

// 			if($save_employee)
// 					{
// 						$sdata['message']='Employee Added Successfully';
// 						$this->session->set_userdata($sdata);
// 						redirect('employee/create');
// 					}
// 					else
// 					{	
// 						$sdata['message']='Something Went Wrong.';
// 						$this->session->set_userdata($sdata);
// 						redirect('Employee/create');
// 					}
					
// 		}

//     }
	public function employee_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
	     $data['company_id']=$company_id;
		 $data['all_employee']=$this->Employee_model->select_all_employee_list($company_id);
		 $data['maincontent'] = $this->load->view('employee/list', $data, true);
         $this->load->view('master', $data);
	}	
	public function edit_employee($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
	     $data['company_id']=$company_id;
		 $data['all_department']=$this->Department_model->select_all_department_list($company_id);
		 $data['all_device']=$this->Device_model->select_all_device_list($company_id);
		 $data['all_shift']=$this->Shift_model->select_all_shift_list($company_id);
		 $data['all_designation']=$this->Designation_model->select_all_designation_list($company_id);
		 $data['all_grade']=$this->Grade_model->select_all_grade_list($company_id);
		 $data['all_group'] = $this->Group_model->select_all_group_list($company_id);
		 $data['all_employee']=$this->Employee_model->select_all_employee_list($company_id);
		// $all_employee=$this->Employee_model->select_all_employee_list($company_id);
		 $data['each_employee']=$this->Employee_model->select_each_employee($company_id,$id);
		// $each_employee=$this->Employee_model->select_each_employee($company_id,$id);
		 		// echo "<pre>";
		 //print_r($all_employee);
		// exit();
		 $data['all_group']=$this->Group_model->select_all_group_list($company_id);
		 $data['maincontent'] = $this->load->view('employee/edit_employee', $data, true);
         $this->load->view('master', $data);
	}	
	
	public function update_employee(){
		//echo "<pre>"; print_r($_POST);exit();
        $data=array();
        $company_id = $this->session->userdata('company_id');
        $id = $this->input->post('id');
		$data['company_id']=$company_id;
         $employee_id = $this->input->post('employee_id');
        $data['employee_id']=$employee_id;
		$data['department']=$this->input->post('department');
		$data['line_manager']=$this->input->post('line_manager');
		$data['first_name']=$this->input->post('first_name');
		$first_name = $data['first_name'];
		$data['last_name']=$this->input->post('last_name');
		$last_name = $data['last_name'];
		$data['fatherName']=$this->input->post('fatherName');
		$data['motherName']=$this->input->post('motherName');
		$data['employType']=$this->input->post('employType');
		$data['employGrade']=$this->input->post('employGrade');
		$data['deviceID']=$this->input->post('deviceID');
		$deviceID = $data['deviceID'];
		$data['designation']=$this->input->post('designation');
		
		$input_card_id = $this->input->post('card_id');

//echo "<pre>"; print_r($data);exit();

$num1 = $input_card_id;
$diff1 = 0;

if (strlen($num1) < 10) 
 { 
 	$diff1 = 10 - strlen($num1);
 }

for ($i = 0; $i< $diff1; $i++ )
	{ $num1 = '0'.$num1; }


		$data['card_id'] = $num1;
		$card_id =  $num1;
		$data['nid']=$this->input->post('nid');
		$data['shift']=$this->input->post('shift');
		$data['email']=$this->input->post('email');
		$data['blood_group']=$this->input->post('blood_group');
		$data['joining_date']=$this->input->post('joining_date');
		$data['contact_no']=$this->input->post('contact_no');
		$data['date_of_birth']=$this->input->post('date_of_birth');
		$data['status']=$this->input->post('status');
		$data['present_address']=$this->input->post('present_address');
		$data['permanent_address']=$this->input->post('permanent_address');
		$data['weekend']=$this->input->post('weekend');
		$data['remarks']=$this->input->post('remarks');
		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');

        $config['upload_path'] = 'images/employee/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '';
        $config['max_width']  = '';
        $config['max_height']  = '';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $error='';
        $fdata=array();
        if ($this->upload->do_upload('image_location'))
        {
                 $fdata = $this->upload->data();
                $data['imagePath']=$config['upload_path'] .$fdata['file_name'];
        }
		//echo '<pre>';
		//print_r($data);
		//exit();
			$command_data = array();
			$command_data['deviceId'] = $deviceID;
			$command_data['value'] = $employee_id .':' .$first_name .' ' .$last_name. ':' .$card_id .':' .'0' .':' .'1' ;
			
			$command_data['actionCode'] = '4';
			$command_data['status'] = '1';
			$command_data['recording_time'] = date("y-m-d h:i:s");
		    $command_data['recorded_by'] = $this->session->userdata('id');
		    //echo "<pre>";print_r($data);exit();

			$save_employee_to_command = $this->Employee_model->save_employee_to_command_info($command_data);
			//echo '<pre>';print_r($data);exit();
			$update_employee=$this->Employee_model->update_employee_info($data,$id,$company_id);
			if($update_employee)
					{	
						$sdata['message']='Employee Updated Successfully';
						$this->session->set_userdata($sdata);
						redirect('Employee/employee_list');
					}
					else
					{	
						$sdata['message']='Something Went Wrong.';
						$this->session->set_userdata($sdata);
						redirect('Employee/employee_list');
					}
				
    }

	public function delete_image($id)
    {
        $data=array();
		
        $this->Employee_model->delete_image_by_id($id);
		
		redirect('Employee/edit_employee/'.$id);

    }

	public function details_view($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
	     $data['company_id']=$company_id;
		 $data['each_employee']=$this->Employee_model->select_each_employee($company_id,$id);
		 $data['maincontent'] = $this->load->view('employee/details_view', $data, true);
         $this->load->view('master', $data);
	}	
	
	public function pick_employee_name()
	{
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
		 $employee_id=$this->input->post('employee_id');
		 $employee_name=$this->Employee_model->select_employee_name_by_employee_id($employee_id);
		 if( $employee_name){
			 echo $employee_name->first_name." ".$employee_name->last_name;
			 
			 }
			 else{
				echo "Select Employee ID";
			 }
	   
    
	}	
	
	public function pick_employee_department()
	{
		$data = array();
		$company_id = $this->session->userdata('company_id');
		$employee_id=$this->input->post('employee_id');
		$department_name=$this->Employee_model->select_department_name_by_employee_id($company_id,$employee_id);
		if($department_name)
		{
			echo $department_name->department;
		}
		else
		{
			echo "";
		}
	}
	public function delete_employee($id) {
		$company_id= $this->session->userdata('company_id');

        $command_data = array();
        $employee_info = $this->Employee_model->select_each_employee($company_id,$id);
        $employee_id = $employee_info->employee_id;
        $card_id = $employee_info->card_id;
        $deviceId = $employee_info->deviceID;
		$command_data['deviceId'] = $deviceId;
		$command_data['value'] = $employee_id.':'.$card_id ;
		$command_data['actionCode'] = '6';
		$command_data['status'] = '1';
		$command_data['recording_time'] = date("y-m-d h:i:s");
		$command_data['recorded_by'] = $this->session->userdata('id');
		$save_employee_to_command = $this->Employee_model->save_employee_to_command_info($command_data);
        $this->Employee_model->delete_employee_info($id,$company_id);
		redirect('Employee/employee_list');
                
    }

    public function employee_report_form()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_department']=$this->Department_model->select_all_department_list($company_id);
         $data['maincontent'] = $this->load->view('employee/employee_report_form', $data, true);
		 $this->load->view('master', $data);
	}
	
	public function show_employee_report()
	{
		 $data = array();

		$all_department = $this->input->post('all_department', true);
		 $data['all_department']=$all_department;
		$department_name = $this->input->post('department_name', true);
		 $data['department_name']=$department_name;
		$data['employee_report_info']=$this->Employee_model->show_employee_report_info($all_department,$department_name);
		$employee_report_info=$this->Employee_model->show_employee_report_info($all_department,$department_name);
		//echo '<pre>';
		//print_r($employee_report_info);
		//exit();
	
      	$this->load->view('employee/employee_report',$data);
  }

  public function show_employee_report_pdf()
	{
		 $data = array();

		$all_department = $this->input->post('all_department', true);
		 $data['all_department']=$all_department;
		$department_name = $this->input->post('department_name', true);
		 $data['department_name']=$department_name;
		$data['employee_report_info']=$this->Employee_model->show_employee_report_info($all_department,$department_name);
		$employee_report_info=$this->Employee_model->show_employee_report_info($all_department,$department_name);
		//echo '<pre>';
		//print_r($employee_report_info);
		//exit();
	
      	$this->load->view('employee/show_employee_report_pdf',$data);
  }
	 public function show_employee_report_excel()
	{
		 $data = array();

		$all_department = $this->input->post('all_department', true);
		 $data['all_department']=$all_department;
		$department_name = $this->input->post('department_name', true);
		 $data['department_name']=$department_name;
		$data['employee_report_info']=$this->Employee_model->show_employee_report_info($all_department,$department_name);
		$employee_report_info=$this->Employee_model->show_employee_report_info($all_department,$department_name);
		//echo '<pre>';
		//print_r($employee_report_info);
		//exit();
	
      	$this->load->view('employee/show_employee_report_excel',$data);
  }


 public function delete_employees(){


 	$ids_to_be_deleted = $this->input->post('id', true);
	$company_id= $this->session->userdata('company_id');
 // print_r($ids_to_deleted);
 //  exit();
foreach ($ids_to_be_deleted as $key => $ids) {

			$id=$ids;
			//print_r($id);
       		$command_data = array();
        $employee_info = $this->Employee_model->select_each_employee($company_id,$id);
        $employee_id = $employee_info->employee_id;
        $card_id = $employee_info->card_id;
        $deviceId = $employee_info->deviceID;
		$command_data['deviceId'] = $deviceId;
		$command_data['value'] = $employee_id.':'.$card_id ;
		$command_data['actionCode'] = '6';
		$command_data['status'] = '1';
		$command_data['recording_time'] = date("y-m-d h:i:s");
		$command_data['recorded_by'] = $this->session->userdata('id');
		$save_employee_to_command = $this->Employee_model->save_employee_to_command_info($command_data);
        $this->Employee_model->delete_employee_info($id,$company_id);
		

	
}
echo "Employee Deleted Successfully";


	//$delete_confirm=$this->Expense_model->pick_account_no($bank_name);
 }
}
