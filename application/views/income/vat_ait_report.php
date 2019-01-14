
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;">
			<div class="panel-heading" align = "center">VAT AIT Report Form</div>
            <div class="table-responsive" id="custom-table">
			 <form name="show_report" action="<?php echo base_url();?>income/show_vat_ait_report" target ="_blank" method="post">
                <table id="" class="table ">
                    <tbody>						
					<tr>
                                           
					   <th align="center">From Date</th>
					   <td align="center"><input type="text" name="from_date"  id="from_date" class="form-control custom-input dateFrom"></td>     

				    <th align="center">To Date</th>
                      <td align="center"><input type="text" name="to_date"  id="to_date" class="form-control custom-input dateFrom" ></td> 	

                    </tr> 		
					<tr>
                                           
					   <th align="center">Project Name</th>
					   <td align="center">
					   	<select class="form-control custom-input" name="project_id" id="project_id">
					   		<option value="select">Select</option>
					   		<?php  foreach ($project_data as $project) { ?>
					   			 <option value="<?php echo$project->project_id ?>"><?php echo $project->project_name.'-'.$project->customer_name; ?></option>
					   	<?php	} ?>

					   	</select>
					   </td>     

			<th align="center">Income ID</th>
				   <td align="center">
					   	<select class="form-control custom-input" name="income_id" id="income_id">
					   		<option value="select">Select</option>
					   		<?php  foreach ($income_data as $income) { ?>
					   			 <option value="<?php echo$income->income_id ?>"><?php echo $income->income_id; ?></option>
					   	<?php	} ?>

					   	</select>
					   </td>

                    </tr>
						
					<tr>
                       <td></td><td></td><td></td>
                       <td> <button type="submit" id="" class="btn btn-info pull-right">Generate Report</button></td>   
					   <td></td>					   
					  
                    </tr>	
					</tbody>
					</form>
					</table>

            </div>
           
        </div>
      
    </div>
    </div>

		
<script type="text/javascript">
	$(document).ready(function() {
	
	$("#project_id").select2();	
	$("#income_id").select2();	
		
$(document).on('change', '#all_department', function(){
    if($(this).prop('checked')){
        $('#department_name').attr('disabled', 'disabled');
		$('#all_department').attr('value', 1);
    } else {
        $('#department_name').removeAttr('disabled');
    }
});



			
	$("#chk_to_date").change(function(){
if(document.getElementById('chk_to_date').checked) {
	//alert("checked");
	$('#to_date').attr('type', 'text');
	$('#to_date').removeAttr('disabled');
	$('#chk_to_date').attr('value', 1);
} else {
   $('#chk_to_date').attr('value', 0);
    $('#to_date').attr('disabled', 'disabled');
}
	});

			
		    $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
			$('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
			$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
			
		
		

	});
	
	
	
</script>