
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Leave List</h3>
			
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
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
						<th align="center">From</th>
                        <th align="center">To</th>
                        <th align="center">No of Days</th>
                        <th align="center">Leave Type</th>
                        <th align="center">Status</th>
                        <th align="center">Remarks</th>
                        <th align="center">Recorded By</th>
                        <th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php
							$serial_no=0;
							foreach($all_apply_leave as $each_apply_leave){
								$serial_no++?>
                            <tr>
							
                                <td><?php echo $serial_no;?></td>
                                <td><?php echo $each_apply_leave->date_time_from?></td>
								<td><?php echo $each_apply_leave->date_time_to?></td>
                                <td><?php echo $each_apply_leave->no_of_days?></td>
                                <td><?php echo $each_apply_leave->leave_types?></td>
								<td><?php if($each_apply_leave->approval_status == 0){echo 'Pending';}else{echo 'Approved';}?></td>
								<td><?php echo $each_apply_leave->remarks?></td>
								<td><?php echo $each_apply_leave->recorded_by?></td>
                                
								<?php if($each_apply_leave->approval_status == 0){?>
                                <td width="130px">
									<a href="<?php echo base_url();?>leave/edit_apply_leave/<?php echo $each_apply_leave->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
                                    <a href="<?php echo base_url();?>leave/delete_apply_leave/<?php echo $each_apply_leave->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                </td>
								<?php }?>
								
							
                            </tr>
							<?php }?>
                                <tr>
                                    <td colspan="5" align="center">
                                        No More Data Available
                                    </td>
                                </tr>
                         
                            </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
	                            <script>
                                $(document).ready(function () {
                                    var deleteButton='deleteButton' + '{{ $employee->id }}' ;
                                    var deleteEmployee='deleteEmployee' + '{{ $employee->id }}' ;
                                    $('#'+deleteButton).click(function () {
                                        $('#'+deleteEmployee).submit();
                                        return false;
                                    })
                                })
                            </script>


