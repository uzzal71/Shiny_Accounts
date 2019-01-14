<?php

class Cheque_book_model extends CI_Model {
    
    
     public function save_new_cheque_book_info($data)
    {
        $this->db->insert('cheque_book_info',$data);
       
    }
	
	 public function select_all_cheque_book_list()
    {
        $this->db->select('*');
        $this->db->from('cheque_book_info');
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    } 
	
	public function select_all_account_no_list()
    {
        $this->db->select('*');
        $this->db->from('account_info');
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
	
	 public function store_cheque_book_info($cheque){


        $this->db->insert('tbl_cheque_book_pages',$cheque);


     }

        public function select_all_cheque_no($account_no,$cheque_starting_nos,$cheque_end_nos)
    {
        $this->db->select('*');
        $this->db->from('cheque_book_info');
        $this->db->where('account_no',$account_no);
        $this->db->where('cheque_starting_no',$cheque_starting_nos);
        $this->db->where('cheque_end_no',$cheque_end_nos);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
	
   
   public function retrieve_cheques($company_id,$account_no){


        $this->db->select('*');
        $this->db->from('tbl_cheque_book_pages');
        $this->db->where('company_id',$company_id);
        $this->db->where('account_no',$account_no);
        $this->db->where('is_used','0');

        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;

   }
   public function update_cheque_pages($company_id,$account_no,$cheque_no){

      $this->db->set('is_used','1');
        $this->db->where('company_id',$company_id);
        $this->db->where('account_no',$account_no);
        $this->db->where('cheque_no',$cheque_no);
         $this->db->update('tbl_cheque_book_pages');
           return $this->db->affected_rows() > 0;
   }
}
