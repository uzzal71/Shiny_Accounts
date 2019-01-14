
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: auto;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Wrok in Progress</h3>
			
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
                <div>
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
						<th align="center">Item ID</th>
                        <th align="center">Item Name</th>
                        <th align="center">WIP Quantity</th>
                        
                    </tr>
                    </thead>
               </div>
                            <tbody>
                       
                            <tr>
                            
							<?php $sl=0; foreach ($work_in_progress as  $wip) { $sl++ ?>
							
							<td><?php echo $sl ?></td>
							<td><?php echo $wip->item_id?></td>
							<td><?php echo $wip->item_name?></td>
							<td><?php echo $wip->wip_quantity?></td>

                              </tr>
                                

                               <?php }?>
                             
							
                            </tr>
					

                         
                            </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>


