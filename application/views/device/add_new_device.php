
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Add New Device</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
						<tr>
							<th align="center">Device ID</th>
							<td align="center"style="width:30%">                           
								<input type="number" id="DevId" name="DevId"  class="form-control custom-input" required>
							</td>   
						 <th align="center">Serial</th>
							<td align="center"style="width:30%">
								<input type="text" id="serial" name="serial" class="form-control custom-input" required>
							</td>  
						</tr> 			
						<tr>
							<th align="center">Device Type</th>
							<td align="center"style="width:30%">                           
								<select name="type" class="form-control col-sm-6 custom-input" id="type">
									<option value="select">Select Device Type</option>
									<option value="1">Easy Flow</option>
									<option value="2">Face Detection</option>
									<option value="3">Finger Print</option>
                            </select>
							</td>   
							
						 <th align="center">Device Name</th>
							<td align="center"style="width:30%">
								<input type="text" id="DeviceName" name="DeviceName" class="form-control custom-input" required>
							</td>  
						</tr> 				
						<tr>
							<th align="center">Active</th>
							<td align="center"style="width:30%">                           
								<select name="Active" class="form-control col-sm-3 custom-input" id="Active">
									<option value="select">Select</option>
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
							</td>   
							
						 <th align="center">Slave</th>
							<td align="center"style="width:30%">
								<select name="Slave" class="form-control col-sm-3 custom-input" id="Slave">
									<option value="select">Select</option>
									<option value="1">Yes</option>
									<option value="0">No</option>
								</select>
							</td>  
						</tr> 
											
						<tr>
						<th align="center">Company ID</th>
							<td>
								<select name="company_id" class="form-control col-sm-3 custom-input" id="company_id">
									<option value="select">Select</option>
									<?php foreach($all_company as $each_company){?>
									<option value = "<?php echo $each_company->company_id?>"><?php echo $each_company->company_id?></option>
									<?php }?>
								</select>
							</td>
							
							<th align="center">Location</th>
							<td align="center"style="width:30%">                           
								<input type="text" id="location" name="location" class="form-control custom-input" required>
							</td>  
						</tr> 
						<tr> 
							<th align="center">IP Address</th>
							<td align="center"style="width:30%">                           
								<input type="text" id="IpAddress" name="IpAddress" class="form-control custom-input" required>
							</td>  
							<th align="center">Group ID</th>
							<td align="center"style="width:30%">                           
								<input type="text" id="Group_id" name="Group_id" class="form-control custom-input" required>
							</td>  
						</tr>
						
						
						<tr>
						   <td><button type="submit" id="btn_add_device" class="btn btn-info pull-right">Add New Device</button></td>   
						</tr>					
           

					</tbody>
					
				</table>

            </div>
           
        </div>
      
    </div>
    </div>
	
<script type="text/javascript">
	$(document).ready(function() {
		$("#ms_num").attr('maxlength','6');

		$("#btn_add_device").click(function(){
			//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				var DevId = $('#DevId').val().trim();
				var serial = $('#serial').val().trim();
				var type = $('#type').val().trim();
				var DeviceName = $('#DeviceName').val().trim();
				var Active = $('#Active').val().trim();
				var Slave = $('#Slave').val().trim();
				var company_id = $('#company_id').val().trim();
				var location = $('#location').val().trim();
				var IpAddress = $('#IpAddress').val().trim();
				var Group_id = $('#Group_id').val().trim();
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Device/save_new_device',
					data:{
							DevId: DevId,
							serial: serial,
							type: type,
							DeviceName: DeviceName,
							Active: Active,
							Slave: Slave,
							company_id: company_id,
							location: location,
							IpAddress: IpAddress,
							Group_id : Group_id
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						document.location.reload(true);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				
				//alert(response);
			
			}

		});
		
	});

	function pad(str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}
	
	function form_validation()
	{
		
		//alert("validation");
		
		if($('#DevId').val().trim() == "")
		{
			alert("Please Insert Device ID");
			$('#DevId').focus();
			return false;
		}

		var DevId =$('#DevId').val();

		var pattern = /^[0-9]*$/;
		if (!pattern.test(DevId)) { 

			alert('Please Enter Valid Device ID! Example:1001 ');
			$('#DevId').focus();
			return false;

		}
		// else if($('#serial').val().trim() == "")
		// {
		// 	alert("Please Insert Device Serial");
		// 	$('#serial').focus();
		// 	return false;
		// }			
		else if($('#type').val().trim() == "select")
		{
			alert("Please Select Device Type");
			$('#type').focus();
			return false;
		}	
					
		else if($('#Active').val().trim() == "select")
		{
			alert("Please Select Device Active or Inactive");
			$('#Active').focus();
			return false;
		}		
		else if($('#Slave').val().trim() == "select")
		{
			alert("Please Select Slave");
			$('#Slave').focus();
			return false;
		}	
		else if($('#company_id').val().trim() == "select")
		{
			alert("Please Select Company ID");
			$('#company_id').focus();
			return false;
		}		
					
		else if($('#IpAddress').val().trim() == "")
		{
			alert("Please Insert IP Address");
			$('#IpAddress').focus();
			return false;
		}		
		// 	else if($('#Group_id').val().trim() == "")
		// {
		// 	alert("Please Insert Group Id");
		// 	$('#Group_id').focus();
		// 	return false;
		// }	

		return true;
		}

	   $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	   $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
</script>

	
