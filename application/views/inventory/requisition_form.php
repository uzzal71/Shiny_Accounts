    <br><br>
    <div class="row">
		<div class="col-md-12 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 120px; margin-right: 200px; max-height: 450px;overflow: scroll">


			<div class="panel-heading">Material Requisition Form<div class="col-md-1 pull-right" style=" width: 200px" >
	<select class="js-example-basic-single" id="js-example-basic-single" name="state" style=" width: 150px">
	<option>Please Select Write Item Name</option
	<?php foreach ($listed_data as $data) { ?>
	  <option value="<?php echo $data->item_id ?>"><?php echo $data->item_name ?></option>
	 <?php  } ?>
	</select> 
	</div> </div>


					<h3 align="center">
			<p style = "color:green"><?php echo $this->session->userdata('message');
			$this->session->unset_userdata('message')?></p>
		</h3>   
 <form role="form" name="requisition" action="<?php echo base_url();?>inventory/recieve_requisition" method="post">

            <div class="table-responsive materialReceiveForm" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
                    <tr>
                      <?php
						


						if($last_id->last_id==null){
							$last_id= 1000;
						   
					   }
						   else{

						   	
							   $last_id = $last_id->last_id+1;
							 
						   } ?>
                       
                       <th align="center"  >Requisition No*</th>
                       <td align="center"  ><input type="text" name="requisition_no" value="<?php echo "RIQU".date('Y').$last_id; ?>" id="recieve_no" class="form-control custom-input" readonly ></td>                        
					   <th align="center" >Date*</th>
                       <td align="center" ><input type="text" value="<?php echo date('Y- m -d '); ?>" name="date" id="date" class="form-control custom-input dateTimeFrom" ></td>

                    </tr>             

					<tr>
                       
                       
                       <th align="center">Employee Name*</th>
                       <td align="center" width="300px;">
					   <select  name="employee_id" class="form-control  custom-input employee_id" id="employee_id"   required  >
					    <option value="" selected>Select Employee Name</option>

										<?php foreach($employee_data as $each_employee){?>
										<option value="<?php echo $each_employee->employee_id?>"><?php echo $each_employee->first_name.' '.$each_employee->last_name?></option>
										<?php }?>
						
					   </select>
					   </td>
					  <th align="center" >Poject Name*</th>
						<td align="center"  >
						  <select name="project_id" class="form-control  custom-input project_id" id="project_id"    >
					    <option value="" selected >Select Project Name</option>

										<?php foreach($project_info as $project){?>
										<option value="<?php echo $project->project_id;?>"><?php echo $project->project_name.'-'.$project->customer_name;?></option>
										<?php }?>
						
					   </select>  
					   </td> 

                    </tr>			

					<tr>
                      
					   <td>Requisition Type*</td>
					    <td><select name="requisition_type" class="form-control custom-input requisition_type" id="requisition_type" >
					    <option  value="">Select Requisition Type</option>
					    	<option value="assigned">Assign</option>
					    	<option value="production">Production</option>
					    	<option value="general_issue">General Issue</option>
					    </select></td>
					     <td>Poject ID</td>
					     <td><input type="text"  id="project_name" class="form-control custom-input project_name" ></td>
					   
					    <input type="hidden" name="project_name" id="project_name_real" class="form-control custom-input project_name_real" >
						
                    </tr>		
	
                    <tr>   
                    <td align="center" ><input type="checkbox" name="product" id="product" class="form-control custom-input product">Product</td>
                    	<th align="center">Quantity*</th>
                    	<td align="center" ><input type="text" name="pquantity" id="pquantity" class="form-control custom-input pquantity" ></td>
                    	<td ">
                    		<select name="product_id" class="form-control  custom-input product_id" id="product_id" >
                    			<option value="select" selected>Select Prduct Name</option>

                    			<?php foreach($product_list as $product){?>
                    			<option value="<?php echo $product->product_id;?>"><?php echo $product->product_name;?></option>
                    			<?php }?>

                    		</select> 
                    	</td>
	   

                    </tr>

					<tr>
						<td></td>
						<td></td>
						<th align="center">Prduct ID</th>
                       
					    <td align="center" width="30%"><input type="text" name="pid" id="pid" class="form-control custom-input pid" readonly ></td> 

					   
                    </tr>
					<tr>
					<td colspan="6"> <hr></td>
					</tr>
					</tbody>
					</table>


