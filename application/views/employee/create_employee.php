<style>
#errmsg
{
color: red;
}
</style>
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		
			<h3 style="color: green; text-align:center">  
				<?php
                     $msg=$this->session->userdata('message');
                     if($msg)
                     {
                        echo $msg."<br> <br>";
						 $this->session->unset_userdata('message');
					 }
                 ?>
            </h3>
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 750px;overflow: scroll">
			<div class="panel-heading">Add New Employee</div>
			
            <div class="table-responsive" id="custom-table">
				
                <table id="" class="table">
					 <form method="post" enctype="multipart/form-data" onsubmit="return add_zero()" action="<?php echo base_url();?>Employee/save_employee" onsubmit = "return form_validation(this)">
                    <tbody>
					<tr>
                       <th align="center">Employee ID*</th>
                       <td  width="30%">                   
					   <input type="text" id="employee_id" name="employee_id" class="form-control custom-input" required>
					  <span id="errmsg"></span> </td>  
					   <th align="center">Department*</th>
                       <td align="center" width="30%">
					  <select name="department" class="form-control  custom-input" id="department">
							<option value="select">select</option>
							<?php foreach($all_department as $each_department) {?>
							 <option value="<?php echo $each_department->department_name;?>"><?php echo $each_department->department_name;?></option>
							<?php }?>
                       </select>
					  </td>	
                    </tr>  
					
                    <tr>
					    <th align="center">First Name*</th>
                       <td >                   
					   <input type="text" id="first_name" name="first_name" class="form-control custom-input" required>
					   </td> 
                       <th align="center">Last Name*</th>
                       <td align="center"style="width:30%">
					  <input type="text" id="last_name" name="last_name" class="form-control custom-input"  required></td>  
                    </tr>  
			
					<tr>           

					<tr>
                       <th align="center">Father Name</th>
                       <td>                   
					  <input type="text" id="fatherName" name="fatherName" class="form-control custom-input">
					   </td>                         
					   <th align="center">Mother Name</th>
                       <td align="center" width="30%"><input type="text" id="motherName" name="motherName" class="form-control custom-input"></td>
                    </tr> 	
					
					<tr>
                       <th align="center">Employee Type*</th>
                       <td align="center" style="width:30%" >                           
							<select name="employType" class="form-control col-sm-6 custom-input" id="employType">
                                <option value="select">select</option>
                                <option value="permanent">Permanent</option>
                                <option value="temporary">Temporary</option>
							</select>
						</td>
						<th align="center">Grade</th>
                       <td align="center"style="width:30%" colspan="3">                           
                            <select name="employGrade" class="form-control col-sm-6 custom-input" id="employGrade">
                                <option value="select">select</option>
								<?php foreach($all_grade as $each_grade){?>
                                <option value="<?php echo $each_grade->id?>"><?php echo $each_grade->grade_name?></option>
								<?php }?>
                            </select>
						</td>
                    </tr> 
					
					<tr>
                       <th align="center">Device ID*</th>
                       <td align="center"style="width:30%">                           
                            <select name="deviceID" class="form-control col-sm-6 custom-input" id="deviceID">
								
								<option value="select" selected>Select</option>
								<option value="all">All</option>
								<?php foreach($all_device as $each_device){?>
								<option value="<?php echo $each_device->DevId?>">
									<?php echo $each_device->DeviceName.'-'.$each_device->DevId;?>
								</option>
							    <?php }?>
                            </select>
						</td>
						<th align="center">Designation*</th>
                       <td align="center"style="width:30%" >                           
							<select name="designation" class="form-control col-sm-6 custom-input" id="designation">
									<option value="select">select</option>
								<?php foreach($all_designation as $each_designation){?>
									<option value="<?php echo $each_designation->designation_name?>">
										<?php echo $each_designation->designation_name?>
									</option>
							
								<?php }?>
                            </select>
						</td>
                    </tr> 
					
					<tr>
                       <th align="center">Card ID*</th>
                       <td align="center" style="width:30%" >                           
                            <input type="text" id="card_id" name="card_id" class="form-control custom-input card_id"  pattern="[0-9]{1}[0-9]{9}" required>
						</td>
						<th align="center">NID/Birth Reg/Photo ID</th>
                       <td align="center"style="width:30%" colspan="">                           
							<input type="text" id="nid" name="nid" class="form-control custom-input">
						</td>
                    </tr> 
					
					<tr>
                       <th align="center">Shift*</th>
                       <td align="center" style="width:30%" >                           
                            <select name="shift" class="form-control col-sm-3 custom-input" id="shift">
							<option value="select" >select</option>
							<?php foreach($all_shift as $each_shift){?>
							<option value="<?php echo $each_shift->id?>"><?php echo $each_shift->shift_name?></option>
							
							<?php }?>
                            </select>
						</td>
						<th align="center">Email</th>
                       <td align="center"style="width:30%" colspan="">                           
							<input type="text" id="email" name="email" class="form-control custom-input">
						</td>
                    </tr> 	
					
					<tr>
                       <th align="center">Blood Group</th>
                       <td align="center"style="width:30%" >                           
                            <select name="blood_group" class="form-control col-sm-6 custom-input" id="blood_group">
                                <option value=" ">select</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
					   </td>
					   <th align="center">Joining Date*</th>
                       <td align="center"style="width:30%" colspan="3">                           
                            <input type="text" id="joining_date" name="joining_date" class="form-control custom-input dateFrom" required>
					   </td>
                    </tr> 
					
					<tr>
                       <th align="center">Contact No*</th>
                       <td align="center"style="width:30%" >                           
                            <input type="number" id="contact_no" name="contact_no" class="form-control custom-input" required>
					   </td>
					   <th align="center">Date of Birth</th>
                       <td align="center"style="width:30%" colspan="3">                           
                            <input type="text" id="date_of_birth" name="date_of_birth" class="form-control custom-input dateFrom">
					   </td>
                    </tr> 	
					
					<tr>
                       <th align="center">Status*</th>
                       <td align="center"style="width:30%" >                           
                            <select required name="status" class="form-control col-sm-6 custom-input" id="status">
                                <option value = "select">select</option>
                                <option value = "1">Active</option>
                                <option value = "0">Inactive</option>
                            </select>
					   </td>
					   <th align="center">Present Address</th>
                       <td align="center"style="width:30%" colspan="3">                           
                            <input type="text" id="present_address" name="present_address" class="form-control custom-input">
					   </td>
                    </tr> 		

					<tr>
                       <th align="center">Permanent Address</th>
                       <td align="center"style="width:30%" >                           
                            <input type="text" id="permanent_address" name="permanent_address" class="form-control custom-input">
					   </td>
					   <th align="center">Upload Image</th>
                       <td align="center"style="width:30%" colspan="3">                           
                            <input type="file" id="image" name="image_location">
					   </td>
                    </tr> 	
					
					<tr>
					    <th align="center">Line Manager</th>
                        <td align="center">                           
                            <select name="line_manager" class="form-control col-sm-3 custom-input" id="line_manager">
                            <option value=" " selected >select</option>
							<option value="self" >None</option>
								<?php foreach($all_employee as $each_employee){?>
									<option value="<?php echo $each_employee->employee_id?>">
										<?php echo $each_employee->first_name." ".$each_employee->last_name?>
									</option>
							
							<?php }?>
                            </select>
					   </td>  
                       <th align="center">Weekend*</th>
                       <td align="center"style="" colspan="3">
							<select name="weekend" class="form-control col-sm-6 custom-input" id="weekend">
                                <option value="select">select</option>
                                <option value="Sat">Saturday</option>
                                <option value="Sun">Sunday</option>
                                <option value="Mon">Monday</option>
                                <option value="Tue">Tuesday</option>
                                <option value="Wed">Wednesday</option>
                                <option value="Thu">Thusday</option>
                                <option value="Fri">Friday</option>
							</select>
					   </td>
                    </tr> 
					<tr>			
					   <th align="center">Remarks</th>
                       <td align="center"style="" colspan="">                           
                            <input type="text" id="remarks" name="remarks" class="form-control custom-input">
					   </td>
                    </tr> 		


					<tr>
                        <th></th> <th></th> <th></th>
                       <td font-size="24"><button type="submit" id="btn_add_employee" class="btn btn-success btn_add_employee">Create Employee </button></td>                      
					  
                    </tr>					
           

					</tbody>
				</form>
				</table>

            </div>
           
        </div>
      
    </div>
    </div>
	
