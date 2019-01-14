    <br><br>
  <div class="row">


   	    <div class="col-md-2" style="background-color:white; margin-left: 200px;width: 150px;padding: 0px;max-height: 450px;overflow: scroll;" ><table  class="table responsive">
   	    	<thead>
   	    		<tr>
   	
   	    	<th>Voucher No</th>
   	    	</tr>
   	   		</thead>
   	   		<?php  foreach ($latest_vouchers as  $vouchers) { ?>
   	 	 <tr>
   	 	 
   	    	 <td style="margin-left: 0px; min-width: 120px;"><a href="<?php echo base_url();?>Voucher_entry/view_voucher_details/<?php echo $vouchers->voucher_no ?>" class="btn btn-primary" style="margin-left: 0px; min-width: 120px;padding: 2px;"  "><?php echo $vouchers->voucher_no ?></a></td>
   	    </tr>
   	   <?php  } ?>
   	</table>
   	    	
      
    	</div>

		<div class="col-md-8">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 0px;margin-left: 3px;max-height: 750px;overflow: scroll">


			<div class="panel-heading">Voucher Entry Form</div>

					<h3 align="center">
			<p style = "color:green"><?php echo $this->session->userdata('message');
			$this->session->unset_userdata('message')?></p>
		</h3>
 		<form role="form" method="POST" action="<?php echo base_url();?>voucher_entry/save_bill_info" autocomplete="off" >

            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
                    <tr>
                        <?php

                        foreach($last_id as $value):
                        	 $last_id = $value->lastid;
                        endforeach;
                       // exit();

						if($last_id==NULL){
							$last_id= "001";
						   
					   }
						else{
							$convert_last_id = (int)$last_id;
							$length = strlen((string)$convert_last_id);
							if($length == 1){
								$last_id= $convert_last_id+1;
								 if($last_id == 10) {
								 	$last_id = "0".(string)($last_id);
								 }
								 else{
								 	$last_id = "00".(string)($last_id);
								 }
							}
							else if($length == 2){
								$last_id= $convert_last_id+1;
								 if($last_id == 100) {
								 	$last_id = (string)($last_id);
								 }
								 else{
								 	$last_id = "0".(string)($last_id);
								 }
							 //$last_id= "0".(string)($convert_last_id+1);
							}
							else {
								$last_id = $convert_last_id + 1;
							}
						   }

						   $date = date('Ym');

						   $voucher = "IN".$date.$last_id;
						   

						    ?>
                       
                       <th align="center">Vouchar No*</th>
                       <td align="center" width="30%"><input type="text" name="voucher_no" value="<?php echo $voucher;?>" id="voucher_no" class="form-control custom-input" readonly required></td>                        
					   <th align="center">Date*</th>
                       <td align="center" width="30%"><input type="text" name="date" id="date" class="form-control custom-input dateFrom" autocomplete="off" required></td>

                    </tr>             

					<tr>
                       
                       
                       <th align="center">Expense Type*</th>
                       <td align="center" width="30%">
					   <select name="expense_type" class="form-control  custom-input" id="expense_type" >
					    <option value="select">select</option>
						<?php foreach($expense_type as $v_expense_type){?>
							 <option value="<?php echo  $v_expense_type->expense_type?>"><?php echo  $v_expense_type->expense_type?></option>
						<?php }?>
					   </select>
					   </td>     
					   
					   <th align="center">Employee ID*</th>
                       <td align="center" width="30%">
					   <select name="employee_id" class="form-control  custom-input" id="employee_id"  required>
						
							
							 

							<option value="select">select</option>

						<?php foreach($view_employee_list as $v_employee_list){?>
							 <option value="<?php echo  $v_employee_list->employee_id?>"><?php echo  $v_employee_list->employee_id?></option>
						<?php } ?>
					   </select>
					   </td>

                    </tr>			

					<tr>
                      
					   <th align="center">Employee Name*</th>
                       <td align="center" width="30%"><input type="text" name="employee_name" id="employee_name" class="form-control custom-input"readonly required></th>
					   
					    <th align="center">Customer Name*</th>
						<td align="center" width="30%">
						    
					   <select name="customer_id" class="form-control  custom-input" id="customer_id" >
							  <option value="select">select</option>
						<?php foreach ($view_customer_list as $value) { ?>
							
							<option value="<?php echo $value->customer_id; ?>"><?php  echo $value->full_name ?></option>

						<?php } ?>
						
					   </select></td> 
						
                    </tr>		

					<tr>
					
						<th align="center">Project Name*</th>
						<td align="center" width="30%">
					   <select name="project_id" class="form-control  custom-input" id="project_id" >

					   </select>
					   </td>  
                      
					   <th align="center">Project ID</td>
                       <td align="center">
                       	<input type="text" id="fake_project_id" class="form-control custom-input" readonly >
                       	<input type="hidden" name="project_name" id="project_name" ></td>
                    </tr>	

					<tr>
						<th align="center">Project Description</th>
                       
					    <td align="center" width="30%"><input type="text" name="project_description" id="project_description" class="form-control custom-input" readonly ></td> 

					  <th align="center">Type*</th>
						<td align="center" width="30%">
					   <select name="types" class="form-control  custom-input" id="types" >
					   </select>
					   </td>
					   </tr>
					   <tr>
					   <td></td>
					     <td align="center" width="30%"><input type="hidden" name="row_count" id="row_count" class="form-control custom-input" value="1" ></td>  
                      
                    </tr>
					<tr>
					<td colspan="4"> <hr></td>
					</tr>
					</tbody>
					</table>

