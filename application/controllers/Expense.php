<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$id=$this->session->userdata('id');
		if($id ==NULL)
		{
			redirect('Login','refresh');
		}
		$this->load->model('Expense_model');
		$this->load->model('Voucher_entry_model');
		$this->load->model('Customer_model');
		$this->load->model('Account_information_model');
		$this->load->model('Employee_model');
		$this->load->model('Project_tracking_model');
		$this->load->model('Cheque_book_model');


	}


	public function index()
	{
		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";

		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['all_voucher']=$this->Voucher_entry_model->all_voucher_info();
		$data['all_expense_types']=$this->Expense_model->select_expense_type_info();
		$data['bank_name']=$this->Account_information_model->select_all_account_information_list_for_cheque_book();
		$company_id = $this->session->userdata('company_id');
		$data['expense_ids']=$this->Expense_model->pick_latest_expense_number($company_id);


		$company_id = $this->session->userdata('company_id');
		$data['approved_no']=$this->Expense_model->pick_latest_approved_number($company_id);
		$data['supplier_info']=$this->Voucher_entry_model->select_supplier_info($company_id);
		
		$data['employee_list']=$this->Expense_model->select_all_employee_list($company_id);
		$data['expense_infos']=$this->Expense_model->expense_info_for_list();
		$data['all_customers']=$this->Customer_model->select_all_customer_list();

		
		$data['maincontent'] = $this->load->view('expense/enter_expense_form', $data, true);
		
		$this->load->view('master', $data);

	}
	
	public function save_expense() {
		
		 
		 
		 
		$data = array();

		$company_id = $this->session->userdata('company_id');
		$date=$this->input->post('expense_date',true);

		$newDate = date("Ym", strtotime($date));
		$final="EX".$newDate;
		$company_id = $this->session->userdata('company_id');  
		$pick_expense_no=$this->Expense_model->pick_expense_no($final,$company_id);



		foreach ($pick_expense_no as $expense_no) {

		}

		$number=$expense_no->expense_id;
		if ($number=="") {
			$numbers=101;
		}else{

			$numbers=$number+1;
		}

		$value=$final.$numbers;

		$voucher_no=$this->input->post('voucher_no', true);
		$update_is_expensed=$this->Expense_model->update_is_expensed($company_id,$voucher_no);

		$data['description'] = $this->input->post('description', true);
		$data['expense_id'] = $value;
		$data['company_id'] = $this->session->userdata('company_id');
		$expense_id = $this->input->post('expense_code', true);
		$data['expense_type'] = $this->input->post('expense_type', true);
		$data['voucher_no'] = $this->input->post('voucher_no', true);
		$expense_amount = $this->input->post('amount', true);
		$data['expense_amount'] =round($expense_amount, 2);
		$data['pay_type'] = $this->input->post('pay_type', true);
		$pay_type = $this->input->post('pay_type', true);
		$data['entry_date'] = date('Y-m-d H:i:s');
		$data['expense_date'] = $this->input->post('expense_date', true);
       
		$data['cheque_bank'] = $this->input->post('credit_account', true);
		$account_no = $this->input->post('credit_account', true);
		$data['is_support'] = $this->input->post('type', true);
		$data['cheque_no'] = $this->input->post('cheque_no', true);
		$cheque_no = $this->input->post('cheque_no', true);
        
		$data['project_id'] = $this->input->post('project_code', true);
		$data['project_name'] = $this->input->post('project_name', true);
		$data['is_approved'] = 0;
		$data['expense_by'] = $this->input->post('expensed_by', true);
		$data['entry_by'] = $this->session->userdata('user_name');
		$data['supplier_id'] = $this->input->post('supplier_name', true);

		if ($pay_type=='Cheque') {
			$update_cheque_pages=$this->Cheque_book_model->update_cheque_pages($company_id,$account_no,$cheque_no,$value);
		}
		
		
		
		$check_expense_id=$this->Expense_model->check_expense_id($expense_id);

		
		if($check_expense_id){
			
			echo "Expense ID Exits";
		}
		else{

		
			$confirm=$this->Expense_model->save_expense($data);
			//print_r($confirm);exit();
			echo "Expense Added Successfully";
		}

	}
	
	public function add_expense_type()
	{
		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";
		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['maincontent'] = $this->load->view('expense/add_expense_type', $data, true);
		$this->load->view('master', $data);

	}		
	
	public function expense_types()
	{
		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";

		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['expense_type']=$this->Expense_model->select_expense_type_info();
		$data['maincontent'] = $this->load->view('expense/expense_type_list', $data, true);
		
		$this->load->view('master', $data);

	}	
	
	public function save_expense_types() {
		$data = array();

		$data['expense_type'] = $this->input->post('expense_type', true);

		$data['recording_time'] = date("y-m-d h:i:s");
		$data['recorded_by'] = $this->session->userdata('id');
		
		$expense_type = $this->input->post('expense_type', true);
		
		$check_expense_type=$this->Expense_model->check_expense_type($expense_type);

		if($check_expense_type){
			echo "This Expense Type Already Exits";
		}
		else{
			$this->Expense_model->save_expense_types($data);
			echo "Expense Type added Successfully";
		}

		


	}	 
	
	
	
	public function expense_list()
	{
		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";

		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['expense_infos']=$this->Expense_model->expense_info_for_list();
		$data['maincontent'] = $this->load->view('expense/show_expense_list', $data, true);
		
		$this->load->view('master', $data);

	}
	
	public function edit_expense_type($id)
	{
		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";

		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['bank_name']=$this->Account_information_model->select_all_account_information_list_for_cheque_book();
		$company_id = $this->session->userdata('company_id');
		$data['supplier_info']=$this->Voucher_entry_model->select_supplier_info($company_id);
		$data['all_customers']=$this->Customer_model->select_all_customer_list();
		$data['view_each_expense_types']=$this->Expense_model->select_each_expense_type($id);
		$data['maincontent'] = $this->load->view('expense/edit_expense_type', $data, true);
		
		$this->load->view('master', $data);

	}
	
	public function update_expense_type() {
		$data = array();

		$data['expense_type'] = $this->input->post('expense_type', true);
		$id = $this->input->post('id', true);

		$data['updating_time'] = date("y-m-d h:i:s");
		$data['updated_by'] = $this->session->userdata('id');
		
		$expense_type = $this->input->post('expense_type', true);
		
		$check_expense_type=$this->Expense_model->check_expense_type($expense_type);

		if($check_expense_type){
			echo "This Expense Type Already Exits";
		}
		else{
			$this->Expense_model->update_expense_type($data,$id);
			echo "Expense Type Updated Successfully";
		}

	}
	
	public function delete_expense_type($id)
	{
		$this->Expense_model->delete_expense_type_info($id);
		redirect('Expense/expense_types');
		$sdata['message']='Expense Type Deleted';
		$this->session->set_userdata($sdata);
	}
	
	
	public function pick_account_no(){




		$bank_name = $this->input->post('bank_name', true);
		$account_number_list=$this->Expense_model->pick_account_no($bank_name);


		if ($account_number_list) {
			$return_html = '<option value="select">Select</option>';
			foreach($account_number_list as $account_no)
			{

				$return_html = $return_html.'<option value = "'.$account_no->account_no.'">'.$account_no->account_no.'</option>';
			}

			echo $return_html;

		}else{

			echo "No Account in ".$bank_name;
		}




	}  


