<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Increment extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
           $this->load->model('Increment_model');
           $this->load->model('Employee_model');
    }		
	public function add_increment()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
		 $data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
		 
         $data['maincontent'] = $this->load->view('increment/add_increment', $data, true);
         $this->load->view('master', $data);
	}
	public function save_increment() 
	{
        $data = array();
        $company_id=$this->session->userdata('company_id');
        $data['company_id'] = $company_id;
        $employee_id = $this->input->post('employee_id', true);
		
        $data['employee_id'] = $employee_id;
        $data['employee_name'] = $this->input->post('employee_name', true);
        $data['basic_salary'] = $this->input->post('basic_salary', true);
        $data['incremented_salary'] = $this->input->post('incremented_salary', true);
        $data['effective_from_date'] = $this->input->post('effective_from_date', true);
        $data['approval_status'] = 0;
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
		$this->Increment_model->save_increment_info($data);
		$sdata['message']='Increment Information saved sucessfully';
		$this->session->set_userdata($sdata);
		redirect('Increment/add_increment');	
				   
    }

	public function employee_id_search()
	{
		$employee_id =$this->input->post('employee_id', true);
		$company_id=$this->session->userdata('company_id');
		$each_employee = $this->Employee_model->each_employee_info($company_id,$employee_id);
		$each_increment = $this->Increment_model->each_increment_info($employee_id);
		if($each_increment != "" || $each_increment != null){
			$last_increment_date = $each_increment->last_increment_date;
		}
		else{
			$last_increment_date = $each_employee->joining_date;
		}
		if($last_increment_date == ""){
			$last_increment_date = $each_employee->joining_date;
		}
		$effective_from_date = date("Y-m-d", strtotime(date("Y-m-d", strtotime($last_increment_date)) . " + 1 year"));

		$name = $each_employee->first_name." ".$each_employee->last_name;
		$basic_salary = $each_employee->basic_salary;
		$employee_info = $name."#".$basic_salary."#".$effective_from_date;
		echo $employee_info;
	}
	
	public function search_increment()
	{
		$date_from =$this->input->post('date_from', true);
		$date_to =$this->input->post('date_to', true);
		$company_id=$this->session->userdata('company_id');
		$all_increment = $this->Increment_model->all_increment_info($company_id,$date_from,$date_to);
		if($all_increment){
			$return_html = "";
			$id=0;
			foreach($all_increment as $each_increment)
			{
				$id++;
						$return_html = $return_html."
								<tr>
                                <td>".$id."</td>
                                <td>".$each_increment->employee_id."</td>
                                <td>".$each_increment->employee_name."</td>
                                <td>".$each_increment->basic_salary."</td>
                                <td>".$each_increment->incremented_salary."</td>
                                <td>".$each_increment->effective_from_date."</td>
                               
                                <td width=\"130px\">
								<a class=\"btn btn-primary\" href='".base_url()."Increment/approve_increment/".$each_increment->employee_id."'>Approve</a>

                                </td>
								
							
                            </tr>
							";
						
				
			}
				echo $return_html;
		}
		else
		{
			echo "<tr><td colspan=\"8\" align=\"center\">No Increment Info Available</td></tr>";
			}
		

	}
	
	public function approve_increment_form()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_increment']=$this->Increment_model->select_all_increment_info($company_id);
         $data['maincontent'] = $this->load->view('increment/approve_increment', $data, true);
         $this->load->view('master', $data);
    
	}	
	public function approve_increment($employee_id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $approve_increment = $this->Increment_model->approve_increment($employee_id);
		 redirect('Increment/approve_increment_form');
    
	}
}