<?php

class Shift_model extends CI_Model {
    //put your code here
	
	public function check_shift_name($shift_name,$company_id)
    {
        $this->db->select('*');
        $this->db->from('shift_info');
        $this->db->where('shift_name',$shift_name);
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function save_new_shift_info($data)
    {
        $this->db->insert('shift_info',$data);
		return $this->db->affected_rows() > 0;
       
    }

	public function select_all_shift_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('shift_info');
		$this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }

	
	public function select_each_shift($id,$company_id)
    {
        $this->db->select('*');
        $this->db->from('shift_info');
        $this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
	
	
	public function update_shift_info($data,$id,$company_id){
		
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('shift_info',$data);
		return $this->db->affected_rows() > 0;
    }
	public function delete_shift_info($id,$company_id){
        
        $this->db->where('id', $id);
        $this->db->delete('shift_info');
		$this->db->where('company_id',$company_id);
    }

	public function save_special_shift_allocation_info($data)
    {
        $this->db->insert('special_shift_allocation',$data);
		return $this->db->affected_rows() > 0;
       
    }

	public function select_all_special_shift_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('special_shift_allocation');
		$this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
		
	public function select_each_special_shift($company_id,$id)
    {
        $this->db->select('*');
        $this->db->from('special_shift_allocation');
		$this->db->where('company_id',$company_id);
		$this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	public function update_special_shift_allocation_info($data,$id,$company_id){
		
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('special_shift_allocation',$data);
		return $this->db->affected_rows() > 0;
    }
	public function delete_special_shift_allocation_info($id,$company_id){
        
        $this->db->where('id', $id);
        $this->db->delete('special_shift_allocation');
		$this->db->where('company_id',$company_id);
		return $this->db->affected_rows() > 0;
    }
	
	
   
	
   
}
