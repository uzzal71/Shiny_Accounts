<?php 
//echo "<pre>";print_r($all_customer);exit();?>
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Create New Project</div>
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
					   <th align="center">Project ID*</th>
                       <td align="center" width="30%"><input type="text" name="project_id" value="<?php echo "PR".date('Y').$last_id?>" id="project_id" class="form-control custom-input" required></td>
                       <th align="center">Project Name*</th>
                       <td align="center"style="width:30%"><input type="text" name="project_name"  id="project_name" class="form-control custom-input" required></td>                        
					   
                    </tr>  
			
					<tr>           

					<tr>
                       <th align="center">Project Short Name*</th>
                       <td align="center"style="width:30%"><input type="text" name="project_short_name" value="" id="project_short_name" class="form-control custom-input" required></td>                        
					   <th align="center">Project Manager*</th>
                       <td align="center" width="30%">	
						<select name="project_manager" class="form-control col-sm-6 custom-input" id="project_manager" required>					   
					   <option value="select" >select</option>
					   <?php foreach ($all_employee as $each_employee){?>
					   <option value="<?php echo $each_employee->id?>" ><?php echo $each_employee->first_name.' '.$each_employee->last_name?></option>
						
					   <?php }?>
					    </select>	
					   </td>  

                    </tr> 		
					<tr>
                       <th align="center">Customer Name*</th>
                       <td align="center" width="30%">					   
					   <select name="customer_name" class="form-control col-sm-6 custom-input" id="customer_name" required>
					   <option value="select" >select</option>
					   <?php foreach ($all_customer as $each_customer){?>
					   <option value="<?php echo $each_customer->customer_id?>" ><?php echo $each_customer->full_name?></option>
								
					   <?php }?>

					   </select>
					   </td>                        
					   <th align="center">Customer ID*</th>
                       <td align="center" width="30%"><input type="text" name="customer_id" value="" id="customer_id" class="form-control custom-input"readonly required></td>

                    </tr> 		
					<tr>
                       <th align="center">Project Description*</th>
                       <td align="center"style="width:30%"><input type="text" name="project_description" value="" id="project_description" class="form-control custom-input" required></td>                        
					   <th align="center">Project Status*</th>
                        <td align="center" width="30%">					   
					   <select name="project_status" class="form-control col-sm-6 custom-input" id="project_status" required>
					   <option value="select" >select</option>
					   <option value="Running" >Running</option>
					   <option value="Finished" >Finished</option>

					   </select>
					   </td> 

                    </tr> 			
			
					<tr>
                       <th align="center">PO Date*</th>
                       <td align="center"style="width:30%"><input type="text" name="po_date" value="" id="po_date" class="form-control custom-input dateFrom" required></td>                        
					   <th align="center">Delivery Date</th>
                       <td align="center" width="30%"><input type="text" name="delivery_date" id="delivery_date" class="form-control custom-input dateFrom"></td>

                    </tr> 	
					<tr>
                       <th align="center">Project Payment*</th>
                       <td align="center"style="width:30%"><input type="text" name="project_payment" value="" id="project_payment" class="form-control custom-input" required></td>   
					   <th align="center">Project Price*</th>
                       <td align="center"style="width:30%"><input type="text" name="project_price" value="" id="project_price" class="form-control custom-input" required></td> 					   
					   

                    </tr> 	
				    <tr>
						<th align="center">Project Start Date</th>
                        <td align="center" width="30%"><input type="text" name="project_start_date" id="project_start_date" class="form-control custom-input dateFrom"></td>
						
                        <th align="center">Project Finished Date</th>
                        <td align="center" width="30%"><input type="text" name="project_finished_date" id="project_finished_date" class="form-control custom-input dateFrom"></td>
					     					   
					  
                    </tr>			
						<tr>
							
							<td>Type*</td>
							<td>
								<select name="type" id="type" class="form-control custom-input">
									
									<option value="select">Select</option>
									<option value="0">Project</option>
									<option value="1">Support</option>
									<option value="2">Both</option>
								</select>

							</td>

						</tr>
					<tr>

                     <td></td>
                       <td></td>
                         <td></td>
							<td><button type="submit" id="btn_create_customer" class="btn btn-info pull-right">Add New Project</button></td>                          
					  
                    </tr>					
           

					</tbody>
					
					</table>

            </div>
           
        </div>
      
    </div>
    </div>
	
