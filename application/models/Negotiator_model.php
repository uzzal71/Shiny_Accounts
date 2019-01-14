<?php

class Negotiator_model extends CI_Model {
    //put your code here
    
     public function save_new_negotiator_info($data)
    {
        $this->db->insert('negotiator_info',$data);
       
    }
	 public function select_all_negotiator_list()
    {
        $this->db->select('*');
        $this->db->from('negotiator_info');
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }	
	public function select_all_negotiator_type()
    {
        $this->db->select('*');
        $this->db->from('negotiator_types');
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
	
	
	
   
}
