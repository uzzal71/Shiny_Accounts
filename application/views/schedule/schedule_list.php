
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-8 col-md-offset-3" style="background-color: #9acfea;padding: 1px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Schedule List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center"><b>SL</b></th>
                        <th align="center"><b>Schedule Name</b></th>
                        <th align="center"><b>Schedule Time</b></th>
                        <th align="center"><b>Action</b></th>
                    </tr>
                    </thead>
                   
                            <tbody>
							<?php
                            $sl = 0; foreach($schedule_list as $each_schedule){
                                $sl++;?>
                            <tr>
                                <td><?php echo $sl?></td>
                                <td><?php echo $each_schedule->scheduleName?></td>
                                <td><?php echo $each_schedule->scheduleTime?></td>
                               <td width="130px"><a href="<?php echo base_url();?>Schedule/edit_schedule/<?php echo $each_schedule->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
                                    <a href="<?php echo base_url();?>Schedule/delete_schedule/<?php echo $each_schedule->id?>" id="" onclick="return confirm('Are you sure?')">
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


