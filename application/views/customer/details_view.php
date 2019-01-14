
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 style="text-align:center"> Customer Profile</h3>
			
					
                <table class="table table-bordered">
                    <tbody>
                  
					<tr>
                        <th align="center">Customer ID</th> <td><?php echo $view_each_customer->customer_id?></td>
					</tr> 			

					<tr>
                        <th align="center">Full Name</th> <td><?php echo $view_each_customer->full_name?></td>
					</tr>         
					<tr>
                        <th align="center">Short Name</th> <td><?php echo $view_each_customer->short_name?></td>
					</tr>             
					<tr>
                        <th align="center">Customer Address</th> <td><?php echo $view_each_customer->customer_address?></td>
					</tr>               
					<tr>
                        <th align="center">Factory Address</th> <td><?php echo $view_each_customer->factory_address?></td>
					</tr> 	
					<tr>
                        <th align="center">Customer Contact</th> <td><?php echo $view_each_customer->customer_contact?></td>
					</tr>
					<tr>
                        <th align="center">Factory Contact</th> <td><?php echo $view_each_customer->factory_contact?></td>
					</tr>					
            
					<tr>
                        <th align="center">Customer Designation</th> <td><?php echo $view_each_customer->customer_designation?></td>
					</tr>      
					<tr>
                        <th align="center">Factory Designation</th> <td><?php echo $view_each_customer->factory_designation?></td>
					</tr>  
					<tr>
                        <th align="center">Customer Email</th> <td><?php echo $view_each_customer->customer_email?></td>
					</tr> 					
					<tr>	
					<tr>
                        <th align="center">Factory Email</th> <td><?php echo $view_each_customer->factory_email?></td>
					</tr> 					
					<tr>		
					<tr>
                        <th align="center">Customer Mobile</th> <td><?php echo $view_each_customer->customer_mobile?></td>
					</tr> 					
					<tr>		
					<tr>
                        <th align="center">Factory Mobile</th> <td><?php echo $view_each_customer->factory_mobile?></td>
					</tr>				
					<tr>
                        <th align="center">Customer Phone</th> <td><?php echo $view_each_customer->customer_phone?></td>
					</tr>				
					<tr>
                        <th align="center">Factory Phone</th> <td><?php echo $view_each_customer->factory_phone?></td>
					</tr> 					
					<tr>			
					<tr>
                        <th align="center">Web Address</th> <td><?php echo $view_each_customer->web_address?></td>
					</tr> 					
					<tr>
                        <th align="center">Reference</th> <td><?php echo $view_each_customer->reference?></td>
					</tr>         
					<tr>
                        <th align="center">IS Active</th> 
                        <td>                               
                         <?php
                                if($view_each_customer->is_active == '1')
                                {
                                    echo "Active";

                                }
                                else
                                {
                                     echo "Inactive";
                                }?>
                                	
                        </td>
					</tr>      
					<tr>
                        <th align="center">Recorded By</th> <td><?php echo $view_each_customer->recorded_by?></td>
					</tr>        
					<tr>
                        <th align="center">Recording Time</th> <td><?php echo $view_each_customer->recording_time?></td>
					</tr> 		

					<tr>
                        <th align="center">Updated By</th> <td><?php echo $view_each_customer->updated_by?></td>
					</tr>        
					<tr>
                        <th align="center">Updating Time</th> <td><?php echo $view_each_customer->updating_time?></td>
					</tr>        
	
            
                    </tbody>
              
                        
                </table>
            </div>
        </div>
    </div>
	                


