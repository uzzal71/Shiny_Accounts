<?php
class Income_model extends CI_Model {


public function retreive_last_income_id(){
	 $company_id= $_SESSION['company_id'];
		$this->db->select ('max(SUBSTRING(income_id,8,16)) as income_id');
        $this->db->from('tbl_income_history');
       
        $this->db->where('company_id',$company_id);
		$query_result = $this->db->get();
        $result = $query_result->row();
        //echo $this->db->last_query();exit();
		 return $result;


}


public function store_new_income($data){

	   $this->db->insert('tbl_income_history',$data);
        return $this->db->affected_rows() > 0;
}



public function data_for_payment_list(){
$company_id= $_SESSION['company_id'];
	$sql="SELECT
tbl_income_history.id,
tbl_income_history.income_id,
tbl_income_history.income_amount,
tbl_income_history.income_date,
tbl_income_history.total_amount,
tbl_income_history.project_id,
project_info.project_name,
project_info.customer_name
FROM
tbl_income_history
INNER JOIN project_info ON tbl_income_history.project_id = project_info.project_id
WHERE
tbl_income_history.company_id='$company_id'
GROUP BY
income_id

ORDER BY
income_id ASC ";

$query_result = $this->db->query($sql);

//echo $this->db->last_query();exit();
		$result = $query_result->result();
		return $result;	

}


	public function retrieve_income_info_by_id($id){
		$company_id= $_SESSION['company_id'];
		$this->db->select('*');
		$this->db->from('tbl_income_history');
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);

		   $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;

	}


	public function update_income($id,$data){


		  $this->db->where('id',$id);
        $this->db->update('tbl_income_history',$data);
        return $this->db->affected_rows() > 0;
	}


	public function store_income_edit_history($data){

	   $this->db->insert('tbl_income_edit_history',$data);
        return $this->db->affected_rows() > 0;
}

public function show_income_report($from_date,$to_date,$project_id,$company_id) {

	 $this->db->select('*');
    $this->db->from('tbl_income_history');
    $this->db->where('company_id',$company_id);
    if ($to_date=="" && $from_date!=="") {
    $this->db->where('income_date',$from_date);	
    }if ($to_date!=="") {
    	$this->db->where('income_date >=', $from_date);
    $this->db->where('income_date <=', $to_date);
    }if ($project_id!=="select") {
    	$this->db->where('project_id',$project_id);	
    }

    $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;


}

public function select_all_for_vat_ait_report(){
	$company_id= $_SESSION['company_id'];
	$this->db->select('*');
	$this->db->from('tbl_income_history');
 	$this->db->where('company_id',$company_id);

 	    $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;

}


public function show_ait_vat_report($from_date,$to_date,$project_id,$company_id,$income_id) {

	 $this->db->select('*');
    $this->db->from('tbl_income_history');
    $this->db->where('company_id',$company_id);
    if ($to_date=="" && $from_date!=="") {
    $this->db->where('income_date',$from_date);	
    }if ($to_date!=="") {
    	$this->db->where('income_date >=', $from_date);
    $this->db->where('income_date <=', $to_date);
    }if ($project_id!=="select") {
    	$this->db->where('project_id',$project_id);	
    }
    if ($income_id!=="select") {
    	$this->db->where('income_id',$income_id);	
    }

    $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;


}


}?>