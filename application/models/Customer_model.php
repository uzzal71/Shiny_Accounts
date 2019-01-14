<?php

class Customer_model extends CI_Model {

	public function select_last_customer_id()
    {	
		$this->db->select ('max(SUBSTRING(customer_id,7)) as lastid');
        $this->db->from('customer_info');
        $this->db->where('company_id', $_SESSION['company_id']);
		$query_result = $this->db->get();
        $result = $query_result->row();
		return $result;
    }
    public function save_new_customer_info($data)
    {
        $this->db->insert('customer_info',$data);
       
    }
	public function select_all_customer_list()
    {
        $this->db->select('*');
        $this->db->from('customer_info');
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->order_by('full_name');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }	

	public function select_each_customer($id)
    {
        $this->db->select('*');
        $this->db->from('customer_info');
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
	public function update_customer_info($data,$id)
    {
		$this->db->where('id',$id);
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->update('customer_info',$data);
    }
	public function delete_customer_info($id)
    {
        $this->db->where('id', $id);
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->delete('customer_info');
    }
	
   
}
