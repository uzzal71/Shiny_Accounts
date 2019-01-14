
    <br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Add New Device</div>
                <br>
             <form role="form" action="store.php" method="post" enctype="multipart/form-data">
                
                <div>
                    <div class="col-md-6">
                        <label for="deviceId" style="margin-top: 5px">Device ID</label>
                        <input type="text" id="deviceId" name="DevId" class="form-control custom-input" value="{{ $deviceInfo->DevId }}"
                               placeholder="Device ID" required>
                    </div>
                    <div class="col-md-6">
                        <label for="deviceSerial" style="margin-top: 5px">Serial</label>
                        <input type="text" id="deviceSerial" name="serial" class="form-control custom-input" value="{{ $deviceInfo->serial }}"
                               placeholder="Device Serial" required>
                    </div>
                    <br><br><br>
                    <div class="col-md-6">
                        <label for="deviceType" style="margin-top: 5px">Device Type</label>
                       
                    </div>
                    <div class="col-md-6">
                        <label for="deviceName" style="margin-top: 5px">Device Name</label>
                        <input type="text" id="deviceName" name="DeviceName" class="form-control custom-input" value="{{ $deviceInfo->DeviceName }}"
                               placeholder="Device Name" required>
                    </div>

                    <br><br><br>
                    <div class="col-md-3">
                        <label for="deviceActive" style="margin-top: 5px">Active</label>
                        
                    </div>
                    <div class="col-md-3">
                        <label for="deviceSlave" style="margin-top: 5px">Slave</label>
                      
                    </div>
                    <div class="col-md-3">
                        <label for="groupID" style="margin-top: 5px">Group ID</label>
                        <input type="text" id="groupID" name="Group_id" class="form-control custom-input" value="{{ $deviceInfo->Group_id }}"
                               placeholder="Group ID" required>
                    </div>
                    <div class="col-md-3">
                        <label for="companyID" style="margin-top: 5px">Company ID</label>
                        <input type="text" id="companyID" name="company_id" class="form-control custom-input" value="{{ $deviceInfo->company_id }}"
                               placeholder="Company ID" required>
                    </div>
                    <br><br><br>
                    <div class="col-md-6">
                        <label for="location" style="margin-top: 5px">Location</label>
                        <input type="text" id="location" name="location" class="form-control custom-input" value="{{ $deviceInfo->location }}"
                               placeholder="Location" required>
                    </div>
                    <div class="col-md-6">
                        <label for="deviceIP" style="margin-top: 5px">IP Address</label>
                        <input type="text" id="deviceIP" name="IpAddress" class="form-control custom-input" value="{{ $deviceInfo->IpAddress }}"
                               placeholder="Device IP" required>
                    </div>
                    <br>
                </div>

                <br><br><br>
                <div class="form-horizontal">
                    <div class="form-group">
                        <div>
                            <div class="col-md-4"
                                 style="float: right;width: 4%;margin-top: 11px;margin-right: 17px">
                                <button type="submit" class="btn btn-info pull-right">Update Device</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>


        <div class="col-md-4"></div>
    </div>

