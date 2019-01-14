<?php
class Login_model extends CI_Model {
    //put your code here
    
    public function check_login_info($user_name,$password,$company_id)
    {
        $this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('user_name',$user_name);
        $this->db->where('password',md5($password));
        $this->db->where('company_id',$company_id);
        $this->db->where('is_active','1');
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function retrieve_company_names(){

        $this->db->select('*');
        $this->db->from('company_info');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

    public function retrieve_user_names($company_id){

         $this->db->select('*');
        $this->db->from('user_info');
        $this->db->where('company_id',$company_id);
        $this->db->where('is_active','1');
        $this->db->order_by('user_name','asc');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;

    }
}
