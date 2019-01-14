<br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">

		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading" align="center"><b>Create New User</b></div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>

                    					<tr><td></td>
                       <th align="center">Employee ID</th>
                       <td width="30%">                   
                        <select required name="employee_id" class="form-control col-sm-6 custom-input" id="employee_id">
							<option value="select">select</option>
                            <?php foreach($all_employee as $each_employee){?>
							<option value="<?php echo $each_employee->employee_id?>"><?php echo $each_employee->employee_id?></option>
							<?php }?>
                        </select>
					   </td>
					   </tr>
					<tr>
                       <th align="center">Employee Name</th>
                       <td width="30%">
                       <input type="text"  class="form-control custom-input" id="employee_name" name="employee_name" readonly>
					   </td>
					   <th align="center">User Type</th>
                       <td align="center">
                        <select required name="user_type" class="form-control col-sm-6 custom-input" id="user_type">
							<option value="select">select</option>
                            <option value="Super Admin">Super Admin</option>
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
			</table>					
			<table>					
					<tr>
                       <td style="text-align:left" colspan="2">
							<label>User Role: </label> <br>
							
								<?php 
								/*
								foreach($all_user_role as $each_user_role)
								{
								?>
									<label><input type="checkbox" name="user_role[]" id="<?php echo $each_user_role->id;?>" class="roleCheckBoxClass" value="<?php echo $each_user_role->id;?>"> <?php echo $each_user_role->user_role_name;?></label>
									<br> 
								<?php 
								}
								*/
								
								// $mysqli = new mysqli('127.0.0.1', 'root', '', 'test_easy_accounts');
								// if ($mysqli->connect_errno)
								// {
								// 	echo "Sorry, this website is experiencing problems. Error: Failed to make a MySQL connection, here is why: \n Errno: " . $mysqli->connect_errno . "\nError: " . $mysqli->connect_error . "\n";
								// 	exit;
								// }
								
								include('application/views/manual_db_connect.php');
								
								$GLOBALS['align_depth'] = 0;
								$GLOBALS['max_depth'] = 0;
								
								generate_available_roles(0, $mysqli); 			
								
								function generate_available_roles($parent_id, $mysqli)
								{
									//$sql = "SELECT * FROM user_roles WHERE company_id = ".$_SESSION['company_id']." AND parent_id = $parent_id AND id IN (".$_SESSION['permitted_action'].")";
									$sql = "SELECT
												a.id,
												a.user_role_name,
												(SELECT count(*) FROM user_roles b WHERE a.id = b.parent_id AND company_id = ".$_SESSION['company_id'].") AS no_of_child
											FROM
												user_roles a
											WHERE
												company_id = ".$_SESSION['company_id']."
												AND parent_id = ".$parent_id." 
												AND id IN (".$_SESSION['permitted_action'].")";
									//echo "<pre>"; print_r($sql); exit();
									if (!$result = $mysqli->query($sql))
									{
										echo "Error: Our query failed to execute and here is why: \n Query: " . $sql . "\nErrno: " . $mysqli->errno . "\n Error: " . $mysqli->error . "\n";
										exit;
									}
									else if ($result->num_rows > 0)
									{										
										
										while ($each_role = $result->fetch_assoc())
										{											
											
											$GLOBALS['align_depth']++;
											
											//if($parent_id == 0)
											if($each_role['no_of_child'] != 0)
											{
												echo "<table id='".$each_role['id']."'>";
											}
											?>
												
												<tr>
													<?php
													for($i = 1; $i < $GLOBALS['align_depth']; $i++)
													{
														echo "<td>&nbsp;</td>";
													}
													?>
													<td style="text-align:left">
														<input type="checkbox" class="checkBoxClass" value="<?php echo $each_role['id'];?>" onchange="automatically_select_child(this.value, this.checked)"> <?php echo $each_role['user_role_name'];?>
													
											<?php
											
											generate_available_roles($each_role['id'], $mysqli);												
													
											$GLOBALS['align_depth']--;
											
											echo "</td>
												</tr>"; 
											
											//if($parent_id == 0)
											if($each_role['no_of_child'] != 0)
												echo "</table>";
											
										}
									}
								}
								
								?>
							</table>
                           
					   </td>	            
		                  
						<td  style="text-align:left" colspan="2">
							<label>Company: </label> <br>
							<?php 
							foreach($all_company as $each_company)
							{
							?>
								<label><input type="checkbox" name="company_id[]" id="<?php echo $each_company->id?>" class="checkBoxCompanyClass" value="<?php echo $each_company->company_id;?>"> <?php echo $each_company->full_name;?></label>
								<br> 
							<?php 
							}
							?>
                       
					   </td>
                    </tr>  		
					<tr>
                       <td align="center" colspan="">
					<label for="ckbCheckAll">Select All Roles </label>  <input class="check-all" type="checkbox" name="" id="ckbCheckAll">
					   </td>
					   <td></td>	<td></td>			   
					   <td align="center" colspan="">
								<label for="ckbCheckAllCompany">Select All Companies &nbsp; </label>  <input class="check-all-company" type="checkbox" name="" id="ckbCheckAllCompany">
                            
					   </td>						 
					 
                    </tr>  

</div>

					<tr>
                        <th></th> <th></th> <th></th>
                       <td font-size="24"><input type="" id="btn_create_user" class="btn btn-success" value="Create New User"/></td>                      
					  
                    </tr>					
           

					</tbody>
					
					</table>
					</form>
            </div>
           
        </div>
      
    </div>
    </div>
	
		
<script type="text/javascript">
	
	function automatically_select_child(id, check_status)
	{
		//alert(id+'----'+check_status); 
		//var vvv = $("#4").html();
		//alert(vvv);
		if(check_status)
		{
			//alert("true");
			 $("#"+id).find('input[type=checkbox]').each(function () 
			 {
				 this.checked = true;
				 
			});
			//$("#"+id).find('input[type=checkbox]:first').checked = true;
		}
		else
		{
			//alert("false");
			 $("#"+id).find('input[type=checkbox]').each(function () 
			 {
				 this.checked = false;
			});
			//$("#"+id).find('input[type=checkbox]:first').checked = false;
		}
	}



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
				 var employee_name =$('#employee_name').val().trim();


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
							employee_name,employee_name,
							company: company
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						 window.location.assign('user_list');
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
            $(".checkBoxClass").prop('checked', "checked");
        else
            $(".checkBoxClass").removeProp('checked');
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

	$("#employee_id").change(function(){
		employee_id = this.value;

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>User/pick_employee_name',
					data:{ 
							employee_id: employee_id
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						$("#employee_name").val(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});



	});

</script>

