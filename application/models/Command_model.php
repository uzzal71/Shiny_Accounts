<?php

class Command_model extends CI_Model {
    //put your code here
    
    public function save_command_info($data)
    {
        $this->db->insert('tbl_command_list',$data);
      
    }
	
	 public function select_all_command_list()
    {
        $this->db->select('*');
        $this->db->from('tbl_command_list');
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
	
   
}
