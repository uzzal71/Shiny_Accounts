<?php

class User_model extends CI_Model {
    //put your code here
    
    public function save_new_user_role_info($data)
    {
        $this->db->insert('user_roles',$data);
		return $this->db->affected_rows() > 0;
    }
	
    public function select_all_user_role_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('user_roles');
        $this->db->order_by('user_role_name');
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }   	

    public function select_all_user_role_id_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('user_roles');
        $this->db->order_by('id');
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }	
	/*
	public function select_all_self_parent_role_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('user_roles');
        $this->db->order_by('user_role_name');
        $this->db->where('company_id',$company_id);
        $this->db->where('parent_id',0);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }	
*/	

	public function select_all_parent_list()
    {
        $this->db->select('*');
        $this->db->from('user_roles');
        $this->db->order_by('user_role_name');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }	
	public function check_user_role_name($user_role_name,$company_id)
    {
        $this->db->select('*');
        $this->db->from('user_roles');
        $this->db->where('user_role_name',$user_role_name);
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }		
	
	public function select_each_user_role($id)
    {
        $this->db->select('*');
        $this->db->from('user_roles');
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
	
	public function update_user_role_info($id,$company_id,$data){
		
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('user_roles',$data);
		return $this->db->affected_rows() > 0;
    }	

	public function delete_user_role_info($id){
        
        $this->db->where('id', $id);
        $this->db->delete('user_roles');
    }
	public function check_employee_id($employee_id)
    {
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('user_name',$employee_id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	public function save_user_info($data)
    {
        $this->db->insert('user_info',$data);
		return $this->db->affected_rows() > 0;
    }
		
	public function select_all_user_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
	public function check_user_name($company_id,$user_name)
    {
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('company_id',$company_id);
        $this->db->where('user_name',$user_name);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }	
	public function select_each_user_info($id,$company_id)
    {
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('id',$id);
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
	public function update_user_info($id,$company_id,$data){
		
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('user_info',$data);
		return $this->db->affected_rows() > 0;
    }
	public function delete_user_info($id,$company_id){
        
        $this->db->where('id', $id);
		$this->db->where('company_id',$company_id);
        $this->db->delete('user_info');
    }
    
	public function update_is_user($employee_id,$company_id){

        $data=array();
        $data['is_user']='5';
       $this->db->where('employee_id',$employee_id);
        $this->db->where('company_id',$company_id);
        $this->db->update('tbl_employee',$data);
        return $this->db->affected_rows() > 0;
    }

   public function select_all_employee_list($company_id){


    $this->db->Select('*');
    $this->db->from('tbl_employee');
    $this->db->where('is_user !=',5,FALSE);
    $this->db->where('status','1');
     $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
   }
}
