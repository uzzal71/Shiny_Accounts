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
           $this->load->model('Project_tracking_model');
          
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
		 $data['all_item_types']=$this->Inventory_model->select_item_type_info();

		 //print_r($data['item_types']);exit();
        $data['maincontent'] = $this->load->view('inventory/create_new_item', $data, true);
		
        $this->load->view('master', $data);
        
	}
	 public function save_new_item() {

        $data = array();

     	$last_id=$this->Inventory_model->select_last_item_id();
     	
     	$id=$last_id->last_id;
     	$latest_id=$id+1;
     	$lasts="ITMN".date('Y').$latest_id;

     	// print_r($lasts);
     	// exit();
        $data['item_id'] = $lasts;
        $data['quantity']=$this->input->post('quantity', true);
        $data['item_name'] = $this->input->post('item_name', true);
       	$data['unit_price'] = $this->input->post('price', true);
       	$data['uom'] = $this->input->post('uom', true);
        $data['remarks'] = $this->input->post('description', true);
        $data['location'] = $this->input->post('location', true);
        $data['item_image']	= $this->upload_img();
      	$data['recording_time'] = date('Y-m-d H:i:s');
      	$data['recording_date'] = date('Y-m-d');
      	$data['date'] = date('Y-m-d');
      	$data['status'] = '1';
		$data['recorded_by'] = $this->session->userdata('user_name');
		$data['item_type'] = $this->input->post('item_type', true);
		$data['company_id']= $this->session->userdata('company_id');
		$item_id = $this->input->post('item_id', true);
		$item_name = $this->input->post('item_name', true);
		//$data['last_id']=$this->Inventory_model->select_last_item_id();

		//print_r($data); exit();

		            
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
				
	             	 //echo "New Item Added Successfully";

	             	 //echo " \nItem ID:".$data['item_id'];
	             	redirect('Inventory/create_new_item');

	             	 

		           
			}
			
		}
        
                       
    }

 	// Image upload function
	function upload_img() {
	$config['upload_path'] = 'media/item/';
	$config['allowed_types'] = 'gif|jpg|png';

	$this->load->library('upload', $config);

	if ($this->upload->do_upload('item_image')) {
		$data = $this->upload->data();
		$image_path = "./media/item/$data[file_name]";
		return $image_path;
	} else {

		$errors = $this->upload->display_errors();
	}

	}


public function delete_item_info($id){
$data=array();
$data['status']='0';
$result=$this->Inventory_model->delete_items_info($id,$data);
redirect('inventory/all_items_list');			



}


public function update_item_info() {
        $data = array();
      // print_r($_FILES);exit();

        //$quantity=$this->input->post('quantity', true);
        $data['id'] = $this->input->post('id', true);
        $chage_img = $this->input->post('chage_img', true);
        $data['item_id'] = $this->input->post('item_id', true);
        $data['item_type'] = $this->input->post('item_type', true);
        $data['quantity']=$this->input->post('quantity', true);
        $data['item_name'] = $this->input->post('item_name', true);
       	$data['unit_price'] = $this->input->post('price', true);
       	$data['location'] = $this->input->post('location', true);
       	$data['uom'] = $this->input->post('uom', true);
        $data['remarks'] = $this->input->post('description', true);
      	$data['update_time'] = date('Y-m-d H:i:s');
		$data['	updated_by'] = $this->session->userdata('user_name');
		$item_id = $this->input->post('item_id', true);
		$item_name = $this->input->post('item_name', true);
		$id=$this->input->post('id', true);
		//$data['last_id']=$this->Inventory_model->select_last_item_id();

		//print_r($data); exit();

		if($chage_img == 1) {
			$data['item_image']	= $this->upload_img();
			$this->Inventory_model->update_items_info($id,$data);
			redirect('Inventory/all_items_list');
		}
		else
		{
			$data['item_image'] = $this->input->post('old_item_image', true);
			$this->Inventory_model->update_items_info($id,$data);
			redirect('Inventory/all_items_list');
		}	           
			
			
	}

// Image update upload function
	function update_upload_img() {
	$config['upload_path'] = 'media/item/';
	$config['allowed_types'] = 'gif|jpg|png';

	$this->load->library('upload', $config);

	if ($this->upload->do_upload('old_item_image')) {
		$data = $this->upload->data();
		$image_path = "./media/item/$data[file_name]";
		return $image_path;
	} else {

		$errors = $this->upload->display_errors();
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
		 $data['listed_data'] =$this->Inventory_model->all_data_tbl_items();
		$data['last_id']=$this->Inventory_model->load_previuos_product_code();
        $data['maincontent'] = $this->load->view('inventory/create_product', $data, true);
		
        $this->load->view('master', $data);
        
	}


	public function requisition_form()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		  $data['item_id']=$this->Inventory_model->select_item_id();
		// $data['uom_short_name']=$this->Inventory_model->select_uom_short_name_info();
		 $data['listed_data'] =$this->Inventory_model->all_data_tbl_items();
		 $data['project_info']=$this->Inventory_model->select_project_info();
			$data['last_id']=$this->Inventory_model->select_last_requisition_id();
		//print_r($data['project_info']);exit();
		  $data['product_list']=$this->Inventory_model->all_product_data();
		 $data['employee_data'] =$this->Inventory_model->select_employee_data();
        $data['maincontent'] = $this->load->view('inventory/requisition_form', $data, true);
		
        $this->load->view('master', $data);
        
	}


public function recieve_requisition(){

$data=array();
$requisition_info=array();
$sdata=array();
//print_r($_POST);exit();
$data['company_id']= $this->session->userdata('company_id');
$data['requisition_no']=$this->input->post('requisition_no', true);
$data['date']=$this->input->post('date',true);
$data['employee_id']=$this->input->post('employee_id',true);


$pick_employee_name=$this->Inventory_model->pick_employee_name_by_employee_id($data['employee_id']);

	$employee_full_name=$pick_employee_name['first_name'].' '.$pick_employee_name['last_name'];

$data['employee_name']=$employee_full_name;
$data['project_id']=$this->input->post('project_id',true);
$data['issue_type']=$this->input->post('requisition_type',true);
$data['requisition_status']="pending";
$data['recorded_by'] = $this->session->userdata('user_name');
//$data['employee_name'] = $this->session->userdata('user_name');  
$data['recording_time'] = date("y-m-d h:i:s");
$data['date'] = date("y-m-d");
$item_id=$this->input->post('item_id',true);
       foreach ($item_id as $key => $value) {

        	$requisition_info['item_id'] = $this->input->post('item_id['.$key.']', true);
        	
        	$requisition_info['item_name'] = $this->input->post('item_name['.$key.']', true);
        	$requisition_info['quantity'] = $this->input->post('quantity['.$key.']', true);
        	$requisition_info['uom'] = $this->input->post('uom['.$key.']', true);
        	$requisition_info['remarks'] = $this->input->post('remarks['.$key.']', true);
			$requisition_info['upp'] = $this->input->post('upp['.$key.']', true);
			//json_encode($requisition_info);
		 	array_push($sdata, $requisition_info);
		

  }

$data['requisition_info']=json_encode($sdata);

$query_result=$this->Inventory_model->save_new_requisition_request($data);

        	if ($query_result) { ?>
				<script>
			 
    alert("Requisition  Received Successfully");
	//document.location.reload(true);
	window.location.assign('requisition_form');

				
			</script>

 				<?php  echo "location.href='Inventory/requisition_form'";
				
				//redirect('Inventory/requisition_form','refresh');
        	}





}


	public function material_issue()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
        $data['item_id']=$this->Inventory_model->select_item_id();
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['requisition_info']=$this->Inventory_model->pick_all_requisiton_name();

		 $data['listed_data'] =$this->Inventory_model->all_data_tbl_items();
		 $id=$this->session->userdata('user_name');
		 $data['last_id']=$this->Inventory_model->select_last_issue_id();
		 $data['view_project_info']=$this->Inventory_model->select_project_info();
		 $data['product_list']=$this->Inventory_model->all_product_data();
		 $data['uom_short_name']=$this->Inventory_model->select_uom_short_name_info();
        $data['maincontent'] = $this->load->view('inventory/material_issue', $data, true);
		
        $this->load->view('master', $data);  
    
	}



	public function issue_check(){


		$data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
        $data['item_id']=$this->Inventory_model->select_item_id();
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['requisition_info']=$this->Inventory_model->pick_all_requisiton_name_to_issue();

		 $data['listed_data'] =$this->Inventory_model->all_data_tbl_items();
		 $id=$this->session->userdata('user_name');
		 $data['last_id']=$this->Inventory_model->select_last_issue_id();
		 $data['view_project_info']=$this->Inventory_model->select_project_info();
		 $data['product_list']=$this->Inventory_model->all_product_data();
		 $data['uom_short_name']=$this->Inventory_model->select_uom_short_name_info();
        $data['maincontent'] = $this->load->view('inventory/issue_check', $data, true);
		
        $this->load->view('master', $data);



	}




