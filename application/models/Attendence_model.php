<?php

class Attendence_model extends CI_Model {

	public function select_employee_info_by_employee_ids($employee_ids)
    {
		$sql="select * from tbl_employee where company_id = ".$_SESSION["company_id"]." ";
		if($employee_ids !="")
		{
			$sql=$sql." AND employee_id IN ($employee_ids) ";
		}
		$sql=$sql." ORDER BY employee_id";
		
		$query_result = $this->db->query($sql);
		$result = $query_result->result();
		return $result;
	}

	public function select_employee_info_by_employee_id($company_id)
	{
		$conn = mysqli_connect('localhost', 'root', '', 'test_easy_accounts');
		
		$sql = "SELECT * FROM tbl_employee WHERE company_id=$company_id";

		$query = $this->db->query($sql);
		$result = $query->result();
		//var_dump($result);
		return $result;

	}
	
	public function select_special_shift_allocation_info($employee_id,$date_from)
    {
		$sql="select * from special_shift_allocation where company_id = ".$_SESSION["company_id"]." AND employee_id = '".$employee_id."' AND date = '".$date_from."'";
		$query_result = $this->db->query($sql);
		$result = $query_result->row();
		return $result;
	}	
	
	public function select_group_shift_allocation_info($group_id,$date_from)
    {
		$sql="select * from group_shift_allocation where company_id = ".$_SESSION["company_id"]." and group_id = ".$group_id." AND '".$date_from."'  BETWEEN from_date AND to_date";
		$query_result = $this->db->query($sql);
		
		$result = $query_result->row();
		return $result;
	}
	
	public function select_in_time_info($employee_id,$shift_start_from_with_date_from,$shift_end_from_with_date_from)
    {
    	// echo 'employee:'.$employee_id;
    	// echo '</br>';
    	// echo 'Start:'.$shift_start_from_with_date_from;
    	// echo '</br>';
    	// echo 'End : '.$shift_end_from_with_date_from;
    	// echo '</br>';
    	// exit();
		$sql = "SELECT MIN(ctime) AS in_time FROM tbl_card WHERE company_id = 1 AND employee_id = '$employee_id' AND ctime >= '$shift_start_from_with_date_from' AND ctime < '$shift_end_from_with_date_from' AND status = 1 GROUP BY employee_id";
	
		$query_result = $this->db->query($sql);
		//print_r($sql);
		$result = $query_result->row();

		// echo '<pre>';
		// print_r($sql);
		// exit();

		return $result;
		
	}	
	public function select_daily_entry($employee_id,$in_time,$out_time)
    {
		$sql = "SELECT
				id,ctime
				FROM
					tbl_card
				WHERE
					company_id = '".$_SESSION["company_id"]."'
					AND employee_id = '".$employee_id."'
					AND ctime BETWEEN '".$in_time."' AND '".$out_time."'
					AND status = '1'
					ORDER BY ctime
					";
	
		$query_result = $this->db->query($sql);
		//echo $this->db->last_query(); exit();
		$result = $query_result->result();
		return $result;
		
	}

	public function select_out_time_info($employee_id,$date_from_for_out_time,$shift_end_from,$shift_start_from,$is_night,$date_from,$shift_start)
    {
		$sql = "SELECT
					MAX(ctime) AS out_time
				FROM
					tbl_card
				WHERE
					company_id = '".$_SESSION["company_id"]."'
					AND employee_id = '".$employee_id."'
					AND status = '1'";
					
		if($is_night=='1')
		{
			$sql = $sql." AND ctime > '".$date_from." ".$shift_start."'";
			$sql = $sql." AND ctime < DATE_ADD('".$date_from."', INTERVAL 1 DAY)";
		}
		else
		{
			//$sql = $sql." AND ctime > '".$date_from." ".$shift_start."'";
			$sql = $sql." AND CAST(ctime as DATE) = '".$date_from_for_out_time."'";
		}
		

		
		$sql = $sql." GROUP BY
						employee_id";
		$query_result = $this->db->query($sql);
		//print_r($sql);
		// return $sql;
		// exit();
		$result = $query_result->row();
		return $result;
		
	}
	
