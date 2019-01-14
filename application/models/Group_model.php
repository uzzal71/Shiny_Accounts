<?php

class Group_model extends CI_Model {
    //put your code here
    
    public function save_new_group_info($data)
    {
        $this->db->insert('group_info',$data);
		return $this->db->affected_rows() > 0;
       
    }
	 public function select_all_group_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('group_info');
        $this->db->order_by('group_name');
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }	
	public function check_group_name($group_name,$company_id)
    {
        $this->db->select('*');
        $this->db->from('group_info');
        $this->db->where('group_name',$group_name);
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }	
	public function select_each_group($id)
    {
        $this->db->select('*');
        $this->db->from('group_info');
        $this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	
	public function update_group_info($data,$id,$company_id){
		
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('group_info',$data);
		return $this->db->affected_rows() > 0;
    }
	
	public function delete_group_info($id){
        
        $this->db->where('id', $id);
        $this->db->delete('group_info');
		return $this->db->affected_rows() > 0;
    }
	public function save_group_shift_allocation_info($data)
    {
        $this->db->insert('group_shift_allocation',$data);
		return $this->db->affected_rows() > 0;
       
    }
	

   
}
