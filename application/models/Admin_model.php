<?php

class Admin_model extends CI_Model {
    //put your code here

	public function update_password($password,$company_id,$user_name)
    {	
		$sql = "update user_info SET password = '".md5($password)."' WHERE  company_id = '".$company_id."' AND user_name = '".$user_name."'";
		$query_result = $this->db->query($sql);
		return $this->db->affected_rows() > 0;
		
    } 

	
	
   
}
