<?php

ini_set('display_errors', 1); error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher_entry extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
        
          $this->load->model('Voucher_entry_model');
          $this->load->model('Expense_model');
          $this->load->model('Employee_model');
          $this->load->model('Customer_model');
    }


	public function add_bill_entry_form()
	{	//print_r($_POST);exit();
		 $user_type= $this->session->userdata('user_type');
		 $username=$this->session->userdata('user_name');
		 $employee_id=$this->session->userdata('user_id');
		 $data = array();
		 $data['user_name']=$username;
		 $data['user_type']=$user_type;
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['view_customer_list']=$this->Customer_model->select_all_customer_list();
		 //echo "<pre>";
		//print_r($data['view_customer_list']);exit();
		 $company_id = $this->session->userdata('company_id');
		 $data['last_id']=$this->Voucher_entry_model->select_last_voucher_id($company_id);
		 $data['expense_type']=$this->Expense_model->select_expense_type_info();
		
		 $data['view_employee_list']=$this->Voucher_entry_model->select_all_employee_for_voucher();
		 $data['latest_vouchers']=$this->Voucher_entry_model->retrieve_pending_bills($employee_id,$company_id);
         $data['maincontent'] = $this->load->view('voucher_entry/bill_entry_form', $data, true);
		
         $this->load->view('master', $data);
        
	}	
	public function pending_bill()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $employee_id=$this->session->userdata('user_id');
          //$employee_id='2015066';
         $company_id=$this->session->userdata('company_id');

         //print_r($employee_id);exit();
         $data['voucher_infos']=$this->Voucher_entry_model->retrieve_pending_bills($employee_id,$company_id);

         //print_r($data['voucher_infos']);exit();
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('voucher_entry/pending_bill_list', $data, true);
		
         $this->load->view('master', $data);
        
	}	
	
	public function approved_bill()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $employee_id=$this->session->userdata('user_id');
         $company_id=$this->session->userdata('company_id');
         $data['voucher_infos']=$this->Voucher_entry_model->retrieve_approved_bills($employee_id,$company_id);
         
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('voucher_entry/approved_bill_list', $data, true);
		
         $this->load->view('master', $data);
        
	}	
	
	public function pick_expense_type_required_field()
	{
		//echo '<pre>';
		//print_r($_POST);
		//exit();
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
		 $expense_type=$this->input->post('expense_type');
		// $employee_name=$this->Employee_model->select_employee_name_by_employee_id($employee_id);

				if($expense_type=='Transport'){
								$return_html = "";
		
		$return_html = $return_html."
					<tr>
                      
					   <th align='center'>From*</th>
                       <td align='center' width='30%'><input type='text' name='from' id='from' class='form-control custom-input' required></td>
					  
					  	<th align='center'>To*</th>
                       <td align='center' width='30%'><input type='text' name='to' id='to' class='form-control custom-input' required></td>
                    </tr>
					
					<tr>

					    <th align='center'>Vehicle*</th>
						<td align='center' width='30%'>
					   <select name='vehicle' class='form-control  custom-input' id='vehicle' >
						
							 <option value=''>Rickshaw</option>
							 <option value=''>Bus</option>
							 <option value=''>CNG</option>
							 <option value=''>Car</option>
					
					   </select>
					   </td> 
					   <th align='center'>Amount*</th>
                       <td align='center' width='30%'><input type='text' name='amount' id='amount' class='form-control custom-input' required></td>
						
                    </tr>
					<tr>
					<th align='center'>Remarks</th>
					<td align='center' width='30%'><input type='text' name='remarks' id='remarks' class='form-control custom-input' required></td> 
					</tr>
					
		";
		
		echo $return_html;
				}
				else{
					$return_html = "";
		
		$return_html = $return_html."
					<tr>
                      
					   <th align='center'>Description*</th>
                       <td align='center' width='30%'><input type='text' name='description' id='description' class='form-control custom-input' required></td>
					  
					  	<th align='center'>Amount*</th>
                       <td align='center' width='30%'><input type='text' name='amount' id='amount' class='form-control custom-input' required></td>
                    </tr>		

					<tr>
                      
					   <th align='center'>Remarks*</th>
                       <td align='center' width='30%'colspan='' span=''><input type='text' name='remarks' id='remarks' class='form-control custom-input' required></td>
                                              
					  
					  	
                    </tr>
					
					";
		
		echo $return_html;
				}
		
        
	}	
	
	public function save_bill_info()
	{
			//print_r($_POST);exit();

			//$numberOfEntry = (count($_POST)-12)/5;
			//print_r($numberOfEntry);exit();
		$company_id=$this->session->userdata('company_id');
		$ex_date=$this->input->post('date',true);
			$newDate = date("Ym", strtotime($ex_date));
    	$final="VN".$newDate;
    	$last_ids =$this->Voucher_entry_model->pick_latest_voucher_no($final,$company_id);

    	foreach ($last_ids as  $last_id) {
    		
    	}

		$last_id = $last_id->lastid;

		if($last_id=="")
		{
			$last_id= "001";
		}

	   else
	   {
	   		$convert_last_id = (int)$last_id;
			$length = strlen((string)$convert_last_id);
			if($length == 1){
			$last_id= $convert_last_id+1;
			 if($last_id == 10) {
			 	$last_id = "0".(string)($last_id);
			 }
			 else{
			 	$last_id = "00".(string)($last_id);
			 }
			}
			else if($length == 2){
			  $last_id= $convert_last_id+1;
			 if($last_id == 100) {
			 	$last_id = (string)($last_id);
			 }
			 else{
			 	$last_id = "0".(string)($last_id);
			 }
			 //$last_id= "0".(string)($convert_last_id+1);
			}
			else {
				$last_id = $convert_last_id + 1;
			}
		   //$last_id = $last_id->lastid+1;
	   }

		$voucher_no = $final.$last_id;
		 // echo "<pre>";print_r($_POST);
		 // exit();
		 // echo "<pre>";print_r($voucher_no);exit();
		$employee_id=$this->input->post('employee_id',true);
		$customer_id=$this->input->post('customer_id',true);
		$designations=$this->Voucher_entry_model->find_employee_designation($employee_id);
		$customers_names=$this->Voucher_entry_model->find_customer_name($customer_id);
		$customer_name=$customers_names->full_name;
		//print_r($customer_name);exit();
		$designation=$designations->designation;
		$data = array();
		$row_count = $this->input->post('row_count',true);
		//print_r($row_count);exit();
		for($index = 1; $index <= $row_count; $index++)
		{	
			$amounts=$this->input->post('ID'.$index.'_amount',true);
			if ($amounts==null) {
				$index++;	
			}
			$data['customer_name'] =$customer_name;
			$data['is_approved'] =0;
			$data['voucher_no'] = $voucher_no;
			$data['date'] = $this->input->post('date',true);
			$data['expense_type'] = $this->input->post('expense_type',true);
			$data['employee_id'] = $this->input->post('employee_id',true);
			$data['employee_name'] = $this->input->post('employee_name',true);
			$data['customer_id'] = $this->input->post('customer_id',true);
			$data['project_id'] = $this->input->post('project_id',true);
			$data['project_name'] = $this->input->post('project_name',true);
			
			
			$data['is_support'] = $this->input->post('types',true);
			$data['project_description'] = $this->input->post('project_description',true);
			$data['from_place'] = $this->input->post('ID'.$index.'_from',true);
			$data['to_place'] = $this->input->post('ID'.$index.'_to',true);
			$data['vehicle'] = $this->input->post('ID'.$index.'_vehicle',true);
			$data['description'] = $this->input->post('ID'.$index.'_description',true);
			
			$data['amount'] =$this->input->post('ID'.$index.'_amount',true);
			$data['remarks'] = $this->input->post('ID'.$index.'_remark',true);
			$data['company_id'] = $this->session->userdata('company_id');
			$data['entry_by'] = $this->session->userdata('user_name');
			$data['recording_time'] = date("y-m-d h:i:s");
			$data['entry_date'] = date("y-m-d h:i:s");
			$data['employee_designation'] = $designation;

			// echo '<pre>';
			// print_r($data);
			// exit();
			
		//print_r($data);exit();
			$save_voucher = $this->Voucher_entry_model->save_voucher_info($data);
			
			
		}

		
		$sdata = array();
		$sdata['message'] = "Voucher Information Saved!"."\nNew Voucher No:".$voucher_no;
		$this->session->set_userdata($sdata);
		redirect('Voucher_entry/add_bill_entry_form');
        
	}	
	public function pick_voucher_info()
	{
		// echo '<pre>';
		// print_r($_POST);
		// exit();
		 $data = array();
		 $voucher_no = $this->input->post('voucher_no', $data, true); 
		 $voucher_info=$this->Voucher_entry_model->expense_voucher_info($voucher_no);
		 $expense_type=$voucher_info->expense_type;
		 $amount=$voucher_info->amount;
		 $date=$voucher_info->date;
		 //print_r($voucher_info); exit();
		 echo $expense_type."#".$amount."#".$date;
        
	}


	public function pick_voucher_info_expenses()
	{
		// echo '<pre>';
		// print_r($_POST);
		// exit();
		 $data = array();
		 $voucher_no = $this->input->post('voucher_no', $data, true); 
		 $voucher_info=$this->Voucher_entry_model->expense_voucher_info_for_expenses($voucher_no);

		 //print_r($voucher_info);exit();
		 $expense_type=$voucher_info->expense_type;
		 $amount=$voucher_info->amount;
		 $date=$voucher_info->date;
		 $customer_name=$voucher_info->customer_name;
		 $project_name=$voucher_info->project_name;
		 $project_id=$voucher_info->project_id;
		 $employee_id=$voucher_info->employee_id;
		 $entry_date=$voucher_info->entry_date;
		 $description=$voucher_info->description;
		 $printed=$voucher_info->is_printed;
		 $entry_dates = date('Y-m-d', strtotime($entry_date));
		 $is_support=$voucher_info->is_support;
		 //print_r($voucher_info); exit();
		 echo $expense_type."#".$amount."#".$date."#".$customer_name."#".$project_id."#".$project_name."#".$employee_id."#".$entry_dates."#".$is_support."#".$printed."#".
		 	$description;
        
	}


	public function view_voucher_details($voucher_no){

		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         
         	$data['vvoucher_no']=$voucher_no;
         //print_r($employee_id);exit();
         $data['voucher_info']=$this->Voucher_entry_model->retrieve_pending_voucher_info($voucher_no);

         //print_r($data['voucher_info']);exit();
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('voucher_entry/view_voucher_details', $data, true);
		//print_r($data['voucher_info']);exit();
         $this->load->view('master', $data);


	}

	public function voucher_approval(){

		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         
          //$employee_id='2015066';
         $company_id=$this->session->userdata('company_id');

         //print_r($employee_id);exit();
         $data['voucher_infos']=$this->Voucher_entry_model->retrieve_voucher_info_for_approval($company_id);

         //print_r($data['voucher_infos']);exit();
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('voucher_entry/voucher_approval', $data, true);
		
         $this->load->view('master', $data);



	}


	public function approve_voucher($voucher_no){

			$data=array();
			$voucher_info=$this->Voucher_entry_model->expense_voucher_info_for_expenses($voucher_no);
		$printed=$voucher_info->is_printed;
		if ($printed==1) {
			$data['is_approved']=1;
			$data['approved_by']=$this->session->userdata('user_id');
         
         	$data['company_id']=$this->session->userdata('company_id');
         	$data['approved_date']=date("y-m-d h:i:s");

         	$con_approval=$this->Voucher_entry_model-> update_approved_voucher_info($data,$voucher_no);


         	 ?><script>
         	 	alert('Voucher Approved Successfully');
         	window.location.assign('../printed_vouchers');
         		</script> <?php 
		}else{ ?>

		<script>

			alert('Please Print The Voucher First');
         	window.location.assign('../printed_vouchers');
         		</script> <?php	
		}
			



        

	}

	
	public function edit_voucher_info($voucher_no){
		$data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         

       $company_id=$this->session->userdata('company_id');
         $data['expense_type']=$this->Expense_model->select_expense_type_info();
         $data['voucher_info']=$this->Voucher_entry_model->retrieve_pending_voucher_info_to_update($voucher_no);

       $data['view_customer_list']=$this->Customer_model->select_all_customer_list();
 		$data['view_employee_list']=$this->Voucher_entry_model->select_all_employee_for_voucher();
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('voucher_entry/edit_voucher_info', $data, true);
		//print_r($data['voucher_info']);exit();
         $this->load->view('master', $data);


	}

	public function update_bill_info(){




		// echo "<pre>";print_r($_POST);exit();
		$voucher_no = $this->input->post('voucher_no',true);
		$delete=$this->Voucher_entry_model->delete_voucher($voucher_no);

		$employee_id=$this->input->post('employee_id',true);
		$customer_id=$this->input->post('customer_id',true);

		if ($customer_id=="") {

			$project_ids=$this->input->post('project_id',true);

			$retrieved_project_data=$this->Voucher_entry_model->retrieve_customer_id($project_ids);
			
			$customer_id=$retrieved_project_data->customer_id;
			//print_r($customer_id);exit();

		
		}


		$designations=$this->Voucher_entry_model->find_employee_designation($employee_id);
		$customers_names=$this->Voucher_entry_model->find_customer_name($customer_id);
		//print_r($customer_id);exit();
		$customer_name=$customers_names->full_name;
		

		if ($designations==""){
			$designation='NA';
		}elseif ($designations!=="") {
			$designation=$designations->designation;
		}
		
	
		$data = array();
		$row_count = $this->input->post('row_count',true);
		if ($row_count=="") {
			$row_count = $this->input->post('row_counts',true);
		}

		//print_r($row_count);exit();
		for($index = 1; $index <= $row_count; $index++)
		{	

			$amounts=$this->input->post('ID'.$index.'_amount',true);
			if ($amounts==null) {
				$index++;	
			}

			$data['customer_name'] =$customer_name;
			$data['voucher_no'] = $voucher_no;
			$data['is_approved'] = 0;
			$data['date'] = $this->input->post('date',true);
			$data['expense_type'] = $this->input->post('expense_type',true);
			$data['employee_id'] = $this->input->post('employee_id',true);
			$data['employee_name'] = $this->input->post('employee_name',true);
			$data['customer_id'] = $this->input->post('customer_id',true);
			$data['project_id'] = $this->input->post('project_id',true);
			$data['project_name'] = $this->input->post('project_name',true);
			$data['is_support'] = $this->input->post('type',true);
			$data['project_description'] = $this->input->post('project_description',true);
			$data['from_place'] = $this->input->post('ID'.$index.'_from',true);
			$data['to_place'] = $this->input->post('ID'.$index.'_to',true);
			$data['vehicle'] = $this->input->post('ID'.$index.'_vehicle',true);
			$data['description'] = $this->input->post('ID'.$index.'_description',true);
			$amounts=$this->input->post('ID'.$index.'_amount',true);
			$data['amount'] = $this->input->post('ID'.$index.'_amount',true);
			$data['remarks'] = $this->input->post('ID'.$index.'_remark',true);
			$data['company_id'] = $this->session->userdata('company_id');
			$data['entry_by'] = $this->session->userdata('user_name');
			$data['recording_time'] = date("y-m-d h:i:s");
			$data['entry_date'] = date("y-m-d h:i:s");
			$data['employee_designation'] = $designation;
			
			//print_r($data);exit();
			$save_voucher = $this->Voucher_entry_model->save_voucher_info($data);
			
			//$save_voucher = $this->Voucher_entry_model->save_voucher_info($data);
			
		}



		//print_r($data);exit();
		$sdata = array();
		$sdata['message'] = "Voucher Information Updated";
		$this->session->set_userdata($sdata);
		redirect('Voucher_entry/add_bill_entry_form');
        
	
	
}

