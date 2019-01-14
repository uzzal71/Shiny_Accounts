
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 style="text-align:center">Project Details</h3>
			
					
                <table class="table table-bordered">
                    <tbody>
                  
					<tr>
                        <th align="center">Project ID</th> <td><?php echo $each_project->project_id?></td>
					</tr> 			

					<tr>
                        <th align="center">Project Name</th> <td><?php echo $each_project->project_name?></td>
					</tr>         
					<tr>
                        <th align="center">Project Manager</th> <td><?php echo $each_project->project_manager?></td>
					</tr>             
					<tr>
                        <th align="center">Customer ID</th> <td><?php echo $each_project->customer_id?></td>
					</tr>               
					<tr>
                        <th align="center">Customer Name</th> <td><?php echo $each_project->customer_name?></td>
					</tr> 	
					<tr>
                        <th align="center">Project Description</th> <td><?php echo $each_project->project_description?></td>
					</tr>
					<tr>
                        <th align="center">Project Status</th> <td><?php echo $each_project->project_status?></td>
					</tr>					
            
					<tr>
                        <th align="center">Project Price</th> <td><?php echo $each_project->project_price?></td>
					</tr>      
					<tr>
                        <th align="center">PO Date</th> <td><?php echo $each_project->po_date?></td>
					</tr>  
					<tr>
                        <th align="center">Delivery Date</th> <td><?php echo $each_project->delivery_date?></td>
					</tr> 					
					<tr>	
					<tr>
                        <th align="center">Project Payment</th> <td><?php echo $each_project->project_payment?></td>
					</tr> 					
					<tr>		
					<tr>
                        <th align="center">Project Start Date</th> <td><?php echo $each_project->project_start_date?></td>
					</tr> 					
					<tr>		
					<tr>
                        <th align="center">Project Finished Date</th> <td><?php echo $each_project->project_finished_date?></td>
					</tr>				
     
					<tr>
                        <th align="center">Recorded By</th> <td><?php echo $each_project->recorded_by?></td>
					</tr>        
					<tr>
                        <th align="center">Recording Time</th> <td><?php echo $each_project->recording_time?></td>
					</tr> 		

					<tr>
                        <th align="center">Updated By</th> <td><?php echo $each_project->updated_by?></td>
					</tr>        
					<tr>
                        <th align="center">Updating Time</th> <td><?php echo $each_project->updating_time?></td>
					</tr>        
	
            		<tr>
                        <th align="center">Type</th> <td><?php $type=$each_project->type;

                        if ($type=='0'){
		                        	echo "Project";
                        } else if ($type=='1') {
                        	echo "Support";
                        }else if ($type=='2') {
                         echo "Both";
                        }

                        ?></td>
					</tr> 
                    </tbody>
              
                        
                </table>
            </div>
        </div>
    </div>
	                


