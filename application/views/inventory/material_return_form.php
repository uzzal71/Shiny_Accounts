    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 120px;max-height: 450px;overflow: scroll">


			<div class="panel-heading">Material Return Form</div>

					<h3 align="center">
			<p style = "color:green"><?php echo $this->session->userdata('message');
			$this->session->unset_userdata('message')?></p>
		</h3>
 <form role="form" action="<?php echo base_url();?>inventory/save_requisition" method="post">

            <div class="table-responsive materialReceiveForm" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
                    <tr>
                     <!--  <?php
						
						if($last_id->last_id==null){
							$last_id= 100000;
						   
					   }
						   else{
							   $last_id = $last_id->last_id+1;
							 
						   } ?> -->
                       
                       <th align="center">Serial No*</th>
                       <td align="center" width="30%"><input type="text" name="recieve_no" value="<?php echo "MTRF".date('Y').$last_id; ?>" id="recieve_no" class="form-control custom-input" readonly ></td>

                       
                       
                       <th align="center">Issue No*</th>
                       <td align="center" width="30%">
					   <select name="supplier_id" class="form-control  custom-input supplier_id" id="supplier_id" >
					    <option value="select" selected>Select Requisition No</option>

										<?php foreach($supplier_list as $v_supplier){?>
										<option value="<?php echo $v_supplier->supplier_id?>"><?php echo $v_supplier->supplier_id; ?></option>
										<?php }?>
						
					   </select>


                       </tr> 
                       <tr>
                       <td></td>                       
					   <th align="left" width="10%">Date*</th>
                       <td align="left" width="10%"><input type="text" name="date" id="date" class="form-control custom-input dateFrom" required></td>

                    </tr>             

					<tr>
                       
                       
                       <th align="center">Employee ID*</th>
                       <td align="center" width="30%">
					   <select name="supplier_id" class="form-control  custom-input supplier_id" id="supplier_id" >
					    <option value="select" selected>Select  Employee ID</option>

										<?php foreach($supplier_list as $v_supplier){?>
										<option value="<?php echo $v_supplier->supplier_id?>"><?php echo $v_supplier->supplier_id; ?></option>
										<?php }?>
						
					   </select>
					   </td>     
					   
					   <th align="center">Designation</th>
                       <td align="center" width="30%">
					   <input type="text" name="supplier_name" class="form-control  custom-input supplier_name" id="supplier_name"  readonly >
					   </td>

                    </tr>			

					<tr>
                      
					   <th align="center">Employee Name*</th>
                       <td align="center" width="30%"><input type="text" name="supplier_contact" id="supplier_contact" class="form-control custom-input supplier_contact" readonly required></th>
					   
					    <th align="center">Poject Name*</th>
						<td align="center" width="30%">
						  <input type="text" name="address" id="address" class="form-control custom-input address"  required readonly></th>  
					   </td> 
						
                    </tr>		
	
			<tr>
                      
					   <td align="center">Product*</td>
                       <td align="center" width="10%"><input type="checkbox" name="product" id="product" class="form-control custom-input product"></th>
                       <td align="center" width="20%"><input type="text" name="product_name" id="product_name" class="form-control custom-input product_name" ></th>
					   
					    <th align="center">Material*</th>
						<td align="center" width="30%">
						  <input type="checkbox" name="material" id="material" class="form-control custom-input material"   ></th>  
					   </td> 
						
                    </tr>

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
  <div class="col-md-1">
  	
  	<th>SL</th>

  </div>
  <div class="col-md-2">
  	
  	<th><lebel for="item_id">Item ID</lebel></th>

  </div>
  <div class="col-md-2">
  	
  	<th><lebel for="item_name">Item Name</lebel></th>

  </div>

<div class="col-md-1">
  	
  	<th><lebel for="quantity">Current Stock</lebel></th>
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

  <div class="col-md-2">
  	
  	<th><lebel for="remarks">Remarks</lebel></th>
  </div>
  
</div>
<!-- label div ends here -->

<div id="ItemsRow">
<div id="entry1" class="clonedInput row">
  <div class="col-md-1">
  	
  	<td><input type="text" name="sl" id="sl" value="1" class="sl" readonly ></td>

  </div>
  <div class="col-md-2 itemIdSelect">
  	<td>
  		<select name="item_id[]" class="form-control item_id" >
  			<option value="select" selected>Select Item ID</option>
			<?php foreach($item_id as $items){?>
			<option value="<?php echo $items->item_id?>"><?php echo $items->item_id; ?></option>
			<?php }?>
						
	   </select>
   </td>
  </div>
  <div class="col-md-2 itemDiv">
  	
  	<td><input type="text" name="item_name[]" class="form-control item_name" readonly ></td>

  </div>

 <div class="col-md-1 currentstockDiv">
  	
  	<td><input type="text" name="current_stock[]" id="current_stock" class="form-control current_stock" readonly  ></td>
  </div>

  <div class="col-md-2 balanceDiv">
  	
  	<td><input type="text" name="balance[]" id="balance" class="form-control balance" readonly  ></td>
  </div>
  <div class="col-md-1 quantityDiv">
  	
  	<td><input type="text" name="quantity[]" id="quantity" class="form-control quantity"  ></td>
  </div>
  <div class="col-md-1 uomDiv">
  	
  	<td><input type="text" name="uom[]" id="uom" class="form-control uom" readonly ></td>
  </div>

  
  <div class="col-md-2">
  	
  	<th><input type="text" name="remarks[]" id="remarks" class="form-control remarks"></th>
  </div>
  
</div>
</div>


                    <br>
                    <div id="buttonSet1">
                    <p class="pull-right">
                        <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">add</button>
                        <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">remove</button>
                        <td> <button id="submit_button" name="" class="btn btn-primary">Return</button></td>
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


		//$('#description_label').hide();
       // $('#description_div').hide();
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
			

				//var response;
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