
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Pending Attendance List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Employee ID</th>
                        <th align="center">Employee Name</th>
                         <th align="center">In Time</th>
                        <th align="center">Out Time</th>
                        <th align="center">Remarks</th>
                        <th align="center">Status</th>
						<th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php
								$serial_no=0;
								foreach($all_pending_manual_attendence as $each_pending_attendence){
									$serial_no++;
								?>
                            <tr>
							
								<td><?php echo $serial_no?></td>
								<td><?php echo $each_pending_attendence->employee_id?></td>
								<td><?php echo $each_pending_attendence->employee_name?></td>
								<td><?php echo $each_pending_attendence->in_time?></td>
                                <td><?php echo $each_pending_attendence->out_time?></td>
								<td><?php echo $each_pending_attendence->remarks?></td>
								<td><?php echo "Pending"?></td>
                               
                                
                                   <td width="130px">
									
									<a href="<?php echo base_url()?>manual_attendence/edit_pending_attendence/<?php echo $each_pending_attendence->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
									
                                    <a href="<?php echo base_url()?>manual_attendence/delete_manual_attendence/<?php echo $each_pending_attendence->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                </td>
								
							
                            </tr>
							<?php }?>

                         
                            </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
	                            <script>
                                $(document).ready(function () {
                                    var deleteButton='deleteButton' + '{{ $department->id }}' ;
                                    var deleteEmployee='deleteDepartment' + '{{ $department->id }}' ;
                                    $('#'+deleteButton).click(function () {
                                        $('#'+deleteEmployee).submit();
                                        return false;
                                    })
                                })
                            </script>


