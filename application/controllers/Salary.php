<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
          $this->load->model('Salary_model');
          $this->load->model('Welcome_model');
          $this->load->model('Shift_model');
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
		 $data['company_info']=$this->Welcome_model->select_company_name_by_company_id($company_id);
         $data['maincontent'] = $this->load->view('salary/salary_process_form', $data, true);
		
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
		$date_from = $this->input->post('date_from', true);
		$date_to = $this->input->post('date_to', true);
		$employee_ids = $this->input->post('employee_ids', true);
		//echo '<pre>';
		//print_r($employee_ids);
		//exit();
		$all_employees=$this->Salary_model->select_employee_info_by_employee_ids($employee_ids);
		$employee_info = [];

		foreach($all_employees as $each_employee){
			$each_employee_info = [];
			$each_employee_info['employee_id'] = "$each_employee->employee_id";
			$each_employee_info['employee_name'] = "$each_employee->first_name";
			$each_employee_info['card_id'] = "$each_employee->card_id";
			$each_employee_info['department'] = "$each_employee->department";
			$each_employee_info['shift'] = "$each_employee->shift";
			$each_employee_info['group_id'] = "$each_employee->group_id";
			$each_employee_info['weekend'] = "$each_employee->weekend";
			$each_employee_info['remarks'] = "$each_employee->remarks";
			
			array_push($employee_info,$each_employee_info);
			
		}
		
		$all_shift=$this->Shift_model->select_all_shift_list($company_id);
		//echo '<pre>';
		//print_r($all_shift);
		//exit();
		$shift_info = [];
		
		foreach($all_shift as $each_shift){
			$each_shift_info = [];
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

		//echo '<pre>';
		//print_r($shift_info);
		//exit();


		for($date_from; $date_from <= $date_to;  $date_from = date ("Y-m-d", strtotime("+1 day", strtotime($date_from)))){
			$in_late="0";
			$early_out="0";
			$late="Nai";
			$holiday_name="";
			$status="";
			$duration="0";
			$in_time="";
			$out_time="";
			
			$i=0;
			for($i; $i<sizeof($employee_info); $i++){
				
								/*############################ Employee #############################*/
			
				$employee_id=$employee_info[$i]['employee_id'];
				$employee_name=$employee_info[$i]['employee_name'];
				$card_id=$employee_info[$i]['card_id'];
				$department=$employee_info[$i]['department'];
				$shift=$employee_info[$i]['shift'];
				$group_id=$employee_info[$i]['group_id'];
				$weekend=$employee_info[$i]['weekend'];
				$remarks=$employee_info[$i]['remarks'];
				
				$check_special_shift_allocation=$this->Salary_model->select_special_shift_allocation_info($employee_id,$date_from);
				
				if($check_special_shift_allocation){
						$shift=$check_special_shift_allocation->shift_id;
				}
				else{

					$check_group_shift_allocation=$this->Salary_model->select_group_shift_allocation_info($group_id,$date_from);
					
					if($check_group_shift_allocation){
				
						$shift=$check_group_shift_allocation->shift_id;
						//echo $shift;
						
					}
						
						

				}

							/*############################ Shift #############################*/

			$shift_start_from = $shift_info[$shift]['shift_start_from'];
			$shift_end_from = $shift_info[$shift]['shift_end_from'];
			$shift_start = $shift_info[$shift]['shift_start'];
			$shift_end = $shift_info[$shift]['shift_end'];
			$grace = $shift_info[$shift]['grace'];


							/*############################ IN TIME #############################*/
							
			$shift_start_from_with_date_from = $date_from." ".$shift_start_from;			
			$in_time_info = $this->Salary_model->select_in_time_info($employee_id,$shift_start_from_with_date_from,$date_from);
			
			if($in_time_info){
					
				$in_time=$in_time_info->in_time;
					
					
							/*############################ IN Late #############################*/
			
				$shift_start_plus_grace = date('h:i:s', strtotime($shift_start)+($grace*60));
				$shift_start_plus_grace_plus_from_time = $date_from." ".$shift_start_plus_grace;

				if($shift_start_plus_grace_plus_from_time < $in_time){
				
					$status = "P";
					$late = "late";
				
					$datetime1 = new DateTime($in_time);
					$datetime2 = new DateTime($shift_start_plus_grace_plus_from_time);
					$interval = $datetime1->diff($datetime2);
					$in_late= $interval->format('%H:%i:%s');
				
			}
			
			}



							/*############################ OUT TIME #############################*/
			if($shift_start > $shift_end){
					$date=date_create($date_from);
					date_add($date,date_interval_create_from_date_string("1 days"));
					$date_from_for_out_time = date_format($date,"Y-m-d H:i:s");
				
			}
			else{
				$date_from_for_out_time = $date_from;
			}

			$out_time_info = $this->Salary_model->select_out_time_info($employee_id,$date_from_for_out_time,$shift_end_from);
			if($out_time_info){
				$out_time = $out_time_info->out_time;
				
											/*############################ Duration #############################*/
				if($out_time > $in_time){
					$datetime1 = new DateTime($out_time);
					$datetime2 = new DateTime($in_time);
					$interval = $datetime1->diff($datetime2);
					$duration= $interval->format('%H:%i:%s');
				
			}
						/*############################Early Out#############################*/
			
			$shift_end_plus_date = $date_from." ".$shift_end;

			
			if($shift_end_plus_date > $out_time){
				
				$late = "Early Our";
				
				$datetime1 = new DateTime($shift_end_plus_date);
				$datetime2 = new DateTime($out_time);
				$interval = $datetime1->diff($datetime2);
				$early_out= $interval->format('%H:%i:%s');
			}
			
				
			}


						





			
			/*############################ Absent #############################*/
			
			if($in_time_info){
				$status="P";
				
			}
			else{
					$check_holiday = $this->Salary_model->select_holiday_from_date($date_from);
					
					if($check_holiday){
						$holiday_name = $check_holiday->type;
						$status="H";
					}
					else{

						$check_leave = $this->Salary_model->select_approved_leave_by_employee_id($date_from,$employee_id);
						
						if($check_leave){
							$status = $check_leave->leave_types;
						}
						else{
							$day=date('D', strtotime($date_from));
							$check_weekend = $this->Salary_model->select_weekend_by_employee_id($day,$employee_id);
							
							if($check_weekend){
								$status="W";
							}
							else{
								$status="A";
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
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');

		$save_attendence_process_info = $this->Salary_model->save_attendence_process_info($data);	
		//echo "<pre>";
		//print_r($save_attendence_process_info);
		//exit();

		}
		
	}
	echo "Successfull";
	
			

	
	
	}
}
