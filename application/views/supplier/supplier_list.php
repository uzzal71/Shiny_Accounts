
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;">Supplier List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center"> supplier ID</th>
                        <th align="center"> Full Name</th>
                        <th align="center"> Short Name</th>
                        <th align="center">supplier Address</th>
                        <th align="center">Factory Address</th>
                        <th align="center">supplier Contact</th>
                        <th align="center">Factory Contact</th>       
						<th align="center">supplier Designation</th>
                        <th align="center">Factory Designation</th>      
						<th align="center">supplier Email</th>
                        <th align="center">Factory Email</th>            
						<th align="center">supplier Mobile</th>
                        <th align="center">Factory Mobile</th>					
						<th align="center">supplier Phone</th>
                        <th align="center">Factory Phone</th>
                        <th align="center">Web Address</th>
                        <th align="center">Reference</th>
                        <th align="center">IS Active</th>
                        <th align="center">Recorded By</th>
                        <th align="center">Recording Time</th>      
						<th align="center">Updated By</th>
                        <th align="center">Updating Time</th>
						<th align="center">Action</th>
                    </tr>
                    </thead>
					<?php $serial_no=0;?>
                            <tbody>
							<?php foreach($view_supplier_list as $each_supplier){
								$serial_no++?>
                            <tr>
							
                                <td><?php echo $serial_no?></td>
								<td><?php echo $each_supplier->supplier_id?></td>
                                <td><?php echo $each_supplier->full_name?></td>
                                <td><?php echo $each_supplier->short_name?></td>
                                <td><?php echo $each_supplier->supplier_address?></td>
                                <td><?php echo $each_supplier->factory_address?></td>
								<td><?php echo $each_supplier->supplier_contact?></td>
                                <td><?php echo $each_supplier->factory_contact?></td>
								<td><?php echo $each_supplier->supplier_designation?></td>
                                <td><?php echo $each_supplier->factory_designation?></td>
								<td><?php echo $each_supplier->supplier_email?></td>
                                <td><?php echo $each_supplier->factory_email?></td>
								<td><?php echo $each_supplier->supplier_mobile?></td>
                                <td><?php echo $each_supplier->factory_mobile?></td>
								<td><?php echo $each_supplier->supplier_phone?></td>
                                <td><?php echo $each_supplier->factory_phone?></td>
                                <td><?php echo $each_supplier->web_address?></td>
                                <td><?php echo $each_supplier->reference?></td>
                                <td>
                                 <?php
                                if($each_supplier->is_active == '1')
                                {
                                    echo "Active";

                                }
                                else
                                {
                                     echo "Inactive";
                                }?>
                                </td>
								
                                <td><?php echo $each_supplier->recorded_by?></td>
                                <td><?php echo $each_supplier->recording_time?></td>    
								<td><?php echo $each_supplier->updated_by?></td>
                                <td><?php echo $each_supplier->updating_time?></td>
                               
                                
                               <td width="130px">
                                    <a href="<?php echo base_url()?>supplier/details_view/<?php echo $each_supplier->id?>"> <img style="margin: 3%" border="0"title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/details.png"width="25" height="20">
									</a> 
									
									<a href="<?php echo base_url()?>supplier/edit_supplier/<?php echo $each_supplier->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20">
									</a>
									
                                    <a href="<?php echo base_url()?>supplier/delete_supplier/<?php echo $each_supplier->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                </td>
								
							
                            </tr>
							<?php }?>


                           
								<?php if($view_supplier_list==null){?>
                          
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
                                $(document).ready(function () {
                                    var deleteButton='deleteButton' + '{{ $supplier->id }}' ;
                                    var deleteEmployee='deletesupplier' + '{{ $supplier->id }}' ;
                                    var deleteEmployee='deletesupplier' + '{{ $supplier->id }}' ;
                                    var deleteEmployee='deletesupplier' + '{{ $supplier->id }}' ;
                                    var deleteEmployee='deletesupplier' + '{{ $supplier->id }}' ;
                                    $('#'+deleteButton).click(function () {
                                        $('#'+deletesupplier).submit();
                                        return false;
                                    })
                                })
                            </script>


