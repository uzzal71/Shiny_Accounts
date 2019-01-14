<?php

class Account_information_model extends CI_Model {
    
    
     public function save_new_account_information($data)
    {
        $this->db->insert('account_info',$data);
        return $this->db->affected_rows() > 0;
       
    }
     public function select_all_account_information_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('account_info');
        $this->db->where('company_id',$company_id);
         $this->db->where('active','1');
        $query_result = $this->db->get();
       
        $result = $query_result->result();

        return $result;
    }
        
     public function check_all_account_information_list($company_id,$account_name,$account_no)
    {
        
        $sql = "select * from account_info where company_id = '$company_id' AND( account_name = '$account_name' OR account_no = '$account_no') and active='1'";
        
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;

    }

    public function select_each_account_info($company_id,$id)
    {
        
        $sql = "select * from account_info where company_id = '$company_id' AND id = '$id'";
        
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;

    }


public function update_account_information($data,$id,$company_id){

        $this->db->where('id',$id);
        $this->db->where('company_id',$company_id);
        $this->db->update('account_info',$data);
        return $this->db->affected_rows() > 0;
        }

public function delete_account($id){

    
        $this->db->where('id',$id);
        $this->db->delete('account_info');

        return $this->db->affected_rows() > 0;



}   
     
            public function select_all_account_information_list_for_cheque_book()
    {
        $this->db->distinct();
        $this->db->select('bank_name');
        $this->db->from('account_info');
        $this->db->where('active','1');
       
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
    
   public function select_all_account_no($bank_name){

         $this->db->distinct();
        $this->db->select('account_no');
        $this->db->from('account_info');
        $this->db->where('bank_name',$bank_name);
       
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;


   }
   public function retrieve_cash_account_data($company_id,$account_name){

        $this->db->select('account_no,balance');
        $this->db->from('account_info');
        $this->db->where('account_name',$account_name);
        $this->db->where('company_id',$company_id);
       
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;

    
   }
public function retrieve_account_info($company_id){

        $this->db->select('*');
        $this->db->from('account_info');
        $this->db->where('company_id',$company_id);
         $this->db->where('active','1');
            $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;

}

public function retrieve_balance($account_no,$company_id){
        $this->db->select('*');
        $this->db->from('account_info');
        $this->db->where('company_id',$company_id);
        $this->db->where('account_no',$account_no);
         $this->db->where('active','1');
            $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;

}
   
   public function insert_into_account_transfer($data){
     $this->db->insert('tbl_account_transfer',$data);
    
    return $this->db->affected_rows() > 0;

   }

   public function approve_account_transfer($company_id){

    $this->db->select('*');
    $this->db->from('tbl_account_transfer');
    $this->db->where('is_approved','0');
    $this->db->where('company_id','1');
     $query_result = $this->db->get();
    $result = $query_result->result();

        return $result;

   }


   public function update_balance($account_no,$updated_balance,$company_id){
    $data['balance']=$updated_balance;
    $this->db->where('account_no',$account_no);
    $this->db->where('company_id',$company_id);
    $this->db->update('account_info',$data);
    
   
        return $this->db->affected_rows() > 0;

   }

     public function update_approved_amount($id,$company_id,$data){
    $this->db->where('id',$id);
    $this->db->where('company_id',$company_id);
    $this->db->update('tbl_account_transfer',$data);
  
        return $this->db->affected_rows() > 0;

   }


   public function insert_into_payment_history($data){
     $this->db->insert('tbl_payment_history',$data);
        
    return $this->db->affected_rows() > 0;

   }

      public function latest_recipient_no($company_id)
    {   
       
        $this->db->select ('max(SUBSTRING(recipient_id,8,16)) as lastid');
        $this->db->from('tbl_payment_recipient');
        $query_result = $this->db->get();
        $result = $query_result->row();
        
         return $result;

    }

    public function insert_into_payment_recipient($data){
     $this->db->insert('tbl_payment_recipient',$data);
        
    return $this->db->affected_rows() > 0;

   }

public function all_miscellaneous($company_id){

    $this->db->distinct();
    $this->db->select('recipient_id,recipient_name,contact,company_name,remarks,id');
    $this->db->from('tbl_payment_recipient');
    $this->db->where('company_id',$company_id);
    $this->db->where('is_active','1');
    $query_result = $this->db->get();
    
    $result = $query_result->result();

        return $result;
}

public function recipient_data_edit($company_id,$id){

  $this->db->select('*');
  $this->db->from('tbl_payment_recipient');
  $this->db->where('id',$id);
   $query_result = $this->db->get();
    $result = $query_result->row();

        return $result;
}

public function update_payment_recipient($data,$id){
   $company_id = $this->session->userdata('company_id');
   $this->db->where('id',$id);
    $this->db->where('company_id',$company_id);
    $this->db->update('tbl_payment_recipient',$data);
    return $this->db->affected_rows() > 0; 

}



public function balance_transfer_data($company_id,$id){

    $this->db->select('*');
  $this->db->from('tbl_account_transfer');
  $this->db->where('id',$id);
  $this->db->where('company_id',$company_id);
   $query_result = $this->db->get();
    $result = $query_result->row();

        return $result;



}

public function update_account_transfer($data,$id){
   $company_id = $this->session->userdata('company_id');
   $this->db->where('id',$id);
    $this->db->where('company_id',$company_id);
    $this->db->update('tbl_account_transfer',$data);
    return $this->db->affected_rows() > 0; 

}

public function each_supplier_info($company_id,$supplier_id){


    $this->db->select('*');
  $this->db->from('supplier_info');
  $this->db->where('supplier_id',$supplier_id);
  $this->db->where('company_id',$company_id);
   $query_result = $this->db->get();
    $result = $query_result->row();

        return $result;

}

public function update_supplier_balance($company_id,$new_balance,$supplier_id){

     $this->db->set('supplier_due',$new_balance);
        $this->db->where('company_id',$company_id);
        $this->db->where('supplier_id',$supplier_id);
       
         $this->db->update('supplier_info');
           return $this->db->affected_rows() > 0;
   }


   public function each_miscellaneous_info($company_id,$miscellaneous_id){


    $this->db->select('*');
  $this->db->from('tbl_payment_recipient');
  $this->db->where('recipient_id',$miscellaneous_id);
  $this->db->where('company_id',$company_id);
   $query_result = $this->db->get();
    $result = $query_result->row();

        return $result;

}

public function update__miscellaneous_balance($company_id,$new_balance,$miscellaneous_id){

     $this->db->set('due_amount',$new_balance);
        $this->db->where('company_id',$company_id);
        $this->db->where('recipient_id',$miscellaneous_id);
       
         $this->db->update('tbl_payment_recipient');
           return $this->db->affected_rows() > 0;
   }

public function select_all_payment_history(){

    $company_id=$this->session->userdata('company_id');
    $this->db->select('*');
    $this->db->from('tbl_payment_history');
    $this->db->where('is_approved','0');
    $this->db->where('company_id',$company_id);
    $query_result = $this->db->get();
    
    $result = $query_result->result();

        return $result;


}

public function select_all_by_id($id){

   $company_id=$this->session->userdata('company_id');
    $this->db->select('*');
    $this->db->from('tbl_payment_history');
    $this->db->where('is_approved','0');
    $this->db->where('company_id',$company_id);
     $this->db->where('id',$id);
    $query_result = $this->db->get();
    
    $result = $query_result->row();

        return $result;


}

public function update_tbl_payment_history_approval($id){
    $company_id=$this->session->userdata('company_id');
    $this->db->set('is_approved',1);
        $this->db->where('company_id',$company_id);
        $this->db->where('id',$id);
       
         $this->db->update('tbl_payment_history');
           return $this->db->affected_rows() > 0;
}


public function insert_before_delete($id,$company_id){

 $sql = "INSERT into deleted_account_info(`company_id`, `account_name`, `account_no`, `balance`, `emp_id`, `bank_name`, `branch`, `address`, `bank_contact_no`, `opening_date`, `introducer_name`, `active`, `recorded_by`, `recording_time`) (SELECT  `company_id`, `account_name`, `account_no`, `balance`, `emp_id`, `bank_name`, `branch`, `address`, `bank_contact_no`, `opening_date`, `introducer_name`, `active`, `recorded_by`, `recording_time` FROM `account_info` WHERE id='$id' and company_id='$company_id')";
        
        $query_result = $this->db->query($sql);
        return $this->db->affected_rows() > 0;



}

public function all_cheques_info($company_id,$account_no){


          $this->db->select('*');
          $this->db->from('tbl_cheque_book_pages');
          $this->db->where('company_id',$company_id);
          $this->db->where('account_no',$account_no);
          
           $query_result = $this->db->get();
            
            $result = $query_result->result();

        return $result;



}


public function retrieve_slip_data($company_id,$employee_id,$month_year){

  $sql="SELECT
tbl_employee.deviceID,
tbl_employee.first_name,
tbl_employee.last_name,
tbl_employee.card_id,
tbl_employee.department,
tbl_employee.designation,
tbl_employee.joining_date,
salary_details.month,
salary_details.employee_id,
salary_details.employee_name,
salary_details.basic_salary,
salary_details.attendence_bonus,
salary_details.medical_allowance,
salary_details.house_rent_allowance,
salary_details.gross_salary,
salary_details.phone_bill_allowance,
salary_details.transport_allowance,
salary_details.over_time_salary,
salary_details.night_allowance,
salary_details.deductive_amount
FROM
tbl_employee
INNER JOIN salary_details ON tbl_employee.employee_id = salary_details.employee_id

WHERE

salary_details.month='$month_year' AND
salary_details.employee_id='$employee_id'
AND
salary_details.company_id='$company_id'

ORDER BY employee_id
 ";


 $query_result = $this->db->query($sql);
  $result = $query_result->row();

        return $result;

}

}





