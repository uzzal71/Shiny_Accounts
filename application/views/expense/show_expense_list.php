
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
            <h3 align="center" style = "background-color: lightblue;">Expense List</h3>
                <table class="table table-bordered">
                    <thead>

                    <tr>
                        <th align="center" width="1">SL#</th>
                        <th align="center">Expense ID</th>
                        <th align="center">Project Code</th>
                        <th align="center">Pay Type</th>
                        <th align="center">Expense Amount</th>
                        <th align="center">Expense Date</th>
                        <th align="center">Expensed By</th>
                        <th align="center" style="max-width:40px;">View Details</th>
                        <th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
                                    <?php 
                                        $sl=0;
                                    foreach ($expense_infos as $expense_info) {
                                       $sl++;
                                    

                                     ?>
                            <tr>
                            
                                <td><?php echo $sl ?></td>
                                <td><?php echo $expense_info->expense_id ?></td>
                                <td><?php echo $expense_info->project_id ?></td>
                                <td><?php echo $expense_info->pay_type?></td>
                                <td><?php echo $expense_info->expense_amount?></td>
                                <td><?php echo $expense_info->expense_date?></td>
                                <td style="max-width:40px;"><?php echo $expense_info->expense_by?></td>
                               
                                <td>
                                    <a href="<?php echo base_url();?>Expense/view_expense_details/<?php echo $expense_info->id ?>"> <img style="margin: 3%" border="0" title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/details.png"width="25" height="20"></a> 
                                  
                                    </td>
                                    <td>

                                      <a href="<?php echo base_url();?>Expense/edit_expense/<?php echo $expense_info->id ?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit" src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
                                    <!-- 
                                    <a href="<?php echo base_url();?>Expense/approve_expense/<?php echo $expense_info->id ?>" class="btn btn-primary"
                                   onclick="return confirm('Are you sure to Approve?')">Approve</a> -->
                                   </td> 
                                

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


