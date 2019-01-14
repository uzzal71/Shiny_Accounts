    <br><br>

<!-- <div class="search">
	<div class="col-md-2 col-md-offset-1">
<div style="padding-left: 1px; padding-right: 5px; margin-left:70px; ">
	<tr>
		<td><input type="text" name="search"></td>
		<td><button id="search_button" name="" class="btn btn-primary">Search</button></td>
	</tr>
</div>
</div>
</div> -->

    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<!-- <div class="search" id="custom-panel" style="box-sizing: border-box; border-width: 5px;"  >
	<div class="col-md-3 col-md-offset-1" style=" width: 200px" >
	<!<select class="js-example-basic-single" name="state" style=" width: 150px">
	<?php foreach ($listed_data as $data) { ?>
	  <option value="<?php echo $data->item_id ?>"><?php echo $data->item_name ?></option>
	 <?php  } ?>
	</select> 
	</div>
	-->
<!-- <div style="padding-left: 0px; margin-left:0px;box-sizing: border-box;background-color:#FFFF">
<table style="background:#FFFF; border-color:#337AB7; border-style:solid; ">
<div>
	<tr>
		<td><input type="text" id="search_data" name="search"></td>
		<td><button id="search_button" name="search_button" class="btn btn-primary">Search</button></td>
	</tr>
</div>

	<tr>
	<?php foreach ($listed_data as $data) { ?>
	<td><input type="checkbox" name="item_id" value="<?php echo $data->item_id ?>"> <?php echo $data->item_id ?></td>
	<td><?php echo $data->item_name ?></td>
	

	</tr>

	<?php  } ?>
	
		<td><button id="add" name="" class="btn btn-primary">Add</button></td>
		<td></td>
</table>
</div>
</div>
</div> --> -->
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding:0px;padding-right: 5px;
    padding-left:150;margin-left: 150px;max-height: 800px;overflow: scroll; min-width: 300px">




			<div class="panel-heading">Material Recieve Form<div class="col-md-1 col-md-offset-3" style=" width: 200px" >
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

		
 <form role="form"   action="<?php echo base_url();?>inventory/save_material_receive" method="post">

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
                       
                       <th align="center">Serial No*</th>
                       <td align="center" width="30%"><input type="text" name="recieve_no" value="<?php echo "RITM".date('Y').$last_id; ?>" id="recieve_no" class="form-control custom-input" readonly ></td>                        
					   <th align="center">Date*</th>
                       <td align="center" width="30%"><input type="text" name="date" id="date" class="form-control custom-input dateFrom" required></td>

                    </tr>             

					<tr>
                       
                       
                       <th align="center">Supplier ID*</th>
                       <td align="center" width="30%">
					   <select name="supplier_id" class="form-control  custom-input supplier_id" id="supplier_id" >
					    <option value="select" selected>Select Supplier ID</option>

										<?php foreach($supplier_list as $v_supplier){?>
										<option value="<?php echo $v_supplier->supplier_id?>"><?php echo $v_supplier->supplier_id; ?></option>
										<?php }?>
						
					   </select>
					   </td>     
					   
					   <th align="center">Supplier Name</th>
                       <td align="center" width="30%">
					   <input type="text" name="supplier_name" class="form-control  custom-input supplier_name" id="supplier_name"  readonly >
					   </td>

                    </tr>			

					<tr>
                      
					   <th align="center">Supplier Contact*</th>
                       <td align="center" width="30%"><input type="text" name="supplier_contact" id="supplier_contact" class="form-control custom-input supplier_contact" readonly required></th>
					   
					    <th align="center">Address*</th>
						<td align="center" width="30%">
						  <input type="text" name="address" id="address" class="form-control custom-input address"  required readonly></th>  
					   </td> 
						
                    </tr>		
	

					 
					<tr>
					<td colspan="6"> <hr></td>
					</tr>
					</tbody>
					</table>


<div id="label"   class="row">
  <div class="col-md-1" style=" padding-right:0;
    padding-left: 0; text-align: center;">
  	
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
    padding-left: 0; text-align: center;">
  	
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
  			<option value="select" selected>Select Item ID</option>
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
  	
  	<td><input type="text" name="quantity[]" class="form-control quantity"  ></td>
  </div>
  <div class="col-md-1 uomDiv" style=" padding-right:2px;
    padding-left: 1px; text-align: center;">
  	
  	<td><input type="text" name="uom[]" id="uom" class="form-control uom" readonly ></td>
  </div>

  <div class="col-md-1 unitPriceDiv" style=" padding-right:2px;
    padding-left: 1px; text-align: center;">
  	
  	<td><input type="text" name="unit_price[]" id="unit_price" class="form-control unit_price" ></td>
  </div>
  <div class="col-md-2" style=" padding-right:2px;
    padding-left: 1px; text-align: center;">
  <td><input type="number" name="total_price[]" id="total_price" class="form-control total_price" readonly ></td>
  </div>
  <div class="col-md-1" style=" padding-right:1px; width: 150px;
    padding-left: 0; text-align: center;">
  	
  	<th><input type="text" name="remarks[]" id="remarks" class="form-control remarks"></th>
  </div>
  
</div>
</div>


                    <br>
                    <div id="buttonSet1">
                    <p class="pull-right">
                        <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">add</button>
                        <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">remove</button>
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
			        	// $("#select_id").val("val2").change();
			        	lastRow.find('select.item_id').val(item);
			        	// lastRow.find('input.item_id').val(item).change();
			        	lastRow.find('input.item_name').val(itemName);
			        	lastRow.find('input.uom').val(uom);
			        	var nextSlNumber = lastRow.find('input.sl').val()*1+1;
			        	clonnedRow.find('input.sl').val(nextSlNumber);

						$("#ItemsRow").append(clonnedRow);
					    $('#btnDel').attr('disabled', false);
						
	
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
				// var project_id		 = $('#project_id').val().trim();
				// var project_name		 = $('#project_name').val().trim();
				// var project_description		 = $('#project_description').val().trim();

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