<div id="label"   class="row">
  <div class="col-md-1" style="padding: 1px; margin-left: 30px;">	
  	<th>SL</th>
  </div>
  <div class="col-md-2" style="padding: 2px;">
  	
  	<th><lebel for="item_id">Item ID</lebel></th>

  </div>
  <div class="col-md-2" style="padding: 1px;max-width: 130px;">
  	
  	<th><lebel for="item_name">Item Name</lebel></th>

  </div>

<div class="col-md-1" style="padding: 1px;">
  	
  	<th><lebel for="quantity">CS</lebel></th>
  </div>

  <div class="col-md-1" style="padding: 1px;">
  	
  	<th><lebel for="quantity">Quantity</lebel></th>
  </div>
  <div class="col-md-1" style="padding: 1px;">
  	
  	<th><lebel for="uom" style="padding: 1px;">UoM</lebel></th>
  </div>

  <div class="col-md-1" style="padding: 1px;">
  	
  	<th><lebel for="upp" style="padding: 1px;">UPP</lebel></th>
  </div>
  <div class="col-md-1" style="padding: 1px;">
  	
  	<th><lebel for="upp" style="padding: 1px;">Remarks</lebel></th>
  </div>
</div>
<!-- label div ends here -->

<div id="ItemsRow">
<div id="entry1" class="clonedInput row">
  <div class="col-md-1" style="max-width:50px; margin-left: 10px;">
  	
  	<td><input type="text" name="sl" id="sl" value="1" class="sl" readonly ></td>

  </div>
  <div class="col-md-2 itemIdSelect" style="min-width: 150px; padding: 0px">
  	<td>
  		<select name="item_id[]" id="item_id" class="form-control item_id"  >
  		<!-- <select class="js-example-basic-single itemIdSelect" name="state" style=" width: 150px"> -->
  			<option value="" selected>Select Item ID</option>
			<?php foreach($item_id as $items){?>
			<option value="<?php echo $items->item_id?>"><?php echo $items->item_id; ?></option>
			<?php }?>
						
	   </select>
   </td>
  </div>
  <div class="col-md-2 itemDiv" style="padding: 1px;">
  	
  	<td><input type="text" name="item_name[]" class="form-control item_name"  readonly  ></td>

  </div>

 <div class="col-md-1 currentstockDiv" style="padding: 1px;" >
  	
  	<td><input type="text" name="current_stock[]" id="current_stock" class="form-control current_stock" readonly  ></td>
  </div>
  <div class="col-md-1 quantityDiv" style="padding: 1px;">
  	
  	<td><input type="number" name="quantity[]" id="quantity" class="form-control quantity"    ></td>
  </div>
  <div class="col-md-1 uomDiv" style="padding: 1px;">
  	
  	<td><input type="text" name="uom[]" id="uom" class="form-control uom" readonly ></td>
  </div>

  
  <div class="col-md-1 uppDiv" style="padding: 1px;">
  	
  	<th><input type="text" name="upp[]" id="upp" class="form-control upp" readonly></th>
  </div>
  <div class="col-md-2 remarksDiv" style="padding: 1px;">
  	
  	<th><input type="text" name="remarks[]" id="upp" class="form-control remarks"></th>
  </div>
   <div class="col-md-1 eraseDiv" style=" padding-right:1px; width:30px;
    padding-left: 0; text-align: center;">
  	<td>
  		<button type="button" id="btnerase" name="btnerase[]" class="btn btn-danger btnerase">Erase</button>
  	</td>
  </div>
