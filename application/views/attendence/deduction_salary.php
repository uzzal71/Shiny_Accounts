
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">

		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Deduction Salary</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
					<tr>
                       <th align="center">Employee ID</th>
                       <td width="30%">                   
							<select required name="employee_id" class="form-control col-sm-6 custom-input" id="employee_id">
									<option value="select">Select Employee ID</option>
									<?php if($all_employee) {foreach($all_employee as $each_employee){?>
									<option value="<?php echo $each_employee->employee_id;?>"><?php echo $each_employee->employee_id?></option>
									<?php }}?>
							</select>
					   </td width="30%">
					   <th align="center">Deduction Name</th>
                       <td align="center">
							<input type="text" id="deduction_name" name="deduction_name" class="form-control custom-input" required>	
					   </td>	
                    </tr>  			
					<tr>
					   <th align="center">Amount</th>
                       <td align="center">
						<input type="text" id="amount" name="amount" class="form-control custom-input" required>
					   </td>
					   
                       <th align="center">Deduction Month</th>
					   <style>
						.ui-datepicker-calendar 
						{
							display: none;
						}
						</style>
                       <td align="center"style="width:30%"><input type="text" name="deduction_month" value="" id="deduction_month" class="form-control custom-input monthYear" required></td>					   
						 

                    </tr>  					

			</div>

					<tr>
                        <th></th> <th></th> <th></th>
                       <td font-size="24"><input type=""id="btn_salary_deduction" class="btn btn-success" value="Add Salary Deduction"/></td>                      
					  
                    </tr>					
           

					</tbody>
					
					</table>
					</form>
            </div>
           
        </div>
      
    </div>
    </div>


<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_salary_deduction").click(function(){
			if(form_validation())
			{
				//alert("validation true");
				
				var employee_id		 = $('#employee_id').val().trim();
				var deduction_name		 = $('#deduction_name').val().trim();
				var amount		 = $('#amount').val().trim();
				var deduction_month		 = $('#deduction_month').val().trim();

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url()?>Attendence/save_deduction_salary',
					data:{ 
							employee_id: employee_id,
							deduction_name: deduction_name,
							amount: amount,
							deduction_month: deduction_month
						
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
	
		$('.monthYear').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy-mm',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
    });
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#employee_id').val().trim() == "select")
		{
			alert("Please Select Employee ID");
			$('#employee_id').focus();
			return false;
		}			
		else if($('#deduction_name').val().trim() == "")
		{
			alert("Please Insert Deduction Name");
			$('#deduction_name').focus();
			return false;
		}		
		else if($('#amount').val().trim() == "")
		{
			alert("Please Insert Amount");
			$('#amount').focus();
			return false;
		}				
		else if($('#deduction_month').val().trim() == "")
		{
			alert("Please Insert Deduction Month");
			$('#deduction_month').focus();
			return false;
		}		
		
		return true;
	}
	
		//  ======  ######  For Selecting Date Time and DateTime  ######  ======

        $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
        $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
		$('.month').datepicker({ dateFormat:'yy-mm' });
		$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
		});
</script>
