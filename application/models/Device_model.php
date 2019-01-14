<?php

class Device_model extends CI_Model {
    //put your code here
    
      
    public function save_device_info($data)
    {
        $this->db->insert('tbl_devices',$data);
        return $this->db->affected_rows() > 0;
      
    }    

    public function save_device_to_command_info($command_data)
    {
        $this->db->insert('tbl_command_list',$command_data);
		return $this->db->affected_rows() > 0;
      
    }

	public function select_all_device_list($company_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_devices');
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }	
	public function select_each_device($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_devices');
        $this->db->where('id',$id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
    public function select_device_id_name($DevId,$DeviceName,$company_id)
    {
        $sql= "SELECT * FROM tbl_devices  WHERE  DevId = '".$DevId."' OR DeviceName = '".$DeviceName."' AND company_id = '".$company_id."'" ;
        $query_result = $this->db->query($sql);
        $result = $query_result->row();

        return $result;
    }	

    public function select_IpAddress($IpAddress,$company_id)
    {
		$sql= "SELECT * FROM tbl_devices  WHERE  IpAddress = '".$IpAddress."'  AND company_id = '".$company_id."'" ;
        $query_result = $this->db->query($sql);
        $result = $query_result->row();

        return $result;
    }
	public function update_device_info($data,$id,$company_id)
	{
		$this->db->where('id',$id);
		$this->db->where('company_id',$company_id);
        $this->db->update('tbl_devices',$data);
		return $this->db->affected_rows() > 0;
    }
	public function delete_device_info($id,$company_id){
        
        $this->db->where('id', $id);
		$this->db->where('company_id',$company_id);
        $this->db->delete('tbl_devices');
    }
	
        public function select_each_device_for_sync($comapny_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_devices');
        $this->db->where('company_id',$comapny_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }

         public function select_target_device_for_sync($company_id,$source_device)
    {
        $this->db->select('*');
        $this->db->from('tbl_devices');
        $this->db->where('company_id',$company_id);
        $this->db->where('DevId !=',$source_device,FALSE);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }

    public function source_device_info($company_id,$source_device){

         $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('company_id',$company_id);
        $this->db->where('deviceID',$source_device);
        $this->db->where('status','1');
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }

  public function list_source_device_info($company_id){

         $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('company_id',$company_id);
       
        $this->db->where('status','1');
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }


    public function pick_all_device($company_id){
        $this->db->select('*');
        $this->db->from('tbl_devices');
        $this->db->where('company_id',$company_id);
       
        $this->db->where('Active','1');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;

    }
	
   
}