	public function select_holiday_from_date($date_from)
    {
        $this->db->select('*');
        $this->db->from('holiday_info');
        $this->db->where('company_id',$_SESSION["company_id"]);
        $this->db->where('from_date >=',$date_from);
        $this->db->where('to_date <=',$date_from);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }	
		
	public function select_approved_leave_by_employee_id($date_from, $employee_id)
    {
		$sql="SELECT * FROM leave_info where  approval_status='1' and company_id = '".$_SESSION["company_id"]."' and employee_id = '".$employee_id."' and '".$date_from."' = date(date_time_from)";

		$query_result = $this->db->query($sql);
		$result = $query_result->row();
		return $result;
		
    }		
	public function select_approved_first_half_leave_by_employee_id($date_from, $employee_id)
    {
		$sql="SELECT * FROM leave_info where  approval_status='1' and company_id = '".$_SESSION["company_id"]."' and employee_id = '".$employee_id."' and half_full_day = 'first_half' and '".$date_from."' = date(date_time_from)";

		$query_result = $this->db->query($sql);
		$result = $query_result->row();
		return $result;
		
    }	

    



	public function select_approved_second_half_leave_by_employee_id($date_from, $employee_id)
    {
		$sql="SELECT * FROM leave_info where  approval_status='1' and company_id = '".$_SESSION["company_id"]."' and employee_id = '".$employee_id."' and half_full_day = 'second_half' and '".$date_from."' = date(date_time_from)";

		$query_result = $this->db->query($sql);
		$result = $query_result->row();
		return $result;
    }
    public function first_half_leave_penalty($employee_id,$date_from)
    {
		$sql = "INSERT INTO leave_info (company_id, employee_id, date_time_from,no_of_days,leave_types,half_full_day,remarks,approval_status,approved_by,approved_date,recorded_by,recording_time)
			VALUES ('".$_SESSION["company_id"]."','".$employee_id."', '".$date_from."','.5','CL','first_half','Entry After First Half Margin','1','".$_SESSION["id"]."',CURTIME(),'".$_SESSION["id"]."',CURTIME())";
			//echo $sql;exit();
		$query_result = $this->db->query($sql);
		return 1;
    }

