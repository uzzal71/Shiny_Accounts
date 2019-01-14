<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Create New Negotiator</div>
              
               
                    <div class="col-xs-12 col-sm-12">
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
				   <form name="save_new_negotiator" action="<?php echo base_url();?>negotiator/save_new_negotiator"  method="post">
			<table>
			
			 <tr>
			<td> <label for="full_name" style="margin-top: 4px">Negotiator Name</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="full_name" name="full_name" class="form-control custom-input" required></td>
			
			</tr> 
			
			<tr>
			<td> <label for="type" style="margin-top: 4px">Type</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <select required name="type" class="form-control col-sm-6 custom-input" id="type">
                           <?php foreach($view_negotiator_type as $v_negotiator_type){?>
                            <option value="<?php echo $v_negotiator_type->id?>"><?php echo $v_negotiator_type->type?></option>
						   <?php }?>
                        </select><br class="hidden-xs"></td>
			
			</tr>

			<tr>
			<td> <label for="address" style="margin-top: 4px">Address</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="address" name="address" class="form-control custom-input" required></td>
			
			</tr> <tr>
			<td> <label for="contact_no" style="margin-top: 4px">Contact No</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="contact_no" name="contact_no" class="form-control custom-input" required></td>
			
			</tr> <tr>
			<td> <label for="email" style="margin-top: 4px">Email</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="email" name="email" class="form-control custom-input" required></td>
			
			</tr> <tr>
			<td> <label for="is_active" style="margin-top: 4px">Is Active</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <select required name="is_active" class="form-control col-sm-6 custom-input" id="is_active">
                           
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
						
                        </select><br class="hidden-xs"></td>
			
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
                            <button type="submit" class="btn btn-info pull-right">Add Negotiator</button>
                        </div></td>
			 
			<td> </td>
			<td></td>
			</tr>
			
			
			   
			</table>
			</form>

                    </div>

                    <!-- ........................................... -->

                    <div class="form-horizontal">
                        <div class="form-group">

                        </div>
                    </div>
                
            </div>
        </div>
    </div>
	
	
	
	
	