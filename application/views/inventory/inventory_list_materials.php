
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Inventory List (Raw Materials)</h3>
			
						<h3 style="color: green; text-align:center" >  
				<?php
                     $msg=$this->session->userdata('message');
                     if($msg)
                     {
                        echo $msg."<br> <br>";
						 $this->session->unset_userdata('message');
					 }
                 ?>
             </h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
						<th align="center">Item Name</th>
                        <th align="center">Item ID</th>
                        <th align="center">Unit Price</th>
                        <th align="center">Quantity</th>
                        <th align="center">UoM</th>
                        <th align="center">Remarks</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php

                           // print_r($item_info);exit();
							$serial_no=0;
							foreach($item_info as $each_item){
								$serial_no++?> 
                            <tr>
							
                                <td><?php echo $serial_no;?></td>
                                <td><?php echo $each_item->item_name?></td>
								<td><?php echo $each_item->item_id?></td>
                                <td><?php echo $each_item->unit_price?></td>
                                <td><?php echo $each_item->quantity?></td>
								<td><?php echo $each_item->uom?></td>
                                 <td><?php echo $each_item->remarks?></td>
                               <!--  <td width="130px">
                                    <a href="<?php echo base_url();?>Employee/details_view/<?php echo $each_employee->id?>"> <img style="margin: 3%" border="0"title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/details.png"width="25" height="20"></a> 
									<a href="<?php echo base_url();?>Employee/edit_employee/<?php echo $each_employee->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
                                    <a href="<?php echo base_url();?>Employee/delete_employee/<?php echo $each_employee->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>
                                </td> -->
								
							
                            </tr>
							<?php }?>

                         
                            </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>