public function expense_list_for_approval(){
		$data = array();
		$data['title']="2RA Technology Limited";
		$data['keyword']="";
		$data['description']="";
		$company_id = $this->session->userdata('company_id');
		$data['menu'] = $this->load->view('menu', $data, true);
		$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		$data['expense_infos']=$this->Expense_model->expense_info_for_list();

		$data['bank_infos']=$this->Account_information_model->retrieve_account_info($company_id);

	
		$data['maincontent'] = $this->load->view('expense/test_expense_list', $data, true);
		
		$this->load->view('master', $data);

	}

	public function approve_expense($id){


		$data=array();
		$company_id = $this->session->userdata('company_id');

		$expense_amount=$this->Expense_model->retrieve_expense_amount($company_id,$id);

		$account_no=$expense_amount->cheque_bank;
		$amount=(float)$expense_amount->expense_amount;
		$retive_account_amount=$this->Expense_model->retive_account_amount($company_id,$account_no);

		$account_balance=(float)$retive_account_amount->balance;
		$final_balance=(float)$account_balance-$amount;

		$update_balance=$this->Expense_model->update_balance($company_id,$account_no,$final_balance);



		$approved_no=$this->Expense_model->pick_latest_approved_number($company_id);
		foreach ($approved_no as  $approved_nos) {

		}

		if ($approved_nos->approved_id=="") {
			$approved_number=date('Ym').'10001';

		}else{
			$approved_nos=$approved_nos->approved_id+1;
			$approved_number=date('Ym').$approved_nos;
		}


		$data['approved_id']=$approved_number;

		$data['is_approved']=1;
		$data['approved_by']=$this->session->userdata('user_name');
		$data['approved_date']=date("y-m-d H:i:s");
		$confirm=$this->Expense_model->approve_expense($id,$data);

		if ($confirm) { ?>

		<script>
			alert('Expense Approved Successfully');


			window.location.assign('../expense_list_for_approval');
		</script>

		
		<?php 



	}
}

