
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL</th>
                        <th align="center">Device ID</th>
                        <th align="center">Action Code</th>
                        <th align="center">Command Time</th>
                        <th align="center">Status</th>
                        <th align="center">Action</th>
                    </tr>
                    </thead>
					
                            <tbody>
							<?php foreach($command_list as $v_command){?>
                            <tr>
                                <td> <?php echo $v_command->id?></td>
                                <td><?php echo $v_command->deviceId?></td>
                                <td><?php echo $v_command->actionCode?></td>
                                <td><?php echo $v_command->recording_time?></td>
                                <td><?php echo $v_command->status?></td>
                                   <td width="130px">
                                    <a href="#"> <img style="margin: 3%" border="0"title="See Details" alt="Details"
                                    src="#"width="25" height="20"></a> <a href="#"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="#" width="25" height="20"></a>
                                    <a href="#" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                </td>
                            </tr>
							<?php }?>
<!--
                            {{-- ====== For Deleting Device Start ======  --}}
                            {{ Form::open(['action' => ['CommandListController@destroy',$command->id], 'id' => 'deleteCommand'.$command->id ]) }}
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
                                    var deleteButton='deleteButton' + '{{ $command->id }}' ;
                                    var deleteCommand='deleteCommand' + '{{ $command->id }}' ;
                                    $('#'+deleteButton).click(function () {
                                        $('#'+deleteCommand).submit();
                                        return false;
                                    })
                                })
                            </script>


