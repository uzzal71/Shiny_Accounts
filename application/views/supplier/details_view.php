
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 style="text-align:center"> Supplier Profile</h3>
			
					
                <table class="table table-bordered">
                    <tbody>
                  
					<tr>
                        <th align="center">Supplier ID</th> <td><?php echo $view_each_supplier->supplier_id?></td>
					</tr> 			

					<tr>
                        <th align="center">Full Name</th> <td><?php echo $view_each_supplier->full_name?></td>
					</tr>         
					<tr>
                        <th align="center">Short Name</th> <td><?php echo $view_each_supplier->short_name?></td>
					</tr>             
					<tr>
                        <th align="center">Supplier Address</th> <td><?php echo $view_each_supplier->supplier_address?></td>
					</tr>               
					<tr>
                        <th align="center">Factory Address</th> <td><?php echo $view_each_supplier->factory_address?></td>
					</tr> 	
					<tr>
                        <th align="center">Supplier Contact</th> <td><?php echo $view_each_supplier->supplier_contact?></td>
					</tr>
					<tr>
                        <th align="center">Factory Contact</th> <td><?php echo $view_each_supplier->factory_contact?></td>
					</tr>					
            
					<tr>
                        <th align="center">Supplier Designation</th> <td><?php echo $view_each_supplier->supplier_designation?></td>
					</tr>      
					<tr>
                        <th align="center">Factory Designation</th> <td><?php echo $view_each_supplier->factory_designation?></td>
					</tr>  
					<tr>
                        <th align="center">Supplier Email</th> <td><?php echo $view_each_supplier->supplier_email?></td>
					</tr> 					
					<tr>	
					<tr>
                        <th align="center">Factory Email</th> <td><?php echo $view_each_supplier->factory_email?></td>
					</tr> 					
					<tr>		
					<tr>
                        <th align="center">Supplier Mobile</th> <td><?php echo $view_each_supplier->supplier_mobile?></td>
					</tr> 					
					<tr>		
					<tr>
                        <th align="center">Factory Mobile</th> <td><?php echo $view_each_supplier->factory_mobile?></td>
					</tr>				
					<tr>
                        <th align="center">Supplier Phone</th> <td><?php echo $view_each_supplier->supplier_phone?></td>
					</tr>				
					<tr>
                        <th align="center">Factory Phone</th> <td><?php echo $view_each_supplier->factory_phone?></td>
					</tr> 					
					<tr>			
					<tr>
                        <th align="center">Web Address</th> <td><?php echo $view_each_supplier->web_address?></td>
					</tr> 					
					<tr>
                        <th align="center">Reference</th> <td><?php echo $view_each_supplier->reference?></td>
					</tr>         
					<tr>
                        <th align="center">IS Active</th>
                        <td>
                                                 <?php
                                if($view_each_supplier->is_active == '1')
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
                        <th align="center">Recorded By</th> <td><?php echo $view_each_supplier->recorded_by?></td>
					</tr>        
					<tr>
                        <th align="center">Recording Time</th> <td><?php echo $view_each_supplier->recording_time?></td>
					</tr> 		

					<tr>
                        <th align="center">Updated By</th> <td><?php echo $view_each_supplier->updated_by?></td>
					</tr>        
					<tr>
                        <th align="center">Updating Time</th> <td><?php echo $view_each_supplier->updating_time?></td>
					</tr>        
	
            
                    </tbody>
              
                        
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
	                