public function approved_expenses_list(){
	$data = array();
	$data['title']="2RA Technology Limited";
	$data['keyword']="";
	$data['description']="";

	$data['menu'] = $this->load->view('menu', $data, true);
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	$data['expense_infos']=$this->Expense_model->approved_expense_info_for_list();

		
	$data['maincontent'] = $this->load->view('expense/approved_expense_list', $data, true);

	$this->load->view('master', $data);

}

public function pick_cheque_no(){



	$account_no=$this->input->post('credit_account',true);

	$cheque_nos	=$this->Expense_model->retrieve_cheque_no($account_no);


	foreach ($cheque_nos as  $cheque_no) {

	}
	
	$cheque=$cheque_no->cheque_starting_no;
	print_r($cheque);
}

public function edit_expense($id){


	$data = array();
	$data['title']="2RA Technology Limited";
	$data['keyword']="";
	$data['description']="";

	$data['menu'] = $this->load->view('menu', $data, true);
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	$data['expense_infos']=$this->Expense_model->retrieve_expense_data($id);
	$expense_infoss=$data['expense_infos'];
	
	$data['all_voucher']=$this->Voucher_entry_model->all_voucher_info();
	$data['all_expense_types']=$this->Expense_model->select_expense_type_info();
	$data['bank_name']=$this->Account_information_model->select_all_account_information_list_for_cheque_book();
	$company_id = $this->session->userdata('company_id');
	$data['expense_ids']=$this->Expense_model->pick_latest_expense_number($company_id);
	foreach ($expense_infoss as $expense_infos) {

	}

	$expense_project_id=$expense_infos->project_id;
	$customers_names= $customer_name=$this->Expense_model->retrieve_customer_name($expense_project_id);
	foreach ($customers_names as $customer_names) {

	}
	$customer_name=$customer_names->customer_name;

	$data['expense_project_id']=$expense_project_id;
	$data['customer_name']=$customer_name;
	$projects_list=$this->Project_tracking_model->select_all_project_by_customer_name($customer_name);
	$data['projects_list']=$projects_list;
	
	$company_id=$this->session->userdata('company_id');
	$data['employee_list']=$this->Expense_model->select_all_employee_list($company_id);

	$data['all_customers']=$this->Customer_model->select_all_customer_list();


	
	$data['supplier_info']=$this->Voucher_entry_model->select_supplier_info($company_id);
	$data['maincontent'] = $this->load->view('expense/edit_expense', $data, true);

	$this->load->view('master', $data);



}

