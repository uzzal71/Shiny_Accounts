<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_information extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $id=$this->session->userdata('id');
    if($id ==NULL)
    {
        redirect('Login','refresh');
    }
    $this->load->model('Account_information_model');
    $this->load->model('Employee_model');
    $this->load->model('Voucher_entry_model');
    $this->load->model('Expense_model');
    $this->load->model('Cheque_book_model');
    $this->load->model('Company_model');
    
}


public function add_new_account_information()
{
 $data = array();
 $data['title']="2RA Technology Limited";
 $data['keyword']="";
 $data['description']="";
 
 $data['menu'] = $this->load->view('menu', $data, true);
 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
 $company_id = $this->session->userdata('company_id');
 $data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
 $data['maincontent'] = $this->load->view('account_information/create_new_account_information', $data, true);
 
 $this->load->view('master', $data);
 
}

public function save_new_account_information() {

  
    $data = array();
    
    $data['account_name'] = $this->input->post('account_name', true);
    $account_name = $data['account_name'];
    $data['account_no'] = $this->input->post('account_no', true);
    $account_no =  $data['account_no'] ;
    $data['emp_id'] = $this->input->post('emp_id', true);
    $data['bank_name'] = $this->input->post('bank_name', true);
    $data['branch'] = $this->input->post('branch', true);
    $data['balance'] = $this->input->post('balance', true);
    $data['address'] = $this->input->post('address', true);
    $data['bank_contact_no'] = $this->input->post('bank_contact_no', true);
    $data['opening_date'] = $this->input->post('opening_date', true);
    $data['introducer_name'] = $this->input->post('introducer_name', true);
    $data['recording_time'] = date("y-m-d h:i:s");
    $data['recorded_by'] = $this->session->userdata('id');
    $data['active']='1';
    $company_id = $this->session->userdata('company_id');
    $data['company_id'] = $this->session->userdata('company_id');
    $account_info = $this->Account_information_model->check_all_account_information_list($company_id,$account_name,$account_no);

    
    if($account_info)
    {
     $sdata['message'] = "Duplicate Account No Or Account Name";Exit();
     $this->session->set_userdata($sdata);
     redirect('Account_information/account_information_list');
 }
 else
 {
    $save_account_info = $this->Account_information_model->save_new_account_information($data);
    if($save_account_info)
    {
        $sdata['message'] = 'Account Info Saved Successfully';
        $this->session->set_userdata($sdata);
        redirect('Account_information/account_information_list');
    }
    else{
       $sdata['message'] ="Account Information Not Saved!";
       $this->session->set_userdata($sdata);
   }
   
}


}
public function account_information_list()
{
    $data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
    $data['menu'] = $this->load->view('menu', $data, true);
    $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
    $company_id = $this->session->userdata('company_id');
    $data['view_account_information_list']=$this->Account_information_model->select_all_account_information_list($company_id);
    $data['maincontent'] = $this->load->view('account_information/account_information_list', $data, true);
    
    $this->load->view('master', $data);
    
    
}


public function edit_account_info($id)
{
 $data = array();
 $data['title']="2RA Technology Limited";
 $data['keyword']="";
 $data['description']="";
 
 $data['menu'] = $this->load->view('menu', $data, true);
 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
 $company_id = $this->session->userdata('company_id');
 $data['each_account_info'] = $this->Account_information_model->select_each_account_info($company_id,$id);
 $data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
 $data['maincontent'] = $this->load->view('account_information/edit_each_user_information.php', $data, true);
 
 $this->load->view('master', $data);
 
}

