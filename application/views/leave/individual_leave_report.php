
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;">
			<div class="panel-heading" align="center">Leave Report Form</div>
            <div class="table-responsive" id="custom-table">
			 <form name="show_report" action="<?php echo base_url();?>leave/show_individual_leave_report" target="_blank" method="post">
                <table id="" class="table ">
                    <tbody>
					
					<tr>
                           
                           <td></td>       
					   <th align="center">Employee Name</th>
						<td width="30%"><select name="employee_id" class="form-control  custom-input" id="employee_id">
								<option value="">select</option>
									<?php foreach($all_employee as $each_employee){?>
										 <option value="<?php echo $each_employee->employee_id?>"><?php echo $each_employee->first_name.' '.$each_employee->last_name?></option>
									<?php }?>
										</select>
						</td>  
			

                						
					
                                              

					

                    </tr> 		
					
						
					<tr>
                         <td></td><td></td><td></td><td></td>
                       <td><button type="submit" id="" class="btn btn-info pull-right">Generate Report</button></td>   
					 					   
					  
                    </tr>	
					</tbody>
					</form>
					</table>

            </div>
           
        </div>
      
    </div>
    </div>
<!-- Page Content -->

		
<script type="text/javascript">
	$(document).ready(function() {
		
		
			
			//if($('#chk_to_date').checked == true)
				
			$("#chk_to_date").change(function(){
if(document.getElementById('chk_to_date').checked) {
	//alert("checked");
	$('#to_date').attr('type', 'text');
	$('#chk_to_date').attr('value', 1);
} else {
   $('#chk_to_date').attr('value', 0);
}
	});

			
		    //$('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
			$('.monthYear').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'mm-yy',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
    });
			//$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
			
		
		

	});
	
	
</script>
	
	


