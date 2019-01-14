    <br><br>



    <div class=" row">
		<div class="col-md-11 col-md-offset-1">
	
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding:0px;padding-right: 5px;
    padding-left:150;margin-left: 100px;max-height: 800px;overflow: scroll; min-width: 400px">




			<div class="panel-heading">Material Recieve Form<div class="col-md-2 pull-right" >
	<select class="js-example-basic-single" id="js-example-basic-single" name="state">
	<option value=" ">Please Write or Select</option>
	<?php foreach ($listed_data as $data) { ?>
	  <option value="<?php echo $data->item_id ?>"><?php echo $data->item_name ?></option>
	 <?php  } ?>
	</select> 
	</div> </div>

					<h3 align="center">
			<p style = "color:green"><?php echo $this->session->userdata('message');
			$this->session->unset_userdata('message')?></p>
		</h3>

 <!-- action="<?php echo base_url();?>inventory/save_material_receive" -->
		
 <form role="form"   action="<?php echo base_url();?>inventory/save_material_receive" method="post">

            <div class="table-responsive materialReceiveForm" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
                    <tr>
                      <?php
						//print_r($last_id);
						if($last_id->last_id==null){
							$last_id= 1000;
						   
					   }


						  else{
							   $last_id = $last_id->last_id+1;
							 
						   } ?>
                       
                       <th align="center">Serial No*</th>
                       <td align="center"><input type="text" name="recieve_no" value="<?php echo "RITM".date('Y').$last_id; ?>" id="recieve_no" class="form-control custom-input recieve_no" readonly ></td>     	
                       <td id="empty_header"></td>                   
					   <th align="center">Date*</th>
                       <td align="center" width="30%"><input type="text" name="date" id="date" class="form-control custom-input dateFrom" required></td>

                    </tr>             
                    <tr>
                      <td>Recieve Type</td>
                    <td><select name="recieve_type" id="recieve_type" class="form-control  custom-input">
                    	<option value="" selected>Select Recieve Type</option>
                    	<option value="product" >Production</option>
                    	<option value="assign" >Assign</option>
                    	<option value="general" >General</option>
                    	
							</select>
                    
                    </td>	
				
						<td></td>
					   <td align="center" id="assined_to_header">Assigned To*</td>
					   <td align="center" width="30%" >
					   
					   <select name="assigned_to" class="form-control  custom-input assigned_to" id="assigned_to">
					    <option value="select" selected>Select Assigned Employee Name</option>

										<?php foreach($assigned_employee_info as $assigned_employee){?>
										<option value="<?php echo $assigned_employee->employee_id?>"><?php echo $assigned_employee->employee_name ?></option>
										<?php }?>
						
					   </select>
					   </td> 
					   </tr>
					<tr>
                       
                       
                       <td align="center" id="supplier_id_header">Supplier ID*</td>
                       <td align="center">
					   <select name="supplier_id" class="form-control  custom-input supplier_id" id="supplier_id" style="max-width: 330px;">
					    <option value="" selected>Select Supplier ID</option>

										<?php foreach($supplier_list as $v_supplier){?>
										<option value="<?php echo $v_supplier->supplier_id?>"><?php echo $v_supplier->supplier_id; ?></option>
										<?php }?>
						
					   </select>
					   </td>     
					   <td id="empty_header"></td>
					   <th align="center" id="supplier_name_header">Supplier Name</th>
                       <td align="center" width="30%">
					   <input type="text" name="supplier_name" class="form-control  custom-input supplier_name" id="supplier_name"  readonly >
					   </td>

                    </tr>			

					<tr>
                      
					   <td align="center" id="supplier_contact_header">Supplier Contact*</td>
                       <td align="center" width="30%"><input type="text" name="supplier_contact" id="supplier_contact" class="form-control custom-input supplier_contact" readonly required></td>
					   <td></td>
					    <td  align="center" id="address_header">Address*</td>
						<td align="center" width="30%">
						  <input type="text" name="address" id="address" class="form-control custom-input address"  required readonly></th>  
					   </td> 
						
                    </tr>
           
                  		<tr>
						<td>Employee Name</td>
					<td>
                    <select name="employee_id1" id="employee_id1" class="form-control employee_id1">
                    	<option value="" selected>Select Employee Name</option>

										<?php foreach($employee_info as $each_employee_info){?>
										<option value="<?php echo $each_employee_info->employee_id?>"><?php echo $each_employee_info->first_name." ".$each_employee_info->last_name ?></option>
										<?php }?>

                    </select>
					
					</td>
                  <!--  <td></td>
                    <td>Recieve Type</td>
                    <td><select name="recieve_type" id="recieve_type">
                    	<option value="select" selected>Select Recieve Type</option>
                    	<option value="product" >Product</option>
                    	<option value="assign" >Assign</option>
                    	
							</select>
                    
                    </td> -->
					
                   </tr>
             <!--       <tr>
                   <td>Product Name</td>
                    <td><select name="product_name" id="product_name">
                    	<option value="select" class="custom-input form-control" selected>Select Product Name</option>
                    	<?php foreach($products_data as $each_product){?>
                    	<option value="<?php echo $each_product->product_id ?>"><?php echo $each_product->product_name ?></option>
                    	<?php }?>
							</select>
							</td>
							<td id="empty_header"></td>
							<td>Quantity</td>
							<td>
							<input type="text" name="product_quantity" id="product_quantity"></td>
              </tr> -->
					<tr>
					<td colspan="6"> <hr></td>
					</tr>
					</tbody>
					</table>


