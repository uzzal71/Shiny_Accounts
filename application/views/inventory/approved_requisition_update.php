    <br><br>
    <div class="row">
		<div class="col-md-12 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 120px; margin-right: 200px; max-height: 450px;overflow: scroll">


			<div class="panel-heading">Material Requisition Update Form<div class="col-md-1 pull-right" style=" width: 200px" >
	<select class="js-example-basic-single" name="state" style=" width: 150px">
	<?php foreach ($listed_data as $data) { ?>
	  <option value="<?php echo $data->item_id ?>"><?php echo $data->item_name ?></option>
	 <?php  } ?>
	</select> 
	</div> </div>


					<h3 align="center">
			<p style = "color:green"><?php echo $this->session->userdata('message');
			$this->session->unset_userdata('message')?></p>
		</h3>
 <form role="form" name="requisition" action="<?php echo base_url();?>inventory/update_approved_requisition" method="post">

            <div class="table-responsive materialReceiveForm" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
                    <tr>
                      

                       
                       <th align="center" width="20%">Requisition No*</th>
                       <td align="center" width="20%"><input type="text" name="requisition_no" value="<?php echo $requisition_data->requisition_no ?>" id="recieve_no" class="form-control custom-input" readonly ></td>                        
					   <th align="center" style="min-width: 200px;">Date*</th>
                       <td align="center"><input type="text" value="<?php echo $requisition_data->date?>" name="date" id="date" class="form-control custom-input dateFrom" required></td>

                    </tr>             

					<tr>
                       
                       
                       <th align="center">Employee ID*</th>
                       <td align="center" width="20%">
					   <input type="text" name="employee_id" class="form-control  custom-input employee_id" id="employee_id" value="<?php echo $requisition_data->employee_id?>" readonly >
			

					   <!--  <option value="<?php echo $requisition_data->employee_id?>" readonly selected><?php echo $requisition_data->employee_id?></option>

										<?php foreach($employee_data as $each_employee){?>
										<option value="<?php echo $each_employee->employee_id?>"><?php echo $each_employee->employee_id?></option>
										<?php }?> -->
						
					   </select>
					  <th align="center" style="min-width: 120px">Poject ID*</th>
						<td align="center" style="min-width: 120px" >
						  <select name="project_id" class="form-control  custom-input project_id" id="project_id" >
					    <option value="select" selected>Select Project ID</option>
					     <option value="<?php echo $requisition_data->project_id?>" selected><?php echo $requisition_data->project_id?></option>

										<?php foreach($project_info as $project){?>
										<option value="<?php echo $project->project_id;?>"><?php echo $project->project_id;?></option>
										<?php }?>
						
					   </select> 

					   </td> 

                    </tr>
                    <td></td>
                    	<td></td>			
 							<td>Poject Name</td>
					     <td><input type="text" name="project_name" id="project_name" class="form-control custom-input project_name" ></td>
					<tr>
                      
					   
					   
					    
						
                    </tr>		
	
			<!-- <tr>
                      
					   <th align="center">Product*</th>
                       <td align="center" width="10%"><input type="checkbox" name="product" id="product" class="form-control custom-input product"></td>
                       <td>
                       	
<select name="product_id" class="form-control  custom-input product_id" id="product_id" >
					    <option value="select" selected>Select Prduct Name</option>

										<?php foreach($product_list as $product){?>
										<option value="<?php echo $product->product_id;?>"><?php echo $product->product_name;?></option>
										<?php }?>
						
					   </select> 
					   



                       </td>
                       <th align="center">Quantity*</th>
                       <td align="center" width="10%"><input type="text" name="pquantity" id="pquantity" class="form-control custom-input pquantity" ></td>
					   
					   
					   
						
                    </tr> -->

					<!-- <tr>
						<th align="center">Project Description</th>
                       
					    <td align="center" width="30%"><input type="text" name="project_description" id="project_description" class="form-control custom-input"readonly ></td> 

					    <th align="center">User Type Test</th>

					 


					     <td align="center" width="30%"><input type="hidden" name="row_count" id="row_count" class="form-control custom-input" ></td>  
                      
                    </tr> -->
					<tr>
					<td colspan="6"> <hr></td>
					</tr>
					</tbody>
					</table>