public function view_expense_details($id){

	$data=array();
	$data['title']="2RA Technology Limited";
	$data['keyword']="";
	$data['description']="";

	$data['menu'] = $this->load->view('menu', $data, true);
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	$expense_infos=$this->Expense_model->retrieve_expense_data($id);
	foreach ($expense_infos as $expense_info) {

	}
	$data['expense_infos']=$this->Expense_model->retrieve_expense_data($id);
	$project_id=$expense_info->project_id;
	$company_id = $this->session->userdata('company_id');
	$data['approved_no']=$this->Expense_model->pick_latest_approved_number($company_id);
	$customer_name=$this->Expense_model->retrieve_customer_name($project_id);
	foreach ($customer_name as $customer) {

	}
	$company_id = $this->session->userdata('company_id');
	$data['employee_list']=$this->Expense_model->select_all_employee_list($company_id);
	$data['customer_name']=$customer->customer_name;
	$data['maincontent'] = $this->load->view('expense/view_expense_details', $data, true);
	$this->load->view('master', $data);

}

public function update_expense() {


	$data = array();

	$company_id = $this->session->userdata('company_id');  


	$data['description'] = $this->input->post('description', true);
	$data['expense_id'] =  $this->input->post('expense_code', true);
	$expense_id=$data['expense_id'];
	$data['company_id'] = $this->session->userdata('company_id');
	$expense_id = $this->input->post('expense_code', true);
	$data['expense_type'] = $this->input->post('expense_type', true);
		
	$expense_amount=$this->input->post('amount', true);
	$data['expense_amount'] = round($expense_amount, 2);
	$data['pay_type'] = $this->input->post('pay_type', true);
	$data['updated_at'] = date('Y-m-d H:i:s');
	$data['expense_date'] = $this->input->post('expense_date', true);
       
	$data['cheque_bank'] = $this->input->post('credit_account', true);
	$data['is_support'] = $this->input->post('type', true);
       
	$data['project_id'] = $this->input->post('project_code', true);
	$data['project_name'] = $this->input->post('project_name', true);
	$data['is_approved'] = 0;
	$data['expense_by'] = $this->input->post('expensed_by', true);
	$data['supplier_id'] = $this->input->post('supplier_name', true);


	


	$confirm=$this->Expense_model->update_expense($company_id,$expense_id,$data);

	echo "Expense Updated Successfully";
	

}

public function delete_expense($id){

	$data=array();
	$data['deleted_at']=date('Y-m-d H:i:s');
    	
	$company_id = $this->session->userdata('company_id');
	$confirm_delete=$this->Expense_model->delete_expense($company_id,$id,$data);

	if ($confirm_delete){ ?>

	<script>alert("Expense Deleted Successfully")</script>
	<?php }

}

public function pick_latest_expense_no(){

	$date=$this->input->post('expense_date',true);

	$newDate = date("Ym", strtotime($date));
	$final="EX".$newDate;
	$company_id = $this->session->userdata('company_id');  
	$pick_expense_no=$this->Expense_model->pick_expense_no($final,$company_id);

    	

	foreach ($pick_expense_no as $expense_no) {

	}

	$number=$expense_no->expense_id;
	if ($number=="") {
		$numbers=101;
	}else{

		$numbers=$number+1;
	}

	$value=$final.$numbers;
	echo $value;


}

public function expense_report(){

	$data = array();
	$data['title']="2RA Technology Limited";
	$data['keyword']="";
	$data['description']="";
	$company_id = $this->session->userdata('company_id');  
	$data['menu'] = $this->load->view('menu', $data, true);
	$data['project_data']=$this->Expense_model->retrieve_project_data($company_id);
	$data['expense_tpes']=$this->Expense_model->select_expense_type_info();
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	$data['maincontent'] = $this->load->view('expense/expense_report', $data, true);

	$this->load->view('master', $data);


}

