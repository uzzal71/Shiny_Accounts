<?php

class Schedule_model extends CI_Model {
    //put your code here
    
    public function save_schedule_info($data)
    {
        
        $this->db->insert('tbl_schedule_list',$data); 
        return $this->db->insert_id();
       
        
    }
    public function save_schedule_to_command_info($command_data)
    {
		
        $this->db->insert('tbl_command_list',$command_data);
       
		
    }
	
    
     public function select_all_schedule_list()
    {
        $this->db->select('*');
        $this->db->from('tbl_schedule_list');
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
    	
     public function select_each_schedule_list($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_schedule_list');
        $this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
    	 
    public function update_schedule_info($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('tbl_schedule_list',$data);
    }   
     public function delete_schedule_info($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_schedule_list');
    }
	
	
   
}
