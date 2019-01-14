<?php

class Welcome_model extends CI_Model {
    //put your code here
    
    
	public function check_password($password)
    {
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('password',md5($password));
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    } 
	public function update_password($password,$id)
    {	
		$this->db->set('password', $password); 
        $this->db->where('id', $id);
		$this->db->update('user_info');
		
    } 
	public function select_company_name_by_company_id($company_id)
    {
        $this->db->select('*');
        $this->db->from('company_info');
        $this->db->where('company_id',($company_id));
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    } 


	
	
   
}
