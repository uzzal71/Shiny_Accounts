<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
           $this->load->model('Promotion_model');
           $this->load->model('Employee_model');
           $this->load->model('Designation_model');
    }
		public function index()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('promotion/promotion', $data, true);
         $this->load->view('master', $data);
	}		
	public function add_promotion()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id = $this->session->userdata('company_id');
		 $data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
		 $data['all_designation'] = $this->Designation_model->select_all_designation_list($company_id);
         $data['maincontent'] = $this->load->view('promotion/add_promotion', $data, true);
         $this->load->view('master', $data);
	}
	
	 public function save_promotion_info() {
        $data = array();
        $company_id=$this->session->userdata('company_id');
        $data['company_id'] = $company_id;
        $data['employee_id'] = $this->input->post('emp_id', true);
        $data['employee_name'] = $this->input->post('employee_name', true);
        $data['designation'] = $this->input->post('designation', true);
        $data['promoted_designation'] = $this->input->post('promoted_designation', true);
        $data['basic_salary'] = $this->input->post('basic_salary', true);
        $data['incremented_salary'] = $this->input->post('incremented_salary', true);
        $data['effective_from_date'] = $this->input->post('effective_from_date', true);
		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
		
        $this->Promotion_model->save_promotion_info($data);
		$sdata['message']='Promotion Information saved sucessfully';
        $this->session->set_userdata($sdata);
        redirect('Promotion');
                       
    }
	public function save_promotion() 
	{
        $data = array();
        $company_id=$this->session->userdata('company_id');
        $data['company_id'] = $company_id;
        $employee_id = $this->input->post('employee_id', true);
		
        $data['employee_id'] = $employee_id;
        $data['employee_name'] = $this->input->post('employee_name', true);
        $data['designation'] = $this->input->post('designation', true);
        $data['promoted_designation'] = $this->input->post('promoted_designation', true);
        $data['effective_from_date'] = $this->input->post('effective_from_date', true);

		$check_employee_id = $this->Promotion_model->check_employee_id($company_id,$employee_id);
		if($check_employee_id)
		{
			$data['updating_time'] = date("y-m-d h:i:s");
			$data['updated_by'] = $this->session->userdata('id');
			$this->Promotion_model->update_promotion($company_id,$employee_id,$data);
			$sdata['message']='Promotion Information Updated Sucessfully';
			$this->session->set_userdata($sdata);
			redirect('Promotion/add_promotion');
			
		}
		else
		{
			$data['recording_time'] = date("y-m-d h:i:s");
			$data['recorded_by'] = $this->session->userdata('id');
			$this->Promotion_model->save_promotion_info($data);
			$sdata['message']='Promotion Information saved sucessfully';
			$this->session->set_userdata($sdata);
			redirect('Promotion/add_promotion');	
		}

                       
    }
	
	
	
	public function emp_id_search()
	{
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		
		$emp_id =$this->input->post('emp_id', true);
		$company_id=$this->session->userdata('company_id');
		$result_set = $this->Promotion_model->view_emp_id_info($emp_id,$company_id);
		
		if($result_set){
			$return_html = "";
		
		$return_html = $return_html."
		<tr>
		<th> Employee Name :</th>
		<td colspan=\"3\"><input type=\"text\" name=\"employee_name\"value=\"".$result_set->first_name." ".$result_set->last_name."\" class=\"form-control custom-input\" readonly></td>
		
		</tr>
		
		<tr>
		<th> Designation:</th>
		<td> <input type=\"text\" name=\"designation\"value=\"".$result_set->designation."\" class=\"form-control custom-input\" readonly></td>
		
		<th>Promoted Designation:</th>
		<td><input type=\"text\" name=\"promoted_designation\" class=\"form-control custom-input\"></td>
	
		</tr>
		<tr>
		<th> Salary:</th>
		<td> <input type=\"text\" name=\"basic_salary\"value=\"".$result_set->basic_salary."\" class=\"form-control custom-input\" readonly></td>
		
		<th> Incrimented Salary:</th>
		<td><input type=\"text\" name=\"incremented_salary\" class=\"form-control custom-input\"></td>
		</tr>
		<tr>
		<th> Effective From :</th>
		 <td align=\"center\" ><input type=\"date\" name=\"effective_from_date\" id=\"effective_from_date\" class =\" form-control custom-input dateFrom \" placeholder=\"yyyy-mm-dd\" required></td>
		 <td align=\"center\" colspan=\"2\"><button type=\"submit\" value=\"\" class=\"btn btn-primary\" id=\"button\">Save Promotion</button></td>
		</tr>
		";
		
		echo $return_html;
		}
		else{echo "<tr><td colspan=\"2\" align=\"center\">This ID is not available</td></tr>";}
	
	}

	public function employee_id_search()
	{
		$employee_id =$this->input->post('employee_id', true);
		$company_id=$this->session->userdata('company_id');
		$each_employee = $this->Employee_model->each_employee_info($company_id,$employee_id);
		$name = $each_employee->first_name." ".$each_employee->last_name;
		$designation = $each_employee->designation;
		$employee_info = $name."#".$designation;
		echo $employee_info;
		exit();
	}
	
	public function promotion_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_promotion']=$this->Promotion_model->select_all_promotion_info($company_id);
         $data['maincontent'] = $this->load->view('promotion/promotion_list', $data, true);
         $this->load->view('master', $data);
    
	}
	public function search_promotion()
	{

		
		$date_from =$this->input->post('date_from', true);
		$date_to =$this->input->post('date_to', true);
		$company_id=$this->session->userdata('company_id');
		$all_promotion = $this->Promotion_model->all_promotion_info($company_id,$date_from,$date_to);
		if($all_promotion){
			$return_html = "";
			$id=0;
			foreach($all_promotion as $each_promotion)
			{
				$id++;
						$return_html = $return_html."
								<tr>
                                <td>".$id."</td>
                                <td>".$each_promotion->employee_id."</td>
                                <td>".$each_promotion->employee_name."</td>
                                <td>".$each_promotion->designation."</td>
                                <td>".$each_promotion->promoted_designation."</td>
                                <td>".$each_promotion->effective_from_date."</td>
                               
                                <td width=\"130px\">
								<a class=\"btn btn-primary\" href='".base_url()."Promotion/approve_promotion/".$each_promotion->employee_id."'>Approve</a>

                                </td>
								
							
                            </tr>
							";
						
				
			}
				echo $return_html;
		}
		else
		{
			echo "<tr><td colspan=\"8\" align=\"center\">No Promotion Info Available</td></tr>";
			}
		

	}
	
	public function approve_promotion_form()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['all_promotion']=$this->Promotion_model->select_all_promotion_info($company_id);
         $data['maincontent'] = $this->load->view('promotion/approve_promotion', $data, true);
         $this->load->view('master', $data);
    
	}	
	public function approve_promotion($employee_id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $approve_promotion = $this->Promotion_model->approve_promotion($employee_id);
		 redirect('Promotion/approve_promotion_form');
    
	}
	public function edit_promotion($id)
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id= $this->session->userdata('company_id');
		 $data['each_promotion']=$this->Promotion_model->select_each_promotion_info($company_id,$id);
		 $data['all_designation'] = $this->Designation_model->select_all_designation_list($company_id);
         $data['maincontent'] = $this->load->view('promotion/edit_promotion', $data, true);
         $this->load->view('master', $data);
        
	}
	
	public function update_promotion() {

        $data = array();
        $company_id=$this->session->userdata('company_id');
        $id= $this->input->post('id', true);
        $data['company_id'] = $company_id;
        $data['employee_id'] = $this->input->post('employee_id', true);
        $data['employee_name'] = $this->input->post('employee_name', true);
        $data['designation'] = $this->input->post('designation', true);
        $data['promoted_designation'] = $this->input->post('promoted_designation', true);
        $data['basic_salary'] = $this->input->post('basic_salary', true);
        $data['incremented_salary'] = $this->input->post('incremented_salary', true);
        $data['effective_from_date'] = $this->input->post('effective_from_date', true);
		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');
		//echo '<pre>';
		//print_r($company_id);
		//exit();
        $update_promotion=$this->Promotion_model->update_promotion_info($data,$id,$company_id);
		if($update_promotion){
			echo "Updated";
		}else{
			echo "Not Updated";
		}
                       
    }
	
		public function delete_promotion($id,$company_id) {
		$company_id= $this->session->userdata('company_id');
        $this->Promotion_model->delete_promotion($id,$company_id);
		redirect('Promotion/promotion_list');
                
    }
	
	

		
	
	
	
}