public function update_account_information() {

    
    $data = array();
    $id = $this->input->post('id');
    
    $data['account_name'] = $this->input->post('account_name', true);
    $account_name = $data['account_name'];
    $data['account_no'] = $this->input->post('account_no', true);
    $account_no =  $data['account_no'] ;
    $data['emp_id'] = $this->input->post('emp_id', true);
    $data['bank_name'] = $this->input->post('bank_name', true);
    $data['branch'] = $this->input->post('branch', true);
    $data['address'] = $this->input->post('address', true);
    $data['bank_contact_no'] = $this->input->post('bank_contact_no', true);
    $data['opening_date'] = $this->input->post('opening_date', true);
    $data['introducer_name'] = $this->input->post('introducer_name', true);
    $data['recording_time'] = date("y-m-d h:i:s");
    $data['balance'] = $this->input->post('balance', true);
    $data['recorded_by'] = $this->session->userdata('id');
    $company_id = $this->session->userdata('company_id');


    $update_account_info = $this->Account_information_model->update_account_information($data,$id,$company_id);
    if($update_account_info)
    {       
        echo "Account Information Updated Successfully!";
        
    }
    else{
        echo "Account Information Not Updated!";
    }
    
}

public function delete_each_account_info($id){
    $company_id = $this->session->userdata('company_id');
    $deleted_account=$this->Account_information_model->insert_before_delete($id,$company_id);
   $delete_account= $this->Account_information_model->delete_account($id);
   $sdata = array();
   
   $sdata['message'] = 'Account Deleted Successfully';
   $this->session->set_userdata($sdata);
   redirect('Account_information/account_information_list');


}


public function view_account_info($id)
{
 $data = array();
 $data['title']="2RA Technology Limited";
 $data['keyword']="";
 $data['description']="";
 
 $data['menu'] = $this->load->view('menu', $data, true);
 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
 $company_id = $this->session->userdata('company_id');
 $data['each_account_info'] = $this->Account_information_model->select_each_account_info($company_id,$id);
 $data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
 $data['maincontent'] = $this->load->view('account_information/view_account_info.php', $data, true);
 
 $this->load->view('master', $data);
 
}


public function account_transfer()
{
 $data = array();
 $data['title']="2RA Technology Limited";
 $data['keyword']="";
 $data['description']="";
 
 $data['menu'] = $this->load->view('menu', $data, true);
 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
 $company_id = $this->session->userdata('company_id');
 $data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
 $data['accounts']=$this->Account_information_model->select_all_account_information_list($company_id);
 $data['maincontent'] = $this->load->view('account_information/account_transfer', $data, true);
 
 $this->load->view('master', $data);
 
}

public function retrieve_current_balance(){

    $account_no=$this->input->post('from_account',true);
    $company_id = $this->session->userdata('company_id');
    $balance=$this->Account_information_model->retrieve_balance($account_no,$company_id);
    echo $balance->balance;

}

public function save_account_transfer(){
    $data=array();
    
    $data['company_id']=$this->session->userdata('company_id');
    $data['requested_by']=$this->session->userdata('user_name');
    $data['requested_at']=date("y-m-d H:i:s");
    $data['from_account']=$this->input->post('from_account',true);
    $data['to_account']=$this->input->post('to_account',true);
    $data['requested_amount']=$this->input->post('amount',true);
    $data['remarks']=$this->input->post('remarks',true);
    $data['reference']=$this->input->post('reference',true);
    
    $data['is_approved']='0';
    
    $confirm=$this->Account_information_model->insert_into_account_transfer($data);

    
    if ($confirm) {
       $sdata['message']='Balance Transfer Saved for Approval';
       $this->session->set_userdata($sdata);
   }else{

    $sdata['message']='Something Went Wrong';
    $this->session->set_userdata($sdata);
}


}



public function approve_account_transfer(){

    $data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
    $data['menu'] = $this->load->view('menu', $data, true);
    $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
    $company_id = $this->session->userdata('company_id');
    $data['balance_transfer_list']=$this->Account_information_model->approve_account_transfer($company_id);

    
    $data['maincontent'] = $this->load->view('account_information/approve_account_transfer', $data, true);
    
    $this->load->view('master', $data);

}


