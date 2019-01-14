<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
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
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Add New Device</div>
              
               
                    <div class="col-xs-12 col-sm-12">
				   <form name="save_new_item" action="<?php echo base_url();?>Device/save_new_device"  method="post">
			<table >
			
			 <tr>
			<td>  <label for="DevId" style="margin-top: 5px">Device ID</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="DevId" name="DevId" class="form-control custom-input"
                                   placeholder="Device ID" required></td>
			
			</tr>
			
			 <tr>
			<td>  <label for="deviceSerial" style="margin-top: 5px">Serial</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td>  <input type="text" id="deviceSerial" name="serial" class="form-control custom-input"
                                   placeholder="Device Serial" required></td>
			
			</tr>
			
			
		
			<tr>
			
			<td><label for="deviceType" style="margin-top: 5px">Device Type</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td>   <select name="type" class="form-control col-sm-6 custom-input" id="deviceType">
                                <option value="2">Face Detection</option>
                                <option value="2">Finger Print</option>
                                <option value="1">Easy Flow</option>
                            </select>
		    </td>
			
			</tr>
			
			 <tr>
			<td> <label for="deviceName" style="margin-top: 5px">Device Name</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="deviceName" name="DeviceName" class="form-control custom-input"
                                   placeholder="Device Name" required></td>
			
			</tr>
			 <tr>
			<td> <label for="deviceActive" style="margin-top: 5px">Active</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td> <select name="Active" class="form-control col-sm-3 custom-input" id="deviceActive">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select></td>
			
			</tr>
			 <tr>
			<td>  <label for="deviceSlave" style="margin-top: 5px">Slave</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%">   <select name="Slave" class="form-control col-sm-3 custom-input" id="deviceSlave">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select></td>
			
			</tr>
			 <tr>
			<td>   <label for="groupID" style="margin-top: 5px">Group ID</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="groupID" name="Group_id" class="form-control custom-input"
                                   placeholder="Group ID" required></td>
			
			</tr> 
			
			<tr>
			<td>  <label for="companyID" style="margin-top: 5px">Company ID</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="companyID" name="company_id" class="form-control custom-input"
                                   placeholder="Company ID" required></td>
			
			</tr>
			
			<tr>
			<td>   <label for="location" style="margin-top: 5px">Location</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%">  <input type="text" id="location" name="location" class="form-control custom-input"
                                   placeholder="Location" required>
			
			</tr>
			
			<tr>
			<td>    <label for="deviceIP" style="margin-top: 5px">IP Address</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%">   <input type="text" id="deviceIP" name="IpAddress" class="form-control custom-input"
                                   placeholder="Device IP" required>
			
			</tr>
			
			<!-- RECORDING TIME AND RECORDED BY-->
			<tr>
			<td>
			<input type="hidden" id="recording_time" name="recording_time" value="<?php  echo date("y-m-d h:i:s");?>" class="form-control custom-input" required>
			<input type="hidden" id="recorded_by" name="recorded_by" value="<?php echo $this->session->userdata("id")?>" class="form-control custom-input" required>
			</td>
			
			</tr>
			
			
				<tr>
			<td>
			 <div class="col-md-4" style="float: right;width: 4%;margin-top: 22px;margin-right: 50px">
                            <button type="submit" class="btn btn-info pull-right">Add New Device</button>
                        </div></td>
			 
			<td> </td>
			<td></td>
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
	
