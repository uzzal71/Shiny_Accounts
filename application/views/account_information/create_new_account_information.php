<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Create New Account Information</div>
              
               
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
					
				   <form name="save_new_account_information" action="<?php echo base_url();?>Account_information/save_new_account_information"  method="post">
			<table >
			
			 <tr>
			<td> <label for="account_name" style="margin-top: 4px">Account Name</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="account_name" name="account_name" class="form-control custom-input" required></td>
			
			</tr> 
			<tr>
			<td> <label for="account_no" style="margin-top: 4px">Account No</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="account_no" name="account_no" class="form-control custom-input" required></td>
			
			</tr>

			<tr>
			<td> <label for="emp_id" style="margin-top: 4px">Employee Id</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="emp_id" name="emp_id" class="form-control custom-input" required></td>
			
			</tr>

			<tr>
			<td> <label for="bank_name" style="margin-top: 4px">Bank Name</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="bank_name" name="bank_name" class="form-control custom-input" required></td>
			
			</tr> 
			
				<tr>
			<td> <label for="branch" style="margin-top: 4px">Balance</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="number"  step="0.01" min="0" id="balance" name="balance" class="form-control custom-input" required></td>
			
			</tr>


			<tr>
			<td> <label for="branch" style="margin-top: 4px">Branch</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="branch" name="branch" class="form-control custom-input" required></td>
			
			</tr>

			<tr>
			<td> <label for="address" style="margin-top: 4px">Address</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="address" name="address" class="form-control custom-input" required></td>
			
			</tr>

			<tr>
			<td> <label for="bank_contact_no" style="margin-top: 4px">Bank Contact No</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="bank_contact_no" name="bank_contact_no" class="form-control custom-input" required></td>
			
			</tr>

			<tr>
			<td> <label for="opening_date" style="margin-top: 4px">Opening Date</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="opening_date" name="opening_date" class="form-control custom-input dateFrom" required></td>
			
			</tr>

			<tr>
			<td> <label for="introducer_name" style="margin-top: 4px">Introducer Name</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="introducer_name" name="introducer_name" class="form-control custom-input" required></td>
			
			</tr>
		
		
			
			<!-- RECORDING TIME AND RECORDED BY-->
			<tr>
			<td>
			<input type="hidden" id="recording_time" name="recording_time" value="<?php  echo date("y-m-d h:i:s");?>" class="form-control custom-input" required>
			<input type="hidden" id="recorded_by" name="recorded_by" value="<?php echo $this->session->userdata("id")?>" class="form-control custom-input" required>
			</td>
			
			</tr>
			
			
				<tr>
				<td></td>
				<td></td>
				
		 
			
			</tr>
			
			
			   
			</table>

                 <button type="submit" class="btn btn-info pull-right">Add Account Information</button>         
                      

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
	
	<script >
		
		
       // $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
         $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd',
        		changeMonth: true,
                changeYear: true,
                yearRange: "-100:+20" });
		//$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
	</script>
	
	
	