public function approve_summary_transaction(){

    $company_id = $this->session->userdata('company_id');

    $from_account=$this->input->post('from_account',true);
    $app_amount=$this->input->post('app_amount',true);
    $to_account=$this->input->post('to_account',true);
    $reference=$this->input->post('reference',true);
    $id=$this->input->post('id',true);

    $balance=$this->Account_information_model->retrieve_balance($from_account,$company_id);


    $current_balance= $balance->balance;
    $updated_balance=$current_balance-$app_amount;

    $account_no=$from_account;

    $update_balance_of_from=$this->Account_information_model->update_balance($account_no,$updated_balance,$company_id);








    $tobalance=$this->Account_information_model->retrieve_balance($to_account,$company_id);


    $tcurrent_balance= $tobalance->balance;
    $added_updated_balance=$tcurrent_balance+$app_amount;




    $update_balance_of_to=$this->Account_information_model->update_balance($to_account,$added_updated_balance,$company_id);




    $data['approved_by']=$this->session->userdata('user_name');
    $data['approved_at']=date("y-m-d H:i:s");
    $data['is_approved']='1';
    $data['approved_amount']= $app_amount;

    $update_transaction_info=$this->Account_information_model->update_approved_amount($id,$company_id,$data);



    if ($update_transaction_info) {
       $sdata['message']='Balance Transfer Has Been Successfully Approved';
       $this->session->set_userdata($sdata);
   }

}


public function payment_entry(){

    $data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
    $data['menu'] = $this->load->view('menu', $data, true);
    $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
    $company_id = $this->session->userdata('company_id');
    $data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
    $data['all_supplier_list']=$this->Voucher_entry_model->select_supplier_info($company_id);

    $data['all_miscellaneous']=$this->Account_information_model->all_miscellaneous($company_id);

    
    $data['maincontent'] = $this->load->view('account_information/payment_entry', $data, true);
    
    $this->load->view('master', $data);

}

public function save_payment_entry(){

   

    $data=array();
    $company_id = $this->session->userdata('company_id');
    $data['credit_number']=$this->input->post('credit_number',true);
    $data['account_name']=$this->input->post('account_name',true);
    $data['account_no']=$this->input->post('account_no',true);
    $account_no=$this->input->post('account_no',true);
    $data['cheque_no']=$this->input->post('cheque_number',true);
    $cheque_no=$this->input->post('cheque_number',true);
    $data['payment_type']=$this->input->post('payment_type',true);
    $payment_type=$this->input->post('payment_type',true);
    $data['date']=$this->input->post('date',true);
    $data['debited_amount']=$this->input->post('debited_amount',true);
    $debited_amount=$this->input->post('debited_amount',true);
    $data['payment_method']=$this->input->post('payment_method',true);
    $payment_method=$this->input->post('payment_method',true);
    $data['paying_to']=$this->input->post('paying_to',true);
    $paying_to=$this->input->post('paying_to',true);
    $data['employee_id']=$this->input->post('employee_name',true);
    $employee_id=$this->input->post('employee_name',true);
    $data['supplier_id']=$this->input->post('supplier_name',true);
    $supplier_id=$this->input->post('supplier_name',true);
    $data['miscellaneous_id']=$this->input->post('miscellaneous',true);
    $miscellaneous_id=$this->input->post('miscellaneous',true);
    $data['remarks']=$this->input->post('remarks',true);
    $data['is_approved']=0;
    $data['created_by']=$this->session->userdata('user_name');
    $data['created_at']=date("y-m-d H:i:s");
    $data['company_id']=$company_id;
    

    if ($payment_method!=='cash') {
       $update_cheque_pages=$this->Cheque_book_model->update_cheque_pages($company_id,$account_no,$cheque_no);
   }




   $saved=$this->Account_information_model->insert_into_payment_history($data);

   
   if ($saved) {
       
       $sdata['message']='Payment Saved Successfully';
       $this->session->set_userdata($sdata);
   }else{
      
       $sdata['message']='Something Went Wrong';
       $this->session->set_userdata($sdata);
   }
   


}


public function payment_recipient_entry(){

   $data = array();
   $data['title']="2RA Technology Limited";
   $data['keyword']="";
   $data['description']="";
   
   $data['menu'] = $this->load->view('menu', $data, true);
   $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
   $company_id = $this->session->userdata('company_id');
   $data['recipient_no'] = $this->Account_information_model->latest_recipient_no($company_id);

   
   $data['maincontent'] = $this->load->view('account_information/payment_recipient_entry', $data, true);
   
   $this->load->view('master', $data); 
}

