
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;">Approved Requisition List</h3>
			
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
                        <th align="center" style="width: 30px;">SL#</th>
						<th align="center">Requisition No</th>
                        <th align="center">Project ID</th>
                        <th align="center">Recording Time</th>
                        <th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							 <?php
							$serial_no=0;
							foreach($requisition_data as $each_requisition){
								$serial_no++?>
                            <tr>
							
                                <td><?php echo $serial_no;?></td>
                                <td><?php echo $each_requisition->requisition_no;?></td>
                                <td><?php echo $each_requisition->project_id;?></td>
                                <td><?php echo $each_requisition->recording_time;?></td>
                                
                               <td width="130px">
                                    <a href="<?php echo base_url();?>Inventory/requisition_view/<?php echo $each_requisition->id?>"> <img style="margin: 3%" border="0" title="See Details" alt="Details" 
                                    src="<?php echo base_url();?>images/details.png" width="25" height="20"></a> 
								<!-- 	 <a href="<?php echo base_url();?>Inventory/approved_requisition_update/<?php echo $each_requisition->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a> -->
                                   
                                   
                                </td> 
								
							
                            </tr>
							<?php }?>

                         
                            </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>


