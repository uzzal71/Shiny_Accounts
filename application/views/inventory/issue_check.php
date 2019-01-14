    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 120px;overflow: scroll;min-height: 500px">


			<div class="panel-heading">Material Requisition Check Form<div class="col-md-1 pull-right " style=" width:300px;" >
	<select class="js-example-basic-single" id="js-example-basic-single" name="state" style=" width: 150px">
	<option value=" ">Please Write or Select </option>
	<?php foreach ($listed_data as $data) { ?>
	  <option value="<?php echo $data->item_id ?>"><?php echo $data->item_name ?></option>
	 <?php  } ?>
	</select> 
	</div> </div>

					<h3 align="center">
			<p style = "color:green"><?php echo $this->session->userdata('message');
			$this->session->unset_userdata('message')?></p>
		</h3>
 <form role="form" action="<?php echo base_url();?>inventory/save_checked_requisition" method="post">

            <div class="table-responsive materialReceiveForm" id="custom-table" style="background-color: ;padding: 1px;margin-left: 0px;overflow: scroll;min-height: 500px">
			
                <table id="" class="table ">
                    <tbody>
                    <tr>
                     
                       
                
                       
                       
                       <th align="center">Requisition No*</th>
                       <td align="center" width="30%">
					   <select name="requisition_no" class="form-control  custom-input requisition_no" id="requisition_no" >
					    <option value="" selected>Select Requisition No</option>

										<?php foreach($requisition_info as $requisition){?>
										<option value="<?php echo $requisition->requisition_no?>"><?php echo $requisition->requisition_no?></option>
										<?php }?>
						
					   </select>


                       </tr> 
                       <tr>
                                             
					   

                    </tr>             

					<tr>
                       
                       
                       <th align="center">Employee Name*</th>
                       <td align="center" width="30%">
					   <input type="text" name="employee_id" id="employee_id" class="form-control  custom-input employee_id" id="employee_id"  readonly >
					   </td>     
					   
					<!--    <th align="center">Issue Type*</th>
                       <td align="center" width="30%">
					   <select name="issue_type" id="issue_type" class="form-control custom-input issue_type">
					   	<option value="select" selected>Select Issue Type</option>
					   	<option value="assigned">Assigned</option>
					   	<option value="production">Production</option>
					   	<option value="general_issue">General Issue</option>
					   	</td>
					   </select> -->
                    </tr>			

					<tr>
                      
					   <th align="center">Project ID*</th>
                       <td align="center" width="30%"><input type="text" name="project_id" id="project_id" class="form-control custom-input project_id" readonly required></th>
					   
					  <th align="center" width="10%"> Requisition Date</th>
                       <td align="center" width="10%"><input type="text" value="<?php echo date('Y-m-d '); ?>" name="date" id="date" class="form-control custom-input " readonly ></td>
						
                    </tr>		
	
					<tr>  
					<th align="center">Project Name*</th>
                       <td align="center" width="30%"><input type="text" name="project_name" id="project_name" class="form-control custom-input project_name" readonly required></td>  
                    </tr>

                    <tr>  
					<th align="center">Issue Type*</th>
                       <td align="center" width="30%"><input type="text" name="issue_type" id="issue_type" class="form-control custom-input project_name" readonly required></td>  
                    </tr>

					
					<tr>
					<td colspan="6"> <hr></td>
					</tr>
					</tbody>
					</table>


<div id="label"   class="row">
  <div class="col-md-1" style=" padding-right:10px;
    padding-left: 15px; text-align: center; width: 40px; height: 20px">
  	
  	<th>SL</th>

  </div>
  <div class="col-md-2">
  	
  	<th><lebel for="item_id">Item ID</lebel></th>

  </div>
  <div class="col-md-3">
  	
  	<th><lebel for="item_name">Item Name</lebel></th>

  </div>

