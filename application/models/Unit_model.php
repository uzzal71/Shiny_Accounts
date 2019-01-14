<?php

class Unit_model extends CI_Model {
    //put your code here
    
     public function select_all_unit_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_unit');
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
	
   
}
