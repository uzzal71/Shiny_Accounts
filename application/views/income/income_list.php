
    <br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="background-color: white;padding: 1px;margin-left: 210px;max-height: 750px; ">
            <div class= "table-responsive" >
			<h3 align="center"> Income List</h3>
                <table class="table table-bordered" id="data_table"  >
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Income ID</th>
                        <th align="center">Project ID</th>
                        <th align="center">Project Name</th>
                        <th align="center">Customer Name</th>
                        <th align="center">Income Date</th>
                         <th align="center">Income Amount</th>
                        <th align="center">Total Amount</th>
                        
						<th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
						<?php  
                 
                         $sl=0;  foreach ($data_list as $key => $data) { $sl++; ?>
                         
                     
                            <tr>
							<td><?php echo $sl; ?></td>
                            <td><?php echo $data->income_id; ?></td> 
                            <td><?php echo $data->project_id; ?></td>    
                            <td><?php echo $data->project_name; ?></td>  
							<td><?php echo $data->customer_name; ?></td> 	
							<td><?php echo $data->income_date; ?></td>
                            <td><?php echo $data->income_amount; ?></td> 
                            <td><?php echo $data->total_amount; ?></td>
                            <td> <a href="<?php echo base_url();?>income/edit_income/<?php echo $data->id;?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit" src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a></td>
                            </tr>
					<?php  } 	?>


                           
						
                          
                            
		
                         
                            </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>


<script type="text/javascript">
    $(document).ready(function() {





      $('#data_table').DataTable({
        "dom": '<"pull-right"f><"pull-left"l>tip'   
    });
} );
</script>
<style>
