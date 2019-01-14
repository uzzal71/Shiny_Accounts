
    <br><br>
    <div class="row">
        <div class="col-md-4 col-md-offset-5">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Update Schedule</div>
                <br>
               <div>
            <form role="form" action="<?php echo base_url();?>Schedule/update_schedule" method="post">
                <div class="col-xs-12 col-sm-6 col-md-8">
                    <label for="scheduleName" style="margin-top: 4px">Schedule Name</label>
                    <input type="text" id="scheduleName" name="scheduleName" class="form-control custom-input" value="<?php echo $each_schedule->scheduleName?>"
                           placeholder="Schedule Name" required>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8">
                    <label for="dateFrom" style="margin-top: 4px">Schedule Time</label>
                    <input type="text" id="dateFrom" name="scheduleTime" class="form-control custom-input dateTimeFrom" value="<?php echo $each_schedule->scheduleTime?>"
                           placeholder="Schedule Time" required>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-10"></div><br>
                <div class="form-group col-sm-12 col-md-8">
                    <label for="permittedActions" class="col-sm-12 col-md-12" style="margin-top: 4px">Select Actions</label><br class="hidden-xs"><br>
                    <div class="col-sm-12 col-md-12 role_list pull-left form-group pre-scrollable scrollable-checkbox" >
                        <div  style="height: 200px">
                            <input type="hidden"  name="down_flag" value="0" >
                            <input type="checkbox" class="checkBoxClass" name="down_flag" value="1" <?php if($each_schedule->down_flag == '1'){echo 'checked';}?> >

                            <label for="">&nbsp; Download Flag</label><br>
                            <input type="hidden"  name="sync_flag" value="0" >
                            <input type="checkbox" class="checkBoxClass" name="sync_flag" value="1" <?php if($each_schedule->sync_flag == '1'){echo 'checked';}?>>
                            <label for="">&nbsp; Employee Sync Flag</label><br>
                            <input type="hidden"  name="data_flag" value="0" >
                            <input type="checkbox" class="checkBoxClass" name="data_flag" value="1" <?php if($each_schedule->down_flag == '1'){echo 'checked';}?> >
                            <label for="">&nbsp; Erase Data Flag</label><br>
                            <input type="hidden"  name="emp_down" value="0" >
                            <input type="checkbox" class="checkBoxClass" name="emp_down" value="1" <?php if($each_schedule->emp_down == '1'){echo 'checked';}?> >
                            <label for="">&nbsp; Employee Download Flag</label><br>
                            <input type="hidden" name="time_update" value="0" >
                            <input type="checkbox" class="checkBoxClass" name="time_update" value="1" <?php if($each_schedule->time_update == '1'){echo 'checked';}?> >
                            <label for="">&nbsp; Time Update Flag</label><br>
                            <input type="hidden"  name="finger_temp" value="0" >
                            <input type="checkbox" class="checkBoxClass" name="finger_temp" value="1"  <?php if($each_schedule->finger_temp == '1'){echo 'checked';}?> >
                            <label for="">&nbsp; Finger Template Download</label><br>
                            <input type="hidden"  name="finger_temp_down" value="0" >
                            <input type="hidden"  name="id" value="<?php echo $each_schedule->id?>" >
                            <input type="checkbox" class="checkBoxClass" name="finger_temp_down" value="1" <?php if($each_schedule->finger_temp_down == '1'){echo 'checked';}?> >

                            <label for="">&nbsp; Finger Template Sync</label><br>
                            <input type="hidden"  name="erase_all_employee" value="0" >
                            <input type="checkbox" class="checkBoxClass" name="erase_all_employee" value="1" <?php if($each_schedule->erase_emp == '1'){echo 'checked';}?>>
                            <label for="">&nbsp; Erase All Employee</label><br>

                        </div>
                    </div>
                </div>
                <br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div>
                            <div class="col-sm-12 col-md-6" style="margin-left: 31px;margin-top: 17px">
                                <input class="check-all" type="checkbox" name="" id="ckbCheckAll">
                                <label for="ckbCheckAll">&nbsp; Select All</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!--                ...........................................-->
            <br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div>
                            <div class="col-md-6 col-md-offset-4" style="width: 4%;margin-top: 22px;margin-right: 50px">
                                <button type="submit" class="btn btn-info pull-right">Update Schedule</button>
                            </div>
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
