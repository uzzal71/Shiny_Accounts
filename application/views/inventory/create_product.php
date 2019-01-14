    <br><br>


    <div class="row">
		<div class="col-md-9 col-md-offset-1">
	
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding:0px;padding-right: 5px;
    padding-left:150;margin-left: 150px;max-height: 800px;overflow: scroll; min-width: 300px">




			<div class="panel-heading">Product BOM <div class="col-md-1" style=" width: 400px;align-self: center;height: 5px;" >
	<select name="item_id_for_product" id="item_id_for_product" class="form-control item_id_for_product" style="height:28px;">
  						<option value="" selected>Select or Write Item Name</option>
							<?php foreach($listed_data as $items){?>
							<option value="<?php echo $items->item_id?>"><?php echo $items->item_name; ?></option>
							<?php }?>
										
	   					</select> 
	</div>
	<div class="col-md-1  pull-right" style=" width: 200px" >
	<select class="js-example-basic-single" name="state" style=" width: 150px">
	<option value="">Write or Select Item Name</option>
	<?php foreach ($listed_data as $data) { ?>
	
	  <option value="<?php echo $data->item_id ?>"><?php echo $data->item_name ?></option>
	 <?php  } ?>
	</select> 
	</div> </div>

					<h3 align="center">
			<p style = "color:green"><?php echo $this->session->userdata('message');
			$this->session->unset_userdata('message')?></p>
		</h3>

		
 <form role="form"   action="<?php echo base_url();?>inventory/save_created_product" method="post">

            <div class="table-responsive materialReceiveForm" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
                    <tr><?php 
                       if($last_id->last_id==null){
							$last_id= 1000;
						   
					   }
						   else{

						   	
							   $last_id = $last_id->last_id+1;
							 
						   } ?>
                       <th align="center">Product Name*</th>
                       <td align="center" width="25%"><input type="text" name="product_name" id="product_name" class="form-control custom-input product_name" required></td>
                       <th align="center">Item ID</th>
                       	<td><input type="text" name="item_id_for_product_name" id="item_id_for_product_name" class="form-control custom-input" width="15%" readonly>
  				
   						</td>

                       <th align="center">Product ID*</th>
                       <td align="center" width="20%"><input type="text" name="product_id" value="<?php echo "PRON".date('Y').$last_id; ?>" id="product_id" class="form-control custom-input" readonly ></td>                        
					   

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

  <div class="col-md-2" style=" padding-right:0;
    padding-left: 0; text-align: center;">
  	
  	<th><lebel for="uom">Description</lebel></th>
  </div>

  <div class="col-md-2" style=" padding-right:0;
    padding-left: 0; text-align: center;">
  	
  	<th><lebel for="quantity">Quantity</lebel></th>
  </div>
  <div class="col-md-2" style=" padding-right:0;
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


  <div class="col-md-2 descriptionDiv" style=" padding-right:2px;
    padding-left: 1px; text-align: center;">
  	
  	<td><input type="text" name="description[]" class="form-control quantity"  ></td>
  </div>
  <div class="col-md-2 quantityDiv" style=" padding-right:2px;
    padding-left: 1px; text-align: center;">
  	
  	<td><input type="number" name="quantity[]" id="quantity" class="form-control uom"  ></td>
  </div>

 
  <div class="col-md-2" style=" padding-right:1px; width: 150px;
    padding-left: 0; text-align: center;">
  	
  	<th><input type="text" name="remarks[]" id="remarks" class="form-control remarks"></th>
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
                       <!--  <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">add</button> -->
                       <!--  <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">remove</button> -->
                        <td> <button id="submit_button" name="" class="btn btn-primary">Create</button></td>
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


$('.item_id_for_product').select2();

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
			        	lastRow.find('input.item_name').val(itemName);
			        	
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

		$('#item_id_for_product').on('change',function(){
			//alert("Search Found");
				var item_id_for_product_name= $('#item_id_for_product').val().trim();

				//alert(item_id_for_product_name);


				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/pick_item_name',
					data:{ 
			
							item_id_for_product_name: item_id_for_product_name
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						//alert(response);
						$("#item_id_for_product_name").val(item_id_for_product_name);
						$("#product_name").val(response);
					},
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
					url: '<?php echo base_url();?>Inventory/pick_item_name',
					data:{ 
			
							search_data: search_data
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						//$("#table_id tbody").html("");
						$("#product_name").val(response);
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
		if($('#product_name').val().trim() == "")
		{
			alert("Please Write Product Name");
			$('#product_name').focus();
			event.preventDefault();
		    	 return false;
		}

			if($('#item_id_for_product_name').val().trim() == "")
		{
			alert("Please Select Item Name");
			$('#item_id_for_product_name').focus();
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
			    if($(this).val() == '' || $(this).val() == null || $(this).val() <1  )
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
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	   //$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });



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



			$("#ItemsRow").on('click','#btnerase',function(){

		
		 var itemElement		 = $(this);

		 var num = $('.clonedInput').length;

		 if ( num!==1) {
		 	 var con= confirm("Are you sure you wish to remove this section? This cannot be undone.");
		 
		 if (con==true && num!==1) {
		 	 $(this).parent().parent().remove();
		 }


		 } else{

		 	alert("Current Row Can't Be Removed");
		 }
		



		 
      	// $(this).parent().parent().remove();
      	
 
            
     
        });


</script>