public function save_payment_recipient_entry(){


    
 $company_id = $this->session->userdata('company_id');
 $data = array();
 $recipient_no = $this->Account_information_model->latest_recipient_no($company_id);
 $last_id=$recipient_no->lastid;
 if ($last_id==0) {
    $recipient_id=100001;
} else{
    $recipient_id=$last_id+1;
}
$data['company_id']=$company_id;   
$data['recipient_id']='MRI'.date('Y').$recipient_id;;
$data['recipient_name']=$this->input->post('recipient_name',true);
$data['contact']=$this->input->post('contact',true);
$data['company_name']=$this->input->post('company_name',true);
$data['designation']=$this->input->post('designation',true);
$data['remarks']=$this->input->post('remarks',true);
$data['created_by']=$this->session->userdata('user_name');
$data['created_at']=date("y-m-d H:i:s");
$data['is_active']=1;

$saved=$this->Account_information_model->insert_into_payment_recipient($data);
if ($saved) {
    
   $sdata['message']="Recipient Saved Successfully";
   $this->session->set_userdata($sdata);
}else{
   $sdata['message']="Something Went Wrong";
   $this->session->set_userdata($sdata);
}


}


public function payment_recipient_list(){


    $data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
    
    $data['menu'] = $this->load->view('menu', $data, true);
    $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
    $company_id = $this->session->userdata('company_id');
    $data['recipient_list'] = $this->Account_information_model->all_miscellaneous($company_id);

    
    $data['maincontent'] = $this->load->view('account_information/payment_recipient_list', $data, true);
    
    $this->load->view('master', $data); 

}


public function payment_recipient_edit($id){


    $data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
    
    $data['menu'] = $this->load->view('menu', $data, true);
    $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
    $company_id = $this->session->userdata('company_id');
    $data['recipient_data'] = $this->Account_information_model->recipient_data_edit($company_id,$id);

    
    $data['maincontent'] = $this->load->view('account_information/payment_recipient_edit', $data, true);
    
    $this->load->view('master', $data); 


}



public function update_payment_recipient(){


  
  
  
    $data['recipient_id']=$this->input->post('recipient_id',true);
    $data['recipient_name']=$this->input->post('recipient_name',true);
    $data['contact']=$this->input->post('contact',true);
    $data['company_name']=$this->input->post('company_name',true);
    $data['designation']=$this->input->post('designation',true);
    $data['remarks']=$this->input->post('remarks',true);
    $data['edited_by']=$this->session->userdata('user_name');
    $data['edited_at']=date("y-m-d H:i:s");
    $data['is_active']=1;
    $id=$this->input->post('id',true);

    $saved=$this->Account_information_model->update_payment_recipient($data,$id);
    if ($saved) {
        
       $sdata['message']="Recipient Updated Successfully";
       $this->session->set_userdata($sdata);
   }else{
       $sdata['message']="Something Went Wrong";
       $this->session->set_userdata($sdata);
   }


}



public function payment_recipient_view($id){


    $data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
    
    $data['menu'] = $this->load->view('menu', $data, true);
    $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
    $company_id = $this->session->userdata('company_id');
    $data['recipient_data'] = $this->Account_information_model->recipient_data_edit($company_id,$id);

    
    $data['maincontent'] = $this->load->view('account_information/payment_recipient_view', $data, true);
    
    $this->load->view('master', $data); 


}


public function pending_account_transfer_list(){



   $data = array();
   $data['title']="2RA Technology Limited";
   $data['keyword']="";
   $data['description']="";
   $data['menu'] = $this->load->view('menu', $data, true);
   $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
   $company_id = $this->session->userdata('company_id');
   $data['balance_transfer_list']=$this->Account_information_model->approve_account_transfer($company_id);

   
   $data['maincontent'] = $this->load->view('account_information/pending_account_transfer_list', $data, true);
   
   $this->load->view('master', $data);



}



