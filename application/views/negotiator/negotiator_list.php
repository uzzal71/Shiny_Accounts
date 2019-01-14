
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Negotiator List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Full Name</th>
                        <th align="center">Type</th>
                        <th align="center">Address</th>
                        <th align="center">Contact No</th>
                        <th align="center">Email</th>
                        <th align="center">Is Active</th>
                        <th align="center">Recorded By</th>
                        <th align="center">Recording Time</th>
						<th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php foreach($view_nigotiator_list as $v_nigotiator){?>
                            <tr>
							
                                <td><?php echo $v_nigotiator->id?></td>
                                <td><?php echo $v_nigotiator->full_name?></td>
                                <td><?php echo $v_nigotiator->type?></td>
                                <td><?php echo $v_nigotiator->address?></td>
                                <td><?php echo $v_nigotiator->contact_no?></td>
                                <td><?php echo $v_nigotiator->email?></td>
                                <td><?php echo $v_nigotiator->is_active?></td>
                                <td><?php echo $v_nigotiator->recorded_by?></td>
                                <td><?php echo $v_nigotiator->recording_time?></td>
                               
                                
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


                           
								<?php if($view_nigotiator_list==null){?>
                          
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
	                            <script>
                                $(document).ready(function () {
                                    var deleteButton='deleteButton' + '{{ $department->id }}' ;
                                    var deleteEmployee='deleteDepartment' + '{{ $department->id }}' ;
                                    $('#'+deleteButton).click(function () {
                                        $('#'+deleteEmployee).submit();
                                        return false;
                                    })
                                })
                            </script>