/*
*/

public function edit_voucher_info_all_ready_approved($voucher_no){
		$data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         

       $company_id=$this->session->userdata('company_id');
         $data['expense_type']=$this->Expense_model->select_expense_type_info();
         $data['voucher_info']=$this->Voucher_entry_model->retrieve_pending_voucher_info_to_update($voucher_no);

       $data['view_customer_list']=$this->Customer_model->select_all_customer_list();
 		$data['view_employee_list']=$this->Voucher_entry_model->select_all_employee_for_voucher();
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('voucher_entry/edit_voucher_info_all_ready_approved', $data, true);
		//print_r($data['voucher_info']);exit();
         $this->load->view('master', $data);


	}
/*
*/

/*
all ready approved update
*/
public function update_bill_info_all_ready_approved(){




		// echo "<pre>";print_r($_POST);exit();
		$voucher_no = $this->input->post('voucher_no',true);
		$delete=$this->Voucher_entry_model->delete_voucher($voucher_no);

		$employee_id=$this->input->post('employee_id',true);
		$customer_id=$this->input->post('customer_id',true);

		if ($customer_id=="") {

			$project_ids=$this->input->post('project_id',true);

			$retrieved_project_data=$this->Voucher_entry_model->retrieve_customer_id($project_ids);
			
			$customer_id=$retrieved_project_data->customer_id;
			//print_r($customer_id);exit();

		
		}


		$designations=$this->Voucher_entry_model->find_employee_designation($employee_id);
		$customers_names=$this->Voucher_entry_model->find_customer_name($customer_id);
		//print_r($customer_id);exit();
		$customer_name=$customers_names->full_name;
		

		if ($designations==""){
			$designation='NA';
		}elseif ($designations!=="") {
			$designation=$designations->designation;
		}
		
	
		$data = array();
		$row_count = $this->input->post('row_count',true);
		if ($row_count=="") {
			$row_count = $this->input->post('row_counts',true);
		}

		//print_r($row_count);exit();
		for($index = 1; $index <= $row_count; $index++)
		{	

			$amounts=$this->input->post('ID'.$index.'_amount',true);
			if ($amounts==null) {
				$index++;	
			}
			$data['customer_name'] =$customer_name;
			$data['voucher_no'] = $voucher_no;
			$data['is_approved'] = 1;
			$data['is_printed'] = 1;
			$data['is_expensed'] = 1;
			$data['date'] = $this->input->post('date',true);
			$data['expense_type'] = $this->input->post('expense_type',true);
			$data['employee_id'] = $this->input->post('employee_id',true);
			$data['employee_name'] = $this->input->post('employee_name',true);
			$data['customer_id'] = $this->input->post('customer_id',true);
			$data['project_id'] = $this->input->post('project_id',true);
			$data['project_name'] = $this->input->post('project_name',true);
			$data['is_support'] = $this->input->post('type',true);
			$data['project_description'] = $this->input->post('project_description',true);
			$data['from_place'] = $this->input->post('ID'.$index.'_from',true);
			$data['to_place'] = $this->input->post('ID'.$index.'_to',true);
			$data['vehicle'] = $this->input->post('ID'.$index.'_vehicle',true);
			$data['description'] = $this->input->post('ID'.$index.'_description',true);
			$amounts=$this->input->post('ID'.$index.'_amount',true);
			$data['amount'] = $this->input->post('ID'.$index.'_amount',true);
			$data['remarks'] = $this->input->post('ID'.$index.'_remark',true);
			$data['company_id'] = $this->session->userdata('company_id');
			$data['entry_by'] = $this->session->userdata('user_name');
			$data['recording_time'] = date("y-m-d h:i:s");
			$data['entry_date'] = date("y-m-d h:i:s");
			$data['employee_designation'] = $designation;
			
			//print_r($data);exit();
			$save_voucher = $this->Voucher_entry_model->save_voucher_info($data);
			
			//$save_voucher = $this->Voucher_entry_model->save_voucher_info($data);
			
		}



		//print_r($data);exit();
		$sdata = array();
		$sdata['message'] = "Voucher Information Updated";
		$this->session->set_userdata($sdata);
		redirect('Voucher_entry/printed_and_approved_vouchers');
        
	
	
}
/*
all ready approved update
*/


