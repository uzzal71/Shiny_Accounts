
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Salary Process Form</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>

			
					<tr>           

					<tr>
                       <th align="center">Company ID</th>
                       <td align="center"style="width:30%"><input type="text" name="company_id" value="<?php echo $this->session->userdata('company_id');?>" id="company_id" class="form-control custom-input" readonly required></td>                        
					   <th align="center">Company Name</th>
					   <td align="center"style="width:30%"><input type="text" name="company_name" value="<?php echo $company_info->full_name?>" id="company_name" class="form-control custom-input"readonly required></td>  
                    </tr> 			
					<tr>
					   <th align="center">All Employee</th>
					   <td align="center"style="width:30%"><input type="checkbox" name="all_employee" value="" id="all_employee" class="form-control custom-input" required></td>                        
					   <th align="center">Employee IDs</th>
					   <td align="center"style="width:30%">
							<select required name="employee_ids" class="form-control col-sm-6 custom-input" id="employee_ids">
								<option value="">Select</option>
								<?php foreach($all_employee as $each_employee){?>
								<option value="<?php echo $each_employee->employee_id?>"><?php echo $each_employee->employee_id?></option>
								<?php }?>
							</select>
					   </td>  
					</tr> 	
					<tr>

                       <th align="center">Month</th>
					   <style>
						.ui-datepicker-calendar 
						{
							display: none;
						}
						</style>
                       <td align="center" style="width:30%"><input type="text" name="month" value="" id="month" class="form-control custom-input monthYear" required></td>
					</tr> 	
	
						
					<tr>
                       
                       <td><button type="submit" id="btn_process_salary" class="btn btn-info pull-right">Process Salary</button></td>                        
					  
                    </tr>					
           

					</tbody>
					
					</table>

            </div>
           
        </div>
      
    </div>
    </div>

	
<script type="text/javascript">
	$(document).ready(function() {

		$("#btn_process_salary").click(function(){
			
			//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				
				var company_id = $('#company_id').val().trim();
				var company_name = $('#company_name').val().trim();
				var month_year = $('#month').val().trim().split('-');
				var month = month_year[0];
				var year = month_year[1];
				var employee_ids = $('#employee_ids').val().trim();
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Attendence/process_salary_preview',
					data:{ 
							company_id: company_id,
							company_name: company_name,
							month: month,
							year: year,
							employee_ids: employee_ids
						},
					//timeout: 4000,
					success: function(result) {
						//alert(result);
						window.location.href = "<?php echo base_url();?>Attendence/salary_preview";
						//$( "#a" ).load( "<?php echo base_url();?>application/views/Attendence/salary_preview.php" );
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
		
		$('.monthYear').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'mm-yy',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
    });

	
	});
	
	function form_validation()
	{
		
		//alert("validation");
		
		if($('#month').val().trim() == "")
		{
			alert("Please Insert Month Year");
			$('#month').focus();
			return false;
		}

		return true;
		}
	

	   $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	   $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
	   $('.month').datepicker({ dateFormat:'mm-yy' });
</script>

	