public function save_checked_requisition(){


$data=array();
$requisition_info=array();
$sdata=array();
//print_r($_POST);exit();

$data['requisition_no']=$this->input->post('requisition_no', true);
$requisition_no=$this->input->post('requisition_no', true);
$data['date']=$this->input->post('date',true);
$data['employee_name']=$this->input->post('employee_id',true);
$data['project_id']=$this->input->post('project_id',true);
$data['requisition_status']="checked";
$data['recorded_by'] = $this->session->userdata('user_name'); 
$data['recording_time'] = date("y-m-d h:i:s");
$item_id=$this->input->post('item_id',true);



       foreach ($item_id as $key => $value) {

        	$requisition_info['item_id'] = $this->input->post('item_id['.$key.']', true);
        	
        	$requisition_info['item_name'] = $this->input->post('item_name['.$key.']', true);
        	$requisition_info['quantity'] = $this->input->post('quantity['.$key.']', true);
        	$requisition_info['uom'] = $this->input->post('uom['.$key.']', true);
        	$requisition_info['remarks'] = $this->input->post('remarks['.$key.']', true);
			$requisition_info['upp'] = $this->input->post('upp['.$key.']', true);
			//json_encode($requisition_info);
		 	array_push($sdata, $requisition_info);
		

  }




$data['approved_requisition']=json_encode($sdata);




$query_result=$this->Inventory_model->update_checked_requisition($data,$requisition_no);

        	if ($query_result) { ?>
				<script>
			 
    alert("Requisition  Checked Successfully");
	window.location.assign('issue_check');
				
			</script>

 				<?php  //redirect('Inventory/issue_check','refresh');
        	}



	}


		public function material_return_form()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
        $data['item_id']=$this->Inventory_model->select_item_id();
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['view_item_name']=$this->Inventory_model->select_item_name_info();
		 $id=$this->session->userdata('id');
		 $data['issued_by_full_name']=$this->Inventory_model->select_issued_by_full_name($id);
		 $data['view_project_info']=$this->Inventory_model->select_project_info();
		 $data['uom_short_name']=$this->Inventory_model->select_uom_short_name_info();
        $data['maincontent'] = $this->load->view('inventory/material_return_form', $data, true);
		
        $this->load->view('master', $data);
        
    
	}

	public function inventory_list_materials()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
      
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 
		 $id=$this->session->userdata('id');
		$data['item_info']=$this->Inventory_model->retrieve_all_item_info();
        $data['maincontent'] = $this->load->view('inventory/inventory_list_materials', $data, true);
		
        $this->load->view('master', $data);
        
    
	}

	public function inventory_list_products()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
        $data['item_id']=$this->Inventory_model->select_item_id();
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['view_item_name']=$this->Inventory_model->select_item_name_info();
		 $id=$this->session->userdata('id');
		 $data['issued_by_full_name']=$this->Inventory_model->select_issued_by_full_name($id);
		 $data['product_info']=$this->Inventory_model->retrieve_all_product_info();
		 $data['uom_short_name']=$this->Inventory_model->select_uom_short_name_info();

        $data['maincontent'] = $this->load->view('inventory/inventory_list_products', $data, true);
		
        $this->load->view('master', $data);
        
    
	}


public function all_items_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
          $data['item_type']='all';
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['items_data']=$this->Inventory_model->select_all_items_info();
		 $data['all_item_types']=$this->Inventory_model->select_item_type_info();

		 $data['maincontent'] = $this->load->view('inventory/all_item_list', $data, true);
		
        $this->load->view('master', $data);
        
    
	}



public function select_product_by_product_id() {

$current_stock=array();
$sorted_data = array();
//$product_id='PRON2017100003';
$product_id=$this->input->post('product_id', true);
$data=$this->Inventory_model->select_individual_product_by_product_id_2($product_id);

 //print json_encode($data);exit();

$extracted_item=json_decode($data->product_definition,true);

$final_data = array();
//print_r($extracted_item) ;

foreach ($extracted_item  as $value) {
	
	$item_id=$value['item_id'];
	$current_stock_qty=$this->Inventory_model->retrieve_current_stock_by_item_id($item_id);
	$sorted_data['item_id'] = $item_id;
	$sorted_data['item_name'] = $value['item_name'];
	$sorted_data['uom'] =  $current_stock_qty['uom'];
	$sorted_data['quantity'] = $value['quantity'];
	$sorted_data['current_stock'] = $current_stock_qty['quantity'];
	array_push($final_data,$sorted_data);
}

print json_encode($final_data);
// $data['current_stock']=$current_stock;
// print_r($data['current_stock']);exit();




}
public function product_view($id){

 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $json_data=array();
         $decodeed_data=array();
         $array=array();
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['product_data']=$this->Inventory_model->select_individual_product($id);
		 $json_data=$this->Inventory_model->select_individual_product_definition($id);

		
		$data['decoded_data']=json_decode($json_data->product_definition,true);
		//print_r($data['decoded_data']);exit();
		$data['listed_data'] =$this->Inventory_model->all_data_tbl_items();
		$data['maincontent'] = $this->load->view('inventory/view_product', $data, true);
		
        $this->load->view('master', $data);

}




public function delete_product($id){

$result=$this->Inventory_model->delete_product($id); ?>
<script>
window.location.assign('../product_list');
</script>
<?php 






}


public function edit_item_info($id){

		$data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['items_data']=$this->Inventory_model->retrieve_item_info_by_id($id);
		$data['all_item_types']=$this->Inventory_model->select_item_type_info();
		 $data['maincontent'] = $this->load->view('inventory/edit_item_info', $data, true);
		
        $this->load->view('master', $data);


}

public function view_item_info($id){

		$data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['items_data']=$this->Inventory_model->retrieve_item_info_by_id($id);
		$data['all_item_types']=$this->Inventory_model->select_item_type_info();
		 $data['maincontent'] = $this->load->view('inventory/view_item_info', $data, true);
		
        $this->load->view('master', $data);


}




	
	// public function save_material_issue() {
	
 //        $data = array();
         
 //        $data['item_name'] = $this->input->post('item_name', true);
 //        $data['item_code'] = $this->input->post('item_code', true);
 //        $data['date_of_issuing'] = $this->input->post('date_of_issuing', true);
 //        $data['issued_by'] = $this->input->post('issued_by', true);
	// 	$data['project'] = $this->input->post('project', true);
	// 	$data['uom'] = $this->input->post('uom', true);
	// 	$data['issue_quantity'] = $this->input->post('issue_quantity', true);		
	// 	$data['unit_price'] = $this->input->post('unit_price', true);
	// 	$data['recorded_by'] = $this->session->userdata('id'); 
	// 	$data['recording_time'] = date("y-m-d h:i:s");
		
	// 	$item_name= $this->input->post('item_name', true);
 //        $item_code = $this->input->post('item_code', true);
 //        $date_of_issuing = $this->input->post('date_of_issuing', true);
 //        $issued_by= $this->input->post('issued_by', true);
	// 	$project= $this->input->post('project', true);
	// 	$issue_quantity= $this->input->post('issue_quantity', true);
	// 	$uom = $this->input->post('uom', true);
	// 	$unit_price= $this->input->post('unit_price', true);
	// 	$recording_time= date("y-m-d h:i:s");
	// 	$recorded_by = $this->session->userdata('id');
		
	// 	$check_issue_data=$this->Inventory_model->check_issue_info($item_name,$item_code,$date_of_issuing,$issued_by,$project,$issue_quantity,$uom,$unit_price,$recording_time,$recorded_by);
 //        if($check_issue_data){
	//     echo "Duplicate entry.";
 //    }
 //        else{
	//     $save_issue_data=$this->Inventory_model->save_material_issue_info($data);
	
	// 	echo"Item Issued successfully.";
	
	// 	}
		
		      
 //    }
	
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
		 $data['listed_data'] =$this->Inventory_model->all_data_tbl_items();
		 $data['products_data'] =$this->Inventory_model->all_product_data();
      $data['employee_info'] =$this->Inventory_model->select_employee_data();
	  $data['assigned_employee_info'] =$this->Inventory_model->assigned_employee_info();
		//print_r($data['assigned_employee_info']);exit();
         $data['maincontent'] = $this->load->view('inventory/material_receive', $data, true);

		
        $this->load->view('master', $data);
        
    
	}
		public function save_material_receive() 
	{

		//print_r($_POST);exit();
        $data = array();
  		$log_data=array();
        $product_materials=array();
        $log=array();
		$transaction_log=array();
        $item_names = $this->input->post('item_name', true);
        $assigned_to = $this->input->post('assigned_to', true);
        //$log['product_id'] = $this->input->post('product_name', true);
        $log['employee_id'] = $this->input->post('employee_id', true);
        

        if ($log['employee_id']="") {
        	$log['employee_id']='N/A';
         }

           if ($log['supplier_id']="") {
        	$log['supplier_id']='N/A';
         }
        //$log['recieve_type'] = $this->input->post('recieve_type', true);
        $recieve_type=$this->input->post('recieve_type', true);
        


        if ($recieve_type=='product') {
        	$item_id=$this->input->post('item_id', true);
        	$item_quantity= $this->input->post('quantity', true);

        		foreach (array_combine($item_id, $item_quantity) as $items_id => $values) {
        			
        		


        	$products_quantity=(int)$values;
        	$retreived_product_data =$this->Inventory_model->select_individual_product_by_product_id($items_id);
        	if ($retreived_product_data) {
        	
        	
        	$extracted_item_name=json_decode($retreived_product_data->product_definition);
        	foreach ($extracted_item_name as $key => $def_quantity) {
        		
        		$wip_item_id=$def_quantity->item_id;
        		$quantity=(int)$def_quantity->quantity;
        			
        		$wip_current_data = $this->Inventory_model->select_wip_quantity_by_item_id($wip_item_id);
        		$wip_current_quantity =$wip_current_data->wip_quantity;

        		//print_r($wip_current_quantity);exit();
				//$wip_current_converted_quantity=int()$wip_current_quantity;
        		$multiplied_quantity=$products_quantity*$quantity;
        		$total_quantity=$wip_current_quantity-$multiplied_quantity;
        		$update_wip_info=$this->Inventory_model->update_wip_info_for_product_recieve($wip_item_id,$total_quantity);
        			
        		
				}



        	} else{


        			$wip_current_data = $this->Inventory_model->select_wip_quantity_by_item_id($items_id);
        		$wip_current_quantity =$wip_current_data->wip_quantity;

        		//print_r($wip_current_quantity);exit();
				//$wip_current_converted_quantity=int()$wip_current_quantity;
        		$multiplied_quantity=(int)$values;;
        		$total_quantity=$wip_current_quantity-$multiplied_quantity;
        		$update_wip_info=$this->Inventory_model->update_wip_info_for_product_recieve($items_id,$total_quantity);
        			


        	}

}
        

        }



        if ($recieve_type=='assign') {
        	
        	foreach ($item_names as $key => $value) {

        		//$data['item_id'] = $this->input->post('item_id['.$key.']', true);
        		$assigned_item_id=$this->input->post('item_id['.$key.']', true);

        	$retreived_assign_data =$this->Inventory_model->select_assigned_quantity_by_item_id($assigned_item_id);
        		$quantity=(int)$retreived_assign_data->assigned_quantity;
        			
        		$recived_quantity = $this->input->post('quantity['.$key.']', true);
        		$requisition_no = $this->input->post('requisition_no['.$key.']', true);
        		 $con_recived_quantity =$recived_quantity;

        		 $total_quantity=$quantity-$con_recived_quantity;



        	  $recieve_assigned_data_for_employee=$this->Inventory_model->retreive_assigned_quantity_for_employee_item($assigned_item_id,$assigned_to,$requisition_no);
        	  //print_r($recieve_assigned_data_for_employee);exit();

        	  	$stored_quantity=$recieve_assigned_data_for_employee->quantity;
        	  	$update_quantity=$stored_quantity -$con_recived_quantity;

        		//print_r($update_quantity);

        		if ($update_quantity<0) { ?>
        			<script>
        				
        				alert('Something Went Wrong Please Re-Calculate The Items Quantity')
        			</script>

        			
        		<?php redirect('Inventory/material_receive','refresh');
        		exit();

        		}


        		$update_assigned_history=$this->Inventory_model->update_assigned_history_item($assigned_item_id,$update_quantity,$assigned_to,$requisition_no);


				

        		$update_wip_info=$this->Inventory_model->update_assigned_info_for_product_recieve($assigned_item_id,$total_quantity);
        			
        		


        	}


        

        }


        


        $log['log_id'] = $this->input->post('recieve_no', true);
        $log['date'] = $this->input->post('date', true);
        $supplier_id = $this->input->post('supplier_id', true);
        
        $log['company_id'] = $this->session->userdata('company_id');
        $log['recording_date']=date("y-m-d");
       //$data['supplier_id'] = $this->input->post('supplier_id', true);
        if ($supplier_id=NULL) {
        	$data['supplier_id']=$this->input->post('employee_id', true);
        }else{

        	$data['supplier_id']=$this->input->post('supplier_id', true);
        }
       	$log['recording_time'] = date("y-m-d h:i:s");
       	$log['recorded_by'] = $this->session->userdata('user_name');
        foreach ($item_names as $key => $value) {

        	$data['item_id'] = $this->input->post('item_id['.$key.']', true);
        	$item_id=$this->input->post('item_id['.$key.']', true);
        	$previousdata=$this->Inventory_model->pre_recieved_info($item_id);
        		//foreach($previousdata as $sdata){
        			$d_quantity=$previousdata->quantity;
        		//}
			 $p_quantity=(int)$d_quantity;
        	$quantity=$this->input->post('quantity['.$key.']', true);
        	$current_quantity=(int)$quantity;
        	$squantity=$p_quantity + $current_quantity;
 			$current_unit_price=$this->input->post('unit_price['.$key.']', true);

        	$tbl_items_query=$this->Inventory_model->recieved_item_update($item_id,$squantity,$current_unit_price);
        	$data['item_name'] = $this->input->post('item_name['.$key.']', true);
        	$data['quantity'] = $this->input->post('quantity['.$key.']', true);
        	$data['uom'] = $this->input->post('uom['.$key.']', true);
        	$data['unit_price'] = $this->input->post('unit_price['.$key.']', true);
        	$data['total_price'] = $this->input->post('total_price['.$key.']', true);
        	$data['remarks'] = $this->input->post('remarks['.$key.']', true); 
			$data['date']=$this->input->post('date', true);
		array_push($log_data, $data);

				}
			$log['transaction_log']=json_encode($log_data);
		 	
        	$query_result=$this->Inventory_model->save_material_receiving_info($log);

        	if ($query_result) { ?>
				<script>
			 
    alert("Material Received Successfully");
				
			</script>

 				<?php    redirect('Inventory/material_receive','refresh');
        	}
        
        
		
	} 
	
