<?php

class Expense_model extends CI_Model {
    //put your code here
	
	
	public function save_expense($data)
    {
		
        $this->db->insert('expense_info',$data); 
       // $hello=$this->db->last_query();
        //return $hello;
		
    }	
	
	public function check_expense_id($expense_id)
    {
        $this->db->select('*');
        $this->db->from('expense_info');
        $this->db->where('expense_id',$expense_id);
		$query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }	
	public function check_expense_type($expense_type)
    {
        $this->db->select('*');
        $this->db->from('expense_types');
        $this->db->where('expense_type',$expense_type);
		$query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
	
	
	public function save_expense_types($data)
    {
		
        $this->db->insert('expense_types',$data); 


		
    }
	
	public function select_expense_type_info()
    {	
		$this->db->select('*');
        $this->db->from('expense_types');
		$this->db->order_by("expense_type");
		$query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }	 
	public function select_each_expense_type()
    {	
		$this->db->select('*');
        $this->db->from('expense_types');
		$this->db->order_by("expense_type");
		$query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	
		public function update_expense_type($data,$id){


		$this->db->where('id',$id);
        $this->db->update('expense_types',$data);


       return $this->db->affected_rows() > 0;

    }
	
		public function delete_expense_type_info($id){
        
        $this->db->where('id', $id);
        $this->db->delete('expense_types');
    }
	

    public function pick_account_no($bank_name){

        $this->db->select('account_no');
        $this->db->from('account_info');
        $this->db->where('bank_name',$bank_name);
         $this->db->where('active',1);

        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;


    }

      public function expense_info_for_list(){

        $this->db->select('*');
        $this->db->from('expense_info');
        $this->db->where('is_approved','0');
        $this->db->where('deleted_at',null);
        $this->db->order_by('expense_id','DESC');

        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;


    }

    public function approve_expense($id,$data){
        $this->db->where('id',$id);
        $this->db->update('expense_info',$data);
        return $this->db->affected_rows() > 0;


    }
   

       public function approved_expense_info_for_list(){

        $this->db->select('*');
        $this->db->from('expense_info');
        $this->db->where('is_approved','1');
         $this->db->where('deleted_at',null);

        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;


    }

    public function pick_latest_expense_number($company_id){

        $date=date("Ym");
        $filter="EX".$date;
       

       $this->db->select ('max(SUBSTRING(expense_id,9,16)) as expense_id');
       $this->db->from('expense_info');
       $this->db->like('expense_id',$filter,'after');
       $this->db->where('company_id',$company_id);




        $query_result = $this->db->get();
        $result = $query_result->result();
   
        return $result;
    }

    public function select_all_employee_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('company_id',$company_id);
        $this->db->where('status','1');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function retrieve_cheque_no($account_no){

        $this->db->select('cheque_starting_no');
        $this->db->order_by('cheque_starting_no','DESC');
        $this->db->limit('1');
        $this->db->from('cheque_book_info');
        $this->db->where('account_no',$account_no);

        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;


    }

    public function retrieve_expense_data($id){

        $this->db->select('*');
        $this->db->from('expense_info');
        $this->db->where('id',$id);

        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;

    }

    public function retrieve_customer_name($project_id)
    {
        $this->db->select('customer_name');
        $this->db->from('project_info');
        $this->db->where('project_id',$project_id);

        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

        public function pick_latest_approved_number($company_id){

       $this->db->select ('max(SUBSTRING(approved_id,7,12)) as approved_id');
       $this->db->from('expense_info');
       
       $this->db->where('company_id',$company_id);

        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function update_expense($company_id,$expense_id,$data){

        $this->db->where('company_id',$company_id);
        $this->db->where('expense_id',$expense_id);
        $this->db->update('expense_info',$data);

   
         return $this->db->affected_rows() > 0;
    }

    public function update_is_expensed($company_id,$voucher_no){
        $data=array();
        $data['is_expensed']='1';
           $this->db->where('company_id',$company_id);
        $this->db->where('voucher_no',$voucher_no);
        $this->db->update('voucher_info',$data);
         return $this->db->affected_rows() > 0;
    }

    public function delete_expense($company_id,$id,$data){
          $this->db->where('company_id',$company_id);
        $this->db->where('id',$id);
        $this->db->where('is_approved','0');
        $this->db->update('expense_info',$data);
         return $this->db->affected_rows() > 0;

    }


    public function pick_expense_no($final,$company_id){

        $this->db->select ('max(SUBSTRING(expense_id,9,16)) as expense_id');
       $this->db->from('expense_info');
       $this->db->like('expense_id',$final,'after');
       $this->db->where('company_id',$company_id);




        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;



    }

    public function retrieve_project_data($company_id){

        $this->db->distinct();
        $this->db->select('project_id,project_name,customer_name');
        $this->db->from('project_info');
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }

    public function expense_data_for_report($from_date,$to_date,$chk_to_date,$project,$expense_type,$status,$company_id,$type){


        $this->db->select('*');
        $this->db->from('expense_info');
        $this->db->where('deleted_at',null);
        $this->db->where('company_id',$company_id);
          if($chk_to_date==1){

        $this->db->where('expense_date >=',$from_date);
        $this->db->where( 'expense_date <=',$to_date);

        }
        if($chk_to_date==null && $from_date!=="" ){
        $this->db->where('expense_date', $from_date);
        }if ($project!=="select") {
           $this->db->where('project_id',$project);
        }if ($expense_type!=="select") {
           $this->db->where('expense_type',$expense_type);
        }if ($status=='approved') {
            $this->db->where('is_approved','1');
        }if ($status=='pending') {
            $this->db->where('is_approved','0');
        }if ($type=='project') {
            $this->db->where('is_support','0');
        }if ($type=='support') {
            $this->db->where('is_support','1');
        }
        $this->db->order_by('expense_id');
         $query_result = $this->db->get();
        $result = $query_result->result();
 
        return $result;

    }


    //   public function retrieve_project_data($company_id){

    //     $this->db->distinct();
    //     $this->db->select('project_id,project_name,customer_name');
    //     $this->db->from('project_info');
    //     $this->db->where('company_id',$company_id);
    //     $query_result = $this->db->get();
    //     $result = $query_result->result();
    // //echo $this->db->last_query(); die;
    //     //print_r($query);
    //     return $result;
    // }



    public function retrieve_expensed_by_name($expense_by){

         $company_id = $this->session->userdata('company_id'); 
        $this->db->select('first_name,last_name');
        $this->db->from('tbl_employee');
        $this->db->where('employee_id',$expense_by);
        $this->db->where('company_id',$company_id);
            $query_result = $this->db->get();
        $result = $query_result->result();
    
        return $result;

    }

    public function retrive_summary_data($expense_id,$company_id){

        $this->db->select('*');
        $this->db->from('expense_info');
        $this->db->where('company_id',$company_id);
        $this->db->where('expense_id',$expense_id);

           $query_result = $this->db->get();
            $result = $query_result->row();
    
        return $result;
    }

    public function retrieve_expense_amount($company_id,$id){

        $this->db->select('*');
        $this->db->from('expense_info');
        $this->db->where('company_id',$company_id);
        $this->db->where('id',$id);

        $query_result = $this->db->get();
        $result = $query_result->row();
    
        return $result;

    }

    public function retive_account_amount($company_id,$account_no){

         $this->db->select('*');
        $this->db->from('account_info');
        $this->db->where('company_id',$company_id);
        $this->db->where('account_no',$account_no);

        $query_result = $this->db->get();
        $result = $query_result->row();
    
        return $result;

    }

    public function update_balance($company_id,$account_no,$final_balance){
        $data=array();
        $data['balance']=$final_balance;
        $this->db->where('account_no',$account_no);
        $this->db->where('company_id',$company_id);
        $this->db->update('account_info',$data);


       return $this->db->affected_rows() > 0;

    }

    /*
    reload voucher selected all
    */
    function reload_voucher_select($voucher_no) {
        $this->db->select('*');
        $this->db->from('voucher_info');
        $this->db->where('voucher_no',$voucher_no);

        $query_result = $this->db->get();
        $result = $query_result->row();
    
        return $result;
    }
     /*
    reload voucher selected all
    */

}
