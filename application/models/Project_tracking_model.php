<?php

class Project_tracking_model extends CI_Model {
	
	
	
	public function select_last_project_id()
    {	
		$this->db->select ('max(SUBSTRING(project_id,7,4)) as lastid');
         $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->from('project_info');
		$query_result = $this->db->get();
        $result = $query_result->row();
		 return $result;

    }
	public function save_new_project_info($data)
    {
		
        $this->db->insert('project_info',$data); 
		
    }
	
	public function select_project_info()
    {	
        $this->db->select('id, project_name');
        $this->db->from('project_info');
		$this->db->order_by("project_name");
        $this->db->where('company_id', $_SESSION['company_id']);
		$this->db->where('status','Active');
		$query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
	public function select_all_project_info()
    {	$this->db->select('*');
        $this->db->from('project_info');
        $this->db->where('company_id', $_SESSION['company_id']);
		$query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_all_project_by_customer_id($customer_id)
    {   $this->db->select('*');
        $this->db->from('project_info');
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->where('customer_id', $customer_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
      public function select_all_project_by_customer_name($customer_name)
    {   $this->db->select('*');
        $this->db->from('project_info');
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->where('customer_name', $customer_name);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_project_info_by_project_id($project_id)
    {   $this->db->select('*');
        $this->db->from('project_info');
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->where('project_id', $project_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
	
	public function select_each_project($id)
    {
        $this->db->select('*');
        $this->db->from('project_info');
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->where('id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	
	public function update_project_info($data,$id)
    {
        $this->db->where('company_id', $_SESSION['company_id']);
		$this->db->where('id',$id);
        $this->db->update('project_info',$data);
        return $this->db->affected_rows() > 0;
    }
	
	public function delete_project_info($id)
    {
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->where('id', $id);
        $this->db->delete('project_info');
    }

    public function finish_project($id){

        $this->db->set('project_status', 'Finished');
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->where('id',$id);
        $this->db->update('project_info');

        return $this->db->affected_rows() > 0;
    }
	
    
   
}
