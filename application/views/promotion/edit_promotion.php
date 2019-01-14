
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">

		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">

			<div class="panel-heading">Enter Promotion</div>
            <div class="table-responsive" id="custom-table">
                <table id="" class="table">
				<tbody>
                    <tr>	<td></td>
                        <th align="center">Employee ID</th>
                       <td align="center" width="30%"><input type="text" name="employee_id" id="employee_id" value="<?php echo $each_promotion->employee_id?>" class="form-control custom-input"  readonly required></td>
                       <td><input type="hidden" name="id" id="id" value="<?php echo $each_promotion->id?>" class="form-control custom-input" required></td>
					   
                       
						
                    </tr>

		
					<tr>
		<th> Employee Name :</th>
		<td colspan="3"><input type="text" name="employee_name" id="employee_name" value="<?php echo $each_promotion->employee_name?>"class="form-control custom-input" readonly></td>
		
		</tr>
		
		<tr>
		<th> Designation:</th>
		<td> <input type="text" name="designation" id="designation" value="<?php echo $each_promotion->designation?>" class="form-control custom-input" readonly></td>
		
		<th>Promoted Designation:</th>
		<td align="center"style="width:30%" >                           
			<select name="promoted_designation" class="form-control col-sm-6 custom-input" id="promoted_designation">
					<option value="select">Select</option>
						<?php foreach($all_designation as $each_designation){?>
					<option <?php if($each_designation->designation_name == $each_promotion->promoted_designation){echo 'selected = "selected"';}?>value="<?php echo $each_designation->designation_name?>">
							<?php echo $each_designation->designation_name?>
					</option>
							
						<?php }?>
            </select>
		</td>
	
		</tr>
		<tr>
		<!-- <th> Salary:</th>
		<td> <input type="text" name="basic_salary" id="basic_salary" value="<?php echo $each_promotion->basic_salary?> "class="form-control custom-input" readonly></td>
		
		<th> Incrimented Salary:</th>
		<td><input type="text" name="incremented_salary" id="incremented_salary" value="<?php echo $each_promotion->incremented_salary?>"class="form-control custom-input" required></td>
 -->
		</tr>
		<tr>
		<th> Effective From :</th>
		 <td align="center" ><input type="text" name="effective_from_date" id="effective_from_date" value="<?php echo $each_promotion->effective_from_date?>" id="effective_from_date" class =" form-control custom-input dateFrom " required></td>
		<td></td> <td></td>
		</tr>	
		<tr>
		 <td align="center" colspan=""><input type="button" value="Update Promotion" class="btn btn-primary" id="btn_update_promotion"></td>
		 <td></td> <td></td> <td></td>
		</tr>
				
					</tbody>
				</table>
				</form>
			
            </div>
           
        </div>
        <div class="col-md-1"></div>
    </div>
	
	
		
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_update_promotion").click(function(){
								
				//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				
				var id = $('#id').val().trim();
				var employee_id = $('#employee_id').val().trim();
				var employee_name = $('#employee_name').val().trim();
				var designation = $('#designation').val().trim();
				var promoted_designation = $('#promoted_designation').val().trim();
				var basic_salary = $('#basic_salary').val().trim();
				var incremented_salary = $('#incremented_salary').val().trim();
				var effective_from_date = $('#effective_from_date').val().trim();

				
				//alert("variable assigned");
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>promotion/update_promotion',
					data:{ 
							id: id,
							employee_id: employee_id,
							employee_name: employee_name,
							designation: designation,
							promoted_designation: promoted_designation,
							basic_salary: basic_salary,
							incremented_salary: incremented_salary,
							effective_from_date: effective_from_date
						
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
	
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#promoted_designation').val().trim() == "")
		{
			alert("Please Insert Promoted designation");
			$('#promoted_designation').focus();
			return false;
		}		
		else if($('#incremented_salary').val().trim() == "")
		{
			alert("Please Insert Incremented Salary");
			$('#incremented_salary').focus();
			return false;
		}		

		else if($('#effective_from_date').val().trim() == "")
		{
			alert("Please Insert Effective from Date.");
			$('#effective_from_date').focus();
			return false;
		}			
		

		return true;
	}
	
		//  ======  ######  For Selecting Date Time and DateTime  ######  ======

        $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
        $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
		$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
		});
</script>



