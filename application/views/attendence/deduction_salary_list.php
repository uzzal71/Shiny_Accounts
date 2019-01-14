
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Employee ID</th>
                        <th align="center">Deduction Name</th>
                        <th align="center">Amount</th>
                        <th align="center">Deduction Month</th>
                        <th align="center">Recorded By</th>
                        <th align="center">Recording Time</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php 
							$serial=0;
							foreach($all_deduction_salary as $each_deduction_salary){
								$serial++;
							?>
                            <tr>
							
                                <td><?php echo $serial?></td>
                                <td><?php echo $each_deduction_salary->employee_id?></td>
                                <td><?php echo $each_deduction_salary->deduction_name?></td>
                                <td><?php echo $each_deduction_salary->amount?></td>
                                <td><?php echo $each_deduction_salary->deduction_month?></td>
                                <td><?php echo $each_deduction_salary->recorded_by?></td>
                                <td><?php echo $each_deduction_salary->recording_time?></td>
                                <td width="130px">
                                    <a href="<?php echo base_url()?>Attendence/edit_deduction_salary/<?php echo $each_deduction_salary->id?>">
									<img style="margin: 3%" border="0"title="Edit" alt="Edit"
                                    src="<?php echo base_url();?>images/edit.png"width="25" height="20"></a>
									
                                    <a href="<?php echo base_url()?>Attendence/delete_deduction_salary/<?php echo $each_deduction_salary->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>
                                </td>
								
							
                            </tr>
							
							<?php }?>


                           
								<?php if($all_deduction_salary==null){?>
                          
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


