
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 550px;overflow: scroll">
			<div class="panel-heading" align="center"><h4>Salary Setup Form</h4></div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>	
						<tr>
						   <th align="center">Late Allowed (No. of Day)</th>
						   <td align="center" style="width:30%"><input type="text" name="late_allowed" <?php if($salary_setup_info){?>value="<?php echo $salary_setup_info->late_allowed?>"<?php }?> id="late_allowed" class="form-control custom-input" required></td> 	
						   <th align="center">Early Out Allowed (No. of Day)</th>
						   <td align="center"style="width:30%"><input type="text" name="early_out_allowed" <?php if($salary_setup_info){?>value="<?php echo $salary_setup_info->early_out_allowed?>"<?php }?> id="early_out_allowed" class="form-control custom-input" required></td> 						   
						</tr>
						<tr>
                        
						   <th align="center">Night Allowence Amount Per Hour (taka)</th>
						   <td align="center" style="width:30%"><input type="text" name="night_allowance_amount" <?php if($salary_setup_info){?>value="<?php echo $salary_setup_info->night_allowance_amount?>"<?php }?>id="night_allowance_amount" class="form-control custom-input"></td>  
						   <th align="center">Allowed Attendence Bonus Leave Limit (No. of Leave)</th>
						   <td align="center" style="width:30%"><input type="text" name="allowed_attendence_bonus_leave_limit"  <?php if($salary_setup_info){?>value="<?php echo $salary_setup_info->allowed_attendence_bonus_leave_limit?>"<?php }?> id="allowed_attendence_bonus_leave_limit" class="form-control custom-input"></td>  						   
						</tr> 	
						<tr> 
						   <th align="center">Allowed Attendence Bonus Late Limit (No. of Late)</th>
						   <td align="center" style="width:30%"><input type="text" name="allowed_attendence_bonus_late_limit"  <?php if($salary_setup_info){?>value="<?php echo $salary_setup_info->allowed_attendence_bonus_late_limit?>"<?php }?> id="allowed_attendence_bonus_late_limit" class="form-control custom-input"></td> 


                        
						   <th align="center">Over Time Minimum Minute</th>
						   <td align="center" style="width:30%"><input type="text" name="over_time_minimum_minute" <?php if($salary_setup_info){?>value="<?php echo $salary_setup_info->over_time_minimum_minute?>"<?php }?>id="over_time_minimum_minute" class="form-control custom-input"></td>  						   
						</tr> 		
		
						<tr>
						   <th align="center">Over Time Rate Multiplier(1.5/1.6/2)</th>
						   <td align="center" style="width:30%"><input type="text" name="over_time_rate" <?php if($salary_setup_info){?>value="<?php echo $salary_setup_info->over_time_rate?>"<?php }?> id="over_time_rate" class="form-control custom-input"></td>  

						<th align="center">Attendence Bonus Amount (Taka)</th>
						   <td align="center" style="width:30%"><input type="text" name="attendence_bonus_amount" <?php if($salary_setup_info){?>value="<?php echo $salary_setup_info->attendence_bonus_amount?>"<?php }?>  id="attendence_bonus_amount" class="form-control custom-input"></td> 
						</tr> 
						<tr>
						<th align="center">Transport Allowance Percentage (%)</th>
						   <td align="center" style="width:30%"><input type="text" name="transport_allowance_percentange" <?php if($salary_setup_info){?>value="<?php echo $salary_setup_info->transport_allowance_percentange?>"<?php }?> id="transport_allowance_percentange" class="form-control custom-input"></td> 
						<th align="center">Medical Allowance Percentage (%)</th>
						   <td align="center" style="width:30%"><input type="text" name="medical_allowance_percentange" <?php if($salary_setup_info){?>value="<?php echo $salary_setup_info->medical_allowance_percentange?>"<?php }?>   id="medical_allowance_percentange" class="form-control custom-input"></td> 
						</tr>					
						<tr>		
						<th align="center">House Rent Allowance Percentage (%)</th>
						   <td align="center" style="width:30%"><input type="text" name="house_rent_allowance_percentange" <?php if($salary_setup_info){?>value="<?php echo $salary_setup_info->house_rent_allowance_percentange?>"<?php }?> id="house_rent_allowance_percentange" class="form-control custom-input"></td> 
						<th align="center">Phone Bill Allowance Percentage (%)</th>
						   <td align="center" style="width:30%"><input type="text" name="phone_bill_allowance_percentange" <?php if($salary_setup_info){?>value="<?php echo $salary_setup_info->phone_bill_allowance_percentange?>"<?php }?> id="phone_bill_allowance_percentange" class="form-control custom-input"></td> 
						</tr>	
						<tr>
						   <td><button type="submit" id="btn_salary_setup" class="btn btn-info pull-right">Salary Setup</button></td>   
						</tr>
					</tbody>
					
				</table>

            </div>
           
        </div>
      
    </div>
    </div>
	
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_salary_setup").click(function(){
			//alert("Button Clicked");
			if(form_validation())
			{
				var late_allowed = $('#late_allowed').val().trim();
				var early_out_allowed = $('#early_out_allowed').val().trim();
				var night_allowance_amount = $('#night_allowance_amount').val().trim();
				var allowed_attendence_bonus_leave_limit = $('#allowed_attendence_bonus_leave_limit').val().trim();
				var allowed_attendence_bonus_late_limit = $('#allowed_attendence_bonus_late_limit').val().trim();
				var over_time_rate = $('#over_time_rate').val().trim();
				var attendence_bonus_amount = $('#attendence_bonus_amount').val().trim();
				var transport_allowance_percentange = $('#transport_allowance_percentange').val().trim();
				var medical_allowance_percentange = $('#medical_allowance_percentange').val().trim();
				var house_rent_allowance_percentange = $('#house_rent_allowance_percentange').val().trim();
				var phone_bill_allowance_percentange = $('#phone_bill_allowance_percentange').val().trim();
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Attendence/save_salary_setup',
					data:{
							late_allowed: late_allowed,
							early_out_allowed: early_out_allowed,
							night_allowance_amount: night_allowance_amount,
							allowed_attendence_bonus_leave_limit: allowed_attendence_bonus_leave_limit,
							allowed_attendence_bonus_late_limit: allowed_attendence_bonus_late_limit,
							over_time_rate: over_time_rate,
							attendence_bonus_amount: attendence_bonus_amount,
							transport_allowance_percentange: transport_allowance_percentange,
							medical_allowance_percentange: medical_allowance_percentange,
							house_rent_allowance_percentange: house_rent_allowance_percentange,
							phone_bill_allowance_percentange: phone_bill_allowance_percentange,
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				
				//alert(response);
			
			}

		});
	
	});	
	
	function form_validation()
	{
		//alert("validation");
		if($('#late_allowed').val().trim() == "")
		{
			alert("Please Insert Late Allowed Times");
			$('#late_allowed').focus();
			return false;
		}	
		else if($('#early_out_allowed').val().trim() == "")
		{
			alert("Please Insert Early Out Allowed Times");
			$('#early_out_allowed').focus();
			return false;
		}		
		else if($('#night_allowance_amount').val().trim() == "")
		{
			alert("Please Insert Night Allowance Amount");
			$('#night_allowance_amount').focus();
			return false;
		}
		else if($('#allowed_attendence_bonus_leave_limit').val().trim() == "")
		{
			alert("Please Insert Attendence Bonus Leave Limit");
			$('#allowed_attendence_bonus_leave_limit').focus();
			return false;
		}		
		else if($('#over_time_rate').val().trim() == "")
		{
			alert("Please Insert Over Time Rate");
			$('#over_time_rate').focus();
			return false;
		}	
		else if($('#attendence_bonus_amount').val().trim() == "")
		{
			alert("Please Insert Attendence Bonus Amount");
			$('#attendence_bonus_amount').focus();
			return false;
		}		
		else if($('#transport_allowance_percentange').val().trim() == "")
		{
			alert("Please Insert Transport Allowance Percentage");
			$('#transport_allowance_percentange').focus();
			return false;
		}	
		else if($('#medical_allowance_percentange').val().trim() == "")
		{
			alert("Please Insert Transport Allowance Percentage");
			$('#medical_allowance_percentange').focus();
			return false;
		}		
		else if($('#house_rent_allowance_percentange').val().trim() == "")
		{
			alert("Please Insert House Rent Allowance Percentage");
			$('#house_rent_allowance_percentange').focus();
			return false;
		}
		else if($('#phone_bill_allowance_percentange').val().trim() == "")
		{
			alert("Please Insert Phone Bill Allowance Percentage");
			$('#phone_bill_allowance_percentange').focus();
			return false;
		}
	
		return true;
		}
		
	   $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	   $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
</script>

	
