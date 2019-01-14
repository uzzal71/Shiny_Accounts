
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Subordinating Pending Leave List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Employee ID</th>
                        <th align="center">From</th>
                        <th align="center">To</th>
                        <th align="center">No of Days</th>
                        <th align="center">Leave Types</th>
                        <th align="center">Remarks</th>
                        <th align="center">Recorded By</th>
                        <th align="center">Recording Time</th>
						<th align="center">Approve</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php 
							$id=1;
							foreach($approve_subordinate_pending_leave as $v_pending_leave){?>
                            <tr>
							
                                <td><?php echo $id?></td>
                                <td><?php echo $v_pending_leave->employee_id?></td>
                                <td><?php echo $v_pending_leave->date_time_from?></td>
                                <td><?php echo $v_pending_leave->date_time_to?></td>
								<td><?php echo $v_pending_leave->no_of_days?></td>
                                <td><?php echo $v_pending_leave->leave_types?></td>
                                <td><?php echo $v_pending_leave->remarks?></td>
                                <td><?php echo $v_pending_leave->recorded_by?></td>
                                <td><?php echo $v_pending_leave->recording_time?></td>
                                <td width="130px">
                                 <a href="<?php echo base_url();?>leave/approve_leave/<?php echo $v_pending_leave->id?>"><button class="btn btn-success"> Approve</button></a>

                                </td>
								
							
                            </tr>
							
							<?php $id++;}?>


                           
								<?php if($approve_subordinate_pending_leave==null){?>
                          
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