//this is the version before the update on(8.1.18 : 11:10 AM) this save material Recieve function 

	// public function save_material_receive() 
	// {

	// 	//print_r($_POST);exit();
 //        $data = array();
 //  		$log_data=array();
 //        $product_materials=array();
 //        $log=array();
	// 	$transaction_log=array();
 //        $item_names = $this->input->post('item_name', true);
 //        //$log['product_id'] = $this->input->post('product_name', true);
 //        $log['employee_id'] = $this->input->post('employee_id', true);
        

 //        if ($log['employee_id']="") {
 //        	$log['employee_id']='N/A';
 //         }

 //           if ($log['supplier_id']="") {
 //        	$log['supplier_id']='N/A';
 //         }
 //        //$log['recieve_type'] = $this->input->post('recieve_type', true);
 //        $recieve_type=$this->input->post('recieve_type', true);
        


 //        if ($recieve_type=='product') {
 //        	$product_id=$this->input->post('product_name', true);
 //        	$product_quantity= $this->input->post('product_quantity', true);
 //        	$products_quantity=(int)$product_quantity;
 //        	$retreived_product_data =$this->Inventory_model->select_individual_product_by_product_id($product_id);
 //        	$extracted_item_name=json_decode($retreived_product_data->product_definition);
 //        	foreach ($extracted_item_name as $key => $def_quantity) {
        		
 //        		$wip_item_id=$def_quantity->item_id;
 //        		$quantity=(int)$def_quantity->quantity;
        			
 //        		$wip_current_data = $this->Inventory_model->select_wip_quantity_by_item_id($wip_item_id);
 //        		$wip_current_quantity =$wip_current_data->wip_quantity;

 //        		//print_r($wip_current_quantity);exit();
	// 			//$wip_current_converted_quantity=int()$wip_current_quantity;
 //        		$multiplied_quantity=$products_quantity*$quantity;
 //        		$total_quantity=$wip_current_quantity-$multiplied_quantity;
 //        		$update_wip_info=$this->Inventory_model->update_wip_info_for_product_recieve($wip_item_id,$total_quantity);
        			
 //        			// if ($update_wip_info) {
 //        			// 	echo "Wip info Updated";
 //        			// }

 //        	}


        

 //        }



 //        if ($recieve_type=='assign') {
        	
 //        	foreach ($item_names as $key => $value) {

 //        		//$data['item_id'] = $this->input->post('item_id['.$key.']', true);
 //        		$assigned_item_id=$this->input->post('item_id['.$key.']', true);

 //        	$retreived_assign_data =$this->Inventory_model->select_assigned_quantity_by_item_id($assigned_item_id);
 //        		$quantity=(int)$retreived_assign_data->assigned_quantity;
        			
 //        		$recived_quantity = $this->input->post('quantity['.$key.']', true);
 //        		 $con_recived_quantity =$recived_quantity;

 //        		 $total_quantity=$quantity-$con_recived_quantity;

 //        		//print_r($total_quantity);exit();
	// 			//$wip_current_converted_quantity=int()$wip_current_quantity;
 //        		//$multiplied_quantity=$products_quantity*$quantity;
 //        		//$total_quantity=$wip_current_quantity-$multiplied_quantity;
 //        		$update_wip_info=$this->Inventory_model->update_assigned_info_for_product_recieve($assigned_item_id,$total_quantity);
        			
 //        			// if ($update_wip_info) {
 //        			// 	echo "Wip info Updated";
 //        			// }

 //        	}


        

 //        }


        


 //        $log['log_id'] = $this->input->post('recieve_no', true);
 //        $log['date'] = $this->input->post('date', true);
 //        $supplier_id = $this->input->post('supplier_id', true);
        
 //        $log['company_id'] = $this->session->userdata('company_id');
 //        $log['recording_date']=date("y-m-d");
 //       //$data['supplier_id'] = $this->input->post('supplier_id', true);
 //        if ($supplier_id=NULL) {
 //        	$data['supplier_id']=$this->input->post('employee_id', true);
 //        }else{

 //        	$data['supplier_id']=$this->input->post('supplier_id', true);
 //        }
 //       	$log['recording_time'] = date("y-m-d h:i:s");
 //       	$log['recorded_by'] = $this->session->userdata('user_name');
 //        foreach ($item_names as $key => $value) {

 //        	$data['item_id'] = $this->input->post('item_id['.$key.']', true);
 //        	$item_id=$this->input->post('item_id['.$key.']', true);
 //        	$previousdata=$this->Inventory_model->pre_recieved_info($item_id);
 //        		//foreach($previousdata as $sdata){
 //        			$d_quantity=$previousdata->quantity;
 //        		//}
	// 		 $p_quantity=(int)$d_quantity;
 //        	$quantity=$this->input->post('quantity['.$key.']', true);
 //        	$current_quantity=(int)$quantity;
 //        	$squantity=$p_quantity + $current_quantity;
 // 			$current_unit_price=$this->input->post('unit_price['.$key.']', true);

 //        	$tbl_items_query=$this->Inventory_model->recieved_item_update($item_id,$squantity,$current_unit_price);
 //        	$data['item_name'] = $this->input->post('item_name['.$key.']', true);
 //        	$data['quantity'] = $this->input->post('quantity['.$key.']', true);
 //        	$data['uom'] = $this->input->post('uom['.$key.']', true);
 //        	$data['unit_price'] = $this->input->post('unit_price['.$key.']', true);
 //        	$data['total_price'] = $this->input->post('total_price['.$key.']', true);
 //        	$data['remarks'] = $this->input->post('remarks['.$key.']', true); 
	// 		$data['date']=$this->input->post('date', true);
	// 	array_push($log_data, $data);

	// 			}
	// 		$log['transaction_log']=json_encode($log_data);
		 	
 //        	$query_result=$this->Inventory_model->save_material_receiving_info($log);

       	// if ($query_result) { 
	// 			<script>
			 
 //    alert("Material Received Successfully");
				
	// 		</script>

 // 				<?php  redirect('Inventory/material_receive','refresh');
 //        	}
        
        
		
	// }               
    



public function save_created_product() 
	{

		 //print_r($_POST);exit();
        $data = array();
        $definition=array();
        $product_materials=array();
        $item_id_product=$this->input->post('item_id_for_product_name', true);
      	$data['item_id_product']= $item_id_product;
        $item_id = $this->input->post('item_id', true);
        $data['product_name'] = $this->input->post('product_name', true);
        $data['product_id'] = $this->input->post('product_id', true);
      	$data['recorded_by'] = $this->session->userdata('user_name'); 
		$data['recording_time'] = date("y-m-d h:i:s");

		foreach ($item_id as $key => $value) {

			$product_materials['item_id'] = $this->input->post('item_id['.$key.']', true);
			$product_materials['item_name'] = $this->input->post('item_name['.$key.']', true);
			$product_materials['quantity'] = $this->input->post('quantity['.$key.']', true);
			$product_materials['description'] = $this->input->post('description['.$key.']', true);
			$product_materials['remarks'] = $this->input->post('remarks['.$key.']', true);	
			json_encode($product_materials);
		 	array_push($definition, $product_materials);
		}	


$data['product_definition'] = json_encode($definition);

$check_product_definition_exist=$this->Inventory_model->check_product_definition_exist($item_id_product);


if ($check_product_definition_exist) {?>
	<script>
			 
    alert("Product Defination Cant Be created ! Please Update");
				
			</script>
	
<?php redirect('Inventory/product_list','refresh'); }
else{

        	$query_result=$this->Inventory_model->save_new_product($data);

        	if ($query_result) { ?>
				<script>
			 
    alert("Product Created Successfully");
				
			</script>

 				<?php  redirect('Inventory/create_new_product','refresh'); 
        	
        }
      }  
	} 
		


