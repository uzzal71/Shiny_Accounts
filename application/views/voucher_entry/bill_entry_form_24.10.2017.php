
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Voucher Entry Form</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
                    <tr>
                        <?php
						
						if($last_id->lastid==null){
							$last_id= 1000;
						   
					   }
						   else{
							   $last_id = (int)$last_id->lastid+1;
							 
						   } ?>
                       
                       <th align="center">Vouchar No*</th>
                       <td align="center" width="30%"><input type="text" name="voucher_no" value="<?php echo "VN".date('Y').$last_id?>" id="voucher_no" class="form-control custom-input" readonly required></td>                        
					   <th align="center">Date*</th>
                       <td align="center" width="30%"><input type="text" name="date" id="date" class="form-control custom-input dateFrom" required></td>

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
					   <select name="employee_id" class="form-control  custom-input" id="employee_id" >
							<option value="select">select</option>
						<?php foreach($view_employee_list as $v_employee_list){?>
							 <option value="<?php echo  $v_employee_list->employee_id?>"><?php echo  $v_employee_list->employee_id?></option>
						<?php }?>
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
						<?php foreach($view_customer_list as $v_customer_list){?>
							  <option value="<?php echo $v_customer_list->customer_id?>"><?php echo $v_customer_list->full_name?></option>
						<?php }?>
						
					   </select></td> 
						
                    </tr>		

					<tr>
					
						<th align="center">Project Code*</th>
						<td align="center" width="30%">
					   <select name="project_id" class="form-control  custom-input" id="project_id" >

					   </select>
					   </td>  
                      
					   <th align="center">Project Name</td>
                       <td align="center" width="30%"><input type="text" name="project_name" id="project_name" class="form-control custom-input"readonly ></td>
                    </tr>	

					<tr>
						<th align="center">Project Description</th>
                       
					    <td align="center" width="30%"><input type="text" name="project_description" id="project_description" class="form-control custom-input"readonly ></th></td>  
                      
                    </tr>
					<tr>
					<td colspan="4"> <hr></td>
					</tr>
					</tbody>
					</table>




<div id = "transport_div" outline: thin solid #00ff00;" class="duplicate">
					<table id = "transport_table" class="table">
					<tbody>
					<tr>
                      
					   <th align='center'>From*<?php echo $id=1;?></th>
                       <td align='center' width='30%'><input type='text' name='from' id='from' class='form-control custom-input' required></td>
					  
					  	<th align='center'>To*</th>
                       <td align='center' width='30%'><input type='text' name='to' id='to' class='form-control custom-input' required></td>
                    </tr>
					
					<tr>

					    <th align='center'>Vehicle*</th>
						<td align='center' width='30%'>
					   <select name='vehicle' class='form-control  custom-input'  id='vehicle' >
						
							 <option value=''>Rickshaw</option>
							 <option value=''>Bus</option>
							 <option value=''>CNG</option>
							 <option value=''>Car</option>
					
					   </select>
					   </td> 
					   <th align='center'>Amount*</th>
                       <td align='center' width='30%'><input type='text' name='amount' id='amount' class='form-control custom-input' required></td>
						
                    </tr>
					<tr>
					<th align='center'>Remarks</th>
					<td align='center' width='30%'><input type='text' name='remarks' id='remarks' class='form-control custom-input' required></td> 
					</tr>


					</tbody>
				    </table>	
</div>




<div id="others_div" style="display: none;outline: thin solid #00ff00;"  class="duplicate">
					<table id = "others_table" class="table" >
					<tbody>
				


					<tr>
                      
					   <th align='center'>Description*</th>
                       <td align='center' width='30%'><input type='text' name='description' id='description' class='form-control custom-input' required></td>
					  
					  	<th align='center'>Amount*</th>
                       <td align='center' width='30%'><input type='text' name='amount' id='amount' class='form-control custom-input' required></td>
                    </tr>		

					<tr>
                      
					   <th align='center'>Remarks*</th>
                       <td align='center' width='30%'colspan='' span=''><input type='text' name='remarks' id='remarks' class='form-control custom-input' required></td>
                            
                    </tr>



					</tbody>
				    </table>	
</div>


<div id="increment_div">

</div>


					<table id="add_cancel" class="add_cancel">
					<tbody>
					<tr>

					 <td><button type='button' id = 'btnAdd' class='btn btn-primary'>Add</button>
                                              &nbsp;
                    <button type='button' id = 'btnDel' class='btn btn-primary'>Cancel</button></td>
                      
                    </tr>				

                    	<table id="" class="">
					<tbody>
					<tr>

					   <td><button type="button" class="btn btn-primary" id="btn_bill_entry">Submit</button></td>
                      
                    </tr>
				
					</tbody>
				    </table>

            </div>
           
        </div>
    </div>
    </div>

<script type="text/javascript">
	$(document).ready(function() {
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
		
				$("#expense_type").change(function(){

					transport = $("#expense_type").val().trim();
					if(transport == 'Transport'){
						$('#others_div').hide();
						$('#transport_div').show();
						
						//$("#transport_div").clone().appendTo("#increment_div");
						
					}
					else{
						$('#transport_div').hide();
						$('#others_div').show();
						//$("#others_div").clone().appendTo("#increment_div");
					}
		
		});
		
		$("#employee_id").change(function(){
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

    $("#btnAdd").click(function(){

    	expense_type = $("#expense_type").val().trim();

    	    	if(expense_type == "select"){
    	    		alert("Select Expense Type");
    	    		$('#expense_type').focus();
					return false;

    	}
    	if(expense_type == "Transport"){
			$("#transport_div").clone().appendTo("#increment_div");

    	}
    	else{
    		 $("#others_div").clone().appendTo("#increment_div");
    	}
       
    });
</script>