public function edit_account_transfer($id){


    $data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
    $data['menu'] = $this->load->view('menu', $data, true);
    $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
    $company_id = $this->session->userdata('company_id');
    $data['balance_transfer_list']=$this->Account_information_model->approve_account_transfer($company_id);
    $data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
    $data['accounts']=$this->Account_information_model->select_all_account_information_list($company_id);
    $data['balance_transfer_data']=$this->Account_information_model->balance_transfer_data($company_id,$id);
    $data['maincontent'] = $this->load->view('account_information/edit_account_transfer', $data, true);
    
    $this->load->view('master', $data);


}

public function update_account_transfer(){
  $data['company_id']=$this->session->userdata('company_id');
  $data['edited_by']=$this->session->userdata('user_name');
  $data['edited_at']=date("y-m-d H:i:s");
  $data['from_account']=$this->input->post('from_account',true);
  $data['to_account']=$this->input->post('to_account',true);
  $data['requested_amount']=$this->input->post('amount',true);
  $data['remarks']=$this->input->post('remarks',true);
  $data['reference']=$this->input->post('reference',true);
  $id= $this->input->post('id',true);
  $data['is_approved']='0';
  
  $confirm=$this->Account_information_model->update_account_transfer($data,$id);

  
  if ($confirm) {
   $sdata['message']='Account Transfer Updated Successfully';
   $this->session->set_userdata($sdata);
}else{

    $sdata['message']='Something Went Wrong';
    $this->session->set_userdata($sdata);
}
}

public function view_account_transfer($id){


    $data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
    $data['menu'] = $this->load->view('menu', $data, true);
    $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
    $company_id = $this->session->userdata('company_id');
    $data['balance_transfer_list']=$this->Account_information_model->approve_account_transfer($company_id);
    $data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
    $data['accounts']=$this->Account_information_model->select_all_account_information_list($company_id);
    $data['balance_transfer_data']=$this->Account_information_model->balance_transfer_data($company_id,$id);
    $data['maincontent'] = $this->load->view('account_information/view_account_transfer', $data, true);
    
    $this->load->view('master', $data);


}


public function pick_bank_accounts(){
    $payment_method=$this->input->post('payment_method',true);
    $company_id = $this->session->userdata('company_id');
    if ($payment_method=='cheque') {
       

       $retrieve_accounts=$this->Account_information_model->select_all_account_information_list($company_id);




       if($retrieve_accounts)
       {
        $return_html = '<option value="select">Select</option>';
        foreach($retrieve_accounts as $accounts)
        {
            
            $return_html = $return_html.'<option value = "'.$accounts->account_no.'">'.$accounts->account_name.'</option>';
        }
        
        echo $return_html;
    }


    else
    {
        echo "No Account Info Found!";
    }
    


}




}


public function payment_approval_list(){


 $data = array();
 $data['title']="2RA Technology Limited";
 $data['keyword']="";
 $data['description']="";
 $data['menu'] = $this->load->view('menu', $data, true);
 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
 
 $data['payment_approval_list']=$this->Account_information_model->select_all_payment_history();

 
 $data['maincontent'] = $this->load->view('account_information/payment_approval_list', $data, true);
 
 $this->load->view('master', $data);


}


public function pick_payment_approval_data(){
    $company_id = $this->session->userdata('company_id');
    $id=$this->input->post('id',true);
    $all_data=$this->Account_information_model->select_all_by_id($id);
    $remarks=$all_data->remarks;

    $paying_to=$all_data->paying_to;
    if ($paying_to=='employee') {
       $employee_id= $all_data->employee_id;
       $retrieved_data=$this->Employee_model->each_employee_info($company_id,$employee_id);
       $name=$retrieved_data->first_name.' '.$retrieved_data->last_name;

   } if ($paying_to=='supplier') {
       $supplier_id= $all_data->supplier_id;
       $retrieved_data=$this->Account_information_model->each_supplier_info($company_id,$supplier_id);
       $name=$retrieved_data->full_name;

   } if ($paying_to=='miscellaneous') {
       $miscellaneous_id= $all_data->miscellaneous_id;
       $retrieved_data=$this->Account_information_model->each_miscellaneous_info($company_id,$miscellaneous_id);
       $name=$retrieved_data->recipient_name;

   }


   echo $name.'#'.$remarks;

}



