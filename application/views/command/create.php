<style>
.modal-body {
    position: relative;
    overflow-y: auto;
    max-height: 400px;
    max-width: 800px;
    padding: 15px;
}
</style>
    <br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Submit Command </div>
                <br>
           
           
                    <div class="col-xs-12 col-sm-10 col-md-10">
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
                      <form name="save_command" class="form-horizontal"  action="<?php echo base_url(); ?>Command/save_new_command" method="post">  
                        <label for="actionCode" style="margin-top: 4px">Select Command</label>
                        <select required name="actionCode" class="form-control col-sm-7 custom-input" id="userType">
                            <option value="">Select</option>
                            <option value="1">Download Attendance Data</option>
                            <option value="2">Download Employee Data</option>
                            <option value="3">Update Device Time</option>
                            <option value="11">Check Memory Info</option>
                            <option value="10">Erase Device Data</option>
                            <option value="12">Sync Employee</option>
                            <option value="13">Erase All Employee</option>
                        </select><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs">
                        <input type="hidden" name="recorded_by" value=" ">
                        <input type="hidden" name="recoring_time" value="">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-10"></div><br>
                    <div class="form-group col-sm-12 col-md-8">
                        <label for="permittedActions" class="col-sm-12 col-md-12" style="margin-top: 4px">Select Devices</label><br class="hidden-xs"><br>
                        <div class="col-sm-12 col-md-12 role_list pull-left form-group pre-scrollable scrollable-checkbox" >
                            <div  style="height: 200px">
                                <?php foreach($all_devices as $each_device){?>
                                        <input type="checkbox" class="checkBoxClass" name="deviceId[]" 
                                        value="<?php echo $each_device->DevId?>" id="">
                                        <label for="<?php echo $each_device->DevId?>"><?php echo $each_device->DevId?> </label><br>
                                        <?php }?>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="status" value="1">
                    <br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <div>
                                <div class="col-sm-12 col-md-6" style="margin-left: 31px;margin-top: 17px">
                                    <input class="check-all" type="checkbox" name="" id="ckbCheckAll">
                                    <label for="ckbCheckAll">&nbsp Select All</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- RECORDING TIME AND RECORDED BY-->
            <tr>
            <td>
            <input type="hidden" id="recording_time" name="recording_time" value="<?php  echo date("y-m-d h:i:s");?>" class="form-control custom-input" required>
            <input type="hidden" id="recorded_by" name="recorded_by" value="<?php echo $this->session->userdata("id")?>" class="form-control custom-input" required>
            </td>
            
            </tr>
            <button type="submit" class="btn btn-info pull-left pull-right" style="margin: 10px 3px;">Submit Command</button>

                <a href= "<?php echo base_url();?>Device/employee_sync_add" target = "_blank">
                                            <button type="button" class="btn btn-success" style="padding: 6px 20px;margin: 10px 50px;" >Sync Device</button>
                                        </a>
                  <br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs">
                    <div class="form-horizontal">
                        <div class="form-group">

                            <div class="col-xs-4 col-sm-4 col-md-10">
                            <table>
                                <tr style="margin-bottom:10px; ">

                                    <td >
                                        <a href= "<?php echo base_url();?>Device/add_new_device" target = "_blank">
                                            <button type= "button" class="btn btn-info" style="padding: 8px 20px;margin: 4px 3px;" >Create Device</button>
                                        </a>
                                    </td>

                                    <td style="min-width: 150px; ">
                                        <a href= "<?php echo base_url();?>Employee/create" target = "_blank">
                                            <button type= "button" class="btn btn-info" style=" padding: 8px 20px; margin: 4px 3px;"  >Create Employee</button>    
                                        </a>
                                    </td> 

                                    <td>

                                        <a href= "<?php echo base_url();?>Schedule/create" target = "_blank">
                                            <button type= "button" class="btn btn-info" style="padding: 8px 20px; margin: 4px 3px;" >Create Schedule</button>
                                        </a>
                                    </td>

                                </tr>

                                <tr>

                                    <td>
                                        <a href= "<?php echo base_url();?>Device/device_list" target = "_blank">
                                            <button type= "button" class="btn btn-info" style="padding: 8px 18px;margin: 4px 3px;" >Update Device</button>
                                        </a>
                                    </td>

                                    <td>
                                        <a href= "<?php echo base_url();?>Employee/employee_list" target = "_blank">
                                            <button type= "button" class="btn btn-info" style="padding: 8px 18px;margin: 4px 3px;" >Update Employee</button>    
                                        </a>
                                    </td> 

                                    <td>

                                        <a href= "<?php echo base_url();?>Schedule/schedule_list" target = "_blank">
                                            <button type= "button" class="btn btn-info" style="padding: 8px 19px;margin: 4px 3px;" >Update Schedule</button>
                                        </a>
                                    </td>
                                </tr>

                                <tr> 
   
                                    <td>

                                        <a data-toggle="modal" href="#" data-target="#myModal_device">
                                            <button type= "button" class="btn btn-info" style=" padding: 8px 20px; margin: 4px 3px;margin: 4px 3px;" >Device Delete</button>
                                        </a>
                                    </td>

                                    <td>
                                        <a data-toggle="modal" href="#" data-target="#myModal_employee">
                                            <button type= "button" class="btn btn-info pull-left" style=" padding: 8px 21px;margin: 4px 3px;">Employee Delete</button>
                                        </a>
                                    <td>
                                        <a data-toggle="modal" href="#" data-target="#myModal_schedule">
                                            <button type= "button" class="btn btn-info" style=" padding: 8px 21px;margin: 4px 3px;">Delete Schedule</button>
                                        </a>
                                    </td>
                                </tr>     
                                </div>

                            </table>


