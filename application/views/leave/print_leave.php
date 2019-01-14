
    <br><br>
    <div class="row">
        <div id="table table-bordered" class="col-md-10 col-md-offset-1" style="background-color: white;padding: 1px;margin-left: 210px;max-height: 450px;">
            <div>
			<h3 align="center" style = "background-color: white;">All Leave Requests For Print</h3>
                <table class="table table-bordered" id="data_table">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Employee ID</th>
                        <th  align="center"> Employee Name</th>
                        <th align="center">From</th>
                        <th align="center">To</th>
                        <th align="center">No of Days</th>
                        <th align="center">Leave Types</th>
                        <th align="center">Remarks</th>
						<th align="center">Print</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php 
							$id=1;
							foreach($all_pending_leave as $each_pending_leave){?>
                            <tr>
							
                                  <td><?php echo $id?></td>
                                <td id="employee_id"><?php echo $each_pending_leave->employee_id?></td>
                                <td><?php echo $each_pending_leave->first_name.' '.$each_pending_leave->last_name?></td>
                                <td id="from"><?php echo $each_pending_leave->date_time_from?></td>
                                <td id="to"><?php echo $each_pending_leave->date_time_to?></td>
                                <td id="no_of_days"><?php echo $each_pending_leave->no_of_days?></td>
                                <td id="type"><?php echo $each_pending_leave->leave_types?></td>
                                <td><?php echo $each_pending_leave->remarks?></td>
                               
                                <td width="130px">
                                 <a href="<?php echo base_url();?>leave/printed_copy/<?php echo $each_pending_leave->id?>"><button class="btn btn-success">Print</button></a>

                                </td>
								
							
                            </tr>
							
							<?php $id++;}?>


                           
								<?php if($all_pending_leave==null){?>
                          
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
<script type="text/javascript">
   
    $(document).ready(function() {





      $('#data_table').DataTable({
        "dom": '<"pull-right"f><"pull-left"l>tip'   
    });
} );
</script>

