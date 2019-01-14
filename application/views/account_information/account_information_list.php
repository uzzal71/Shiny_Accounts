
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
                <h3 style="color: green; text-align:center" > 
                     
                                                <?php

                                                //echo "I got it";
                                                    $msg=$this->session->userdata('message');
                                                    if($msg)
                                                    {
                                                        echo $msg."<br> <br>";
                                                        
                                                        $this->session->unset_userdata('message');
                                                        
                                                    }
                                                
                                                ?>
                                            </h3>
			<h3 align="center" style = "background-color: lightblue;"> Accounts List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Account Name</th>
                        <th align="center">Account No</th>
                        <th align="center">Employee ID</th>
                       <th align="center">Balance</th>
                        <th align="center">Bank Name</th>
                        <th align="center">Branch</th>
                        <th align="center">Address</th>
                        <th align="center">Opening Date</th>
                        <th align="center">Introducer</th>
                        <th align="center">Bank Contact No</th>
                        
                        
                   
                        <th align="center">Recorded By</th>
                        <th align="center">Recording Time</th>
						<th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php 
                            $sl=0;
                            foreach($view_account_information_list as $v_account_information){ $sl++;  ?>
                            <tr>
							
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $v_account_information->account_name?></td>
                                <td><?php echo $v_account_information->account_no?></td>
                                <td><?php echo $v_account_information->emp_id?></td>
                                <td><?php echo sprintf("%.2f", $v_account_information->balance) ?></td>
                                <td><?php echo $v_account_information->bank_name?></td>
                                <td><?php echo $v_account_information->branch?></td>
                                <td><?php echo $v_account_information->address?></td>
                                <td><?php echo $v_account_information->opening_date?></td>
                                <td><?php echo $v_account_information->introducer_name?></td>
                                <td><?php echo $v_account_information->bank_contact_no?></td>
                                <td><?php echo $v_account_information->recorded_by?></td>
                                <td><?php echo $v_account_information->recording_time?></td>
                               
                                
                                <td width="130px">
                                    <a href="<?php echo base_url();?>Account_information/view_account_info/<?php echo $v_account_information->id?>"><img style="margin: 3%" border="0" title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/details.png" width="25" height="20" width="25" height="20" width="25" height="20"></a> 

                                    <a href="<?php echo base_url();?>Account_information/edit_account_info/<?php echo $v_account_information->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"  src="<?php echo base_url();?>images/edit.png" width="25" height="20" width="25" height="20"></a>

                                    <a href="<?php echo base_url();?>Account_information/delete_each_account_info/<?php echo $v_account_information->id?>" id="" onclick="return confirm('Are you sure To Delete?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>


                                </td>
								
							
                            </tr>
							<?php }?>

                         
                           
								<?php if($view_account_information_list==null){?>
                          
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
            $(document).ready(function (){
            var deleteButton='deleteButton' + '{{ $department->id }}' ;
             var deleteEmployee='deleteDepartment' + '{{ $department->id }}' ;
            $('#'+deleteButton).click(function () {
            $('#'+deleteEmployee).submit();
             return false;
                })
                })
       </script>


