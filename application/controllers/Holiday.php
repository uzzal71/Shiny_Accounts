<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
          $this->load->model('Holiday_model');
    }
	public function add_new_holiday()
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description'] = "";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
        $data['maincontent'] = $this->load->view('holiday/create_new_holiday', $data, true);
		
        $this->load->view('master', $data);
        
	}
	public function save_holiday()
	{
		$data = array();
        $data['from_date'] = $this->input->post('from_date', true);
        $from_date = $data['from_date'];   

		$data['to_date'] = $this->input->post('to_date', true);
        $to_date = $data['to_date'];	

		$input_day = $this->input->post('day', true);
		if($to_date == "")
		{
		$data['to_date'] = $from_date;
        $to_date = $from_date;
		}
        $company_id = $this->session->userdata('company_id');
        $data['description'] = $this->input->post('description', true);
        $description = $data['description'];
        $data['type'] = $this->input->post('type', true);
        $type = $data['type'];
		$data['company_id'] =  $company_id;
		$data['recording_time'] = date("y-m-d h:i:s");
		$recording_time = $data['recording_time'];
		$data['recorded_by'] = $this->session->userdata('user_name');
		//print_r($data['recorded_by']);exit();
		$recorded_by = $data['recorded_by'];
		if($input_day != "")
		{
			$start_date = $from_date;
			while($start_date <= $to_date){
				
				$timestamp = strtotime($start_date);
				$day = date('l', $timestamp);
				if($input_day == $day)
				{
						if(date($from_date) <= date($to_date))
						{
							$check_duplicate_weekend = $this->Holiday_model->check_duplicate_weekend($company_id,$start_date);
							if($check_duplicate_weekend)
								{
								}
								else
								{
									//echo $day_count;exit();
						 			$save_weekend = $this->Holiday_model->save_new_weekend_holiday_info($company_id,$start_date,$description,$type,$recording_time,$recorded_by);
								}

						}
				}
				$start_date = date ("Y-m-d", strtotime("+1 day", strtotime($start_date)));
			}
			echo "Weekend Added Successfully!";
		}
		else
		{
			/*
			$check_duplicate_holiday = $this->Holiday_model->check_duplicate_holiday($company_id,$from_date,$to_date);
			if($check_duplicate_holiday)
			{
				echo "This Date Holiday Already Defined.";
			}
			else
			{
				   $dStart = new DateTime($from_date);
				   $dEnd  = new DateTime($to_date);
				   $dDiff = $dStart->diff($dEnd);
				   $day_count = $dDiff->days;
				   echo $day_count;exit();
				   $data['day_count'] = $dDiff->days;

				$this->Holiday_model->save_new_holiday_info($data,$company_id);
				echo "Holiday Added Successfully!";
			}
			*/
			   $dStart = new DateTime($from_date);
			   $dEnd  = new DateTime($to_date);
			   $dDiff = $dStart->diff($dEnd);
			   $day_count = $dDiff->days;
			   $data['day_count'] = $day_count+1;

			   $start_date = $from_date;
			while($start_date <= $to_date){
				
				$timestamp = strtotime($start_date);
				$day = date('l', $timestamp);
						if(date($from_date) <= date($to_date))
						{
							$check_duplicate_holiday = $this->Holiday_model->check_duplicate_holiday($company_id,$start_date);
							//echo "<pre>";
							//print_r($check_duplicate_holiday);
							//exit();
							if($check_duplicate_holiday)
								{
									
								}
								else
								{ 
									//echo $day_count;exit();
						 			$save_holiday = $this->Holiday_model->save_new_holiday_info($company_id,$start_date,$description,$type,$recording_time,$recorded_by);
								}
							
								$start_date = date ("Y-m-d", strtotime("+1 day", strtotime($start_date)));
									//echo $start_date;
								//exit();

						}
				
			}
				echo "Holiday Added Successfully!";
			
		}
		

		
        //$check_duplicate_holiday = this->Holiday_model->check_duplicate_holiday($company_id,$from_date,$to_date);
      
    }
	public function holiday_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_holiday_list']=$this->Holiday_model->select_all_holiday_list($company_id);
         $data['maincontent'] = $this->load->view('holiday/holiday_list', $data, true);
		
        $this->load->view('master', $data);
        
    
	}
	
	public function edit_holiday($id)
	{
		$data = array();
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
        $data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['each_holiday']=$this->Holiday_model->each_holiday_by_id($id);
		//$each_holiday=$this->Holiday_model->each_holiday_by_id($id);
        $data['maincontent'] = $this->load->view('holiday/edit_holiday', $data, true);
        $this->load->view('master', $data);
        
	}
	 public function update_holiday() {
        $data = array();

        $id = $this->input->post('id', true);
        $data['from_date'] = $this->input->post('from_date', true);
        $data['to_date'] = $this->input->post('to_date', true);
        $date = $this->input->post('date', true);
        $data['description'] = $this->input->post('description', true);
        $data['type'] = $this->input->post('type', true);
        $company_id = $this->session->userdata('company_id');
		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');

        $this->Holiday_model->update_holiday_info($id,$company_id,$data);
		echo "Holiday Updated Successfully!";
    }
	
	public function delete_holiday($id) {

        $this->Holiday_model->delete_holiday_info($id);
		redirect('Holiday/holiday_list');          
    }
	
	public function holiday_report_form()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('holiday/holiday_report_form', $data, true);
		 $this->load->view('master', $data);
	}		
	
	public function show_holiday_report()
	{
		 $data = array();
		
		//echo '<pre>';
		//print_r($_POST);
		//exit();

		$from_date = $this->input->post('from_date', true);
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');
		$data['from_date']=$from_date;
		$data['from_date1']=$from_date;
		$data['to_date']=$to_date;
		$data['to_date1']=$to_date;
		$data['holiday_report_info']=$this->Holiday_model->show_holiday_report_info($from_date,$to_date,$chk_to_date,$company_id);
		$data['count_holiday_info']=$this->Holiday_model->count_holiday_info($company_id,$from_date,$chk_to_date,$to_date);
		
		//$this->load->helper('dompdf');
        //$view_file=$this->load->view('holiday/holiday_report', $data, true);
        //$file_name=pdf_create($view_file, 'Holiday_Report');
	
      	$this->load->view('holiday/holiday_report',$data);
  }

  	public function show_holiday_report_pdf()
	{
		 $data = array();
		
		//echo '<pre>';
		//print_r($_POST);
		//exit();

		$from_date = $this->input->post('from_date', true);
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');
		$data['from_date']=$from_date;
		$data['from_date1']=$from_date;
		$data['to_date']=$to_date;
		$data['to_date1']=$to_date;
		$data['holiday_report_info']=$this->Holiday_model->show_holiday_report_info($from_date,$to_date,$chk_to_date,$company_id);
		$data['count_holiday_info']=$this->Holiday_model->count_holiday_info($company_id,$from_date,$chk_to_date,$to_date);
		
		//$this->load->helper('dompdf');
        //$view_file=$this->load->view('holiday/holiday_report', $data, true);
        //$file_name=pdf_create($view_file, 'Holiday_Report');
	
      	$this->load->view('holiday/holiday_report_pdf',$data);
  }
  	public function show_holiday_report_excel()
	{
		 $data = array();
		
		//echo '<pre>';
		//print_r($_POST);
		//exit();

		$from_date = $this->input->post('from_date', true);
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');
		$data['from_date']=$from_date;
		$data['from_date1']=$from_date;
		$data['to_date']=$to_date;
		$data['to_date1']=$to_date;
		$data['holiday_report_info']=$this->Holiday_model->show_holiday_report_info($from_date,$to_date,$chk_to_date,$company_id);
		$data['count_holiday_info']=$this->Holiday_model->count_holiday_info($company_id,$from_date,$chk_to_date,$to_date);
		
		//$this->load->helper('dompdf');
        //$view_file=$this->load->view('holiday/holiday_report', $data, true);
        //$file_name=pdf_create($view_file, 'Holiday_Report');
	
      	$this->load->view('holiday/holiday_report_excel',$data);
  }
	
	
	
}
