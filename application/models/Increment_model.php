<?php

class Increment_model extends CI_Model {
	
	public function save_increment_info($data)
    {
        $this->db->insert('increment_info',$data);
       
    }
	public function update_increment($company_id,$employee_id,$data)
	{	
		$this->db->where('company_id',$company_id);
		$this->db->where('employee_id',$employee_id);
        $this->db->update('increment_info',$data);
		return $this->db->affected_rows() > 0;
    }
	public function select_all_increment_info($company_id)
    {
        $this->db->select('*');
        $this->db->from('increment_info');
		$this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }	
	public function each_increment_info($employee_id)
    {
		$sql="select last_increment_date from increment_info WHERE id = (SELECT MAX(id) FROM increment_info WHERE employee_id = ".$employee_id." )";

		$query_result = $this->db->query($sql);
		$result = $query_result->row();
		return $result;
    }
	public function all_increment_info($company_id,$date_from,$date_to)
    {
		$sql="select * from increment_info where company_id = ".$company_id."  AND effective_from_date  BETWEEN '".$date_from."' AND '".$date_to."' and approval_status = 0";
		$query_result = $this->db->query($sql);
		$result = $query_result->result();
		return $result;
	}
	public function approve_increment($employee_id)
    {
		$max_id_query = "SELECT MAX(id) as id FROM increment_info WHERE increment_info.employee_id = ".$employee_id."";
		$query_result = $this->db->query($max_id_query);
		$max_id = $query_result->row();
		
		$sql="UPDATE tbl_employee SET basic_salary = (SELECT increment_info.incremented_salary FROM increment_info WHERE increment_info.employee_id = ".$employee_id." and id = ".$max_id->id." LIMIT 1) WHERE 
			 tbl_employee.employee_id = ".$employee_id."";
			// echo $sql;exit();
		$query_result = $this->db->query($sql);
		
		

		
		$sql2="UPDATE increment_info SET approval_status = 1,
			approved_by = ".$_SESSION['id']." ,
			approved_time = now(),
			last_increment_date = CURDATE()
			WHERE
			id = ".$max_id->id."
			AND
			employee_id = ".$employee_id."
			and 
			company_id = ".$_SESSION['company_id']."
			";
		$query_result = $this->db->query($sql2);
	}
   	public function check_employee_id($company_id,$employee_id)
    {
        $this->db->select('*');
        $this->db->from('increment_info');
		$this->db->where('company_id',$company_id);
		$this->db->where('employee_id',$employee_id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }

   
}
