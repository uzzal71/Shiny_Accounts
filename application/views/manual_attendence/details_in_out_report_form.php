
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;">
			<div class="panel-heading">Details In Out Report Form</div>
            <div class="table-responsive" id="custom-table">
			<form name="show_in_out_report" action="<?php echo base_url();?>Manual_attendence/show_in_out_report" target="_blank" method="post">
                <table id="" class="table ">
                    <tbody>
					
					<tr>
                                           
					   <th align="center">Select Employee</th>
					   <td align="center">All<input type="checkbox" name="check_employee"  id="check_employee" class="form-control custom-input" ></td>     
                       <td align="center" width="30%">	
						<select name="employee_id" class="form-control col-sm-6 custom-input" id="employee_id" >					   
					   <option value="" >select</option>
					   <?php foreach ($all_employee as $each_employee){?>
					   <option value="<?php echo $each_employee->employee_id?>" ><?php echo $each_employee->first_name.' '.$each_employee->last_name?></option>
						
					   <?php }?>
					    </select>	
					   </td>  

                    </tr> 						
					<tr>
                                           
					   <th align="center">From Date</th>
					   <td align="center"><input type="text" name="date"  id="date" class="form-control custom-input dateFrom" required></td>     

					   <td align="center">To date<input type="checkbox" name="check_date" value="1" id="check_date" class="form-control custom-input" ></td>     
                      <td align="center"><input type="hidden" name="to_date"  id="to_date" class="form-control custom-input dateFrom" ></td> 	

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
	
<script type="text/javascript">
	$(document).ready(function() {
			$("#check_employee").change(function(){
				if(document.getElementById('check_employee').checked) {
					//alert("checked");
					$( "#employee_id" ).prop( "disabled", true );
					$('#check_employee').val(1);
				} 					
				else{
					$('#check_employee').val(0);
					$( "#employee_id" ).prop( "disabled", false );
					$("#employee_id").focus();
				}
			});			
	
			$("#check_date").change(function(){
				if(document.getElementById('check_date').checked) {
					//alert("checked");
					$( "#to_date" ).prop( "disabled", false );
					$('#to_date').attr("type","text");
					$('#check_date').val(1);
					$('#to_date').focus();
				} 					
				else{
					//alert("Unchecked");
					$( "#to_date" ).prop( "disabled", true );
					$('#to_date').attr("type","hidden");
					$('#check_date').val(0);
				}
			});

	
	
	});
	
	
	
	
	   $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	   $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
</script>

	