<div id="label"   class="row">
  <div class="col-md-1" style=" padding-right:0;
    padding-left: 0; text-align: center;width: 50px">
  	
  	<th align="center">SL</th>

  </div>
  <div class="col-md-2" style=" padding-right:0;
    padding-left: 0; text-align: center;">
  	
  	<th><lebel for="item_id">Item ID</lebel></th>

  </div>
  <div class="col-md-2" style=" padding-right:0;
    padding-left: 0; text-align: center;">
  	
  	<th><lebel for="item_name">Item Name</lebel></th>

  </div>


  <div class="col-md-1" style=" padding-right:0;
    padding-left: 0; text-align: center;">
  	
  	<th><lebel for="quantity">Quantity</lebel></th>
  </div>
  <div class="col-md-1" style=" padding-right:0;
    padding-left: 0; text-align: center;width: 85px">
  	
  	<th><lebel for="uom">UoM</lebel></th>
  </div>

  <div class="col-md-1" style=" padding-right:0;
    padding-left: 0; text-align: center;">
  	
  	<th><lebel for="unit_price" style=" padding-right:0;
    padding-left: 0; text-align: center;">Unit Price</lebel></th>
  </div>
  <div class="col-md-2" style=" padding-right:0;
    padding-left: 0; text-align: center;" >
  <th><lebel for="total_price">Total Price</lebel></th>
  </div>
  <div class="col-md-1" style=" padding-right:0;
    padding-left: 0; text-align: center;">
  	
  	<th><lebel for="remarks">Remarks</lebel></th>
  </div>
   <div class="col-md-1" style=" padding-right:0;
    padding-left: 0; text-align: center;">
  	
  	<th><lebel for="remarks"> </lebel></th>
  </div>
</div>

<!-- label div ends here -->

<div id="ItemsRow" style=" padding-right:5;
    padding-left: 5; text-align: center;" >
<div id="entry1" class="clonedInput row" >
  <div class="col-md-1"  style=" padding-right:0px;
    padding-left: 20px; text-align: center; width: 60px;"  >
  	
  	<td ><input type="text"  name="sl" id="sl" value="1" class="sl" readonly ></td>

  </div>
  <div class="col-md-2 itemIdSelect" style=" padding-right:1px;
    padding-left: 5px; text-align: center;">
  	<td>
  		<select name="item_id[]" id="item_id" class="form-control item_id" >
  			<option value="" selected>Select Item ID</option>
			<?php foreach($item_id as $items){?>
			<option value="<?php echo $items->item_id?>"><?php echo $items->item_id; ?></option>
			<?php }?>
						
	   </select>
   </td>
  </div>
  <div class="col-md-2 itemDiv" style=" padding-right:1px;
    padding-left: 1px; text-align: center;">
  	
  	<td><input type="text" name="item_name[]"  class="form-control item_name" readonly ></td>

  </div>


  <div class="col-md-1 quantityDiv" style=" padding-right:2px;
    padding-left: 1px; text-align: center;">
  	
  	<td><input type="number" name="quantity[]" class="form-control quantity"  ></td>
  </div>
  <div class="col-md-1 uomDiv" style=" padding-right:2px;
    padding-left: 1px; text-align: center;">
  	
  	<td><input type="text" name="uom[]" id="uom" class="form-control uom" readonly ></td>
  </div>

  <div class="col-md-1 unitPriceDiv" style=" padding-right:2px;
    padding-left: 1px; text-align: center; ">
  	
  	<td><input type="number" name="unit_price[]" id="unit_price" class="form-control unit_price" ></td>
  </div>
  <div class="col-md-2 totalpriceDiv" style=" padding-right:2px;
    padding-left: 1px; text-align: center; width: 120px;">
  <td><input type="number" name="total_price[]" id="total_price" class="form-control total_price" readonly ></td>
  </div>
  <div class="col-md-1" style=" padding-right:1px; width: 180px;
    padding-left: 0; text-align: center;">
  	
  	<th><input type="text" name="remarks[]" id="remarks" class="form-control remarks"></th>
  </div>

  <div style="display:none" class="requisition_noDiv">
    

    <th><input type="text" name="requisition_no[]" id="requisition_no" class="form-control requisition_no"></th>

  </div>
  <div class="col-md-1 eraseDiv" style=" padding-right:1px; width:30px;
    padding-left: 0; text-align: center;">
  	<td>
  		<button type="button" id="btnerase" name="btnerase[]" class="btn btn-danger btnerase">Erase</button>
  	</td>
  </div>
