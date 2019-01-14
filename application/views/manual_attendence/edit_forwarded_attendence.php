<link rel="stylesheet" href="<?php echo base_url();?>css/wickedpicker.min.css">
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Edit Manual Attendance</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
					<tr>
					    <th align="center" colspan="">Employee ID</th>
                        <td align="center"style="" colspan="">                           
                            <select name="employee_id" class="form-control col-sm-3 custom-input" id="employee_id">
							<option value="select" >select</option>
								<?php foreach($all_employee as $each_employee){?>
									<option <?php if($each_employee->employee_id == $each_pending_manual_attendence->employee_id){echo 'selected="selected"';}?> value="<?php echo $each_employee->employee_id?>">
										<?php echo $each_employee->employee_id?>
									</option>
							
							<?php }?>
                            </select>
					   </td>  

                       <th align="center">Date Time</th>
                       <td colspan="">
							<input type="text"class="form-control  custom-input dateTimeFrom" value = "<?php echo $each_pending_manual_attendence->ctime?>" id="ctime" name="ctime">
					   </td>  	
					  
                    </tr>  				
					<tr>

					     <th align="center">Under Concideration</th>
                       <td colspan="">
                            <select name="under_consideration" class="form-control col-sm-3 custom-input" id="under_consideration">
							<option value="select" >select</option>
								<?php foreach($all_employee as $each_employee){?>
									<option <?php if($each_employee->employee_id == $each_pending_manual_attendence->under_consideration){echo 'selected="selected"';}?> value="<?php echo $each_employee->employee_id?>">
										<?php echo $each_employee->first_name." ".$each_employee->last_name?>
									</option>
							
							<?php }?>
                            </select>
						</td>

											   <th align="center">Remarks</th>
                       <td align="center"style="width:30%">
                       <input type="text" value = "<?php echo $each_pending_manual_attendence->remarks?>" id="remarks" name="remarks" class="form-control custom-input" required>
					   		
						</td> 
                    </tr>  				
					<tr>
<td><input type="hidden" value = "<?php echo $each_pending_manual_attendence->id?>"id="id" name="id" class="form-control custom-input" required></td>
   					   
					  
                    </tr>  
                   
					<tr>
                       
                       <td><button type="" id="btn_attendence" class="btn btn-info pull-right">Update</button></td>                        
					  
                    </tr>					
           

					</tbody>
					
					</table>

            </div>
           
        </div>
      
    </div>
    </div>
		
<script type="text/javascript">
	$(document).ready(function() {


		$("#btn_attendence").click(function(){
			//alert("Button clicked");
			if(form_validation())
			{
				//alert("validation true");

				var id		 = $('#id').val().trim();
				var employee_id		 = $('#employee_id').val().trim();			
				var ctime		 = $('#ctime').val().trim();
				var under_consideration	 = $('#under_consideration').val().trim();
				var remarks	 = $('#remarks').val().trim();
				
				
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>manual_attendence/update_forwarded_manual_attendence',
					data:{ 
							id : id,
							employee_id: employee_id, 
							ctime: ctime, 
							under_consideration: under_consideration, 
							remarks: remarks
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

		    $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
			$('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
			$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });




		});

	function form_validation()
	{
	
		if($('#employee_id').val().trim() == "select")
		{
			alert("Please Select Employee ID");
			$('#employee_id').focus();
			return false;
		}		
		else if(($('#ctime').val().trim() == "") && $('#out_time').val().trim() == "")
		{
			alert("Please Insert Date Time");
			$('#ctime').focus();
			return false;
		}
		else if($('#under_consideration').val().trim() == "select")
		{
			alert("Please select Under Consiretation");
			$('#under_consideration').focus();
			return false;
		}
		else if($('#remarks').val().trim() == "")
		{
			alert("Please insert Remarks");
			$('#remarks').focus();
			return false;
		}
		
				
		return true;
	}


        $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
        $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
		$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
</script>
	
	