public function show_expense_report(){



	$data=array();
	$retrieved_datas=array();
	$retrieved_info=array();
    	
	$type=$this->input->post('type',true);
	$from_date=$this->input->post('from_date',true);
	$to_date=$this->input->post('to_date',true);
	$chk_to_date=$this->input->post('chk_to_date',true);
	$project=$this->input->post('project',true);
	$expense_type=$this->input->post('expense_type',true);
	$status=$this->input->post('status',true);
	$company_id = $this->session->userdata('company_id');  
	$retrieved_data=$this->Expense_model->expense_data_for_report($from_date,$to_date,$chk_to_date,$project,$expense_type,$status,$company_id,$type);

    	


	foreach ($retrieved_data as  $value) {

		$expense_by= $value->expense_by;
		$name=$this->Expense_model->retrieve_expensed_by_name($expense_by);
    	
		foreach ($name as $name_value) {

		}
		$retrieved_datas['expense_id']=$value->expense_id;
		$retrieved_datas['expense_type']=$value->expense_type;
		$retrieved_datas['approved_id']=$value->approved_id;
		$retrieved_datas['approved_by']=$value->approved_by;
		$retrieved_datas['voucher_no']=$value->voucher_no;
		$retrieved_datas['project_id']=$value->project_id;
		$retrieved_datas['expense_date']=$value->expense_date;
		$retrieved_datas['is_support']=$value->is_support;
		$retrieved_datas['expense_amount']=$value->expense_amount;



		if ($name!=="") {
			$retrieved_datas['expense_by']=$name_value->first_name." ".$name_value->last_name ;	
		}else{

			$retrieved_datas['expense_by']=$value->expense_id;	

		}

		array_push($retrieved_info, $retrieved_datas);

	}


    	
	$data['project']=$this->input->post('project',true);
	$data['status']=$this->input->post('status',true);
	$data['expense_types']=$this->input->post('expense_type',true);
	$data['from_date']=$from_date;
	$data['to_date']=$to_date;
	$data['retrieved_data']= json_decode (json_encode ($retrieved_info), FALSE); 
	$data['title']="2RA Technology Limited";

	$this->load->view('expense/show_expense_report', $data);
}

public function pick_account_details(){

	$account_name=$this->input->post('pay_type',true);
	$account_name='Cash Account';
	$company_id = $this->session->userdata('company_id');  
	$cash_account_info=$this->Account_information_model->retrieve_cash_account_data($company_id,$account_name);

	$cash_account_name=$cash_account_info->account_no;
	$cash_account_balance=$cash_account_info->balance;


	echo "<option value=\"$cash_account_name \" >".$cash_account_name."</option>".'#'.$cash_account_balance;

}


public function pick_summary(){

	$expense_id=$this->input->post('expense_id',true);

		
	$company_id = $this->session->userdata('company_id');  
	$summary_data=$this->Expense_model->retrive_summary_data($expense_id,$company_id);
	$expense_date=$summary_data->expense_date;
	$expense_amount=$summary_data->expense_amount;
	$expense_by=$summary_data->expense_by;
	$id=$summary_data->id;
	$expensed_by=$this->Expense_model->retrieve_expensed_by_name($expense_by);
	foreach ($expensed_by as $expense_by) {
		$name=$expense_by->first_name.' '.$expense_by->last_name;
	}
	$is_support=$summary_data->is_support;
	if ($is_support=='1') {
		$type='Support';
	}else{
		$type='Project';
	}

	$expense_type=$summary_data->expense_type;
	$project_name=$summary_data->project_name;

	$approved_no=$this->Expense_model->pick_latest_approved_number($company_id);
	foreach ($approved_no as  $approved_nos) {
		
	}

	if ($approved_nos->approved_id=="") {
		$approved_number=date('Ym').'10001';

	}else{
		$approved_nos=$approved_nos->approved_id+1;
		$approved_number=date('Ym').$approved_nos;
	}

	
	$approved_id=$approved_number;

	echo $name.'#'.$expense_date.'#'.$expense_id.'#'.$expense_amount.'#'.$type.'#'.$approved_id.'#'.$project_name.'#'.$expense_type.'#'.$id;

}


