<?php

class Department_model extends CI_Model {
    //put your code here
    
     public function save_new_department_info($data)
    {
        $this->db->insert('department_info',$data);
       
    }
	 public function select_all_department_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('department_info');
        $this->db->order_by('department_name');
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }	
	public function check_department_name($department_name,$company_id)
    {
        $this->db->select('*');
        $this->db->from('department_info');
        $this->db->where('department_name',$department_name);
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }	
	public function select_each_department($id)
    {
        $this->db->select('*');
        $this->db->from('department_info');
        $this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	
	public function update_department_info($data,$id,$company_id){
		
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('department_info',$data);
    }
	
	public function delete_department_info($id){
        
        $this->db->where('id', $id);
        $this->db->delete('department_info');
    }
	
	
	 public function select_all_shift_list()
    {
        $this->db->select('*');
        $this->db->from('tbl_shift');
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
	
   
}
