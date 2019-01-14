<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Attendence extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$id=$this->session->userdata('id');
		if($id ==NULL)
		{
			redirect('Login','refresh');
		}
		$this->load->model('Salary_model');
		$this->load->model('Expense_model');
		$this->load->model('Welcome_model');
		$this->load->model('Shift_model');
		$this->load->model('Attendence_model');
		$this->load->model('Account_information_model');

		
	}

	public function attendence_process_form()
	{
		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";
		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
		$data['company_info']=$this->Welcome_model->select_company_name_by_company_id($company_id);
		$data['maincontent'] = $this->load->view('attendence/attendence_process_form', $data, true);
		$this->load->view('master', $data);
	}
	
	public function process_attendence()
	{
		$data = array();
		$company_id = $this->input->post('company_id', true);
		$company_name = $this->input->post('company_name', true);
		$date_from = $this->input->post('date_from', true);
		$date_to = $this->input->post('date_to', true);
		$employee_ids = $this->input->post('employee_ids', true);
		//exit();

		/* ######################## All Employee picked and stored in employee_info as an array#####################*/

		//$all_employees = $this->Attendence_model->select_employee_info_by_employee_ids($employee_ids);
		$all_employees = $this->Attendence_model->select_employee_info_by_employee_id($company_id);

		$employee_info = array();
		//exit();
		foreach($all_employees as $each_employee)
		{
			$each_employee_info = array();
			$each_employee_info['employee_id'] = $each_employee->employee_id;
			$each_employee_info['first_name'] = $each_employee->first_name; 
			$each_employee_info['last_name'] = $each_employee->last_name;
			$each_employee_info['card_id'] = $each_employee->card_id;
			$each_employee_info['department'] = $each_employee->department;
			$each_employee_info['shift'] = $each_employee->shift;
			$each_employee_info['group_id'] = $each_employee->group_id;
			$each_employee_info['weekend'] = $each_employee->weekend;
			$each_employee_info['remarks'] = $each_employee->remarks;
			
			array_push($employee_info,$each_employee_info);
			
		}

		// var_dump($employee_info);
		// exit();
		


		//print_r($employee_info);exit();
		/*############################ All Shift picked and stored in shift_info as an array ############################*/

		$all_shift=$this->Shift_model->select_all_shift_list($company_id);

		$shift_info = array();
		
		foreach($all_shift as $each_shift){
			$each_shift_info = array();
			$each_shift_info['id'] = "$each_shift->id";
			$each_shift_info['shift_start'] = "$each_shift->shift_start";
			$each_shift_info['second_half_start'] = "$each_shift->second_half_start";
			$each_shift_info['shift_end'] = "$each_shift->shift_end";
			$each_shift_info['over_time_start'] = "$each_shift->over_time_start";
			$each_shift_info['shift_start_from'] = "$each_shift->shift_start_from";
			$each_shift_info['shift_end_from'] = "$each_shift->shift_end_from";
			$each_shift_info['grace'] = "$each_shift->grace";
			$each_shift_info['lunch_start'] = "$each_shift->lunch_start";
			$each_shift_info['lunch_end'] = "$each_shift->lunch_end";
			$each_shift_info['first_half_margin'] = "$each_shift->first_half_margin";
			$each_shift_info['second_half_margin'] = "$each_shift->second_half_margin";
			$each_shift_info['internal_division'] = "$each_shift->internal_division";
			$shift_info[$each_shift->id]=$each_shift_info;
			
		}
		//print_r($shift_info );exit();

		/*############################ Date date to end interval one day #############################*/
		for($date_from; $date_from <= $date_to;  $date_from = date ("Y-m-d", strtotime("+1 day", strtotime($date_from))))
		{
			$employee_index=0;

			/*############################ No of Employee #############################*/
			for($employee_index; $employee_index<sizeof($employee_info); $employee_index++)
			{
				$in_late="0";
				$early_out="0";
				$late="";
				$holiday_name="";
				$status="P";
				$duration="0";
				$in_time="";
				$out_time="";
				$remarks="";
				$no_of_leave_day = 0;
				$over_time = 0;
				$total_duration = 0;
				
				/*############################ Each Employee Info #############################*/


				$employee_id=$employee_info[$employee_index]['employee_id'];
				$employee_name=$employee_info[$employee_index]['first_name'];
				$card_id=$employee_info[$employee_index]['card_id'];
				$department=$employee_info[$employee_index]['department'];
				$shift=$employee_info[$employee_index]['shift'];
				//print_r($employee_id);
				//echo "<br/>";
				//exit();
				// print_r($employee_name);
				// echo "<br>";
				// print_r($shift);
				// echo "<br>";
				$group_id=$employee_info[$employee_index]['group_id'];
				$weekend=$employee_info[$employee_index]['weekend'];

			/*	$check_special_shift_allocation=$this->Attendence_model->select_special_shift_allocation_info($employee_id,$date_from);
				
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
						echo $shift; exit();					
					}
				}
				*/
				/*############################ Shift Info For specific Employee #############################*/
				$shift_start_from = $shift_info[$shift]['shift_start_from'];
				//echo "<br>";
				//print_r($shift_info[$shift]['internal_division']);exit();
				if ($shift_info[$shift]['internal_division']!=='1') {
					$second_half_start = $shift_info[$shift]['second_half_start'];
					$first_half_margin = $shift_info[$shift]['first_half_margin'];
					$second_half_margin = $shift_info[$shift]['second_half_margin'];
				}
				$shift_end_from = $shift_info[$shift]['shift_end_from'];
				$shift_start = $shift_info[$shift]['shift_start'];
				
				$shift_end = $shift_info[$shift]['shift_end'];
				$over_time_start = $shift_info[$shift]['over_time_start'];
				
				$grace = $shift_info[$shift]['grace'];

				$is_night = 0;
				/*###### If Shift start time is greater than shift end time, It will be night shift ################*/
				if($shift_start > $shift_end)
				{
					$is_night = 1;
				}
				
				/*############################ IN TIME #############################*/
				
				$shift_start_from_with_date_from = $date_from." ".$shift_start_from;

				//print_r($shift_start_from_with_date_from);exit();
				if($is_night == 1)
				{
					$date=date_create($date_from);
					date_add($date,date_interval_create_from_date_string("1 days"));
					$date_from_for_in_time = date_format($date,"Y-m-d");
				}
				else
				{
					$date_from_for_in_time = $date_from;
				}
				
				$shift_end_from_with_date_from = $date_from_for_in_time." ".$shift_end_from;

				$in_time_info = $this->Attendence_model->select_in_time_info($employee_id, $shift_start_from_with_date_from, $shift_end_from_with_date_from);
				//print_r($in_time);exit();

				//echo $in_time_info->in_time; exit();
				if($in_time_info)
				{						
					$in_time=$in_time_info->in_time;						
					
					/*############################ IN Late #############################*/
					
					//$shift_start_plus_grace = date('H:i:s', strtotime($shift_start)+($grace*60));
					$shift_start_plus_grace_plus_from_time = $date_from." ".date('H:i:s', strtotime($shift_start)+($grace*60));
					//echo $shift_start_plus_grace."------------".$shift_start_plus_grace_plus_from_time; exit();
					
					if (($shift_info[$shift]['internal_division']=='1')&&($shift_start_plus_grace_plus_from_time < $in_time)) {

						// print_r($shift_start_plus_grace_plus_from_time);
						// echo "--";
						// print_r($in_time);
						// exit();
						//$date_from='2018-02-10';
						//$employee_id
						$entry_time = $this->Attendence_model->select_approved_leave_by_employee_id($date_from, $employee_id);

							//print_r($first_half);exit();

						if($entry_time){
							$status="L";
							$no_of_leave_day=1;
							$remarks="Full Day Leave";
								 // print_r($date_from);
								 // print_r($remarks);exit();
						}

						if (empty($entry_time)&&($shift_start_plus_grace_plus_from_time < $in_time) ) {
							$status="L";
							$no_of_lp=1;
							$remarks="Late Present";
								//  echo "</pre>";
								// print_r($employee_id);
								// echo "</pre>";
								// print_r($date_from);
								// echo "</pre>";
								//  print_r($shift_start_plus_grace_plus_from_time);
								// 	echo "</pre>";
								//  print_r($in_time);
								//  echo "</pre>";
								//  print_r($remarks);exit();
						}


						
					} elseif (($shift_info[$shift]['internal_division']=='1')&&($shift_start_plus_grace_plus_from_time >= $in_time)) {

						$status="P";
						$no_of_p=1;
						$remarks="Present";
						// echo "</pre>";
						// 		print_r($employee_id);
						// 		echo "</pre>";
						// 		print_r($date_from);
						// 		echo "</pre>";
						// 		print_r($shift_start_plus_grace_plus_from_time);
						// 			echo "</pre>";
						// 		print_r($in_time);
						// 		echo "</pre>";
						
						// print_r($remarks);exit();
						
					} else {
						if($shift_start_plus_grace_plus_from_time < $in_time){

							{	
								$first_half = $this->Attendence_model->select_approved_first_half_leave_by_employee_id($date_from,$employee_id);
								if($first_half)
								{
									if($in_time > $date_from." ".date('H:i:s', strtotime($second_half_start)+($grace*60)))
										{
											$datetime1 = new DateTime($in_time);
											$datetime2 = new DateTime($date_from." ".date('H:i:s', strtotime($second_half_start)));
											$interval = $datetime1->diff($datetime2);
											$in_late= $interval->format('%H:%i:%s');
											$status = "L";
										}
										else
										{
											$status= "P";

										}
										
										$remarks="First Half Leave";						
										$no_of_leave_day = .5;				
									}
									else
									{
										if($in_time > $date_from." ".date('H:i:s', strtotime($first_half_margin)+($grace*60)))
											{
												$status= "P";
												$first_half_leave_penalty = $this->Attendence_model->first_half_leave_penalty($employee_id,$date_from);
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
									}}

								}}


								
								/*############################ OUT TIME #############################*/
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


			//echo $date_from_for_out_time;exit();
								


								$out_time_info = $this->Attendence_model->select_out_time_info($employee_id,$date_from_for_out_time,$shift_end_from,$shift_start_from,$is_night,$date_from,$shift_start);
								
				//print_r($out_time_info);  exit();
								if($out_time_info)
								{
									$out_time = $out_time_info->out_time;
									if($in_time_info)
									{
										/*################# Duration For each interval of entry and exit ##################*/
										$all_daily_time = $this->Attendence_model->select_daily_entry($employee_id,$in_time,$out_time);
										if($all_daily_time)
										{
											$all_daily_entry = array();
											$all_daily_entry_id =array();
											$sl=0;
											foreach($all_daily_time as $each_daily_time)
											{
												$all_daily_entry[$sl] = $each_daily_time->ctime;
												$all_daily_entry_id[$sl] = $each_daily_time->id;
												$sl++;
											}
											$i=0;
											for($sl=0; $sl < sizeof($all_daily_entry); $sl++)
											{	
												if($i==0)
												{
													$first_id = $all_daily_entry_id[0];
												}
												
												$in_ctime = $all_daily_entry[$sl];
												$sl++;
												if($sl >= sizeof($all_daily_entry)){
													break;
												}
												$out_ctime = $all_daily_entry[$sl];
												$datetime1 = new DateTime($out_ctime);
												$datetime2 = new DateTime($in_ctime);
												$interval = $datetime1->diff($datetime2);
												$each_duration_format = $interval->format('%H:%i:%s');
												
												$each_duration = explode(':', $each_duration_format);
												$each_duration_hour = ($each_duration[0]) + ($each_duration[1]/60) + ($each_duration[2]/3600);
												$total_duration = $total_duration + $each_duration_hour;
											}
										}
									}
									/*############################Early Out and Second Half Leave#############################*/
									

									if (($shift_info[$shift]['internal_division']!=='1')) {

										$second_half_margin_plus_date = $date_from_for_out_time." ".$second_half_margin;
									}
									$shift_end_plus_date = $date_from_for_out_time." ".$shift_end;
									$over_time_start_plus_date = $date_from_for_out_time." ".$over_time_start;
									

									if (($shift_info[$shift]['internal_division']=='1')&&($shift_end_plus_date > $out_time)){

										$remarks="Early Out";
						// echo "--";
						// print_r($out_time);

						// print_r($remarks);exit();
										
									} elseif (($shift_info[$shift]['internal_division']=='1')&&($shift_end_plus_date <= $out_time)) {

										
										
									}elseif (($shift_info[$shift]['internal_division']!=='1')&&($shift_end_plus_date>$out_time)){ 	
										$second_half = $this->Attendence_model->select_approved_second_half_leave_by_employee_id($date_from,$employee_id);
										
										if($second_half)
										{
											if($out_time < $date_from_for_out_time." ".date('H:i:s', strtotime($second_half_start)))
												{
													$datetime1 = new DateTime($date_from_for_out_time." ".date('H:i:s', strtotime($second_half_margin)));
													$datetime2 = new DateTime($out_time);
													$interval = $datetime1->diff($datetime2);
													$early_out= $interval->format('%H:%i:%s');
												}
												
												$remarks="Second Half Leave";							
												$no_of_leave_day = .5;				
											}						
											else
											{
												if($in_time > $date_from_for_out_time." ".date('H:i:s', strtotime($second_half_margin)+($grace*60)))
													{
														$status= "P";
														$second_half_leave_penalty = $this->Attendence_model->second_half_leave_penalty($employee_id,$date_from);
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

											}


											/*############################Over Time Duty Calculation#############################*/		

					// print_r($out_time);
					// echo "\n";
					// print_r($over_time_start_plus_date);
					// exit();			
											if($over_time_start_plus_date < $out_time)
											{
												$datetime1 = new DateTime($out_time);
												$datetime2 = new DateTime($over_time_start_plus_date);
												$interval = $datetime1->diff($datetime2);
												$over_time_format = $interval->format('%H:%i:%s');
												$over_time_format = explode(':', $over_time_format);
												$over_time = ($over_time_format[0]) + ($over_time_format[1]/60) + ($over_time_format[2]/3600);
												$salary_setup_info = $this->Attendence_model->select_salary_setup_info();

						//print_r($salary_setup_info);exit();
												$over_time_minimum_minute = $salary_setup_info->over_time_minimum_minute;
												$minimum_over_time = $over_time_minimum_minute/60;
												if($minimum_over_time > $over_time){
													$over_time = 0;
												}


											}
											
										}
			//echo $over_time; exit();

										/*############################ Holyday,Leave,Weekend,Absent/ #############################*/
										
										if($in_time_info)
										{
					//$status="P";					
										}
										else
										{

											$check_leave = $this->Attendence_model->select_approved_leave_by_employee_id($date_from,$employee_id);
											
											if($check_leave)
											{	
												if($check_leave->half_full_day == "full_day")
												{
													$status = $check_leave->leave_types;
													$remarks="Full Day Leave";
													$no_of_leave_day = 1;
													$is_night = 0;
												}
											}
											else
											{

												$check_holiday = $this->Attendence_model->select_holiday_from_date($date_from);
												
												if($check_holiday)
												{
													$holiday_name = $check_holiday->type;
													$status = $check_holiday->type;
													$is_night = 0;
												}
												else
												{
													$day=date('D', strtotime($date_from));
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
										$data['duration'] = $total_duration;
										$data['in_late'] = $in_late;
										$data['early_out'] = $early_out;
										$data['over_time'] = $over_time;
										$data['late'] = $late;
										$data['status'] = $status;
										$data['holiday_name'] = $holiday_name;
										$data['no_of_leave_day'] = $no_of_leave_day;
										$data['remarks'] = $remarks;
										$data['night_status'] = $is_night;
										
										$data['recording_time'] = date("y-m-d h:i:s");
										$data['recorded_by'] = $this->session->userdata('id');
				//echo "<pre>";
				//print_r($data);
				//exit();

										$check_processed_data = $this->Attendence_model->check_processed_data($date_from,$employee_id);
				//echo "<pre>";
				//print_r($check_processed_data);
				//exit();
										if($check_processed_data){
											$data['lock'] = '1';
											$data['updating_time'] = date("y-m-d h:i:s");
											$data['updated_by'] = $this->session->userdata('id');
											$update_attendence_process_info = $this->Attendence_model->update_attendence_process_info($date_from,$employee_id,$data);
										}
										else{
											$data['lock'] = '0';
											$save_attendence_process_info = $this->Attendence_model->save_attendence_process_info($data);
										}


										
				//echo $save_attendence_process_info;exit();

				//echo "<pre>";
				//print_r($save_attendence_process_info);
				//exit();
									}
									
								}
		/*
		if($sl != null)
		{
		$last_id = $all_daily_entry_id[$sl-1];
		}
		//echo $first_id;exit();
		if($first_id != null && $last_id != null){
		$lock_processed_attendence_data = $this->Attendence_model->lock_processed_attendence_data($first_id,$last_id);
		}
		*/
		//echo $lock_processed_attendence_data;	exit();
		echo "Successfull";	
		
	}
	public function deduction_salary()
	{
		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";
		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
		$data['salary_setup_info'] = $this->Attendence_model->select_salary_setup_info();

		//print_r($data['salary_setup_info']);
		$data['maincontent'] = $this->load->view('attendence/deduction_salary', $data, true);
		
		$this->load->view('master', $data);
	}	
	public function save_deduction_salary()
	{
		$data = array();
		$company_id = $this->session->userdata("company_id");
		$data['company_id'] = $company_id;
		$data['employee_id'] = $this->input->post('employee_id', true);
		$data['deduction_name'] = $this->input->post('deduction_name', true);
		$data['amount'] = $this->input->post('amount', true);
		$data['deduction_month'] = $this->input->post('deduction_month', true);
		$data['recorded_by'] = $this->session->userdata('id');
		$data['recording_time'] = date("y-m-d h:i:s");
		$save_deduction_salary = $this->Attendence_model->save_deduction_salary($data);
		if($save_deduction_salary)
		{
			echo "Saved Deduction Info";
		}
		else
		{
			echo "Not Saved";
		}
	}
	public function deduction_salary_list()
	{
		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";
		
		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_deduction_salary'] = $this->Attendence_model->select_all_deduction_salary($company_id);
		$data['maincontent'] = $this->load->view('attendence/deduction_salary_list', $data, true);
		
		$this->load->view('master', $data);
	}
	public function edit_deduction_salary($id)
	{
		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";
		
		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
		$data['each_deduction_salary'] = $this->Attendence_model->select_each_deduction_salary($company_id,$id);
		$data['maincontent'] = $this->load->view('attendence/edit_deduction_salary', $data, true);
		$this->load->view('master', $data);
	}
	public function update_deduction_salary()
	{
		$data = array();
		$company_id = $this->session->userdata("company_id");
		$id = $this->input->post('id', true);
		$data['employee_id'] = $this->input->post('employee_id', true);
		$data['deduction_name'] = $this->input->post('deduction_name', true);
		$data['amount'] = $this->input->post('amount', true);
		$data['deduction_month'] = $this->input->post('deduction_month', true);
		$data['updated_by'] = $this->session->userdata('id');
		$data['updating_time'] = date("y-m-d h:i:s");
		$update_deduction_salary = $this->Attendence_model->update_deduction_salary($company_id,$id,$data);
		if($update_deduction_salary)
		{
			echo "updated Deduction Info";
		}
		else
		{
			echo "Not Saved";
		}
	}
	public function delete_deduction_salary($id) 
	{
		$company_id = $this->session->userdata("company_id");
		$this->Attendence_model->delete_deduction_salary_info($company_id,$id);
		redirect('Attendence/deduction_salary_list');          
	}
	
	public function add_salary_setup()
	{
		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";
		
		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
		$data['salary_setup_info'] = $this->Attendence_model->select_salary_setup_info();
		$data['maincontent'] = $this->load->view('attendence/salary_setup', $data, true);
		
		$this->load->view('master', $data);
	}	

	public function save_salary_setup()
	{
		//echo "<pre>";print_r($_POST);exit();
		$data = array();
		$data['late_allowed'] = $this->input->post('late_allowed', true);
		$data['late_allowed'] = $this->input->post('late_allowed', true);
		$data['early_out_allowed'] = $this->input->post('early_out_allowed', true);
		$data['night_allowance_amount'] = $this->input->post('night_allowance_amount', true);
		$data['allowed_attendence_bonus_leave_limit'] = $this->input->post('allowed_attendence_bonus_leave_limit', true);
		$data['allowed_attendence_bonus_late_limit'] = $this->input->post('allowed_attendence_bonus_late_limit', true);
		$data['over_time_rate'] = $this->input->post('over_time_rate', true);
		$data['attendence_bonus_amount'] = $this->input->post('attendence_bonus_amount', true);
		$data['transport_allowance_percentange'] = $this->input->post('transport_allowance_percentange', true);
		$data['medical_allowance_percentange'] = $this->input->post('medical_allowance_percentange', true);
		$data['house_rent_allowance_percentange'] = $this->input->post('house_rent_allowance_percentange', true);
		$data['phone_bill_allowance_percentange'] = $this->input->post('phone_bill_allowance_percentange', true);
		$data['company_id'] = $this->session->userdata('company_id');

		$company_id_exists = $this->Attendence_model->select_salary_setup_info();
		if($company_id_exists)
		{
			$data['updated_by'] = $this->session->userdata('id');
			$data['updating_time'] = date("y-m-d h:i:s");

			$update_salary_setup = $this->Attendence_model->update_salary_setup($data);
			if($update_salary_setup)
			{
				echo "Salary Setup Updated!";
			}
			else
			{
				echo "Salary Setup Not Updated!";
			}
		}
		else
		{
			$data['recorded_by'] = $this->session->userdata('id');
			$data['recording_time'] = date("y-m-d h:i:s");

			$save_salary_setup = $this->Attendence_model->save_salary_setup($data);
			echo "Salary Setup Saved!";
		}
	}
	public function add_employee_allowance()
	{
		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";
		
		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
		$data['salary_setup_info'] = $this->Attendence_model->select_salary_setup_info();
		$data['maincontent'] = $this->load->view('attendence/employee_allowance_setup', $data, true);
		
		$this->load->view('master', $data);
	}
/*
	public function pick_employee_basic_salary()
	{
		$data = array();
		$employee_id = $this->input->post('employee_id', true);

		$company_id = $this->session->userdata('company_id');
		$basic_salary_info = $this->Employee_model->each_employee_info($company_id,$employee_id);
		$basic_salary = $basic_salary_info->basic_salary;
		if($basic_salary > 0)
		{
			echo $basic_salary;
		}

	}

	*/
	public function save_employee_allowance()
	{

		$data = array();
		$employee_id = $this->input->post('employee_id', true);
		$data['basic_salary'] = $this->input->post('basic_salary', true);
		$data['gross_salary'] = $this->input->post('gross_salary', true);
		$data['is_transport_allowance'] = $this->input->post('is_transport_allowance', true);
		$data['transport_allowance_amount'] = $this->input->post('transport_allowance_amount', true);
		$data['is_medical_allowance'] = $this->input->post('is_medical_allowance', true);
		$data['medical_allowance_amount'] = $this->input->post('medical_allowance_amount', true);
		$data['is_house_rent_allowance'] = $this->input->post('is_house_rent_allowance', true);
		$data['house_rent_allowance_amount'] = $this->input->post('house_rent_allowance_amount', true);
		$data['is_phone_bill_allowance'] = $this->input->post('is_phone_bill_allowance', true);
		$data['phone_bill_allowance_amount'] = $this->input->post('phone_bill_allowance_amount', true);
		$data['is_attendence_bonus'] = $this->input->post('is_attendence_bonus', true);
		$data['attendence_bonus_amount'] = $this->input->post('attendence_bonus_amount', true);
		$data['updated_by'] = $this->session->userdata('id');
		$data['updating_time'] = date("y-m-d h:i:s");
		

		$update_employee_allowance = $this->Employee_model->update_employee_allowance_info($employee_id,$data);

		if($update_employee_allowance)
		{
			echo "Employee Allowance Updated!";
		}
		else
		{
			echo "Employee Allowance Not Updated!";
		}
	}
	

	public function salary_process_form()
	{
		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";
		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
		$data['company_info']=$this->Welcome_model->select_company_name_by_company_id($company_id);
		$data['maincontent'] = $this->load->view('attendence/salary_process_form', $data, true);
		$this->load->view('master', $data);
	}	

	public function process_salary()
	{
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		$data = array();
		$company_id = $this->input->post('company_id', true);
		$company_name = $this->input->post('company_name', true);
		$month = $this->input->post('month', true);
		$year = $this->input->post('year', true);
		$employee_ids = $this->input->post('employee_ids', true);
		$days_in_month = cal_days_in_month(CAL_GREGORIAN,$month,$year);
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
			$each_employee_info['basic_salary'] = "$each_employee->basic_salary";
			$each_employee_info['gross_salary'] = "$each_employee->gross_salary";
			$each_employee_info['is_transport_allowance'] = "$each_employee->is_transport_allowance";
			$each_employee_info['transport_allowance_amount'] = "$each_employee->transport_allowance_amount";
			$each_employee_info['is_medical_allowance'] = "$each_employee->is_medical_allowance";
			$each_employee_info['medical_allowance_amount'] = "$each_employee->medical_allowance_amount";	
			$each_employee_info['is_house_rent_allowance'] = "$each_employee->is_house_rent_allowance";
			$each_employee_info['house_rent_allowance_amount'] = "$each_employee->house_rent_allowance_amount";		
			$each_employee_info['is_phone_bill_allowance'] = "$each_employee->is_phone_bill_allowance";
			$each_employee_info['phone_bill_allowance_amount'] = "$each_employee->phone_bill_allowance_amount";
			$each_employee_info['is_attendence_bonus'] = "$each_employee->is_attendence_bonus";
			$each_employee_info['attendence_bonus_amount'] = "$each_employee->attendence_bonus_amount";
			array_push($employee_info,$each_employee_info);
		}

		$i=0;
		for($i; $i <sizeof($employee_info); $i++)
		{
			$calculated_salary = 0;
			$deductive_salary = 0;
			$attendence_bonus_amount = 0;
			$transport_allowance_amount = 0;
			$is_transport_allowance = 0;
			$over_time_salary = 0;
			$no_of_night_duty = 0;
			$night_allowance = 0;
			$deductive_amount = 0;
			$attendence_bonus = 0;
			$medical_allowance = 0;
			$house_rent_allowance = 0;
			$phone_bill_allowance = 0;
			$transport_allowance =0;
			/*############################ Employee #############################*/
			
			$employee_id=$employee_info[$i]['employee_id'];
			$employee_name=$employee_info[$i]['employee_name'];
			$card_id=$employee_info[$i]['card_id'];
			$department=$employee_info[$i]['department'];
			$shift=$employee_info[$i]['shift'];
			$group_id=$employee_info[$i]['group_id'];
			$weekend=$employee_info[$i]['weekend'];
			$basic_salary=$employee_info[$i]['basic_salary'];
			$gross_salary=$employee_info[$i]['gross_salary'];
			$is_transport_allowance = $employee_info[$i]['is_transport_allowance'];
			$transport_allowance_amount = $employee_info[$i]['transport_allowance_amount'];
			$is_medical_allowance = $employee_info[$i]['is_medical_allowance'];
			$medical_allowance_amount = $employee_info[$i]['medical_allowance_amount'];
			$is_house_rent_allowance = $employee_info[$i]['is_house_rent_allowance'];
			$house_rent_allowance_amount = $employee_info[$i]['house_rent_allowance_amount'];
			$is_phone_bill_allowance = $employee_info[$i]['is_phone_bill_allowance'];
			$phone_bill_allowance_amount = $employee_info[$i]['phone_bill_allowance_amount'];
			$is_attendence_bonus = $employee_info[$i]['is_attendence_bonus'];
			$attendence_bonus_amount = $employee_info[$i]['attendence_bonus_amount'];
			
			$date_from = $year."-".$month."-"."01";
			$date_to = $year."-".$month."-".$days_in_month;
			$month_year = date("F, Y", strtotime($date_from));
			
			/*############################ Salary Set up Info #############################*/
			
			$salary_setup_info = $this->Attendence_model->select_salary_setup_info();
			
			$per_day_salary_for_over_time = $basic_salary / 26;
			
			$late_allowed = $salary_setup_info->late_allowed;
			$early_out_allowed = $salary_setup_info->early_out_allowed;
			$allowed_attendence_bonus_leave_limit = $salary_setup_info->allowed_attendence_bonus_leave_limit;
			$over_time_rate = $salary_setup_info->over_time_rate;
			$night_allowance_amount = $salary_setup_info->night_allowance_amount;

			$emolyee_attendence_info = $this->Attendence_model->select_emolyee_attendence_info($employee_id,$company_id,$date_from,$date_to);

			if($emolyee_attendence_info)
			{
				$absent = $emolyee_attendence_info->absent;
				$late = $emolyee_attendence_info->late;
				$early_out = $emolyee_attendence_info->early_out;
				$no_of_leave_day = $emolyee_attendence_info->no_of_leave_day;
				$shift_id = $emolyee_attendence_info->shift_id;
				$over_time = $emolyee_attendence_info->over_time;
				$no_of_night_duty = $emolyee_attendence_info->night_status;
				
				/*############################ Salary Minus Day Calculation #############################*/
				
				$salary_minus_day_for_late = floor($late / ($late_allowed));
				$salary_minus_day_for_early_out = floor($early_out / ($early_out_allowed));
				$salary_minus_day = $salary_minus_day_for_late + $salary_minus_day_for_early_out;	
				
				/*############################ Attendence Bonus Calculation #############################*/
				
				if($absent == '0' && $no_of_leave_day <= $allowed_attendence_bonus_leave_limit)
				{
					$attendence_bonus = $attendence_bonus_amount;
				}
				else
				{
					$attendence_bonus = 0;
				}			

				/*############################ Overtime Salary Calculation #############################*/
				if($over_time)
				{
					$per_hour_salary_for_over_time = $per_day_salary_for_over_time / 8;
					$over_time_salary = floor(($over_time_rate * $per_hour_salary_for_over_time) + 1);
				}
				/*############################ Transport Allowance Calculation #############################*/
				if($is_transport_allowance == '1')
				{	
					$transport_allowance = $transport_allowance_amount;
				}
				else
				{
					$transport_allowance = 0;
				}				

				/*############################ Medical Allowance Calculation #############################*/
				if($is_medical_allowance == '1')
				{	
					$medical_allowance = $medical_allowance_amount;
				}
				else
				{
					$medical_allowance = 0;
				}			

				/*############################ House Rent Allowance Calculation #############################*/
				if($is_house_rent_allowance == '1')
				{	
					$house_rent_allowance = $house_rent_allowance_amount;
				}
				else
				{
					$house_rent_allowance = 0;
				}				

				/*############################ Phone Bill Allowance Calculation #############################*/
				if($is_phone_bill_allowance == '1')
				{	
					$phone_bill_allowance = $phone_bill_allowance_amount;
				}
				else
				{
					$phone_bill_allowance = 0;
				}				

				/*############################ Attendence Allowance Calculation #############################*/
				if($is_attendence_bonus == '1')
				{	
					$attendence_bonus = $attendence_bonus_amount;
				}
				else
				{
					$attendence_bonus = 0;
				}	
				
				/*############################ Night Allowance Calculation #############################*/
				if($no_of_night_duty)
				{	
					$night_allowance = $no_of_night_duty * $night_allowance_amount;
				}
				/*############################ Deductive Amount Calculation #############################*/

				$deductive_month = $year."-".$month;

				$deductive_salary_info = $this->Attendence_model->deductive_salary_info($employee_id,$deductive_month);

				if($deductive_salary_info){
					$deductive_amount = $deductive_salary_info->total_amount;
				}
				else
				{
					$deductive_amount = 0;
				}


				/*############################ Final Salary Calculation #############################*/
				$per_day_salary_by_basic_salary = $basic_salary / 26;
				$allowed_day_for_salary = 26 - $absent - $salary_minus_day;
				$calculated_salary = $allowed_day_for_salary * $per_day_salary_by_basic_salary;
				//echo $night_allowance;exit();
				$calculated_salary = $calculated_salary + $attendence_bonus + $medical_allowance +$house_rent_allowance + $phone_bill_allowance + $transport_allowance + $over_time_salary + $night_allowance;
				$deductive_salary = $calculated_salary - $deductive_amount;
			}

			$data = array();
			$data['company_id'] = $company_id;
			$data['employee_id'] = $employee_id;
			$data['employee_name'] = $employee_name;
			$data['month'] = $month_year;
			$data['calculated_salary'] = $calculated_salary;
			$data['deductive_salary'] = $deductive_salary;
			$data['recording_time'] = date("y-m-d h:i:s");
			$data['recorded_by'] = $this->session->userdata('id');
			
			//echo '<pre>';
			//print_r($data);
			//exit();
			//$company_id_array = array();
			//$company_id_array[$employee_id]['company_id'] = $company_id;

			$save_salary_details = $this->Attendence_model->save_salary_details($data);	

		}

		echo "Success";

	}




	public function process_salary_preview()
	{
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		$data = array();
		$company_id = $this->input->post('company_id', true);

		$company_name = $this->input->post('company_name', true);

		$month = $this->input->post('month', true);

		$year = $this->input->post('year', true);

		$employee_ids = $this->input->post('employee_ids', true);

		$days_in_month = cal_days_in_month(CAL_GREGORIAN,$month,$year);

		$session_data['company_id']=$company_id;
		$session_data['company_name']=$company_name;
		$session_data['month']=$month;
		$session_data['year']=$year;
		$session_data['employee_ids']=$employee_ids;
		$session_data['days_in_month']=$days_in_month;

		$this->session->set_userdata($session_data);
		//echo "Please Double Check Before Submit";
	}

	public function salary_preview()
	{
		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";
		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
		$data['company_info']=$this->Welcome_model->select_company_name_by_company_id($company_id);
		$data['maincontent'] = $this->load->view('attendence/salary_preview', $data, true);
		$this->load->view('master', $data);
	}
	public function save_final_salary()
	{
		//echo "<pre>"; print_r($_POST);exit();
		
		//echo "<pre>";print_r($skip);exit();
		$data = array();

		$month = $this->input->post('month_year', true);
		$company_id = $this->session->userdata('company_id');

		$employee_id = $this->input->post('employee_id', true);
		$employee_ids = $this->input->post('employee_id', true);
		//echo "<pre>";print_r($skip);exit();
		$employee_name = $this->input->post('employee_name', true);
		$basic_salary = $this->input->post('basic_salary', true);
		$deductive_salary = $this->input->post('deductive_salary', true);
		$attendence_bonus = $this->input->post('attendence_bonus', true);
		$medical_allowance = $this->input->post('medical_allowance', true);
		$house_rent_allowance = $this->input->post('house_rent_allowance', true);
		$phone_bill_allowance = $this->input->post('phone_bill_allowance', true);
		$transport_allowance = $this->input->post('transport_allowance', true);
		$over_time_salary = $this->input->post('over_time_salary', true);
		$night_allowance = $this->input->post('night_allowance', true);
		$deductive_amount = $this->input->post('deductive_amount', true);

		//echo sizeof($basic_salary);
		$i= 0;
		while($i < sizeof($employee_id)){

			$skip_employee=$employee_id[$i];
	
			$data['month'] = $month;
			$data['company_id'] = $company_id;
			$data['employee_id'] = $employee_id[$i];
			$each_employee_id = $data['employee_id'];
			//print_r($each_employee_id);exit();
			$data['employee_name'] = $employee_name[$i];
			$data['basic_salary'] = $basic_salary[$i];
			$data['gross_salary'] = $deductive_salary[$i];
			$data['attendence_bonus'] = $attendence_bonus[$i];
			$data['medical_allowance'] = $medical_allowance[$i];
			$data['house_rent_allowance'] = $house_rent_allowance[$i];
			$data['phone_bill_allowance'] = $phone_bill_allowance[$i];
			$data['transport_allowance'] = $transport_allowance[$i];
			$data['over_time_salary'] = $over_time_salary[$i];
			$data['night_allowance'] = $night_allowance[$i];
			$data['deductive_amount'] = $deductive_amount[$i];
			$data['is_disbursed'] = '0';
			$data['recorded_by'] = $this->session->userdata('id');
			$data['recording_time'] = date("y-m-d h:i:s");

			
			$check_duplicate_salary = $this->Attendence_model->check_duplicate_salary($each_employee_id,$month);
			if($check_duplicate_salary){

				$update_final_salary = $this->Attendence_model->update_final_salary($each_employee_id,$month,$data);	
			}
			else{
				$save_final_salary = $this->Attendence_model->save_final_salary($data);	
			}	
			
			$i++;
			
		}
		echo "Salary Saved!";
	}


	public function salary_disburse(){


	$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";
		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['maincontent'] = $this->load->view('attendence/salary_disburse', $data, true);
		$this->load->view('master', $data);

	}


		public function view_salary_disburse(){

	$month = $this->input->post('month', true);
		$year = $this->input->post('year', true);

		  $month = $this->session->userdata('month');

        $year = $this->session->userdata('year');
        $month_year_heading = date("F, Y", strtotime($year.'-'.$month));

	$months =$month_year_heading;

//print_r($days_in_month);exit();
	$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";
		$data['month_year']=$months;
		
		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['disbured_data']=$this->Attendence_model->retrieve_for_disburse($company_id,$months);

		//print_r($data['disbured_date']);exit();
		$data['maincontent'] = $this->load->view('attendence/view_salary_disburse', $data, true);
		$this->load->view('master', $data);

	}


	public function save_disbursed_salary()
	{
		//echo "<pre>"; print_r($_POST);exit();
		
		//echo "<pre>";print_r($skip);exit();
		$data = array();

		$month = $this->input->post('month_year', true);
		$company_id = $this->session->userdata('company_id');

		$employee_id = $this->input->post('employee_id', true);
		$employee_ids = $this->input->post('employee_id', true);
		//echo "<pre>";print_r($skip);exit();
		$employee_name = $this->input->post('employee_name', true);
		$basic_salary = $this->input->post('basic_salary', true);
		$deductive_salary = $this->input->post('deductive_salary', true);
		$attendence_bonus = $this->input->post('attendence_bonus', true);
		$medical_allowance = $this->input->post('medical_allowance', true);
		$house_rent_allowance = $this->input->post('house_rent_allowance', true);
		$phone_bill_allowance = $this->input->post('phone_bill_allowance', true);
		$transport_allowance = $this->input->post('transport_allowance', true);
		$over_time_salary = $this->input->post('over_time_salary', true);
		$night_allowance = $this->input->post('night_allowance', true);
		$deductive_amount = $this->input->post('deductive_amount', true);

		//echo sizeof($basic_salary);
		$i= 0;
		while($i < sizeof($employee_id)){

			$skip_employee=$employee_id[$i];
	
			$data['month'] = $month;
			$data['company_id'] = $company_id;
			$data['employee_id'] = $employee_id[$i];
			$each_employee_id = $data['employee_id'];
			//print_r($each_employee_id);exit();
			$data['employee_name'] = $employee_name[$i];
			$data['basic_salary'] = $basic_salary[$i];
			$data['gross_salary'] = $deductive_salary[$i];
			$data['attendence_bonus'] = $attendence_bonus[$i];
			$data['medical_allowance'] = $medical_allowance[$i];
			$data['house_rent_allowance'] = $house_rent_allowance[$i];
			$data['phone_bill_allowance'] = $phone_bill_allowance[$i];
			$data['transport_allowance'] = $transport_allowance[$i];
			$data['over_time_salary'] = $over_time_salary[$i];
			$data['night_allowance'] = $night_allowance[$i];
			$data['deductive_amount'] = $deductive_amount[$i];
			$data['is_disbursed'] = '1';
			$data['is_paid'] = '0';
			$data['recorded_by'] = $this->session->userdata('user_id');
			$data['recording_time'] = date("y-m-d h:i:s");
			$employee_ids=$data['employee_id'];

			$total=($data['basic_salary']+$data['attendence_bonus']+$data['medical_allowance']+$data['house_rent_allowance']+$data['phone_bill_allowance']+$data['transport_allowance']+$data['over_time_salary']+$data['night_allowance'])-$data['deductive_amount'];

			 $retrieve_employee_balance=$this->Employee_model->each_employee_info($company_id,$employee_ids);
				$current_balance=$retrieve_employee_balance->employee_due;
   			 $new_balance=$current_balance+$total;

   			 $update_balance=$this->Employee_model->update_employee_balance($company_id,$new_balance,$employee_ids);
			
			$check_duplicate_salary = $this->Attendence_model->check_duplicate_salary($each_employee_id,$month);
			if($check_duplicate_salary){
				$update_final_salary = $this->Attendence_model->update_final_salary($each_employee_id,$month,$data);	
			}
	
			
			$i++;
			
		}
		echo "Salary Disbursed Successfully!";
	}


	public function salary_payment_account(){


		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";
		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['bank_name']=$this->Account_information_model->select_all_account_information_list_for_cheque_book();
		$data['maincontent'] = $this->load->view('attendence/salary_payment_account', $data, true);
		$this->load->view('master', $data);

	}


	public function save_salary_account(){

			//print_r($_POST);exit();

			$bank_name=$this->input->post('bank_name',true);
			$account_no=$this->input->post('account_number',true);
			$company_id = $this->session->userdata('company_id');
			$reset=$this->Attendence_model->reset_salary_account($company_id);
			$confirm=$this->Attendence_model->update_salary_account($company_id,$account_no,$bank_name);
			if ($confirm) {
				echo "Salary Account Saved Successfully";
			}



	}

	public function salary_payment(){


		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";
		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$company_id = $this->session->userdata('company_id');
		$data['all_employee'] = $this->Attendence_model->select_all_employee_list($company_id);
		$data['maincontent'] = $this->load->view('attendence/salary_payment', $data, true);
		$this->load->view('master', $data);	

	}


	public function view_employee_salary_info(){


		//print_r($_POST);exit();
		$employee_id=$this->input->post('employee_id',true);
		$month=$this->input->post('month',true);
		$year=$this->input->post('year',true);
		$company_id = $this->session->userdata('company_id');

		$month_year = date("F, Y", strtotime($year.'-'.$month));

		// print_r($month_year);exit();
		$employee_data=$this->Employee_model->each_employee_info($company_id,$employee_id);
		//print_r($employee_data);exit();
		$employee_current_salary=$this->Attendence_model->retrieve_employee_current_salary($employee_id,$month_year,$company_id);
		
		$current_salary=($employee_current_salary->basic_salary+$employee_current_salary->attendence_bonus+$employee_current_salary->medical_allowance+$employee_current_salary->house_rent_allowance+$employee_current_salary->phone_bill_allowance+$employee_current_salary->transport_allowance+$employee_current_salary->over_time_salary+$employee_current_salary->night_allowance)-$employee_current_salary->deductive_amount;

		echo $employee_data->first_name.' '.$employee_data->last_name.'#'.$employee_data->employee_due.'#'.$current_salary;


		


	}


	public function save_salary_payment(){

		
		$employee_id=$this->input->post('employee_id',true);
		$month=$this->input->post('month',true);
		$year=$this->input->post('year',true);
		$company_id = $this->session->userdata('company_id');
		$type = $this->input->post('type',true);
		$month_year = date("F, Y", strtotime($year.'-'.$month));
		$actual_payment=$this->input->post('actual_payment',true);
		//print_r($_POST);exit();

		$history=array();

		//  $retrieve_employee_balance=$this->Employee_model->each_employee_info($company_id,$employee_id);
		// $current_balance=$retrieve_employee_balance->employee_due;
  //  		 $new_balance=$current_balance-$actual_payment;

  //  		$update_balance=$this->Employee_model->update_employee_balance($company_id,$new_balance,$employee_id);
  //  		$update_employee=$this->Attendence_model->update_is_paid($company_id,$employee_id,$month_year);

   		

   		if ($type=='bank') {
   			$retrieve_salary_account=$this->Attendence_model->retrieve_salary_account($company_id);
   			$account_no=$retrieve_salary_account->account_no;
   			$balance=$retrieve_salary_account->balance;
   			$final_balance=$balance-$actual_payment;

   			

   			if ($final_balance>=0) {
   				
   				$updated_company_bal=$this->Expense_model->update_balance($company_id,$account_no,$final_balance);
		 $retrieve_employee_balance=$this->Employee_model->each_employee_info($company_id,$employee_id);
		$current_balance=$retrieve_employee_balance->employee_due;
   		 $new_balance=$current_balance-$actual_payment;

   		$update_balance=$this->Employee_model->update_employee_balance($company_id,$new_balance,$employee_id);
   		$update_employee=$this->Attendence_model->update_is_paid($company_id,$employee_id,$month_year);


   			}else{

   				echo "Insufficient Balance";
   				exit();
   			}

   		$history['payment_method']=$type;
   		$history['employee_id']=$employee_id;
   		$history['debited_amount']=$actual_payment;
   		$history['is_approved']='1';
   		$history['company_id']=$company_id;
   		$history['payment_type']='salary';
   		$history['paying_to']='employee';
   		$history['account_no']=$account_no;
   		$history['created_at']=date("y-m-d h:i:s");
   		$history['created_by']=$this->session->userdata('user_name');
   		$insert_into_history=$this->Account_information_model->insert_into_payment_history($history);
   			echo "Salary Has Been Paid";


   		}else{
   			$account_no='100001';
   			$retrieve_company_account_balance=$this->Expense_model->retive_account_amount($company_id,$account_no);
   			 $company_current_bal=$retrieve_company_account_balance->balance;
    		$final_balance=$company_current_bal-$actual_payment;
    	


    			if ($final_balance>=0) {
    					$updated_company_bal=$this->Expense_model->update_balance($company_id,$account_no,$final_balance);
   				
		 $retrieve_employee_balance=$this->Employee_model->each_employee_info($company_id,$employee_id);
		$current_balance=$retrieve_employee_balance->employee_due;
   		 $new_balance=$current_balance-$actual_payment;

   		$update_balance=$this->Employee_model->update_employee_balance($company_id,$new_balance,$employee_id);
   		$update_employee=$this->Attendence_model->update_is_paid($company_id,$employee_id,$month_year);
   			}else{

   				echo "Insufficient Balance";
   				exit();
   			}

   			$history['payment_method']=$type;
   		$history['employee_id']=$employee_id;
   		$history['debited_amount']=$actual_payment;
   		$history['is_approved']='1';
   		$history['company_id']=$company_id;
   		$history['payment_type']='salary';
   		$history['paying_to']='employee';
   		$history['account_no']=$account_no;
   		$history['created_at']=date("y-m-d h:i:s");
   		$history['created_by']=$this->session->userdata('user_name');
   		$insert_into_history=$this->Account_information_model->insert_into_payment_history($history);
    		echo "Salary Has Been Paid";

   		}



	}
	
	

}
