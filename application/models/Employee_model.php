<?php

class Employee_model extends CI_Model {
    //put your code here
    
    public function save_employee_info($data)
    {
        $this->db->insert('tbl_employee',$data);
		return $this->db->affected_rows() > 0;
      
    }
    public function save_employee_to_command_info($command_data)
    {
        //echo "<pre>";print_r($command_data);exit();
        $this->db->insert('tbl_command_list',$command_data);
        return $this->db->affected_rows() > 0;
      
    }

	
	public function check_employee_id($employee_id,$company_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('employee_id',$employee_id);
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }	
	
	public function select_all_employee_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('company_id',$company_id);
		$this->db->where('status','1');
        $this->db->order_by('employee_id','asc');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    public function select_all_grade_a_employee_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('company_id',$company_id);
        $this->db->where('employGrade','A');
        $this->db->where('status','1');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }	
	public function select_each_employee($company_id,$id)
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
		$this->db->where('company_id',$company_id);
		$this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }		
	public function each_employee_info($company_id,$employee_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('company_id',$company_id);
        $this->db->where('employee_id',$employee_id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }	
	public function pick_employee_info_by_employee_id($company_id,$employee_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
		$this->db->where('company_id',$company_id);
		$this->db->where('employee_id',$employee_id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	public function select_department_name_by_employee_id($company_id,$employee_id)
    {
        $this->db->select('department');
        $this->db->from('tbl_employee');
		$this->db->where('company_id',$company_id);
		$this->db->where('employee_id',$employee_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
	
	public function update_employee_info($data,$id,$company_id){
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('tbl_employee',$data);
		return $this->db->affected_rows() > 0;
    }	
	public function update_employee_allowance_info($employee_id,$data){
		
		$this->db->where('company_id',$_SESSION["company_id"]);
		$this->db->where('employee_id',$employee_id);
        $this->db->update('tbl_employee',$data);
		return $this->db->affected_rows() > 0;
    }
	
	public function delete_employee_info($id,$company_id){
        
       
        $this->db->set('status','Inactive');
        $this->db->where('company_id',$company_id);
		$this->db->where('id',$id);
         $this->db->update('tbl_employee');
    }
	
	public function select_employee_name_by_employee_id($employee_id)
    {
        $this->db->select('first_name,last_name');
        $this->db->order_by("first_name");
        $this->db->from('tbl_employee');
        $this->db->where('employee_id',$employee_id);
		
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
	public function delete_image_by_id($id){
         $sql="SELECT imagePath FROM tbl_employee WHERE id='$id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        unlink("$result->imagePath");
        

        $this->db->set('imagePath', '');
        $this->db->where('id', $id);
        $this->db->update('tbl_employee');
                //echo $this->db->last_query();
        //exit();
        return $result;
       }

    public function show_employee_report_info($all_department,$department_name)
    {
            
    $sql="SELECT *
        FROM
            tbl_employee
        WHERE
            1=1";
        
        if($department_name == 'select')
        {
            $all_department = 1;
        }
        if($all_department==null)
        {
            $sql = $sql." AND `department` = '".$department_name."' " ;
        }
        $sql = $sql."
        AND company_id = '".$_SESSION["company_id"]."'
        ORDER BY
            `employee_id`";

        //echo $sql;exit();
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;

    }
	public function select_each_employee_full_name($company_id,$employee_id){

        $sql = "select CONCAT(first_name,' ',last_name) as full_name from tbl_employee where company_id = '$company_id' and employee_id = '$employee_id' ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }

	 public function insert_to_active_history($active){

                $this->db->insert('tbl_active_employee_for_device',$active);
                 return $this->db->affected_rows() > 0;


        }

   public function select_devid($company_id){

            $this->db->distinct();
            $this->db->select('devId');
            $this->db->from('tbl_devices');
            $this->db->where('company_id',$company_id);
            $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
        }  
    public function check_card_id($card_id,$company_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('card_id',$card_id);
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

   public function update_employee_balance($company_id,$new_balance,$employee_id){

    $this->db->set('employee_due',$new_balance);
        $this->db->where('company_id',$company_id);
        $this->db->where('employee_id',$employee_id);
         $this->db->update('tbl_employee');
           return $this->db->affected_rows() > 0;


   }
}
