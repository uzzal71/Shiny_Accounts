
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Holiday List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">From Date</th>
                        <th align="center">To Date</th>
                        <th align="center">Description</th>
                        <th align="center">Type</th>
                        <th align="center">Recorded By</th>
                        <th align="center">Recording Time</th>
						<th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							
							<?php $id=1;
							foreach($all_holiday_list as $each_holiday){?>
                            <tr>
							
                                <td><?php echo $id++?></td>
                                <td><?php echo $each_holiday->from_date?></td>
                                <td><?php echo $each_holiday->to_date?></td>
                                <td><?php echo $each_holiday->description?></td>
                                <td><?php echo $each_holiday->type?></td>
                                <td><?php echo $each_holiday->recorded_by?></td>
                                <td><?php echo $each_holiday->recording_time?></td>
                               
                                
                                <td width="130px">
                                    <a href="<?php echo base_url()?>Holiday/edit_holiday/<?php echo $each_holiday->id?>">
									<img style="margin: 3%" border="0"title="See Details" alt="Edit"
                                    src="<?php echo base_url();?>images/edit.png"width="25" height="20"></a>
                                    <a href="<?php echo base_url()?>Holiday/delete_holiday/<?php echo $each_holiday->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>
                                </td>
								
							
                            </tr>
							<?php }?>


                           
								<?php if($all_holiday_list==null){?>
                          
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



