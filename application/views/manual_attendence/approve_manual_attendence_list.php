
    <br><br>
    <div class="row">
        <div  class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div>
                <table class="table table-bordered" style="background: white;">
                    <thead>
                    <tr>
                        <th align="center" style="width: 15px;">SL#</th>
                        <th align="center">Employee ID</th>
                        <th align="center">Employee Name</th>
                        <th align="center">In Time</th>
                        <th align="center">Out Time</th>
                        <th align="center">Date</th>
                        <th align="center">Remarks</th>
                        <th align="center">Status</th>
						<th align="center" style="min-width: 180px;">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php
                            if ($all_pending_manual_attendence!=="") {
                                # code...
                            
								$serial_no=0;
								foreach($all_pending_manual_attendence as $each_pending_manual_attendence){
									$serial_no++;
								?>
                            <tr>
							
								<td  style="width: 15px;" ><?php echo $serial_no?></td>
								<td><?php echo $each_pending_manual_attendence->employee_id?></td>
								<td><?php echo $each_pending_manual_attendence->employee_name?></td>
                                <td><?php echo $each_pending_manual_attendence->in_time?></td>
                                <td><?php echo $each_pending_manual_attendence->out_time?></td>
								<td><?php echo $each_pending_manual_attendence->date?></td>
								<td><?php echo $each_pending_manual_attendence->remarks?></td>
								<td><?php echo "Pending"?></td>
                               
                                
                                   <td style="min-width: 180px;">

                                  <a href="<?php echo base_url()?>manual_attendence/view_pending_attendence/<?php echo $each_pending_manual_attendence->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/details.png" width="25" height="20"></a>

                                    <a href="<?php echo base_url()?>manual_attendence/edit_pending_attendence/<?php echo $each_pending_manual_attendence->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
                                    <a href="<?php echo base_url()?>manual_attendence/approve_manual_attendence/<?php echo $each_pending_manual_attendence->id?>"><button class="btn btn-success">Approve</button></a>

                                </td>
								
							
                            </tr>
							<?php }} else{?>
                          
                                <tr>
                                    <td colspan="5" align="center">
                                        No Data Available
                                    </td>
                                </tr>
                         <?php } ?>
                            </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>


