
<br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		
			<h3 style="color: green; text-align:center" >  
				<?php
                     $msg=$this->session->userdata('message');
                     if($msg)
                     {
                        echo $msg."<br> <br>";
						 $this->session->unset_userdata('message');
					 }
                 ?>
             </h3>
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading" align = "center"><b>Edit Employee</b></div>
            <div class="table-responsive" id="custom-table">
				<form enctype="multipart/form-data" id="submit" onsubmit="form_validation()" action="<?php echo base_url();?>Employee/update_employee" method="post">
                <table id="" class="table">
                    <tbody>
					<tr>
                       <th align="center">Employee ID*</th>
                       <td  width="50%">                   
					   <input type="text" id="employee_id" name="employee_id" readonly  value="<?php echo $each_employee->employee_id?>" class="form-control custom-input" required>
					   </td>  
					   <th align="center">Department*</th>
                       <td align="center" width="50%">
					  <select name="department" value="<?php echo $each_employee->department?>" class="form-control  custom-input" id="department">
							<option value="select">Select Department</option>
							<?php 
							foreach($all_department as $each_department)
							{
							?>
								<option value="<?php echo $each_department->department_name;?>" <?php if($each_department->department_name == $each_employee->department) echo "selected='selected'" ?>><?php echo $each_department->department_name;?></option>
							<?php 
							}
							?>
                       </select>
					  </td>					   
					  
                    </tr>  
                    <tr>
					    <th align="center">First Name*</th>
                       <td >                   
					   <input type="text" id="first_name" name="first_name"value="<?php echo $each_employee->first_name?>" class="form-control custom-input" required>
					   </td> 
                       <th align="center">Last Name*</th>
                       <td align="center"style="width:30%">
					  <input type="text" id="last_name" name="last_name"value="<?php echo $each_employee->last_name?>" class="form-control custom-input" required></td>                        
					   
                    </tr>  
			
					<tr>           

					<tr>
                       <th align="center">Father Name</th>
                       <td>                   
					  <input type="text" id="fatherName" name="fatherName" value="<?php echo $each_employee->fatherName?>" class="form-control custom-input" >
					   </td>                         
					   <th align="center">Mother Name</th>
                       <td align="center" width="30%"><input type="text" id="motherName" name="motherName" value="<?php echo $each_employee->motherName?>" class="form-control custom-input" ></td>

                    </tr> 		
					<tr>
                       <th align="center">Employee Type*</th>
                       <td align="center" style="width:30%" >                           
							<select name="employType" value="<?php echo $each_employee->employType?>" class="form-control col-sm-6 custom-input" id="employType">
                                <option value="select">Select</option>
                                <option <?php if($each_employee){ if($each_employee->employType == 'permanent'){?> selected="selected" <?php }}?> value="permanent">Permanent</option>
                                <option <?php if($each_employee){ if($each_employee->employType == 'temporary'){?> selected="selected" <?php }}?> value="temporary">Temporary</option>
							</select>
						</td>
						<th align="center">Grade*</th>
                       <td align="center"style="width:30%">                           
                            <select name="employGrade" value="<?php echo $each_employee->employGrade?>" class="form-control col-sm-6 custom-input" id="employGrade">
                                <option value="select">select</option>
								<?php foreach($all_grade as $each_grade){?>
                                <option <?php if($each_employee){ if($each_employee->employGrade == $each_grade->id){?> selected="selected" <?php }}?> value="<?php echo $each_grade->id?>"><?php echo $each_grade->grade_name?></option>
								<?php }?>
                            </select>
						</td>
                    
					 
                    </tr> 				
					<tr>
                       <th align="center">Device ID</th>
                       <td align="center"style="width:30%">                           
                            <select name="deviceID"  class="form-control col-sm-6 custom-input" id="deviceID">
								<option value="select">select</option>
								<?php foreach($all_device as $each_device){?>
								<option <?php if($each_employee){ if($each_employee->deviceID == $each_device->DevId){?> selected="selected" <?php }}?> value="<?php echo $each_device->DevId?>">
									<?php echo $each_device->DeviceName?>
								</option>
							    <?php }?>
                            </select>
						</td>
						<th align="center">Designation*</th>
                       <td align="center"style="width:30%" >                           
							<select name="designation" value="<?php echo $each_employee->designation?>" class="form-control col-sm-6 custom-input" id="designation">
									<option value="select">select</option>
								<?php foreach($all_designation as $each_designation){?>
									<option value="<?php echo $each_designation->designation_name?>" <?php if( $each_employee->designation == $each_designation->designation_name) echo "selected='selected'" ?>>
										<?php echo $each_designation->designation_name?>
									</option>
							
								<?php }?>
                            </select>
						</td>
                    
					 
                    </tr> 				
					<tr>
                       <th align="center">Card ID*</th>
                       <td align="center"style="width:30%">                           
                            <input type="number" step="1" pattern="\d+" id="card_id" name="card_id" value="<?php echo $each_employee->card_id?>" class="form-control custom-input" required>
						</td>
						<th align="center">NID/Birth Reg/Photo ID</th>
                       <td align="center"style="width:30%" colspan="">                           
							<input type="text" id="nid" name="nid" value="<?php echo $each_employee->nid?>" class="form-control custom-input">
						</td>
                    
					 
                    </tr> 				
					<tr>
                       <th align="center">Shift</th>
                       <td align="center"style="width:30%" >                           
                            <select name="shift" value="<?php echo $each_employee->shift?>" class="form-control col-sm-3 custom-input" id="shift">
							<option value="select" >select</option>
							<?php foreach($all_shift as $each_shift){?>
							<option value="<?php echo $each_shift->id?>" <?php if( $each_employee->shift == $each_shift->id) echo "selected='selected'" ?>><?php echo $each_shift->shift_name?></option>
							
							<?php }?>
                            </select>
						</td>
						<th align="center">Email</th>
                       <td align="center"style="width:30%" colspan="">                           
							<input type="text" id="email" value = "<?php echo $each_employee->email?>" name="email" class="form-control custom-input">
						</td>
                    </tr> 		
					<tr>
                       <th align="center">Blood Group</th>
                       <td align="center"style="width:30%" >                           
                            <select name="blood_group" class="form-control col-sm-6 custom-input" id="blood_group">
                                <option value="select">select</option>
                                <option <?php if($each_employee){ if($each_employee->blood_group == 'A+'){?> selected="selected" <?php }}?> value="A+">A+</option>
                                <option <?php if($each_employee){ if($each_employee->blood_group == 'A-'){?> selected="selected" <?php }}?> value="A-">A-</option>
                                <option <?php if($each_employee){ if($each_employee->blood_group == 'B+'){?> selected="selected" <?php }}?> value="B+">B+</option>
                                <option <?php if($each_employee){ if($each_employee->blood_group == 'B-'){?> selected="selected" <?php }}?> value="B-">B-</option>
                                <option <?php if($each_employee){ if($each_employee->blood_group == 'O+'){?> selected="selected" <?php }}?> value="O+">O+</option>
                                <option <?php if($each_employee){ if($each_employee->blood_group == 'O-'){?> selected="selected" <?php }}?> value="O-">O-</option>
                                <option <?php if($each_employee){ if($each_employee->blood_group == 'AB+'){?> selected="selected" <?php }}?> value="AB+">AB+</option>
                                <option <?php if($each_employee){ if($each_employee->blood_group == 'AB-'){?> selected="selected" <?php }}?> value="AB-">AB-</option>
                            </select>
					   </td>
					   <th align="center">Joining Date*</th>
                       <td align="center"style="width:30%" >                           
                            <input type="text" id="joining_date" name="joining_date" value="<?php echo $each_employee->joining_date?>" class="form-control custom-input dateFrom" required>
					   </td>
                    </tr> 		
					<tr>
                       <th align="center">Contact No*</th>
                       <td align="center"style="width:30%" >                           
                            <input type="text" id="contact_no" name="contact_no" value="<?php echo $each_employee->contact_no?>" class="form-control custom-input" required>
					   </td>
					   <th align="center">Date of Birth</th>
                       <td align="center"style="width:30%" >                           
                            <input type="text" id="date_of_birth" value="<?php echo $each_employee->date_of_birth?>" name="date_of_birth" class="form-control custom-input dateFrom">
					   </td>
                    </tr> 		
					<tr>
                       <th align="center">Status*</th>
                       <td align="center"style="width:30%" >                           
                            <select required name="status" value="<?php echo $each_employee->status?>" class="form-control col-sm-6 custom-input" id="status">
                                <option value="select">select</option>
                                <option  <?php if($each_employee){ if($each_employee->status == '1'){?> selected="selected" <?php }}?> value = "1" >Active</option>
                                <option  <?php if($each_employee){ if($each_employee->status == '0'){?> selected="selected" <?php }}?> value = "0" >Inactive</option>
                            </select>
					   </td>
					   <th align="center">Present Address</th>
                       <td align="center"style="width:30%" >                           
                            <input type="text" id="present_address" name="present_address" value="<?php echo $each_employee->present_address?>" class="form-control custom-input">
					   </td>
                    </tr> 		

					<tr>
                       <th align="center">Permanent Address</th>
                       <td align="center"style="width:30%" >                           
                            <input type="text" id="permanent_address" name="permanent_address" value="<?php echo $each_employee->permanent_address?>" class="form-control custom-input">
					   </td>
					 <tr> 
		<?php if($each_employee->imagePath){
		?>
                         <th align="center">Upload Image*</th>
                       <td align="center"style="width:30%"> 

                            <img src="<?php echo base_url().$each_employee->imagePath?>" height="100" width="80"> 
                             <a href="<?php echo base_url();?>Employee/delete_image/<?php echo $each_employee->id?>" target= "_blank">delete image</a>

                      </td>

                      <?php }

                      else{?>
                         <th align="center">Upload Image*</th>
                       <td align="center"style="width:30%"> 
 						<input type="file" class="span6"   name="image_location">

                      </td>
                      <?php }?>

                    </tr>
					<tr>
                       <th align="center">Line Manager*</th>
                       <td align="center"style="" >                           
                            <select name="line_manager" class="form-control col-sm-3 custom-input" test = "<?php echo $each_employee->line_manager; ?>" id="line_manager">
							<option value="select" >select</option>
								<?php foreach($all_employee as $each_employe){?>
									<option <?php if($each_employe->employee_id == $each_employee->line_manager){echo 'selected = "selected"'; }?> value="<?php echo $each_employe->employee_id?>" >
										<?php echo $each_employe->first_name." ".$each_employe->last_name?>
									</option>
							
							<?php }?>
                            </select>
					   </td>                  
                       <th align="center">Weekend*</th>
                       <td align="center"style="width:30%" >                           
                            <select name="weekend" class="form-control col-sm-6 custom-input" id="weekend">
                                <option value="select">select</option>
                                <option <?php if($each_employee){ if($each_employee->weekend == 'Fri'){?> selected="selected" <?php }}?> value="Fri">Friday</option>
                                <option <?php if($each_employee){ if($each_employee->weekend == 'Sat'){?> selected="selected" <?php }}?> value="Sat">Saturday</option>
                                <option <?php if($each_employee){ if($each_employee->weekend == 'Sun'){?> selected="selected" <?php }}?> value="Sun">Sunday</option>
                                <option <?php if($each_employee){ if($each_employee->weekend == 'Mon'){?> selected="selected" <?php }}?> value="Mon">Monday</option>
                                <option <?php if($each_employee){ if($each_employee->weekend == 'Tue'){?> selected="selected" <?php }}?> value="Tue">Tuesday</option>
                                <option <?php if($each_employee){ if($each_employee->weekend == 'Wed'){?> selected="selected" <?php }}?> value="Wed">Wednesday</option>
                                <option <?php if($each_employee){ if($each_employee->weekend == 'Thu'){?> selected="selected" <?php }}?> value="Thu">Thusday</option>
                            </select>
					   </td>               
					   <td align="center" style="" >                           
                            <input type="hidden" id="id" name="id" value="<?php echo $each_employee->id?>" class="form-control custom-input">
					   </td>
                    </tr> 				
					<tr> 				
					   <th align="center">Remarks</th>
                       <td align="center"style="" >                           
                            <input type="text" id="remarks" name="remarks" value="<?php echo $each_employee->remarks?>" class="form-control custom-input">
					   </td>                
					   <td align="center"style="">                           
                            <input type="hidden" id="id" name="id" value="<?php echo $each_employee->id?>" class="form-control custom-input">
					   </td>
                    </tr> 		


					<tr>
                        <th></th> <th></th> <th></th>
                       <td font-size="24"><input type="submit"id="btn_update_employee" class="btn btn-success" value='Update Employee'/></td>                      
					  
                    </tr>					
           

					</tbody>
					
					</table>
					</form>
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



  function form_validation()
  {
    //alert("validation");
    
    if($('#employee_id').val().trim() == "")
    {
      alert("Please Insert Employee ID");
      $('#employee_id').focus();
      return false;
    }   
    else if($('#department').val().trim() == "select")
    {
      alert("Please Select Department.");
      $('#department').focus();
      return false;
    }     
    else if($('#first_name').val().trim() == "")
    {
      alert("Please Insert First Name.");
      $('#first_name').focus();
      return false;
    }     
    else if($('#last_name').val().trim() == "")
    {
      alert("Please Insert Last Name.");
      $('#last_name').focus();
      return false;
    }     
    else if($('#fatherName').val().trim() == "")
    {
      alert("Please Insert Father Name.");
      $('#fatherName').focus();
      return false;
    }     
    else if($('#motherName').val().trim() == "")
    {
      alert("Please Insert Mother Name.");
      $('#motherName').focus();
      return false;
    }     
    else if($('#employType').val().trim() == "select")
    {
      alert("Please Select Employee Type.");
      $('#employType').focus();
      return false;
    }     
    else if($('#employGrade').val().trim() == "select")
    {
      alert("Please Select Employee Grade.");
      $('#employGrade').focus();
      return false;
    }     
    else if($('#deviceID').val().trim() == "select")
    {
      alert("Please Select Device ID.");
      $('#deviceID').focus();
      return false;
    }   
    else if($('#designation').val().trim() == "select")
    {
      alert("Please Select Designation.");
      $('#designation').focus();
      return false;
    }   
    else if($('#card_id').val().trim() == "")
    {
      alert("Please Insert Card ID.");
      $('#card_id').focus();
      return false;
    }     
    else if($('#group_id').val().trim() == "select")
    {
      alert("Please Select Group ID.");
      $('#group_id').focus();
      return false;
    }     
    else if($('#shift').val().trim() == "select")
    {
      alert("Please Select Shift");
      $('#shift').focus();
      return false;
    }     
    else if($('#unit').val().trim() == "select")
    {
      alert("Please Select Unit");
      $('#unit').focus();
      return false;
    }     
    else if($('#blood_group').val().trim() == "select")
    {
      alert("Please Select Blood Group");
      $('#blood_group').focus();
      return false;
    }     
    else if($('#joining_date').val().trim() == "")
    {
      alert("Please Insert Joining Date");
      $('#joining_date').focus();
      return false;
    }     
    else if($('#contact_no').val().trim() == "")
    {
      alert("Please Insert Contact No.");
      $('#contact_no').focus();
      return false;
    }     
    else if($('#date_of_birth').val().trim() == "")
    {
      alert("Please Insert Date of Birth.");
      $('#date_of_birth').focus();
      return false;
    }     
    else if($('#status').val().trim() == "select")
    {
      alert("Please Select Status.");
      $('#status').focus();
      return false;
    }     
    else if($('#present_address').val().trim() == "")
    {
      alert("Please Insert Present Address.");
      $('#present_address').focus();
      return false;
    }     
    else if($('#permanent_address').val().trim() == "")
    {
      alert("Please Insert Permanent Address.");
      $('#permanent_address').focus();
      return false;
    }   
  
    else if($('#remarks').val().trim() == "")
    {
      alert("Please Insert Remarks.");
      $('#remarks').focus();
      return false;
    }
    return true;
  }
    $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
    $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
    $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
});
</script>