public function approve_payment(){
 $company_id=$this->session->userdata('company_id');
 $id=$this->input->post('id',true);
 $all_data=$this->Account_information_model->select_all_by_id($id);



 $account_no=$all_data->account_no;
 $cheque_no=$all_data->cheque_no;
 
 $payment_type=$all_data->payment_type;
 
 
 $debited_amount=$all_data->debited_amount;
 
 $payment_method=$all_data->payment_method;
 
 $paying_to=$all_data->paying_to;
 
 $employee_id=$all_data->employee_id;
 
 $supplier_id=$all_data->employee_id;
 
 $miscellaneous_id=$all_data->miscellaneous_id;
 
 

 if ($payment_type=='advance' &&$paying_to=='employee') {
    
    $retrieve_employee_balance=$this->Employee_model->each_employee_info($company_id,$employee_id);

    $current_balance=$retrieve_employee_balance->employee_due;
    $new_balance=$current_balance-$debited_amount;
    if ($payment_method=='cash') {
        $account_no='100001';
    }
    $retrieve_company_account_balance=$this->Expense_model->retive_account_amount($company_id,$account_no);

    $company_current_bal=$retrieve_company_account_balance->balance;
    $final_balance=$company_current_bal-$debited_amount;



    if ($final_balance>=0) {
     $updated_company_bal=$this->Expense_model->update_balance($company_id,$account_no,$final_balance);
     $update_balance=$this->Employee_model->update_employee_balance($company_id,$new_balance,$employee_id);
     if ($payment_method!=='cash') {
       $update_cheque_pages=$this->Cheque_book_model->update_cheque_pages($company_id,$account_no,$cheque_no);
   }



}else{

    $sdata['message']='Insufficient Balance';
    $this->session->set_userdata($sdata);
    exit();
}


}if ($payment_type=='salary' &&$paying_to=='employee') {
    
    $retrieve_employee_balance=$this->Employee_model->each_employee_info($company_id,$employee_id);

    $current_balance=$retrieve_employee_balance->employee_due;
    $new_balance=$current_balance+$debited_amount;
    if ($payment_method=='cash') {
        $account_no='100001';
    }
    $retrieve_company_account_balance=$this->Expense_model->retive_account_amount($company_id,$account_no);

    $company_current_bal=$retrieve_company_account_balance->balance;
    $final_balance=$company_current_bal-$debited_amount;



    if ($final_balance>=0) {
     $updated_company_bal=$this->Expense_model->update_balance($company_id,$account_no,$final_balance);
     $update_balance=$this->Employee_model->update_employee_balance($company_id,$new_balance,$employee_id);
     if ($payment_method!=='cash') {
       $update_cheque_pages=$this->Cheque_book_model->update_cheque_pages($company_id,$account_no,$cheque_no);
   }



}else{

    $sdata['message']='Insufficient Balance';
    $this->session->set_userdata($sdata);
    exit();
}


}if ($payment_type=='due_payment' && $paying_to=='employee') {
    
    $retrieve_employee_balance=$this->Employee_model->each_employee_info($company_id,$employee_id);

    $current_balance=$retrieve_employee_balance->employee_due;
    $new_balance=$current_balance+$debited_amount;
    if ($payment_method=='cash') {
        $account_no='100001';
    }
    $retrieve_company_account_balance=$this->Expense_model->retive_account_amount($company_id,$account_no);

    $company_current_bal=$retrieve_company_account_balance->balance;
    $final_balance=$company_current_bal-$debited_amount;



    if ($final_balance>=0) {
     $updated_company_bal=$this->Expense_model->update_balance($company_id,$account_no,$final_balance);
     $update_balance=$this->Employee_model->update_employee_balance($company_id,$new_balance,$employee_id);
     if ($payment_method!=='cash') {
       $update_cheque_pages=$this->Cheque_book_model->update_cheque_pages($company_id,$account_no,$cheque_no);
   }



}else{

    $sdata['message']='Insufficient Balance';
    $this->session->set_userdata($sdata);
    exit();
}


} if ($payment_type=='advance' &&$paying_to=='supplier') {
    
    $retrieve_supplier_balance=$this->Account_information_model->each_supplier_info($company_id,$supplier_id);



    $current_balance=$retrieve_supplier_balance->supplier_due;
    $new_balance=$current_balance-$debited_amount;
    if ($payment_method=='cash') {
        $account_no='100001';
    }
    $retrieve_company_account_balance=$this->Expense_model->retive_account_amount($company_id,$account_no);

    $company_current_bal=$retrieve_company_account_balance->balance;
    $final_balance=$company_current_bal-$debited_amount;



    if ($final_balance>=0) {
     $updated_company_bal=$this->Expense_model->update_balance($company_id,$account_no,$final_balance);


     $update_balance=$this->Account_information_model->update_supplier_balance($company_id,$new_balance,$supplier_id);


     if ($payment_method!=='cash') {
       $update_cheque_pages=$this->Cheque_book_model->update_cheque_pages($company_id,$account_no,$cheque_no);
   }



}else{

    $sdata['message']='Insufficient Balance';
    $this->session->set_userdata($sdata);
    exit();
}


}

if ($payment_type=='due_payment' &&$paying_to=='supplier') {
    
    $retrieve_supplier_balance=$this->Account_information_model->each_supplier_info($company_id,$supplier_id);



    $current_balance=$retrieve_supplier_balance->supplier_due;
    $new_balance=$current_balance+$debited_amount;
    if ($payment_method=='cash') {
        $account_no='100001';
    }
    $retrieve_company_account_balance=$this->Expense_model->retive_account_amount($company_id,$account_no);

    $company_current_bal=$retrieve_company_account_balance->balance;
    $final_balance=$company_current_bal-$debited_amount;



    if ($final_balance>=0) {
     $updated_company_bal=$this->Expense_model->update_balance($company_id,$account_no,$final_balance);


     $update_balance=$this->Account_information_model->update_supplier_balance($company_id,$new_balance,$supplier_id);


     if ($payment_method!=='cash') {
       $update_cheque_pages=$this->Cheque_book_model->update_cheque_pages($company_id,$account_no,$cheque_no);
   }



}else{

    $sdata['message']='Insufficient Balance';
    $this->session->set_userdata($sdata);
    exit();
}


}



if ($payment_type=='advance' &&$paying_to=='miscellaneous') {
    
    $retrieve_supplier_balance=$this->Account_information_model->each_miscellaneous_info($company_id,$miscellaneous_id);



    $current_balance=$retrieve_supplier_balance->due_amount;
    $new_balance=$current_balance-$debited_amount;
    if ($payment_method=='cash') {
        $account_no='100001';
    }
    $retrieve_company_account_balance=$this->Expense_model->retive_account_amount($company_id,$account_no);

    $company_current_bal=$retrieve_company_account_balance->balance;
    $final_balance=$company_current_bal-$debited_amount;



    if ($final_balance>=0) {
     $updated_company_bal=$this->Expense_model->update_balance($company_id,$account_no,$final_balance);


     $update_balance=$this->Account_information_model->update__miscellaneous_balance($company_id,$new_balance,$miscellaneous_id);


     if ($payment_method!=='cash') {
       $update_cheque_pages=$this->Cheque_book_model->update_cheque_pages($company_id,$account_no,$cheque_no);
   }



}else{

    $sdata['message']='Insufficient Balance';
    $this->session->set_userdata($sdata);
    exit();
}


}  
if ($payment_type=='due_payment' &&$paying_to=='miscellaneous') {
    
    $retrieve_supplier_balance=$this->Account_information_model->each_miscellaneous_info($company_id,$miscellaneous_id);



    $current_balance=$retrieve_supplier_balance->due_amount;
    $new_balance=$current_balance+$debited_amount;
    if ($payment_method=='cash') {
        $account_no='100001';
    }
    $retrieve_company_account_balance=$this->Expense_model->retive_account_amount($company_id,$account_no);

    $company_current_bal=$retrieve_company_account_balance->balance;
    $final_balance=$company_current_bal-$debited_amount;



    if ($final_balance>=0) {
     $updated_company_bal=$this->Expense_model->update_balance($company_id,$account_no,$final_balance);


     $update_balance=$this->Account_information_model->update__miscellaneous_balance($company_id,$new_balance,$miscellaneous_id);


     if ($payment_method!=='cash') {
       $update_cheque_pages=$this->Cheque_book_model->update_cheque_pages($company_id,$account_no,$cheque_no);
   }



}else{

    $sdata['message']='Insufficient Balance';
    $this->session->set_userdata($sdata);
    exit();
}


}   if ($payment_type=='others') {
    
    if ($payment_method=='cash') {
        $account_no='100001';
    }
    $retrieve_company_account_balance=$this->Expense_model->retive_account_amount($company_id,$account_no);
    $company_current_bal=$retrieve_company_account_balance->balance;
    $final_balance=$company_current_bal-$debited_amount;



    if ($final_balance>=0) {
     $updated_company_bal=$this->Expense_model->update_balance($company_id,$account_no,$final_balance);

     if ($payment_method!=='cash') {
       $update_cheque_pages=$this->Cheque_book_model->update_cheque_pages($company_id,$account_no,$cheque_no);
   }



}else{

    $sdata['message']='Insufficient Balance';
    $this->session->set_userdata($sdata);
    exit();
}


}


$update=$this->Account_information_model->update_tbl_payment_history_approval($id);


if ($update) {
   
   $sdata['message']='Payment Approved Successfully';
   $this->session->set_userdata($sdata);
}else{
  
   $sdata['message']='Something Went Wrong';
   $this->session->set_userdata($sdata);
}



}

