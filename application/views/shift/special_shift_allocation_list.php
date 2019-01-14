
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Special Shift Allocation List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Date</th>
                        <th align="center">Employee ID</th>
                        <th align="center">Shift ID</th>
                        <th align="center">Recorded By</th>
                        <th align="center">Recording Time</th>
                        <th align="center">Updated By</th>
                        <th align="center">Updating Time</th>
						<th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php
							$serial_no=0;
							foreach($all_special_shift as $each_special_shift){
								$serial_no++?>
                            <tr>
							
                                <td><?php echo $serial_no;?></td>
                                <td><?php echo $each_special_shift->date?></td>
                                <td><?php echo $each_special_shift->employee_id?></td>
                                <td><?php echo $each_special_shift->shift_id?></td>
                                <td><?php echo $each_special_shift->recorded_by?></td>
                                <td><?php echo $each_special_shift->recording_time?></td>      
								<td><?php echo $each_special_shift->updated_by?></td>
                                <td><?php echo $each_special_shift->updating_time?></td>
                               
                                
                               <td width="130px">
                                    <a href="<?php echo base_url()?>shift/edit_special_shift_allocation/<?php echo $each_special_shift->id?>"> <img style="margin: 3%" border="0"title="See Details" alt="Edit"
                                    src="<?php echo base_url();?>images/edit.png"width="25" height="20"></a> 
                                    <a href="<?php echo base_url()?>shift/delete_special_shift_allocation/<?php echo $each_special_shift->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                </td>
								
							
                            </tr>
							<?php }?>


                           
								<?php if($all_special_shift==null){?>
                          
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
                                    var deleteButton='deleteButton' + '{{ $shift->id }}' ;
                                    var deleteEmployee='deleteShift' + '{{ $shift->id }}' ;
                                    $('#'+deleteButton).click(function () {
                                        $('#'+deleteShift).submit();
                                        return false;
                                    })
                                })
                            </script>


