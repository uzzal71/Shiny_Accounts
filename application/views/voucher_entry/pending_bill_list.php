
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Pending Bill List</h3>
                <table class="table table-bordered">
                    <thead>

                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Voucher No</th>
                        <th align="center">Employee Name</th>
                        <th align="center">Project Code</th>
                        <th align="center">Date</th>
                        <th align="center">Recorded By</th>
						<th align="center">Action</th>
						<th align="center">Status</th>
                    </tr>
                    </thead>
               
                            <tbody>
                                    <?php 
                                        $sl=0;
                                    foreach ($voucher_infos as $voucher_info) {
                                       $sl++;
                                    

                                     ?>
                            <tr>
							
                                <td><?php echo $sl ?></td>
                                <td><?php echo $voucher_info->voucher_no ?></td>
                                   <td><?php echo $voucher_info->employee_name?></td>
                                <td><?php echo $voucher_info->project_id ?></td>
                             
                                <td><?php echo $voucher_info->date ?></td>
                                <td><?php echo $voucher_info->recorded_by ?></td>
                                <td>
                                    <a href="<?php echo base_url();?>Voucher_entry/view_voucher_details/<?php echo $voucher_info->voucher_no ?>"> <img style="margin: 3%" border="0" title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/details.png" width="25" height="20"></a> 
                                     <a href="<?php echo base_url();?>Voucher_entry/edit_voucher_info/<?php echo $voucher_info->voucher_no?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit" src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
                                  <!--   <a href="<?php echo base_url();?>Voucher_entry/delete_item_info/<?php echo $voucher_info->voucher_no?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a> --></td>
                                <td>Pending</td>

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


