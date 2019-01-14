<?php

class Designation_model extends CI_Model {
    //put your code here
    
  
	
	public function save_new_designation_info($data)
    {
        $this->db->insert('designation_info',$data);
		return $this->db->affected_rows() > 0;
       
    }
	public function select_all_designation_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('designation_info');
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
	public function select_each_designation($id,$company_id)
    {
        $this->db->select('*');
        $this->db->from('designation_info');
        $this->db->where('id',$id);
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	public function check_designation_name($designation_name,$company_id)
    {
        $this->db->select('*');
        $this->db->from('designation_info');
        $this->db->where('designation_name',$designation_name);
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	public function update_designation_info($id,$company_id,$data){
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('designation_info',$data);
		return $this->db->affected_rows() > 0;
    }
	public function delete_designation_info($id,$company_id){
        
        $this->db->where('id', $id);
        $this->db->where('company_id', $company_id);
        $this->db->delete('designation_info');

		return $this->db->affected_rows() > 0;
    }
	
	
   
}
