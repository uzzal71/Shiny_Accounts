<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Create New Cheque Book</div>
              
               
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
				   <form name="save_new_cheque_book" action="<?php echo base_url();?>Cheque_book/save_new_cheque_book"  method="post">
			<table >
			
			 
			<tr>
			<td> <label for="account_no" style="margin-top: 4px">Account No</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <select name="account_no" class="form-control col-sm-6 custom-input" id="account_no" required>
							<?php foreach($view_account as $v_account){?>
                                <option value="<?php echo $v_account->account_no?>" ><?php echo $v_account->account_no?></option>
                             
							<?php }?>
								</select></td>
			
			</tr> 
			<tr>
			<td> <label for="cheque_starting_no" style="margin-top: 4px">Cheque Starting No</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="cheque_starting_no" name="cheque_starting_no" class="form-control custom-input" required></td>
			
			</tr> 
			<tr>
			<td> <label for="cheque_end_no" style="margin-top: 4px">Cheque End No</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="cheque_end_no" name="cheque_end_no" class="form-control custom-input" required></td>
			
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
                            <button type="submit" class="btn btn-info pull-right">Add Cheque Book</button>
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
	
	
	
	
	