<?php

class Holiday_model extends CI_Model {
    //put your code here
	public function save_new_weekend_holiday_info($company_id,$start_date,$description,$type,$recording_time,$recorded_by)
    {
		
		$sql = "INSERT INTO holiday_info (company_id, from_date, to_date, description,type,day_count,recording_time,recorded_by)
									VALUES ('".$company_id."','".$start_date."', '".$start_date."','".$description."','".$type."','1','".$recording_time."','".$recorded_by."')";
		
		$query_result = $this->db->query($sql);
		return $this->db->affected_rows() > 0;
       
    }
    public function save_new_holiday_info($company_id,$start_date,$description,$type,$recording_time,$recorded_by)
    {   
        //print_r($recorded_by); exit();

        $sql = "INSERT INTO holiday_info (company_id, from_date, to_date, description,type,day_count,recording_time,recorded_by)
                                    VALUES ('".$company_id."','".$start_date."', '".$start_date."','".$description."','".$type."','1','".$recording_time."','".$recorded_by."')";
        
        $query_result = $this->db->query($sql);
        return $this->db->affected_rows() > 0;
       
    }
	public function select_all_holiday_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('holiday_info');
        $this->db->where('company_id',$company_id);
        $this->db->order_by('from_date');
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }	
	public function check_duplicate_holiday($company_id,$start_date)
    {
        $this->db->select('*');
        $this->db->from('holiday_info');
        $this->db->where('company_id',$company_id);
        $this->db->where('date(from_date)',$start_date);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function check_duplicate_weekend($company_id,$start_date)
    {
        $this->db->select('*');
        $this->db->from('holiday_info');
        $this->db->where('company_id',$company_id);
        $this->db->where('date(from_date)',$start_date);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
        
		
	public function each_holiday_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('holiday_info');
        $this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	
		
	public function update_holiday_info($id,$company_id,$data){
		
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('holiday_info',$data);
    }
	
	public function delete_holiday_info($id){
        
        $this->db->where('id', $id);
        $this->db->delete('holiday_info');
    }
	
	public function show_holiday_report_info($from_date,$to_date,$chk_to_date,$company_id)
    {
        $this->db->select('*');
        $this->db->from('holiday_info');
		if($chk_to_date==1){
		$this->db->where('from_date >=', $from_date);
		$this->db->where('to_date <=', $to_date);
		}
		if($chk_to_date==null){
		$this->db->where('from_date', $from_date);
		}
		$this->db->where('company_id', $company_id);
        $this->db->order_by("from_date", "asc"); 
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }

    public function count_holiday_info($company_id,$from_date,$chk_to_date,$to_date)
    {
        
        $where_clause_for_date = "";
        
        if($chk_to_date==1)
        {
            $where_clause_for_date = " AND `from_date` BETWEEN '".$from_date."' AND '".$to_date."'";
        }
        else
        {   
            $where_clause_for_date = " AND `from_date` = '".$from_date."'";
        }
        
        $sql="SELECT
                company_id,
                (SELECT sum(day_count) FROM holiday_info WHERE  `type` = 'w' AND `company_id` = '".$company_id."' ".$where_clause_for_date.") as 'weekend_holiday',
                (SELECT sum(day_count) FROM holiday_info WHERE  `type` = 'gh' AND `company_id` = '".$company_id."' ".$where_clause_for_date.") as 'government_holiday',
                (SELECT sum(day_count) FROM holiday_info WHERE  `type` = 'sch' AND `company_id` = '".$company_id."' ".$where_clause_for_date.") as 'company_holiday'
                FROM holiday_info 
            WHERE
                1=1";

        $sql = $sql." AND `company_id` = '".$company_id."'";

        $sql = $sql." ".$where_clause_for_date;
        
        $sql = $sql."LIMIT 1";
        // echo $sql;exit();
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;

    }
	
	
	

	
   
}