public function save_edited_product() 
	{

		// print_r($_POST);exit();
        $data = array();
        $definition=array();
        $product_materials=array();
        $item_id = $this->input->post('item_id', true);
        $data['product_name'] = $this->input->post('product_name', true);
        $data['product_id'] = $this->input->post('product_id', true);
      	$data['updated_by'] = $this->session->userdata('user_name'); 
		$data['update_date'] = date("y-m-d h:i:s");
		$product_id=$this->input->post('product_id', true);
		foreach ($item_id as $key => $value) {

			$product_materials['item_id'] = $this->input->post('item_id['.$key.']', true);
			$product_materials['item_name'] = $this->input->post('item_name['.$key.']', true);
			$product_materials['quantity'] = $this->input->post('quantity['.$key.']', true);
			$product_materials['description'] = $this->input->post('description['.$key.']', true);
			$product_materials['remarks'] = $this->input->post('remarks['.$key.']', true);	
			json_encode($product_materials);
		 	array_push($definition, $product_materials);
		}	


$data['product_definition'] = json_encode($definition);
        	$query_result=$this->Inventory_model->update_product_info($data,$product_id);

        	if ($query_result) { ?>
				<script>
			 
    alert("Product Updated Successfully");
		window.location.assign('product_list');		
			</script>

 				<?php  //redirect('Inventory/product_list','refresh');
        	
        }
        
	} 
		


public function product_list(){



		$data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['product_list']=$this->Inventory_model->all_product_data();
		//print_r($data['product_list']);exit();
		 $data['maincontent'] = $this->load->view('inventory/product_list', $data, true);
		
        $this->load->view('master', $data);







} 


