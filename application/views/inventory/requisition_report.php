
    <br><br>
    <div class="row">
		<div class="col-md-9 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Requisiton Report</div>
            <div class="table-responsive" id="custom-table">
			 <form name="show_report" autocomplete="off" action="<?php echo base_url();?>Inventory/show_requisition_report" target="_blank" method="post">
                <table id="" class="table ">
                    <tbody>
					
					<tr>
                                     
					   <th align="center">Employee Name</th>
						<td width="30%"><select name="employee_id" class="form-control  custom-input" id="employee_id">
								<option value="select">select</option>
									<?php foreach($employee_data as $each_employee){?>
										 <option value="<?php echo $each_employee->employee_id?>"><?php echo $each_employee->first_name.''.$each_employee->last_name?></option>
									<?php }?>
										</select>
						</td>  
			<th align="center">Requisition ID</th>
						<td width="30%"><select name="requisition_id" class="form-control  custom-input" id="transaction_id">
								<option value="select">select</option>
									<?php foreach($requisition_data as $each_requisition){?>
										 <option value="<?php echo $each_requisition->requisition_no?>"><?php echo $each_requisition->requisition_no?></option>
									<?php }?>
										</select>
						</td>  
			

                    </tr> 						
					<tr>
                                              
					   <th align="center">From Date</th> 
					    <td align="center"><input type="text" name="from_date"  id="from_date" class="form-control custom-input dateFrom"></td>
						 <td align="center">To date<input type="checkbox" name="chk_to_date" value="1" id="chk_to_date" class="form-control custom-input" ></td> 
						<td align="center"><input type="hidden" name="to_date"  id="to_date" class="form-control custom-input dateFrom"></td> 		

                    </tr> 		
					<tr>
						
							 <th align="center">Project Name</th>
						<td width="30%" style="min-width: 230px;"><select name="project_id" class="form-control  custom-input" id="project_id">
								<option value="select">select</option>
									<?php foreach($project_info as $each_project){?>
										 <option value="<?php echo $each_project->project_id?>"><?php echo $each_project->project_name.'-'. $each_project->customer_name?></option>
									<?php }?>
										</select>
						</td> 

					</tr>
						
					<tr>
                       		   <td></td><td></td><td></td>
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
		
		
			
			$('#project_id').select2();
			$('#employee_id').select2();
			$('#transaction_id').select2();
			
				
$("#chk_to_date").change(function(){
if(document.getElementById('chk_to_date').checked) {
	//alert("checked");
	$('#to_date').attr('type', 'text');
	$('#chk_to_date').attr('value', 1);
} else {
   $('#chk_to_date').attr('value', 0);
}
	});


			
		    $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
			$('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
			$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
			
		
		

	});
	
	
</script>
	
	