<div id="label"   class="row">
  <div class="col-md-1" style="padding: 1px; max-width: 35px;">
  	
  	<th>SL</th>

  </div>
  <div class="col-md-2" style="padding: 1px;">
  	
  	<th><lebel for="item_id">Item ID</lebel></th>

  </div>
  <div class="col-md-2" style="padding: 1px;">
  	
  	<th><lebel for="item_name">Item Name</lebel></th>

  </div>

<div class="col-md-1" style="padding: 1px;min-width: 120px;">
  	
  	<th><lebel for="quantity">Current Stock</lebel></th>
  </div>

  <div class="col-md-1" style="padding: 1px;min-width: 120px;">
  	
  	<th align="center"><lebel for="quantity">Quantity</lebel></th>
  </div>
  <div class="col-md-1" style="padding: 1px;">
  	
  	<th><lebel for="uom" style="padding: 1px;">UoM</lebel></th>
  </div>

 
  <div class="col-md-1" style="padding: 1px;">
  	
  	<th><lebel for="upp" style="padding: 1px;">Remarks</lebel></th>
  </div>

</div>
<!-- label div ends here -->

	<div id="ItemsRow">
<?php $tbl_data=json_decode($requisition_data->approved_requisition);

// print_r("<pre>");
// print_r($tbl_data);exit();

$sl=0;
foreach ($tbl_data as $key => $requisition_items) { $sl++;?>
 
 

<div id="entry1" class="clonedInput row">
  <div class="col-md-1 " style="max-width:20px; position: left;">
  	
  	<td><input type="text" name="sl" id="sl" value="<?php echo $sl; ?>" class="sl" readonly ></td>

  </div>
  <div class="col-md-1 itemIdSelect" style="min-width: 150px; padding: 0px">
  	<td>
  		<select name="item_id[]"  id="item_id" class="form-control item_id" >
  		<!-- <select class="js-example-basic-single itemIdSelect" name="state" style=" width: 150px"> -->
  		<option value="select" selected>Select Item ID</option>
  		<option value="<?php echo $requisition_items->item_id?>" selected><?php echo $requisition_items->item_id?></option>
			<?php foreach($item_id as $items){?>
			<option value="<?php echo $items->item_id?>"><?php echo $items->item_id; ?></option>
			<?php }?>
						
	   </select>
   </td>
  </div>
  <div class="col-md-2 itemDiv" style="padding: 1px;">
  	
  	<td><input type="text" value="<?php echo $requisition_items->item_name?>" name="item_name[]" class="form-control item_name" readonly ></td>

  </div>

 <div class="col-md-1 currentstockDiv" style="padding: 1px;min-width: 120px;" >
  	
  	<td><input type="text"  name="current_stock[]" id="current_stock" class="form-control current_stock" readonly  ></td>
  </div>
  <div class="col-md-1 quantityDiv" style="padding: 1px; min-width: 120px;">
  	
  	<td><input type="text" value="<?php echo $requisition_items->quantity?>" name="quantity[]" id="quantity" class="form-control quantity"  ></td>
  </div>
  <div class="col-md-1 uomDiv" style="padding: 1px;">
  	
  	<td><input type="text" name="uom[]" id="uom" class="form-control uom" readonly ></td>
  </div>

  
 
  <div class="col-md-2 remarksDiv" style="padding: 1px;">
  	
  	<th><input type="text" value="<?php echo $requisition_items->remarks?>"name="remarks[]" id="upp" class="form-control remarks"></th>
  </div>
  <div class="col-md-1 eraseDiv" style=" padding-right:1px; width:30px;
    padding-left: 0; text-align: center;">
  	<td>
  		<button type="button" id="btnerase" name="btnerase[]" class="btn btn-danger btnerase">Erase</button>
  	</td>
  </div>
</div>

<?php }?>

</div>

 
                    <br>

                    <div id="buttonSet1">
                    <p class="pull-right">
                        <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">add</button>
                       <!--  <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">remove</button> -->
                        <td> <button id="submit_button" name="" class="btn btn-primary">Update</button></td>
                    </p>

                    <p>
                      <!-- <td></td> <td> <button id="submit_button" name="" class="btn btn-primary">Recieve</button></td> -->
                    </p>

                    </div>

                    </fieldset>

    
                </form> 
           
        </div>


        <div class="col-md-2"></div>
    </div>

