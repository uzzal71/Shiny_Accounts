<!-- Page Content -->
    <div class="row" id="myDiv">
        <div class="col-md-6 col-md-offset-3">
        		                 
            <p style = "color:green"><?php  echo $this->session->userdata('message');
            $this->session->unset_userdata('message')?></p>
        
            <div class="panel panel-primary custom-panel">
            <!-- 	                   <h3 align="center">
            <p style = "color:green"><?php echo $this->session->userdata('message');
            $this->session->unset_userdata('message')?></p>
        </h3> -->
                <div class="panel-heading">Account Transfer</div>
              
               
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
					
				  <!--  <form name="save_new_account_information" action="<?php echo base_url();?>Account_information/save_new_account_information"  method="post"> -->
			<table >
			
			 <tr>
			<td> <label for="account_name" style="margin-top: 4px">From Account</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td> <select id="from_account" name="from_account" class="form-control custom-input">
				<option value="select">Select Account</option>
				<?php foreach ($accounts as  $account) { ?>
					<option value="<?php echo $account->account_no?>"><?php echo $account->account_no?></option>
				<?php } ?>


			</select>
			</td>
			
		
			<td> <label for="account_no" style="margin-top: 4px">&nbsp;&nbsp;To Account</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td > <select id="to_account" name="to_account" class="form-control custom-input">
					<option value="select">Select Account</option>
				<?php foreach ($accounts as  $account) { ?>
					<option value="<?php echo $account->account_no?>"><?php echo $account->account_no?></option>
				<?php } ?>

			</select>
			</td>
			
			</tr>

			<tr>
			<td> <label for="emp_id" style="margin-top: 4px">Balance</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td > <input type="number"  step="0.01" min="0" id="balance" name="balance" class="form-control custom-input" readonly></td>

			<td> <label for="bank_name" style="margin-top: 4px">&nbsp;&nbsp;Amount</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td > <input type="number"  step="0.01" min="0" id="amount" name="amount" class="form-control custom-input" required></td>
			
			</tr> 
			
				<tr>
			<td> <label for="branch" style="margin-top: 4px">&nbsp;Remarks</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td colspan="1"> <input type="text"   id="remarks" name="remarks" class="form-control custom-input" required></td>
			<td> <label for="branch" style="margin-top: 4px">&nbsp;Reference</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td> <input type="text"   id="reference" name="reference" class="form-control custom-input" required></td>
			</tr>


		
		
		
			
			
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				<td colspan="2"><button type="submit" id="submit" class="btn btn-success pull-right">Transfer</button><button type="reset" id="reset" value=" value="Reset" class="btn btn-warning pull-right reset" style="margin-right: 20px;">Reset</button> </td>
			
				
		 
			
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
	
	<script >
		$(document).ready(function() {
		
 
		
        $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	$("#from_account").change(function(){
	
			
			var from_account = $('#from_account').val().trim();
						
			var response;
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Account_information/retrieve_current_balance',
					data:{ 
							from_account: from_account
						},
					//timeout: 4000,
					success: function(result) {

						//alert(result);
						response = result;
						$('#balance').val(response);
		
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
					

			
		
		});

$("#submit").click(function(){
	
			if(form_validation()){
			var from_account = $('#from_account').val().trim();
			var to_account	= $('#to_account').val().trim();
			var balance = $('#balance').val().trim();
			var amount = $('#amount').val().trim();
			var remarks = $('#remarks').val().trim();
			var reference=$('#reference').val().trim();
			//alert("Got It");
			
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Account_information/save_account_transfer',
					data:{ 
							from_account: from_account,
							to_account: to_account,
							balance: balance,
							amount:amount,
							reference:reference,
							remarks: remarks
						},
					//timeout: 4000,
					success: function(result) {

						//alert(result);
						window.location.reload(true);
						//$('#balance').val(response);
		
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
					

			
		
		}});


function form_validation(){


	if($('#from_account').val()=='select'){

		alert("Please Select From Account");
			$('#from_account').focus();
				return false;
			event.preventDefault();
		
	}

	if ($('#to_account').val()=='select') {

		alert("Please Select To Account");
			$('#to_account').focus();
				return false;
			event.preventDefault();
			
	}if ($('#amount').val()=="") {

		alert("Please Enter Amount");
			$('#amount').focus();
				return false;
			event.preventDefault();
			
	}if ($('#reference').val()=="") {

		alert("Please Enter Reference");
			$('#reference').focus();
				return false;
			event.preventDefault();
			
	}

	if ($('#from_account').val()==($('#to_account').val())) {

		alert("No Transfer Possible! From And To Account Is Same");
			$('#to_account').focus();
			//$('#from_account').focus();
				return false;
			event.preventDefault();
			
	}

	return true;
}

});
	</script>
	
	
	