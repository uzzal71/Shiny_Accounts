    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 120px;max-height: 450px;overflow: scroll">


			<div class="panel-heading">Material Recieve Form</div>

					<h3 align="center">
			<p style = "color:green"><?php echo $this->session->userdata('message');
			$this->session->unset_userdata('message')?></p>
		</h3>
 <form role="form" action="<?php echo base_url();?>inventory/save_material_receive" method="post">

            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
                    <tr>
                      <?php
						
						if($last_id->last_id==null){
							$last_id= 100001;
						   
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
					   <select name="supplier_id" class="form-control  custom-input" id="supplier_id" >
					    <option value="select" selected>Select Supplier ID</option>
										<?php foreach($supplier_list as $v_supplier){?>
										<option value="<?php echo $v_supplier->supplier_id?>" selected><?php echo $v_supplier->supplier_id; ?></option>
										<?php }?>
						
					   </select>
					   </td>     
					   
					   <th align="center">Supplier Name</th>
                       <td align="center" width="30%">
					   <input type="text" name="supplier_name" class="form-control  custom-input" id="supplier_name"  readonly >
					   </td>

                    </tr>			

					<tr>
                      
					   <th align="center">Supplier Contact*</th>
                       <td align="center" width="30%"><input type="text" name="supplier_contact" id="supplier_contact" class="form-control custom-input" readonly required></th>
					   
					    <th align="center">Address*</th>
						<td align="center" width="30%">
						  <input type="text" name="address" id="address" class="form-control custom-input"  required readonly></th>  
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
  	
  	<th><lebel for="quantity">Quantity</lebel></th>
  </div>
  <div class="col-md-1">
  	
  	<th><lebel for="uom">UoM</lebel></th>
  </div>

  <div class="col-md-1">
  	
  	<th><lebel for="unit_price">Unit Price</lebel></th>
  </div>
  <div class="col-md-2">
  <th><lebel for="total_price">Total Price</lebel></th>
  </div>
  <div class="col-md-2">
  	
  	<th><lebel for="remarks">Remarks</lebel></th>
  </div>
  
</div>
<!-- label div ends here -->


<div id="entry1" class="clonedInput row">
  <div class="col-md-1">
  	
  	<td><input type="text" name="sl" id="sl"></td>

  </div>
  <div class="col-md-2">
  	
  	<td><select name="ID1_item_id" id="item_id" class="item_id form-control" ><option value="select" selected>Select Item ID</option>
										<?php foreach($item_id as $items){?>
										<option value="<?php echo $items->item_id?>" selected><?php echo $items->item_id; ?></option>
										<?php }?>
						
					   </select></td>

  </div>
  <div class="col-md-2">
  	
  	<td><input type="text" name="ID1_item_name" id="item_name" class="item_name form-control" readonly ></td>

  </div>


  <div class="col-md-1">
  	
  	<td><input type="text" name="ID1_quantity" id="ID1_quantity" class="quantity form-control"  ></td>
  </div>
  <div class="col-md-1">
  	
  	<td><input type="text" name="ID1_uom" id="uom" class="uom form-control" readonly ></td>
  </div>

  <div class="col-md-1">
  	
  	<td><input type="text" name="ID1_unit_price" id="ID1_unit_price" class="unit_price form-control" ></td>
  </div>
  <div class="col-md-2">
  <td><input type="number" name="ID1_total_price" id="ID1_total_price" class="total_price form-control" readonly ></td>
  </div>
  <div class="col-md-2">
  	
  	<th><input type="text" name="remarks" id="remarks" class="remarks form-control"></th>
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


		$('#description_label').hide();
        $('#description_div').hide();
		$("#btn_bill_entry").click(function(){

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
					url: '<?php echo base_url();?>voucher_entry/save_bill_info',
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

		$('#ID1_total_price').on('click', function () {
            var n1 = parseInt($('#ID1_quantity').val());
            var n2 = parseInt($('#ID1_unit_price').val());
            var r = n1 * n2;
           $('#ID1_total_price').val(r);
            return true;
        });


		$("#item_id").click(function(){
			//alert("Here");
			value=$(this).attr('id');
			var item_id		 = $('#item_id').val().trim();

			//window.alert(newids);
			var newids=item_id.trim().split('_');		
			var ids=newids[0];
			//window.alert(newids);
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/pick_item_info',
					data:{ 
							item_id: item_id
						},
					//timeout: 4000,
					success: function(result) {
					var item_info = result.trim().split('#');
					var item_name =item_info[0];
					var uom =	item_info[1];
					var new_id_name_for_item_name=ids+"_"+"item_name";
					var new_id_name_for_uom=ids+"_"+"uom";

			$('#item_name').val(item_name);
			$('#uom').val(uom);

					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
					

			//$('#employee_name').val(response);
		
		});

				$("#supplier_id").change(function(){
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
        	//alert("jhg");
        var num     = $('.clonedInput').length, // Checks to see how many "duplicatable" input fields we currently have
            newNum  = new Number(num + 1),      // The numeric ID of the new input field being added, increasing by 1 each time
            newElem = $('#entry' + num).clone().attr('id', 'entry' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value
    
    /*  This is where we manipulate the name/id values of the input inside the new, cloned element
        Below are examples of what forms elements you can clone, but not the only ones.
        There are 2 basic structures below: one for an H2, and one for form elements.
        To make more, you can copy the one for form elements and simply update the classes for its label and input.
        Keep in mind that the .val() method is what clears the element when it gets cloned. Radio and checkboxes need .val([]) instead of .val('').
    */
        // H2 - section
        newElem.find('.heading-reference').attr('id', 'ID' + newNum + '_reference').attr('name', 'ID' + newNum + '_reference').html('Entry #' + newNum);

        // Item Code
        newElem.find('.item_id').attr('id', 'ID' + newNum + '_item_id').attr('name', 'ID' + newNum + '_item_id').val('');

        // Item Name - text
        newElem.find('.item_name').attr('id', 'ID' + newNum + '_item_name').attr('name', 'ID' + newNum + '_item_name').val('');
        //Vehicle
        newElem.find('.quantity').attr('id', 'ID' + newNum + '_quantity').attr('name', 'ID' + newNum + '_quantity').val('');
        //Amount
        newElem.find('.uom').attr('id', 'ID' + newNum + '_uom').attr('name', 'ID' + newNum + '_uom').val('');

        //Amount
        newElem.find('.unit_price').attr('id', 'ID' + newNum + '_unit_price').attr('name', 'ID' + newNum + '_unit_price').val('');
        //Project Name
        newElem.find('.total_price').attr('id', 'ID' + newNum + '_total_price').attr('name', 'ID' + newNum + '_total_price').val('');
        //Remarks
        newElem.find('.remarks').attr('id', 'ID' + newNum + '_remark').attr('name', 'ID' + newNum + '_remarks').val('');
        //Vehicles
        

        // Flavor - checkbox
        // Note that each input_checkboxitem has a unique identifier "-0". This helps pair up duplicated checkboxes and labels correctly. A bit verbose, at the moment.



    // Insert the new element after the last "duplicatable" input field
        $('#entry' + num).after(newElem);
        $('#ID' + newNum + '_title').focus();

        // Enable the "remove" button. This only shows once you have a duplicated section.
        $('#btnDel').attr('disabled', false);

        // Right now you can only add 4 sections, for a total of 5. Change '5' below to the max number of sections you want to allow.
        if (newNum == 1000)
            $('#btnAdd').attr('disabled', true).prop('value', "You've reached the limit"); // value here updates the text in the 'add' button when the limit is reached
        $("#row_count").val(newNum);
    });


    $('#btnDel').click(function () {
        // Confirmation dialog box. Works on all desktop browsers and iPhone.
        if (confirm("Are you sure you wish to remove this section? This cannot be undone."))
        {
            var num = $('.clonedInput').length;
            // how many "duplicatable" input fields we currently have
            $('#entry' + num).slideUp('slow', function () {$(this).remove();
                // if only one element remains, disable the "remove" button
                if (num -1 === 1)
                    $('#btnDel').attr('disabled', true);
                // enable the "add" button
                $('#btnAdd').attr('disabled', false).prop('value', "add section");});
        }
        return false; // Removes the last section you added
    });
    // Enable the "add" button
    $('#btnAdd').attr('disabled', false);
    // Disable the "remove" button
    $('#btnDel').attr('disabled', true);

</script>