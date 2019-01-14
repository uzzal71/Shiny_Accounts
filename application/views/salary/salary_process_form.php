
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
					   <td align="center"style="width:30%"><input type="text" name="company_name" value="<?php echo $company_info->full_name?>" id="company_name" class="form-control custom-input" required></td>  
                    </tr> 			
					<tr>
                       <th align="center">Date From</th>
                       <td align="center"style="width:30%"><input type="text" name="date_from" value="" id="date_from" class="form-control custom-input dateFrom" required></td>                        
					   <th align="center">Date To</th>
					   <td align="center"style="width:30%"><input type="text" name="date_to" value="" id="date_to" class="form-control custom-input dateFrom" required></td>  


                    </tr> 		
	
					<tr>
                    
					   <th align="center">Employee IDs</th>
					   <td align="center"style="width:30%"><input type="text" name="employee_ids" value="" id="employee_ids" class="form-control custom-input"></td>  


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
				var date_from = $('#date_from').val().trim();
				var date_to = $('#date_to').val().trim();
				var employee_ids = $('#employee_ids').val().trim();
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>salary/process_salary',
					data:{ 
							company_id: company_id,
							company_name: company_name,
							date_from: date_from,
							date_to: date_to,
							employee_ids: employee_ids
						
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

	
