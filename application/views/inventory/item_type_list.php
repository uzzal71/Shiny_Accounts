
    <br><br>
    <div class="row" style="background-color: white;">
        <div  class="col-md-10 col-md-offset-1" style="padding: 1px;margin-left: 210px;">
            <div >
			<h3 align="center" > Item types List</h3>
			
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
						<th align="center">Item Type ID</th>
                        <th align="center">Item Type Name</th>
                        <th align="center">Description</th>
                        
                        <th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							 <?php
							$serial_no=0;
							foreach($item_type_for_list as $each_item_type){
								$serial_no++?>
                            <tr>
							
                                <td><?php echo $serial_no;?></td>
                                <td><?php echo $each_item_type->type_id?></td>
                                <td style="text-align: left; width: 100px"><?php echo $each_item_type->type_name?></td>
                                <td><?php echo $each_item_type->description?></td>
								
                               
							
                                
                                <td width="130px">
                                    <!-- <a href="<?php echo base_url();?>Inventory/view_item_info/<?php echo $each_item_type->id?>"> <img style="margin: 3%" border="0"title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/details.png"width="25" height="20"></a> --> 
									<a href="<?php echo base_url();?>Inventory/edit_item_type/<?php echo $each_item_type->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
                                    <a href="<?php echo base_url();?>Inventory/delete_item_type/<?php echo $each_item_type->id?>" id="" onclick="return confirm('Are you sure?')">
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
   // $('#data_table').DataTable();
      $('#data_table').DataTable({
        "dom": '<"pull-right"f><"pull-left"l>tip'
        //"sPaginationType": "full_numbers"
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