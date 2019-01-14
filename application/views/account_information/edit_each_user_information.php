<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-8 col-md-offset-3">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Update Account Information</div>
              
               
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
                <table id="" class="table ">
                    <tbody>
					<tr>
                       <th align="center">Account Name</th>
                       <td width="30%">                   
					   <input type="text" id="account_name" value = "<?php echo $each_account_info->account_name?>" name="account_name" class="form-control custom-input " required>
					   </td width="30%">  
					   <th align="center">Account No</th>
                       <td align="center">
						<input type="text" id="account_no" value = "<?php echo $each_account_info->account_no?>" name="account_no" class="form-control custom-input ">
					   </td>					   
					  
                    </tr>  			
					<tr>

					<tr>
                       <th align="center">Employee Id</th>
                       <td align="center">
						<select name="emp_id" class="form-control col-sm-6 custom-input" id="emp_id">
							<option value="select">Select</option>
								<?php 
								
								foreach($all_employee as $each_employee){?>
							<option <?php if($each_employee->employee_id == $each_account_info->emp_id){echo 'selected = "selected"';}?> value="<?php echo $each_employee->employee_id?>"><?php echo $each_employee->employee_id?></option>
							<?php }?>
                       </select>
					   </td>  
					   <th align="center">Bank Name</th>
                       <td align="center">
						<input type="text" id="bank_name" value = "<?php echo $each_account_info->bank_name?>" name="bank_name" class="form-control custom-input ">
					   </td>					   
					  
                    </tr>  

                    <tr>
                       <th align="center">Branch</th>
                       <td width="30%">                   
					   <input type="text" id="branch" value = "<?php echo $each_account_info->branch?>" name="branch" class="form-control custom-input " required>
					   </td width="30%">  
					   <th align="center">Address</th>
                       <td align="center">
						<input type="text" id="address" value = "<?php echo $each_account_info->address?>" name="address" class="form-control custom-input ">
					   </td>					   
					  
                    </tr> 

                     <tr>
                       <th align="center">Bank Contact No</th>
                       <td width="30%">                   
					   <input type="text" id="bank_contact_no" value = "<?php echo $each_account_info->bank_contact_no?>" name="bank_contact_no" class="form-control custom-input " required>
					   </td width="30%">  
					   <th align="center">Opening Date</th>
                       <td align="center">
						<input type="text" id="opening_date" value = "<?php echo $each_account_info->opening_date?>" name="opening_date" class="form-control custom-input dateFrom">
					   </td>					   
					  
                    </tr> 
                    <tr>
                       <th align="center">Introducer Name</th>
                       <td width="30%">                   
					   <input type="text" id="introducer_name"  value = "<?php echo $each_account_info->introducer_name?>"name="introducer_name" class="form-control custom-input " required>		
					      <input type="hidden" id="id" name="id" value = "<?php echo $each_account_info->id?>" class="form-control custom-input " >
					   </td width="30%">  
					   <th align="center">Balance</th>
                       <td align="center">
						<input type="number" id="balance" step="0.01" min="0"  name="balance" class="form-control custom-input balance" value="<?php echo sprintf("%.2f", $each_account_info->balance)  ?>" readonly>
					   </td>					   
					  
                    </tr>			
					
					
					<tr>
                        <th></th> <th></th> <th></th>
                       <td font-size="24"><input type="button"id="btn_account_info" class="btn btn-success" value="Update"/></td>                      
					  
                    </tr>					
           

					</tbody>
					
					</table>
					</form>
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

		$("#btn_account_info").click(function(){
								
				//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				
				var account_name = $('#account_name').val().trim();
				var account_no = $('#account_no').val().trim();
				var emp_id = $('#emp_id').val().trim();
				var bank_name = $('#bank_name').val().trim();
				var branch = $('#branch').val().trim();
				var address = $('#address').val().trim();
				var bank_contact_no = $('#bank_contact_no').val().trim();
				var opening_date = $('#opening_date').val().trim();
				var introducer_name = $('#introducer_name').val().trim();
				var id = $('#id').val().trim();
				var balance= $('#balance').val().trim();
				
				//alert("variable assigned");
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Account_information/update_account_information',
					data:{ 
							account_name: account_name,
							account_no: account_no,
							emp_id: emp_id,
							bank_name: bank_name,
							branch: branch,
							address: address,
							bank_contact_no: bank_contact_no,
							opening_date: opening_date,
							introducer_name: introducer_name,
							balance:balance,
							id: id
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						window.location.replace("<?php echo base_url()?>Account_information/account_information_list");
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				//alert(response);
			
			}

	});


	
	function form_validation()
	{
		//alert("validation");
		
		if($('#account_name').val().trim() == "")
		{
			alert("Please Insert Account Name");
			$('#account_name').focus();
			return false;
		}
		else if($('#account_no').val().trim() == "")
		{
			alert("Please Insert Account No");
			$('#account_no').focus();
			return false;
		}
		else if($('#emp_id').val().trim() == "select")
		{
			alert("Please Select Employee id.");
			$('#emp_id').focus();
			return false;
		}			
		else if($('#bank_name').val().trim() == "")
		{
			alert("Please Insert Bank Name.");
			$('#bank_name').focus();
			return false;
		}	
		else if($('#branch').val().trim() == "")
		{
			alert("Please Insert Branch Name");
			$('#branch').focus();
			return false;
		}			
		else if($('#address').val().trim() == "")
		{
			alert("Please Insert Address");
			$('#branch').focus();
			return false;
		}			
		else if($('#bank_contact_no').val().trim() == "")
		{
			alert("Please Insert Bank Contact No.");
			$('#bank_contact_no').focus();
			return false;
		}
		else if($('#opening_date').val().trim() == "")
		{
			alert("Please Insert Opening Date.");
			$('#bank_contact_no').focus();
			return false;
		}
		else if($('#introducer_name').val().trim() == "")
		{
			alert("Please Insert Introducer Name");
			$('#introducer_name').focus();
			return false;
		}			

		return true;
	}
	
		//  ======  ######  For Selecting Date Time and DateTime  ######  ======

        $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
           $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd',
        		changeMonth: true,
                changeYear: true,
                yearRange: "-100:+20" });
		$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
		});
</script>

	