    public function second_half_leave_penalty($employee_id,$date_from)
    {
		$sql = "INSERT INTO leave_info (company_id, employee_id, date_time_from,no_of_days,leave_types,half_full_day,remarks,approval_status,approved_by,approved_date,recorded_by,recording_time)
			VALUES ('".$_SESSION["company_id"]."','".$employee_id."', '".$date_from."','.5','CL','second_half','Entry After Second Half Margin','1','".$_SESSION["id"]."',CURTIME(),'".$_SESSION["id"]."',CURTIME())";
			//echo $sql;exit();
		$query_result = $this->db->query($sql);
		return 1;
    }	
	public function select_weekend_by_employee_id($day,$employee_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('company_id',$_SESSION["company_id"]);
        $this->db->where('weekend =',$day);
        $this->db->where('employee_id',$employee_id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	public function save_attendence_process_info($data)
    {
        $this->db->insert('tbl_attendense_log',$data);
		return $this->db->affected_rows() > 0;
    }
    public function update_attendence_process_info($date_from,$employee_id,$data)
	{
		$this->db->where('company_id',$_SESSION["company_id"]);
		$this->db->where('date =',$date_from);
        $this->db->where('employee_id',$employee_id);
        $this->db->update('tbl_attendense_log',$data);
		return $this->db->affected_rows() > 0;
    }

    public function check_processed_data($date_from,$employee_id)
	{
		
        $this->db->select('*');
        $this->db->from('tbl_attendense_log');
        $this->db->where('company_id',$_SESSION["company_id"]);
        $this->db->where('date =',$date_from);
        $this->db->where('employee_id',$employee_id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	public function save_deduction_salary($data)
    {
        $this->db->insert('deduction_info',$data);
		return $this->db->affected_rows() > 0;
    }	
	public function select_all_deduction_salary($company_id)
    {
        $this->db->select('*');
        $this->db->from('deduction_info');
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }	
	public function select_each_deduction_salary($company_id,$id)
    {
        $this->db->select('*');
        $this->db->from('deduction_info');
        $this->db->where('company_id',$company_id);
        $this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
	public function update_deduction_salary($company_id,$id,$data)
	{
		$this->db->where('company_id',$company_id);
		$this->db->where('id',$id);
        $this->db->update('deduction_info',$data);
		return $this->db->affected_rows() > 0;
    }
	public function delete_deduction_salary_info($company_id,$id){

		$this->db->where('company_id',$company_id);
        $this->db->where('id', $id);
        $this->db->delete('deduction_info');
    }
	public function deductive_salary_info($employee_id,$deductive_month)
    {
		$sql="SELECT employee_id, deduction_month, SUM(amount) AS total_amount FROM deduction_info 
			WHERE employee_id = '".$employee_id."' and deduction_month = '".$deductive_month."' and company_id = '".$_SESSION["company_id"]."' GROUP BY employee_id, deduction_month";
		$query_result = $this->db->query($sql);
		$result = $query_result->row();
		return $result;
    }		
	public function update_salary_setup($data)
	{
		$this->db->where('company_id',$_SESSION["company_id"]);
        $this->db->update('salary_setup',$data);
		return $this->db->affected_rows() > 0;
    }
	public function save_salary_setup($data)
    {
        $this->db->insert('salary_setup',$data);
		return $this->db->affected_rows() > 0;
    }
	
	public function select_employee_attendence_info($employee_id,$company_id,$date_from,$date_to)
    {
		$where_clause_for_date_a = "";
		$where_clause_for_date_b = "";
		$where_clause_for_date_a = " AND a.`date` BETWEEN '".$date_from."' AND '".$date_to."'";
		$where_clause_for_date_b = " AND b.`date` BETWEEN '".$date_from."' AND '".$date_to."'";
		
		$sql="SELECT
				a.`employee_id`,
				a.`shift_id`,
				(SELECT count(*) FROM tbl_attendense_log b WHERE a.`employee_id` = b.`employee_id` AND b.`status` = 'A' AND b.`company_id` = '".$company_id."' AND b.`employee_id` = '".$employee_id."' ".$where_clause_for_date_b.") as 'absent',
				(SELECT count(*) FROM tbl_attendense_log b WHERE a.`employee_id` = b.`employee_id` AND b.`status` = 'L' AND b.`company_id` = '".$company_id."' AND b.`employee_id` = '".$employee_id."' ".$where_clause_for_date_b.") as 'late',
				(SELECT count(*) FROM tbl_attendense_log b WHERE a.`employee_id` = b.`employee_id` AND b.`early_out` != '0' AND b.`company_id` = '".$company_id."' AND b.`employee_id` = '".$employee_id."' ".$where_clause_for_date_b.") as 'early_out',
				(SELECT count(*) FROM tbl_attendense_log b WHERE a.`employee_id` = b.`employee_id` AND b.`night_status` = '1' AND b.`company_id` = '".$company_id."' AND b.`employee_id` = '".$employee_id."' ".$where_clause_for_date_b.") as 'night_status',
				(SELECT sum(b.no_of_leave_day) FROM tbl_attendense_log b WHERE a.`employee_id` = b.`employee_id` AND b.`company_id` = '".$company_id."' AND b.`employee_id` = '".$employee_id."' ".$where_clause_for_date_b.") as 'no_of_leave_day',
				(SELECT sum(b.over_time) FROM tbl_attendense_log b WHERE a.`employee_id` = b.`employee_id` AND b.`company_id` = '".$company_id."' AND b.`employee_id` = '".$employee_id."' ".$where_clause_for_date_b.") as 'over_time'
			FROM
				tbl_attendense_log a
			WHERE
				1=1";

		$sql = $sql." AND a.`employee_id` = '".$employee_id."'";
		$sql = $sql." AND a.`company_id` = '".$company_id."'";
		$sql = $sql." ".$where_clause_for_date_a;
		
		$sql = $sql."GROUP BY
			a.`employee_id`,a.`shift_id`
		ORDER BY
			a.`employee_id`";

		
		$query_result = $this->db->query($sql);
        $result = $query_result->row();
		return $result;

    }
	
	public function save_salary_details($data)
    {
        $this->db->insert('salary_details',$data);
		return $this->db->affected_rows() > 0;
    }	
	public function select_salary_setup_info()
    {
        $this->db->select('*');
        $this->db->from('salary_setup');
        $this->db->where('company_id',$_SESSION["company_id"]);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }

    public function check_duplicate_salary($each_employee_id,$month)
    {
        $this->db->select('*');
        $this->db->from('salary_details');
        $this->db->where('employee_id',$each_employee_id);
        $this->db->where('month',$month);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }

    public function save_final_salary($data)
    {
        $this->db->insert('salary_details',$data);
        return $this->db->affected_rows() > 0;
      
    }
        public function update_final_salary($each_employee_id,$month,$data)
	{
		$this->db->where('company_id',$_SESSION["company_id"]);
		$this->db->where('employee_id =',$each_employee_id);
        $this->db->where('month',$month);
        $this->db->update('salary_details',$data);
		return $this->db->affected_rows() > 0;
    }

	public function retrieve_for_disburse($company_id,$months){

		$this->db->select('*');
		$this->db->from('salary_details');
		$this->db->where('company_id',$company_id);
		$this->db->where('month',$months);
		$this->db->where('is_disbursed',0);
		$query_result = $this->db->get();
        $result = $query_result->result();

        return $result;

	}
  public function update_salary_account($company_id,$account_no,$bank_name){

  		$data=array();
  		$data['is_salary_account']=1;
  		$this->db->where('bank_name',$bank_name);
  		$this->db->where('account_no',$account_no);
  		$this->db->where('company_id',$company_id);
        $this->db->update('account_info',$data);
		return $this->db->affected_rows() > 0;


  }


  public function reset_salary_account($company_id){

  		$data=array();
  		$data['is_salary_account']=0;
  		$this->db->where('is_salary_account',1);
  		$this->db->where('company_id',$company_id);
        $this->db->update('account_info',$data);
		return $this->db->affected_rows() > 0;

  }



   public function retrieve_employee_current_salary($employee_id,$month_year,$company_id)
    {
        $this->db->select('*');
        $this->db->from('salary_details');
        $this->db->where('employee_id',$employee_id);
        $this->db->where('month',$month_year);
        $this->db->where('company_id',$company_id);
        $this->db->where('is_disbursed',1);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }

    public function select_all_employee_list($company_id){
    	$this->db->distinct();
    	$this->db->select('employee_id,employee_name');
    	$this->db->from('salary_details');
    	$this->db->where('company_id',$company_id);
    	$this->db->where('is_disbursed','1');
    	$this->db->where('is_paid','0');

    	$this->db->order_by('employee_name','ASC');
    	 $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;


    }


     public function retrieve_salary_account($company_id){

    	$this->db->select('*');
    	$this->db->from('account_info');
    	$this->db->where('company_id',$company_id);
    	$this->db->where('is_salary_account','1');
    
    	 $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;


    }


       public function update_is_paid($company_id,$employee_id,$month_year){

    	$data=array();
  		$data['is_paid']='1';
  		$this->db->where('company_id',$company_id);
  		$this->db->where('employee_id',$employee_id);
  		$this->db->where('month',$month_year);
        $this->db->update('salary_details',$data);
		return $this->db->affected_rows() > 0;


    }
}
