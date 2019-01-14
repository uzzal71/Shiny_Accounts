
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Shift List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Shift Name</th>
                        <th align="center">Shift Start</th>
                        <th align="center">Shift End</th>
                        <th align="center">Grace</th>
                        <th align="center">Lunch Start</th>
                        <th align="center">Lunch End</th>
                        <th align="center">First Half Margin</th>
                        <th align="center">Second Half Margin</th>
                        <th align="center">Over Time Start From</th>
						<th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php
							$serial_no=0;
							foreach($all_shift as $each_shift){
								$serial_no++?>
                            <tr>
							
                                <td><?php echo $serial_no;?></td>
                                <td><?php echo $each_shift->shift_name?></td>
                                <td><?php echo $each_shift->shift_start?></td>
                                <td><?php echo $each_shift->shift_end?></td>
                                <td><?php echo $each_shift->grace?></td>
                                <td><?php echo $each_shift->lunch_start?></td>
                                <td><?php echo $each_shift->lunch_end?></td>
                                <td><?php echo $each_shift->first_half_margin?></td>
                                <td><?php echo $each_shift->second_half_margin?></td>
                                <td><?php echo $each_shift->over_time_start?></td> 
                               
                                
                               <td width="130px">
                                    <a href="<?php echo base_url()?>shift/edit_shift/<?php echo $each_shift->id?>"> <img style="margin: 3%" border="0"title="Edit" alt="Edit"
                                    src="<?php echo base_url();?>images/edit.png"width="25" height="20"></a> 
                                    <a href="<?php echo base_url()?>shift/delete_shift/<?php echo $each_shift->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

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


