
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Expense Type List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Expense Type</th>
						<th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
						<?php
						$id=1;
						foreach($expense_type as $v_expense_type){?>
                            <tr>
								<td><?php echo $id++?></td>
                                <td><?php echo $v_expense_type->expense_type?></td>
                                <td width="130px">
									<a href="<?php echo base_url()?>Expense/edit_expense_type/<?php echo $v_expense_type->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20">
									</a>
									
                                    <a href="<?php echo base_url()?>Expense/delete_expense_type/<?php echo $v_expense_type->id?>" id="" onclick="return confirm('Are you sure?')">
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


