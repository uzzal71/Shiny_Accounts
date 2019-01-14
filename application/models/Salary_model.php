<?php

class Salary_model extends CI_Model {

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
	
	public function select_in_time_info($employee_id,$shift_start_from_with_date_from,$date_from)
    {
		//$sql="select MIN(ctime) as in_time from tbl_card where  date(ctime) = '".$date_from."' and ctime >= '".$shift_start_from_with_date_from."' and company_id =  '".$_SESSION["company_id"]."' and employee_id= '".$employee_id."'";
		$sql = "SELECT
				MIN(ctime) AS in_time
				FROM
					tbl_card,
					tbl_devices
				WHERE
					tbl_devices.DevId = tbl_card.device_id
					AND tbl_devices.Slave = 0
					AND date(ctime) = '".$date_from."'
					AND ctime >= '".$shift_start_from_with_date_from."'
					AND employee_id = '".$employee_id."'
					AND tbl_card.company_id = '".$_SESSION["company_id"]."'
					GROUP BY
					employee_id";
	
		$query_result = $this->db->query($sql);
		$result = $query_result->row();
		return $result;
		
	}

	public function select_out_time_info($employee_id,$date_from_for_out_time,$shift_end_from)
    {
		//$sql="select MAX(ctime) as out_time from tbl_card where   date(ctime) = '".$date_from_for_out_time."' and ctime > '".$date_from_for_out_time." ".$shift_end_from."'  and company_id =  '".$_SESSION["company_id"]."' and employee_id= '".$employee_id."'";
		$sql = "SELECT
				MAX(ctime) AS out_time
				FROM
					tbl_card,
					tbl_devices
				WHERE
					tbl_devices.DevId = tbl_card.device_id
					AND tbl_devices.Slave = 1
					AND date(ctime) = '".$date_from_for_out_time."'
					AND ctime >= '".$date_from_for_out_time." ".$shift_end_from."'
					AND employee_id = '".$employee_id."'
					AND tbl_card.company_id = '".$_SESSION["company_id"]."'
					GROUP BY
					employee_id";
		$query_result = $this->db->query($sql);
		$result = $query_result->row();
		return $result;
		
	}
	
	public function select_holiday_from_date($date_from)
    {
        $this->db->select('*');
        $this->db->from('holiday_info');
        $this->db->where('company_id',$_SESSION["company_id"]);
        $this->db->where('date',$date_from);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }	
		
	public function select_approved_leave_by_employee_id($date_from, $employee_id)
    {
		$sql="SELECT * FROM leave_info where  approval_status='1' and employee_id = '".$employee_id."' and company_id = '".$_SESSION["company_id"]."' and '".$date_from."' BETWEEN date(date_time_from) and date(date_time_to)";

		$query_result = $this->db->query($sql);
		$result = $query_result->row();
		return $result;
		
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



	
	
   
}
