<?php

class Leave_model extends CI_Model {
	
	
	public function save_leave_type_info($data)
    {
        $this->db->insert('leave_type_info',$data);
		
       
    }	  
	public function save_apply_leave_info($data,$company_id)
    {
        $this->db->insert('leave_info_history',$data);
		$this->db->where('company_id',$company_id);
		return $this->db->affected_rows() > 0;
       
    }

    public function save_apply_leave_info_approved($data,$company_id)
    {
        $this->db->insert('leave_info',$data);
		$this->db->where('company_id',$company_id);
		return $this->db->affected_rows() > 0;
       
    }

	public function select_all_apply_leave_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('leave_info_history');
        $this->db->where('company_id',$company_id);
        $this->db->where('employee_id',$_SESSION["user_id"]);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }		
	public function select_each_apply_leave($company_id,$id)
    {
        $this->db->select('*');
        $this->db->from('leave_info_history');
        $this->db->where('company_id',$company_id);
        $this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }	

	public function update_apply_leave_info($data,$id,$company_id){
		
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('leave_info_history',$data);
		return $this->db->affected_rows() > 0;
    }
	
	public function delete_apply_leave($id,$company_id){
        
        $this->db->where('id', $id);
		$this->db->where('company_id',$company_id);
        $this->db->delete('leave_info_history');
    }
	public function check_leave_full_name($leave_full_name,$company_id)
    {
        $this->db->select('*');
        $this->db->from('leave_type_info');
        $this->db->where('leave_full_name',$leave_full_name);
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
   	 public function select_all_leave_types_info($company_id)
    {
        $this->db->select('*');
        $this->db->from('leave_type_info');
		$this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
	
	public function select_each_leave_type($id)
    {
        $this->db->select('*');
        $this->db->from('leave_type_info');
        $this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	
	public function update_leave_type_info($data,$id,$company_id){
		
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('leave_type_info',$data);
		return $this->db->affected_rows() > 0;
    }
	
	public function delete_leave_type($id,$company_id){
        
        $this->db->where('id', $id);
        $this->db->delete('leave_type_info');
		$this->db->where('company_id',$company_id);
    }
   

	public function view_check_leave_status_info($date_time_from, $date_time_to, $approval_status,$company_id,$user_id)
    { 
		if($approval_status==0)
		{
			$this->db->select('*');
			$this->db->from('leave_info_history');
		   	$this->db->where('date_time_from >=',$date_time_from);
			$this->db->where('date_time_from <=',$date_time_to);
			$this->db->where('approval_status',0);
			$this->db->where('company_id',$company_id);
			$this->db->where('employee_id',$user_id);
			$query_result = $this->db->get();
			$result = $query_result->result();

			return $result;
		}
	 	if($approval_status==1)
		{
			$this->db->select('*');
			$this->db->from('leave_info_history');
		   	$this->db->where('date_time_from >=',$date_time_from);
			$this->db->where('date_time_from <=',$date_time_to);
			$this->db->where('approval_status',1);
			$this->db->where('company_id',$company_id);
			$this->db->where('employee_id',$user_id);
			$query_result = $this->db->get();
			$result = $query_result->result();

			return $result;
		}	
		if($approval_status==2)
		{
			$this->db->select('*');
			$this->db->from('leave_info_history');
		   	$this->db->where('date_time_from >=',$date_time_from);
			$this->db->where('date_time_from <=',$date_time_to);
			$this->db->where('company_id',$company_id);
			$this->db->where('employee_id',$user_id);
			$query_result = $this->db->get();
			$result = $query_result->result();

			return $result;
		  
		}
		
	}
	
    public function select_all_subordinate_pending_leave_info($company_id,$line_manager)
    {
        $sql= "SELECT * FROM leave_info WHERE approval_status = '0' AND company_id = ".$company_id." and `employee_id` IN ( SELECT employee_id FROM tbl_employee WHERE company_id= ".$company_id." and line_manager = ".$line_manager." )";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();

        return $result;
    }    
	
	public function select_all_pending_leave_info($company_id)
    {
       // $sql= "SELECT * FROM leave_info_history WHERE approval_status = '0' AND company_id = ".$company_id." ";

    	$sql= "SELECT
	tbl_employee.first_name,
	tbl_employee.last_name,
leave_info_history.id,
	leave_info_history.employee_id,
	leave_info_history.date_time_from,
	leave_info_history.date_time_to,
	leave_info_history.no_of_days,
leave_info_history.leave_types,
leave_info_history.remarks

FROM leave_info_history
LEFT JOIN tbl_employee ON  tbl_employee.employee_id  = leave_info_history.employee_id

WHERE
leave_info_history.approval_status='0' and
leave_info_history.is_printed='0' and
leave_info_history.company_id='$company_id'

ORDER BY employee_id ASC";

//print_r($sql);exit();
        $query_result = $this->db->query($sql);
        $result = $query_result->result();

        return $result;
    }



    public function select_all_pending_leave_info_after_approval($company_id)
    {
       // $sql= "SELECT * FROM leave_info_history WHERE approval_status = '0' AND company_id = ".$company_id." ";

    	$sql= "SELECT
	tbl_employee.first_name,
	tbl_employee.last_name,
leave_info_history.id,
	leave_info_history.employee_id,
	leave_info_history.date_time_from,
	leave_info_history.date_time_to,
	leave_info_history.no_of_days,
leave_info_history.leave_types,
leave_info_history.remarks

FROM leave_info_history
LEFT JOIN tbl_employee ON  tbl_employee.employee_id  = leave_info_history.employee_id

WHERE
leave_info_history.approval_status='1' and
leave_info_history.company_id='$company_id'

ORDER BY employee_id ASC";

//print_r($sql);exit();
        $query_result = $this->db->query($sql);
        $result = $query_result->result();

        return $result;
    }


    public function select_all_pending_leave_info_for_print($company_id)
    {
        $sql= "SELECT
	tbl_employee.first_name,
	tbl_employee.last_name,
leave_info_history.id,
	leave_info_history.employee_id,
	leave_info_history.date_time_from,
	leave_info_history.date_time_to,
	leave_info_history.no_of_days,
leave_info_history.leave_types,
leave_info_history.remarks

FROM leave_info_history
LEFT JOIN tbl_employee ON  tbl_employee.employee_id  = leave_info_history.employee_id

WHERE
leave_info_history.is_printed='0' and
leave_info_history.company_id='$company_id'

ORDER BY employee_id ASC";




        $query_result = $this->db->query($sql);
        $result = $query_result->result();

        return $result;
    }


public function select_all_printed_leave_info_for_print($company_id)
    {
        $sql= "SELECT
	tbl_employee.first_name,
	tbl_employee.last_name,
leave_info_history.id,
	leave_info_history.employee_id,
	leave_info_history.date_time_from,
	leave_info_history.date_time_to,
	leave_info_history.no_of_days,
leave_info_history.leave_types,
leave_info_history.remarks

FROM leave_info_history
LEFT JOIN tbl_employee ON  tbl_employee.employee_id  = leave_info_history.employee_id

WHERE
leave_info_history.is_printed='1' and

leave_info_history.approval_status='0' and
leave_info_history.company_id='$company_id'

ORDER BY employee_id ASC";




        $query_result = $this->db->query($sql);
        $result = $query_result->result();

        return $result;
    }




    	public function select_all_pending_leave_info_forward($company_id)
    {
        $sql= "SELECT * FROM leave_info WHERE approval_status = '0' AND company_id = ".$company_id." ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();

        return $result;
    }


	public function approve_leave($id,$data){
		
		$this->db->where('id',$id);
        $this->db->update('leave_info_history',$data);
        //echo $this->db->last_query();exit();
		return $this->db->affected_rows() > 0;
    }
	

	public function show_leave_report_info($from_date,$to_date,$chk_to_date,$company_id,$employee_id)
    {
        $this->db->select('*');
        $this->db->from('leave_info_history');
		if($chk_to_date==1){
		$this->db->where('date(date_time_from) >=', $from_date);
		$this->db->where('date(date_time_from) <=', $to_date);
		}
	
		$this->db->where('company_id', $company_id);
		$this->db->where('employee_id', $employee_id);
		$this->db->where('approval_status',1);
        $query_result = $this->db->get();
       // echo $this->db->last_query();exit();
        $result = $query_result->result();
        return $result;
    }
	

	// public function count_employee_leave_info($employee_id,$from_date,$chk_to_date,$to_date)
 //    {
		
	// 	$where_clause_for_date_a = "";
	// 	$where_clause_for_date_b = "";
		
	// 	if($chk_to_date==1)
	// 	{
	// 		$where_clause_for_date_a = " AND a.`date_time_from` BETWEEN '".$from_date."' AND '".$to_date."'";
	// 		$where_clause_for_date_b = " AND b.`date_time_from` BETWEEN '".$from_date."' AND '".$to_date."'";
	// 	}
	// 	else
	// 	{	
	// 		$where_clause_for_date_a = " AND a.`date_time_from` = '".$from_date."'";
	// 		$where_clause_for_date_b = " AND b.`date_time_from` = '".$from_date."'";
	// 	}
		
	// 	$sql="SELECT
	// 			a.`employee_id`,
	// 			(SELECT sum(b.no_of_days) FROM leave_info b WHERE a.`employee_id` = b.`employee_id` AND b.`leave_types` = 'CL' AND b.`approval_status` = '1' ".$where_clause_for_date_b.") as 'casual_leave',
	// 			(SELECT sum(b.no_of_days) FROM leave_info b WHERE a.`employee_id` = b.`employee_id` AND b.`leave_types` = 'ML' AND b.`approval_status` = '1' ".$where_clause_for_date_b.") as 'medical_leave',
	// 			(SELECT sum(b.no_of_days) FROM leave_info b WHERE a.`employee_id` = b.`employee_id` AND b.`leave_types` = 'MatL' AND b.`approval_status` = '1' ".$where_clause_for_date_b.") as 'maternity_leave',
	// 			(SELECT sum(b.no_of_days) FROM leave_info b WHERE a.`employee_id` = b.`employee_id` AND b.`leave_types` = 'EL' AND b.`approval_status` = '1' ".$where_clause_for_date_b.") as 'earn_leave'
	// 		FROM
	// 			leave_info a
	// 		WHERE
	// 			1=1";

	// 	$sql = $sql." AND a.`employee_id` = '".$employee_id."'";

	// 	$sql = $sql." ".$where_clause_for_date_a;
		
	// 	$sql = $sql."GROUP BY
	// 		a.`employee_id`
	// 	ORDER BY
	// 		a.`employee_id`";
	// 		//echo $sql;exit();
	// 	$query_result = $this->db->query($sql);
 //        $result = $query_result->row();
	// 	return $result;

 //    }		
	

    public function count_employee_leave_info($employee_id,$from_date,$chk_to_date,$to_date){
    	$first_day=$from_date;
$last_day=$to_date;

   		$sql= "SELECT
   		leave_full_name,
	leave_short_name,
	SUM(b.no_of_days) as no_of_days
FROM
	leave_type_info a
LEFT  JOIN leave_info_history b ON  b.leave_types  = a.leave_short_name

WHERE b.employee_id='".$employee_id."'
and b.date_time_from >='".$first_day."'
and b.date_time_from <='".$last_day."'
and b.company_id='".$this->session->userdata('company_id')."'
and b.approval_status='1'


GROUP BY
	leave_types
ORDER BY
	leave_types ASC";

	//echo $sql;exit();

	$query_result = $this->db->query($sql);
        $result = $query_result->result();
		return $result;
    }


	public function show_summery_report_info($all_department,$department_name,$from_date,$chk_to_date,$to_date)
    {
		
		$where_clause_for_date_a = "";
		$where_clause_for_date_b = "";
		
		if($chk_to_date==1)
		{
			$where_clause_for_date_a = " AND a.`date_time_from` BETWEEN '".$from_date."' AND '".$to_date."'";
			$where_clause_for_date_b = " AND b.`date_time_from` BETWEEN '".$from_date."' AND '".$to_date."'";
		}
		else
		{	
			$where_clause_for_date_a = " AND a.`date_time_from` = '".$from_date."'";
			$where_clause_for_date_b = " AND b.`date_time_from` = '".$from_date."'";
		}
		
		$sql="SELECT
				a.`employee_id`,
				(SELECT sum(b.no_of_days) FROM leave_info b WHERE a.`employee_id` = b.`employee_id` AND b.`leave_types` = 'CL' AND b.`approval_status` = '1' ".$where_clause_for_date_b.") as 'casual_leave',
				(SELECT sum(b.no_of_days) FROM leave_info b WHERE a.`employee_id` = b.`employee_id` AND b.`leave_types` = 'ML' AND b.`approval_status` = '1' ".$where_clause_for_date_b.") as 'medical_leave',
				(SELECT sum(b.no_of_days) FROM leave_info b WHERE a.`employee_id` = b.`employee_id` AND b.`leave_types` = 'MatL' AND b.`approval_status` = '1' ".$where_clause_for_date_b.") as 'maternity_leave',
				(SELECT sum(b.no_of_days) FROM leave_info b WHERE a.`employee_id` = b.`employee_id` AND b.`leave_types` = 'EL' AND b.`approval_status` = '1' ".$where_clause_for_date_b.") as 'earn_leave'
			FROM
				leave_info a
			WHERE
				1=1";
		
		if($all_department==null)
		{
			$sql = $sql." AND a.`department` = '".$department_name."'";
		}
		
		 $sql = $sql." ".$where_clause_for_date_a;
		
		$sql = $sql."GROUP BY
			a.`employee_id`
		ORDER BY
			a.`employee_id`";

		//echo $sql;exit();
		$query_result = $this->db->query($sql);
        $result = $query_result->result();
		return $result;


    }	
    	public function check_duplicate_leave($company_id,$employee_id,$start_date)
    {
    	//echo $start_date; exit();
        $this->db->select('*');
        $this->db->from('leave_info');
        $this->db->where('company_id',$company_id);
        $this->db->where('employee_id',$employee_id);
        $this->db->where('date(date_time_from)',$start_date);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }

    	public function update_leave_info($company_id,$employee_id,$start_date,$data){
        $this->db->where('company_id',$company_id);
        $this->db->where('employee_id',$employee_id);
        $this->db->where('date(date_time_from)',$start_date);
        $this->db->update('leave_info',$data);
		return $this->db->affected_rows() > 0;
    }

   public function select_leave_no($company_id){


   		 $this->db->select ('max(SUBSTRING(leave_no,8,16)) as leave_no');
       $this->db->from('leave_info_history');
       $this->db->where('company_id',$company_id);

        $query_result = $this->db->get();
        $result = $query_result->row();
   
        return $result;


   }


   public function select_past_leave_data_for_month($company_id,$employee_id){

$first_day=date('Y-m-01');
$last_day=date('Y-m-t');

   		$sql= "SELECT
   		leave_full_name,
	leave_short_name,
	SUM(b.no_of_days) as no_of_days,
	a.limits,
	a.period
FROM
	leave_type_info a
LEFT  JOIN leave_info_history b ON  b.leave_types  = a.leave_short_name

WHERE b.employee_id='".$employee_id."'
and b.date_time_from >='".$first_day."'
and b.date_time_from <='".$last_day."'
and b.company_id='".$company_id."'
and b.approval_status='1'
and a.period='monthly'

GROUP BY
	leave_types
ORDER BY
	leave_types ASC";

	//echo $sql;exit();

	$query_result = $this->db->query($sql);
        $result = $query_result->result();
		return $result;



   }

    public function select_past_leave_data_for_year($company_id,$employee_id){

$first_day=date('Y-01-01');
$last_day=date('Y-12-31');

   		$sql= "SELECT
   		leave_full_name,
	leave_short_name,
	SUM(b.no_of_days) as no_of_days,
	a.limits,
	a.period
FROM
	leave_type_info a
LEFT  JOIN leave_info_history b ON  b.leave_types  = a.leave_short_name

WHERE b.employee_id='".$employee_id."'
and b.date_time_from >='".$first_day."'
and b.date_time_from <='".$last_day."'
and b.company_id='".$company_id."'
and b.approval_status='1'
and a.period='yearly'

GROUP BY
	leave_types
ORDER BY
	leave_types ASC";

	//echo $sql;exit();

	$query_result = $this->db->query($sql);
        $result = $query_result->result();
		return $result;



   }

   public function remaining_leave_list($company_id,$employee_id){

$first_day=date('Y-01-01');
$last_day=date('Y-12-31');


   $sql="SELECT * FROM leave_type_info WHERE leave_short_name NOT IN(SELECT
	leave_short_name
FROM
	leave_type_info a
LEFT  JOIN leave_info_history b ON  b.leave_types  = a.leave_short_name

WHERE b.employee_id='".$employee_id."'
and b.date_time_from >='".$first_day."'
and b.date_time_from <='".$last_day."'
and b.company_id='".$company_id."'
and b.approval_status='1'
GROUP BY
	leave_types
ORDER BY
	leave_types ASC)";

	//echo $sql;exit();

	$query_result = $this->db->query($sql);
        $result = $query_result->result();
		return $result;

   }
   


       public function select_past_leave_data_for_employee($company_id,$id){



   		$sql= "SELECT
   		leave_full_name,
	leave_short_name,
	SUM(b.no_of_days) as no_of_days,
	a.limits,
	a.period
FROM
	leave_type_info a
LEFT  JOIN leave_info_history b ON  b.leave_types  = a.leave_short_name

WHERE b.id='".$id."'

GROUP BY
	leave_types
ORDER BY
	leave_types ASC";

	//echo $sql;exit();

	$query_result = $this->db->query($sql);
        $result = $query_result->row();
		return $result;



   }


   public function select_past_leave_data_for_month_employee($company_id,$employee_id,$type){

$first_day=date('Y-m-01');
$last_day=date('Y-m-t');

   		$sql= "SELECT
   		leave_full_name,
	leave_short_name,
	SUM(b.no_of_days) as no_of_days,
	a.limits,
	a.period
FROM
	leave_type_info a
LEFT  JOIN leave_info_history b ON  b.leave_types  = a.leave_short_name

WHERE b.employee_id='".$employee_id."'
and b.date_time_from >='".$first_day."'
and b.date_time_from <='".$last_day."'
and b.company_id='".$company_id."'
and b.leave_types='".$type."'
and b.approval_status='1'
and a.period='monthly'

GROUP BY
	leave_types
ORDER BY
	leave_types ASC";

	//echo $sql;exit();

	$query_result = $this->db->query($sql);
        $result = $query_result->row();
		return $result;



   }


   public function select_past_leave_data_for_year_employee($company_id,$employee_id,$type){

$first_day=date('Y-01-01');
$last_day=date('Y-12-31');

   		$sql= "SELECT
   		leave_full_name,
	leave_short_name,
	SUM(b.no_of_days) as no_of_days,
	a.limits,
	a.period
FROM
	leave_type_info a
LEFT  JOIN leave_info_history b ON  b.leave_types  = a.leave_short_name

WHERE b.employee_id='".$employee_id."'
and b.date_time_from >='".$first_day."'
and b.date_time_from <='".$last_day."'
and b.company_id='".$company_id."'
and b.leave_types='".$type."'
and b.approval_status='1'
and a.period='yearly'

GROUP BY
	leave_types
ORDER BY
	leave_types ASC";

	//echo $sql;exit();

	$query_result = $this->db->query($sql);
        $result = $query_result->row();
		return $result;



   }


   public function check_leave_existance($company_id, $employee_id,$date_time_from, $date_time_to){

   	$this->db->select('*');
   	$this->db->from('leave_info_history');
   	$this->db->where('company_id',$company_id);
   	$this->db->where('employee_id',$employee_id);
   	$this->db->where('date_time_from',$date_time_from);
   	$this->db->where('date_time_from',$date_time_to);
 	$query_result = $this->db->get();
        //echo $this->db->last_query();exit();
        $result = $query_result->result();
        return $result;

   }



}