public function print_voucher($voucher_no){
			$print_update=$this->Voucher_entry_model->update_print($voucher_no);
			$data['voucher_infos']=$this->Voucher_entry_model->retrieve_pending_voucher_info($voucher_no);	
			 $data['maincontent'] = $this->load->view('voucher_entry/print', $data, true);
			 $this->load->view('voucher_entry/print', $data);
			  //$this->load->view('master', $data);

		}

public function batchprint(){


		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('voucher_entry/batchprint', $data, true);
		
         $this->load->view('master', $data);



}

public function queue(){
//echo "<pre>";print_r($_POST);exit();
 		$data = array();
 		$from=$this->input->post('from',true);
 		$to=$this->input->post('to',true);
 		$data['from']=$from;
 		$data['to']=$to;
        $data['title']="2RA Technology Limited";
        $data['keyword']="";
        $data['description']="";
		$data['voucher_informations']=$this->Voucher_entry_model->retrieve_vouchers_info_for_batch_print($from,$to);
		 //echo "<pre>";print_r($data['voucher_informations']);exit();

         $data['maincontent'] = $this->load->view('voucher_entry/queue', $data, true);
		
          $this->load->view('voucher_entry/queue', $data);


}

public function printed_vouchers(){



 		$data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id=$this->session->userdata('company_id');
		  $data['voucher_infos']=$this->Voucher_entry_model->retrieve_printed_voucher_info($company_id);
         $data['maincontent'] = $this->load->view('voucher_entry/printed_vouchers', $data, true);
		
         $this->load->view('master', $data);

}

