
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Designation List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Designation Name</th>
                        <th align="center">Is Active</th>
                        <th align="center">Recorded By</th>
                        <th align="center">Recording Time</th>
						<th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php
							$serial = 0;
							foreach($all_designation as $each_designation){
								$serial++;
							?>
							
                            <tr>
							
                                <td><?php echo $serial?></td>
                                <td><?php echo $each_designation->designation_name?></td>
                                <td><?php echo $each_designation->is_active?></td>
                                <td><?php echo $each_designation->recorded_by?></td>
                                <td><?php echo $each_designation->recording_time?></td>
                               
                                
                                 <td width="130px">
									
									<a href="<?php echo base_url()?>Designation/edit_designation/<?php echo $each_designation->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
									
                                    <a href="<?php echo base_url()?>Designation/delete_designation/<?php echo $each_designation->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                </td>
								
							
                            </tr>
							<?php }?>


                           
								<?php if($all_designation == null){?>
                          
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


