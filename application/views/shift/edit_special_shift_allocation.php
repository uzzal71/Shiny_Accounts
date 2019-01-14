
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">

		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Edit Special Shift Allocation</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
					<tr>
                       <th align="center">Date</th>
                       <td width="30%">                   
							<input type="text"  class="form-control custom-input dateFrom" id="date" value="<?php echo $each_special_shift->date?>" name="date">
					   </td width="30%">
					   <th align="center">Employee ID</th>
                       <td align="center">
                        <select required name="employee_id" class="form-control col-sm-6 custom-input"  value="<?php echo $each_special_shift->employee_id?>"  id="employee_id">
							<option value="select">select</option>
                            <?php foreach($all_employee as $each_employee){?>
							<option value="<?php echo $each_employee->employee_id?>"><?php echo $each_employee->employee_id?></option>
							<?php }?>
                        </select>
					   </td>	
                    </tr>  
					<tr>
					   <th align="center">Shift</th>
                       <td align="center">
                        <select required name="shift_id"  value="<?php echo $each_special_shift->shift_id?>"  class="form-control col-sm-6 custom-input" id="shift_id">
							<option value="select">select</option>
                            <?php foreach($all_shift as $each_shift){?>
							<option value="<?php echo $each_shift->id?>"><?php echo $each_shift->shift_name?></option>
							
							<?php }?>
                        </select>
					   </td>	
					    <td width="30%">                   
							<input type="hidden"  class="form-control custom-input" id="id" value="<?php echo $each_special_shift->id?>" name="id">
					    </td width="30%">
	
                    </tr>  					
	

</div>

					<tr>
                        <th></th> <th></th> <th></th>
                       <td font-size="24"><input type=""id="btn_special_shift" class="btn btn-success" value="Update Special Shift Allocation"/></td>                      
					  
                    </tr>					
           

					</tbody>
					
					</table>
					</form>
            </div>
           
        </div>
      
    </div>
    </div>
	
		
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_special_shift").click(function(){
								
				//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				
				var id = $('#id').val().trim();
				var date = $('#date').val().trim();
				var employee_id = $('#employee_id').val().trim();
				var shift_id = $('#shift_id').val().trim();
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Shift/update_special_shift_allocation',
					data:{ 
							id: id,
							date: date,
							employee_id: employee_id,
							shift_id: shift_id
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
	

			
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#date').val().trim() == "")
		{
			alert("Please Insert Date");
			$('#group_id').focus();
			return false;
		}		

		else if($('#employee_id').val().trim() == "select")
		{
			alert("Please Select Emplyoee ID .");
			$('#employee_id').focus();
			return false;
		}			
		
		else if($('#shift_id').val().trim() == "select")
		{
			alert("Please Select Shift Name");
			$('#shift_id').focus();
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