<div class="col-md-1">
  	
  	<th><lebel for="quantity">CS</lebel></th>
  </div>

  <div class="col-md-2">
  	
  	<th><lebel for="quantity">Balance</lebel></th>
  </div>

  <div class="col-md-1">
  	
  	<th><lebel for="quantity">Quantity</lebel></th>
  </div>
  <div class="col-md-1">
  	
  	<th><lebel for="uom">UoM</lebel></th>
  </div>

  <div class="col-md-1">
  	
  	<th><lebel for="remarks">Remarks</lebel></th>
  </div>
  
</div>
<!-- label div ends here -->

<div id="ItemsRow">
<div id="entry1" class="clonedInput row">
  <div class="col-md-1 sl" style=" padding-right:10px;
    padding-left: 15px; text-align: center; width: 40px; height: 20px">
  	
  	<td><input type="text" name="sl" id="sl" value="1" class="sl" readonly ></td>

  </div>
  <div class="col-md-2 itemIdSelect" style="padding: 1px;">
  	<td>
  		<select name="item_id[]" id="item_id" class="form-control item_id" >
  			<option value="" selected>Select Item ID</option>
			<?php foreach($item_id as $items){?>
			<option value="<?php echo $items->item_id?>"><?php echo $items->item_id; ?></option>
			<?php }?>
						
	   </select>
   </td>
  </div>
  <div class="col-md-3 itemDiv" style="padding: 1px;" >
  	
  	<td><input type="text" name="item_name[]" class="form-control item_name" readonly ></td>

  </div>

 <div class="col-md-1 currentstockDiv" style="padding: 1px;" >
  	
  	<td><input type="text" name="current_stock[]" id="current_stock" class="form-control current_stock" readonly  ></td>
  </div>

  <div class="col-md-2 balanceDiv" style="padding: 1px;" >
  	
  	<td><input type="number" name="balance[]" id="balance" class="form-control balance" readonly  ></td>
  </div>
  <div class="col-md-1 quantityDiv" style="padding: 1px;" >
  	
  	<td><input type="number" name="quantity[]" id="quantity" class="form-control quantity"  ></td>
  </div>
  <div class="col-md-1 uomDiv" style="padding: 1px;">
  	
  	<td><input type="text" name="uom[]" id="uom" class="form-control uom" readonly ></td>
  </div>

  
  <div class="col-md-1 remarksDiv" style="padding: 1px;">
  	
  	<th><input type="text" name="remarks[]" id="remarks" class="form-control remarks" readonly></th>
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
                    	  <button type="button" id="reset" name="reset" class="btn btn-warning">Reset</button>
                        <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">add</button>
                      
                        <td> <button id="submit_button" name="" class="btn btn-primary">Approve</button></td>
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


$("#reset").on('click',function(){


  
        
            var num = $('.clonedInput').length;
            $('#requisition_no').get(0).selectedIndex = 0;
            $('#employee_id').val('');
            $('#project_id').val('');
            $('#project_name').val('');
            $('#date').val('');



       var removed=num-1;
 
       	if (num==1) {

       		$('#ItemsRow').find('input').val('').end();
       		$('#ItemsRow').find('.sl .sl').val(1);
       		$('#ItemsRow').find('.itemIdSelect .item_id').val('');

       		
       		

       	}else{
 for (var i = 1; i <= removed; i++) {
 	//alert(i);
 	$('#ItemsRow .clonedInput:last').remove();
 }
$('#ItemsRow').find('input').val('').end();
$('#ItemsRow').find('.sl .sl').val(1);
$('#ItemsRow').find('.itemIdSelect .item_id').val('');

}});


        	$("#ItemsRow").on('click','#btnerase',function(){

		
		 var itemElement		 = $(this);
		 var con= confirm("Are you sure you wish to remove this section? This cannot be undone.");
		 
		 if (con==true) {
		 	 $(this).parent().parent().remove();
		 }else {



		 }
 
            
     
        });
