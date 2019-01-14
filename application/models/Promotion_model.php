<?php

class Promotion_model extends CI_Model {
	
	
	public function save_promotion_info($data)
    {
        $this->db->insert('promotion_info',$data);
       
    }
	public function select_all_promotion_info($company_id)
    {
        $this->db->select('*');
        $this->db->from('promotion_info');
		$this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }	

	public function all_promotion_info($company_id,$date_from,$date_to)
    {
		$sql="select * from promotion_info where company_id = ".$company_id."  AND effective_from_date  BETWEEN '".$date_from."' AND '".$date_to."' and promoted_designation != designation";
		$query_result = $this->db->query($sql);
		
		$result = $query_result->result();
		return $result;
	}
	public function approve_promotion($employee_id)
    {
		$sql="UPDATE tbl_employee SET designation = (SELECT promotion_info.promoted_designation FROM promotion_info WHERE promotion_info.employee_id = ".$employee_id." LIMIT 1) WHERE 
tbl_employee.employee_id = ".$employee_id."";
		$query_result = $this->db->query($sql);	

		$sql2="UPDATE promotion_info SET designation = (SELECT tbl_employee.designation FROM tbl_employee WHERE tbl_employee.employee_id = ".$employee_id." LIMIT 1) WHERE 
promotion_info.employee_id = ".$employee_id."";
		$query_result = $this->db->query($sql2);
	}
   	public function select_each_promotion_info($company_id,$id)
    {
        $this->db->select('*');
        $this->db->from('promotion_info');
		$this->db->where('company_id',$company_id);
		$this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
   	public function select_each_promotion_info_by_employee_id($company_id,$emp_id)
    {
        $this->db->select('*');
        $this->db->from('promotion_info');
		$this->db->where('company_id',$company_id);
		$this->db->where('employee_id',$emp_id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
   	public function check_employee_id($company_id,$employee_id)
    {
        $this->db->select('*');
        $this->db->from('promotion_info');
		$this->db->where('company_id',$company_id);
		$this->db->where('employee_id',$employee_id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }

	public function update_promotion_info($data,$id,$company_id){
		
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('promotion_info',$data);
		return $this->db->affected_rows() > 0;
    }
	public function update_promotion($company_id,$employee_id,$data)
	{
		
		$this->db->where('company_id',$company_id);
		$this->db->where('employee_id',$employee_id);
        $this->db->update('promotion_info',$data);
		return $this->db->affected_rows() > 0;
    }
	public function delete_promotion($id,$company_id){
        
        $this->db->where('id', $id);
		$this->db->where('company_id',$company_id);
        $this->db->delete('promotion_info');
    }
   

	public function view_emp_id_info($emp_id,$company_id)
    { 
			$this->db->select('*');
			$this->db->from('tbl_employee');
		   	$this->db->where('employee_id',$emp_id);
		   	$this->db->where('company_id',$company_id);
			$query_result = $this->db->get();
			$result = $query_result->row();
			return $result;
		
	 	
		
		
	}
   
}
