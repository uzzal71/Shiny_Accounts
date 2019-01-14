<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Create Schedule</div>
              
               
                    <div class="col-xs-12 col-sm-12">
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

				   <form name="save_new_item" action="<?php echo base_url();?>schedule/save_schedule"  method="post">
			<table >
			
			 <tr>
			<td> <label for="scheduleName" style="margin-top: 4px">Schedule Name</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="scheduleName" name="scheduleName" class="form-control custom-input"
                           placeholder="Schedule Name" required></td>
			
			</tr>
			
			 <tr>
			<td> <label for="scheduleTime" style="margin-top: 4px">Schedule Time</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td>  <input type="text" id="scheduleTime" name="scheduleTime" class="form-control custom-input dateTimeFrom"
                           placeholder="Schedule Time" required></td>
			
			</tr>
		
			 <div class="col-xs-12 col-sm-8 col-md-10"></div><br>
                <div class="form-group col-sm-12 col-md-8">
                    <label for="permittedActions" class="col-sm-12 col-md-12" style="margin-top: 4px">Select Actions</label><br class="hidden-xs"><br>
                    <div class="col-sm-12 col-md-12 role_list pull-left form-group pre-scrollable scrollable-checkbox" >
                        <div  style="height: 200px">
                            <input type="hidden"  name="down_flag" value="0" >
                            <input type="checkbox" class="checkBoxClass" name="down_flag" value="1" >
                            <label for="">&nbsp Download Flag</label><br>
                            <input type="hidden"  name="sync_flag" value="0" >
                            <input type="checkbox" class="checkBoxClass" name="sync_flag" value="1" >
                            <label for="">&nbsp Employee Sync Flag</label><br>
                            <input type="hidden"  name="data_flag" value="0" >
                            <input type="checkbox" class="checkBoxClass" name="data_flag" value="1" >
                            <label for="">&nbsp Erase Data Flag</label><br>
                            <input type="hidden"  name="emp_down" value="0" >
                            <input type="checkbox" class="checkBoxClass" name="emp_down" value="1" >
                            <label for="">&nbsp Employee Download Flag</label><br>
                            <input type="hidden" name="time_update" value="0" >
                            <input type="checkbox" class="checkBoxClass" name="time_update" value="1" >
                            <label for="">&nbsp Time Update Flag</label><br>
                            <input type="hidden"  name="finger_temp" value="0" >
                            <input type="checkbox" class="checkBoxClass" name="finger_temp" value="1" >
                            <label for="">&nbsp Finger Template Download</label><br>
                            <input type="hidden"  name="finger_temp_down" value="0" >
                            <input type="checkbox" class="checkBoxClass" name="finger_temp_down" value="1" >
                            <label for="">&nbsp Finger Template Sync</label><br>
                            
                            <input type="hidden"  name="erase_all_employee" value="0" >
                            <input type="checkbox" class="checkBoxClass" name="erase_all_employee" value="1" >
                            <label for="">&nbsp Erase All Employee</label><br>
                        </div>
                    </div>
                </div>
				
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
		 
			
			
			<br><br><br><br>
			

			
			
				<tr>
			
			 
			<td> </td>
			<td><td>
			 <div class="col-md-4" style="float: right;width: 4%;margin-top: 22px;margin-right: 50px">
                            <button type="submit" class="btn btn-info pull-right">Create Schedule</button>
                        </div></td></td>
			</tr>
			
			
			   
			</table>
			</form>

                    </div>

                    <!-- ........................................... -->

                    <div class="form-horizontal">
                        <div class="form-group">

                        </div>
                    </div>
                
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