public function update_product_info($id){


$data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $json_data=array();
         $decodeed_data=array();
         $array=array();
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['product_data']=$this->Inventory_model->select_individual_product($id);
		 $data['item_ids']=$this->Inventory_model->select_item_id();
		 $json_data=$this->Inventory_model->select_individual_product_definition($id);

		
		$data['decoded_data']=json_decode($json_data->product_definition,true);
		//print_r($data['decoded_data']);exit();
		$data['listed_data'] =$this->Inventory_model->all_data_tbl_items();
		$data['maincontent'] = $this->load->view('inventory/update_product_info', $data, true);
		
        $this->load->view('master', $data);






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

public function pick_item_info_with_stock(){

$data= array();
$item_id=$this->input->post('item_id',true);
//$item_id="ITM2017100001";
$data=$this->Inventory_model->pick_item_id_with_stock($item_id);

//print_r($data);exit();
if ($data) {
	echo $data->item_name.'#'.$data->uom.'#'.$data->quantity;



}
}
		
	public function requisition_info_by_requisition_no(){
		$data= array();
		$requisition_info=array();
	$requisition_no=$this->input->post('requisition_no',true);
		//$requisition_no='RIQU2018100013';
		$data=$this->Inventory_model->pick_searched_data($requisition_no);
		// print_r($data);exit();

		//print json_encode($data);

			$employee_id = $data->employee_id;
		$extracted_item=json_decode($data->approved_requisition,true);

	$pick_employee_name=$this->Inventory_model->pick_employee_name_by_employee_id($employee_id);

	$employee_full_name=$pick_employee_name['first_name'].' '.$pick_employee_name['last_name'];
		//print_r($employee_full_name);exit();

$final_data = array();
//print_r($extracted_item) ;
	
foreach ($extracted_item  as $value) {
	
	$item_id=$value['item_id'];
	$current_stock_qty=$this->Inventory_model->retrieve_current_stock_by_item_id($item_id);
	$sorted_data['item_id'] = $item_id;
	
	$sorted_data['item_name'] = $value['item_name'];
	$sorted_data['uom'] =  $current_stock_qty['uom'];
	$sorted_data['quantity'] =(int) $value['quantity'];
	$sorted_data['current_stock'] =(int) $current_stock_qty['quantity'];
	$sorted_data['balance']=$sorted_data['current_stock']-$sorted_data['quantity'];
	array_push($requisition_info,$sorted_data);
}
$final_data['requisition_info']=json_encode($requisition_info);
$final_data['employee_name'] = $employee_full_name;//$data->employee_id;
	$final_data['employee_id']=$data->employee_id;
	$final_data['project_id'] = $data->project_id;
	
	$final_data['date'] = $data->date;
	$final_data['issue_type'] = $data->issue_type;
	//array_push($final_data,$sorted_data);
print json_encode($final_data);

//print_r($final_data);exit();




	}

	
	
	public function requisition_info_by_requisition_no_before_check(){
		$data= array();
		$requisition_info=array();
	$requisition_no=$this->input->post('requisition_no',true);
		//$requisition_no='RIQU2018100013';
		$data=$this->Inventory_model->pick_searched_data($requisition_no);
		// print_r($data);exit();

		//print json_encode($data);

			$employee_id = $data->employee_id;
		$extracted_item=json_decode($data->requisition_info,true);

	$pick_employee_name=$this->Inventory_model->pick_employee_name_by_employee_id($employee_id);

	$employee_full_name=$pick_employee_name['first_name'].' '.$pick_employee_name['last_name'];
		//print_r($employee_full_name);exit();

$final_data = array();
//print_r($extracted_item) ;
	
foreach ($extracted_item  as $value) {
	
	$item_id=$value['item_id'];
	$current_stock_qty=$this->Inventory_model->retrieve_current_stock_by_item_id($item_id);
	$sorted_data['item_id'] = $item_id;
	$sorted_data['remarks'] = $value['remarks'];
	$sorted_data['item_name'] = $value['item_name'];
	$sorted_data['uom'] =  $current_stock_qty['uom'];
	$sorted_data['quantity'] =(int) $value['quantity'];
	$sorted_data['current_stock'] =(int) $current_stock_qty['quantity'];
	$sorted_data['balance']=$sorted_data['current_stock']-$sorted_data['quantity'];
	array_push($requisition_info,$sorted_data);
}
$final_data['requisition_info']=json_encode($requisition_info);
$final_data['employee_id'] = $employee_full_name;//$data->employee_id;

	$final_data['project_id'] = $data->project_id;
	
	$final_data['date'] = $data->date;
	$final_data['issue_type'] = $data->issue_type;
	//array_push($final_data,$sorted_data);
print json_encode($final_data);

//print_r($final_data);exit();




	}

public function pick_requisition_data_by_item_id(){


$requisition_no=$this->input->post('requisition_no',true);


$data=$this->Inventory_model->select_last_requisition_data_by_requisition_id($requisition_no);

print_r($data);exit();

}




public function save_issued_info(){



$assigned=array();
$data=array();
$issue_info=array();
$issued_info=array();

//print_r($_POST);exit();

$data['issue_id']=$this->input->post('issue_id',true);
$requisition_no=$this->input->post('requisition_no',true);
$item_ids=$this->input->post('item_id',true);
$data['employee_name']=$this->input->post('employee_name',true);
$data['issue_type']=$this->input->post('issue_type',true);
$data['project_id']=$this->input->post('project_id',true);
$data['requisition_status']="issued";
$data['aproved_by']=$this->session->userdata('user_name'); 
$data['aproved_time']=date("y-m-d h:i:s");

$issue_type=$this->input->post('issue_type',true);


//print_r($issue_type);exit();


if ($issue_type=='general_issue') {

	foreach ($item_ids as $key => $value) {

        	$issue_info['item_id'] = $this->input->post('item_id['.$key.']', true);
        	$item_id=$this->input->post('item_id['.$key.']', true);
        	$previousdata=$this->Inventory_model->pre_recieved_info($item_id);
        		foreach($previousdata as $sdata){
        			$d_quantity=$previousdata->quantity;
        		}

			 $p_quantity=(int)$d_quantity;

        	$quantity=$this->input->post('quantity['.$key.']', true);
        	$current_quantity=(int)$quantity;
        	if ($quantity>$p_quantity) {?>
        		
        		<script>
			 
    alert("Material Cant Be Issued  Due To Lack Of Current Stock");
				
			</script>

        	<?php redirect('Inventory/material_issue','refresh'); exit(); }
        	$squantity=$p_quantity - $current_quantity;
        	$tbl_items_query=$this->Inventory_model->issued_item_update($item_id,$squantity);
        	$issue_info['item_name'] = $this->input->post('item_name['.$key.']', true);
        	$issue_info['quantity'] = $this->input->post('quantity['.$key.']', true);
        	$issue_info['uom'] = $this->input->post('uom['.$key.']', true);
        	$issue_info['remarks'] = $this->input->post('remarks['.$key.']', true);
			
			
		 	array_push($issued_info, $issue_info);

}


	$data['issue_info']=json_encode($issued_info);

    $query_result=$this->Inventory_model->issued_item_save($requisition_no,$data);

        	if ($query_result) { ?>
				<script>
			 
    alert("Material Issued Successfully");
	window.location.assign('material_issue');
				
			</script>

 				<?php  //redirect('Inventory/material_issue','refresh');
        	}
	
}




if ($issue_type =='production') {
	foreach ($item_ids as $key => $value) {

        	$issue_info['item_id'] = $this->input->post('item_id['.$key.']', true);
        	$item_id=$this->input->post('item_id['.$key.']', true);
        	$previousdata=$this->Inventory_model->retrieve_wip_info_for_item($item_id);
        		//foreach($previousdata as $sdata){
        			$d_quantity=$previousdata->wip_quantity;
        			//print_r($d_quantity);exit();
        		//}
			 $p_quantity=$d_quantity;
			$latest_quantity= $this->Inventory_model->pre_recieved_info($item_id);
        	$quantity=$this->input->post('quantity['.$key.']', true);
        	$current_quantity=(int)$quantity;
        	if ($latest_quantity<$p_quantity) {?>
        		
        		<script>
			 
			    alert("Material Cant Be Issued");
				
			    preventDefault();

				
				</script>

        	<?php redirect('Inventory/material_issue','refresh'); exit(); 

      }

    $quantity_update_quantity = $latest_quantity->quantity - $current_quantity;
	$squantity=$p_quantity + $current_quantity;
	$tbl_items_query=$this->Inventory_model->issued_item_update($item_id,$quantity_update_quantity);
	$tbl_items_query=$this->Inventory_model->update_wip_quantity($item_id,$squantity);
	$issue_info['item_name'] = $this->input->post('item_name['.$key.']', true);
	$issue_info['quantity'] = $this->input->post('quantity['.$key.']', true);
	$issue_info['uom'] = $this->input->post('uom['.$key.']', true);
	$issue_info['remarks'] = $this->input->post('remarks['.$key.']', true);
			
			
		 	array_push($issued_info, $issue_info);

}

$data['issue_info']=json_encode($issued_info);
        	$query_result=$this->Inventory_model->issued_item_save($requisition_no,$data);

        	if ($query_result) { ?>
				<script>
			 
    alert("Material Issued Successfully");
			window.location.assign('material_issue');	
			</script>

 				<?php  //redirect('Inventory/material_issue','refresh');
        	}
}



if ($issue_type=='assigned') {

	//print_r('Got IT');exit();
	foreach ($item_ids as $key => $value) {

        	$issue_info['item_id'] = $this->input->post('item_id['.$key.']', true);
        	$item_id=$this->input->post('item_id['.$key.']', true);
        	$previousdata=$this->Inventory_model-> retrieve_assigned_info_for_item($item_id);
        	$previous_quantity=$this->Inventory_model->  retrieve_quantity_assigned_info_for_item($item_id);
        		//foreach($previousdata as $sdata){

        	//print_r($previousdata);exit();
        	//$prev_quantity=int() ($previousdata->assigned_quantity);
        	$d_quantity=$previousdata->assigned_quantity;
        		//}
			$p_quantity=(int)$d_quantity;
			$gquantity = $this->Inventory_model->pre_recieved_info($item_id);
			$quantity_value=$gquantity->quantity;
			$latest_quantity=(int)$quantity_value;
        	$quantity=$this->input->post('quantity['.$key.']', true);
        	$current_quantity=(int)$quantity;
        	
        		
        	
        	$lquantity=$quantity_value-$current_quantity;

        	$squantity=$p_quantity + $current_quantity;
        	$tbl_items_query1=$this->Inventory_model->update_current_assigned_quantity($item_id,$lquantity);
        	$tbl_items_query=$this->Inventory_model->update_assigned_quantity($item_id,$squantity);
        	$issue_info['item_name'] = $this->input->post('item_name['.$key.']', true);
        	$issue_info['quantity'] = $this->input->post('quantity['.$key.']', true);
        	$issue_info['uom'] = $this->input->post('uom['.$key.']', true);
        	$issue_info['remarks'] = $this->input->post('remarks['.$key.']', true);
			$assigned['employee_id']=$this->input->post('employee_id', true);
			$assigned['employee_name']=$this->input->post('employee_name', true);
			$assigned['item_id']=$this->input->post('item_id['.$key.']', true);

			$assigned['item_name']=$this->input->post('item_name['.$key.']', true);
			$assigned['requisition_no']=$this->input->post('requisition_no',true);
			$assigned['quantity']=$this->input->post('quantity['.$key.']', true);
			$assigned['status']=1;
			$assigned['created_at']=date("Y-m-d H:i:s");
			$assigned['recorded_by']=$this->session->userdata('user_name');
			$assigned['company_id']=$this->session->userdata('company_id');
			$assigned['uom']= $this->input->post('uom['.$key.']', true);
				//print_r($assigned);exit();

				$assigned_query=$this->Inventory_model->save_assigned_material_info($assigned);

				//print_r($assigned_query);exit();


			if ($assigned_query) {
				array_push($issued_info, $issue_info);
			} else { ?>

<script>
			 
    alert("Something Went Wrong!");
				
			</script>


		<?php	}
		 	

}

$data['issue_info']=json_encode($issued_info);
        	$query_result=$this->Inventory_model->issued_item_save($requisition_no,$data);

        	if ($query_result) { ?>
				<script>
			 
    alert("Material Issued Successfully");
	window.location.assign('material_issue');
				
			</script>

 				<?php  //redirect('Inventory/material_issue','refresh');
        	}
	
}


        }



public function damage_parts_entry(){


 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		  $data['item_id']=$this->Inventory_model->select_item_id();
		// $data['uom_short_name']=$this->Inventory_model->select_uom_short_name_info();
		 $data['listed_data'] =$this->Inventory_model->all_data_tbl_items();
		 $data['project_info']=$this->Inventory_model->select_project_info();
			$data['last_id']=$this->Inventory_model->pick_last_damage_id();
		//print_r($data['project_info']);exit();
		  $data['product_list']=$this->Inventory_model->all_product_data();
		 $data['employee_data'] =$this->Inventory_model->select_employee_data();
        $data['maincontent'] = $this->load->view('inventory/damage_parts_entry', $data, true);
		
        $this->load->view('master', $data);

}


public function save_damage_parts_entry(){

	//print_r($_POST);exit();

$data=array();
$issue_info=array();
$issued_info=array();
$data['company_id']=$this->session->userdata('company_id');
$data['damage_no']=$this->input->post('damage_no',true);
$item_ids=$this->input->post('item_id',true);
$data['date']=$this->input->post('date',true);
$data['employee_id']=$this->input->post('employee_id',true);
$data['project_id']=$this->input->post('project_id',true);
$data['created_by']=$this->session->userdata('user_name'); 
$data['create_date']=date("y-m-d h:i:s");
foreach ($item_ids as $key => $value) {
        	$issue_info['item_id']=$this->input->post('item_id['.$key.']', true);
        	$issue_info['item_name'] = $this->input->post('item_name['.$key.']', true);
        	$issue_info['quantity'] = $this->input->post('quantity['.$key.']', true);
        	$issue_info['uom'] = $this->input->post('uom['.$key.']', true);
        	$issue_info['cause_of_damage'] = $this->input->post('cause['.$key.']', true);
			
			
		 	array_push($issued_info, $issue_info);

}

$data['damage_info']=json_encode($issued_info);
        	$query_result=$this->Inventory_model->damage_entry_save($data);

        	if ($query_result) { ?>
				<script>
			 
    alert("Successfully Aded Damage Parts");
				
			</script>

 				<?php  redirect('Inventory/damage_parts_entry','refresh');
        	}
        }




public function work_in_progress(){


$data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		
	
		
		$data['work_in_progress'] =$this->Inventory_model->work_in_progress_data();
        $data['maincontent'] = $this->load->view('inventory/work_in_progress', $data, true);
		
        $this->load->view('master', $data);




}


public function items_report(){


$data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
        $data['maincontent'] = $this->load->view('inventory/items_report', $data, true);
		
        $this->load->view('master', $data);

}


public function show_items_report(){

//print_r($_POST);exit();
	$from_date = $this->input->post('from_date', true);
		$to_date = $this->input->post('to_date', true);
		$item_type = $this->input->post('item_type', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');
		$data['from_date']=$from_date;
		$data['from_date1']=$from_date;
		$data['to_date']=$to_date;
		$data['to_date1']=$to_date;
		$data['item_type']=$item_type;
		$data['items_report_info']=$this->Inventory_model->show_items_report_info($from_date,$to_date,$chk_to_date,$item_type,$company_id);


		//print_r($data['items_report_info']);exit();
		// $data['count_holiday_info']=$this->Holiday_model->count_holiday_info($company_id,$from_date,$chk_to_date,$to_date);
		
		//$this->load->helper('dompdf');
        //$view_file=$this->load->view('holiday/holiday_report', $data, true);
        //$file_name=pdf_create($view_file, 'Holiday_Report');
	
      	$this->load->view('inventory/view_items_report',$data);
}


public function show_items_report_pdf(){

//print_r($_POST);exit();
	$from_date = $this->input->post('from_date', true);
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');
		$data['from_date']=$from_date;
		$data['from_date1']=$from_date;
		$data['to_date']=$to_date;
		$data['to_date1']=$to_date;
		$data['items_report_info']=$this->Inventory_model->show_items_report_info($from_date,$to_date,$chk_to_date,$company_id);


		//print_r($data['items_report_info']);exit();
		// $data['count_holiday_info']=$this->Holiday_model->count_holiday_info($company_id,$from_date,$chk_to_date,$to_date);
		
		//$this->load->helper('dompdf');
        //$view_file=$this->load->view('holiday/holiday_report', $data, true);
        //$file_name=pdf_create($view_file, 'Holiday_Report');
	
      	$this->load->view('inventory/show_items_report_pdf',$data);
}


public function material_receive_report(){

$data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       	$data['supplier_info']=$this->Inventory_model->select_supplier_list_info();
       	$data['recieved_item_no']=$this->Inventory_model->pick_recieved_item_id();
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
        $data['maincontent'] = $this->load->view('inventory/material_receive_report', $data, true);
		
        $this->load->view('master', $data);


}



public function show_material_receive_report(){

			$data=array();
			$recieve_items_report_info=array();
		//print_r($_POST);exit();
		$from_date = $this->input->post('from_date', true);
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');

		$data['supplier_id']=$this->input->post('supplier_id', true);
		$data['transaction_id']=$this->input->post('transaction_id', true);
		$supplier_id=$this->input->post('supplier_id', true);
		$log_id=$this->input->post('transaction_id', true);
		$data['from_date']=$from_date;
		$data['from_date1']=$from_date;
		$data['to_date']=$to_date;
		$data['to_date1']=$to_date;
		//print_r($data['supplier_id']);exit();


			// if (($data['transaction_id'])!=='select') {
			// 	print_r($data['transaction_id']);
			// }


	
		$data['recieve_items_report_info']=$this->Inventory_model->recieve_items_report_info($from_date,$to_date,$chk_to_date,$company_id,$supplier_id,$log_id);

//print_r($data['recieve_items_report_info']);exit();
	
	
     	$this->load->view('inventory/view_material_receive_report',$data);
}



public function show_material_receive_report_pdf(){

	//print_r($_POST);exit();


		$data=array();
		$recieve_items_report_info=array();
		//print_r($_POST);exit();
		$from_date = $this->input->post('from_date', true);
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');

		$data['supplier_id']=$this->input->post('supplier_id', true);
		$data['transaction_id']=$this->input->post('transaction_id', true);
		$supplier_id=$this->input->post('supplier_id', true);
		$log_id=$this->input->post('transaction_id', true);
		$data['from_date']=$from_date;
		$data['from_date1']=$from_date;
		$data['to_date']=$to_date;
		$data['to_date1']=$to_date;
		//$data['log_id']=$this->input->post('transaction_id', true);
		


			// if (($data['transaction_id'])!=='select') {
			// 	print_r($data['transaction_id']);
			// }


	
		$data['recieve_items_report_info']=$this->Inventory_model->recieve_items_report_info($from_date,$to_date,$chk_to_date,$company_id,$supplier_id,$log_id);

//print_r($data['recieve_items_report_info']);exit();
	
	
     	$this->load->view('inventory/show_material_receive_report_pdf',$data);
}

public function requisition_report(){

	$data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
     $data['employee_data'] =$this->Inventory_model->select_employee_data();
     $data['requisition_data'] =$this->Inventory_model->requisition_info_for_report();  
    $data['menu'] = $this->load->view('menu', $data, true);
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	$data['project_info']=$this->Inventory_model->select_project_info();
    $data['maincontent'] = $this->load->view('inventory/requisition_report', $data, true);
		
        $this->load->view('master', $data);



}
public function show_requisition_report(){

		$data=array();
		$recieve_items_report_info=array();
		//print_r($_POST);exit();
		$project_id=$this->input->post('project_id', true);
		$from_date = $this->input->post('from_date', true);
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');

		$data['employee_id']=$this->input->post('employee_id', true);
		$data['requisition_id']=$this->input->post('requisition_id', true);
		$employee_id=$this->input->post('employee_id', true);
		$requisition_id=$this->input->post('requisition_id', true);
		$data['from_date']=$from_date;
		$data['from_date1']=$from_date;
		$data['to_date']=$to_date;
		$data['to_date1']=$to_date;
		$data['project_id']=$this->input->post('project_id', true);
		//print_r($data['supplier_id']);exit();


			// if (($data['transaction_id'])!=='select') {
			// 	print_r($data['transaction_id']);
			// }


	
		$data['recieve_requisition_report_info']=$this->Inventory_model->recieve_requisition_report_info($from_date,$to_date,$chk_to_date,$requisition_id,$employee_id,$company_id,$project_id);
	
     	$this->load->view('inventory/show_requisition_report',$data);


}


public function show_requisition_report_pdf(){

$data=array();
			$recieve_items_report_info=array();
		//print_r($_POST);exit();
		$project_id=$this->input->post('project_id', true);
		$from_date = $this->input->post('from_date', true);
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');

		$data['employee_id']=$this->input->post('employee_id', true);
		$data['requisition_id']=$this->input->post('requisition_id', true);
		$employee_id=$this->input->post('employee_id', true);
		$requisition_id=$this->input->post('requisition_id', true);
		$data['from_date']=$from_date;
		$data['from_date1']=$from_date;
		$data['to_date']=$to_date;
		$data['to_date1']=$to_date;
		$data['project_id']=$this->input->post('project_id', true);
		//print_r($data['supplier_id']);exit();


			// if (($data['transaction_id'])!=='select') {
			// 	print_r($data['transaction_id']);
			// }


	
		$data['recieve_requisition_report_info']=$this->Inventory_model->recieve_requisition_report_info($from_date,$to_date,$chk_to_date,$requisition_id,$employee_id,$company_id,$project_id);

//print_r($data['recieve_requisition_report_info']);exit();
	
	
     	$this->load->view('inventory/show_requisition_report_pdf',$data);


}








public function issue_report(){

$data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
    $data['employee_data'] =$this->Inventory_model->select_employee_data();
    $data['requisition_data'] =$this->Inventory_model->issue_info_for_report();  
    $data['menu'] = $this->load->view('menu', $data, true);
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	$data['project_info']=$this->Inventory_model->select_project_info();
    $data['maincontent'] = $this->load->view('inventory/issue_report', $data, true);
		
        $this->load->view('master', $data);


}

public function show_issue_report(){

$data=array();
			$recieve_items_report_info=array();
		//print_r($_POST);exit();
		$data['project_id']=$this->input->post('project_id', true);
		$project_id=$this->input->post('project_id', true);
		$issue_id=$this->input->post('issue_id', true);
		$from_date = $this->input->post('from_date', true);
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');

		$data['employee_id']=$this->input->post('employee_id', true);
		$data['requisition_id']=$this->input->post('requisition_id', true);
		$employee_id=$this->input->post('employee_id', true);
		$requisition_id=$this->input->post('requisition_id', true);
		$data['from_date']=$from_date;
		$data['from_date1']=$from_date;
		$data['to_date']=$to_date;
		$data['to_date1']=$to_date;
		$data['issue_id']=$this->input->post('issue_id', true);
		//print_r($data['supplier_id']);exit();


			// if (($data['transaction_id'])!=='select') {
			// 	print_r($data['transaction_id']);
			// }


	
		$data['recieve_issue_report_info']=$this->Inventory_model->recieve_issue_report_info($from_date,$to_date,$chk_to_date,$issue_id,$employee_id,$company_id,$project_id);

//print_r($data['recieve_issue_report_info']);exit();
	
	
     	$this->load->view('inventory/show_issue_report',$data);


}


public function show_issue_report_pdf(){

		$data=array();
			$recieve_issue_report_info=array();
		//print_r($_POST);exit();
		$data['project_id']=$this->input->post('project_id', true);	
		$project_id=$this->input->post('project_id', true);
		$issue_id=$this->input->post('issue_id', true);
		$from_date = $this->input->post('from_date', true);
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');

		$data['employee_id']=$this->input->post('employee_id', true);
		$data['issue_id']=$this->input->post('issue_id', true);
		$employee_id=$this->input->post('employee_id', true);
		$data['from_date']=$from_date;
		$data['from_date1']=$from_date;
		$data['to_date']=$to_date;
		$data['to_date1']=$to_date;
		


	
		$data['recieve_issue_report_info']=$this->Inventory_model->recieve_issue_report_info($from_date,$to_date,$chk_to_date,$issue_id,$employee_id,$company_id,$project_id);

//print_r($data['recieve_issue_report_info']);exit();
	
	
     	$this->load->view('inventory/show_issue_report_pdf',$data);


}



public function inventory_report(){

	$data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
	$data['items_data'] =$this->Inventory_model->all_data_tbl_items();  
    $data['menu'] = $this->load->view('menu', $data, true);
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	$data['project_info']=$this->Inventory_model->select_project_info();
    $data['maincontent'] = $this->load->view('inventory/inventory_report', $data, true);
		
        $this->load->view('master', $data);



}


public function show_inventory_report(){


//print_r($_POST);exit();

		$item_name=$this->input->post('item_name', true);
		$item_id=$this->input->post('item_id', true);
		$from_date = $this->input->post('from_date', true);
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');
		$data['item_name']=$this->input->post('item_name', true);
		$data['item_id']=$this->input->post('item_id', true);
		$data['from_date']=$from_date;
		$data['from_date1']=$from_date;
		$data['to_date']=$to_date;
		$data['to_date1']=$to_date;



		$data['recieve_item_info_for_report'] = $this->Inventory_model->recieve_item_info_for_report($item_name,$item_id,$from_date,$to_date,$chk_to_date,$company_id);


		//print_r($data['recieve_item_info_for_report']);exit();

			$this->load->view('inventory/show_inventory_report',$data);
				//$this->load->view('master', $data);


}

public function product_report(){

	$data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
	$data['product_data'] =$this->Inventory_model-> retrieve_all_product_info();
    
    $data['menu'] = $this->load->view('menu', $data, true);
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	
    $data['maincontent'] = $this->load->view('inventory/product_report', $data, true);
		
      $this->load->view('master', $data);



}

public function show_product_report(){


//print_r($_POST);exit();

		$item_name=$this->input->post('item_name', true);
		$item_id=$this->input->post('item_id', true);
		$from_date = $this->input->post('from_date', true);
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');
		$data['item_name']=$this->input->post('item_name', true);
		$data['item_id']=$this->input->post('item_id', true);
		$data['from_date']=$from_date;
		$data['from_date1']=$from_date;
		$data['to_date']=$to_date;
		$data['to_date1']=$to_date;

		$data['products_data']= $this->Inventory_model->recieve_products_info_for_report($item_name,$item_id,$from_date,$to_date,$chk_to_date,$company_id);



//print_r($data['products_data']);exit();
     $this->load->view('inventory/show_product_report', $data);
		
        // $this->load->view('master', $data);


}

public function materials_report(){

	$data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
	$data['items_data'] =$this->Inventory_model->all_materials_data_tbl_items();  
    $data['menu'] = $this->load->view('menu', $data, true);
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	$data['project_info']=$this->Inventory_model->select_project_info();
    $data['maincontent'] = $this->load->view('inventory/materials_report', $data, true);
		
        $this->load->view('master', $data);



}

public function show_materials_report(){


//print_r($_POST);exit();

		$item_name=$this->input->post('item_name', true);
		$item_id=$this->input->post('item_id', true);
		$from_date = $this->input->post('from_date', true);
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');
		$data['item_name']=$this->input->post('item_name', true);
		$data['item_id']=$this->input->post('item_id', true);
		$data['from_date']=$from_date;
		$data['from_date1']=$from_date;
		$data['to_date']=$to_date;
		$data['to_date1']=$to_date;

		$data['materials_data']= $this->Inventory_model->recieve_materials_info_for_report($item_name,$item_id,$from_date,$to_date,$chk_to_date,$company_id);



//print_r($data['products_data']);exit();
     $this->load->view('inventory/show_materials_report', $data);
		
        // $this->load->view('master', $data);


}

public function damage_report(){

	$data = array();
  	$data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";
	$data['items_data'] =$this->Inventory_model->all_materials_data_tbl_items();  
    $data['menu'] = $this->load->view('menu', $data, true);
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	$data['project_info']=$this->Inventory_model->select_project_info();
	$data['listed_data'] =$this->Inventory_model->all_data_tbl_items();
    $data['employee_data'] =$this->Inventory_model->select_employee_data();
    //$data['maincontent'] = $this->load->view('inventory/materials_report', $data, true);
	$data['maincontent'] = $this->load->view('inventory/damage_report', $data, true);
		
        $this->load->view('master', $data);	
      



}

	public function show_damage_report(){

  $data=array();

  //print_r($_POST);exit();

  $data['employee_id']=$this->input->post('employee_id',true);
  $employee_id=$this->input->post('employee_id',true);
  $data['project_id']=$this->input->post('project_id',true);
  $project_id=$this->input->post('project_id',true);
  $data['from_date']=$this->input->post('from_date',true);
  $from_date=$this->input->post('from_date',true);
  $data['to_date']=$this->input->post('to_date',true);
  $to_date=$this->input->post('to_date',true);
  $company_id= $this->session->userdata('company_id');
  $data['check_to_date']=$this->input->post('chk_to_date',true);
  $check_to_date=$this->input->post('chk_to_date',true);


  $data['damaged_data']=$this->Inventory_model->show_damaged_data($employee_id,$project_id,$from_date,$to_date,$check_to_date,$company_id);


  //print_r($data['damaged_data']);exit();

  $this->load->view('inventory/show_damage_report', $data);




	}
	

public function requisition_list(){

 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['requisition_data']=$this->Inventory_model-> all_requisition_data();
		 $data['maincontent'] = $this->load->view('inventory/requisition_list', $data, true);
		
        $this->load->view('master', $data);








}

public function requisition_view($id){

 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['requisition_data']=$this->Inventory_model->each_requisition_data($id);
		// print_r($data['requisition_data']);exit();
		  $project_id=$data['requisition_data']->project_id;
		    $project_info=$this->Project_tracking_model->select_project_info_by_project_id($project_id);
 		$data['project_infos']=$project_info->project_name.'-'.$project_info->customer_name;
		 $data['maincontent'] = $this->load->view('inventory/requisition_view', $data, true);
		
        $this->load->view('master', $data);








}

public function requisition_update($id)
	{
		  $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		  $data['item_id']=$this->Inventory_model->select_item_id();
		// $data['uom_short_name']=$this->Inventory_model->select_uom_short_name_info();
		 $data['listed_data'] =$this->Inventory_model->all_data_tbl_items();
		 $data['project_info']=$this->Inventory_model->select_project_info();
			$data['last_id']=$this->Inventory_model->select_last_requisition_id();
		//print_r($data['project_info']);exit();
		$data['requisition_data']=$this->Inventory_model->each_requisition_data($id);
		//print_r($data['requisition_data']);exit();
		  $data['product_list']=$this->Inventory_model->all_product_data();
		 $data['employee_data'] =$this->Inventory_model->select_employee_data();
		 $project_id=$data['requisition_data']->project_id;
       
        $project_info=$this->Project_tracking_model->select_project_info_by_project_id($project_id);

   		 $data['project_infos']=$project_info->project_name.'-'.$project_info->customer_name;

   		// print_r( $data['project_info']);exit();
        $data['maincontent'] = $this->load->view('inventory/requisition_update', $data, true);


		
        $this->load->view('master', $data);
        
    
	}

	public function update_requisition(){

$data=array();
$requisition_info=array();
$sdata=array();
//print_r($_POST);exit();

$data['requisition_no']=$this->input->post('requisition_no', true);
$data['issue_type']=$this->input->post('requisition_type', true);
$data['date']=$this->input->post('date',true);
$data['employee_id']=$this->input->post('employee_id',true);
$pick_employee_name=$this->Inventory_model->pick_employee_name_by_employee_id($data['employee_id']);

	$employee_full_name=$pick_employee_name['first_name'].' '.$pick_employee_name['last_name'];

$data['employee_name']=$employee_full_name;
$data['project_id']=$this->input->post('project_id',true);
$data['requisition_status']="pending";
$data['recorded_by'] = $this->session->userdata('user_name'); 
$data['recording_time'] = date("y-m-d h:i:s");
$requisition_no=$this->input->post('requisition_no', true);
$item_id=$this->input->post('item_id',true);
       foreach ($item_id as $key => $value) {

        	$requisition_info['item_id'] = $this->input->post('item_id['.$key.']', true);
        	
        	$requisition_info['item_name'] = $this->input->post('item_name['.$key.']', true);
        	$requisition_info['quantity'] = $this->input->post('quantity['.$key.']', true);
        	$requisition_info['uom'] = $this->input->post('uom['.$key.']', true);
        	$requisition_info['remarks'] = $this->input->post('remarks['.$key.']', true);
			$requisition_info['upp'] = $this->input->post('upp['.$key.']', true);
			//json_encode($requisition_info);
		 	array_push($sdata, $requisition_info);
		

  }

$data['requisition_info']=json_encode($sdata);

$query_result=$this->Inventory_model->update_requisition($data,$requisition_no);

        	if ($query_result) { ?>
				<script>
			 
    alert("Requisition  Updated Successfully");
	window.location.assign('requisition_list');
				
			</script>

 				<?php  //redirect('Inventory/requisition_list','refresh');
        	}





}


public function show_master_inventory_report(){

//print_r($_POST);exit();
		
		$item_name=$this->input->post('item_name', true);
		$from_date = $this->input->post('from_date', true);
		$to_date = $this->input->post('to_date', true);
		$chk_to_date= $this->input->post('chk_to_date', true);
		$quantity= $this->input->post('quantity', true);
		$data['quantity']=$this->input->post('quantity', true);
		$data['chk_to_date']=$chk_to_date;
		$company_id= $this->session->userdata('company_id');
		$data['from_date']=$from_date;
		$data['from_date1']=$from_date;
		$data['to_date']=$to_date;
		$data['to_date1']=$to_date;
		$data['item_name']=$item_name;
		$data['materials_data']= $this->Inventory_model->retrieve_master_inventory_report_data($quantity,$company_id,$item_name);

	//print_r($data['quantity']);exit();


//print_r($data['products_data']);exit();
     $this->load->view('inventory/show_master_inventory_report', $data);



}



public function master_inventory_report(){

$data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";  
  $data['menu'] = $this->load->view('menu', $data, true);
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	$data['project_info']=$this->Inventory_model->select_project_info();
	$data['listed_data'] =$this->Inventory_model->all_data_tbl_items();
    $data['employee_data'] =$this->Inventory_model->select_employee_data();
    $data['maincontent'] = $this->load->view('inventory/master_inventory_report', $data, true);
		
    $this->load->view('master', $data);


}


public function wip_report(){

	$data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";  
  $data['menu'] = $this->load->view('menu', $data, true);
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	$data['wip_report']=$this->Inventory_model->work_in_progress_data();
	
    $data['maincontent'] = $this->load->view('inventory/wip_report', $data, true);
		
    $this->load->view('master', $data);


}


public function show_wip_report(){

//print_r($_POST);exit();
	$item_id=$this->input->post('item_id', true);
	$data['date'] = date("y-m-d h:i:s");
	$all_item = $this->input->post('all_item', true);
	$data['item_id']=$this->input->post('item_id', true);
	$data['all_item']=$this->input->post('all_item', true);
	$company_id=$this->session->userdata('company_id');
	$data['company_id'] = $this->session->userdata('company_id');
	$data['wip_data']= $this->Inventory_model->retrieve_wip_inventory_report_data($item_id,$all_item,$company_id);
	

	//print_r($data['materials_data']);exit();


//print_r($data['wip_data']);
	//exit();
     $this->load->view('inventory/show_wip_report', $data);

	



}


public function pick_project_name(){

$project_id=$this->input->post('project_id',true);
$project_info=$this->Inventory_model->pick_project_info($project_id);

$project_name =$project_info->project_name.'-'.$project_info->customer_name;

print_r($project_name);

}

public function requisition_delete($id){

$data=array();
$data=$this->Inventory_model->requisition_delete($id);
if ($data) { ?>

<script>

alert("Requisition  Deleted Successfully");
		window.location.assign('../requisition_list');		
			</script>

 				<?php  
				

				//redirect('Inventory/requisition_list','refresh');


		}
	}


	public function pick_item_name(){

		$item_id=$this->input->post('item_id_for_product_name', true);
		//$item_id="ITMN2017100003";
		$item_name=$this->Inventory_model->pick_item_name($item_id);

		if ($item_name) {
			echo $item_name->item_name;
		}

	}



	public function compare_requisition_checked_issue_report(){


$data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";  
  $data['menu'] = $this->load->view('menu', $data, true);
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	$data['requisition_data'] =$this->Inventory_model->requisition_info_for_crossmatch_report();  
	
    $data['maincontent'] = $this->load->view('inventory/compare_requisition_checked_issue_report', $data, true);
		
    $this->load->view('master', $data);




	}



	public function show_compare_requisition_checked_issue_report(){

		//print_r($_POST);exit();
		$data = array();
	$requisition_id=$this->input->post('requisition_id',true);

    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']=""; 
    $data['requisition_id']=$requisition_id;   
  $data['menu'] = $this->load->view('menu', $data, true);
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	$data['requisition_data'] =$this->Inventory_model->requisition_info_for_crossmatch($requisition_id);  
	

	//print_r($data['requisition_data']);exit();
    //$data['maincontent'] = $this->load->view('inventory/show_compare_requisition_checked_issue_report', $data, true);
		

		$this->load->view('inventory/show_compare_requisition_checked_issue_report', $data);
    //$this->load->view('master', $data);
		



	}
	
	public function approved_requisition_list(){

 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['requisition_data']=$this->Inventory_model-> approved_requisition_data();
		 $data['maincontent'] = $this->load->view('inventory/approved_requisition_list', $data, true);
		
        $this->load->view('master', $data);








}


public function approved_requisition_update($id)
	{
		  $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		  $data['item_id']=$this->Inventory_model->select_item_id();
		// $data['uom_short_name']=$this->Inventory_model->select_uom_short_name_info();
		 $data['listed_data'] =$this->Inventory_model->all_data_tbl_items();
		 $data['project_info']=$this->Inventory_model->select_project_info();
			$data['last_id']=$this->Inventory_model->select_last_requisition_id();
		//print_r($data['project_info']);exit();
		$data['requisition_data']=$this->Inventory_model->each_requisition_data($id);
		//print_r($data['requisition_data']);exit();
		  $data['product_list']=$this->Inventory_model->all_product_data();
		 $data['employee_data'] =$this->Inventory_model->select_employee_data();
        $data['maincontent'] = $this->load->view('inventory/approved_requisition_update', $data, true);
		
        $this->load->view('master', $data);
        
    
	}
	
	public function update_approved_requisition(){

$data=array();
$requisition_info=array();
$sdata=array();
//print_r($_POST);exit();

$data['requisition_no']=$this->input->post('requisition_no', true);
$data['date']=$this->input->post('date',true);
$data['employee_id']=$this->input->post('employee_id',true);
$data['project_id']=$this->input->post('project_id',true);
$data['requisition_status']="checked";
$data['recorded_by'] = $this->session->userdata('user_name'); 
$data['recording_time'] = date("y-m-d h:i:s");
$requisition_no=$this->input->post('requisition_no', true);
$item_id=$this->input->post('item_id',true);
       foreach ($item_id as $key => $value) {

        	$approved_requisition['item_id'] = $this->input->post('item_id['.$key.']', true);
        	
        	$approved_requisition['item_name'] = $this->input->post('item_name['.$key.']', true);
        	$approved_requisition['quantity'] = $this->input->post('quantity['.$key.']', true);
        	$approved_requisition['uom'] = $this->input->post('uom['.$key.']', true);
        	$approved_requisition['remarks'] = $this->input->post('remarks['.$key.']', true);
			$approved_requisition['upp'] = $this->input->post('upp['.$key.']', true);
			//json_encode($requisition_info);
		 	array_push($sdata, $approved_requisition);
		

  }

$data['requisition_info']=json_encode($sdata);

$query_result=$this->Inventory_model->update_approved_requisition($data,$requisition_no);

        	if ($query_result) { ?>
				<script>
			 
    alert("Requisition  Updated Successfully");
			window.location.assign('approved_requisition_list');		
			</script>

 				<?php  //redirect('Inventory/approved_requisition_list','refresh');
        	}





}  

public function assigned_item_retrieve_by_employee_id(){
	$requisition_data=array();
	$data=array();
	$employee_id = $this->input->post('employee_id', true);

	$issued_history=$this->Inventory_model->assigned_item_retrieve_by_employee_id($employee_id);

	if ($issued_history) {
	foreach ($issued_history as $issued_item) {
		$requisition_data['item_id']=$issued_item->item_id;
		$requisition_data['item_name']=$issued_item->item_name;
		$requisition_data['quantity']=$issued_item->quantity;
		$requisition_data['uom']=$issued_item->uom;
		$requisition_data['requisition_no']=$issued_item->requisition_no;
		array_push($data,$requisition_data);

	}

print_r(json_encode($data));exit();







	} else {
		echo "No Data Found!";
	}


}


public function material_inquiries(){

$data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";  
  $data['menu'] = $this->load->view('menu', $data, true);
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	$data['product_list'] =$this->Inventory_model->all_product_data();;  
	
    $data['maincontent'] = $this->load->view('inventory/material_inquiries', $data, true);
		
    $this->load->view('master', $data);

}


	public function show_material_inquiries_report(){

		
		$data = array();
		$details= array();
		$des= array();
	$product_id=$this->input->post('product_id',true);
	$desired_quantity=$this->input->post('desired_quantity',true);
    $data['title']="2RA Technology Limited";
   
   
    $data['product_id']=$product_id;   
  
	$product_data=$this->Inventory_model->select_individual_product_by_product_id_2($product_id);
	$data['product_name']	=$product_data->product_name;
	$data['desired_quantity']=$desired_quantity;
		//print_r($data);exit();

		$definitions=json_decode($product_data->product_definition);

		// print_r($definitions);exit();


		foreach ($definitions as $value) {
			$des['item_id']=$value->item_id;
			$item_id=$value->item_id;
			$des['item_name']=$value->item_name;
			$des['quantity']=$value->quantity;
			
			$des['description']=$value->description;
			$current_stock=$this->Inventory_model->just_pick_stock_unit_price($item_id);
			$des['current_stock']=$current_stock->quantity;
			$des['unit_price']=$current_stock->unit_price;
			$des['uom']=$current_stock->uom;
			array_push($details,$des);
		}
		$data['definition']=$details;


//print_r($data['definition']);exit();






		$this->load->view('inventory/show_material_inquiries_report', $data);
    //$this->load->view('master', $data);
		



	}

// 	public function renaming_item_id(){


// $all_the_items=$this->Inventory_model->select_all_items_info();
// //print_r($all_the_items);exit();
// foreach ($all_the_items as  $items) {
// 	$id=$items->id;
// 	$latest_id=0;
// 	$last_id=$this->Inventory_model->select_last_item_id();
     	
//      	$item_id=$last_id->last_id;
//      	if ($item_id=="") {
//      		$latest_id=100001;
     	
//      	}else{
//      	$latest_id=$item_id+1;
//     	 }
//      	$new_item_id="ITMN".date('Y').$latest_id;

//      	$updated_item_id=$this->Inventory_model->updated_item_id($id,$new_item_id);
//      //print_r($new_item_id);
//      //exit();
// }




// 	}



	public function create_item_type(){

	$data = array();
    $data['title']="2RA Technology Limited";
    $data['keyword']="";
    $data['description']="";  
  	$data['menu'] = $this->load->view('menu', $data, true);
	$data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
	$data['type_id'] =$this->Inventory_model->retriev_type_id(); 
	///print_r($data['type_id']);exit();
    $data['maincontent'] = $this->load->view('inventory/create_item_type', $data, true);
		
    $this->load->view('master', $data);
	}



		public function save_item_type(){
		$data=array();

			$type_id =$this->Inventory_model->retriev_type_id();


//print_r(expression)
					if($type_id->type_id==null){
							$last_id= 100001;
						   
					   }
						else{
							 $last_id = $type_id->type_id+1;
							 
						   }


					$company_id = $this->session->userdata('company_id');
					$data['type_id']="ITT".date('Y').$last_id;
					$data['description']=$this->input->post('description',true);
					$data['type_name']=$this->input->post('type_name',true);
					$data['created_by']=$this->session->userdata('user_name'); 
					$data['created_at']=date("y-m-d H:i:s");
					$data['is_active']=1;
					$data['company_id']=$company_id;
					$type_name=$this->input->post('type_name',true);
					$verify=$this->Inventory_model->retrieve_item_type($type_name);

					//print_r($verify);exit();
					if ($verify !==null) {
						$sdata['message']='<p style="color:red">'."Item Type Name Already Exists!".'</p>';
         			$this->session->set_userdata($sdata);
					} else{
					$saved=$this->Inventory_model->save_item_type($data);
			if ($saved) {
			 $sdata['message']="Item Type Saved Successfully! With Item Type No:".$data['type_id'];
          $this->session->set_userdata($sdata);
			}else{

			$sdata['message']='<p style="color:red">'."Something Went Wrong".'</p>';
         	$this->session->set_userdata($sdata);

					}
				}

			}



	public function item_type_list(){


				 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
      
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 
		 
		$data['item_type_for_list']=$this->Inventory_model->retrieve_item_type_for_list();

		//print_r($data['item_type_for_list']);exit();

        $data['maincontent'] = $this->load->view('inventory/item_type_list', $data, true);
		
        $this->load->view('master', $data);



			}



			public function edit_item_type($id){


			$data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
      
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 
		 
		$data['item_data_for_edit']=$this->Inventory_model->item_data_for_edit($id);

		//print_r($data['item_type_for_list']);exit();

        $data['maincontent'] = $this->load->view('inventory/edit_item_type', $data, true);
		
        $this->load->view('master', $data);
	

			}



public function update_item_type(){
		$data=array();
		$company_id = $this->session->userdata('company_id');
					$data['type_id']=$this->input->post('type_id',true);;
					$data['description']=$this->input->post('description',true);
					$data['type_name']=$this->input->post('type_name',true);
					$data['updated_by']=$this->session->userdata('user_name'); 
					
					$data['updated_at']=date("y-m-d H:i:s");
					$data['is_active']=1;
					$data['company_id']=$company_id;
					$type_name=$this->input->post('type_name',true);
					$id=$this->input->post('tid',true);


	$verify=$this->Inventory_model->retrieve_item_type_for_update_verification($type_name,$id);

					
		if ($verify !==null) {

						$sdata['message']='<p style="color:red">'."Item Type Name Already Exists!".'</p>';
         			//$this->session->set_userdata($sdata);

					} else{

					$saved=$this->Inventory_model->update_item_type($data,$id);
						//print_r($saved);exit();
			if ($saved) {

			 $sdata['message']="Item Type Updated Successfully";
          $this->session->set_userdata($sdata);

			}else{

			$sdata['message']='<p style="color:red">'."Something Went Wrong".'</p>';
         	$this->session->set_userdata($sdata);

					}
				}

			}



			public function delete_item_type($id){


					$data=array();
					$company_id = $this->session->userdata('company_id');
					
					$data['deleted_by']=$this->session->userdata('user_name'); 
					
					$data['deleted_at']=date("y-m-d H:i:s");
					$data['is_active']=0;


					$saved=$this->Inventory_model->update_item_type($data,$id);	

					if ($saved) {


			 $sdata['message']="Item Type Deleted Successfully";
          $this->session->set_userdata($sdata); ?>

          <script>
			 
	//location.assign('Inventory/item_type_list');
	window.location.replace("../item_type_list");
				
			</script>





			<?php }else{

			$sdata['message']='<p style="color:red">'."Something Went Wrong".'</p>';
         	$this->session->set_userdata($sdata);  ?>


          <script>
			 
	window.location.replace("../item_type_list");
				
			</script>

				<?php 	}

			}



public function view_on_type_base(){


//print_r($_POST);
		$item_type=$this->input->post('item_type',true);
		$company_id = $this->session->userdata('company_id');
	 	$data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
         $data['item_type']=$item_type;
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['items_data']=$this->Inventory_model->retrieve_data_for_all_item_list($item_type,$company_id);
		 $data['all_item_types']=$this->Inventory_model->select_item_type_info();

		 $data['maincontent'] = $this->load->view('inventory/all_item_list', $data, true);
		
        $this->load->view('master', $data);


}

}