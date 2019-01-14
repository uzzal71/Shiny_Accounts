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
                <div class="panel-heading">Update Employee Device </div>
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
					  <form name="" class="form-horizontal"  action="<?php echo base_url(); ?>Command/update_employee_device" method="post">	
                        <label for="actionCode" style="margin-top: 4px">Select Employee</label>
                        <select required name="employee_id" class="form-control col-sm-6 custom-input" id="employee_id">
                            <option value="">Select</option>
                            <option value="all_employee">All Employee</option>
                            <?php foreach ($all_employee as $each_employee) {  ?>
                                <option value = "<?php echo $each_employee->employee_id?>"><?php echo $each_employee->employee_id?></option>
                           
                           <?php  } ?>

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
			
			</tr>
            <button type="submit" class="btn btn-info pull-left pull-right">Update Employee Device </button>

                 
    
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