
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Customer List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center"> Customer ID</th>
                        <th align="center"> Full Name</th>
                        <th align="center"> Short Name</th>
                        <th align="center">Action</th>
                        <th align="center">Customer Address</th>
                        <th align="center">Factory Address</th>
                        <th align="center">Customer Contact</th>
                        <th align="center">Factory Contact</th>       
						<th align="center">Customer Designation</th>
                        <th align="center">Factory Designation</th>      
						<th align="center">Customer Email</th>
                        <th align="center">Factory Email</th>            
						<th align="center">Customer Mobile</th>
                        <th align="center">Factory Mobile</th>					
						<th align="center">Customer Phone</th>
                        <th align="center">Factory Phone</th>
                        <th align="center">Web Address</th>
                        <th align="center">Reference</th>
                        <th align="center">IS Active</th>
                        <th align="center">Recorded By</th>
                        <th align="center">Recording Time</th>      
						<th align="center">Updated By</th>
                        <th align="center">Updating Time</th>
						
                    </tr>
                    </thead>
					<?php $serial_no=0;?>
                            <tbody>
							<?php foreach($view_customer_list as $each_customer){
								$serial_no++?>
                            <tr>
							
                                <td><?php echo $serial_no?></td>
								<td><?php echo $each_customer->customer_id?></td>
                                <td><?php echo $each_customer->full_name?></td>
                                <td><?php echo $each_customer->short_name?></td>
                                 <td width="130px">
                                    <a href="<?php echo base_url()?>Customer/details_view/<?php echo $each_customer->id?>"> <img style="margin: 3%" border="0"title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/details.png"width="25" height="20">
                                    </a> 
                                    
                                    <a href="<?php echo base_url()?>Customer/edit_customer/<?php echo $each_customer->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20">
                                    </a>
                                    
                                    <a href="<?php echo base_url()?>Customer/delete_customer/<?php echo $each_customer->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                </td>
                                <td><?php echo $each_customer->customer_address?></td>
                                <td><?php echo $each_customer->factory_address?></td>
								<td><?php echo $each_customer->customer_contact?></td>
                                <td><?php echo $each_customer->factory_contact?></td>
								<td><?php echo $each_customer->customer_designation?></td>
                                <td><?php echo $each_customer->factory_designation?></td>
								<td><?php echo $each_customer->customer_email?></td>
                                <td><?php echo $each_customer->factory_email?></td>
								<td><?php echo $each_customer->customer_mobile?></td>
                                <td><?php echo $each_customer->factory_mobile?></td>
								<td><?php echo $each_customer->customer_phone?></td>
                                <td><?php echo $each_customer->factory_phone?></td>
                                <td><?php echo $each_customer->web_address?></td>
                                <td><?php echo $each_customer->reference?></td>
                                <td>
                                <?php
                                if($each_customer->is_active == '1')
                                {
                                    echo "Active";

                                }
                                else
                                {
                                     echo "Inactive";
                                }?>
                                    
                                </td>
								
                                <td><?php echo $each_customer->recorded_by?></td>
                                <td><?php echo $each_customer->recording_time?></td>    
								<td><?php echo $each_customer->updated_by?></td>
                                <td><?php echo $each_customer->updating_time?></td>
                               
                                
                              
								
							
                            </tr>
							<?php }?>


                         
                            </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
	


