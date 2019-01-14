<?php

class Offer_model extends CI_Model {
	
	
	public function save_new_offer_info($data)
    {
		
        $this->db->insert('offer_info',$data); 
		
    }
	
	public function select_last_offer_id()
    {	
		$this->db->select ('max(SUBSTRING(offer_code,7,4)) as lastid');
        $this->db->from('offer_info');
		$query_result = $this->db->get();
        $result = $query_result->row();
		 return $result;

    }
    public function select_offer_info()
    {	$this->db->select('*');
        $this->db->from('offer_info');
		$query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
    
   
}
