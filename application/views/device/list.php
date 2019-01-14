
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Device List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Device ID</th>
                        <th align="center">Device Name</th>
                        <th align="center">Device Type</th>
                        <th align="center">Slave</th>
                        <th align="center">IP Address</th>
                        <th align="center">Location</th>
                        <th align="center">Action</th>
                    </tr>
                    </thead>
                    
                            <tbody>
							<?php
							$serial = 0;
							foreach($all_devices as $each_device){
								$serial++;?>
                            <tr>
                                <td><?php echo $serial?> </td>
                                <td><?php echo $each_device->DevId?> </td>
                                <td><?php echo $each_device->DeviceName?></td>
                                <td><?php echo $each_device->type?></td>
								<?php if($each_device->Slave== '1'){$slave = 'Yes';}else{$slave = 'No';}?>
                                <td><?php echo $slave?></td>
                                <td><?php echo $each_device->IpAddress?></td>
                                <td><?php echo $each_device->location?></td>
								
                                <td width="130px">
									<a href="<?php echo base_url()?>Device/edit_device/<?php echo $each_device->id; ?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
                                    <a href="<?php echo base_url()?>Device/delete_device/<?php echo $each_device->id; ?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                </td>
                            </tr>
							
							<?php }?>
<!--
                            {{-- ====== For Deleting Device Start ======  --}}
                            {{ Form::open(['action' => ['DeviceListController@destroy',$device->DevId], 'id' => 'deleteDevice'.$device->id ]) }}
                            {{ method_field('delete') }}
                            {{ Form::close() }}
-->

                          
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
	                            <script>
                                $(document).ready(function () {
                                    var deleteButton='deleteButton' + '{{ $device->id }}' ;
                                    var deleteDevice='deleteDevice' + '{{ $device->id }}' ;
                                    $('#'+deleteButton).click(function () {
                                        $('#'+deleteDevice).submit();
                                        return false;
                                    })
                                })
                            </script>