</div>
</div>

                    <div id="buttonSet1">
                    <p class="" style="margin-left: 850px;">
                        <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">add</button>
                        <!-- <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">remove</button> -->
                        <td> <button id="submit_button" name="" class="btn btn-primary">Submit</button></td>
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

		 $("#product_id").prop('disabled', true);
		 $("#pquantity").prop('disabled', true);
		 $("#upp").prop('disabled', true);

		$("#product").click(function () {
            if ($(this).is(":checked")) {
                $("#product_id").prop('disabled',false);
                $("#pquantity").prop('disabled',false);
                $("#upp").prop('disabled', false);

            } else {
                $("#product_id").prop('disabled', true);
                $("#pquantity").prop('disabled',true);
                 $("#upp").prop('disabled', true);
            }
        });

		$("#ItemsRow").on('click','#btnerase',function(){

			var lastRow = $("#ItemsRow .clonedInput:last");
			var sl = lastRow.find('input.sl').val();
			if (sl > 1) {
				var con= confirm("Are you sure you wish to remove this section? This cannot be undone.");

				if (con==true) {
					$(this).parent().parent().remove();
				}else {

				}
			}
			else
			{
				alert("You cannot remove First Row");
			}
		});


		
		
		$("#product_id").change(function(){

			var product_id=$(this).val().trim();

			var pquantity =parseInt($('#pquantity').val().trim());

$.ajax({

	async:false,
	type:'POST',
	url:'<?php echo base_url();?>Inventory/select_product_by_product_id',
	data:{
		product_id:product_id,
		pquantity:pquantity

	},

	success:function(result){
		if (!result) {
			alert('no data found!!');
			return 0;
		}

			//alert(result);
			var data = $.parseJSON(result);
//var decoded_data = $.map(data, function(el) { return el });
//alert(decoded_data);
$.each(data, function(key,val){
	//alert(val['item_name']);
	var total=parseInt((val['quantity']));
	var total_quantity=total*pquantity;

	var lastRow = $("#ItemsRow .clonedInput:last");
	var clonnedRow = lastRow.clone().find('input').val('').end();
	lastRow.find('select.item_id').val(val['item_id']);
	lastRow.find('input.item_name').val(val['item_name']);
	//lastRow.find('input.quantity').val(val['quantity']);
	lastRow.find('input.quantity').val(total_quantity);
	lastRow.find('input.uom').val(val['uom']);
	lastRow.find('input.upp').val(val['quantity']);
	lastRow.find('input.current_stock').val(val['current_stock']);
	lastRow.find('input.remarks').val(val['remarks']);
	var nextSlNumber = lastRow.find('input.sl').val()*1+1;
	clonnedRow.find('input.sl').val(nextSlNumber);
	$("#ItemsRow").append(clonnedRow);
	$('#btnerase').attr('disabled', false);


});

$('#ItemsRow .clonedInput:last').remove();
//alert(data);
//var product_items = $.parseJSON(data['product_definition']);
		//console.log(product_items);
//  $.each(product_items, function (key, val) {


// var total=parseInt((val['quantity']));


// var total_quantity=total*pquantity;

// //alert(total_quantity);

//  	var lastRow = $("#ItemsRow .clonedInput:last");
// 	var clonnedRow = lastRow.clone().find('input').val('').end();
// 	lastRow.find('select.item_id').val(val['item_id']);
// 	lastRow.find('input.item_name').val(val['item_name']);
// 	//lastRow.find('input.quantity').val(val['quantity']);
// 	lastRow.find('input.quantity').val(total_quantity);
// 	lastRow.find('input.uom').val(val['uom']);
// 	lastRow.find('input.upp').val(val['quantity']);
// 	lastRow.find('input.remarks').val(val['remarks']);
// 	var nextSlNumber = lastRow.find('input.sl').val()*1+1;
// 	clonnedRow.find('input.sl').val(nextSlNumber);
// 	$("#ItemsRow").append(clonnedRow);
// 	$('#btnDel').attr('disabled', false);





//     });


}
})


});

$("#product_id").change(function(){
	
	var pid		 = $(this).val().trim();
	
	//alert(pid);
	$('#pid').val(pid);
});

// var n1 = parseInt($(this).parent().parent().find('.quantityDiv .quantity').val());
//             var n2 = parseInt($(this).parent().parent().find('.unitPriceDiv .unit_price').val());
//             var r = n1 * n2;
//            $(this).val(r);
//             return true;

$('.project_id').select2();
$('.employee_id').select2();
$('.product_id').select2();


