
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 550px;overflow: scroll">
			<div class="panel-heading" align = "center">Employee Allowance Setup Form</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
						<tr>
							<td></td>
							<th align="center">Employee ID</th>
							<td align="center"style="width:30%">                           
							<select required name="employee_id" class="form-control col-sm-6 custom-input" id="employee_id">
								<option value="select">Select</option>
								<?php foreach($all_employee as $each_employee){?>
								<option  value="<?php echo $each_employee->employee_id?>"><?php echo $each_employee->employee_id?></option>
								<?php }?>
							</select>
							</td> 
						
						</tr> 
						
						<tr>
						   <th align="center">Basic Salary (Taka)</th>
						   <td align="center"style="width:30%"><input type="text" name="basic_salary" value = "0" id="basic_salary" class="form-control custom-input" required></td>                          
						   <th align="center">Gross Salary</th>
						   <td align="center"style="width:30%"><input type="text" name="gross_salary" id="gross_salary" class="form-control custom-input" readonly></td>   	
						</tr> 		
						
						
	
						<tr>
						<th align="center">Transport Allowance (Taka)</th>
						   <td align="center"style="width:30%"><input type="checkbox" name="is_transport_allowance" " id="is_transport_allowance" class="form-control custom-input is_transport_allowance"></td> 
						<th align="center">Transport Allowance Amount</th>
						   <td align="center"style="width:30%"><input type="text" name="transport_allowance_amount" value = "0" disabled="disabled"  id="transport_allowance_amount" class="form-control custom-input"></td>
						</tr>					
						<tr>			
		
						<tr>
						<th align="center">Medical Allowance (Taka)</th>
						   <td align="center"style="width:30%"><input type="checkbox" name="is_medical_allowance"   id="is_medical_allowance" class="form-control custom-input is_medical_allowance"></td> 
						<th align="center">Medical Allowance Amount</th>
						   <td align="center"style="width:30%"><input type="text" name="medical_allowance_amount" value = "0"  disabled="disabled"  id="medical_allowance_amount" class="form-control custom-input"></td>
						</tr>					
						<tr>		
		
						<tr>
						<th align="center">House Rent Allowance (Taka)</th>
						   <td align="center"style="width:30%"><input type="checkbox" name="is_house_rent_allowance"   id="is_house_rent_allowance" class="form-control custom-input is_house_rent_allowance"></td> 
						<th align="center">House Rent Allowance Amount</th>
						   <td align="center"style="width:30%"><input type="text" name="house_rent_allowance_amount" value = "0" disabled="disabled"  id="house_rent_allowance_amount" class="form-control custom-input"></td>
						</tr>					
		
						<tr>
						<th align="center">Phone Bill Allowance (Taka)</th>
						   <td align="center"style="width:30%"><input type="checkbox" name="is_phone_bill_allowance"   id="is_phone_bill_allowance" class="form-control custom-input is_phone_bill_allowance"></td> 
						<th align="center">Phone Bill Allowance Amount</th>
						   <td align="center"style="width:30%"><input type="text" name="phone_bill_allowance_amount" disabled="disabled" value = "0" id="phone_bill_allowance_amount" class="form-control custom-input"></td>
						</tr>				
						<tr>
						<th align="center">Attendance Bonus (Taka)</th>
						   <td align="center"style="width:30%"><input type="checkbox" name="is_attendence_bonus"  id="is_attendence_bonus" class="form-control custom-input is_attendence_bonus"></td> 
						<th align="center">Attendance Bonus Amount</th>
						   <td align="center"style="width:30%"><input type="text" name="attendence_bonus_amount" disabled="disabled" value = "0"  id="attendence_bonus_amount" class="form-control custom-input"></td>
						</tr>					
						
						<tr> 
						   <td><button type="submit" id="btn_salary_setup" class="btn btn-info pull-right">Employee Allowance Setup</button></td>   
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
				//alert("validation true");
				var employee_id = $('#employee_id').val().trim();
				var basic_salary = $('#basic_salary').val().trim();
				var gross_salary = $('#gross_salary').val().trim();
				var is_transport_allowance = $('#is_transport_allowance').val().trim();
				var transport_allowance_amount = $('#transport_allowance_amount').val().trim();
				var is_medical_allowance = $('#is_medical_allowance').val().trim();
				var medical_allowance_amount = $('#medical_allowance_amount').val().trim();
				var is_house_rent_allowance = $('#is_house_rent_allowance').val().trim();
				var house_rent_allowance_amount = $('#house_rent_allowance_amount').val().trim();
				var is_phone_bill_allowance = $('#is_phone_bill_allowance').val().trim();
				var phone_bill_allowance_amount = $('#phone_bill_allowance_amount').val().trim();	
				var is_attendence_bonus = $('#is_attendence_bonus').val().trim();
				var attendence_bonus_amount = $('#attendence_bonus_amount').val().trim();
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Attendence/save_employee_allowance',
					data:{
							employee_id: employee_id,
							basic_salary: basic_salary,
							gross_salary: gross_salary,
							is_transport_allowance: is_transport_allowance,
							transport_allowance_amount: transport_allowance_amount,
							is_medical_allowance: is_medical_allowance,
							medical_allowance_amount: medical_allowance_amount,
							is_house_rent_allowance: is_house_rent_allowance,
							house_rent_allowance_amount: house_rent_allowance_amount,
							is_phone_bill_allowance: is_phone_bill_allowance,
							phone_bill_allowance_amount: phone_bill_allowance_amount,
							is_attendence_bonus: is_attendence_bonus,
							attendence_bonus_amount: attendence_bonus_amount
						
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

		/*

		$("#employee_id").change(function(){

			var employee_id = $('#employee_id').val().trim();
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Attendence/pick_employee_basic_salary',
					data:{
							'employee_id' : employee_id
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						$('#basic_salary').val(response);
						calculate_gross_salary();

					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				});
				
		*/
		
			$("#basic_salary").change(function(){
				$('.is_transport_allowance').prop('checked', true);
				$('#is_transport_allowance').val(1);
				$( "#transport_allowance_amount" ).prop( "disabled", false );
				var transport_allowance_percentange = <?php echo $salary_setup_info->transport_allowance_percentange?>;
				var basic_salary = $('#basic_salary').val().trim();
				var transport_allowance_amount = (basic_salary * transport_allowance_percentange)/100;
				$('#transport_allowance_amount').val(transport_allowance_amount);
				
				$('.is_medical_allowance').prop('checked', true);
				$('#is_medical_allowance').val(1);
				$( "#medical_allowance_amount" ).prop( "disabled", false );
				var medical_allowance_percentange = <?php echo $salary_setup_info->medical_allowance_percentange?>;
				var basic_salary = $('#basic_salary').val().trim();
				var medical_allowance_amount = (basic_salary * medical_allowance_percentange)/100;
				$('#medical_allowance_amount').val(medical_allowance_amount);
				
				$('.is_house_rent_allowance').prop('checked', true);
				$('#is_house_rent_allowance').val(1);
				$( "#house_rent_allowance_amount" ).prop( "disabled", false );
				var house_rent_allowance_percentange = <?php echo $salary_setup_info->house_rent_allowance_percentange?>;
				var basic_salary = $('#basic_salary').val().trim();
				var house_rent_allowance_amount = (basic_salary * house_rent_allowance_percentange)/100;
				$('#house_rent_allowance_amount').val(house_rent_allowance_amount);	
				
				$('.is_phone_bill_allowance').prop('checked', true);
				$('#is_phone_bill_allowance').val(1);
				$( "#phone_bill_allowance_amount" ).prop( "disabled", false );
				var phone_bill_allowance_percentange = <?php echo $salary_setup_info->phone_bill_allowance_percentange?>;
				var basic_salary = $('#basic_salary').val().trim();
				var phone_bill_allowance_amount = (basic_salary * phone_bill_allowance_percentange)/100;
				$('#phone_bill_allowance_amount').val(phone_bill_allowance_amount);	
				
				$('.is_attendence_bonus').prop('checked', true);
				$('#is_attendence_bonus').val(1);
				$( "#attendence_bonus_amount" ).prop( "disabled", false );
				var attendence_bonus_amount = <?php echo $salary_setup_info->attendence_bonus_amount?>;
				$('#attendence_bonus_amount').val(attendence_bonus_amount);
				
				calculate_gross_salary();
		});		

		$("#is_transport_allowance").change(function(){
			if(document.getElementById('is_transport_allowance').checked) {
				$('#is_transport_allowance').val(1);
				$( "#transport_allowance_amount" ).prop( "disabled", false );
				var transport_allowance_percentange = <?php echo $salary_setup_info->transport_allowance_percentange?>;
				var basic_salary = $('#basic_salary').val().trim();
				var transport_allowance_amount = (basic_salary * transport_allowance_percentange)/100;
				$('#transport_allowance_amount').val(transport_allowance_amount);
				
			    calculate_gross_salary();
				
			} 					
			else{
				$('#is_transport_allowance').val(0);
				$( "#transport_allowance_amount" ).prop( "disabled", true );
				$('#transport_allowance_amount').val("0");
				calculate_gross_salary();
			}
		});
		
		$("#is_medical_allowance").change(function(){
			if(document.getElementById('is_medical_allowance').checked) {
			$('#is_medical_allowance').val(1);
			$( "#medical_allowance_amount" ).prop( "disabled", false );
			var medical_allowance_percentange = <?php echo $salary_setup_info->medical_allowance_percentange?>;
			var basic_salary = $('#basic_salary').val().trim();
			var medical_allowance_amount = (basic_salary * medical_allowance_percentange)/100;
			$('#medical_allowance_amount').val(medical_allowance_amount);
			calculate_gross_salary();
				
			} 					
			else{
				$('#is_medical_allowance').val(0);
				$( "#medical_allowance_amount" ).prop( "disabled", true );
				$('#medical_allowance_amount').val("0");
				calculate_gross_salary();
			}
		});
		
		
		$("#is_house_rent_allowance").change(function(){
			if(document.getElementById('is_house_rent_allowance').checked) {
				$('#is_house_rent_allowance').val(1);
				$( "#house_rent_allowance_amount" ).prop( "disabled", false );
				var house_rent_allowance_percentange = <?php echo $salary_setup_info->house_rent_allowance_percentange?>;
				var basic_salary = $('#basic_salary').val().trim();
				var house_rent_allowance_amount = (basic_salary * house_rent_allowance_percentange)/100;
				$('#house_rent_allowance_amount').val(house_rent_allowance_amount);	
				calculate_gross_salary();				
				
			} 					
			else{
				$('#is_house_rent_allowance').val(0);
				$( "#house_rent_allowance_amount" ).prop( "disabled", true );
				$('#house_rent_allowance_amount').val("0");
				calculate_gross_salary();
			}
		});
	
		$("#is_phone_bill_allowance").change(function(){
			if(document.getElementById('is_phone_bill_allowance').checked) {
				$('#is_phone_bill_allowance').val(1);
				$( "#phone_bill_allowance_amount" ).prop( "disabled", false );
					
				var phone_bill_allowance_percentange = <?php echo $salary_setup_info->phone_bill_allowance_percentange?>;
				var basic_salary = $('#basic_salary').val().trim();
				var phone_bill_allowance_amount = (basic_salary * phone_bill_allowance_percentange)/100;
				$('#phone_bill_allowance_amount').val(phone_bill_allowance_amount);	
				calculate_gross_salary();
				
			} 					
			else{
				$('#is_phone_bill_allowance').val(0);
				$( "#phone_bill_allowance_amount" ).prop( "disabled", true );
				$('#phone_bill_allowance_amount').val("0");
				calculate_gross_salary();
			}
		});		
		
		$("#is_attendence_bonus").change(function(){
			if(document.getElementById('is_attendence_bonus').checked) {
				$('#is_attendence_bonus').val(1);
				$( "#attendence_bonus_amount" ).prop( "disabled", false );
				var attendence_bonus_amount = <?php echo $salary_setup_info->attendence_bonus_amount?>;
				$('#attendence_bonus_amount').val(attendence_bonus_amount);
				calculate_gross_salary();				
				
			} 					
			else{
				$('#is_attendence_bonus').val(0);
				$( "#attendence_bonus_amount" ).prop( "disabled", true );
				$('#attendence_bonus_amount').val("0");
				calculate_gross_salary();
			}
		});
		
		
		
		

		
	});	
	
	function calculate_gross_salary()
	{
		var basic_salary = $('#basic_salary').val().trim();
		var attendence_bonus_amount = $('#attendence_bonus_amount').val().trim();
		var phone_bill_allowance_amount = $('#phone_bill_allowance_amount').val().trim();
		var house_rent_allowance_amount = $('#house_rent_allowance_amount').val().trim();
		var medical_allowance_amount = $('#medical_allowance_amount').val().trim();
		var transport_allowance_amount = $('#transport_allowance_amount').val().trim();
		var gross_salary = parseFloat(basic_salary, 10) + parseFloat(transport_allowance_amount, 10) + parseFloat(house_rent_allowance_amount, 10) + parseFloat(phone_bill_allowance_amount, 10) + parseFloat(medical_allowance_amount, 10) + parseFloat(attendence_bonus_amount, 10);
	    $('#gross_salary').val(gross_salary);
	}
	
	function form_validation()
	{
		
		//alert("validation");
		
		if($('#employee_id').val().trim() == "select")
		{
			alert("Please Select Employee ID");
			$('#employee_id').focus();
			return false;
		}
		else if($('#basic_salary').val().trim() == "")
		{
			alert("Please Insert Basic Salary");
			$('#basic_salary').focus();
			return false;
		}
		return true;
		}
	   $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	   $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
</script>