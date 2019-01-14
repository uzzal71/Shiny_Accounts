<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
        $this->load->model('Income_model');
         $this->load->model('Project_tracking_model');
            $this->load->model('Account_information_model');
             $this->load->model('Expense_model');
            
    }


	public function index()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";

         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['project_data']=$this->Project_tracking_model->select_all_project_info();
         $data['income_id']=$this->Income_model->retreive_last_income_id();

       //print_r($data['income_id']);exit();
         $data['bank_name']=$this->Account_information_model->select_all_account_information_list_for_cheque_book();
         $data['maincontent'] = $this->load->view('income/enter_income_form', $data, true);
         $this->load->view('master', $data);
        
	}
	public function income_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
        $data['data_list']=$this->Income_model->data_for_payment_list();
        // print_r($data['data_list']);exit();
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('income/income_list', $data, true);
         $this->load->view('master', $data);
        
	}
	
	public function save_new_income(){

        //print_r($_POST);exit();
        $data = array();
        $company_id = $this->session->userdata('company_id');
        $data['income_id']=$this->input->post('income_code',true);
        $data['income_date']=$this->input->post('income_date',true);
        $data['vat']=$this->input->post('fvat',true);
        $data['ait']=$this->input->post('fait',true);
        $data['income_amount']=$this->input->post('income_amount',true);
        $data['total_amount']=$this->input->post('amount',true);
        $data['pay_type']=$this->input->post('pay_type',true);
        if ($data['pay_type']=='cheque') {
          $data['cheque_no']=$this->input->post('cheque_no',true);
          $data['bank_name']=$this->input->post('bank_name',true);
          $data['account_no']=$this->input->post('deposit_account',true);
          $account_no=$this->input->post('deposit_account',true);
        }

          if ($data['pay_type']=='cash') {
             $account_no='100001';
             $data['account_no']='100001';
    }
 $retrieve_company_account_balance=$this->Expense_model->retive_account_amount($company_id,$account_no);

$company_current_bal=$retrieve_company_account_balance->balance;
    $final_balance=$company_current_bal+$data['total_amount'];

   // print_r($final_balance);exit();
 $updated_company_bal=$this->Expense_model->update_balance($company_id,$account_no,$final_balance);


        $data['project_id']=$this->input->post('project_name',true);
        $data['description']=$this->input->post('description',true);
        $data['company_id']=$company_id;
        $data['created_by']=$this->session->userdata('user_id');
        $data['created_at']=date('Y-m-d H:i:s');

        //print_r($data);exit();

        $store=$this->Income_model->store_new_income($data);

        if ($store) {
            
        $sdata['message']='Income Saved Successfully';
        $this->session->set_userdata($sdata);
        redirect('income/');
        }else{

            $sdata['message']='Something Went Wrong';
        $this->session->set_userdata($sdata);
        redirect('income/');

        }

    }



    public function edit_income($id){


       // print_r($id);exit();
         $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
        $data['data_list']=$this->Income_model->retrieve_income_info_by_id($id);
        // print_r($data['data_list']);exit();

            $data['project_data']=$this->Project_tracking_model->select_all_project_info();
            $data['bank_name']=$this->Account_information_model->select_all_account_information_list_for_cheque_book();
        $bank_name=$data['data_list']->bank_name;
        $data['account_data']=$this->Expense_model->pick_account_no($bank_name);
         $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['maincontent'] = $this->load->view('income/edit_income', $data, true);
         $this->load->view('master', $data);

    }


    public function update_income(){

        //print_r($_POST);exit();
         $data = array();
         $prev = array();
        $company_id = $this->session->userdata('company_id');
        $id=$this->input->post('id',true);
        $data['income_id']=$this->input->post('income_code',true);
        $data['income_date']=$this->input->post('income_date',true);
        $data['vat']=$this->input->post('fvat',true);
        $data['ait']=$this->input->post('fait',true);
        $data['income_amount']=$this->input->post('income_amount',true);
        $data['total_amount']=$this->input->post('amount',true);
        $data['pay_type']=$this->input->post('pay_type',true);
        $data['project_id']=$this->input->post('project_name',true);
        if ($data['pay_type']=='cheque') {
          $data['cheque_no']=$this->input->post('cheque_no',true);
          $data['bank_name']=$this->input->post('bank_name',true);
          $data['account_no']=$this->input->post('deposit_account',true);
          $account_no=$this->input->post('deposit_account',true);
        }

          if ($data['pay_type']=='cash') {
             $account_no='100001';
              $data['cheque_no']=" ";
            $data['bank_name']=" ";
            $data['account_no']='100001';
    }


$previous_balance_data=$this->Income_model->retrieve_income_info_by_id($id);
$previous_balance=$previous_balance_data->total_amount;
$previous_account_no=$previous_balance_data->account_no;




$prev['income_id']=$previous_balance_data->income_id;

$prev['previous_amount']=$previous_balance;
$prev['present_amount']=$data['total_amount'];

$prev['previous_ait']=$previous_balance_data->ait;
$prev['previous_vat']=$previous_balance_data->vat;
$prev['present_ait']= $data['ait'];
$prev['present_vat']= $data['vat'];
$prev['previous_account_no']=$previous_account_no;
$prev['present_account_no']= $data['account_no'];
$prev['previous_project_no']=$previous_balance_data->project_id;
$prev['present_project_no']=$data['project_id'];
$prev['description']=$this->input->post('description',true);
$prev['edited_by']=$this->session->userdata('user_id');
$prev['edited_at']=date('Y-m-d H:i:s');
$prev['company_id']=$company_id;;
 $retrieve_company_account_balance=$this->Expense_model->retive_account_amount($company_id,$previous_account_no);
$company_current_bal=$retrieve_company_account_balance->balance;
    $final_balance=$company_current_bal-$previous_balance;

   //print_r($final_balance);exit();
 $updated_company_bal=$this->Expense_model->update_balance($company_id,$previous_account_no,$final_balance);

 $retrieve_company_account_balances=$this->Expense_model->retive_account_amount($company_id,$account_no);

$company_current_bals=$retrieve_company_account_balances->balance;
    $final_balances=$company_current_bals+$data['total_amount'];

   // print_r($final_balance);exit();
 $updated_company_bals=$this->Expense_model->update_balance($company_id,$account_no,$final_balances);

        $data['project_id']=$this->input->post('project_name',true);
        $data['description']=$this->input->post('description',true);
        $data['company_id']=$company_id;
        $data['updated_by']=$this->session->userdata('user_id');
        $data['updated_at']=date('Y-m-d H:i:s');

          $store=$this->Income_model->update_income($id,$data);
          $history=$this->Income_model-> store_income_edit_history($prev);

        if ($store) {
            
        $sdata['message']='Income Update Successfully';
        $this->session->set_userdata($sdata);
        redirect('income/');
        }else{

            $sdata['message']='Something Went Wrong';
        $this->session->set_userdata($sdata);
        redirect('income');

        }



    }


