<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
          $this->load->model('Inventory_model');
    }
    

    public function product_map()
    {
         $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['all_finished_item']=$this->Inventory_model->all_finished_item();
		 $data['all_raw_item']=$this->Inventory_model->all_raw_item();
		 //echo "<pre>"; print_r($data);
         $data['maincontent'] = $this->load->view('inventory/product_map', $data, true);
		
        $this->load->view('master', $data);
    }
	
	public function save_product_map() {        
         
        $finished_item = $this->input->post('finished_item', true);
        $json_data = $this->input->post('json_data', true);
		//echo $json_data;
		
		$json_array = json_decode($json_data); // convert to object array
		//$json_array = json_decode($json_data, true); // convert to array
		foreach($json_array as $json)
		{
		   //echo $json->raw_item; // you can access your key value like this if result is object
		   //echo $json['key']; // you can access your key value like this if result is array
		   //echo $json->quantity;
		   
		    $data = array();
			$data['finished_item_code'] = $finished_item;
			$data['raw_item_code'] = $json->raw_item;
			$data['raw_item_quantity'] = $json->quantity;
			
			$this->Inventory_model->save_new_product_map($data);
		}
		
		echo "Product mapping added Successfully";       
		
                       
    }
	
	
    public function get_item()
		{

		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		// $data['view_item_name']=$this->Inventory_model->select_item_name_info();

		 $id=$this->session->userdata('id');
		 $data['received_by_full_name']=$this->Inventory_model->received_by_full_name($id);
		 $data['view_item_type']=$this->Inventory_model->product_map_finished_item();
		 $data['uom_short_name']=$this->Inventory_model->select_uom_short_name_info();
		 $data['supplier_list']=$this->Inventory_model->select_supplier_list_info();
         $data['maincontent'] = $this->load->view('inventory/product_map', $data, true);
		
        $this->load->view('master', $data);


		}

	public function create_new_item()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       	 $data['last_id']=$this->Inventory_model->select_last_item_id();
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 //print_r($data['last_id']); exit();
		// $data['uom_short_name']=$this->Inventory_model->select_uom_short_name_info();
        $data['maincontent'] = $this->load->view('inventory/create_new_item', $data, true);
		
        $this->load->view('master', $data);
        
	}
	 public function save_new_item() {
        $data = array();
        //
        $data['item_id'] = $this->input->post('item_id', true);
        $data['item_name'] = $this->input->post('item_name', true);
        $data['item_usability'] = $this->input->post('re_usability', true);
       	$data['item_type'] = $this->input->post('item_type', true);
       	$data['uom'] = $this->input->post('uom', true);
        $data['remarks'] = $this->input->post('remarks', true);
      	$data['recording_time'] = date('Y-m-d H:i:s');
		$data['recorded_by'] = $this->session->userdata('id');
		$item_id = $this->input->post('item_id', true);
		$item_name = $this->input->post('item_name', true);
		//$data['last_id']=$this->Inventory_model->select_last_item_id();

		//print_r($data['last_id']); exit();

		            
        $check_item_name=$this->Inventory_model->check_item_name($item_name);
       
		if($check_item_name){
			echo "Item Name Already Exits";
		}
		else{
			  $check_item_code=$this->Inventory_model->check_item_code($item_id);
			    if($check_item_code){
				    echo "Item Code Already Exits";
			}
			     else{

				$this->Inventory_model->save_new_item_info($data);
				
	             	 echo "New item added Successfully";

	             	 

		           
			}
			
		}
        
                       
    }

	public function create_new_product()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['item_id']=$this->Inventory_model->select_item_id();
         $data['maincontent'] = $this->load->view('inventory/create_product', $data, true);
		
        $this->load->view('master', $data);
        
	}


	public function material_issue()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['view_item_name']=$this->Inventory_model->select_item_name_info();
		 $id=$this->session->userdata('id');
		 $data['issued_by_full_name']=$this->Inventory_model->select_issued_by_full_name($id);
		 $data['view_project_info']=$this->Inventory_model->select_project_info();
		 $data['uom_short_name']=$this->Inventory_model->select_uom_short_name_info();
        $data['maincontent'] = $this->load->view('inventory/material_issue', $data, true);
		
        $this->load->view('master', $data);
        
    
	}
	
	public function save_material_issue() {
	
        $data = array();
         
        $data['item_name'] = $this->input->post('item_name', true);
        $data['item_code'] = $this->input->post('item_code', true);
        $data['date_of_issuing'] = $this->input->post('date_of_issuing', true);
        $data['issued_by'] = $this->input->post('issued_by', true);
		$data['project'] = $this->input->post('project', true);
		$data['uom'] = $this->input->post('uom', true);
		$data['issue_quantity'] = $this->input->post('issue_quantity', true);		
		$data['unit_price'] = $this->input->post('unit_price', true);
		$data['recorded_by'] = $this->session->userdata('id'); 
		$data['recording_time'] = date("y-m-d h:i:s");
		
		$item_name= $this->input->post('item_name', true);
        $item_code = $this->input->post('item_code', true);
        $date_of_issuing = $this->input->post('date_of_issuing', true);
        $issued_by= $this->input->post('issued_by', true);
		$project= $this->input->post('project', true);
		$issue_quantity= $this->input->post('issue_quantity', true);
		$uom = $this->input->post('uom', true);
		$unit_price= $this->input->post('unit_price', true);
		$recording_time= date("y-m-d h:i:s");
		$recorded_by = $this->session->userdata('id');
		
		$check_issue_data=$this->Inventory_model->check_issue_info($item_name,$item_code,$date_of_issuing,$issued_by,$project,$issue_quantity,$uom,$unit_price,$recording_time,$recorded_by);
        if($check_issue_data){
	    echo "Duplicate entry.";
    }
        else{
	    $save_issue_data=$this->Inventory_model->save_material_issue_info($data);
	
		echo"Item Issued successfully.";
	
		}
		
		      
    }
	
	public function material_receive()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['view_item_name']=$this->Inventory_model->select_item_name_info();
		 $data['last_id']=$this->Inventory_model->select_last_item_recieve_id();
		 $data['item_id']=$this->Inventory_model->select_item_id();
		 $id=$this->session->userdata('id');
		 $data['received_by_full_name']=$this->Inventory_model->received_by_full_name($id);
		 $data['supplier_list']=$this->Inventory_model->select_supplier_list_info();
         $data['maincontent'] = $this->load->view('inventory/material_receive', $data, true);

		
        $this->load->view('master', $data);
        
    
	}
	
	public function save_material_receive() 
	{
		print_r($_POST);exit;
        $data = array();
         
        $data['item_name'] = $this->input->post('item_name', true);
        $data['item_code'] = $this->input->post('item_code', true);
        $data['receiveing_date'] = $this->input->post('receiveing_date', true);
		$data['received_by'] = $this->input->post('received_by', true);
		$data['supplier'] = $this->input->post('supplier', true);
		$data['uom'] = $this->input->post('uom', true);
		$data['receiving_quantity'] = $this->input->post('receiving_quantity', true);
		$data['unit_price'] = $this->input->post('unit_price', true);
		$data['recorded_by'] = $this->session->userdata('id'); 
		$data['recording_time'] = date("y-m-d h:i:s");
		
		$item_name= $this->input->post('item_name', true);
        $item_code = $this->input->post('item_code', true);
        $receiveing_date = $this->input->post('receiveing_date', true);
        $received_by= $this->input->post('received_by', true);
		$supplier= $this->input->post('supplier', true);
		$uom = $this->input->post('uom', true);
		$receiving_quantity= $this->input->post('receiving_quantity', true);
		$unit_price= $this->input->post('unit_price', true);
		$recorded_by = $this->session->userdata('id');
		$recording_time= date("y-m-d h:i:s");
		
		$check_received_data=$this->Inventory_model->check_receive_info($item_name,$item_code,$receiveing_date,$received_by,$supplier,$uom,$receiving_quantity,$unit_price,$recording_time,$recorded_by);
		if($check_received_data){
			echo "Duplicate entry.";
		}
		else{
		$this->Inventory_model->save_material_receiving_info($data);
		echo"Item Received successfully.";
			}
		

                       
    }
public function pick_supplier_info_for_material_recieve(){

	$supplier_info=array();
	//$data['supplier_id']=$this->input->post('supplier_id',true);
	$supplier_id=$this->input->post('supplier_id',true);
	//$supplier_id1=$this->input->post('supplier_id',true);
	
	$supplier_info=$this->Inventory_model->select_supplier_info($supplier_id);
	
	//print_r($supplier_info); exit();
	 //$supplier_info;
	 if ($supplier_info) {
	 	echo $supplier_info->full_name.'#'.$supplier_info->supplier_contact.'#'.$supplier_info->supplier_address;
	 }

//print_r($supplier_id1);exit();


}


public function pick_item_info(){

$data= array();
$item_id=$this->input->post('item_id',true);
//$item_id="ITM2017100001";
$data=$this->Inventory_model->pick_item_id($item_id);

//print_r($data);exit();
if ($data) {
	echo $data->item_name.'#'.$data->uom;




}
}


public function save_new_product(){

print_r($_POST);exit();

	

	
}
}