public function cheque_pages(){


    $data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
    $data['menu'] = $this->load->view('menu', $data, true);
    $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
    $company_id = $this->session->userdata('company_id');
    $data['bank_name']=$this->Account_information_model->select_all_account_information_list_for_cheque_book();
    $data['maincontent'] = $this->load->view('account_information/cheque_pages', $data, true);
    
    $this->load->view('master', $data);

}

public function show_cheques(){

$company_id = $this->session->userdata('company_id');
    //print_r($_POST);exit();
$account_no=$this->input->post('account_name',true);
    $accounts_cheques=$this->Account_information_model->all_cheques_info($company_id,$account_no);

    $data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
    $data['account_no']=$account_no;
    $data['menu'] = $this->load->view('menu', $data, true);
    $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
    $company_id = $this->session->userdata('company_id');
    $data['accounts_cheques']=$accounts_cheques;
    $data['maincontent'] = $this->load->view('account_information/show_cheques', $data, true);
    
    $this->load->view('master', $data);
    
 
}


// Pay slip function work start
public function pay_slip(){


    $data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
    $data['menu'] = $this->load->view('menu', $data, true);
    $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
    $company_id = $this->session->userdata('company_id');
     $data['all_employee'] = $this->Employee_model->select_all_employee_list($company_id);
    $data['maincontent'] = $this->load->view('account_information/pay_slip', $data, true);
    
    $this->load->view('master', $data);

}
// Pay slip function work end

// View pay slip function work start() {}
public function view_pay_slip() {
    $company_id = $this->session->userdata('company_id');
    $pay_month = $this->input->post('pay_month');
    $employee_id = $this->input->post('employee_id');

    $pay_date = explode('-', $pay_month);
    $month= $pay_date[0];
    $year=$pay_date[1];
    $month_year = date("F, Y", strtotime($year.'-'.$month));

    $data = array();
    $data['company_data']=$this->Company_model->check_company_id($company_id);
    $data['slip_data']=$this->Account_information_model->retrieve_slip_data($company_id,$employee_id,$month_year);

     $data['maincontent'] = $this->load->view('account_information/view_pay_slip', $data, true);
             $this->load->view('account_information/view_pay_slip', $data);
 

   // print_r($data['company_data']);


}
// View pay slip function work end


}