public function approve_summary_exepense(){
	$company_id = $this->session->userdata('company_id');
	$id=$this->input->post('original_id',true);

	//$id=592;
	$expense_amount=$this->Expense_model->retrieve_expense_amount($company_id,$id);

	$account_no=$expense_amount->cheque_bank;
	$amount=(float)$expense_amount->expense_amount;
	$retive_account_amount=$this->Expense_model->retive_account_amount($company_id,$account_no);
	$pay_type=$expense_amount->pay_type;
	$employee_id=$expense_amount->expense_by;
	$supplier_id=$expense_amount->supplier_id;

	//echo $employee_id;exit();

if ($pay_type=='CreditEmp') {

	 $retrieve_employee_balance=$this->Employee_model->each_employee_info($company_id,$employee_id);

    $current_balance=$retrieve_employee_balance->employee_due;
    $new_balance=$current_balance+$amount;
  $update_balance=$this->Employee_model->update_employee_balance($company_id,$new_balance,$employee_id);


  $data=array();	

		$approved_no=$this->Expense_model->pick_latest_approved_number($company_id);
		foreach ($approved_no as  $approved_nos) {

		}

		if ($approved_nos->approved_id=="") {
			$approved_number=date('Ym').'10001';

		}else{
			$approved_nos=$approved_nos->approved_id+1;
			$approved_number=date('Ym').$approved_nos;
		}


		$data['approved_id']=$approved_number;
		$data['is_approved']=1;
		$data['approved_by']=$this->session->userdata('user_name');
		$data['approved_date']=date("y-m-d H:i:s");
		$confirm=$this->Expense_model->approve_expense($id,$data);
		if ($confirm) {
			$sdata['message']='Expense Approved Successfully';
			$this->session->set_userdata($sdata);
		
		}else{
			$sdata['message']='Something Went Wrong';
			$this->session->set_userdata($sdata);
		
		}



}else if ($pay_type=='CreditSupp') {

	$retrieve_supplier_balance=$this->Account_information_model->each_supplier_info($company_id,$supplier_id);



    $current_balance=$retrieve_supplier_balance->supplier_due;
    $new_balance=$current_balance+$amount;
$update_balance=$this->Account_information_model->update_supplier_balance($company_id,$new_balance,$supplier_id);


	
	$data=array();	

		$approved_no=$this->Expense_model->pick_latest_approved_number($company_id);
		foreach ($approved_no as  $approved_nos) {

		}

		if ($approved_nos->approved_id=="") {
			$approved_number=date('Ym').'10001';

		}else{
			$approved_nos=$approved_nos->approved_id+1;
			$approved_number=date('Ym').$approved_nos;
		}


		$data['approved_id']=$approved_number;
		$data['is_approved']=1;
		$data['approved_by']=$this->session->userdata('user_name');
		$data['approved_date']=date("y-m-d H:i:s");
		$confirm=$this->Expense_model->approve_expense($id,$data);
		if ($confirm) {
			$sdata['message']='Expense Approved Successfully';
			$this->session->set_userdata($sdata);
		
		}else{
			$sdata['message']='Something Went Wrong';
			$this->session->set_userdata($sdata);
		
		}


}else{
	

	if ($retive_account_amount=="") {
		$sdata['message']='No Account  Information Available! Please Update Before Approval!';
		$this->session->set_userdata($sdata);
		exit();
	}
	$account_balance=$retive_account_amount->balance;
	$final_balance=$account_balance-$amount;



	if ($final_balance>=0) {


		$update_balance=$this->Expense_model->update_balance($company_id,$account_no,$final_balance);
		$data=array();	

		$approved_no=$this->Expense_model->pick_latest_approved_number($company_id);
		foreach ($approved_no as  $approved_nos) {

		}

		if ($approved_nos->approved_id=="") {
			$approved_number=date('Ym').'10001';

		}else{
			$approved_nos=$approved_nos->approved_id+1;
			$approved_number=date('Ym').$approved_nos;
		}


		$data['approved_id']=$approved_number;
		$data['is_approved']=1;
		$data['approved_by']=$this->session->userdata('user_name');
		$data['approved_date']=date("y-m-d H:i:s");
		$confirm=$this->Expense_model->approve_expense($id,$data);
		if ($confirm) {
			$sdata['message']='Expense Approved Successfully';
			$this->session->set_userdata($sdata);
		
		}else{
			$sdata['message']='Something Went Wrong';
			$this->session->set_userdata($sdata);
		
		}


	}else{

		$sdata['message']='Insufficient Balance';
		$this->session->set_userdata($sdata);
	}
		}
}