$('.js-example-basic-single').select2();


		$(".js-example-basic-single").on('change',function(){

			var item		 = $(this).val().trim();
			var itemElement		 = $(this);
			// console.log(itemElement);
		
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/pick_item_info_with_stock',
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
						var current_stock= result[2];
	
						var lastRow = $("#ItemsRow .clonedInput:last");
			        	var clonnedRow = lastRow.clone().find('input').val('').end();
			        	// $("#select_id").val("val2").change();
							var last_row_data=lastRow.clone().find('input.item_name').val();

			        	//alert(last_row_data);
			        	if (last_row_data !== "") {

			        		alert('Please Add another Row By Clicking Add Button');
			        		event.preventDefault();
		    	 		return false;

			        	}
			        	lastRow.find('select.item_id').val(item);
			        	//lastRow.find('input.item_id').val(item).change();
			        	lastRow.find('input.item_name').val(itemName);
			        	lastRow.find('input.uom').val(uom);
			        	lastRow.find('input.current_stock').val(current_stock);
			        	var nextSlNumber = lastRow.find('input.sl').val()*1+1;
			        	clonnedRow.find('input.sl').val(nextSlNumber);
						//$("#ItemsRow").append(clonnedRow);
					    $('#btnDel').attr('disabled', false);
						
		//$('#ItemsRow .clonedInput:last').remove();
					}.bind(this),
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
			//$('#ItemsRow .clonedInput:last').remove();
				
			});


	// 	$("#product").checkbox(function(){
	// 	if(this.value == "Weekend")
	// 	$("#product_name").prop('disabled', false);
	// 	else{
	// 		$("#day").prop('disabled', true);
	// 		$("#day").val('');

	// 	}

	// });


		$("#submit_button").click(function(){

			//alert("Testing");
			if(form_validation() == true)
			{
				//alert("validation true");
				
				var recieve_no		 = $('#recieve_no').val().trim();
				var date		 = $('#date').val().trim();
				var supplier_id		 = $('#supplier_id').val().trim();
				var supplier_name		 = $('#supplier_name').val().trim();
				var supplier_contact		 = $('#supplier_contact').val().trim();
				var address		 = $('#address').val().trim();
				// var project_id		 = $('#project_id').val().trim();
				// var project_name		 = $('#project_name').val().trim();
				// var project_description		 = $('#project_description').val().trim();

				var item_id= new Array();

	            $('.item_id').each(function(){
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
			

				//var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>',
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
							remarks: remarks
						
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


		$("#project_id").on('change',function(){

			var project_id = $(this).val().trim();
			//alert(project_id);
			$.ajax({
				async:false,
				type:'POST',
				url: '<?php echo base_url();?>Project_tracking/pick_project_name_description',
				data:{
					project_id:project_id

				},

				success:function(result){
					if (!result) {
							alert('no data found!!');
							return 0;
						}
						//alert(result);
						var project_info = result.trim().split('#');
						var p_name= project_info[1]
						$('#project_name').val(project_id);
						$('#project_name_real').val(p_name);
						

				}

			})



		});



		$("#ItemsRow").on('click','.total_price',function(){

            var n1 = parseInt($(this).parent().parent().find('.quantityDiv .quantity').val());
            var n2 = parseInt($(this).parent().parent().find('.unitPriceDiv .unit_price').val());
            var r = n1 * n2;
           $(this).val(r);
            return true;
        });




		$("#ItemsRow").on('change','.item_id',function(){

			var item		 = $(this).val().trim();
			var itemElement		 = $(this);
			// console.log(itemElement);
		
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/pick_item_info_with_stock',
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
						var current_stock= result[2];
						
						var uom = result[1];

						itemElement.parent().parent().find('.itemDiv .item_name').val(itemName);
						itemElement.parent().parent().find('.uomDiv .uom').val(uom);
						itemElement.parent().parent().find('.currentstockDiv .current_stock').val(current_stock);
	
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

					//$("#ItemsRow").on('click','.total_price',function()
		$("#ItemsRow").on('change','.project_id',function(){
			alert("Here");
			
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
			//$('#project_description').val(project_description);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
					

			//$('#employee_name').val(response);
		
		});
		
	});
	
	function form_validation()
	{
		if($('#date').val().trim() == "")
		{
			alert("Please Select Date");
			$('#date').focus();
			return false;
		}

		if($('#employee_id').val().trim() == "" || $('#employee_id').val().trim() == null)
		{
			alert("Please Select Employee Name");
			$('#employee_id').focus();
			return false;
		}


		if($('#project_id').val().trim() == "")
		{
			alert("Please Select Project Name");
			$('#project_id').focus();
			 event.preventDefault();
			return false;
		}
		if($('#requisition_type').val().trim() == "")
		{
			alert("Please Select Requisition Type");
			$('#requisition_type').focus();
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
			    if($(this).val() == '' || $(this).val() == null || $(this).val() <1)
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

	
	   //$('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateTimeFrom').datepicker({ dateFormat:'yy-mm-dd' });
	  // $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });



        $('#btnAdd').click(function () {
        	var lastRow = $("#ItemsRow .clonedInput:last");
        	var clonnedRow = lastRow.clone().find('input').val('').end();
        	var nextSlNumber = lastRow.find('input.sl').val()*1+1;
        	clonnedRow.find('input.sl').val(nextSlNumber);
			$("#ItemsRow").append(clonnedRow);
		    $('#btnDel').attr('disabled', false);
		    $('#js-example-basic-single').prop('selectedIndex',0);
  
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
                if (num -1 === 1)
                    $('#btnDel').attr('disabled', true);
                $('#btnerase').attr('disabled', true);
                
                // enable the "add" button
        }
    });
    // Enable the "add" button
    $('#btnAdd').attr('disabled', false);
    // Disable the "remove" button
    $('#btnDel').attr('disabled', true);

</script>