
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;">
			<div class="panel-heading">Attendence Report Form</div>
            <div class="table-responsive" id="custom-table">
			 <form name="show_report" action="<?php echo base_url();?>manual_attendence/show_report" target="_blank" method="post">
                <table id="" class="table ">
                    <tbody>
					
					<tr>
                         <td></td>             
					   <th align="center">Employee ID</th>
						<td width="30%"><select name="employee_id" class="form-control  custom-input" id="employee_id">
								<option value="">select</option>
									<?php foreach($all_employee as $each_employee){?>
										 <option value="<?php echo $each_employee->employee_id?>"><?php echo $each_employee->employee_id?></option>
									<?php }?>
										</select>
						</td>  
			

                    </tr> 						
					<tr>
                                              
					   <th align="center">From Date</th> 
					    <td align="center"><input type="text" name="from_date"  id="from_date" class="form-control custom-input dateFrom" required></td>
						 <td align="center">To date<input type="checkbox" name="chk_to_date" value="1" id="chk_to_date" class="form-control custom-input" ></td> 
						<td align="center"><input type="hidden" name="to_date"  id="to_date" class="form-control custom-input dateFrom"></td> 		

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


			
		    $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
			$('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
			$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
			
		
		

	});
	
	
</script>
	
	