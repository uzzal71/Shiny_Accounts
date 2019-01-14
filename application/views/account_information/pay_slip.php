
    <br><br>
    <div class="row">
		<div class="col-md-8 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;">
			<div class="panel-heading">Salary Disburse Form</div>
            <div class="table-responsive" id="custom-table">
			<form action="<?php echo base_url();?>Account_information/view_pay_slip"  method="POST" >
                <table id="" class="table ">
                    <tbody>

			
				
                    	<tr>
                  
                       <th align="center">Month</th>
					   <style>
						.ui-datepicker-calendar 
						{
							display: none;
						}
						</style>
                       <td align="center"><input type="text" name="pay_month" value="" id="month" class="form-control custom-input monthYear" required></td>
                    <th align="center">Employee Name</th>
                    <td>
                    	
                    	<select name="employee_id" id="employee_id" class="form-control custom-input">
                    		
                    		<option value="select">Select</option>
                    		<?php  foreach ($all_employee as  $employee) { ?>

                    			<option value="<?php echo $employee->employee_id;?>"><?php echo $employee->first_name.' '.$employee->last_name;?></option>
                    		
                    	<?php 	} ?>

                    	</select>

                    </td>
                   

					</tr> 	
	
						
					<tr>
                       <td></td>
                       <td></td>
                        <td></td>

                       <td align="pull-right"><button type="submit" id="submit" class="btn btn-info pull-right">Submit</button></td>                        
					  
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
	
	$('#employee_id').select2();

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

	
