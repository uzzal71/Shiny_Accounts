<?php

class Voucher_entry_model extends CI_Model {
	
	
    public function save_new_offer_info($data)
    {
        
        $this->db->insert('voucher_info',$data); 
        
    }

    public function save_voucher_info($data)
    {       

        if ($data['from_place']==""){
            $data['from_place']='N/A';
        }
        if ($data['to_place']=="") {
            $data['to_place']='N/A';
        }if ($data['vehicle']=="") {
            $data['vehicle']='N/A';
        }if ($data['description']==""){
            $data['description']='N/A';
        }
		
        $this->db->insert('voucher_info',$data); 
		
    }

        /*
    all ready approved update
  
     public function update_voucher_info_all_ready_approved($voucher_no, $data)
    {      
        echo '<pre>';
        print_r($data);
        exit();
        
        $this->db->where('voucher_no', $voucher_no);
        $this->db->update('voucher_info', $data);
        
    }

    all ready approved update
    */
	
	public function select_last_voucher_id($company_id)
    {	
        $final='VN'.date('Ym');

        $sql = "SELECT max(SUBSTRING(voucher_no,9,16)) as lastid FROM `voucher_info` WHERE `voucher_no` LIKE '$final%' ESCAPE '!' AND `company_id` = $company_id AND length(`voucher_no`) > 10 ";
       // var_dump($sql);
        //SELECT max(SUBSTRING(voucher_no, 9, 16)) as lastid FROM `voucher_info` WHERE `voucher_no` LIKE '$final%' ESCAPE '!' AND `company_id` = '1'
    // exit();
        
		// $this->db->select ('max(SUBSTRING(voucher_no,9,16)) as lastid');
  //       $this->db->from('voucher_info');
  //       $this->db->like('voucher_no',$final,'after');
  //       $this->db->where('company_id',$company_id);
		// $query_result = $this->db->get();
  //       $result = $query_result->row();
  //       echo $this->db->last_query();exit();
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
		return $result;

    }
    public function select_offer_info()
    {	$this->db->select('*');
        $this->db->from('offer_info');
		$query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
     public function all_voucher_info()
    {	
        //$this->db->distinct('voucher_no');

        // $this->db->select('*');
        // $this->db->from('voucher_info');

       // $this->db->query('SELECT DISTINCT voucher_no from voucher_info ');
		$query_result = $this->db->query("SELECT DISTINCT voucher_no from voucher_info where is_approved='1' AND is_expensed ='0' ");
        //$query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }    
    
	public function expense_voucher_info($voucher_no)
    {	

        //$query='SELECT expense_type, SUM(amount) from voucher_info WHERE voucher_no=$voucher_no';
        $this->db->select('expense_type, SUM(amount) as amount,date');
       // $this->db->select('*');
        $this->db->from('voucher_info');
        $this->db->where('voucher_no',$voucher_no);

       // $query_result = $this->db->query($query);
		$query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
    
    public function expense_voucher_info_for_expenses($voucher_no)
    {   

        //$query='SELECT expense_type, SUM(amount) from voucher_info WHERE voucher_no=$voucher_no';
        $this->db->select('expense_type, SUM(amount) as amount,date,customer_name,project_id,project_name,employee_id,entry_date,is_support,is_printed, description');
       // $this->db->select('*');
        $this->db->from('voucher_info');
        $this->db->where('voucher_no',$voucher_no);

       // $query_result = $this->db->query($query);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
    

    public function retrieve_pending_bills($employee_id,$company_id){

             $this->db->distinct();
            $this->db->select('voucher_no,employee_name,project_id,date,recorded_by');
            $this->db->from('voucher_info');
            $this->db->where('employee_id',$employee_id);
             $this->db->where('company_id',$company_id);
            $this->db->where('is_approved', '0');
             $this->db->where('deleted_at',NULL);
             $this->db->order_by('voucher_no','desc');
             $query_result = $this->db->get();
            $result = $query_result->result();

        return $result;


    }


       public function retrieve_pending_voucher_info($voucher_no){


            $this->db->select('*');
            $this->db->from('voucher_info');
            $this->db->where('voucher_no',$voucher_no);
            $this->db->where('deleted_at',NULL);
             
             $query_result = $this->db->get();
            $result = $query_result->result();

        return $result;


    }


       public function retrieve_voucher_info_for_approval($company_id){


            $this->db->distinct();
            $this->db->select('voucher_no,employee_name,project_id,date,entry_by');
            $this->db->from('voucher_info');
            $this->db->where('is_approved','0');
            $this->db->where('is_printed','0');
            $this->db->where('company_id',$company_id);
            $this->db->where('deleted_at',null);
            $this->db->order_by('voucher_no','desc');
             $query_result = $this->db->get();
            $result = $query_result->result();

        return $result;


    }

    public function update_approved_voucher_info($data,$voucher_no){


            $this->db->where('voucher_no',$voucher_no);
        $this->db->update('voucher_info',$data);
        $this->db->where('deleted_at',null);
        return $this->db->affected_rows() > 0;
    }
   

   public function find_employee_designation($employee_id){
    $this->db->select('designation');
    $this->db->from('tbl_employee');
    $this->db->where('employee_id',$employee_id);
     $query_result = $this->db->get();
            $result = $query_result->row();
            return $result;
   }


      public function retrieve_pending_voucher_info_to_update($voucher_no){

            $this->db->select('*');
            $this->db->from('voucher_info');
            $this->db->where('voucher_no',$voucher_no);
            $this->db->where('deleted_at',NULL);
             
             $query_result = $this->db->get();
            $result = $query_result->result();

        return $result;


    }

    public function find_customer_name($customer_id){
    $this->db->select('full_name');
    $this->db->from('customer_info');
    $this->db->where('customer_id',$customer_id);
     $query_result = $this->db->get();
            $result = $query_result->row();
            return $result;
   }

   // public function update_voucher_info($data,$voucher_no){

   //   $this->db->where('voucher_no',$voucher_no);
   //      $this->db->update('voucher_info',$data);
   //      return $this->db->affected_rows() > 0;


   // }


   public function delete_voucher($voucher_no){
       // $data=array();
       // $data['deleted_at']= date("y-m-d h:i:s");
       $this->db->where('voucher_no', $voucher_no);
        $this->db->delete('voucher_info');

    // $this->db->where('voucher_no',$voucher_no);
    //     $this->db->update('voucher_info',$data);
        return $this->db->affected_rows() > 0;
   }

   public function retrieve_vouchers_info_for_batch_print($from,$to){

    // $this->db->Select("distinct(voucher_no)");
    // $this->db->from('voucher_info');
    // $this->db->order_by('voucher_no');
    // $this->db->where('voucher_no >=', $from);
    // $this->db->where('voucher_no <=', $to);
    // $this->db->where('deleted_at',NULL);
    $sql = "SELECT DISTINCT(`voucher_no`) FROM `voucher_info` WHERE length(`voucher_no`) > 10 AND `voucher_no` BETWEEN '$from' AND '$to' ";
    //$query_result = $this->db->get();
    $query_result = $this->db->query($sql);
    $result = $query_result->result();

    // echo '<pre>';
    // print_r($result);
    // exit();

    return $result;




   }

       public function retrieve_approved_bills($employee_id,$company_id){


               $this->db->distinct();
            $this->db->select('voucher_no,employee_name,project_id,date,entry_by');
            $this->db->from('voucher_info');
            $this->db->where('employee_id',$employee_id);
             $this->db->where('company_id',$company_id);
                   $this->db->where('is_approved','1');
                   $this->db->where('deleted_at',NULL);
                   $this->db->order_by('voucher_no','desc');
             $query_result = $this->db->get();
            $result = $query_result->result();

        return $result;


    }

    public function update_print($voucher_no){
        $data=array();
        $data['is_printed']='1';
        $this->db->where('voucher_no',$voucher_no);
        $this->db->update('voucher_info',$data);
       
        return $this->db->affected_rows() > 0;

    }

    public function retrieve_printed_voucher_info($company_id){
            $this->db->distinct();
            $this->db->select('voucher_no,employee_name,project_id,date,entry_by');
            $this->db->from('voucher_info');
            $this->db->where('is_approved','0');
            $this->db->where('is_printed','1');
            $this->db->where('company_id',$company_id);
            $this->db->where('deleted_at',null);
            $this->db->order_by('date','desc');
             $query_result = $this->db->get();
            $result = $query_result->result();

        return $result;

    }

        public function retrieve_printed_and_approved_voucher_info($company_id){

            $this->db->distinct();
            $this->db->select('voucher_no,employee_name,project_id,date,recorded_by');
            $this->db->from('voucher_info');
            $this->db->where('is_approved','1');
            $this->db->where('is_printed','1');
            $this->db->where('company_id',$company_id);
            $this->db->where('deleted_at',null);
            $this->db->order_by('voucher_no','desc');
             $query_result = $this->db->get();
            $result = $query_result->result();

        return $result;

    }
   public function retrieve_customer_id($project_ids){

    $this->db->select('customer_id');
    $this->db->from('project_info');
    $this->db->where('project_id',$project_ids);
    $query_result = $this->db->get();
            $result = $query_result->row();
            return $result;


   }

   public function select_supplier_info($company_id){

    $this->db->select('*');
    $this->db->from('supplier_info');
    $this->db->where('company_id',$company_id);
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;

   }

    public function pick_latest_voucher_no($final,$company_id)
    {   
        $sql = "SELECT max(SUBSTRING(voucher_no,9,16)) as lastid FROM `voucher_info` WHERE `voucher_no` LIKE '$final%' ESCAPE '!' AND `company_id` = $company_id AND length(`voucher_no`) > 10 ";
       
        // $this->db->select ('max(SUBSTRING(voucher_no,9,16)) as lastid');
        // $this->db->from('voucher_info');
        // $this->db->like('voucher_no',$final,'after');
        // $this->db->where('company_id',$company_id);
        // $query_result = $this->db->get();
        // $result = $query_result->result();
        //echo $this->db->last_query();exit();

        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;

    }


    public function select_all_employee_for_voucher(){

         $user_type= $this->session->userdata('user_type');
         $username=$this->session->userdata('user_name');
         $employee_id=$this->session->userdata('user_id');
         $company_id=$this->session->userdata('company_id');

        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('company_id',$company_id);
        if ($user_type=='Operator') {
          $this->db->where('employee_id',$employee_id);
        }

        $query_result = $this->db->get();
        $result = $query_result->result();
        //echo $this->db->last_query();exit();
         return $result;
    }



}
