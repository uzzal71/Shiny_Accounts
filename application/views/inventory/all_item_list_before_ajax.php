
    <br><br>
    <div class="row" style="background-color: white;">
        <div  class="col-md-10 col-md-offset-1" style="padding: 1px;margin-left: 210px;">
            <div >
			<h3 align="center" > Items List</h3>
			
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
                <table id="data_table" class="table table-striped table-bordered" style="width:100%;">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
						<th align="center">Item ID</th>
                        <th align="center">Item Name</th>
                        <th align="center">Description</th>
                        <th align="center">Quantity</th>
                         <th align="center">UoM</th>
                        <th align="center" width="20px;">Price</th>
                       
                        <th abbr="center">Location</th>
                        <th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							 <?php
							$serial_no=0;
							foreach($items_data as $each_item){
								$serial_no++?>
                            <tr>
							
                                <td align="center"><?php echo $serial_no;?></td>
                                <td><?php echo $each_item->item_id?></td>
                                <td style="text-align: left; width: 100px"><?php echo $each_item->item_name?></td>
                                <td width="150px;"><?php echo $each_item->remarks?></td>
								<td width="50px;" style="text-align: right;"><?php echo $each_item->quantity?></td>
                                
                                 <td><?php echo $each_item->uom?></td>
                                <td style="width: 20px;text-align: right;"><?php echo $each_item->unit_price?></td>
                               
								<td style="text-align: left;"><?php echo $each_item->location?></td>
                                
                                <td width="130px">
                                    <a href="<?php echo base_url();?>Inventory/view_item_info/<?php echo $each_item->id?>"> <img style="margin: 3%" border="0"title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/details.png"width="25" height="20"></a> 
									<a href="<?php echo base_url();?>Inventory/edit_item_info/<?php echo $each_item->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
                                    <a href="<?php echo base_url();?>Inventory/delete_item_info/<?php echo $each_item->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This Item" alt="Delete"
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

<script type="text/javascript">
    
    $(document).ready(function() {

      $('#data_table').DataTable({
        "dom": '<"pull-right"f><"pull-left"l>tip'
    });
} );
</script>
<style>
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
  background: none;
  color: black!important;
  border-radius: 1px;
  border: 1px solid #828282;
}
 
.dataTables_wrapper .dataTables_paginate .paginate_button:active {
  background: none;
  color: black!important;
}
</style>