$("#requisition_no").on('change',function(){

var requisition_no=$(this).val().trim();
var lastRow = $("#ItemsRow .clonedInput:last");
var last_row_data=lastRow.clone().find('input.item_name').val();
			
			        	
if (last_row_data !== "") {
							alert('Please Reset');

			        		event.preventDefault();
}else{
$.ajax({

async:false,
type:'POST',
url:'<?php echo base_url();?>Inventory/requisition_info_by_requisition_no_before_check',
data:{
	requisition_no:requisition_no


},

success:function(result){
if (!result) {
				alert('no data found!!');
			return 0;
			}

//alert(result);

var data = $.parseJSON(result);


$('#date').val(data['date']);
$('#employee_id').val(data['employee_id']);
$('#project_id').val(data['project_id']);
$('#issue_type').val(data['issue_type']);
var product_items = $.parseJSON(data['requisition_info']);
		console.log(product_items);
 $.each(product_items, function (key, val) {


		//location.reload();
	//jQuery.removeData( div, "#ItemsRow" );
 	var lastRow = $("#ItemsRow .clonedInput:last");
	var clonnedRow = lastRow.clone().find('input').val('').end();
	lastRow.find('select.item_id').val(val['item_id']);
	lastRow.find('input.item_name').val(val['item_name']);
	lastRow.find('input.current_stock').val(val['current_stock']);
	lastRow.find('input.balance').val(val['balance']);
	lastRow.find('input.quantity').val(val['quantity']);
	//lastRow.find('input.quantity').val(total_quantity);
	lastRow.find('input.uom').val(val['uom']);
	lastRow.find('input.remarks').val(val['remarks']);

	var nextSlNumber = lastRow.find('input.sl').val()*1+1;
	clonnedRow.find('input.sl').val(nextSlNumber);
	$("#ItemsRow").append(clonnedRow);
	$('#btnDel').attr('disabled', false);

   			 });
$('#ItemsRow .clonedInput:last').remove();

		}
	})


}});

 $("#product_id").prop('disabled', true);
		 $("#pquantity").prop('disabled', true);


		$("#product").click(function () {
            if ($(this).is(":checked")) {
                $("#product_id").prop('disabled',false);
                $("#material").prop('disabled',true);
                
            } else {
                $("#material").prop('disabled', true);
                $("#product").prop('disabled',true);
            }
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



				// $('#requisition_no').on('change',function(){


				// var requisition_no =$(this).val().trim();

				// //alert(requisition_no);

				// $.ajax({
				// async:false,
				// type:'POST',
				// url:'<?php echo base_url();?>Inventory/requisition_info_by_requisition_no',
				// data:{

				// 	requisition_no:requisition_no

				// },
				// success: function(result){
						
				// 		var result = result.split('#');
				// 		var employee_id = result[0];
				// 		var project_id= result[1];
				// 		$('#employee_id').val(employee_id);

				// 		$('#project_id').val(project_id);
				// }

				// })


				// });

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
			        	if (last_row_data !="") {

			        		alert('Please Add another Row By Clicking Add Button');
			        		event.preventDefault();
		    	 		return false;

			        	}else {

			        	lastRow.find('select.item_id').val(item);
			        	//lastRow.find('input.item_id').val(item).change();
			        	lastRow.find('input.item_name').val(itemName);
			        	lastRow.find('input.uom').val(uom);
			        	lastRow.find('input.current_stock').val(current_stock);
			        	var nextSlNumber = lastRow.find('input.sl').val()*1+1;
			        	clonnedRow.find('input.sl').val(nextSlNumber);
						//$("#ItemsRow").append(clonnedRow);
					    $('#btnDel').attr('disabled', false);
						}
	
					}.bind(this),
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
			});
		
		$("#submit_button").click(function(){

			//alert("Testing");
			if(form_validation())
			{
				//alert("validation true");
				
				var recieve_no		 = $('#recieve_no').val();
				var date		 = $('#date').val();
				var supplier_id		 = $('#supplier_id').val();
				var supplier_name		 = $('#supplier_name').val();
				var supplier_contact		 = $('#supplier_contact').val();
				var address		 = $('#address').val();

				// var project_id		 = $('#project_id').val();
				// var project_name		 = $('#project_name').val();
				// var project_description		 = $('#project_description').val();

				var item_id= new Array();

	            $('.item_id').each(function(){
	                item_id.push($(this).val());
	            });

				var item_name= new Array();
	            $('.item_name').each(function(){
	                item_name.push($(this).val());
	            });

				var quantity= new Array();
	            $('.quantity').each(function(){
	                quantity.push($(this).val());
	            });	 

	            var uom= new Array();
	            $('.uom').each(function(){
	                uom.push($(this).val());
	            });	 

	            var unit_price= new Array();        
	            $('.remaunit_pricerks').each(function(){
	                unit_price.push($(this).val());
	            });	 

	            var total_price= new Array();           
	            $('.total_price').each(function(){
	                total_price.push($(this).val());
	            });
	            var remarks= new Array();           
	            $('.remarks').each(function(){
	                remarks.push($(this).val());
	            });
			

				//var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/save_issued_info',
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

		$("#ItemsRow").on('keyup','.quantity',function(){
	 //if(keycode == '13'){
            var n1 = parseInt($(this).parent().parent().find('.currentstockDiv .current_stock').val());
            var n2 = parseInt($(this).parent().parent().find('.quantityDiv .quantity').val());
            var r = n1 - n2;
            $(this).parent().parent().find('.balance').val(r);
           event.preventDefault();
            //return true;
       // }
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




$("#ItemsRow").on('click','.current_stock',function(){

			var item		 =  $('#item_id').val().trim()
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
						// var itemName = result[0];
						var current_stock= result[2];
						
						var uom = result[1];

						//itemElement.parent().parent().find('.itemDiv .item_name').val(itemName);
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



					$("#requisition_no").change(function(){
			
			var project_id	= $('#project_id').val().trim();
			var project_id;
			//alert(requisition_no);
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/pick_project_name',
					data:{ 
							project_id: project_id
						},
					//timeout: 4000,
					success: function(result) {
						//alert(result);
				
						$('#project_name').val(result);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
					

			//$('#employee_name').val(response);
		
		});



		// $("#requisition_no").change(function(){
			
			
		// 	var project_id = $('#project_id').val().trim();
						
		// 	var response;
		// 	$.ajax({
		// 			async: false,
		// 			type: 'POST',
		// 			url: '<?php echo base_url();?>Project_tracking/pick_project_name_description',
		// 			data:{ 
		// 					project_id: project_id
		// 				},
		// 			//timeout: 4000,
		// 			success: function(result) {
		// 				response = result;
		// 				alert(response);
		// 	var project_info = response.trim().split('#');
		// 	//var item_name = item_info[0];
		// 	var project_name = project_info[0];
		// 	var project_description = project_info[1];
		// 	$('#project_name').val(project_name);
		// 	$('#project_description').val(project_description);
		// 			},
		// 			error: function(XMLHttpRequest, textStatus, errorThrown) {
		// 				response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
		// 			}
		// 		});
					

		// 	//$('#employee_name').val(response);
		
		// });
		
	});
	
	function form_validation()
	{
		
		if($('#requisition_no').val().trim() =="")
		{
			alert("Please Select Requisition  No");
			$('#requisition_no').focus();
			return false;
		}
		if($('#date').val().trim() =="")
		{
			alert("Please Select Date");
			$('#date').focus();
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
			    if($(this).val() == '' || $(this).val() == null || $(this).val()=='0'|| $(this).val()  <1)
			    {
			    	alert('Please Provide Quantity Informations');
			    	$(this).focus();
			    	 event.preventDefault();
			    	 return false;
			    }
			  
			});
		}if(wrongInput == 0)
		{
		$('input[name^="balance"]').each(function() {
			    if($(this).val() <0)
			    {
			    	alert('Please Decrease Your Issue Quantity');
			    	$(this).focus();
			    	 event.preventDefault();
			    	 return false;
			    }
			  
			});
		}
	
		return true;
			
	}
	
	   //$('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
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