<script>

</script>	
<script type="text/javascript">
	$(document).ready(function() {
		$("#card_id").attr('maxlength','10');
		$("#employee_id").attr('maxlength','9');


  $("#employee_id").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });

$("#btn_add_employee").on('click',function(){

//alert("validation");
	
		if($('#employee_id').val().trim() == "")
		{
			alert("Please Insert Employee ID");
			$('#employee_id').focus();
			return false;
		}
		// {
		// 	alert("Please Select Department.");
		// 	$('#department').focus();
		// 	return false;
		// }			
		// else if($('#first_name').val().trim() == "")
		// {
		// 	alert("Please Insert First Name.");
		// 	$('#first_name').focus();
		// 	return false;
		// }else if($('#last_name').val().trim() == "")
		// {
		// 	alert("Please Insert Last Name.");
		// 	$('#last_name').focus();
		// 	return false;
		// }			
		// else if($('#fatherName').val().trim() == "")
		// {
		// 	alert("Please Insert Father Name.");
		// 	$('#fatherName').focus();
		// 	return false;
		// }			
		// else if($('#motherName').val().trim() == "")
		// {
		// 	alert("Please Insert Mother Name.");
		// 	$('#motherName').focus();
		// 	return false;
		// }	
		else if($('#employType').val().trim() == "select")
		{
			alert("Please Select Employee Type.");
			$('#employType').focus();
			return false;
		}			
					
		else if($('#deviceID').val().trim() == "select")
		{
			alert("Please Select Device ID.");
			$('#deviceID').focus();
			return false;
		}		
		// else if($('#designation').val().trim() == "select")
		// {
		// 	alert("Please Select Designation.");
		// 	$('#designation').focus();
		// 	return false;
		// }		

		else if($('#shift').val().trim() == "select")
		{
			alert("Please Select Shift.");
			$('#shift').focus();
			return false;
		}	
		// else if($('#card_id').val().trim() == "")
		// {
		// 	alert("Please Insert Card ID.");
		// 	$('#card_id').focus();
		// 	return false;
		// }

		var card=$('#card_id').val();
		var card_id=parseInt(card);
		if (Number.isInteger(card_id)==false) {

			alert("Please Insert Number.");
			$('#card_id').focus();
			return false;

		}


		// else if($('#joining_date').val().trim() == "")
		// {
		// 	alert("Please Select Your Joining Date.");
		// 	$('#joining_date').focus();
		// 	return false;
		// } else if($('#contact_no').val().trim() == "")
		// {
		// 	alert("Please Insert Contact No.");
		// 	$('#contact_no').focus();
		// 	return false;
		// }			
		// else if($('#date_of_birth').val().trim() == "")
		// {
		// 	alert("Please Insert Date of Birth.");
		// 	$('#date_of_birth').focus();
		// 	return false;
		// }			
		else if($('#status').val().trim() == "select")
		{
			alert("Please Select Status.");
			$('#status').focus();
			return false;
		}			
		// else if($('#present_address').val().trim() == "")
		// {
		// 	alert("Please Insert Present Address.");
		// 	$('#present_address').focus();
		// 	return false;
		// }			
		// else if($('#permanent_address').val().trim() == "")
		// {
		// 	alert("Please Insert Permanent Address.");
		// 	$('#permanent_address').focus();
		// 	return false;
		// }		
		// else if($('#line_manager').val().trim() == "select")
		// {
		// 	alert("Please Select Line Manager.");
		// 	$('#line_manager').focus();
		// 	return false;
		// }
		// else if($('#remarks').val().trim() == "")
		// {
		// 	alert("Please Insert Remarks.");
		// 	$('#remarks').focus();
		// 	return false;
		// }
		
	return true;
});


	// function form_validation()
	// {
	// 	//alert("validation");
		
	// 	if($('#employee_id').val().trim() == "")
	// 	{
	// 		alert("Please Insert Employee ID");
	// 		$('#employee_id').focus();
	// 		return false;
	// 	}		
	// 	else if($('#department').val().trim() == "select")
	// 	{
	// 		alert("Please Select Department.");
	// 		$('#department').focus();
	// 		return false;
	// 	}			
	// 	else if($('#first_name').val().trim() == "")
	// 	{
	// 		alert("Please Insert First Name.");
	// 		$('#first_name').focus();
	// 		return false;
	// 	}			
	// 	else if($('#last_name').val().trim() == "")
	// 	{
	// 		alert("Please Insert Last Name.");
	// 		$('#last_name').focus();
	// 		return false;
	// 	}			
	// 	else if($('#fatherName').val().trim() == "")
	// 	{
	// 		alert("Please Insert Father Name.");
	// 		$('#fatherName').focus();
	// 		return false;
	// 	}			
	// 	else if($('#motherName').val().trim() == "")
	// 	{
	// 		alert("Please Insert Mother Name.");
	// 		$('#motherName').focus();
	// 		return false;
	// 	}			
	// 	else if($('#employType').val().trim() == "select")
	// 	{
	// 		alert("Please Select Employee Type.");
	// 		$('#employType').focus();
	// 		return false;
	// 	}			
	// 	else if($('#employGrade').val().trim() == "select")
	// 	{
	// 		alert("Please Select Employee Grade.");
	// 		$('#employGrade').focus();
	// 		return false;
	// 	}			
	// 	else if($('#deviceID').val().trim() == "select")
	// 	{
	// 		alert("Please Select Device ID.");
	// 		$('#deviceID').focus();
	// 		return false;
	// 	}		
	// 	else if($('#designation').val().trim() == "select")
	// 	{
	// 		alert("Please Select Designation.");
	// 		$('#designation').focus();
	// 		return false;
	// 	}		
	// 	else if($('#card_id').val().trim() == "")
	// 	{
	// 		alert("Please Insert Card ID.");
	// 		$('#card_id').focus();
	// 		return false;
	// 	}			
	// 	else if($('#group_id').val().trim() == "select")
	// 	{
	// 		alert("Please Select Group ID.");
	// 		$('#group_id').focus();
	// 		return false;
	// 	}			
	// 	else if($('#shift').val().trim() == "select")
	// 	{
	// 		alert("Please Select Shift");
	// 		$('#shift').focus();
	// 		return false;
	// 	}			
	// 	else if($('#unit').val().trim() == "select")
	// 	{
	// 		alert("Please Select Unit");
	// 		$('#unit').focus();
	// 		return false;
	// 	}			
	// 	else if($('#blood_group').val().trim() == "select")
	// 	{
	// 		alert("Please Select Blood Group");
	// 		$('#blood_group').focus();
	// 		return false;
	// 	}			
	// 	else if($('#joining_date').val().trim() == "")
	// 	{
	// 		alert("Please Insert Joining Date");
	// 		$('#joining_date').focus();
	// 		return false;
	// 	}			
	// 	else if($('#contact_no').val().trim() == "")
	// 	{
	// 		alert("Please Insert Contact No.");
	// 		$('#contact_no').focus();
	// 		return false;
	// 	}			
	// 	else if($('#date_of_birth').val().trim() == "")
	// 	{
	// 		alert("Please Insert Date of Birth.");
	// 		$('#date_of_birth').focus();
	// 		return false;
	// 	}			
	// 	else if($('#status').val().trim() == "select")
	// 	{
	// 		alert("Please Select Status.");
	// 		$('#status').focus();
	// 		return false;
	// 	}			
	// 	else if($('#present_address').val().trim() == "")
	// 	{
	// 		alert("Please Insert Present Address.");
	// 		$('#present_address').focus();
	// 		return false;
	// 	}			
	// 	else if($('#permanent_address').val().trim() == "")
	// 	{
	// 		alert("Please Insert Permanent Address.");
	// 		$('#permanent_address').focus();
	// 		return false;
	// 	}		
	
	// 	else if($('#remarks').val().trim() == "")
	// 	{
	// 		alert("Please Insert Remarks.");
	// 		$('#remarks').focus();
	// 		return false;
	// 	}

	// 		else if($('#weekend').val().trim() == "Select")
	// 	{
	// 		alert("Please Select Weekend.");
	// 		$('#remarks').focus();
	// 		return false;
	// 	}
	// 	return true;
	// }
		$('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
		//$('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
   $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd',
        		changeMonth: true,
                changeYear: true,
                yearRange: "-100:+20" });


		$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });




});
</script>
