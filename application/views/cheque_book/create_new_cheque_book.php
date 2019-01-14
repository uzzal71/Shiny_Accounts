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
			<td> <label for="bank_name" style="margin-top: 4px">Bank Name</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:35%"> <select name="bank_name" class="form-control col-sm-6 custom-input" id="bank_name" required>
			<option value=" " selected>Select A Bank Name</option>
							<?php foreach($bank_name as $bank_names){?>
                                <option value="<?php echo $bank_names->bank_name?>" ><?php echo $bank_names->bank_name?></option>
                             
							<?php }?>
								</select></td>
			
			</tr>
			<tr>
			<td> <label for="account_no" style="margin-top: 4px">Account No</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td>
			<select name="account_no" class="form-control  custom-input" id="account_no" >

					   </select>
			</td>
			</tr> 
			<tr>
			<td width="35px;"><label for="cheque_starting_no" style="margin-top: 4px">Cheque Starting No</label></td>
			<td style="margin-right: 0px;"><input type="text" id="cheque_starting_char" name="cheque_starting_char" class="form-control custom-input" required style="width: 120px;margin-right: 5px;"></td>
			<td style="width:35%" style="margin-left: 0px;"><input type="number" id="cheque_starting_no" name="cheque_starting_no" class="form-control custom-input" required></td>
			
			</tr> 
			<tr>
			<td> <label for="cheque_end_no" style="margin-top: 4px">Cheque End No</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:35%"> <input type="text" id="cheque_end_no" name="cheque_end_no" class="form-control custom-input" required></td>
			
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
	
	<script type="text/javascript">
	$(document).ready(function() {





		$("#bank_name").change(function(){
			//alert("Here");
			var bank_name	= $('#bank_name').val().trim();

		//alert(bank_name);
			//var response;
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Cheque_book/pick_account_no',
					data:{ 
							bank_name: bank_name
						},
					//timeout: 3500,
					success: function(result) {

						//alert(result);
						response = result;
						$('#account_no').html(response);
						
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
					

			//$('#employee_name').val(response);
		
		});

});

	 </script>
	
	
	