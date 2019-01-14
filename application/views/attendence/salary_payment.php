
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">

		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Salary Payment</div>
            <div class="table-responsive" id="custom-table">
				<form enctype="multipart/form-data" id="submit" action="<?php echo base_url();?>employee/save_employee" method="post">
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
                       <td align="center" style="width:30%"><input type="text" name="month" value="" id="month" class="form-control custom-input monthYear" required></td>	


                       <th align="center">Employee ID</th>
                       <td width="30%">                   
					   <select id="employee_id" name="employee_id" class="form-control custom-input">
					   	
					   	<option value="select">Select Employee ID</option>
					   	<?php foreach ($all_employee as $each_employee) { ?>
					   		
					   		<option value="<?php echo $each_employee->employee_id ?>" ><?php echo $each_employee->employee_name;?></option>

					   <?php 	}  ?>

					   </select>

					   </td width="30%">  

					   				   
					  
                    </tr>  			
					
					
					<tr>
                        <th></th> <th></th>
                      
                        <td font-size="24"><input type="" id="cancel" class="btn btn-warning" value="Cancel"/>
                       <td font-size="24"><input type="" id="show" class="btn btn-success" value="View Salary Details"/>
                       </td>
                       </td>                      
					  
                    </tr>					
           

					</tbody>
					
					</table>
					</form>
            </div>
           
        </div>
      
    </div>
    </div>
	
	<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center" style="color:#010047 ">Salary Payment</h4>
      </div>
      <div class="modal-body">

        <table border="0">
                <tr>
            <td align="right">Employee Name:</td><td><input type="text" id="employee_name" style="border: 0;color: #010047" readonly></td>
            <td  align="right">Employee ID:</td><td><input input type="text" id="employee_ids" style="border: 0;color: #010047" readonly></td>
                </tr>
                     <tr>
            <td align="right">Total Payable:</td><td><input type="text" id="total_payable" style="border: 0;color: #010047" readonly></td>
            <td  align="right">Current Salary:</td><td><input input type="text" id="current_salary" style="border: 0;color: #010047" readonly></td>
                </tr>
                <tr>
                	  <td  align="right">Actual Payment:</td><td><input input type="number" id="actual_payment" style="border: 1;color: #010047"></td>
                 <td  align="right">Pay Type:</td><td>
                 <select id="type">
                 	<option value="bank">Bank</option>
                 	<option value="cash">Cash</option>
                 </select>	
                 </td>
            
                </tr>
         

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="pay">Pay</button>
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

		$("#show").click(function(){
								
				//alert("Button Clicked");
			
			
			
				
				var employee_id = $('#employee_id').val();
				
				var month_year = $('#month').val().trim().split('-');
				var month = month_year[0];
				var year = month_year[1];
				
				
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Attendence/view_employee_salary_info',
					data:{ 
							employee_id: employee_id,
							month: month,
							year:year		
						},
					//timeout: 4000,
					success: function(result) {
						

						 var info = result.split("#");

						 var employee_name = info[0].trim();
						 var total_payable = info[1].trim();
						 var current_salary = info[2].trim();
						$('#employee_ids').val(employee_id);
						$('#employee_name').val(employee_name);
						$('#total_payable').val(total_payable);
						$('#current_salary').val(current_salary);
						$('#myModal').modal('show');
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				//alert(response);
			
			

	});
	
			$("#pay").click(function(){

						var employee_id = $('#employee_ids').val();
				
				var month_year = $('#month').val().trim().split('-');
				var month = month_year[0];
				var year = month_year[1];
				var	 employee_id		=$('#employee_ids').val().trim();
				var total_payable	=$('#total_payable').val().trim();
				var actual_payment		=$('#actual_payment').val().trim();
				var type		=$('#type').val().trim();
				
				
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Attendence/save_salary_payment',
					data:{ 
							employee_id: employee_id,
							month:month,
							year:year,
							total_payable:total_payable,
							type:type,
							actual_payment:actual_payment

						},
					//timeout: 4000,
					success: function(result) {
				

					alert(result);	
					location.reload();	

		
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
			
			});	
			
			$("#date_time_from").change(function(){
					var date_time_from = $('#date_time_from').val().trim();
					day_calculation();
			});			
			$("#date_time_to").change(function(){
					var date_time_to = $('#date_time_to').val().trim();
					day_calculation();
			});
			
			
			
	function day_calculation()
	{
		var start = new Date($('#date_time_from').val());
		var end = new Date($('#date_time_to').val());
		// end - start returns difference in milliseconds 
		
		var diff  = new Date(end - start);
		var days  = diff/1000/60/60/24;
		// get days
		$('#no_of_days').val(days+1);
		if($('#date_time_to').val()==''){
			$('#no_of_days').val(1);
		}					
		
		if($('#date_time_from').val()!= $('#date_time_to').val() ){
			$('#half_full_day').val('full_day');
		}
		if(days<0){
			alert("To date must be Greater Than From Date!");
			$('#date_time_to').focus();
			return false;
		}

	}
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#date_time_from').val().trim() == "")
		{
			alert("Please Insert Date Time From");
			$('#date_time_from').focus();
			return false;
		}		

		else if($('#half_full_day').val().trim() == "select")
		{
			alert("Please Select Full/Half Day Type.");
			$('#half_full_day').focus();
			return false;
		}			
		else if($('#no_of_days').val().trim() == "")
		{
			alert("Please Insert No of Days.");
			$('#no_of_days').focus();
			return false;
		}	
		else if($('#leave_types').val().trim() == "select")
		{
			alert("Please Select Leave Types");
			$('#leave_types').focus();
			return false;
		}			
		else if($('#remarks').val().trim() == "")
		{
			alert("Please Insert Remarks.");
			$('#remarks').focus();
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
