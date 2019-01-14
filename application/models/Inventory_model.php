<?php

class Inventory_model extends CI_Model {
    //put your code here
	


public function select_uom_short_name_info()
    {   
        $this->db->select('uom_short_name');
        $this->db->from('uom_info');
        $this->db->order_by("uom_short_name");
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }

	 public function select_item_type_info()
    {	
        $company_id = $this->session->userdata('company_id');
		$this->db->select('*');
        $this->db->from('tbl_item_type');
		$this->db->order_by('type_name','ASC');
         $this->db->where('is_active','1');
          $this->db->where('company_id',$company_id);
		$query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }


 public function select_all_items_info(){
    $this->db->select('*');
    $this->db->from('tbl_items');
    $this->db->where('status','1');
    $query_result=$this->db->get();
    $result=$query_result->result();
    return $result;

 }

	 public function check_item_name($item_name)
    {
        $this->db->select('*');
        $this->db->from('tbl_items');
        $this->db->where('item_name',$item_name);
        $this->db->where('status','1');
		$query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    public function all_finished_item()
    {
    	$this->db->select('*');
    	$this->db->from('item_info');
		$this->db->where('item_type', 'Finished Good');
    	$this->db->order_by("item_name");
    	$query_result=$this->db->get();
    	$result=$query_result->result();
    	return $result;
    }
	
	
    public function all_raw_item()
    {
    	$this->db->select('*');
    	$this->db->from('item_info');
		$this->db->where('item_type', 'Raw Material');
    	$this->db->order_by("item_name");
    	$query_result=$this->db->get();
    	$result=$query_result->result();
    	return $result;
    }
	
	 public function check_item_code($item_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_items');
        $this->db->where('item_id',$item_id);
		$query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }

     public function retrieve_item_info_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_items');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }





     public function select_item_id()
    {
        $this->db->distinct();
        $this->db->select('item_id');
        $this->db->from('tbl_items');
        $this->db->where('status','1');
         $this->db->order_by('item_id','ASC');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

    public function pick_item_id($item_id)
    {

        // $query_result = $this->db->query('SELECT DISTINCT item_id,item_name,uom from tbl_items ');

        //       $result = $query_result->result();
        $this->db->select('*');
        $this->db->from('tbl_items');
         $this->db->where('status','1');
        $this->db->where('item_id',$item_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
	
	  
    public function save_new_item_info($data)
    {
	 
     $query=$this->db->insert('tbl_items',$data); 
      
     //return $query;
		
    }
	
	public function save_new_product_map($data)
    {
		
        $this->db->insert('product_mapping',$data); 
		
    }
	

    public function update_items_info($id,$data){

        $this->db->where('id',$id);
        $this->db->update('tbl_items',$data);
        return $this->db->affected_rows() > 0;
    }

     public function delete_items_info($id,$data){
        $this->db->where('id', $id);
        $this->db->update('tbl_items',$data);
         return $this->db->affected_rows() > 0;
        
    
    }


public function select_employee_data(){

        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->order_by('employee_id','asc');
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;



}

public function assigned_employee_info(){
		$this->db->distinct('employee_id');
        $this->db->select('employee_id,employee_name');
        $this->db->from('tbl_assigned_history');
		

        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;



}




    public function delete_product($id){

        $this->db->where('id', $id);
      
        $this->db->delete('tbl_products');
    }
    
    public function pre_recieved_info($item_id){
        $this->db->Select('quantity');
        $this->db->From('tbl_items');
        $this->db->where('item_id',$item_id);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;

    }

    public function recieved_item_update($item_id,$squantity,$current_unit_price){
        $sql="UPDATE tbl_items set quantity = '$squantity', unit_price='$current_unit_price' where item_id ='$item_id'";
            $query_result = $this->db->query($sql);
            return $this->db->affected_rows() > 0;

    }

    public function issued_item_update($item_id,$squantity){
        $sql="UPDATE tbl_items set quantity = '$squantity' where item_id ='$item_id'";
        $query_result = $this->db->query($sql);
        return $this->db->affected_rows() > 0;

    }

	public function select_item_name_info()
    {	$this->db->select('item_name,item_code');
        $this->db->from('item_info');
		$this->db->order_by("item_name");
		$query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
	
	 public function select_issued_by_full_name($id)
    {	$this->db->select('full_name');
        $this->db->from('user_info');
		$this->db->order_by("full_name");
		$this->db->where('id !=',$id);
		$query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
	
	public function select_project_info()
    {	$this->db->select('id, project_name,project_id, project_short_name,customer_name');
        $this->db->from('project_info');
		$this->db->order_by('project_id','ASC');
		$this->db->where('project_status','Running');
		$query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
	
	public function check_issue_info($item_name,$item_code,$date_of_issuing,$issued_by,$project,$issue_quantity,$uom,$unit_price,$recording_time,$recorded_by)
    {

		
		$this->db->select('*');
        $this->db->from('material_issue');
		$this->db->where('item_name',$item_name);
		$this->db->where('item_code',$item_code);
		$this->db->where('date_of_issuing',$date_of_issuing);
		$this->db->where('issued_by',$issued_by);
		$this->db->where('project',$project);
		$this->db->where('issue_quantity',$issue_quantity);
		$this->db->where('unit_price',$unit_price);
		$this->db->where('recorded_by',$recorded_by);
		$this->db->where('recording_time >',"DATE_SUB(NOW(), INTERVAL 1 MINUTE)");
		
		$query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	
	
  
	public function save_material_issue_info($data)
    {
       $this->db->insert('material_issue',$data);
    }
	
	public function received_by_full_name($id)
    {	$this->db->select('full_name,id');
        $this->db->from('user_info');
		$this->db->order_by("full_name");
		$this->db->where('id =',$id);
		$query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }
	
	public function select_supplier_list_info()
    {	$this->db->select('id, full_name,short_name,supplier_id');
        $this->db->from('supplier_info');
		$this->db->order_by("full_name");
		$this->db->where('short_name !=','"opening_balance"');
		$query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }

    public function select_supplier_info($supplier_id)
    {   $this->db->select('full_name,supplier_contact,supplier_address');
        $this->db->from('supplier_info');
        $this->db->where('supplier_id',$supplier_id);
        $query_result = $this->db->get();
        $result = $query_result->row();;

        return $result;
    }
	
		public function check_receive_info($item_name,$item_code,$receiveing_date,$received_by,$supplier,$uom,$receiving_quantity,$unit_price,$recording_time,$recorded_by)
    {

		
		$this->db->select('*');
        $this->db->from('material_receive');
		$this->db->where('item_name',$item_name);
		$this->db->where('item_code',$item_code);
		$this->db->where('receiveing_date',$receiveing_date);
		$this->db->where('received_by',$received_by);
		$this->db->where('supplier',$supplier);
		$this->db->where('uom',$uom);
		$this->db->where('receiving_quantity',$receiving_quantity);
		$this->db->where('unit_price',$unit_price);
		$this->db->where('recorded_by',$recorded_by);
		$this->db->where('recording_time >',"DATE_SUB(NOW(), INTERVAL 1 MINUTE)");
		
		$query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	
	 public function save_material_receiving_info($log)
    {
        $this->db->insert('tbl_item_transaction', $log);
        return $this->db->affected_rows() > 0;

        
    }
   
      public function select_last_item_id(){

    $this->db->select ('max(SUBSTRING(item_id,9,6)) as last_id');
        $this->db->from('tbl_items');
        $query_result = $this->db->get();
        $result = $query_result->row();
        //echo $this->db->last_query();exit();
         return $result;

        
    }
public function select_last_item_recieve_id(){

    $this->db->select ('max(SUBSTRING(log_id,9,6)) as last_id');
        $this->db->from('tbl_item_transaction');
        $query_result = $this->db->get();
        $result = $query_result->row();
        //echo $this->db->last_query();exit();
         return $result;

        
    }


    public function pick_item_id_with_stock($item_id){

    // $this->db->select ('item_name,uom,quantity ');
    //     $this->db->from('tbl_items');

        $this->db->select('item_name,uom,quantity');
        $this->db->from('tbl_items');

        $this->db->where('item_id',$item_id);
    
        $query_result = $this->db->get();
        $result = $query_result->row();
        //echo $this->db->last_query();exit();
         return $result;

        
    }


 public function all_data_tbl_items(){

    // $this->db->select ('item_name,uom,sum(quantity) as quantity ');
    //     $this->db->from('tbl_items');
        $this->db->distinct();
        $this->db->select('item_id,item_name');
        $this->db->where('status','1');
        $this->db->order_by('item_id','ASC');
        $this->db->from('tbl_items');
        $this->db->where('status','1');
         //$this->db->limit('20');
    
        $query_result = $this->db->get();
        $result = $query_result->result();
        //echo $this->db->last_query();exit();
         return $result;

        
    }




public function load_previuos_product_code(){

  $this->db->select ('max(SUBSTRING(product_id,9,6)) as last_id');
        $this->db->from('tbl_products');
        $query_result = $this->db->get();
        $result = $query_result->row();
        //echo $this->db->last_query();exit();
         return $result;



}

public function pick_searched_data($requisition_no){

   
   $this->db->select('*');
   $this->db->from('tbl_requisition');
   $this->db->where('requisition_no',$requisition_no);
        $query_result = $this->db->get();
            $result = $query_result->row();

        return $result;

    }

public function all_product_data(){

        $this->db->Select('*');

        $this->db->from('tbl_products');
        $query_result = $this->db->get();
        $result = $query_result->result();
        
         return $result;


}


public function select_individual_product($id){

            $this->db->Select('*');
            $this->db->from('tbl_products');
            $this->db->where('id',$id);
            $query_result = $this->db->get();
            $result = $query_result->row();

            return $result;


}


public function select_individual_product_by_product_id($item_id){

            $this->db->Select('*');
            $this->db->from('tbl_products');
            $this->db->where('item_id_product',$item_id);
            $query_result = $this->db->get();
            $result = $query_result->row();

            return $result;


}

public function select_individual_product_by_product_id_2($product_id){
        $this->db->Select('*');
            $this->db->from('tbl_products');
            $this->db->where('product_id',$product_id);
            $query_result = $this->db->get();
            $result = $query_result->row();

            return $result;



}

public function select_last_requisition_data_by_requisition_id($requisition_no){

  $this->db->Select('requisition_info');
  $this->db->from('tbl_requisition');
  $this->db->where('requisition_no',$requisition_no);
   $query_result = $this->db->get();
    $result = $query_result->row();

    return $result;


}


public function select_individual_product_definition($id){

            $this->db->Select('product_definition');
            $this->db->from('tbl_products');
            $this->db->where('id',$id);
            $query_result = $this->db->get();
            $result = $query_result->row();

            return $result;


}

  public function save_new_product($data){

 $this->db->insert('tbl_products', $data);
        return $this->db->affected_rows() > 0;


  }  


  public function update_product_info($data,$product_id){

             $this->db->where('product_id',$product_id);
        $this->db->update('tbl_products',$data);
        return $this->db->affected_rows() > 0;
  }



  public function save_new_requisition_request($data){
    $this->db->insert('tbl_requisition', $data);
        return $this->db->affected_rows() > 0;

  }


  public function select_last_requisition_id(){
 $this->db->select ('max(SUBSTRING(requisition_no,9,6)) as last_id');
        $this->db->from('tbl_requisition');
        $query_result = $this->db->get();
        $result = $query_result->row();
        //echo $this->db->last_query();exit();
         return $result;


  }

  public function pick_all_requisiton_name(){

$this->db->select('requisition_no');
$this->db->from('tbl_requisition');
$this->db->where('requisition_status',"checked");
$query_result = $this->db->get();
        $result = $query_result->result();
 return $result;

  }

   public function pick_all_requisiton_name_to_issue(){

$this->db->select('requisition_no');
$this->db->from('tbl_requisition');
$this->db->where('requisition_status',"pending");
$query_result = $this->db->get();
        $result = $query_result->result();
 return $result;

  }


  public function select_last_issue_id(){
 $this->db->select ('max(SUBSTRING(issue_id,9,7)) as last_id');
        $this->db->from('tbl_requisition');
        $query_result = $this->db->get();
        $result = $query_result->row();
        //echo $this->db->last_query();exit();
         return $result;


  }



  public function issued_item_save($requisition_no,$data){

$this->db->where('requisition_no',$requisition_no);
        $this->db->update('tbl_requisition',$data);
        return $this->db->affected_rows() > 0;

  }



  public function pick_last_damage_id(){


    $this->db->select ('max(SUBSTRING(damage_no,9,6)) as last_id');
        $this->db->from('tbl_damages');
        $query_result = $this->db->get();
        $result = $query_result->row();
        //echo $this->db->last_query();exit();
         return $result;
  }


  public function damage_entry_save($data){

$query=$this->db->insert('tbl_damages',$data); 


return $query;
  }


    public function retrieve_all_product_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_items');
        $this->db->where('product','product');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

    public function retrieve_all_item_info()
    {
        $this->db->select('*');
        $this->db->from('tbl_items');
        $this->db->where('product','no');
         $this->db->order_by('item_id');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
public function show_items_report_info($from_date,$to_date,$chk_to_date,$item_type,$company_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_items');
        if($chk_to_date==1){

        $this->db->where(' recording_date >=',$from_date);
        $this->db->where( 'recording_date <=' ,$to_date);

        }
        if($chk_to_date==null){
        $this->db->where('recording_date>=', $from_date);
       
        } if($item_type!=='All'){
        $this->db->where('item_type', $item_type);
       
        }


        $this->db->where('company_id', $company_id);
        $this->db->order_by('item_id', 'asc'); 
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }


public function pick_recieved_item_id(){
$this->db->select('log_id');
$this->db->from('tbl_item_transaction');
$query_result = $this->db->get();
        $result = $query_result->result();

        return $result;

}

public function recieve_items_report_info($from_date,$to_date,$chk_to_date,$company_id,$supplier_id,$log_id){

        $this->db->select('*');
        $this->db->from('tbl_item_transaction');
        if($chk_to_date==1){

        $this->db->where(' date >=',$from_date);
        $this->db->where( 'date <=' ,$to_date);

        }
        if($chk_to_date==null && $from_date !=='' ){
        $this->db->where('date', $from_date);
       // $this->db->where('recording_time<', $from_date);
        }
        if (($supplier_id)!=='select') {
           $this->db->where('supplier_id', $supplier_id);
        }
        if (($log_id)!=='select') {
             $this->db->where('log_id', $log_id);
        }
        $this->db->where('company_id', $company_id);
        $this->db->order_by('log_id', 'asc'); 
        $query_result = $this->db->get();
        $result = $query_result->result();
         return $result;

}


public function requisition_info_for_report(){

    $this->db->select('requisition_no,issue_id');
    $this->db->from('tbl_requisition');

        $query_result = $this->db->get();
        $result = $query_result->result();
         return $result;
}

public function requisition_info_for_crossmatch_report(){
    $this->db->select('requisition_no');
    $this->db->from('tbl_requisition');
    $this->db->where('issue_info!=');

        $query_result = $this->db->get();
        $result = $query_result->result();
         return $result;
}
public function issue_info_for_report(){

    $this->db->select('issue_id');
    $this->db->from('tbl_requisition');
    $this->db->where('requisition_status ','issued');
        $query_result = $this->db->get();
        $result = $query_result->result();
         return $result;
}

public function recieve_requisition_report_info($from_date,$to_date,$chk_to_date,$requisition_id,$employee_id,$company_id,$project_id){

        $this->db->select('*');
        $this->db->from('tbl_requisition');

         if($chk_to_date==1){

        $this->db->where(' date >=',$from_date);
        $this->db->where( 'date <=' ,$to_date);

        }
        if($chk_to_date==null){
        $this->db->where('date', $from_date);
       // $this->db->where('recording_time<', $from_date);
        }        
        if (($employee_id)!=='select') {
           $this->db->where('employee_id', $employee_id);
        }
        if (($requisition_id)!=='select') {
             $this->db->where('requisition_no', $requisition_id);
        }
        if (($project_id)!=='select') {
             $this->db->where('project_id', $project_id);
        }
        
        $this->db->where('company_id', $company_id);
        $this->db->order_by('requisition_no', 'asc'); 
        $query_result = $this->db->get();
         //echo $this->db->last_query();exit();
        $result = $query_result->result();

         return $result;

}

public function recieve_issue_report_info($from_date,$to_date,$chk_to_date,$issue_id,$employee_id,$company_id,$project_id){

        $this->db->select('*');
        $this->db->from('tbl_requisition');
        if($chk_to_date==1){

        $this->db->where(' date >=',$from_date);
        $this->db->where( 'date <=' ,$to_date);

        }
        if($chk_to_date==null){
        $this->db->where('date', $from_date);
       // $this->db->where('recording_time<', $from_date);
        }
        if (($employee_id)!=='select') {
           $this->db->where('employee_id', $employee_id);
        }
        if (($issue_id)!=='select') {
             $this->db->where('issue_id', $issue_id);
        }
        if (($project_id)!=='select') {
             $this->db->where('project_id', $project_id);
        }
        $this->db->where('requisition_status', 'issued');
        $this->db->where('company_id', $company_id);
        $this->db->order_by('requisition_no', 'asc'); 
        $query_result = $this->db->get();
        $result = $query_result->result();
         return $result;

}

public function recieve_item_info_for_report($item_name,$item_id,$from_date,$to_date,$chk_to_date,$company_id){

        $this->db->select('*');
        $this->db->from('tbl_items');
        if($chk_to_date==1){

        $this->db->where(' date >=',$from_date);
        $this->db->where( 'date <=' ,$to_date);

        }
        if($chk_to_date==null){
        $this->db->where('recording_date', $from_date);
       // $this->db->where('recording_time<', $from_date);
        }
        if (($item_name)!=='select') {
           $this->db->where('item_id', $item_name);
        }
        if (($item_id)!=='select') {
             $this->db->where('item_id', $item_id);
        }
        
        $this->db->where('company_id', $company_id);
        $this->db->order_by('item_id', 'asc'); 
        $query_result = $this->db->get();
        $result = $query_result->result();
         return $result;

}


public function recieve_products_info_for_report($item_name,$item_id,$from_date,$to_date,$chk_to_date,$company_id){

        $this->db->select('*');
        $this->db->from('tbl_items');
        if($chk_to_date==1){

        $this->db->where(' date >=',$from_date);
        $this->db->where( 'date <=' ,$to_date);

        }
        if($chk_to_date==null){
        $this->db->where('recording_date', $from_date);
       // $this->db->where('recording_time<', $from_date);
        }
        if (($item_name)!=='select') {
           $this->db->where('item_id', $item_name);
        }
        if (($item_id)!=='select') {
             $this->db->where('item_id', $item_id);
        }
        $this->db->where('product', 'product');
        $this->db->where('company_id', $company_id);
        $this->db->order_by('item_id', 'asc'); 
        $query_result = $this->db->get();
        $result = $query_result->result();
         return $result;

}

public function all_materials_data_tbl_items(){

    // $this->db->select ('item_name,uom,sum(quantity) as quantity ');
    //     $this->db->from('tbl_items');
        $this->db->distinct();
        $this->db->select('item_id,item_name');
            $this->db->order_by('item_id','ASC');
        $this->db->from('tbl_items');
        //$this->db->where('product','no');
        // $this->db->limit('20');
    
        $query_result = $this->db->get();
        $result = $query_result->result();
        //echo $this->db->last_query();exit();
         return $result;

        
    }

    public function recieve_materials_info_for_report($item_name,$item_id,$from_date,$to_date,$chk_to_date,$company_id){

        $this->db->select('*');
        $this->db->from('tbl_items');
        if($chk_to_date==1){

        $this->db->where(' date >=',$from_date);
        $this->db->where( 'date <=' ,$to_date);

        }
        if($chk_to_date==null){
        $this->db->where('recording_date', $from_date);
       // $this->db->where('recording_time<', $from_date);
        }
        if (($item_name)!=='select') {
           $this->db->where('item_id', $item_name);
        }
        if (($item_id)!=='select') {
             $this->db->where('item_id', $item_id);
        }
        
        $this->db->where('company_id', $company_id);
        $this->db->order_by('item_id', 'asc'); 
        $query_result = $this->db->get();
        $result = $query_result->result();
         return $result;

}  

public function work_in_progress_data(){


    $this->db->select('*');
    $this->db->from('tbl_items');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;
}


public function all_requisition_data(){

    $this->db->select('*');
    $this->db->from('tbl_requisition');
    $this->db->where('requisition_status','pending');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;

}


public function each_requisition_data($id){

    $this->db->select('*');
    $this->db->from('tbl_requisition');
    $this->db->where('id',$id);

    $query_result = $this->db->get();
    $result = $query_result->row();
    return $result;

}


public function update_requisition($data,$requisition_no){



$this->db->where('requisition_no',$requisition_no);
        $this->db->update('tbl_requisition',$data);
        return $this->db->affected_rows() > 0;

}


public function retrieve_wip_info_for_item($item_id){

        $this->db->select('wip_quantity');
        $this->db->from('tbl_items');
        $this->db->where('item_id',$item_id);

         $query_result = $this->db->get();
        $result = $query_result->row();
         return $result;


}


public function update_wip_quantity($item_id,$squantity){

            $sql="UPDATE tbl_items set wip_quantity = '$squantity' where item_id ='$item_id'";
            $query_result = $this->db->query($sql);
            return $this->db->affected_rows() > 0;
}


public function retrieve_assigned_info_for_item($item_id){

        $this->db->select('assigned_quantity');
        $this->db->from('tbl_items');
        $this->db->where('item_id',$item_id);

         $query_result = $this->db->get();
        $result = $query_result->row();
         return $result;


}

public function retrieve_quantity_assigned_info_for_item($item_id){

        $this->db->select('quantity');
        $this->db->from('tbl_items');
        $this->db->where('item_id',$item_id);

         $query_result = $this->db->get();
        $result = $query_result->row();
         return $result;


}

public function update_assigned_quantity($item_id,$squantity){
            

       $sql="UPDATE tbl_items set assigned_quantity = '$squantity' where item_id ='$item_id'";
            $query_result = $this->db->query($sql);
            return $this->db->affected_rows() > 0;

}

public function update_current_assigned_quantity($item_id,$lquantity){
            

       $sql="UPDATE tbl_items set quantity = '$lquantity' where item_id ='$item_id'";
            $query_result = $this->db->query($sql);
            return $this->db->affected_rows() > 0;

}

public function update_checked_requisition($data,$requisition_id){

        $this->db->where('requisition_no',$requisition_id);
        $this->db->update('tbl_requisition',$data);
        return $this->db->affected_rows() > 0;
  }


public function update_wip_info_for_product_recieve($wip_item_id,$total_quantity){

$sql="UPDATE tbl_items set wip_quantity = '$total_quantity' where item_id ='$wip_item_id'";
            $query_result = $this->db->query($sql);
            return $this->db->affected_rows() > 0;


}


public function select_wip_quantity_by_item_id($wip_item_id){

    $this->db->select('wip_quantity');
    $this->db->where('item_id',$wip_item_id);
    $this->db->from('tbl_items');
    $query_result = $this->db->get();
        $result = $query_result->row();
         return $result;

}


public function select_assigned_quantity_by_item_id($assigned_item_id){

    $this->db->select('assigned_quantity');
    $this->db->where('item_id',$assigned_item_id);
    $this->db->from('tbl_items');
    $query_result = $this->db->get();
        $result = $query_result->row();
         return $result;

}

public function update_assigned_info_for_product_recieve($assigned_item_id,$total_quantity){

$sql="UPDATE tbl_items set assigned_quantity = '$total_quantity' where item_id ='$assigned_item_id'";
            $query_result = $this->db->query($sql);
            return $this->db->affected_rows() > 0;


}




public function retrieve_master_inventory_report_data($quantity,$company_id,$item_name){


        $this->db->select('*');
        $this->db->from('tbl_items');
      
        if (($quantity)!=='') {
           $this->db->where('quantity<=', $quantity);
        }
        if (($item_name)!=='') {
             $this->db->where('item_id', $item_name);
        }
        $this->db->where('company_id', $company_id);
        $this->db->order_by('item_id', 'asc'); 
        $query_result = $this->db->get();
        $result = $query_result->result();
         return $result;


}


public function retrieve_wip_inventory_report_data ($item_id,$all_item,$company_id){

    
    if ($item_id!='select') {
        $this->db->select('*');
         $this->db->from('tbl_items');
         $this->db->where('item_id', $item_id);
        }
        else{

        $this->db->select('*');
        $this->db->from('tbl_items');

        }
        
        
        $this->db->where('company_id', $company_id);
        $this->db->order_by('item_id', 'asc'); 
        $query_result = $this->db->get();
        $result = $query_result->result();
         return $result;



}

public function retrieve_current_stock_by_item_id($item_id){
$data = array();
$this->db->select('quantity,uom');
$this->db->from('tbl_items');
$this->db->where('item_id',$item_id);
$query_result = $this->db->get();
$result = $query_result->result_array();
      foreach ($result as $value) {
          $data['quantity'] = $value['quantity'];
          $data['uom'] = $value['uom'];
      }
      return $data;
}


public function requisition_delete($id){

$this->db->where('id', $id);
      
$this->db->delete('tbl_requisition');
 return $this->db->affected_rows() > 0;

}

public function show_damaged_data ($employee_id,$project_id,$from_date,$to_date,$check_to_date,$company_id){

    
    
        $this->db->select('*');
        $this->db->from('tbl_damages');
        if($check_to_date==1){

        $this->db->where(' date >=',$from_date);
        $this->db->where( 'date <=' ,$to_date);

        }
        if($check_to_date==null && $from_date!=='' ){
        $this->db->where('date', $from_date);
        }
        if (($employee_id)!=='') {
           $this->db->where('employee_id', $employee_id);
        }
        if (($project_id)!=='') {
             $this->db->where('project_id', $project_id);
        }
        $this->db->where('company_id', $company_id);
        //$this->db->order_by('item_id', 'asc'); 
        $query_result = $this->db->get();
        $result = $query_result->result();
         return $result;




}

public function pick_employee_name_by_employee_id($employee_id){
$data=array();
    $this->db->select('first_name,last_name');
    $this->db->from('tbl_employee');
    $this->db->where('employee_id',$employee_id);
    $query_result = $this->db->get();
$result = $query_result->result_array();
      foreach ($result as $value) {
          $data['first_name'] = $value['first_name'];
          $data['last_name'] = $value['last_name'];
      }
      return $data;
}

public function pick_item_name($item_id){

        $this->db->select('item_name');
        $this->db->from('tbl_items');
        $this->db->where('item_id',$item_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
         return $result;


}

public function check_product_definition_exist($item_id_product){

        $this->db->select('product_name');
        $this->db->from('tbl_products');
        $this->db->where('item_id_product',$item_id_product);
        $query_result = $this->db->get();
        $result = $query_result->row();
         return $result;


}

public function requisition_info_for_crossmatch($requisition_id){

    $this->db->select('*');
    $this->db->from('tbl_requisition');
    $this->db->where('requisition_no',$requisition_id);

        $query_result = $this->db->get();
        $result = $query_result->result();
         return $result;
}

public function approved_requisition_data(){

    $this->db->select('*');
    $this->db->from('tbl_requisition');
    $this->db->where('requisition_status','checked');
    $query_result = $this->db->get();
    $result = $query_result->result();
    return $result;

}public function update_approved_requisition($data,$requisition_no){



$this->db->where('requisition_no',$requisition_no);
        $this->db->update('tbl_requisition',$data);
        return $this->db->affected_rows() > 0;

}

     public function save_assigned_material_info($assigned)
    {
        $this->db->insert('tbl_assigned_history', $assigned);
        return $this->db->affected_rows() > 0;

        
    }


   public function assigned_item_retrieve_by_employee_id($employee_id){


        $this->db->select('*');
        $this->db->from('tbl_assigned_history');
        $this->db->where('employee_id',$employee_id);
        $this->db->where('quantity >','0');
        $query_result = $this->db->get();
        $result = $query_result->result();
         return $result;


   }


   public function retreive_assigned_quantity_for_employee_item($assigned_item_id,$assigned_to,$requisition_no){

    $this->db->select('quantity');
    $this->db->from('tbl_assigned_history');
    $this->db->where('employee_id',$assigned_to);
    $this->db->where('item_id',$assigned_item_id);
    $this->db->where('requisition_no',$requisition_no);
     $query_result = $this->db->get();
        $result = $query_result->row();
         return $result;


   }


  public function update_assigned_history_item($assigned_item_id,$update_quantity,$assigned_to,$requisition_no){

    $data=array();
    $data['quantity']=$update_quantity;
    $data['updated_at']=date("y-m-d h:i:s");

     $this->db->where('item_id',$assigned_item_id);
     $this->db->where('employee_id',$assigned_to);
      $this->db->where('requisition_no',$requisition_no);
        $this->db->update('tbl_assigned_history',$data);
        return $this->db->affected_rows() > 0;
  }



  public function just_pick_stock_unit_price($item_id){

            $this->db->Select('quantity,unit_price,uom');
            $this->db->from('tbl_items');
            $this->db->where('item_id',$item_id);
             $query_result = $this->db->get();
        $result = $query_result->row();
         return $result;



  }


  public function updated_item_id($id,$new_item_id){
        $data=array();
        $data['item_id']=$new_item_id;
        $this->db->where('id',$id);
        $this->db->where('company_id','1');
        $this->db->update('tbl_items',$data);

        return $this->db->affected_rows() > 0;

       // echo $this->db->last_query();

  }

  public function retriev_type_id(){
        $company_id = $this->session->userdata('company_id');
     $this->db->select ('max(SUBSTRING(type_id,8,10)) as type_id');
        $this->db->from('tbl_item_type');
        $this->db->where('company_id',$company_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        //echo $this->db->last_query();exit();
         return $result;
  }

  public function save_item_type($data){

    $this->db->insert('tbl_item_type', $data);
        return $this->db->affected_rows() > 0;

  }

  public function retrieve_item_type($type_name){
    $company_id = $this->session->userdata('company_id');
    $this->db->select('*');
    $this->db->from('tbl_item_type');
    $this->db->where('type_name',$type_name);
    $this->db->where('company_id',$company_id);
    $query_result = $this->db->get();
        $result = $query_result->row();
         return $result;
  }


    public function retrieve_item_type_for_list(){
    $company_id = $this->session->userdata('company_id');
    $this->db->select('*');
    $this->db->from('tbl_item_type');
    $this->db->where('company_id',$company_id);
    $this->db->where('is_active','1');
    $query_result = $this->db->get();
        $result = $query_result->result();
         return $result;
  }

  public function item_data_for_edit($id){
    //$company_id = $this->session->userdata('company_id');
    $this->db->select('*');
    $this->db->from('tbl_item_type');
    
    $this->db->where('id',$id);
    $query_result = $this->db->get();
        $result = $query_result->row();
         return $result;

  }


public function retrieve_item_type_for_update_verification($type_name,$id){
    $company_id = $this->session->userdata('company_id');
    $this->db->select('*');
    $this->db->from('tbl_item_type');
    $this->db->where('company_id',$company_id);
    $this->db->where('type_name',$type_name);
     $this->db->where('is_active','1');
    $this->db->where('id !=',$id);

    $query_result = $this->db->get();
    //echo $this->db->last_query();exit();
        $result = $query_result->row();
         return $result;
  }

  public function update_item_type($data,$id){

     $this->db->where('id',$id);
        $this->db->update('tbl_item_type',$data);
       // echo $this->db->last_query();exit();
        return $this->db->affected_rows() > 0;

  }


  public function retrieve_data_for_all_item_list($item_type,$company_id){

    $this->db->select('*');
    $this->db->from('tbl_items');
    $this->db->where('company_id',$company_id);
    if ($item_type!=='all') {
       $this->db->where('item_type',$item_type);
    }
    

      $query_result = $this->db->get();
    //echo $this->db->last_query();exit();
        $result = $query_result->result();
         return $result;

  }
public function pick_project_info($project_id){

    $this->db->select('*');
    $this->db->from('project_info');
    $this->db->where('project_id',$project_id);
    $query_result = $this->db->get();
        $result = $query_result->row();
         return $result;
}


}