</div>
</div>


                    <br>
                    <div id="buttonSet1">
                    <p class="pull-right">
                        <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">Add</button>
              
                        <td> <button id="submit_button" name="" class="btn btn-primary">Recieve</button></td>
                    </p>

                    <p>
                      <!-- <td></td> <td> <button id="submit_button" name="" class="btn btn-primary">Recieve</button></td> -->
                    </p>
                    </div>
                    </fieldset>

    
                </form> 
            </div>
        </div>


        <div class="col-md-2"></div>
    </div>

<script type="text/javascript">
	$(document).ready(function() {


  $("#assigned_to").prop('disabled',true)
	$("#supplier_id").prop('disabled',true)
		$("#product_quantity").prop('disabled',true);
		 $("#employee_id").prop('disabled', true);
		 $("#employee_id1").prop('disabled', true);
		 $("#recieve_type").prop('disabled',false); 
		 $("#product_name").prop('disabled',true);
		$("#receive_from_employee").click(function () {
            if ($(this).is(":checked")) {
                $("#employee_id").prop('disabled',false);
                $("#supplier_id").prop('disabled',true);
                $("#supplier_name").prop('disabled',true);
                $("#supplier_contact").prop('disabled',true);
                 $("#address").prop('disabled',true);
                 $("#recieve_type").prop('disabled',false);
                  $("#employee_id1").prop('disabled', false);
                   //$("#assigned_to").prop('disabled', false);
                $('.unitPriceDiv .unit_price').prop('disabled',true);
                 $('.totalpriceDiv .total_price').prop('disabled',true);
                 
            } else {
                $("#employee_id").prop('disabled', true);
                $("#supplier_id").prop('disabled', false);
                $("#recieve_type").prop('disabled',false);
                $("#product_name").prop('disabled',true);
                $("#product_quantity").prop('disabled',true);
                 $("#employee_id1").prop('disabled', true);
                  $("#assigned_to").prop('disabled',true)
            }
        });

$("#recieve_type").change(function(){
if($("#recieve_type").val() =='product'){
		var p_name		 = $(this).val().trim();
		$("#product_name").prop('disabled',false);
		 $("#product_quantity").prop('disabled',false);

}if($("#recieve_type").val() =='assign'){
    var p_name     = $(this).val().trim();
    $("#assigned_to").prop('disabled',false);
    // $("#product_quantity").prop('disabled',false);

}else {

  $("#assigned_to").prop('disabled',true);
}




return true;
});


$("#recieve_type").change(function(){
if($("#recieve_type").val() =='product' || $("#recieve_type").val() =='assign' ){
		var p_name		 = $(this).val().trim();
		$("#supplier_id").prop('disabled',true)
		$("#supplier_name").prop('disabled',true)
		$("#supplier_contact").prop('disabled',true)
		$("#supplier_address").prop('disabled',true)
		$("#supplier_name_header").prop('disabled',true)
		$("#supplier_id_header").prop('disabled',true)
		$("#supplier_name_header").prop('disabled',true)
		$("#supplier_contact_header").prop('disabled',true)
		$("#supplier_address_header").prop('disabled',true)
		$("#empty_header").prop('disabled',true)
		$("#address_header").prop('disabled',true)
		$("#address").prop('disabled',true)
		 $("#employee_id").prop('disabled',false);
		 $('.unitPriceDiv .unit_price').prop('disabled',true);
                 $('.totalpriceDiv .total_price').prop('disabled',true);
                  $("#employee_id1").prop('disabled', false);
		
		 //$("#product_quantity").prop('disabled',false);

} else {
	$("#supplier_id").prop('disabled',false)
	$("#supplier_id").prop('disabled',false)
		$("#supplier_name").prop('disabled',false)
		$("#supplier_contact").prop('disabled',false)
		$("#supplier_address").prop('disabled',false)
		$("#supplier_name_header").prop('disabled',false)
		$("#supplier_id_header").prop('disabled',false)
		$("#supplier_name_header").prop('disabled',false)
		$("#supplier_contact_header").prop('disabled',false)
		$("#supplier_address_header").prop('disabled',false)
		$("#empty_header").prop('disabled',false)
		$("#address_header").prop('disabled',false)
		$("#address").prop('disabled',false)
		 $("#employee_id").prop('disabled',true);
		 $('.unitPriceDiv .unit_price').prop('disabled',false);
                 $('.totalpriceDiv .total_price').prop('disabled',false);
                 $("#employee_id").prop('disabled', true);
                  $("#employee_id1").prop('disabled', true);


}

});


$('#receive_from_employee').find('input:checkbox').bind('change', function() {
    if(this.checked) {
    }
    else {
        alert('uncheckd ' + $(this).val());
    }
});

	$('.supplier_id').select2();
	$('.employee_id1').select2();
	//$('.item_id').select2();


    	$('.js-example-basic-single').select2();


		$(".js-example-basic-single").on('change',function(){

			var item		 = $(this).val().trim();
			var itemElement		 = $(this);
			// console.log(itemElement);
		
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/pick_item_info',
					data:{ 
							item_id: item
						},
					success: function(result) {
						if (!result) {
							alert('no data found!!');
							return 0;
						}
						// console.log(itemElement);
						var result = result.split('#');
						var itemName = result[0];
						
						var uom = result[1];

	
						var lastRow = $("#ItemsRow .clonedInput:last");
			        	var clonnedRow = lastRow.clone().find('input').val('').end();
			        	//$("#select_id").val("val2").change();
							var last_row_data=lastRow.clone().find('input.item_name').val();
			
			        	
			        	if (last_row_data !== "") {
							
			        		alert('Please Add A row First');
							//lastRow.find('select.item_id').dropkick('reset', true);
							


			        		event.preventDefault();
							
		    	 		return false;

			        	}
			        	lastRow.find('select.item_id').val(item);
			        	lastRow.find('input.item_id').val(item).change();
			        	lastRow.find('input.item_name').val(itemName);
			        	lastRow.find('input.uom').val(uom);
			        	var nextSlNumber = lastRow.find('input.sl').val()*1+1;
			        	clonnedRow.find('input.sl').val(nextSlNumber);


						$("#ItemsRow").append(clonnedRow);
					    $('#btnDel').attr('disabled', false);
						$("#ItemsRow .clonedInput:last").remove();
						
	
					}.bind(this),
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
			});

		$('#search_button').click(function(){
			//alert("Search Found");
				var search_data= $('#search_data').val().trim();

				//alert(search_data);


				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/pick_searched_item',
					data:{ 
			
							search_data: search_data
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						//$("#table_id tbody").html("");
						//$("#table_id tbody").html(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

 			});

       // $('#description_div').hide();
		$('#submit_button').click(function(){

			//alert("Testing");
			if(form_validation())
			{
				//alert("validation true");
				
				var recieve_no		 = $('#recieve_no').val().trim();
				var date		 = $('#date').val().trim();
				var supplier_id		 = $('#supplier_id').val().trim();
				var supplier_name		 = $('#supplier_name').val().trim();
				var supplier_contact		 = $('#supplier_contact').val().trim();
				var address		 = $('#address').val().trim();
				var employee_id		 = $('#employee_id').val().trim();
				// var project_id		 = $('#project_id').val().trim();
				// var project_name		 = $('#project_name').val().trim();
				// var project_description		 = $('#project_description').val().trim();
				//alert(recieve_no);


				var item_id= new Array();

	            $('.item_id[]').each(function(){
	                item_id.push($(this).val().trim());
	            });

				var item_name= new Array();
	            $('.item_name').each(function(){
	                item_name.push($(this).val().trim());
	            });

				var quantity= new Array();
	            $('.quantity').each(function(){
	                quantity.push($(this).val().trim());
	            });	 

	            var uom= new Array();
	            $('.uom').each(function(){
	                uom.push($(this).val().trim());
	            });	 

	            var unit_price= new Array();        
	            $('.remaunit_pricerks').each(function(){
	                unit_price.push($(this).val().trim());
	            });	 

	            var total_price= new Array();           
	            $('.total_price').each(function(){
	                total_price.push($(this).val().trim());
	            });
	            var remarks= new Array();           
	            $('.remarks').each(function(){
	                remarks.push($(this).val().trim());
	            });

	             var employee_id= new Array();           
	            $('.employee_id').each(function(){
	                employee_id.push($(this).val().trim());
	            });
			

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/save_material_receive',
					data:{ 
							recieve_no: recieve_no, 
							date: date, 
							supplier_id: supplier_id,
							supplier_name: supplier_name,
							supplier_contact: supplier_contact,
							address: address,
							item_id: item_id,
							item_name: item_name,
							quantity: quantity,
							uom: uom,
							unit_price: unit_price,
							total_price: total_price,
							remarks: remarks,
							employee_id:employee_id,
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						//$("#table_id tbody").html("");
						//$("#table_id tbody").html(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				//alert(response);
			
			}

		});
		//$('#btnerase')

		// function deleteRow(btn) {
		// 	confirm("Are you sure you wish to remove this section? This cannot be undone.");
  // 				var row = $(this).parent().parent().find('.eraseDiv .btnerase')

  // 				row.parent().parent().removeChild(row);
		// 		}
		$("#ItemsRow").on('click','#btnerase',function(){

		
		 var itemElement		 = $(this);
		 var con= confirm("Are you sure you wish to remove this section? This cannot be undone.");
		 
		 if (con==true) {
		 	 $(this).parent().parent().remove();
		 }else {



		 }
      	// $(this).parent().parent().remove();
      	
 
            
     
        });


		$("#ItemsRow").on('keyup','.unit_price',function(){

            var n1 = parseInt($(this).parent().parent().find('.quantityDiv .quantity').val());
            var n2 = parseInt($(this).parent().parent().find('.unitPriceDiv .unit_price').val());
            var r = n1 * n2;
            $(this).parent().parent().find('.totalpriceDiv .total_price').val(r)
            //$('#total_price').val(r);
           //$(this).val(r);
            return true;
        });


		$("#ItemsRow").on('change','.item_id',function(){

			var item		 = $(this).val().trim();
			var itemElement		 = $(this);
			// console.log(itemElement);
		
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/pick_item_info',
					data:{ 
							item_id: item
						},
					success: function(result) {
						if (!result) {
							alert('no data found!!');
							return 0;
						}
						// console.log(itemElement);
						var result = result.split('#');
						var itemName = result[0];
						
						var uom = result[1];

						itemElement.parent().parent().find('.itemDiv .item_name').val(itemName);
						itemElement.parent().parent().find('.uomDiv .uom').val(uom);
	
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
			});




				$(".supplier_id").change(function(){
			//alert("Here");
			var supplier_id	= $('#supplier_id').val().trim();
			var response;
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/pick_supplier_info_for_material_recieve',
					data:{ 
							supplier_id: supplier_id
						},
					//timeout: 4000,
					success: function(result) {
						
						var supplier_info_ajax = result.trim().split('#');

						var supplier_name =supplier_info_ajax[0];
						var supplier_contact =supplier_info_ajax[1];
						var address =supplier_info_ajax[2];
						$('#supplier_name').val(supplier_name);
						$('#supplier_contact').val(supplier_contact);
						$('#address').val(address);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
					

			//$('#employee_name').val(response);
		
		});


		$("#project_id").change(function(){
			//alert("Here");
			
			var project_id = $('#project_id').val().trim();
						
			var response;
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Project_tracking/pick_project_name_description',
					data:{ 
							project_id: project_id
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
			var project_info = response.trim().split('#');
			//var item_name = item_info[0];
			var project_name = project_info[0];
			var project_description = project_info[1];
			$('#project_name').val(project_name);
			$('#project_description').val(project_description);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
					

			//$('#employee_name').val(response);
		
		});
		
	});



      $("#assigned_to").on('change',function(){

var employee_id=$(this).val().trim();




//alert(employee_id);
$.ajax({

async:false,
type:'POST',
url:'<?php echo base_url();?>Inventory/assigned_item_retrieve_by_employee_id',
data:{
  employee_id:employee_id


},

success:function(result){
if (!result) {
        alert('no data found!!');
      return 0;
      }

//alert(result);

var data = result;


var product_items = $.parseJSON(data);
    console.log(product_items);
 $.each(product_items, function (key, val) {




  var lastRow = $("#ItemsRow .clonedInput:last");
  var clonnedRow = lastRow.clone().find('input').val('').end();
    
            
  lastRow.find('select.item_id').val(val['item_id']);
  lastRow.find('input.item_name').val(val['item_name']);
 // lastRow.find('input.current_stock').val(val['current_stock']);
  //lastRow.find('input.balance').val(val['balance']);
  lastRow.find('input.quantity').val(val['quantity']);
  //lastRow.find('input.quantity').val(total_quantity);
  lastRow.find('input.uom').val(val['uom']);
  lastRow.find('input.requisition_no').val(val['requisition_no']);
  //lastRow.find('input.remarks').val(val['remarks']);

  var nextSlNumber = lastRow.find('input.sl').val()*1+1;
  clonnedRow.find('input.sl').val(nextSlNumber);
  $("#ItemsRow").append(clonnedRow);
  $('#btnDel').attr('disabled', false);

         });
       
      

  $('#ItemsRow .clonedInput:last').remove();
  
  
    }
  })


});

	
	function form_validation()
	{

		if($('#date').val().trim() == "")
		{
			alert("Please Select Date");
			$('#date').focus();
			event.preventDefault();
			return false;
		}
		
		
		if($('#recieve_type').val().trim() == "")
		{
			alert("Please Select Recieve Type");
			$('#recieve_type').focus();
			event.preventDefault();
			return false;
		}

      if($('#recieve_type').val().trim() == "assign" && $('#employee_id1').val().trim() == "")
    {
      alert("Please Select Employee Name");
      $('#employee_id1').focus();
      event.preventDefault();
      return false;
    }


       if($('#recieve_type').val().trim() == "general" && $('#supplier_id').val().trim() == "")
    {
      alert("Please Select Supplier ID");
      $('#supplier_id').focus();
      event.preventDefault();
      return false;
    }

      if($('#recieve_type').val().trim() == "product" && $('#employee_id1').val().trim() == "")
    {
      alert("Please Select Employee Name");
      $('#employee_id1').focus();
      event.preventDefault();
      return false;
    }


		var wrongInput = 0;
		$('input[name^="item_name"]').each(function() {
			var itemSelected = $(this).parent().parent().find('.item_id').val();
		    if(itemSelected == '' || itemSelected == null)
		    {
				wrongInput++;
		    	alert('Please Select Item Id');
		    	$(this).parent().parent().find('.item_id').focus().select();
		    	 event.preventDefault();
		    	 return false;
		    }
		 
		});
		if(wrongInput == 0)
		{		
			$('input[name^="quantity"]').each(function() {
			    if($(this).val() == '' || $(this).val() == null)
			    {
			    	alert('Please Provide Quantity Informations');
			    	$(this).focus();
			    	 event.preventDefault();
			    	 return false;
			    }
			  
			});
		}
		
		


	

		
		return true;
			
	}





	
	  // $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	   //$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });



        $('#btnAdd').click(function () {
        	var lastRow = $("#ItemsRow .clonedInput:last");
        	var clonnedRow = lastRow.clone().find('input').val('').end();
        	var nextSlNumber = lastRow.find('input.sl').val()*1+1;
        	clonnedRow.find('input.sl').val(nextSlNumber);
			$("#ItemsRow").append(clonnedRow);
		    $('#btnDel').attr('disabled', false);
			$('#js-example-basic-single').prop('selectedIndex',0);
			//$('#js-example-basic-single option:eq(0)').attr('selected','selected');

									
  
    	});


    $('#btnDel').click(function () {
        // Confirmation dialog box. Works on all desktop browsers and iPhone.
        if (confirm("Are you sure you wish to remove this section? This cannot be undone."))
        {
            var num = $('.clonedInput').length;
            $('#ItemsRow .clonedInput:last').remove();
				// console.log($('#ItemsRow .clonedInput:last').html());
            // $('#entry' + num).slideUp('slow', function () {$(this).remove();
                // if only one element remains, disable the "remove" button
                 $('#btnerase').attr('disabled', true);
                if (num -1 === 1)
                    $('#btnDel').attr('disabled', true); 

                // enable the "add" button
        }
    });
    // Enable the "add" button
    $('#btnAdd').attr('disabled', false);
    // Disable the "remove" button
    $('#btnDel').attr('disabled', true);

</script>