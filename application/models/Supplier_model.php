<?php
class Supplier_model extends CI_Model {
    //put your code here
	public function select_last_supplier_id()
    {	
		$this->db->select ('max(SUBSTRING(supplier_id,7)) as lastid');
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->from('supplier_info');
		$query_result = $this->db->get();
        $result = $query_result->row();
		 return $result;

    }
     public function save_new_supplier_info($data)
    {
        $this->db->insert('supplier_info',$data);
        return $this->db->affected_rows() > 0;
       
    }
	 public function select_all_supplier_list()
    {
        $this->db->select('*');
        $this->db->from('supplier_info');
        $this->db->where('company_id', $_SESSION['company_id']);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
	public function select_each_supplier($id) {
        $this->db->select('*');
        $this->db->from('supplier_info');
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
	
	public function update_supplier_info($data,$id)
    {
		$this->db->where('id',$id);
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->update('supplier_info',$data);
        return $this->db->affected_rows() > 0;
    }
	
	public function delete_supplier_info($id)
    {
        $this->db->where('id', $id);
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->delete('supplier_info');
    }
	
}