<script type="text/javascript">
	$(document).ready(function() {

		 $("#product_id").prop('disabled', true);
		 $("#pquantity").prop('disabled', true);


		$("#product").click(function () {
            if ($(this).is(":checked")) {
                $("#product_id").prop('disabled',false);
                $("#pquantity").prop('disabled',false);
            } else {
                $("#product_id").prop('disabled', true);
                $("#pquantity").prop('disabled',true);
            }
        });


        	$("#ItemsRow").on('click','#btnerase',function(){

		
		 var itemElement		 = $(this);
		 confirm("Are you sure you wish to remove this section? This cannot be undone.");
		 // $(this).parents("tr").remove();
		 //$(currentNode).parent().parent().remove();
      	 $(this).parent().parent().remove();
      	 // $('#ItemsRow .clonedInput:last').remove();
 
            
     
        });

$("#product_id").change(function(){

var product_id=$(this).val().trim();

var pquantity =parseInt($('#pquantity').val().trim());


//alert(pquantity);
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

			alert(result);
var data = $.parseJSON(result);
var product_items = $.parseJSON(data['product_definition']);
		console.log(product_items);
 $.each(product_items, function (key, val) {


var total=parseInt((val['quantity']));


var total_quantity=total*pquantity;

//alert(total_quantity);

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


}
})


});

// var n1 = parseInt($(this).parent().parent().find('.quantityDiv .quantity').val());
//             var n2 = parseInt($(this).parent().parent().find('.unitPriceDiv .unit_price').val());
//             var r = n1 * n2;
//            $(this).val(r);
//             return true;
$('.project_id').select2();
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


			        	var last_row_data=lastRow.clone().find('input.item_name').val();

			        	//alert(last_row_data);
			        	if (last_row_data !=="") {

			        		alert('Please Add another Row By Clicking Add Button');
			        		event.preventDefault();
		    	 		return false;

			        	}
			        	// $("#select_id").val("val2").change();
			        	lastRow.find('select.item_id').val(item);
			        	//lastRow.find('input.item_id').val(item).change();
			        	lastRow.find('input.item_name').val(itemName);
			        	lastRow.find('input.uom').val(uom);
			        	lastRow.find('input.current_stock').val(current_stock);
			        	var nextSlNumber = lastRow.find('input.sl').val()*1+1;
			        	clonnedRow.find('input.sl').val(nextSlNumber);
						//$("#ItemsRow").append(clonnedRow);
					    $('#btnDel').attr('disabled', false);
						
	
					}.bind(this),
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
			});


	// 	$("#product").checkbox(function(){
	// 	if(this.value == "Weekend")
	// 	$("#product_name").prop('disabled', false);
	// 	else{
	// 		$("#day").prop('disabled', true);
	// 		$("#day").val('');

	// 	}

	// });

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
						$('#project_name').val(p_name);

				}

			})



		});


		$("#submit_button").click(function(){

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
	            var remarks= new Array();           
	            $('.upp').each(function(){
	                upp.push($(this).val().trim());
	            });
			
			

				//var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/update_requisition',
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
							upp:upp
						
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

		$("#ItemsRow").on('click','.total_price',function(){

            var n1 = parseInt($(this).parent().parent().find('.quantityDiv .quantity').val());
            var n2 = parseInt($(this).parent().parent().find('.unitPriceDiv .unit_price').val());
            var r = n1 * n2;
           $(this).val(r);
            return true;
        });


		$("#ItemsRow").on('click','.item_id',function(){

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
	
	function form_validation()
	{
		
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
			    if($(this).val() == '' || $(this).val() == null ||$(this).val() == '0' || $(this).val()  <1)
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
	
	   $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	   $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });



        $('#btnAdd').click(function () {
        	var lastRow = $("#ItemsRow .clonedInput:last");
        	var clonnedRow = lastRow.clone().find('input').val('').end();
        	var nextSlNumber = lastRow.find('input.sl').val()*1+1;
        	clonnedRow.find('input.sl').val(nextSlNumber);
			$("#ItemsRow").append(clonnedRow);
		    $('#btnDel').attr('disabled', false);
  
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
                // enable the "add" button
        }
    });
    // Enable the "add" button
    $('#btnAdd').attr('disabled', false);
    // Disable the "remove" button
    $('#btnDel').attr('disabled', true);

</script>