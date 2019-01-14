
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Change Password</div>
            <div class="table-responsive" id="custom-table">
                <table id="" class="table ">
                    <tbody>
					<tr>
					   <th align="center"></th>
					   <th align="center">Employee ID</th>
                       <td align="center">
							<select required name="employee_id" class="form-control col-sm-6 custom-input" id="employee_id">
									<option value="select">Select</option>
									<?php if($all_employee) {foreach($all_employee as $each_employee){?>
									<option value="<?php echo $each_employee->employee_id;?>"><?php echo $each_employee->employee_id?></option>
									<?php }}?>
							</select>
					   </td>
					   
                    </tr>  			
					<tr>
					   <th align="center">Password</th>
                       <td align="center">
						<input type="text" id="password" name="password" class="form-control custom-input" required>
					   </td>	
					   <th align="center">Confirm Password</th>
                       <td align="center">
						<input type="text" id="confirm_password" name="confirm_password" class="form-control custom-input" required>
					   </td>						 

                    </tr>  					

			</div>

					<tr>
                        <th></th> <th></th> <th></th>
                       <td font-size="24"><input type=""id="btn_change_password" class="btn btn-success" value="Update Password"/></td>                      
					  
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
		$("#btn_change_password").click(function(){
			if(form_validation())
			{
				//alert("validation true");
				
				var employee_id		 = $('#employee_id').val().trim();
				var password		 = $('#password').val().trim();
				var confirm_password		 = $('#confirm_password').val().trim();

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url()?>admin/update_password',
					data:{ 
							employee_id: employee_id,
							password: password,
							confirm_password: confirm_password
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						//window.location.reload(true);
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
		
		if($('#employee_id').val().trim() == "select")
		{
			alert("Please Select Employee ID");
			$('#employee_id').focus();
			return false;
		}			
		else if($('#password').val().trim() == "")
		{
			alert("Please Insert Password");
			$('#password').focus();
			return false;
		}		
		else if($('#confirm_password').val().trim() == "")
		{
			alert("Please Insert Confirm Password");
			$('#confirm_password').focus();
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