public function income_report(){


         $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";

         $data['menu'] = $this->load->view('menu', $data, true);
         $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['project_data']=$this->Project_tracking_model->select_all_project_info();
         $data['maincontent'] = $this->load->view('income/income_report', $data, true);
         $this->load->view('master', $data);

}

public function show_income_report(){



$from_date=$this->input->post('from_date',true);
$to_date=$this->input->post('to_date',true);
$project_id=$this->input->post('project_id',true);
  $company_id = $this->session->userdata('company_id');   
    $data=array();
$data['from_date']=$from_date;
$data['to_date']=$to_date;
$data['project_id']=$project_id;
    $data['reports_data']=$this->Income_model->show_income_report($from_date,$to_date,$project_id,$company_id);

//print_r($data['reports_data']);exit();

    
        $this->load->view('income/show_income_report',$data);


}

public function vat_ait_report(){

         $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";

         $data['menu'] = $this->load->view('menu', $data, true);
         $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
         $data['income_data']=$this->Income_model->select_all_for_vat_ait_report();
        $data['project_data']=$this->Project_tracking_model->select_all_project_info();
         $data['maincontent'] = $this->load->view('income/vat_ait_report', $data, true);
         $this->load->view('master', $data);


}
	public function show_vat_ait_report(){

    
    $from_date=$this->input->post('from_date',true);
    $to_date=$this->input->post('to_date',true);
    $project_id=$this->input->post('project_id',true);
    $income_id=$this->input->post('income_id',true);
    $company_id = $this->session->userdata('company_id');   
    $data=array();
    $data['from_date']=$from_date;
    $data['to_date']=$to_date;
    $data['income_id']=$income_id;
    $data['project_id']=$project_id;
    $data['reports_data']=$this->Income_model->show_ait_vat_report($from_date,$to_date,$project_id,$company_id,$income_id);

//print_r($data['reports_data']);exit();

    
        $this->load->view('income/show_vat_ait_report',$data);

    }
	
}
