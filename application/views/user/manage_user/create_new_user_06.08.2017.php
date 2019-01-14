
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">

		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Create New User</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
					<tr>
                       <th align="center">Employee ID</th>
                       <td width="30%">                   
                        <select required name="employee_id" class="form-control col-sm-6 custom-input" id="employee_id">
							<option value="select">select</option>
                            <?php foreach($all_employee as $each_employee){?>
							<option value="<?php echo $each_employee->employee_id?>"><?php echo $each_employee->employee_id?></option>
							
							<?php }?>
                        </select>
					   </td width="30%">
					   <th align="center">User Type</th>
                       <td align="center">
                        <select required name="user_type" class="form-control col-sm-6 custom-input" id="user_type">
							<option value="select">select</option>
                            <option value="Admin">Admin</option>
                            <option value="Operator">Operator</option>
                        </select>
					   </td>					   
					  
                    </tr>  			
					<tr>
                      
					   <th align="center">Type Password </th>
                       <td align="center">
						<input type="password"  class="form-control custom-input" id="password" name="password">
					   </td>						 
					   <th align="center">Retype Password </th>
                       <td align="center">
						<input type="password"  class="form-control custom-input" id="retype_password" name="retype_password">
					   </td>	
                    </tr>  					
					<tr>
                       <td  style="text-align:left" colspan="2">
							<label>User Role: </label> <br>
							<?php foreach($all_user_role as $each_user_role){?>
							<label><input type="checkbox" name="user_role[]" id="<?php echo $each_user_role->id;?>" class="roleCheckBoxClass" value="<?php echo $each_user_role->id;?>"> <?php echo $each_user_role->user_role_name;?></label>
							<br> 
							<?php }?>
                           
					   </td>	            
		                  
						<td  style="text-align:left" colspan="2">
							<label>Company: </label> <br>
							<?php foreach($all_company as $each_company){?>
							<label><input type="checkbox" name="company_id[]" id="<?php echo $each_company->id?>" class="checkBoxCompanyClass" value="<?php echo $each_company->company_id;?>"> <?php echo $each_company->full_name;?></label>
							<br> 
							<?php }?>
                       
					   </td>
                    </tr>  		
					<tr>
                       <td align="center" colspan="">
								<label for="ckbCheckAll">Select All Roles &nbsp;</label>  <input class="check-all" type="checkbox" name="" id="ckbCheckAll">
                                  
					   </td>
					   <td></td>				   
					   <td align="center" colspan="">
								<label for="ckbCheckAllCompany">Select All Companies &nbsp; </label>  <input class="check-all-company" type="checkbox" name="" id="ckbCheckAllCompany">
                                    
           
					   </td>						 
					 
                    </tr>  

</div>

					<tr>
                        <th></th> <th></th> <th></th>
                       <td font-size="24"><input type=""id="btn_create_user" class="btn btn-success" value="Create New User"/></td>                      
					  
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
		$("#btn_create_user").click(function(){
								
				//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				
				var employee_id = $('#employee_id').val().trim();
				var user_type = $('#user_type').val().trim();
				var password = $('#password').val().trim();
				var retype_password = $('#retype_password').val().trim();


				var user_role = [];
				$(".checkBoxClass:checked").each(function() {
					if($(this).is(":checked")){
						user_role.push($(this).val());
					}
				});
				user_role = user_role.toString();	
				
				var company = [];
				$(".checkBoxCompanyClass:checked").each(function() {
					if($(this).is(":checked")){
						company.push($(this).val());
					}
				});
				company = company.toString();
				
			
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>User/save_user',
					data:{ 
							employee_id: employee_id,
							user_type: user_type,
							password: password,
							retype_password: retype_password,
							user_role: user_role,
							company: company
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
		
		if($('#employee_id').val().trim() == "select")
		{
			alert("Please Select Employee ID");
			$('#employee_id').focus();
			return false;
		}		

		else if($('#user_type').val().trim() == "select")
		{
			alert("Please Select User Type.");
			$('#user_type').focus();
			return false;
		}			
		else if($('#password').val().trim() == "")
		{
			alert("Please Insert Password");
			$('#password').focus();
			return false;
		}			
				
		else if($('#retype_password').val().trim() == "")
		{
			alert("Please Insert Retype Password");
			$('#retype_password').focus();
			return false;
		}			
		

		return true;
	}
	    //  ======  ######  For Selecting All Roles  ######  ======
	 $("#ckbCheckAll").click(function () {
        if (this.checked)
            $(".roleCheckBoxClass").prop('checked', "checked");
        else
            $(".roleCheckBoxClass").removeProp('checked');
    });

    //  ======  ######  For Selecting All Companies  ######  ======
    $("#ckbCheckAllCompany").click(function () {
        if (this.checked)
            $(".checkBoxCompanyClass").prop('checked', "checked");
        else
            $(".checkBoxCompanyClass").removeProp('checked');
    });
	
		//  ======  ######  For Selecting Date Time and DateTime  ######  ======

    $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
    $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
	
	});
</script>