public function printed_and_approved_vouchers(){



 		$data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $company_id=$this->session->userdata('company_id');
		  $data['voucher_infos']=$this->Voucher_entry_model->retrieve_printed_and_approved_voucher_info($company_id);
         $data['maincontent'] = $this->load->view('voucher_entry/printed_and_approved_vouchers', $data, true);
		
         $this->load->view('master', $data);

}

	public function pick_project_codes_expenses()
	{
		// echo '<pre>';
		// print_r($_POST);
		// exit();
		 $data = array();
		 $voucher_no = $this->input->post('voucher_no', $data, true); 
		 $voucher_info=$this->Voucher_entry_model->expense_voucher_info_for_expenses($voucher_no);

		 //print_r($voucher_info);exit();
	
		 $project_id=$voucher_info->project_id;
	

		 echo $project_id;
        
	}
	public function pick_latest_voucher_no(){

		$company_id=$this->session->userdata('company_id');
		$ex_date=$this->input->post('date',true);
			$newDate = date("Ym", strtotime($ex_date));
    	$final="VN".$newDate;
    	$retrive_voucher_no=$this->Voucher_entry_model->pick_latest_voucher_no($final,$company_id);

    	foreach ($retrive_voucher_no as $voucher_no) {
    		
    	}

    	$number=$voucher_no->lastid;


    	if ($number==NULL) {
    		$number="001";
    	}else{

    		$convert_last_id = (int)$number;
			$length = strlen((string)$convert_last_id);
			if($length == 1){
				//$number= "00".(string)($convert_last_id+1);
				$number= $convert_last_id+1;
				 if($number == 10) {
				 	$number = "0".(string)($number);
				 }
				 else{
				 	$number = "00".(string)($number);
				 }
			}
			else if($length == 2){
			 	$number= $convert_last_id+1;
				 if($number == 100) {
				 	$number = (string)($number);
				 }
				 else{
				 	$number = "0".(string)($number);
				 }
			}
			else {
				$number = $convert_last_id + 1;
			}

    		//$numbers=$number+1;
    	}

    	$value=$final.$number;
    	echo $value;

		

	}


	public function approve_summary_voucher(){

			//print_r($_POST);exit();
		$voucher_no=$this->input->post('voucher_no',true);
			$data['is_approved']=1;
			$data['approved_by']=$this->session->userdata('user_id');
         
         	$data['company_id']=$this->session->userdata('company_id');
         	$data['approved_date']=date("y-m-d h:i:s");

         	$con_approval=$this->Voucher_entry_model-> update_approved_voucher_info($data,$voucher_no);

         	$sdata['message']='Voucher Approved Successfully';
          	$this->session->set_userdata($sdata);

		
	}
}