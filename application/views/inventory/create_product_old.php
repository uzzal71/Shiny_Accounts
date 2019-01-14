    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 120px;max-height: 450px;overflow: scroll">


			<div class="panel-heading">Create Product</div>

					<h3 align="center">
			<p style = "color:green"><?php echo $this->session->userdata('message');
			$this->session->unset_userdata('message')?></p>
		</h3>
 <form role="form" action="<?php echo base_url();?>inventory/save_material_receive" method="post">

            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
                    <tr>
                      
                       
                       <th align="center">Product Name*</th>
                       <td align="center" width="40%"><input type="text" name="voucher_no" value="" id="voucher_no" class="form-control custom-input" r required></td>                        
					   <th align="center">Product Id*</th>
                        <td align="center" width="40%"><input type="text" name="voucher_no" value="" id="voucher_no" class="form-control custom-input" r required></td>

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

<hr style="background-color: rebeccapurple;border-top-color: rebeccapurple;color: rebeccapurple; width: 100%;"><br>
                    <div>
                        <div id="transport_label">
                        <div class="form-group col-md-1">
                        <label class="control-label" for="from">SL<sup style="color: red"></sup></label>
                        </div>
                        <div class="form-group col-md-2">
                        <label class="control-label" for="to">Item ID<sup style="color: red">*</sup></label>
                        </div>
                        <div class="form-group col-md-2">
                        <label class="control-label" for="vehicle">Item Name<sup style="color: red"></sup></label>
                        </div>
                      
                        <div class="form-group col-md-2" id="transport_label">

                        <label class="control-label" for="description">Description<sup style="color: red">*</sup></label>
                        </div>
                        <div class="form-group col-md-1">
                        <label class="control-label" for="amount">Quantity<sup style="color: red"></sup></label>
                        </div>

                        <div class="form-group col-md-2">
                        <label class="control-label" for="remark"> <sup style="color: red"></sup></label>
                         </div>
                         <div class="form-group col-md-2">
                        <label class="control-label" for="remark">Remarks<sup style="color: red">*</sup></label>
                         </div>
                         
                        
                    </div><br><br>
                    <div id="entry1" class="clonedInput row">
                        <!--            <h4 id="reference" name="reference" class="heading-reference">Entry #1</h4>-->
                        <fieldset>
                            <div id="transport_div">
                            <!-- Text input-->
                            <div class="form-group col-md-1">

                                <input id="sl" name="sl" type="sl" placeholder="" class="input_fn form-control" style="height: 30px">

                            </div>
                            <!-- Text input-->
                            <div class="form-group  col-md-2">

                                <input id="item_id" name="item_id" type="text" placeholder="" class="input_ln form-control" style="height: 30px; ">

                            </div>
                            <div class="form-group  col-md-2">
                                <input type="text" id="item_name" name="item_name"  placeholder="" class="select_pn form-control" style="height: 30px;" >
                                  

                            </div>
                            </div>
                            <div id="description_div" class="form-group col-md-1">

                                <input id="quantity" name="quantity" type="text" placeholder="" class="input_qn form-control" style="height: 30px">

                            </div>
                            <div class="form-group  col-md-2">

                                <input id="uom" name="uom" type="text" placeholder="" class="input_mn form-control" required="" style="height: 30px">

                            </div>

                            <div class="form-group  col-md-2">

                                <input id="unit_price" name="unit_price" type="text" placeholder="" class="input_on form-control" style="height: 30px">
                                <br>
                            </div>
                            <div class="form-group  col-md-2">

                                <input id="total_price" name="total_price" type="text" placeholder="" class="input_on form-control" style="height: 30px">
                                <br>
                            </div>
                          
                             


                    </div><!-- end #entry1 -->
                    <!-- Button (Double) -->
                    <br>
                    <div id="buttonSet1">
                    <p class="pull-right">
                        <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">add</button>
                        <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">remove</button>
                    </p>

                    <p>
                        <button id="submit_button" name="" class="btn btn-primary">Create Product</button>
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
				
				var voucher_no		 = $('#voucher_no').val().trim();
				var date		 = $('#date').val().trim();
				var expense_type		 = $('#expense_type').val().trim();
				var employee_id		 = $('#employee_id').val().trim();
				var employee_name		 = $('#employee_name').val().trim();
				var customer_id		 = $('#customer_id').val().trim();
				var project_id		 = $('#project_id').val().trim();
				var project_name		 = $('#project_name').val().trim();
				var project_description		 = $('#project_description').val().trim();

				var from= new Array();

	            $('.from').each(function(){
	                from.push($(this).val().trim());
	            });

				var to= new Array();
	            $('.to').each(function(){
	                to.push($(this).val().trim());
	            });

				var vehicle= new Array();
	            $('.vehicle').each(function(){
	                vehicle.push($(this).val().trim());
	            });	 

	            var amount= new Array();
	            $('.amount').each(function(){
	                amount.push($(this).val().trim());
	            });	 

	            var remarks= new Array();        
	            $('.remarks').each(function(){
	                remarks.push($(this).val().trim());
	            });	 

	            var descrioption= new Array();           
	            $('.descrioption').each(function(){
	                descrioption.push($(this).val().trim());
	            });
			

				//var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>voucher_entry/save_bill_info',
					data:{ 
							voucher_no: voucher_no, 
							date: date, 
							expense_type: expense_type,
							employee_id: employee_id,
							project_name: project_name,
							customer_id: customer_id,
							project_id: project_id,
							project_id: project_id,
							project_description: project_description,
							from: from,
							to: to,
							vehicle: vehicle,
							amount: amount,
							remarks: remarks,
							descrioption: descrioption
						
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

        $('#expense_type').change(function () {
            var value = this.value;
            if(value=="Transport")
            {
                $('#description_label').hide()
                $('#description_div').hide()
                $("#transport_label").show();
                $("#transport_div").show();
                $('#buttonSet1').show()
            } else {
                $("#transport_label").hide();
                $("#transport_div").hide();
                $("#description_label").show();
                $("#description_div").show();
                $('#buttonSet1').show()
            }
        });
		
		$("#employee_id").click(function(){
			//alert("Here");
			
			var employee_id		 = $('#employee_id').val().trim();
						
			var response;
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>employee/pick_employee_name',
					data:{ 
							employee_id: employee_id
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						//alert(response);
						$('#employee_name').val(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
					

			//$('#employee_name').val(response);
		
		});

				$("#customer_id").change(function(){
			//alert("Here");
			var customer_id	= $('#customer_id').val().trim();
			//var response;
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Project_tracking/pick_project_id_for_voucher',
					data:{ 
							customer_id: customer_id
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						$('#project_id').html(response);
						$('#project_name').val('');
						$('#project_description').val('');
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

        // First name - text
        newElem.find('.input_fn').attr('id', 'ID' + newNum + '_from').attr('name', 'ID' + newNum + '_from').val('');

        // Last name - text
        newElem.find('.input_ln').attr('id', 'ID' + newNum + '_to').attr('name', 'ID' + newNum + '_to').val('');
        //Vehicle
        newElem.find('.select_pn').attr('id', 'ID' + newNum + '_vehicle').attr('name', 'ID' + newNum + '_vehicle').val('');
        //Amount
        newElem.find('.input_qn').attr('id', 'ID' + newNum + '_description').attr('name', 'ID' + newNum + '_description').val('');

        //Amount
        newElem.find('.input_mn').attr('id', 'ID' + newNum + '_amount').attr('name', 'ID' + newNum + '_amount').val('');
        //Project Name
        newElem.find('.input_nn').attr('id', 'ID' + newNum + '_projectName').attr('name', 'ID' + newNum + '_projectName').val('');
        //Remarks
        newElem.find('.input_on').attr('id', 'ID' + newNum + '_remark').attr('name', 'ID' + newNum + '_remark').val('');
        //Vehicles
        newElem.find('.input_pn').attr('id', 'ID' + newNum + '_vehicle').attr('name', 'ID' + newNum + '_vehicle').val('');

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