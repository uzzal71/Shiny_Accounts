
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 style="text-align:center"> Employee Profile</h3>
			
					
                <table class="table table-bordered">
                    <tbody>
                  
					<tr>
                        <th align="center">Employee ID</th> <td><?php echo $each_employee->employee_id?></td>
					</tr> 			

					<tr>
                        <th align="center">First Name</th> <td><?php echo $each_employee->first_name?></td>
					</tr>         
					<tr>
                        <th align="center">Last Name</th> <td><?php echo $each_employee->last_name?></td>
					</tr>             
					<tr>
                        <th align="center">Department</th> <td><?php echo $each_employee->department?></td>
					</tr>               
					<tr>
                        <th align="center">Father Name</th> <td><?php echo $each_employee->fatherName?></td>
					</tr> 	
					<tr>
                        <th align="center">Mother Name</th> <td><?php echo $each_employee->motherName?></td>
					</tr>
					<tr>
                        <th align="center">Employee Type</th> <td><?php echo $each_employee->employType?></td>
					</tr>					
            
					<tr>
                        <th align="center">Grade</th> <td><?php echo $each_employee->employGrade?></td>
					</tr>      
					<tr>
                        <th align="center">Device ID</th> <td><?php echo $each_employee->deviceID?></td>
					</tr>  
					<tr>
                        <th align="center">Designation</th> <td><?php echo $each_employee->designation?></td>
					</tr> 					
					<tr>	
					<tr>
                        <th align="center">Card ID</th> <td><?php echo $each_employee->card_id?></td>
					</tr> 					
					<tr>		
					<tr>
                        <th align="center">NID/Birth Reg/Photo ID</th> <td><?php echo $each_employee->nid?></td>
					</tr> 					
					<tr>		
					<tr>
                        <th align="center">Shift</th> <td><?php echo $each_employee->shift?></td>
					</tr>				
					<tr>
                        <th align="center">Email</th> <td><?php echo $each_employee->email?></td>
					</tr>				
					<tr>
                        <th align="center">Blood Group</th> <td><?php echo $each_employee->blood_group?></td>
					</tr> 					
					<tr>			
					<tr>
                        <th align="center">Joining Date</th> <td><?php echo $each_employee->joining_date?></td>
					</tr> 					
					<tr>
                        <th align="center">Contact No</th> <td><?php echo $each_employee->contact_no?></td>
					</tr>         
					<tr>
                        <th align="center">Date of Birth</th> <td><?php echo $each_employee->date_of_birth?></td>
					</tr>      
					<tr>
                        <th align="center">Status</th> <td><?php if($each_employee->status == 1){echo "Active";}else{echo "Inactive";} ?></td>
					</tr>        
					<tr>
                        <th align="center">Present Address</th> <td><?php echo $each_employee->present_address?></td>
					</tr> 		

					<tr>
                        <th align="center">Permanent Address</th> <td><?php echo $each_employee->permanent_address?></td>
					</tr>        
					<tr>
                        <th align="center">Image</th> <td> <img src="<?php echo base_url().$each_employee->imagePath?>" alt="<?php echo $each_employee->first_name?>'s Image."></td>
					</tr> 		
					<tr>
                        <th align="center">Remarks</th> <td><?php echo $each_employee->remarks?></td>
					</tr>        
	
            
                    </tbody>
              
                        
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
	                


