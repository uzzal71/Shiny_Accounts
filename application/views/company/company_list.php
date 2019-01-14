
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Company List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Company ID</th>
                        <th align="center">Short Name</th>
                        <th align="center">Full Name</th>
                        <th align="center">Address</th>
                        <th align="center">Recorded By</th>
                        <th align="center">Recording Time</th>
						<th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php
							$serial_no = 0;
							foreach($all_company as $each_company){
							$serial_no++;	
							?>
                            <tr>
							
                                <td><?php echo $serial_no?></td>
                                <td><?php echo $each_company->company_id?></td>
                                <td><?php echo $each_company->short_name?></td>
                                <td><?php echo $each_company->full_name?></td>
                                <td><?php echo $each_company->address?></td>
                                <td><?php echo $each_company->recorded_by?></td>
                                <td><?php echo $each_company->recording_time?></td>
                               
                                
                                   <td width="130px">
									<a href="<?php echo base_url()?>Company/edit_company/<?php echo $each_company->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
									
                                    <a href="<?php echo base_url()?>Company/delete_company/<?php echo $each_company->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                </td>
								
							
                            </tr>
							<?php }?>


                           
								<?php if($all_company==null){?>
                          
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



