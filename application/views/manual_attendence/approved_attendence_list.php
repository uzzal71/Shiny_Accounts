
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Approve Attendance List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Employee ID</th>
                        <th align="center">Employee Name</th>
                        <th align="center">Entry Time</th>
                        <th align="center">Exit Time</th>
                        <th align="center">Remarks</th>
                        <th align="center">Status</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php
								$serial_no=0;
								foreach($all_approved_attendence as $each_approved_attendence){
									$serial_no++;
								?>
                            <tr>
							
								<td><?php echo $serial_no?></td>
								<td><?php echo $each_approved_attendence->employee_id?></td>
								<td><?php echo $each_approved_attendence->employee_name?></td>
								<td><?php echo $each_approved_attendence->in_time?></td>
								<td><?php echo $each_approved_attendence->out_time?></td>
								<td><?php echo $each_approved_attendence->remarks?></td>
								<td><?php echo "Approved"?></td>

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