<hr style="background-color: rebeccapurple;border-top-color: rebeccapurple;color: rebeccapurple;"><br>
<div id="ItemsRow">
                    <div id="ItemsRow">
                        <div id="transport_label">
                        <div class="form-group col-md-2">
                        <label class="control-label" for="from">From<sup style="color: red">*</sup></label>
                        </div>
                        <div class="form-group col-md-2">
                        <label class="control-label" for="to">To<sup style="color: red">*</sup></label>
                        </div>
                        <div class="form-group col-md-2">
                        <label class="control-label" for="vehicle">Vehicle<sup style="color: red">*</sup></label>
                        </div>
                        </div>
                        <div class="form-group col-md-6" id="description_label">
                        <label class="control-label" for="description">Description<sup style="color: red">*</sup></label>
                        </div>
                        <div class="form-group col-md-3">
                        <label class="control-label" for="amount">Amount<sup style="color: red">*</sup></label>
                        </div>
                        <div class="form-group col-md-3">
                        <label class="control-label" for="remark">Remark:</label>
                         </div>
                    </div><br><br>
                    <div id="entry1" class="clonedInput row">
                        <!--            <h4 id="reference" name="reference" class="heading-reference">Entry #1</h4>-->
                        <fieldset>
                            <div id="transport_div">
                            <!-- Text input-->
                            <div class="form-group col-md-2">

                                <input id="from" name="ID1_from" type="text" placeholder="" class="input_fn form-control" style="height: 30px">

                            </div>
                            <!-- Text input-->
                            <div class="form-group  col-md-2">

                                <input id="to" name="ID1_to" type="text" placeholder="" class="input_ln form-control" style="height: 30px">

                            </div>
                            <div class="form-group  col-md-2">
                                <select id="vehicle" name="ID1_vehicle" type="text" placeholder="" class="select_pn form-control" style="height: 30px">
                                    <option></option>
                                    <option>Rickshaw</option>
                                    <option>Bus</option>
                                    <option>CNG</option>
                                    <option>Car</option>
                                    <option>Train</option>
                                    <option>Pick-Up</option>
                                    <option>Micro-Bus</option>
                                    <option>Rickshaw-Van</option>
                                    <option>Van</option>
                                    <option>laguna</option>
                                    <option>Auto-Rickshaw</option>
                                </select>

                            </div>
                            </div>
                            <div id="description_div" class="form-group col-md-5">

                                <input id="description" name="ID1_description" type="text" placeholder="" class="input_qn form-control" style="height: 30px">

                            </div>
                            <div class="form-group  col-md-2">

                                <input id="amount" name="ID1_amount" type="number"  step="0.01" min="0" placeholder="" class="input_mn form-control" required style="height: 30px">

                            </div>

                            <div class="form-group  col-md-3">

                                <input id="remark" name="ID1_remark" type="text" placeholder="" class="input_on form-control" style="height: 30px">
                                <br>
                            </div>
                             <div class="form-group  col-md-1">

                                <button type="button" id="remove" name="remove" class="btn btn-danger">Delete</button>
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
                        <button id="btn_bill_entry" name="" class="btn btn-primary">Submit</button>
                    </p>
                    </div>
                    </fieldset>
