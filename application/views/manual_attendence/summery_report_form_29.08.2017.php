<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-8 col-md-offset-3">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Summery Report form</div>
              
               
                    <div class="col-xs-10 col-sm-10">
				  
			<table >

			 <form name="show_report" action="<?php echo base_url();?>manual_attendence/show_summery_report" target ="_blank" method="post">
			 
			 <tr>
			<td> <label for="all_department" style="margin-top: 4px">Select Department</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"><span> <input type="checkbox" id="all_department" name="all_department"  class="form-control custom-input"></td>
			
			<td><label for="to_date" style="margin-top: 4px">All</label></td>
			
			</tr>
			<tr>
			<td></td>
			<td> </td>
			<td style="width:65%"><select name="department_name" type="hidden" class="form-control  custom-input" id="department_name">
			        <option value="select">select</option>
						<?php foreach($all_department as $each_department){?>
							 <option value="<?php echo $each_department->department_name?>"><?php echo $each_department->department_name?></option>
						<?php }?>
                            </select>
							</td>
			
			</tr>	
			
			
			<tr>
			<td> <label for="from_date" style="margin-top: 4px">From Date</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="from_date" name="from_date" class="form-control custom-input dateFrom" required></td>
			
			</tr>		

			<tr>
			<td> <label for="to_date" style="margin-top: 4px">To Date</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="checkbox" id="chk_to_date" name="chk_to_date" class="form-control custom-input"></td>
			<td style="width:65%"> <input type="hidden" id="to_date" name="to_date" class="form-control custom-input dateFrom"></td>
			
			</tr>

			
			
				<tr>
			<td>
			 <div class="col-md-4" style="float: right;width: 4%;margin-top: 22px;margin-right: 50px">
                            <button type="submit" id="" class="btn btn-info pull-right">Generate Report</button>
                        </div></td>

			 
			<td> </td>
			<td></td>
			</tr>
			
			
			   
			</table>
			
						    
			</form>

                    </div>

                    <!-- ........................................... -->

                    <div class="form-horizontal">
                        <div class="form-group">

                        </div>
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
	
	