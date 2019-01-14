
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Add Bank Account For Salary Disbursement</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>

			
					<tr>           

							
					<tr>                      
					   <th align="center">Bank Name</th>
					   <td align="center">
							<select required name="bank_name" class="form-control custom-input" id="bank_name">
								<option value="">Select</option>
								<?php foreach($bank_name as $each_bank){?>
								<option value="<?php echo $each_bank->bank_name?>"><?php echo $each_bank->bank_name?></option>
								<?php }?>
							</select>
							 <th align="center">Account Number</th>
					   <td align="center">
							<select required name="account_number" class="form-control custom-input" id="account_number">		
							</select>
					   </td>
					   </td>  
					</tr> 	
					<tr>
	
	
						
					<tr>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td><button type="submit" id="btn_add" class="btn btn-info pull-right">Add Account</button></td>                        
					  
                    </tr>					
           

					</tbody>
					
					</table>

            </div>
           
        </div>
      
    </div>
    </div>

	
<script type="text/javascript">
	$(document).ready(function() {

		$("#btn_add").click(function(){
			
			//alert("Button Clicked");
			
			
				//alert("validation true");
				
				var bank_name = $('#bank_name').val();
				var account_number = $('#account_number').val();
								//alert(account_number);

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Attendence/save_salary_account',
					data:{ 
							bank_name: bank_name,
							account_number: account_number
							
						},
					//timeout: 4000,
					success: function(result) {
						alert(result);
						//window.location.href = "<?php echo base_url();?>Attendence/salary_preview";
						//$( "#a" ).load( "<?php echo base_url();?>application/views/Attendence/salary_preview.php" );
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				
				//alert(response);
			
			

		});
		
		


				$("#bank_name").change(function(){
					
			var bank_name = $('#bank_name').val().trim();

			
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Expense/pick_account_no',
					data:{ 
							bank_name: bank_name
						},
					
					success: function(result) {
						response = result;
						

						$('#account_number').html(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});


		
		$('.monthYear').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'mm-yy',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
    });

	
	});
	

	

	   $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	   $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
	   $('.month').datepicker({ dateFormat:'mm-yy' });
</script>

	
