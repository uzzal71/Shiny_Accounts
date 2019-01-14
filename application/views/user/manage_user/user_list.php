
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> User List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Employee ID</th>
                        <th align="center">Employee Name</th>
                        <th align="center">Action</th>
                        
                        <th align="center">Company ID</th>
                        <th align="center">Recorded By</th>
                        <th align="center">Recording Time</th>
						
                    </tr>
                    </thead>
               
                            <tbody>
							
							<?php $serial=0;
							foreach($all_user as $each_user){
								$serial++?>
                            <tr>
                                <td><?php echo $serial?></td>
                                <td><?php echo $each_user->user_name?></td>
                                <td><?php echo $each_user->full_name?></td>
                                   <td width="130px">
                                    <a href="<?php echo base_url()?>User/edit_user/<?php echo $each_user->id?>">
                                    <img style="margin: 3%" border="0"title="See Details" alt="Edit"
                                    src="<?php echo base_url();?>images/edit.png"width="25" height="20"></a>
                                    <a href="<?php echo base_url()?>User/delete_user/<?php echo $each_user->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>
                                </td>
                                
                                <td><?php echo $each_user->company_id?></td>
                                <td><?php echo $each_user->recorded_by?></td>
                                <td><?php echo $each_user->recording_time?></td>
                               
                                
                             
								
							
                            </tr>
							<?php }?>


                           
								<?php if($all_user==null){?>
                          
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



