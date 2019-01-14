<br></br>

    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 750px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<!-- <h3 align="center" style = "background-color: lightblue;"> Pending Vouchers List</h3> -->
                <table class="table table-bordered">
                    <thead>

                    <tr>
                        <th align="center"><b>SL#</b></th>
                        <th align="center"><b>Voucher No</b></th>
                        
                        <th align="center"><b>Project Code</b></th>
                        <th align="center"><b>Employee Name</b></th>
                        <th align="center"><b>Date</b></th>
                        <th align="center"><b>Entry By</b></th>
						<th align="center"><b>Action</b></th>
						<th align="center"><b>Approve</b></th>
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
                                <td><?php echo $voucher_info->project_id ?></td>
                                <td><?php echo $voucher_info->employee_name?></td>
                                <td><?php echo $voucher_info->date ?></td>
                                <td><?php echo $voucher_info->recorded_by ?></td>
                                <td>
                                    <a href="<?php echo base_url();?>Voucher_entry/view_voucher_details/<?php echo $voucher_info->voucher_no ?>"> <img style="margin: 3%" border="0" title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/details.png" width="25" height="20"></a>
                                    <a href="<?php echo base_url();?>Voucher_entry/edit_voucher_info_all_ready_approved/<?php echo $voucher_info->voucher_no ?>"> <img style="margin: 3%" border="0" title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
                                    <a href="<?php echo base_url();?>Voucher_entry/print_voucher/<?php echo $voucher_info->voucher_no ?>"> <img style="margin: 3%" border="0" title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/print.png" width="25" height="20" target="_blank"></a>   
                                    
                                    </td>
                                <td>Already Approved</td>

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


