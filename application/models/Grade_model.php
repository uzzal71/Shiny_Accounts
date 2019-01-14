<?php

class Grade_model extends CI_Model {
    //put your code here
    
      
    public function save_grade_info($data)
    {
        $this->db->insert('grade_info',$data);
		return $this->db->affected_rows() > 0;
      
    }

	public function select_all_grade_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('grade_info');
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }	
	public function select_each_grade($id)
    {
        $this->db->select('*');
        $this->db->from('grade_info');
        $this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	public function select_grade_name($grade_name,$company_id)
    {
		$sql= "SELECT * FROM grade_info  WHERE  grade_name = '".$grade_name."' AND company_id = '".$company_id."'" ;
        $query_result = $this->db->query($sql);
        $result = $query_result->row();

        return $result;
    }
	public function update_grade_info($data,$id,$company_id)
	{
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('grade_info',$data);
		return $this->db->affected_rows() > 0;
    }
	public function delete_grade_info($id,$company_id){
        
        $this->db->where('id', $id);
		$this->db->where('company_id',$company_id);
        $this->db->delete('grade_info');
    }
	
	
   
}