<script type="text/javascript">
	$(document).ready(function() {

		$("#btn_create_customer").click(function(){
			//alert("Button Clicked");
			if(form_validation())
			{
				alert("validation true");
				
				var project_id = $('#project_id').val().trim();
				var project_name = $('#project_name').val().trim();
				var project_short_name = $('#project_short_name').val().trim();
				var project_manager = $('#project_manager').val().trim();
				var customer_name = $("#customer_name option:selected").text().trim();
				var customer_id = $('#customer_id').val().trim();
				var project_description = $('#project_description').val().trim();
				var project_status = $('#project_status').val().trim();
				var po_date = $('#po_date').val().trim();
				var delivery_date = $('#delivery_date').val().trim();
				var project_payment = $('#project_payment').val().trim();
				var project_price = $('#project_price').val().trim();
				var project_start_date = $('#project_start_date').val().trim();
				var project_finished_date = $('#project_finished_date').val().trim();
				var type = $('#type').val().trim();
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>project_tracking/save_new_project',
					data:{ 
							project_id: project_id,
							project_name: project_name,
							project_short_name: project_short_name,
							project_manager: project_manager,
							customer_name: customer_name,
							customer_id: customer_id,
							project_description: project_description,
							project_status: project_status,
							po_date: po_date,
							delivery_date: delivery_date,
							project_payment: project_payment,
							project_price: project_price,
							project_start_date: project_start_date,
							type:type,
							project_finished_date: project_finished_date
						
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
				
				
				location.reload();
			
			}

		});
		
		
		$("#customer_name").change(function(){
			var customer_name = $('#customer_name').val().trim();

			if(customer_name=="select"){
				alert("Please Select Customer Name");
				$('#customer_name').focus();
				$('#customer_id').val(" ");
			}
			else{
				$('#customer_id').val(customer_name);
			}
		
		});
		

		
	
	});
	
	function form_validation()
	{
		
		//alert("validation");
		
		if($('#project_id').val().trim() == "")
		{
			alert("Please insert Project ID");
			$('#project_id').focus();
			return false;
		}
		else if($('#project_name').val().trim() == "")
		{
			alert("Please Insert Project Name");
			$('#project_name').focus();
			return false;
		}
		else if($('#project_short_name').val().trim() == "")
		{
			alert("Please Insert Project Short Name");
			$('#project_short_name').focus();
			return false;
		}	
		else if($('#project_manager').val().trim() == "select")
		{
			alert("Please Select Project Manager");
			$('#project_manager').focus();
			return false;
		}		
		else if($('#customer_name').val().trim() == "select")
		{
			alert("Please Select Customer Name");
			$('#customer_name').focus();
			$('#customer_id').value("");
			return false;
		}		
		else if($('#project_description').val().trim() == "")
		{
			alert("Please Insert Project Description");
			$('#project_description').focus();
			return false;
		}		
		else if($('#project_status').val().trim() == "")
		{
			alert("Please Insert Project Status");
			$('#project_status').focus();
			return false;
		}		
		else if($('#po_date').val().trim() == "")
		{
			alert("Please Insert PO Date");
			$('#po_date').focus();
			return false;
		}		
		// else if($('#delivery_date').val().trim() == "")
		// {
		// 	alert("Please Insert Delivery Date");
		// 	$('#delivery_date').focus();
		// 	return false;
		// }		
		else if($('#project_price').val().trim() == "")
		{
			alert("Please Insert Project Price");
			$('#project_price').focus();
			return false;
		}	
		else if($('#project_payment').val().trim() == "")
		{
			alert("Please Insert Project Payment");
			$('#project_payment').focus();
			return false;
		}		
		else if($('#project_start_date').val().trim() == "")
		{
			alert("Please Insert Project Start Date");
			$('#project_start_date').focus();
			return false;
		}		
		// else if($('#project_finished_date').val().trim() == "")
		// {
		// 	alert("Please Insert Project Finished Date");
		// 	$('#project_finished_date').focus();
		// 	return false;
		// }

		else if($('#type').val().trim() == "select")
		{
			alert("Please Select Project Type");
			$('#type').focus();
			return false;
		}
				
		return true;
		}
	
	
	   //$('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	   //$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
</script>

	
