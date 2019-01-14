
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Leave Type List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Leave Full Name</th>
                        <th align="center">Leave Short Name</th>
                        <th align="center">Recorded By</th>
                        <th align="center">Recording Time</th>                       
						<th align="center">Updated By</th>
                        <th align="center">Updating Time</th>
						<th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php
							$serial_no=0;
							foreach($all_leave_types as $each_leave_types){
							$serial_no++;	
							?>
                            <tr>
							
                                <td><?php echo $serial_no?></td>
                                <td><?php echo $each_leave_types->leave_full_name?></td>
                                <td><?php echo $each_leave_types->leave_short_name?></td>
                                <td><?php echo $each_leave_types->recorded_by?></td>
                                <td><?php echo $each_leave_types->recording_time?></td>          
								<td><?php echo $each_leave_types->updated_by?></td>
                                <td><?php echo $each_leave_types->updating_time?></td>
                               
                                
                                   <td width="130px">
									<a href="<?php echo base_url()?>leave/edit_leave_type/<?php echo $each_leave_types->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="#" width="25" height="20"></a>
									
                                    <a href="<?php echo base_url()?>leave/delete_leave_type/<?php echo $each_leave_types->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                </td>
								
							
                            </tr>
							<?php }?>


                           
								<?php if($all_leave_types==null){?>
                          
                                <tr>
                                    <td colspan="5" align="center">
                                        No Data Available
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