function reload_voucher_select() {

	$voucher_no = $this->input->post('voucher_no');

	$voucher_info = $this->Expense_model->reload_voucher_select($voucher_no);

	$amount = 0;
	$con = mysqli_connect("localhost", "root", "", "test_easy_accounts"); 
	$query = "SELECT `amount` FROM voucher_info WHERE voucher_no = '$voucher_info->voucher_no'";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result) > 0) {
		$amount = 0;
		while($row = mysqli_fetch_assoc($result)) {
			$amount = $amount + $row['amount'];
		}
	}

	///print_r($voucher_info);exit();
		 $expense_type=$voucher_info->expense_type;
		 $amount=$amount;
		 $date=$voucher_info->date;
		 $customer_name=$voucher_info->customer_name;
		 $project_name=$voucher_info->project_name;
		 $project_id=$voucher_info->project_id;
		 $employee_id=$voucher_info->employee_id;
		 $entry_date=$voucher_info->entry_date;
		 // $printed=$voucher_info->is_printed;
		 $entry_dates = date('Y-m-d', strtotime($entry_date));
		 // $is_support=$voucher_info->is_support;
		 $description=$voucher_info->description;
		 //print_r($voucher_info); exit();
		 echo $expense_type."#".$amount."#".$date."#".$customer_name."#".$project_id."#".$project_name."#".$employee_id."#".$entry_dates."#".$description;
}


public function search_expense()
{
	$connect = mysqli_connect("localhost", "root", "", "test_easy_accounts");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM expense_info 
	WHERE expense_id LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM expense_info ORDER BY expense_id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= 'Search Result';
	$output .= '
	<div class="table-response">
	<table class="table table-bordered">
		<tr>
			<th>voucher_no</th>
			<th>expense_id</th>
			<th>project_name</th>
			<th>pay_type</th>
		</tr>';

	while($row = mysqli_fetch_array($result))
	{
		$output .='
		<tr>
			<td>'.$row['voucher_no'].'</td>
			<td>'.$row['expense_id'].'</td>
			<td>'.$row['project_name'].'</td>
			<td>'.$row['pay_type'].'</td>
		</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}

}

// search to
public function search_expense_to()
{
	$connect = mysqli_connect("localhost", "root", "", "test_easy_accounts");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$where = "expense_id LIKE '%$search%'";
	$query = "
	SELECT * FROM `expense_info`
	WHERE $where AND `is_approved`=0 ORDER BY `expense_id` DESC ";

	/**$query = "
	SELECT * FROM `expense_info`
	WHERE `expense_id` LIKE '%".$search."%' ";
	*/

}
else
{
	$query = "
	SELECT * FROM `expense_info` WHERE `is_approved`=0 ORDER BY `expense_id` DESC";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$sl = 0;
	$output .= '
	<table class="table table-bordered">
		<thead>
        <tr style="background:gray;color:#FFF">
            <th align="center" style="width: 20px;">SL#</th>
            <th align="center">Expense ID</th>
            <th align="center">Project Code</th>
            <th align="center">Pay Type</th>
            
            <th align="center">Expense Date</th>
            <th align="center">Expensed By</th>
            <th align="center">Expense Amount</th>
            <th align="center" style="max-width:40px;">View/Edit</th>
            <th align="center">Action</th>
        </tr>
        </thead>
        <tbody>
        ';

	while($row = mysqli_fetch_array($result))
	{
		$sl++;
		$output .='
		<tr>                    
            <td style="width: 20px;" >'.$sl.'</td>
            <td id="expense_id" >'.$row['expense_id'].'</td>
            <td>'.$row['project_id'].'</td>
            <td>'.$row['pay_type'].'</td>
         
            <td>'.$row['expense_date'].'</td>
            <td style="max-width:40px;">'.$row['expense_by'].'</td>
              <td>'.$row['expense_amount'].'</td>
            <td>
                <a href="'.base_url().'Expense/view_expense_details/'.$row['id'].'">Details | </a> 

                     <a href="'.base_url().'Expense/edit_expense/'.$row['id'].'">Edit</a>
                
                </td>

                 <td id="approve_btn">
                 <a class="btn btn-primary approve_btn"  value="'.$row['id'].'">Approve</a></td>
            

        </tr>

		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}

}


}
