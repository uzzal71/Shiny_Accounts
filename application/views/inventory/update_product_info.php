    <br><br>



    <div class="row">
		<div class="col-md-10 col-md-offset-1">
	
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding:0px;padding-right: 5px;
    padding-left:150;margin-left: 150px;max-height: 800px;overflow: scroll; min-width: 300px">




			<div class="panel-heading">Update Product Info<div class="col-md-1 pull-right" style=" width: 200px" >
	<select class="js-example-basic-single" name="state" style=" width: 150px">
	<option value="">Please Write or Select Item ID </option>
	<?php foreach ($listed_data as $data) { ?>
	
	  <option value="<?php echo $data->item_id ?>"><?php echo $data->item_name ?></option>
	 <?php  } ?>
	</select> 
	</div> </div>

					<h3 align="center">
			<p style = "color:green"><?php echo $this->session->userdata('message');
			$this->session->unset_userdata('message')?></p>
		</h3>

		
 <form role="form"   action="<?php echo base_url();?>inventory/save_edited_product" method="post">

            <div class="table-responsive materialReceiveForm" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
                    <tr>
                    <!--   <?php
						
						if($last_id->last_id==null){
							$last_id= 1000;
						   
					   }
						   else{
							   $last_id = $last_id->last_id+1;
							 
						   } ?> -->
                       
                       <th align="center">Product Name*</th>
                       <td align="center" width="25%"><input type="text" name="product_name" value="<?php echo $product_data->product_name ?>" id="product_name" class="form-control custom-input product_name" readonly ></td>

                       <th align="center">Item ID*</th>
                       <td align="center" width="25%"><input type="text" name="item_id_product" value="<?php echo $product_data->item_id_product ?>" id="item_id_product" class="form-control custom-input product_name" readonly ></td>

                       <th align="center">Product ID*</th>
                       <td align="center" width="25%"><input type="text" name="product_id" value="<?php echo $product_data->product_id ?>" id="product_id" class="form-control custom-input" readonly ></td> 

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


  <div class="col-md-2" style=" padding-right:0;
    padding-left: 0; text-align: center;">
  	
  	<th><lebel for="quantity">Description</lebel></th>
  </div>
  <div class="col-md-2" style=" padding-right:0;
    padding-left: 0; text-align: center;">
  	
  	<th><lebel for="uom">Quantity</lebel></th>
  </div>

  <div class="col-md-2" style=" padding-right:0;
    padding-left: 0; text-align: center;">
  	
  	<th><lebel for="remarks">Remarks</lebel></th>
  </div>
  
</div>
<!-- label div ends here -->

<div id="ItemsRow" style=" padding-right:5;
    padding-left: 5; text-align: center;" >

    <?php 
	foreach ($decoded_data as $key => $value) {
		$sl = $key+1;
?>
<div id="entry1" class="clonedInput row" >
  <div class="col-md-1"  style=" padding-right:0px;
    padding-left: 20px; text-align: center; width: 60px;"  >
  	
  	<td ><input type="text"  name="sl" id="sl" value="<?php echo $sl; ?>" class="sl" readonly ></td>

  </div>
  <div class="col-md-2 itemIdSelect" style=" padding-right:1px;
    padding-left: 5px; text-align: center;">
  	<td>
  		<select name="item_id[]" id="item_id" class="form-control item_id" >
  		<option value="Select Item ID" selected>Select Item ID</option>
  			<option value="<?php echo $value['item_id']; ?>" selected><?php echo $value['item_id']; ?></option>
			<?php foreach($item_ids as $items){?>
			<option value="<?php echo $items->item_id?>"><?php echo $items->item_id; ?></option>
			<?php }?>
						
	   </select>
   </td>
  </div>
  <div class="col-md-2 itemDiv" style=" padding-right:1px;
    padding-left: 1px; text-align: center;">
  	
  	<td><input type="text" name="item_name[]" value="<?php echo $value['item_name']; ?>"   class="form-control item_name" readonly ></td>

  </div>



  <div class="col-md-2 descriptionDiv" style=" padding-right:2px;
    padding-left: 1px; text-align: center;">
  	
  	<td><input type="text" name="description[]" value="<?php echo $value['description'] ?>" class="form-control quantity"  ></td>
  </div>

  <div class="col-md-2 quantityDiv" style=" padding-right:2px;
    padding-left: 1px; text-align: center;">
  	
  	<td><input type="number" name="quantity[]" class="form-control quantity" value="<?php echo $value['quantity']; ?>"   ></td>
  </div>
   
  <div class="col-md-2" style=" padding-right:1px; width: 150px;
    padding-left: 0; text-align: center;">
  	
  	<th><input type="text" name="remarks[]" id="remarks" value="<?php echo $value['remarks']; ?>"  class="form-control remarks"></th>
 

  </div>
  
   <div class="col-md-1 eraseDiv" style=" padding-right:1px; width:30px;
    padding-left: 0; text-align: center;">
  	<td>
  		<button type="button" id="btnerase" name="btnerase[]" class="btn btn-danger btnerase">Erase</button>
  	</td>
  </div>
</div>
<?php } ?>
</div>


                    <br>
                    <div id="buttonSet1">
                    <p class="pull-right">
                        <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">add</button>
                        <!-- <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">remove</button> -->
                        <td> <button id="submit_button" name="" class="btn btn-primary">Update</button></td>
                    </p>

                    <p>
                      
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



			$("#ItemsRow").on('click','#btnerase',function(){

		
		 var itemElement		 = $(this);
		 var con= confirm("Are you sure you wish to remove this section? This cannot be undone.");
		 
		 if (con==true) {
		 	 $(this).parent().parent().remove();
		 }else {



		 }
      	// $(this).parent().parent().remove();
      	
 
            
     
        });


		

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
						var last_row_data=lastRow.clone().find('input.item_name').val();

			        	//alert(last_row_data);
			        	if (last_row_data !== "") {

			        		alert('Please Add another Row By Clicking Add Button');
			        		event.preventDefault();
		    	 		return false;

			        	}
			        	lastRow.find('select.item_id').val(item);
			        	// lastRow.find('input.item_id').val(item).change();
			        	lastRow.find('input.item_name').val(itemName);
			        	lastRow.find('input.uom').val(uom);
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
					url: '<?php echo base_url();?>Inventory/save_edited_product',
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