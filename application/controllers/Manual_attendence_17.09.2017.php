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
          $this->load->model('Attendence_model');
          $this->load->model('Manual_attendence_model');
          $this->load->model('Employee_model');
          $this->load->model('Department_model');
          $this->load->model('Salary_model');
          $this->load->model('Shift_model');
    }


	public function manual_attendence_entry()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
		 $data['all_department']=$this->Department_model->select_all_department_list($company_id);
		 $data['all_employee']=$this->Employee_model->select_all_employee_list($company_id);
         $data['maincontent'] = $this->load->view('manual_attendence/manual_attendence_entry.php', $data, true);
		
        $this->load->view('master', $data);
        
	}
	public function add_manual_attendence()
	{
		
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		$data = array();
		$company_id = $this->session->userdata('company_id');
        $data['company_id'] = $company_id;
		$employee_id = $this->input->post('employee_id', true);
		$data['employee_id'] = $employee_id;
		$each_employee = $this->Employee_model->each_employee_info($company_id,$employee_id);
		$data['card_id'] = $each_employee->card_id;
		$data['employee_name'] = $each_employee->first_name.' '.$each_employee->last_name;
		$data['device_id'] = $each_employee->deviceID;
		$date=$this->input->post('date', true);
		$in_time=$this->input->post('in_time', true);
		$out_time=$this->input->post('out_time', true);
		$data['under_consideration'] = $this->input->post('under_consideration', true);
		$data['remarks'] = $this->input->post('remarks', true);
		$data['updated_at'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');
		if($in_time != "")
		{
			$ctime = $date." ".$in_time;
			$data['ctime'] = $ctime;
			$save_attendence = $this->Manual_attendence_model->save_employee_attendence_info($data);
			
			if($save_attendence)
			{
				echo "Saved";
			}
			else
			{
				echo "Not Saved";
			}
		 }		
		 if($out_time != "")
		 {
			$ctime = $date." ".$out_time;
			$data['ctime'] = $ctime;
			$save_attendence = $this->Manual_attendence_model->save_employee_attendence_info($data);
			if($save_attendence)
			{
				echo "Saved";
			}
			else
			{
				echo "Not Saved";
			}
		 }

	}	
	public function attendence_report_excel()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
        $data['maincontent'] = $this->load->view('manual_attendence/attendence_report_excel.php', $data, true);
		
        $this->load->view('master', $data);
        
	}
	public function save_employee_manual_attendence()
	{
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		$data = array();
		$in_late="0";
		$early_out="0";
		$late="Null";
		$holiday_name="";
		$status="P";
		$duration="0";
		$company_id = $this->session->userdata('company_id');
		$date_from = $this->input->post('date', true);
		$in_time = $this->input->post('in_time', true);
		$out_time = $this->input->post('out_time', true);
		$remarks = $this->input->post('remarks', true);
		$employee_ids=$this->input->post('employee_id', true);
		$all_employees = $this->Attendence_model->select_employee_info_by_employee_ids($employee_ids);

		$employee_info = array();

		foreach($all_employees as $each_employee)
		{
			$each_employee_info = array();
			$each_employee_info['employee_id'] = "$each_employee->employee_id";
			$each_employee_info['employee_name'] = "$each_employee->first_name $each_employee->last_name";
			$each_employee_info['card_id'] = "$each_employee->card_id";
			$each_employee_info['department'] = "$each_employee->department";
			$each_employee_info['shift'] = "$each_employee->shift";
			$each_employee_info['group_id'] = "$each_employee->group_id";
			$each_employee_info['weekend'] = "$each_employee->weekend";
			$each_employee_info['remarks'] = "$each_employee->remarks";
			
			array_push($employee_info,$each_employee_info);			
		}

		//echo '<pre>';
		//print_r($employee_info);
		//exit();

		$all_shift=$this->Shift_model->select_all_shift_list($company_id);
		$shift_info = array();
		
		foreach($all_shift as $each_shift)
		{
			$each_shift_info = array();
			$each_shift_info['id'] = "$each_shift->id";
			$each_shift_info['shift_start'] = "$each_shift->shift_start";
			$each_shift_info['shift_end'] = "$each_shift->shift_end";
			$each_shift_info['shift_start_from'] = "$each_shift->shift_start_from";
			$each_shift_info['shift_end_from'] = "$each_shift->shift_end_from";
			$each_shift_info['grace'] = "$each_shift->grace";
			$each_shift_info['lunch_start'] = "$each_shift->lunch_start";
			$each_shift_info['lunch_end'] = "$each_shift->lunch_end";
			$each_shift_info['half_day_margin'] = "$each_shift->half_day_margin";
			//array_push($shift_info,$each_shift_info);
			$shift_info[$each_shift->id]=$each_shift_info;
			
		}
		
				/*############################ Employee #############################*/
				$i=0;
				$employee_id=$employee_info[$i]['employee_id'];
				$employee_name=$employee_info[$i]['employee_name'];
				$card_id=$employee_info[$i]['card_id'];
				$department=$employee_info[$i]['department'];
				$shift=$employee_info[$i]['shift'];
				$group_id=$employee_info[$i]['group_id'];
				$weekend=$employee_info[$i]['weekend'];
				
				$check_special_shift_allocation=$this->Attendence_model->select_special_shift_allocation_info($employee_id,$date_from);
				
				if($check_special_shift_allocation)
				{
						$shift=$check_special_shift_allocation->shift_id;
				}
				else
				{
					$check_group_shift_allocation=$this->Attendence_model->select_group_shift_allocation_info($group_id,$date_from);
					
					if($check_group_shift_allocation)
					{				
						$shift=$check_group_shift_allocation->shift_id;
						//echo $shift;						
					}

				}

				/*############################ Shift #############################*/

				$shift_start_from = $shift_info[$shift]['shift_start_from'];
				$shift_end_from = $shift_info[$shift]['shift_end_from'];
				$shift_start = $shift_info[$shift]['shift_start'];
				$shift_end = $shift_info[$shift]['shift_end'];
				$half_day_margin = $shift_info[$shift]['half_day_margin'];
				$grace = $shift_info[$shift]['grace'];

				$is_night = 0;
				if($shift_start > $shift_end)
				{
					$is_night = 1;
				}
				
				/*############################ IN TIME  From Direct Input#############################*/

				/*############################ IN Late #############################*/
			
				//$shift_start_plus_grace = date('H:i:s', strtotime($shift_start)+($grace*60));
				$shift_start_plus_grace_plus_from_time = $date_from." ".date('H:i:s', strtotime($shift_start)+($grace*60));
				//echo $shift_start_plus_grace."------------".$shift_start_plus_grace_plus_from_time; exit();
					

				if($shift_start_plus_grace_plus_from_time < $in_time)
				{	
					$first_half = $this->Attendence_model->select_approved_first_half_leave_by_employee_id($date_from,$employee_id);
					if($first_half)
					{
						if( $date_from." ".date('H:i:s', strtotime($half_day_margin)+($grace*60)) < $in_time)
						{
							$datetime1 = new DateTime($in_time);
							$datetime2 = new DateTime($date_from." ".date('H:i:s', strtotime($half_day_margin)));
							$interval = $datetime1->diff($datetime2);
							$in_late= $interval->format('%H:%i:%s');
							$status = "L";
						}
						
					$remarks="First Half Leave";						
					}
					else
					{
						$status = "L";
						$datetime1 = new DateTime($in_time);
						$datetime2 = new DateTime($date_from." ".date('H:i:s', strtotime($shift_start)));
						$interval = $datetime1->diff($datetime2);
						$in_late= $interval->format('%H:%i:%s');	
					}	
				}		
			
			/*############################ OUT TIME From Direct Input#############################*/
			if($is_night == 1)
			{
				$date=date_create($date_from);
				date_add($date,date_interval_create_from_date_string("1 days"));
				$date_from_for_out_time = date_format($date,"Y-m-d");
			}
			else
			{
				$date_from_for_out_time = $date_from;
			}
			
			/*############################ Duration #############################*/
			if($out_time > $in_time)
			{
				$datetime1 = new DateTime($out_time);
				$datetime2 = new DateTime($in_time);
				$interval = $datetime1->diff($datetime2);
				$duration= $interval->format('%H:%i:%s');				
			}
			/*############################Early Out#############################*/
	
			$shift_end_plus_date = $date_from_for_out_time." ".$shift_end;
			if($shift_end_plus_date > $out_time)
			{	
				$second_half = $this->Attendence_model->select_approved_second_half_leave_by_employee_id($date_from,$employee_id);
				
				if($second_half)
				{
					if($out_time < $date_from." ".date('H:i:s', strtotime($half_day_margin)))
					{
						$datetime1 = new DateTime($date_from." ".date('H:i:s', strtotime($half_day_margin)));
						$datetime2 = new DateTime($out_time);
						$interval = $datetime1->diff($datetime2);
						$early_out= $interval->format('%H:%i:%s');
					}
					
					$remarks="Second Half Leave";							
				}						
				else
				{
					$datetime1 = new DateTime($shift_end_plus_date);
					$datetime2 = new DateTime($out_time);
					$interval = $datetime1->diff($datetime2);
					$early_out= $interval->format('%H:%i:%s');
					
				}

			}	

	
		
			/*############################ Holyday,Leave,Weekend,Absent/ #############################*/
			
			if($in_time)
			{
				//$status="P";					
			}
			else
			{
				$check_holiday = $this->Attendence_model->select_holiday_from_date($date_from);
				
				if($check_holiday)
				{
					$holiday_name = $check_holiday->type;
					$status="H";
					$is_night = 0;
				}
				else
				{
					$check_leave = $this->Attendence_model->select_approved_leave_by_employee_id($date_from,$employee_id);
					
					if($check_leave)
					{	
						if($check_leave->half_full_day == "first_half"){
							
						}							
						if($check_leave->half_full_day == "second_half"){
							
						}
						$status = $check_leave->leave_types;
						$is_night = 0;
					}
					else
					{
						$day=date('D', strtotime($date_from));
						//$check_weekend = $this->Attendence_model->select_weekend_by_employee_id($day,$employee_id);
						if($day == $weekend)
						{
							$status="W";
							$is_night = 0;
						}
						else
						{
							$status="A";
							$is_night = 0;
						}
						
					}
					
				}

			}
		
			$data = array();
			$data['company_id'] = $company_id;
			$data['card_id'] = $card_id;
			$data['employee_id'] = $employee_id;
			$data['employee_name'] = $employee_name;
			$data['department'] = $department;
			$data['duty_location'] = "Dhaka";
			$data['shift_id'] = $shift;
			$data['date'] = $date_from;
			$data['in_time'] = $in_time;
			$data['out_time'] = $out_time;
			$data['duration'] = $duration;
			$data['in_late'] = $in_late;
			$data['early_out'] = $early_out;
			$data['late'] = $late;
			$data['status'] = $status;
			$data['holiday_name'] = $holiday_name;
			$data['remarks'] = $remarks;
			$data['night_status'] = $is_night;
			$data['recording_time'] = date("y-m-d h:i:s");
			$data['recorded_by'] = $this->session->userdata('id');
			
			$is_exist = $this->Manual_attendence_model->check_attendence_is_exist($company_id,$employee_id,$date_from);
			//echo '<pre>';
		    //print_r($is_exist);
		    //exit();
			
			if($is_exist){
				$update_attendence_process_info = $this->Manual_attendence_model->update_attendence_process_info($company_id,$employee_id,$date_from,$data);	

				if($update_attendence_process_info)
				{
					echo "Updated";
				}
				else{
					echo "Not Update";
				}
			}
			else{
				$save_attendence_process_info = $this->Attendence_model->save_attendence_process_info($data);	

				if($save_attendence_process_info)
				{
					echo "Saved";
				}
				else{
					echo "Not saved";
				}
			}
	}
	
	public function pending_attendence()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
		 $employee_id = $this->session->userdata('user_name');
		 $data['all_pending_attendence']=$this->Manual_attendence_model->view_employee_pending_attendence_info($company_id,$employee_id);
         $data['maincontent'] = $this->load->view('manual_attendence/pending_attendence_list.php', $data, true);
		
        $this->load->view('master', $data);
        
	}		
	public function approved_attendence()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
		 $employee_id = $this->session->userdata('user_name');
		 $data['all_approved_attendence']=$this->Manual_attendence_model->view_employee_approved_attendence_info($company_id,$employee_id);
         $data['maincontent'] = $this->load->view('manual_attendence/approved_attendence_list.php', $data, true);
		
        $this->load->view('master', $data);
        
	}	
	
	public function approve_manual_attendence_form()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
		 $line_manager = $this->session->userdata('user_name');
		 $data['all_subordinate_pending_attendence']=$this->Manual_attendence_model->select_all_subordinate_pending_manual_attendence_info($line_manager,$company_id);
         $data['maincontent'] = $this->load->view('manual_attendence/approve_manual_attendence_list', $data, true);
		
        $this->load->view('master', $data);
        
	}		
	public function approve_manual_attendence($id)
	{
		 $data = array();

		 $line_manager = $this->session->userdata('user_name');
		 $company_id = $this->session->userdata('company_id');
		 $data['status'] = "P";
		 		// echo '<pre>';
		 //print_r($company_id);
		 //exit();
		 $approve_manual_attendence=$this->Manual_attendence_model->approve_manual_attendence_info($data,$id,$company_id);
         if($approve_manual_attendence){
			// alert("Approved");
			 redirect('Manual_attendence/approve_manual_attendence_form');
		 }
		 else{
			// alert("Not Approved");
			 redirect('Manual_attendence/approve_manual_attendence_form');
		 }
	}	
		
	public function edit_pending_attendence($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
		 $data['all_department']=$this->Department_model->select_all_department_list($company_id);
		 $data['all_employee']=$this->Employee_model->select_all_employee_list($company_id);
		 $company_id = $this->session->userdata('company_id');
		 //echo '<pre>';
		// print_r($company_id);
		// exit();
		 $data['each_pending_attendence']=$this->Manual_attendence_model->view_each_pending_attendence_info($id,$company_id);
         $data['maincontent'] = $this->load->view('manual_attendence/edit_manual_attendence.php', $data, true);
		
        $this->load->view('master', $data);
        
	}	
	public function update_pending_attendence()
	{
		
		//echo '<pre>';
		// print_r($_POST);
		 //exit();
		 $data = array();
		 $company_id = $this->session->userdata('company_id');
         $data['company_id'] = $company_id;
         $id = $this->input->post('id', true);
		 $employee_id=$this->input->post('employee_id', true);
         $data['employee_id'] = $employee_id;
		 $employee_info=$this->Employee_model->pick_employee_info_by_employee_id($company_id,$employee_id);
         $employee_name = $employee_info->first_name." ".$employee_info->last_name;
         $data['employee_name'] = $employee_name;
         $data['department'] = $this->input->post('department', true);
         $data['date'] = $this->input->post('date', true);
		 $data['duty_location'] = $this->input->post('duty_location', true);
		 $data['in_time'] = $this->input->post('in_time', true);
		 $data['out_time'] = $this->input->post('out_time', true);
		 $data['under_consideration'] = $this->input->post('under_consideration', true);
		 $data['remarks'] = $this->input->post('remarks', true);
		 $data['status'] = "Manual";
		 $data['updating_time'] = date("y-m-d h:i:s");
		 $data['updated_by'] = $this->session->userdata('id');
		 //echo '<pre>';
		 //print_r($data);
		 //exit();
		 $update_pending_attendence=$this->Manual_attendence_model->update_pending_attendence_info($data,$id,$company_id);
		 if($update_pending_attendence){
			  echo "Updated";
		 }
		 else{
			  echo "Fail to update";
		 }
		 
		
	}	
	public function delete_manual_attendence($id) {
		
		$company_id = $this->session->userdata('company_id');
        $this->Manual_attendence_model->delete_manual_attendence_info($id,$company_id);
		redirect('Manual_attendence/pending_attendence');
                 
    }

		
	public function attendence_report_form()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
		 $data['all_employee']=$this->Employee_model->select_all_employee_list($company_id);
         $data['maincontent'] = $this->load->view('manual_attendence/attendence_report_form', $data, true);
		 $this->load->view('master', $data);
	  
	}		
	public function view_attendence_report()
	{
		$data = array();
        $employee_id = $this->input->post('employee_id', true);
		$from_date = $this->input->post('from_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		if($chk_to_date==1){
			$to_date = $this->input->post('to_date', true);
			$attendence_report_info=$this->Manual_attendence_model->show_attendence_to_date_report_info($employee_id,$from_date,$to_date);
		}else{
			$attendence_report_info=$this->Manual_attendence_model->show_attendence_report_info($employee_id,$from_date);

		}
		
   
		echo $attendence_report_info;
		  
	}	
	public function show_report()
	{
		 $data = array();

        $employee_id = $this->input->post('employee_id', true);
		$from_date = $this->input->post('from_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);

		$data['chk_to_date']= $chk_to_date;
		$data['employee_id']=$employee_id;
		//$data['employee_name']=$this->Manual_attendence_model->employee_name_by_employee_id($employee_id);
		$employee_name=$this->Manual_attendence_model->employee_name_by_employee_id($employee_id);
		//echo "<pre>";
		//print_r($employee_name);
		//exit();
		$data['employee_name'] = $employee_name->first_name." ".$employee_name->last_name;
		$data['from_date']=$from_date;
		
		if($chk_to_date == null){
			$data['attendence_report_info']=$this->Manual_attendence_model->show_attendence_report_info($employee_id,$from_date);
			$data['to_date']='';
		}
		else{
			$to_date = $this->input->post('to_date', true);
			$data['to_date']=$to_date;
			$data['attendence_report_info']=$this->Manual_attendence_model->show_attendence_to_date_report_info($employee_id,$from_date,$to_date);
			
		}
		
		//$this->load->helper('dompdf');
        //$view_file=$this->load->view('manual_attendence/attendence_report', $data, true);
       // $file_name=pdf_create($view_file, 'Attendence_Report-'.$employee_id);
	
      	$this->load->view('manual_attendence/attendence_report',$data);
  }	
  public function show_report_pdf()
	{

		$data = array();
        $employee_id = $this->input->post('employee_id', true);
		$from_date = $this->input->post('from_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);

		$data['employee_id']=$employee_id;
		$employee_name=$this->Manual_attendence_model->employee_name_by_employee_id($employee_id);
		//echo "<pre>";
		//print_r($employee_name);
		//exit();
		$data['employee_name'] = $employee_name->first_name." ".$employee_name->last_name;
		$data['from_date']=$from_date;
		
		if($chk_to_date == null)
		{
			$data['attendence_report_info']=$this->Manual_attendence_model->show_attendence_report_info($employee_id,$from_date);
			$data['to_date']=" ";
		}
		else
		{
			$to_date = $this->input->post('to_date', true);
			$data['to_date']=$to_date;
			$data['attendence_report_info']=$this->Manual_attendence_model->show_attendence_to_date_report_info($employee_id,$from_date,$to_date);
		}
		
		//$this->load->helper('dompdf');
        //$view_file=$this->load->view('manual_attendence/attendence_report', $data, true);
       // $file_name=pdf_create($view_file, 'Attendence_Report-'.$employee_id);

      	$this->load->view('manual_attendence/attendence_report_pdf',$data);
  }  
  public function show_report_excel()
	{

		$data = array();
        $employee_id = $this->input->post('employee_id', true);
		$from_date = $this->input->post('from_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);

		$data['employee_id']=$employee_id;
		$data['employee_name']=$this->Manual_attendence_model->employee_name_by_employee_id($employee_id);
		$data['from_date']=$from_date;
		
		if($chk_to_date == null)
		{
			$data['attendence_report_info']=$this->Manual_attendence_model->show_attendence_report_info($employee_id,$from_date);
			$data['to_date']=" ";
		}
		else
		{
			$to_date = $this->input->post('to_date', true);
			$data['to_date'] = $to_date;
			$data['attendence_report_info']=$this->Manual_attendence_model->show_attendence_to_date_report_info($employee_id,$from_date,$to_date);
		}
      	 $this->load->view('manual_attendence/attendence_report_excel',$data);

  }  

  	public function summery_report_form()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_department']=$this->Department_model->select_all_department_list($company_id);
         $data['maincontent'] = $this->load->view('manual_attendence/summery_report_form', $data, true);
		 $this->load->view('master', $data);
	}	
	
	public function show_summery_report()
	{
		 //$data = array();
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		$all_department = $this->input->post('all_department', true);
		$data['all_department'] = $all_department;
		$department_name = $this->input->post('department_name', true);
		$data['department_name'] = $department_name;
		$from_date = $this->input->post('from_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date'] = $chk_to_date;
		
		$data['from_date']=$from_date;
		$to_date = $this->input->post('to_date', true);
		$data['to_date']=$to_date;
		$data['holiday_count_between_date']=$this->Manual_attendence_model->holiday_info_for_summery_report($all_department,$department_name,$from_date,$chk_to_date,$to_date);
		$data['summery_report_info']=$this->Manual_attendence_model->show_summery_report_info($all_department,$department_name,$from_date,$chk_to_date,$to_date);
		//$summery_report_info=$this->Manual_attendence_model->show_summery_report_info($all_department,$department_name,$from_date,$chk_to_date,$to_date);
		//echo $summery_report_info;exit();
		
		
		//$this->load->helper('dompdf');
        //$view_file=$this->load->view('manual_attendence/summery_report', $data, true);
        //$file_name=pdf_create($view_file, 'Summery_Report');
	
      	$this->load->view('manual_attendence/summery_report',$data);
  }
  
	public function show_summery_report_pdf()
	{
		$data = array();
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		$all_department = $this->input->post('all_department', true);
		$data['all_department'] = $all_department;
		$department_name = $this->input->post('department_name', true);
		$data['department_name'] = $department_name;
		$from_date = $this->input->post('from_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date'] = $chk_to_date;
		
		$data['from_date']=$from_date;
		$to_date = $this->input->post('to_date', true);
		$data['to_date']=$to_date;
		$data['holiday_count_between_date']=$this->Manual_attendence_model->holiday_info_for_summery_report($all_department,$department_name,$from_date,$chk_to_date,$to_date);
		$data['summery_report_info']=$this->Manual_attendence_model->show_summery_report_info($all_department,$department_name,$from_date,$chk_to_date,$to_date);
		//$summery_report_info=$this->Manual_attendence_model->show_summery_report_info($all_department,$department_name,$from_date,$chk_to_date,$to_date);
		//echo $summery_report_info;exit();
		
		
		//$this->load->helper('dompdf');
       // $view_file=$this->load->view('manual_attendence/summery_report', $data, true);
        //$file_name=pdf_create($view_file, 'Summery_Report');
	
      	//$this->load->view('manual_attendence/summery_report_pdf',$data);
      	$this->load->view('manual_attendence/summery_report_pdf',$data);
  }
  
	public function show_summery_report_excel()
	{
		$data = array();
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		$all_department = $this->input->post('all_department', true);
		$data['all_department'] = $all_department;
		$department_name = $this->input->post('department_name', true);
		$data['department_name'] = $department_name;
		$from_date = $this->input->post('from_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date'] = $chk_to_date;
		
		$data['from_date']=$from_date;
		$to_date = $this->input->post('to_date', true);
		$data['to_date']=$to_date;
		$data['holiday_count_between_date']=$this->Manual_attendence_model->holiday_info_for_summery_report($all_department,$department_name,$from_date,$chk_to_date,$to_date);
		$data['summery_report_info']=$this->Manual_attendence_model->show_summery_report_info($all_department,$department_name,$from_date,$chk_to_date,$to_date);
		//$summery_report_info=$this->Manual_attendence_model->show_summery_report_info($all_department,$department_name,$from_date,$chk_to_date,$to_date);
		//echo $summery_report_info;exit();
		
		
		//$this->load->helper('dompdf');
        //$view_file=$this->load->view('manual_attendence/summery_report', $data, true);
        //$file_name=pdf_create($view_file, 'Summery_Report');
	
      	$this->load->view('manual_attendence/summery_report_excel',$data);
  }

  
  	public function details_in_out_report_form()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
		 $data['all_employee']=$this->Employee_model->select_all_employee_list($company_id);
         $data['maincontent'] = $this->load->view('manual_attendence/details_in_out_report_form', $data, true);
		 $this->load->view('master', $data);
	  
	}
	public function show_in_out_report()
	{
		//echo '<pre>';
		//print_r($_POST);
		//echo $_POST['check_employee'];
		//exit();
		$data = array();
		$company_id = $this->session->userdata('company_id');
		$data['company_id']=$company_id;
		$check_employee = $this->input->post('check_employee', true);
		$data['check_employee'] = $check_employee;
		$data['check_employee1'] = $check_employee;
		$employee_id = $this->input->post('employee_id', true);
		$employee_ids = $employee_id;
		$data['employee_ids'] = $employee_id;
		$data['employee_id'] = $employee_id;
		$data['employee_id1'] = $employee_id;
		$from_date = $this->input->post('date', true);
		$data['date1'] = $from_date;
		$data['from_date']=$from_date;
		$check_date = $this->input->post('check_date', true);
		$data['check_date']=$check_date;
		$data['check_date1']=$check_date;
		$to_date = $this->input->post('to_date', true);
		$data['to_date']=$to_date;
		//echo '<pre>';
		//print_r($to_date);
		//exit();
      	$this->load->view('manual_attendence/details_in_out_report',$data);
  }		
  public function show_in_out_report_pdf()
	{
		//echo '<pre>';
		//print_r($_POST);
		//echo $_POST['check_employee'];
		//exit();
		$data = array();
		$company_id = $this->session->userdata('company_id');
		$data['company_id']=$company_id;
		$check_employee = $this->input->post('check_employee', true);
		$data['check_employee'] = $check_employee;
		$data['check_employee1'] = $check_employee;
		$employee_id = $this->input->post('employee_id', true);
		$employee_ids = $employee_id;
		$data['employee_ids'] = $employee_id;
		$data['employee_id'] = $employee_id;
		$data['employee_id1'] = $employee_id;
		$from_date = $this->input->post('date', true);
		$data['date'] = $from_date;
		$data['from_date']=$from_date;
		$check_date = $this->input->post('check_date', true);
		$data['check_date']=$check_date;
		$data['check_date1']=$check_date;
		$to_date = $this->input->post('to_date', true);
		$data['to_date']=$to_date;
		//echo '<pre>';
		//print_r($to_date);
		//exit();
      	$this->load->view('manual_attendence/details_in_out_report_pdf',$data);
  }	
	public function show_in_out_report_excel()
	{
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		$data = array();
		$company_id = $this->session->userdata('company_id');
		$data['company_id'] = $company_id;
		$check_employee = $this->input->post('check_employee', true);
		$data['check_employee'] = $check_employee;
		$employee_id = $this->input->post('employee_id', true);
		$data['employee_id'] = $employee_id;
		$from_date = $this->input->post('date', true);
		$data['date'] = $from_date;
		$data['from_date']=$from_date;
		$check_date = $this->input->post('check_date', true);
		$data['check_date']=$check_date;
		$to_date = $this->input->post('to_date', true);
		$data['to_date']=$to_date;
		//echo '<pre>';
		//print_r($to_date);
		//exit();
		$data['all_details_in_out_report']=$this->Manual_attendence_model->details_in_out_report($check_employee,$employee_id,$from_date,$check_date,$to_date,$company_id);
		
		//$this->load->helper('dompdf');
        //$view_file=$this->load->view('manual_attendence/details_in_out_report', $data, true);
        //$file_name=pdf_create($view_file, 'Details-In-Out-Report');
      	$this->load->view('manual_attendence/details_in_out_report_excel',$data);
  }	
	
		
   
}
