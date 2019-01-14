
    <br><br>
    <div class="row">
		<div class="col-md-6 col-md-offset-2">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 150px;max-height: 550px;">
			<div class="panel-heading">Employee Sync(ADD)</div>
            <div class="table-responsive" id="custom-t1able">
			
                <table id="" class="table ">
                    <tbody>

			
				          

					<tr>

                       <th align="center">Company Name</th>
                       <td align="center" style="width:50%">
                       	<select name="company_name" class="form-control col-sm-2 custom-input" id="company_name">
                       	<option value="no">Select Company Name</option>
                       	<?php foreach ($all_company as  $comapny) {?>
                    	  <option value="<?php echo $comapny->company_id ?>" ><?php echo $comapny->full_name ?></option>
                      
                       		
                       		<?php 	 	} ?>
                       	</select>
                       </td>                        
					 <td style="width:5%"></td>

                    </tr> 
                    <tr>  
                    <th align="center">Source Type</th>
					   <td align="center" style="width:50%">
					   	 <select name="source_type" class="form-control col-sm-2 custom-input" id="source_type" >
					   	 	<option value="">Select Source</option>
					   	 	<option value="list">Employee List</option>
					   	 	<option value="device">Device</option>


					   	 </select>
					   </td>
					    <td style="width:5%"></td>
					    </tr>			
					<tr>
                    <th align="center">Source Device</th>
                       <td align="center" style="width:50%">
                       	<select name="source_device" class="form-control col-sm-2 custom-input" id="source_device">
                       	<option value=" " >Select Source Device</option>
                       	
                       	</select>
                       </td>                        
					  <td style="width:5%"></td>

                    </tr>  
					
			
					<tr>
               
						  <th align="center">Target Device</th>
					   <td align="center" style="width:50%">
					   	 <select name="target_device" class="form-control col-sm-2 custom-input" id="target_device" >
					   	 	
					   	 	
					   	 	
					   	 	


					   	 </select>
					   </td> 
					    <td style="width:5%"></td>
                    </tr> 		
	
						
					<tr>
                     
                       <td></td>
                       <td style="width:50%"><button type="submit" id="sync_button" class="btn btn-info pull-right">Sync</button></td>                        
					  <td style="width:5%"></td>
                    </tr>					
           

					</tbody>
					
					</table>

            </div>
           
        </div>
      
    </div>
    </div>
	
<script type="text/javascript">
	$(document).ready(function() {

		$("#sync_button").click(function(){
			
			//alert("Button Clicked");
			
			{
				
				
				var company_id = $('#company_name').val().trim();
				var source_type = $('#source_type').val().trim();
				var source_device = $('#source_device').val().trim();
				var target_device = $('#target_device').val().trim();
				
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Device/save_sync_add',
					data:{ 
							company_id: company_id,
							source_type: source_type,
							source_device: source_device,
						
							target_device: target_device
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						//window.location.assign('employee_sync_add');
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				
				//alert(response);
			
			}

		});

		$("#source_device").change(function(){
			
			//alert("Button Clicked");
			
			{
				
				
				var company_id = $('#company_name').val().trim();
				var source_device = $('#source_device').val().trim();
				
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Device/pick_target_devices',
					data:{ 
							company_id: company_id,
							source_device:source_device
							
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						//alert(response);
						$('#target_device').html(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				
				//alert(response);
			
			}

		});


		$("#source_type").change(function(){
			
			//alert("Button Clicked");
			
			{
				
				
				var company_id = $('#company_name').val().trim();
				
				
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Device/pick_target_devices',
					data:{ 
							company_id: company_id
							
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						//alert(response);
						$('#target_device').html(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				
				//alert(response);
			
			}

		});


		$("#source_type").on('change',function(){
			
			//alert("Button Clicked");

			

			
			
				//alert("validation true");
				
				var company_id = $('#company_name').val().trim();
				
				if (company_id=="no") {
					alert("Please Select Your Comapny Name");
					 $('#company_name').focus();
					event.preventDefault();
					return false;
				}else{
				

						if ($("#source_type").val()=="device"){
				$( "#source_device" ).prop( "disabled", false );
			}else{
				$( "#source_device" ).prop( "disabled", true );
			}

			//alert(company_id);
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Device/pick_devices',
					data:{ 
							company_id: company_id,
							
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						//alert(response);
						$('#source_device').html(response);
						//$('#target_device').html(response);
						
						
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				
				//alert(response);
			
			
}
		});
		
		
			
			$("#all_employee").change(function(){
				if(document.getElementById('all_employee').checked) {
					//alert("checked");
					$( "#employee_ids" ).val("");
					$( "#employee_ids" ).prop( "disabled", true );
				} 					
				else{
					//alert("Unchecked");
					$( "#employee_ids" ).prop( "disabled", false );
					if($('#employee_ids').val().trim() == "")
						{
							alert("Please Select Employee ID");
							$('#employee_ids').focus();
							return false;
						}
				}
			});


			$( "#source_device" ).prop( "disabled", true );

// 			$("#source_type").change(function(){

// 			if ($("#source_type").val()=="device"){
// 				$( "#source_device" ).prop( "disabled", false );
// 			}else{
// 				$( "#source_device" ).prop( "disabled", true );
// 			}
// });
		
	});
	
	function form_validation()
	{
		
		//alert("validation");
		
		if($('#date_from').val().trim() == "")
		{
			alert("Please Insert Date From ");
			$('#date_from').focus();
			return false;
		}
		else if($('#date_to').val().trim() == "")
		{
			alert("Please Insert Date To");
			$('#date_to').focus();
			return false;
		}
		return true;
		}
	
	
	   $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	   $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
</script>

	
