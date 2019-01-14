<?php

class Company_model extends CI_Model {
    //put your code here
    
    public function save_new_company_info($data)
    {
        $this->db->insert('company_info',$data);
		return $this->db->affected_rows() > 0;
    }



	public function check_company_id($company_id)
    {
        $this->db->select('*');
        $this->db->from('company_info');
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }		
	
	public function select_each_company($id)
    {
        $this->db->select('*');
        $this->db->from('company_info');
        $this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
		
	public function select_all_company_list()
    {
        $this->db->select('*');
        $this->db->from('company_info');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
	
	public function update_company_info($id,$data){
		
		$this->db->where('id',$id);
        $this->db->update('company_info',$data);
		return $this->db->affected_rows() > 0;
    }	

	public function delete_company_info($id){
        
        $this->db->where('id', $id);
        $this->db->delete('company_info');
    }
	
}
