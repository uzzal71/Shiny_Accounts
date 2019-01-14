
	<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
		
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
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Process Attendense</div>
              
               
                    <div class="col-xs-12 col-sm-12">
				  <!-- <form name="process_data" action="<?php echo base_url();?>"  method="post"> -->
			<table >
			
			 <tr>
			<td> <label for="from" style="margin-top: 5px">From</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%">  <input type="text" id="from" name="from" class="form-control custom-input dateFrom"
                                   value="<?php echo date('Y-m-d')?>"></td>
			
			</tr> 
			
			<tr>
			<td> <label for="to" style="margin-top: 5px">To</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="to" name="to" class="form-control custom-input dateFrom"
                                   value="<?php echo date('Y-m-d')?>"></td>
			
			</tr>
		
		
			
			<!-- RECORDING TIME AND RECORDED BY-->
			<tr>
			<td>
			<input type="hidden" id="recording_time" name="recording_time" value="<?php  echo date("y-m-d h:i:s");?>" class="form-control custom-input" required>
			<input type="hidden" id="recorded_by" name="recorded_by" value="<?php echo $this->session->userdata("id")?>" class="form-control custom-input" required>
			</td>
			
			</tr>
			
			
				<tr>
			<td>
			 <div class="col-md-4" style="float: right;width: 4%;margin-top: 22px;margin-right: 50px">
                            <button type="submit" class="btn btn-info pull-right">Process</button>
                        </div></td>
			 
			<td> </td>
			<td></td>
			</tr>
			
			
			   
			</table>
			<!-- </form> -->

                    </div>

                    <!-- ........................................... -->

                    <div class="form-horizontal">
                        <div class="form-group">

                        </div>
                    </div>
                
            </div>
        </div>
    </div>
	
	
	
	
	