</div>
                </form>
            </div>




        </div>


 
    </div>

<script type="text/javascript">
	$(document).ready(function() {


		//$('#description_label').hide();
        //$('#description_div').hide();
        $("#transport_label").hide();
        $("#transport_div").hide();
        $("#description_label").show();
         $("#description_div").show();


		$("#btn_bill_entry").click(function(){

			//alert("Testing");
			if(form_validation()){
			
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
				var types		 = $('#types').val().trim();

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
			

				//alert(types);
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
							types:types,
							descrioption: descrioption
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						//alert(response);
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

			//alert(customer_id);
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
			var type = project_info[2];
			var project_name = project_info[0];
			var project_description = project_info[1];
			
			$('#fake_project_id').val(project_id);
			$('#project_name').val(project_name);
			$('#project_description').val(project_description);

			//alert(type);


			$("#types").find('option').remove();
			if (type=='0') {
				//$("#type").val("0").change();
			 $("#types").append('<option value="0">Project</option>');


			}if (type=='1') {
				$("#types").append('<option value="1">Support</option>');

			}if (type=='2') {
				$("#types").append('<option value="select">Select</option>');
				$("#types").append('<option value="0">Project</option>');
				$("#types").append('<option value="1">Support</option>');
			}



					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
					

			//$('#employee_name').val(response);
		
		});
		


		$("#date").change(function(){
			//alert("Here");
			
			var date = $('#date').val().trim();
						
			var response;
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Voucher_entry/pick_latest_voucher_no',
					data:{ 
							date: date
						},
					//timeout: 4000,
					success: function(result) {

						//alert(result);
						response = result;
						$('#voucher_no').val(response);
		
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
					

			
		
		});

	});
	
	function form_validation(){
	

		//alert('GOT IT');
		if($('#date').val().trim() == "")
		{
			alert("Please Select Date");
			$('#date').focus();
			return false;
		}
		else if($('#expense_type').val()== "select")
		{
			alert("Please Select Expense Type");
			$('#expense_type').focus();
			return false;
		}

		else if($('#employee_id').val()=="select")
		{
			alert("Please Select your Employee ID");
			$('#employee_id').focus();
			return false;
		}

		else if($('#customer_id').val()=="select")
		{
			alert("Please Select Customer Name");
			$('#customer_id').focus();
			return false;
		}


		else if($('#project_id').val()=="select")
		{
			alert("Please Select Project ID");
			$('#project_id').focus();
			return false;
		}


		else if($('#types').val()=="select")
		{
			alert("Please Select Type");
			$('#types').focus();
			return false;
		}


		return true;
			
	};
	
	   //$('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd',maxDate:'0' });
	 //  $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });

  

        $('#btnAdd').click(function () {
        	//alert("jhg");
        var num     = $('.clonedInput').length, // Checks to see how many "duplicatable" input fields we currently have
            newNum  = new Number(num + 1),      // The numeric ID of the new input field being added, increasing by 1 each time
            newElem = $('#entry' + num).clone().attr('id', 'entry' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value

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
        if (newNum == 10)
            $('#btnAdd').attr('disabled', true).prop('value', "You've reached the limit"); // value here updates the text in the 'add' button when the limit is reached
        $("#row_count").val(newNum);
    });

	$("#ItemsRow").on('click','#remove',function(){

			//alert('got it');
			var lastRow = $("#ItemsRow .clonedInput:last");

			//var expense_id =$(this).parent().parent().find('#expense_id').text();
		 {
				var con= confirm("Are you sure you wish to remove this section? This cannot be undone.");

				if (con==true) {

					$(this).parent().parent().remove();
					var num     = $('.clonedInput').length;
            newNum  = new Number(num - 1);
				}else {

				}
			}
			
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

      $('#btnDel').on('click',function () {
        	//alert("jhg");
        var num     = $('.clonedInput').length;
            newNum  = new Number(num - 1);
           // alert(newNum);
        }); 

      // $('#remove').on('click',function () {
      //   	//alert("jhg");
      //   var num     = $('.clonedInput').length;
      //       newNum  = new Number(num - 1);
      //      alert(num);
      //   }); 

</script>