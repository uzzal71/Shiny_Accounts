<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
           $this->load->model('Leave_model');
           $this->load->model('Employee_model');
    }


	public function create_leave_type()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 //$data['view_leave_types_list']=$this->Leave_model->select_all_leave_types_info();
         $data['maincontent'] = $this->load->view('leave/create_new_leave_type', $data, true);
         $this->load->view('master', $data);
	}	
	
	 public function save_leave_type() {
        $data = array();
        $company_id= $this->session->userdata('company_id');
        $leave_full_name = $this->input->post('leave_full_name', true);
        $data['leave_full_name'] = $this->input->post('leave_full_name', true);
        $data['leave_short_name'] = $this->input->post('leave_short_name', true);
        $data['limits'] = $this->input->post('limit', true);
        $data['period'] = $this->input->post('period', true);
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('user_id');
		$data['company_id'] = $company_id;
		$check_leave_full_name=$this->Leave_model->check_leave_full_name($leave_full_name,$company_id);
		if($check_leave_full_name)
		{
			echo "Leave Full Name Already Exits";
		}

		else
		{
			$this->Leave_model->save_leave_type_info($data);
			echo "Leave Type Saved";
			
		}
                       
    }
	
	public function view_leave_types()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
		 $company_id = $this->session->userdata('company_id');
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['all_leave_types']=$this->Leave_model->select_all_leave_types_info($company_id);
         $data['maincontent'] = $this->load->view('leave/leave_type_list', $data, true);
         $this->load->view('master', $data);
	}
	public function edit_leave_type($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['each_leave_type']=$this->Leave_model->select_each_leave_type($id);
         $data['maincontent'] = $this->load->view('leave/edit_leave_type', $data, true);
         $this->load->view('master', $data);
        
	}
	public function update_leave_type()
	 {
		 //echo '<pre>';
		// print_r($_POST);
		// exit();
		$data = array();
        $company_id= $this->session->userdata('company_id');
        $id = $this->input->post('id', true);
        $data['leave_full_name'] = $this->input->post('leave_full_name', true);
        $data['leave_short_name'] = $this->input->post('leave_short_name', true);
		$data['updated_by'] = $this->session->userdata('user_id');
		$data['updating_time'] =  date("y-m-d h:i:s");
		$data['company_id'] = $company_id;
		$data['limits'] = $this->input->post('limit', true);
        $data['period'] = $this->input->post('period', true);
		// echo '<pre>';
		//print_r($company_id);
		//exit();
		//$update_leave_type=$this->Leave_model->update_leave_type_info($data,$id,$company_id);
		$update_leave_type=$this->Leave_model->update_leave_type_info($data,$id,$company_id);
		if($update_leave_type)
		{
			echo "Leave Type Updated";
		}
		else
		{
			echo "Something went wrong";
		}

		
			
		}
	
	public function delete_leave_type($id) {
		$company_id= $this->session->userdata('company_id');
        $this->Leave_model->delete_leave_type($id,$company_id);
		redirect('Leave/view_leave_types');
                
    }
	
	public function apply_leave_form()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_employee']=$this->Employee_model->select_all_employee_list($company_id);
		 $data['all_leave_types']=$this->Leave_model->select_all_leave_types_info($company_id);
		 $employee_id = $this->session->userdata('user_id');
		 $data['past_leave_data']=$this->Leave_model->select_past_leave_data_for_month($company_id,$employee_id);
		 $data['past_leave_data_yearly']=$this->Leave_model->select_past_leave_data_for_year($company_id,$employee_id);


		 $data['remaining_leave_list']=$this->Leave_model->remaining_leave_list($company_id,$employee_id);
		 //print_r($data['remaining_leave_list']);exit();
		 $data['leave']=$this->Leave_model->select_leave_no($company_id);
         $data['maincontent'] = $this->load->view('leave/apply_leave_form', $data, true);

		
        $this->load->view('master', $data);
        
    
	}
	
	 public function save_apply_leave_info() {
        $data = array();
        $company_id= $this->session->userdata('company_id');
        $leave=$this->Leave_model->select_leave_no($company_id);

        if ($leave->leave_no=="") {
        	$leave_no=10001;
        }else{

        	$leave_no=$leave->leave_no+1;

        }
        $data['leave_no']='LVE'.date('Y').$leave_no;
		
        $data['company_id'] = $company_id;
        $data['employee_id'] = $this->session->userdata('user_id');
        $employee_id = $data['employee_id'];
        $data['date_time_from'] = $this->input->post('date_time_from', true);
        $date_time_from = $data['date_time_from'];
        $date_time_to = $this->input->post('date_time_to', true);
        
        $data['no_of_days']=$this->input->post('no_of_days', true);
        $data['date_time_to']=$date_time_to;
        $data['half_full_day'] = $this->input->post('half_full_day', true);
        $half_full_day = $data['half_full_day'];
       
         $data['adl'] = $this->input->post('adl', true);
        $data['leave_types'] = $this->input->post('leave_types', true);
        $leave_types = $data['leave_types'];
        $data['remarks'] = $this->input->post('remarks', true);
        $data['approval_status'] = '0';
        $data['is_printed'] = '0';
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');

			$start_date = $date_time_from;


			$confirm=$this->Leave_model->check_leave_existance($company_id, $data['employee_id'],$data['date_time_from'], $data['date_time_to']);


			

			if ($confirm) {
				echo "Leave Application Exits";
			}else{

	$save_apply_leave=$this->Leave_model->save_apply_leave_info($data,$company_id);





			// while(date($start_date) <= date($date_time_to)){
			// 	$check_duplicate_leave = $this->Leave_model->check_duplicate_leave($company_id,$employee_id,$start_date);

			// 	if($check_duplicate_leave)
			// 		{
			// 			$data['date_time_from'] = $start_date;
			// 			if($half_full_day == "full_day"){
			// 				$data['no_of_days'] = 1;
			// 			}
			// 			else{
			// 				$data['no_of_days'] = .5;
			// 			}
			// 			$update_apply_leave=$this->Leave_model->update_leave_info($company_id,$employee_id,$start_date,$data);
			// 		}
			// 		else
			// 		{ 
			// 			$data['date_time_from'] = $start_date;
			// 			if($half_full_day == "full_day"){
			// 				$data['no_of_days'] = 1;
			// 			}
			// 			else{
			// 				$data['no_of_days'] = .5;
			// 			}
			// 			//echo $day_count;exit();
			//  			 $save_apply_leave=$this->Leave_model->save_apply_leave_info($data,$company_id);
			// 		}

			// 	$start_date = date ("Y-m-d", strtotime("+1 day", strtotime($start_date)));
			// 	//echo $start_date; exit();
			// }

			echo "Your Application for Leave is Applied!";
                       
    }
}
		public function apply_leave_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
	     $data['company_id']=$company_id;
		 $data['all_apply_leave']=$this->Leave_model->select_all_apply_leave_list($company_id);
		 $data['maincontent'] = $this->load->view('leave/apply_leave_list', $data, true);
         $this->load->view('master', $data);
	}	
	
	public function edit_apply_leave($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
	     $data['company_id']=$company_id;
		 $data['each_applied_leave']=$this->Leave_model->select_each_apply_leave($company_id,$id);

		 //print_r(expression)
		 $data['all_leave_types']=$this->Leave_model->select_all_leave_types_info($company_id);
		 $data['maincontent'] = $this->load->view('leave/edit_apply_leave_form', $data, true);
         $this->load->view('master', $data);
	}	
	
	 public function update_apply_leave() {
		// echo '<pre>';
		// print_r($_POST);
		// exit();
        $data = array();
		$company_id= $this->session->userdata('company_id');
        $data['company_id'] = $company_id;	
		$id = $this->input->post('id', true);
        $data['id'] = $id;
		$data['employee_id'] = $this->session->userdata('user_id');
        $data['date_time_from'] = $this->input->post('date_time_from', true);
        $data['date_time_to'] = $this->input->post('date_time_to', true);
        $data['no_of_days'] = $this->input->post('no_of_days', true);
        $data['adl'] = $this->input->post('adl', true);
        $data['leave_types'] = $this->input->post('leave_types', true);
        $data['remarks'] = $this->input->post('remarks', true);
        $data['approval_status'] = '0';
		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');
		$data['leave_no'] = $this->input->post('leave_no', true);
		$data['half_full_day'] = $this->input->post('half_full_day', true);
		 //echo '<pre>';
		 //print_r($data);
		 //exit();
        $update_apply_leave=$this->Leave_model->update_apply_leave_info($data,$id,$company_id);
	
		if($update_apply_leave){
			echo "Your Applied Application is Updated!";
		}
		else{
			echo "Something went wrong";
		}

                       
    }
	
	public function delete_apply_leave($id) {
		
		$company_id = $this->session->userdata('company_id');
        $this->Leave_model->delete_apply_leave($id,$company_id);
		redirect('Leave/apply_leave_list');
                
    }
	
	
	
	public function check_leave_status()
	{
		
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);		
		//echo '<pre>';
		// print_r($result);
		// exit();
        $data['maincontent'] = $this->load->view('leave/check_leave_status', $data, true);
        $this->load->view('master', $data);
        
    
	}
	
	public function leave_search()
	{
		//echo '<pre>';
		//print_r($_POST);
		//exit();
	    $user_id = $this->session->userdata('user_id');

		//print_r($user_id); exit();
		$company_id= $this->session->userdata('company_id');
		$date_time_from =$this->input->post('date_time_from', true);
        $date_time_to= $this->input->post('date_time_to', true);
		$approval_status = $this->input->post('approval_status', true);
		$result_set = $this->Leave_model->view_check_leave_status_info($date_time_from, $date_time_to, $approval_status,$company_id,$user_id);

		$return_html = '';
		$sl = 1;
		foreach($result_set as $row )
		{
			$return_html = $return_html.'
			<tr>
			<td>'.$sl.'</td>
			<td>'.$row->employee_id.'</td>
			<td>'.$row->date_time_from.'</td>
			<td>'.$row->date_time_to.'</td>
			<td>'.$row->no_of_days.'</td><td>'.$row->leave_types.'</td><td>'.$row->remarks.'</td>
			<td>'.$row->recorded_by.'</td><td>'.$row->recording_time.'</td>
			</tr>';
			$sl++;
		}
		
		echo $return_html;
		
	}

	public function approve_subordinate_pending_leave()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $company_id= $this->session->userdata('company_id');
        $line_manager= $this->session->userdata('user_name');
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['approve_subordinate_pending_leave']=$this->Leave_model->select_all_subordinate_pending_leave_info($company_id,$line_manager);
        $data['maincontent'] = $this->load->view('leave/subordinate_pending_list', $data, true);
		
        $this->load->view('master', $data);
        
    
	}
	public function approve_all_pending_leave()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $company_id= $this->session->userdata('company_id');
        $line_manager= $this->session->userdata('user_name');
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['all_pending_leave']=$this->Leave_model->select_all_pending_leave_info($company_id);
        $data['maincontent'] = $this->load->view('leave/all_pending_leave_list', $data, true);
        $this->load->view('master', $data);
        
    
	}

	public function approve_leave()
	{
		//print_r($_POST);exit();
		 $data = array();
		$id=$this->input->post('id',true);
		 $data['approved_by']=$this->session->userdata('user_id');
		 $data['approved_date']=date("y-m-d h:i:s");
		 $data['approval_status']="1";
         $company_id= $this->session->userdata('company_id');
         $each_applied_leave=$this->Leave_model->select_each_apply_leave($company_id,$id);
  		$datas['company_id'] = $company_id;
        $datas['employee_id'] = $each_applied_leave->employee_id;
        $employee_id = $datas['employee_id'];
   		$datas['no_of_days']=$each_applied_leave->no_of_days;
        $datas['date_time_to']=$each_applied_leave->date_time_to;
        $datas['half_full_day'] = $each_applied_leave->half_full_day;
        $half_full_day = $datas['half_full_day'];
  		$datas['leave_types'] = $each_applied_leave->leave_types;
		$datas['remarks'] = $each_applied_leave->remarks;
        $datas['approval_status'] = '1';
        $datas['recording_time'] = date("y-m-d h:i:s");
		$datas['recorded_by'] = $this->session->userdata('id');
		$datas['approved_date'] = date("y-m-d h:i:s");
		$datas['approved_by'] = $this->session->userdata('user_id');

		$printed=$each_applied_leave->is_printed;

		if ($printed=='0') {
	
		$sdata['message']="Leave Can't Be Approved! Please Print The Leave Form First";
		$this->session->set_userdata($sdata);
	
		//print_r($this->session->set_userdata($sdata));exit();
		//redirect('Leave/approve_all_pending_leave');
		redirect('Leave/printed_leaves');
		}else{

       
         $date_time_from = $each_applied_leave->date_time_from;
         $date_time_to= $each_applied_leave->date_time_to;
		$start_date = $date_time_from;

			while(date($start_date) <= date($date_time_to)){
						$datas['date_time_from'] = $start_date;
						if($half_full_day == "full_day"){
							$datas['no_of_days'] = 1;
						}
						else{
							$datas['no_of_days'] = .5;
						}
						//echo $day_count;exit();
			 			 $save_apply_leave=$this->Leave_model->save_apply_leave_info_approved($datas,$company_id);

				$start_date = date ("Y-m-d", strtotime("+1 day", strtotime($start_date)));
				//echo $start_date; exit();
			}




		 $approve_leave=$this->Leave_model->approve_leave($id,$data);
		 redirect('Leave/printed_leaves');
    
	}
}
	
	public function leave_report_form()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_employee']=$this->Employee_model->select_all_employee_list($company_id);
         $data['maincontent'] = $this->load->view('leave/leave_report_form', $data, true);
		 $this->load->view('master', $data);
	  
	}		
	
	public function show_report()
	{
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		$data = array();
		$from_date = $this->input->post('from_date', true);
		$employee_id = $this->input->post('employee_id', true);
		$data['employee_id']=$employee_id;
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');
		$data['from_date']=$from_date;
		$data['to_date']=$to_date;
		$data['count_employee_leave']=$this->Leave_model->count_employee_leave_info($employee_id,$from_date,$chk_to_date,$to_date);

		//print_r($data['count_employee_leave']);exit();
		$data['leave_report_info']=$this->Leave_model->show_leave_report_info($from_date,$to_date,$chk_to_date,$company_id,$employee_id);
		//print_r($data['leave_report_info']);exit();
		$data['all_leave_types']=$this->Leave_model->select_all_leave_types_info($company_id);
		//$count_employee_leave=$this->Leave_model->count_employee_leave_info($employee_id,$from_date,$chk_to_date,$to_date);
		//echo "<pre>";
		//print_r($data['leave_report_info']);
		//exit();
      	$this->load->view('leave/leave_report',$data);
  }
  	public function show_report_pdf()
	{
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		$data = array();
		$from_date = $this->input->post('from_date', true);
		$employee_id = $this->input->post('employee_id', true);
		$data['employee_id']=$employee_id;
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');
		$data['from_date']=$from_date;
		$data['to_date']=$to_date;
		$data['count_employee_leave']=$this->Leave_model->count_employee_leave_info($employee_id,$from_date,$chk_to_date,$to_date);
		$data['leave_report_info']=$this->Leave_model->show_leave_report_info($from_date,$to_date,$chk_to_date,$company_id,$employee_id);
		//$count_employee_leave=$this->Leave_model->count_employee_leave_info($employee_id,$from_date,$chk_to_date,$to_date);
		//echo "<pre>";
		//print_r($count_employee_leave);
		//exit();
      	$this->load->view('leave/leave_report_pdf',$data);
  }

  	public function show_report_excel()
	{
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		$data = array();
		$from_date = $this->input->post('from_date', true);
		$employee_id = $this->input->post('employee_id', true);
		$data['employee_id']=$employee_id;
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');
		$data['from_date']=$from_date;
		$data['to_date']=$to_date;
		$data['count_employee_leave']=$this->Leave_model->count_employee_leave_info($employee_id,$from_date,$chk_to_date,$to_date);
		$data['leave_report_info']=$this->Leave_model->show_leave_report_info($from_date,$to_date,$chk_to_date,$company_id,$employee_id);
		//$count_employee_leave=$this->Leave_model->count_employee_leave_info($employee_id,$from_date,$chk_to_date,$to_date);
		//echo "<pre>";
		//print_r($count_employee_leave);
		//exit();
      	$this->load->view('leave/leave_report_excel',$data);
  }
  
  
  	public function leave_summery_report_form()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_department']=$this->Department_model->select_all_department_list($company_id);
		
         $data['maincontent'] = $this->load->view('leave/summery_report_form', $data, true);
		 $this->load->view('master', $data);
	  
	}	
	
	public function show_summery_report()
	{
		$data = array();
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		$all_department = $this->input->post('all_department', true);
		$data['all_department']=$all_department;
		$department_name = $this->input->post('department_name', true);
		$data['department_name']=$department_name;
		$from_date = $this->input->post('from_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$data['from_date']=$from_date;
		$to_date = $this->input->post('to_date', true);
		$data['to_date']=$to_date;
		$data['leave_summery_report_info']=$this->Leave_model->show_summery_report_info($all_department,$department_name,$from_date,$chk_to_date,$to_date);
		//$leave_summery_report_info = $this->Leave_model->show_summery_report_info($all_department,$department_name,$from_date,$chk_to_date,$to_date);
		//echo "<pre>";
		//print_r($leave_summery_report_info);
		//exit();
        $this->load->view('leave/summery_report',$data);
  }	
  public function show_summery_report_pdf()
	{
		$data = array();
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		$all_department = $this->input->post('all_department', true);
		$data['all_department']=$all_department;
		$department_name = $this->input->post('department_name', true);
		$data['department_name']=$department_name;
		$from_date = $this->input->post('from_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$data['from_date']=$from_date;
		$to_date = $this->input->post('to_date', true);
		$data['to_date']=$to_date;
		$data['leave_summery_report_info']=$this->Leave_model->show_summery_report_info($all_department,$department_name,$from_date,$chk_to_date,$to_date);
		//$leave_summery_report_info = $this->Leave_model->show_summery_report_info($all_department,$department_name,$from_date,$chk_to_date,$to_date);
		//echo "<pre>";
		//print_r($leave_summery_report_info);
		//exit();
        $this->load->view('leave/summery_report_pdf',$data);
  }
  	public function show_summery_report_excel()
	{
		$data = array();
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		$all_department = $this->input->post('all_department', true);
		$data['all_department']=$all_department;
		$department_name = $this->input->post('department_name', true);
		$data['department_name']=$department_name;
		$from_date = $this->input->post('from_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$data['from_date']=$from_date;
		$to_date = $this->input->post('to_date', true);
		$data['to_date']=$to_date;
		$data['leave_summery_report_info']=$this->Leave_model->show_summery_report_info($all_department,$department_name,$from_date,$chk_to_date,$to_date);
		//$leave_summery_report_info = $this->Leave_model->show_summery_report_info($all_department,$department_name,$from_date,$chk_to_date,$to_date);
		//echo "<pre>";
		//print_r($leave_summery_report_info);
		//exit();
        $this->load->view('leave/summery_report_excel',$data);
  }	
	
	
public function forward_all_pending_leave()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $company_id= $this->session->userdata('company_id');
        $line_manager= $this->session->userdata('user_name');
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['all_pending_leave']=$this->Leave_model->select_all_pending_leave_info_forward($company_id);
        $data['maincontent'] = $this->load->view('leave/forward_all_pending_leave', $data, true);
        $this->load->view('master', $data);
        
    
	}

		public function forward_leave($id)
	{
		 $data = array();
		 $data['approval_status']="1";
		 $data['approved_by']=$this->session->userdata('user_name');
		 $data['updating_time']=date("y-m-d h:i:s");
		 $data['approval_status']="2";
         $company_id= $this->session->userdata('company_id');
		 $data['approve_leave']=$this->Leave_model->approve_leave($id,$data);
		 redirect('Leave/forward_all_pending_leave');
    
	}



	public function print_leave(){

		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $company_id= $this->session->userdata('company_id');
        $line_manager= $this->session->userdata('user_name');
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['all_pending_leave']=$this->Leave_model->select_all_pending_leave_info_for_print($company_id);
        $data['maincontent'] = $this->load->view('leave/print_leave', $data, true);
        $this->load->view('master', $data);

	}


	public function printed_leaves(){

		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $company_id= $this->session->userdata('company_id');
        $line_manager= $this->session->userdata('user_name');
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['all_pending_leave']=$this->Leave_model->select_all_printed_leave_info_for_print($company_id);
        $data['maincontent'] = $this->load->view('leave/printed_leaves', $data, true);
        $this->load->view('master', $data);

	}

public function approved_leaves(){

		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $company_id= $this->session->userdata('company_id');
        $line_manager= $this->session->userdata('user_name');
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['all_pending_leave']=$this->Leave_model->select_all_pending_leave_info_after_approval($company_id);
        $data['maincontent'] = $this->load->view('leave/approved_leaves', $data, true);
        $this->load->view('master', $data);

	}


		
public function printed_copy($id){

			//$print_update=$this->Voucher_entry_model->update_print($voucher_no);
	   $company_id= $this->session->userdata('company_id');
	   $each_applied_leave=$this->Leave_model->select_each_apply_leave($company_id,$id);	
			$data['each_applied_leave']=$each_applied_leave;
			$employee_id=$each_applied_leave->employee_id;

			$employee_details=$this->Employee_model->pick_employee_info_by_employee_id($company_id,$employee_id);
			$data['employee_details']=$employee_details;
			$datas['is_printed']=1;
			$print=$this->Leave_model->approve_leave($id,$datas);

			//print_r($print);exit();
			 $data['maincontent'] = $this->load->view('leave/printed_copy', $data, true);
			 $this->load->view('leave/printed_copy', $data);
 
   

}

public function pick_leave_data(){


	//print_r($_POST);
	$id=$this->input->post('id',true);
	$employee_id=$this->input->post('employee_id',true);
	$from=$this->input->post('from',true);
	$to=$this->input->post('to',true);
	$type=$this->input->post('type',true);
   $company_id= $this->session->userdata('company_id');
   $employee=$this->Employee_model->each_employee_info($company_id,$employee_id);

	$past_leave_data=$this->Leave_model->select_past_leave_data_for_employee($company_id,$id);


//print_r($past_leave_data);exit();
$period=$past_leave_data->period;
if ($period=='monthly') {
	$count=$this->Leave_model->select_past_leave_data_for_month_employee($company_id,$employee_id,$type);
	}else{

$count=$this->Leave_model->select_past_leave_data_for_year_employee($company_id,$employee_id,$type);

	}

if ($count!==null) {
	$no_of_days=$count->no_of_days;
}else{
	$no_of_days=0;
}
	


	$name=$employee->first_name.' '.$employee->last_name;
	$limits=$past_leave_data->limits;
	$period=$past_leave_data->period;
	$balance=$limits-$no_of_days;
	$availed=$no_of_days;

	echo $name.'#'.$availed.'#'.$balance.'#'.$type.'#'.$limits.'#'.$period;

}
	
	public function individual_leave_report(){
$data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_employee']=$this->Employee_model->select_all_employee_list($company_id);
         $data['maincontent'] = $this->load->view('leave/individual_leave_report', $data, true);
		 $this->load->view('master', $data);

	}


	public function show_individual_leave_report(){

		//print_r($_POST);exit();
		$company_id= $this->session->userdata('company_id');
		$employee_id=$this->input->post('employee_id',true);
		$data['past_leave_data']=$this->Leave_model->select_past_leave_data_for_month($company_id,$employee_id);
         $data['past_leave_data_yearly']=$this->Leave_model->select_past_leave_data_for_year($company_id,$employee_id);


         $data['remaining_leave_list']=$this->Leave_model->remaining_leave_list($company_id,$employee_id);
           $this->load->view('leave/show_individual_leave_report',$data);
   

	}
	
	
}
