
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;">
			<div class="panel-heading" align = "center">Employee Report Form</div>
            <div class="table-responsive" id="custom-table">
			 <form name="show_report" action="<?php echo base_url();?>Employee/show_employee_report" target ="_blank" method="post">
                <table id="" class="table ">
                    <tbody>
					
					<tr>
                         <td></td>                  
					   <th align="center">Select Department</th>
					   <td align="center">All<input type="checkbox" name="all_department" value="1" id="all_department" class="form-control custom-input" ></td>     
                       <td align="center" width="30%">	
							<select name="department_name" type="hidden" class="form-control  custom-input" id="department_name">
							<option value="select">select</option>
								<?php foreach($all_department as $each_department){?>
									 <option value="<?php echo $each_department->department_name?>"><?php echo $each_department->department_name?></option>
								<?php }?>
                            </select>
					   </td>
                    </tr> 		
					
					<tr>
                       <td></td><td></td><td></td><td></td> 
                       <td> <button type="submit" id="" class="btn btn-info pull-right">Generate Report</button></td>   
					  					   
					  
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
	
		
		
$(document).on('change', '#all_department', function(){
    if($(this).prop('checked')){
        $('#department_name').attr('disabled', 'disabled');
		$('#all_department').attr('value', 1);
    } else {
        $('#department_name').removeAttr('disabled');
    }
});


		
		

	});
	
	
	
</script>