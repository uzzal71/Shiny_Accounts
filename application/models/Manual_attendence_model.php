<?php
class Manual_attendence_model extends CI_Model {
    //put your code here
    
	public function check_attendence_is_exist($company_id,$employee_id,$date_from)
    {
        $this->db->select('*');
        $this->db->from('tbl_attendense_log');
		$this->db->where('company_id', $company_id);
		$this->db->where('employee_id', $employee_id);
		$this->db->where('date', $date_from);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }	

	public function update_attendence_process_info($company_id,$employee_id,$date_from,$data)
	{
		$this->db->where('company_id',$company_id);
		$this->db->where('employee_id',$employee_id);
		$this->db->where('date',$date_from);
        $this->db->update('tbl_attendense_log',$data);
		return $this->db->affected_rows() > 0;
    }	



	public function save_employee_attendence_info($data)
	{
        $this->db->insert('tbl_card',$data);
		return $this->db->affected_rows() > 0;
    }	

    public function save_employee_attendence_info_manual($data)
    {
        $this->db->insert('tbl_manual_attendance',$data);
        // echo $this->db->last_query();exit();
        return $this->db->affected_rows() > 0;
    }

	public function view_employee_pending_attendence_info($company_id,$employee_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_attendense_log');
		$this->db->where('status','Manual');
		$this->db->where('company_id', $company_id);
		$this->db->where('employee_id', $employee_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }	

	public function view_each_pending_manual_attendence_info($id,$company_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_manual_attendance');
        $this->db->where('company_id',$company_id);
        $this->db->where('id',$id);

        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }	


    	public function view_each_forwarded_manual_attendence_info($id,$company_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_card');
        $this->db->where('company_id',$company_id);
        $this->db->where('id',$id);
        $this->db->where('status',2);
        
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }	
	

	public function view_employee_approved_attendence_info($company_id,$employee_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_attendense_log');
		$this->db->where('status !=','Manual');
		$this->db->where('company_id', $company_id);
		$this->db->where('employee_id', $employee_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
public function select_all_subordinate_pending_manual_attendence_info($line_manager,$company_id)
    {
        $sql= "SELECT * FROM tbl_attendense_log WHERE status = 'Manual' AND company_id = $company_id and `employee_id` IN ( SELECT employee_id FROM tbl_employee WHERE company_id= $company_id and line_manager = $line_manager )";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
public function view_all_pending_manual_attendence_info($company_id)
    {
        $sql= "SELECT * FROM tbl_manual_attendance WHERE status = '0' AND company_id = '".$company_id."' AND employee_id = '".$_SESSION["user_id"]."' ";

        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function view_all_pending_manual_attendence_list_info($company_id)
    {
         $sql= "SELECT * FROM tbl_manual_attendance WHERE status = '0' AND company_id = '".$company_id."' AND employee_id = '".$_SESSION["user_id"]."' ";

        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
public function select_all_pending_manual_attendence_info($company_id)
    {
            //$sql= "SELECT * FROM tbl_manual_attendance WHERE status = '0' AND company_id = '".$company_id."' AND under_consideration = '".$_SESSION["user_id"]."' ";
    $under_consideration = $_SESSION["user_id"];
    $sql= "SELECT * FROM tbl_manual_attendance WHERE status = '0' AND company_id = '$company_id' AND under_consideration = '$under_consideration'";

        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

public function select_all_pending_manual_attendence_info_forward($company_id)
    {
        $sql= "SELECT * FROM tbl_manual_attendance WHERE status = '0' AND company_id = '".$company_id."' AND under_consideration = '".$_SESSION['user_id']."' ";

        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }


    public function select_all_pending_manual_attendence_info_forwarded($company_id)
    {
        $sql= "SELECT * FROM tbl_card WHERE status = '2' AND company_id = '".$company_id."' AND under_consideration = '".$_SESSION['user_id']."' ";

        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

     public function my_all_pending_manual_attendence_info_forwarded($company_id)
    {
        $sql= "SELECT * FROM tbl_card WHERE status = '2' AND company_id = '".$company_id."' AND employee_id = '".$_SESSION['user_id']."' ";

        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }


	public function update_pending_manual_attendence_info($data,$id,$company_id){
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('tbl_manual_attendance',$data);
		return 1;
    }	
	public function approve_manual_attendence_info($id,$company_id){
		
        $data=array();
        $data['status']='1';
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('tbl_manual_attendance',$data);
		return $this->db->affected_rows() > 0;
    }
	public function delete_manual_attendence_info($id,$company_id){
        
        $this->db->where('id', $id);
		$this->db->where('company_id',$company_id);
        $this->db->delete('tbl_manual_attendance');
    }
	public function show_attendence_to_date_report_info($employee_id,$from_date,$to_date)
    {
        $this->db->select('*');
        $this->db->from('tbl_attendense_log');
        $this->db->where('date >=', $from_date);
		$this->db->where('date <=', $to_date);
		$this->db->where('employee_id', $employee_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
		
	public function show_attendence_report_info($employee_id,$from_date)
    {
        $this->db->select('*');
        $this->db->from('tbl_attendense_log');
        $this->db->where('date', $from_date);
		$this->db->where('employee_id', $employee_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }	
	
	public function employee_name_by_employee_id($employee_id)
    {
        $this->db->select('first_name');
        $this->db->select('last_name');
        $this->db->from('tbl_employee');
		$this->db->where('employee_id', $employee_id);

        $query_result = $this->db->get();
        //echo $this->db->last_query();exit();
        $result = $query_result->row();

        return $result;
    }
	
	
	public function holiday_info_for_summery_report($all_department,$department_name,$from_date,$chk_to_date,$to_date)
    {
       $this->db->select('COUNT(*) as no_of_holiday');
       $this->db->from('holiday_info');
		if($chk_to_date==1){
		$this->db->where('from_date >=', $from_date);
		$this->db->where('to_date <=', $to_date);
		}
		else{
			$this->db->where('from_date', $from_date);
		}
        
        $query_result = $this->db->get();
        //echo $this->db->last_query();exit();
        $result = $query_result->row();

        return $result;
    }
	
	public function show_summery_report_info($all_department,$department_name,$from_date,$chk_to_date,$to_date)
    {
		$chk_to_date_sql = "";
		if($chk_to_date==1)
		{
			$chk_to_date_sql = " AND b.`date` BETWEEN '".$from_date."' AND '".$to_date."'";
		}
		else
		{
			$chk_to_date_sql = " AND b.`date` = '".$from_date."'";
		}
			
	$sql="SELECT
			a.`employee_id`,
			a.`employee_name`,
			(SELECT SUM(`duration`) FROM tbl_attendense_log b WHERE a.`employee_id` = b.`employee_id` AND b.`duration` IS NOT NULL AND b.`duration` <> '' ".$chk_to_date_sql.") as 'working_hour',
			(SELECT count(*) FROM tbl_attendense_log b WHERE a.`employee_id` = b.`employee_id` AND b.`status` = 'P' ".$chk_to_date_sql.") as 'present',
			(SELECT count(*) FROM tbl_attendense_log b WHERE a.`employee_id` = b.`employee_id` AND b.`status` = 'A' ".$chk_to_date_sql.") as 'absent',
			(SELECT count(*) FROM tbl_attendense_log b WHERE a.`employee_id` = b.`employee_id` AND b.`status` = 'L' ".$chk_to_date_sql.") as 'late',
			(SELECT SUM(`no_of_leave_day`) FROM tbl_attendense_log b WHERE a.`employee_id` = b.`employee_id` AND b.`no_of_leave_day` IS NOT NULL AND b.`no_of_leave_day` <> '' ".$chk_to_date_sql.") as 'leave',
			(SELECT count(*) FROM tbl_attendense_log b WHERE a.`employee_id` = b.`employee_id` AND b.`early_out` IS NOT NULL AND b.`early_out` <> '' AND b.`early_out` <> '0' ".$chk_to_date_sql.") as 'early_out',
			(SELECT count(*) FROM tbl_attendense_log b WHERE a.`employee_id` = b.`employee_id` AND b.`status` = 'P' AND b.`holiday_name` IS NOT NULL AND b.`holiday_name` <> ''  ".$chk_to_date_sql.") as 'holiday_duty'
		FROM
			tbl_attendense_log a
		WHERE
			1=1";
		
		if($all_department==null)
		{
			$sql = $sql." AND a.`department` = '".$department_name."' " ;
		}
		if($chk_to_date==1)
		{
			$sql = $sql." AND a.`date` BETWEEN '".$from_date."' AND '".$to_date."'";
		}
		else
		{
			$sql = $sql." AND a.`date` = '".$from_date."'";
		}
		$sql = $sql."
		GROUP BY
		a.`employee_id`,a.employee_name
		ORDER BY
			a.`employee_id`";

		//echo $sql;exit();
		$query_result = $this->db->query($sql);
        $result = $query_result->result();
		return $result;

    }
/*
	public function details_in_out_report($check_employee,$employee_id,$from_date,$check_date,$to_date,$company_id)
    {
	$sql="SELECT tbl_card.company_id, tbl_card.employee_id,tbl_card.employee_name,tbl_card.ctime,tbl_card.device_id,
		 tbl_devices.DevId,tbl_devices.Slave,tbl_devices.location,tbl_devices.Group_id
	     FROM tbl_card
         INNER JOIN tbl_devices ON tbl_card.device_id = tbl_devices.DevId  and
         tbl_card.company_id= '".$company_id."' ";
		 if($check_employee == null){
			 $sql=$sql."AND  tbl_card.employee_id = '".$employee_id."'"	;
		 }		

		if($check_date == 1){
			 $sql=$sql."AND   date(tbl_card.ctime) BETWEEN '".$from_date."' AND '".$to_date."'";
		}
		else{
			 $sql=$sql."AND   date(tbl_card.ctime) = '".$from_date."'";
		}
		
		$sql=$sql."ORDER BY tbl_card.ctime";
		echo $sql;exit();
		$query_result = $this->db->query($sql);
		$result = $query_result->result();
		return $result;
		
	}

*/	
	public function details_in_out_report($company_id,$employee_id,$from_date)
    {
	$sql="SELECT company_id, employee_id,employee_name,ctime
	     FROM tbl_card WHERE company_id = '".$company_id."' AND  employee_id = '".$employee_id."' AND date(ctime) = '".$from_date."' AND status = '1'
         ";
		 
		$sql=$sql."ORDER BY ctime";
		//echo $sql;exit();
		$query_result = $this->db->query($sql);
		$result = $query_result->result();
		return $result;	
	}

	
	public function check_manual_attendence_if_exists($company_id,$employee_id,$in_time,$out_time)
    {
        $this->db->select('*');
        $this->db->from('tbl_manual_attendance');
        $this->db->where('company_id', $company_id);
        $this->db->where('employee_id', $employee_id);
        $this->db->where('in_time', $in_time);
        $this->db->where('out_time', $out_time);
        //echo $this->db->last_query();exit();
        $query_result = $this->db->get();
        $result = $query_result->row();
       // echo $this->db->last_query();exit();
        return $result;
    }
   

   

   public function check_manual_attendence_if_exists_while_update($company_id,$employee_id,$in_time,$out_time,$id)
    {
        $this->db->select('*');
        $this->db->from('tbl_manual_attendance');
        $this->db->where('company_id', $company_id);
        $this->db->where('employee_id', $employee_id);
        $this->db->where('in_time', $in_time);
        $this->db->where('out_time', $out_time);
         $this->db->where('id !=', $id);
      // echo $this->db->last_query();exit();
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
}
