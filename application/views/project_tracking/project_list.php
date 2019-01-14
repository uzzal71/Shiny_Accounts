
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Project List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center"><b>SL#</b></th>
                        <th align="center"><b>Project ID</b></th>
                        <th align="center"><b>Project Name</b></th>
                        <th align="center"><b>Project Manager</b></th>
                        <th align="center"><b>Customer ID</b></th>
                        <th align="center"><b>Customer Name</b></th>
                        <th align="center"><b>Recorded By</b></th>
                        <th align="center"><b>Action</b></th>
                        <th align="center"><b>If Finished</b></th>  
                    </tr>
                    </thead>
					<?php $serial_no=0;?>
                            <tbody>
							<?php foreach($all_project as $each_project){
								$serial_no++?>
                            <tr>
                                <td><?php echo $serial_no?></td>
								<td><?php echo $each_project->project_id?></td>
                                <td><?php echo $each_project->project_name?></td>
                                <td><?php echo $each_project->project_manager?></td>
                                <td><?php echo $each_project->customer_id?></td>
                                <td><?php echo $each_project->customer_name?></td>
                                <td><?php echo $each_project->recorded_by?></td>
                               <td width="130px">
                                    <a href="<?php echo base_url()?>project_tracking/details_view/<?php echo $each_project->id?>"> <img style="margin: 3%" border="0"title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/details.png"width="25" height="20">
									</a> 
									
									<a href="<?php echo base_url()?>project_tracking/edit_project/<?php echo $each_project->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20">
									</a>
									
                                    <a href="<?php echo base_url()?>project_tracking/delete_project/<?php echo $each_project->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                </td>
								<?php if($each_project->project_status == "Running"){?>
                              <td>  <a href = "<?php echo base_url();?>project_tracking/finish_project/<?php echo $each_project->id;?>"> <button type="submit" class="btn btn-danger" >Finish</button></a> </td>
								<?php } else{?>
                              <td>  <a href = "#"> <button type="submit" class="btn btn-success" >Finished</button></a> </td>
                              <?php }?>
                            </tr>
							<?php }?>
	
                         
                            </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
	