<!--Employee Delete Modal start -->
<div class="modal fade" id="myModal_employee" tabindex="-12" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Employee List</h4>

            </div>
            <div class="modal-body"><div class="te">
                

    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-12 col-md-offset-0" style="background-color: #9acfea;padding: 1px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
            <h3 align="center" style = "background-color: lightblue;"> Employee List</h3>
            
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
                     <th align="center">Action</th>
                        <th align="center">SL#</th>
                        <th align="center">Employee ID</th>
                        <th align="center">Employee Name</th>
                        <th align="center">Card No</th>
                        <th align="center">Department</th>
                        <th align="center">Designation</th>
                       
                    </tr>
                    </thead>
               
                            <tbody>
                            <?php
                            $serial_no=0;
                            foreach($all_employee as $each_employee){
                                $serial_no++?>
                            <tr>
                                                            <td width="130px">

                                    <a href="<?php echo base_url();?>Employee/delete_employee/<?php echo $each_employee->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>
                                </td>
                                
                                <td><?php echo $serial_no;?></td>
                                <td><?php echo $each_employee->employee_id?></td>
                                <td><?php echo $each_employee->first_name." ".$each_employee->last_name?></td>
                                <td><?php echo $each_employee->card_id?></td>
                                <td><?php echo $each_employee->department?></td>
                                <td><?php echo $each_employee->designation?></td>
                                
                            </tr>
                            <?php }?>

                         
                            </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>




            </div></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
 <!--Employee Delete Modal End -->


<!--Device Delete Modal start -->
<div class="modal fade" id="myModal_device" tabindex="-12" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Device List</h4>

            </div>
            <div class="modal-body"><div class="te">
                


    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-12 col-md-offset-0" style="background-color: #9acfea;padding: 1px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
            <h3 align="center" style = "background-color: lightblue;"> Device List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">Action</th>
                        <th align="center">SL#</th>
                        <th align="center">Device ID</th>
                        <th align="center">Device Name</th>
                        <th align="center">Device Type</th>
                        <th align="center">Slave</th>
                        <th align="center">IP Address</th>
                        <th align="center">Location</th>
                        
                    </tr>
                    </thead>
                            <tbody>
                            <?php
                            $serial = 0;
                            foreach($all_devices as $each_device){
                                $serial++;?>
                            <tr>
                                 <td width="130px">

                                    <a href="<?php echo base_url()?>Device/delete_device/<?php echo $each_device->id; ?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                </td>
                                <td><?php echo $serial?> </td>
                                <td><?php echo $each_device->DevId?> </td>
                                <td><?php echo $each_device->DeviceName?></td>
                                <td><?php echo $each_device->type?></td>
                                <?php if($each_device->Slave== '1'){$slave = 'Yes';}else{$slave = 'No';}?>
                                <td><?php echo $slave?></td>
                                <td><?php echo $each_device->IpAddress?></td>
                                <td><?php echo $each_device->location?></td>
                                

                            </tr>
                            
                            <?php }?>

                          
                            <tr>
                                <td colspan="5" align="center">
                                    No Data Available
                                </td>
                            </tr>
                       
                     </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>



            </div></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- <!--Device Delete Modal End --> 





<!--Schedule Delete Modal start -->
<div class="modal fade" id="myModal_schedule" tabindex="-12" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Schedule List</h4>

            </div>
            <div class="modal-body"><div class="te">
                



    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-12 col-md-offset-0" style="background-color: #9acfea;padding: 1px;max-height: 450px;overflow: scroll">
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








            </div></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- <!--Schedule Delete Modal End --> 
















                            </div>
                        </div>
                    </div>
                    <br>
               </form>
              
            </div>
        </div>
    </div>

    
    <script type="text/javascript">
    $(document).ready(function() {

     $("#ckbCheckAll").click(function () {
        if (this.checked)
            $(".checkBoxClass").prop('checked', "checked");
        if(this.unchecked)
            $(".checkBoxClass").removeProp('checked');
    });

         $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
    $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
    $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });

    });

</script>