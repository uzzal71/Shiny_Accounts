
    <br><br>
    <div class="row">
		<div class="col-md-8 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Salary Disburse Form</div>
            <div class="table-responsive" id="custom-table">
			<form action="<?php echo base_url();?>Attendence/view_salary_disburse"  method="POST" >
                <table id="" class="table ">
                    <tbody>

			
				
                    	<tr>
                    		<td></td>
                       <th align="center">Month</th>
					   <style>
						.ui-datepicker-calendar 
						{
							display: none;
						}
						</style>
                       <td align="center"><input type="text" name="month" value="" id="month" class="form-control custom-input monthYear" required></td>
                       <td></td>
                   

					</tr> 	
	
						
					<tr>
                       <td></td>
                       <td></td>
                       <td align="pull-left"><button type="submit" id="submit" class="btn btn-info pull-left">Submit</button></td>                        
					  
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

		$("#submit").click(function(){
			
			//alert("Button Clicked");
			if(form_validation())
			{
				
			
				var month_year = $('#month').val().trim().split('-');
				var month = month_year[0];
				var year = month_year[1];
				
				//alert(month_year);

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Attendence/view_salary_disburse',
					data:{ 
							
							month: month,
							year: year
							
						},
					//timeout: 4000,
					success: function(result) {
						//alert(result);
						//window.location.href = "<?php echo base_url();?>Attendence/salary_preview";
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

	
