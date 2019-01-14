
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> User Role List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">User Role Name</th>
                        <th align="center">Parent ID</th>
                        <th align="center">URL Link</th>
                        <th align="center">Recorded By</th>
                        <th align="center">Recording Time</th>
						<th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php
							$serial_no=0;
							foreach($all_user_role as $each_user_role){
							$serial_no++;	
							?>
                            <tr>
							
                                <td><?php echo $serial_no?></td>
                                <td><?php echo $each_user_role->user_role_name?></td>
                                <td><?php echo $each_user_role->parent_id?></td>
                                <td><?php echo $each_user_role->url_link?></td>
                                <td><?php echo $each_user_role->recorded_by?></td>
                                <td><?php echo $each_user_role->recording_time?></td>
                               
                                
                                   <td width="130px">
									<a href="<?php echo base_url()?>user/edit_user_role/<?php echo $each_user_role->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
									
                                    <a href="<?php echo base_url()?>user/delete_user_role/<?php echo $each_user_role->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                </td>
								
							
                            </tr>
							<?php }?>


                           
								<?php if($all_user_role==null){?>
                          
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
                                    var deleteButton='deleteButton' + '{{ $user_role->id }}' ;
                                    var deleteEmployee='deleteuser_role' + '{{ $user_role->id }}' ;
                                    $('#'+deleteButton).click(function () {
                                        $('#'+deleteEmployee).submit();
                                        return false;
                                    })
                                })
                            </script>


