
    <br><br>
    <div class="row">


    	<?php foreach ($expense_infos as  $expense_info) {
						
					} 

foreach ($approved_no as  $approved_nos) {
		
	}

	if ($approved_nos->approved_id=="") {
		$approved_number=date('Ym').'10001';

	}else{
		$approved_nos=$approved_nos->approved_id+1;
		$approved_number=date('Ym').$approved_nos;
	}




					 ?>
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 700px;overflow: scroll">
			<div class="panel-heading">View  and Approve Expense</div>
            <div class="table-responsive" id="custom-table">
				<form id="myForm">
                <table id="" class="table ">
                    <tbody>
					<tr>
                  

				
					   <th align="center">Expense Code</th>
                       <td align="center" width="30%"><input type="text" value="<?php echo $expense_info->expense_id ?>" name="expense_code" id="expense_code" class="form-control custom-input" readonly ></td>


					   <th align="center">Approve ID</th>
                       <td align="center" width="30%"><input type="text" value="<?php echo $approved_number; ?>" name="approve_id" id="approve_id" class="form-control custom-input" readonly ></td>					   
					  
                    </tr>  
                    <tr>
					    <th align="center">Expense Type</th>
                       <td >                   
					   <input type="text" name="expense_type" class="form-control col-sm-6 custom-input" id="expense_type" value="<?php echo $expense_info->expense_type; ?>" readonly >
							
					   </td> 
                       <th align="center">Amount</th>
                       <td align="center" style="width:30%"><input type="text" name="amount" value="<?php echo round($expense_info->expense_amount, 2); ?>" id="amount" class="form-control custom-input" readonly ></td>                        
					   
                    </tr>  
			
					<tr>           

					<tr>
                       <th align="center">Pay Type</th>
                       <td>                   
					   <input type="text" name="pay_type" class="form-control col-sm-6 custom-input" id="pay_type" value="<?php echo $expense_info->pay_type ?>" readonly >
							
					   </td>                         
					   <th align="center">Balance</th>
                       <td align="center" width="30%"><input type="text" name="balance" id="balance" class="form-control custom-inputF" required></td>

                    </tr> 		
					<tr>
                       <th align="center">Exp Date</th>
                       <td align="center" style="width:30%"><input type="text" name="expense_date" value="<?php echo $expense_info->expense_date?>" id="" class="form-control custom-input  " readonly required></td>                        
					   <th align="center">Bank Name</th>
                       <td align="center" width="30%">					 
					   <select name="bank_name" class="form-control col-sm-6 custom-input" id="bank_name">
							<option>select</option>
							<?php foreach ($bank_name as  $banks) { ?>
							<option value="<?php echo $banks->bank_name ?>"><?php echo $banks->bank_name ?></option>	
						<?php	}?>
						</select>
						</td>

                    </tr> 		
					<tr>
                       <th align="center">Credit A/C</th>
                       <td align="center" width="30%">					 
					   <select name="credit_account" class="form-control col-sm-6 custom-input" id="credit_account">
							<option>select</option>
							
						</select>
						</td>       
						<th align="center">Cheque No</th>
                       <td align="center" width="30%">					 
					   <input type="" type="text" name="cheque_no" class="form-control col-sm-6 custom-input" id="cheque_no">
					
							
						
						</td>                     
					   

                    </tr> 			
					<tr>
						<th align="center">Customer Name</th>
                       <td align="center">					 
					   <input type="text"  name="customer_name" class="form-control col-sm-6 custom-input" id="customer_name" value="<?php echo $customer_name;  ?>" readonly >
					 
                            
						
						</td>  
						<th align="center">Project Code</th>
                       <td align="center" width="30%">					 
					   <input type="text" name="project_code" class="form-control col-sm-6 custom-input" id="project_code" value="<?php echo $expense_info->project_id ?>" readonly>
							

						
						
						</td>                          

                    </tr>			
					<tr>
                      
						<th align="center">Project Name</th>
                       <td align="center" width="30%">					 
					   <input type="" name="project_name" class="form-control col-sm-6 custom-input" id="project_name" value="<?php echo $expense_info->project_name ?>" readonly>
							
							
						
						</td>
					<th align="center">Supplier Name</th>
                       <td align="center" width="30%">					 
					   <select name="supplier_name" class="form-control col-sm-6 custom-input" id="supplier_name">
							<?php
						      $where_data = array('supplier_id' => $expense_info->supplier_id);
						      $supplier= $this->db->get_where('supplier_info',$where_data)->result_array();
						      foreach ($supplier as $row):
						        ?>
							<option value="<?php echo $row['supplier_id']; ?>" selected><?php echo $row['full_name']; ?></option>
						<?php endforeach; ?>
						</select>
						</td> 						

                    </tr> 	
					<tr>
	                       
						<th align="center">Expensed By</th>
                       <td align="center" width="30%">	


					   <select name="expensed_by" class="form-control col-sm-6 custom-input" id="expensed_by">

					   <option value=" " selected>Select</option>

					   <?php foreach ($employee_list as $each_emaployee) { ?>
					   <option value="<?php echo $each_emaployee->employee_id?>" <?php if ($expense_info->expense_by==$each_emaployee->employee_id){ echo "selected='selected'"; } ?>
					   	
					    ><?php echo $each_emaployee->first_name." ".$each_emaployee->last_name  ?></option>
					<?php    } ?>
						</select>	
						
						</td>
                       <th align="center">Description</th>
                       <td ><input type="text" name="description" id="description" class="form-control custom-input" value="<?php echo $expense_info->description; ?>" required readonly></td>						
						
                       

					   
                    </tr>	
                    <tr>

                       <th align="center">Type</th>
                    <td>
                    	<select name="type" id="type" class="form-control custom-input type">
                    		
                    		<option value="1" <?php if ($expense_info->is_support==1) {
                    			echo "Selected";
                    		} ?>>Support</option>
                    		<option value="0" <?php if ($expense_info->is_support==0) {
                    			echo "Selected";
                    		} ?> >Project</option>
 
                    	</select>
                    </td>
                    	<td ><input type="hidden" id="entry_date" name="entry_date" class="form-control custom-input entry_date " ></td>
                    </tr>		

					<tr>
					<?php if ($this->session->userdata('user_type')=='Super Admin') { ?>
				  <td><a href="<?php echo base_url();?>Expense/approve_expense/<?php echo $expense_info->id ?>" class="btn btn-primary"
                                   onclick="return confirm('Are you sure to Approve?')">Approve</a></td>  
					<?php } ?>
                       
                     
                      <!--  <td><input type='button' class="btn btn-success" id='btn_clear' value='Clear'/>	</td> -->                        
					  
                    </tr>					
           

					</tbody>
					
					</table>
					</form>
            </div>
           
        </div>
      
    </div>
    </div>
	
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_add_expense").click(function(){
			//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				var expense_code = $('#expense_code').val().trim();
				var expense_type = $('#expense_type').val().trim();
				var amount = $('#amount').val().trim();
				var pay_type = $('#pay_type').val().trim();
				var balance = $('#balance').val().trim();
				var expense_date = $('#expense_date').val().trim();
				var bank_name = $('#bank_name').val().trim();
				var credit_account = $('#credit_account').val().trim();
				var cheque_no = $('#cheque_no').val().trim();
				var customer_name = $('#customer_name').val().trim();
				var project_code = $('#project_code').val().trim();
				var project_name = $('#project_name').val().trim();
				var supplier_name = $('#supplier_name').val().trim();
				var expensed_by = $('#expensed_by').val().trim();
				var description = $('#description').val().trim();
				var entry_date = $('#entry_date').val().trim();
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Expense/save_expense',
					data:{ 
							expense_code: expense_code,
							expense_type: expense_type,
							amount: amount,
							pay_type: pay_type,
							balance: balance,
							expense_date: expense_date,
							bank_name: bank_name,
							credit_account: credit_account,
							cheque_no: cheque_no,
							customer_name: customer_name,
							project_code: project_code,
							project_name: project_name,
							supplier_name: supplier_name,
							expensed_by: expensed_by,
							description: description,
							entry_date:entry_date
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						window.location.reload(true);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				
				
			
			}

		});
		
		$("#voucher_no").change(function(){
			var voucher_no = $('#voucher_no').val().trim();
			//$('#expense_code').val(voucher_no);
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>voucher_entry/pick_voucher_info_expenses',
					data:{ 
							voucher_no: voucher_no
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						//alert(response);

						var voucher_info = response.split("#");

						var expense_type = voucher_info[0].trim();
						var amount = voucher_info[1].trim();
						var date = voucher_info[2].trim();
						var customer_name = voucher_info[3].trim();
						var project_code = voucher_info[4].trim();
						var project_name = voucher_info[5].trim();
						var employee_id = voucher_info[6].trim();
						var entry_date = voucher_info[7].trim();

						$('#expense_type').val(expense_type);
						$('#expense_type_html').html(expense_type);
						$('#expense_type').attr("selected","selected");

						$('#amount').val(amount);
						$('#amount').attr("readonly", true); 
						$('#expense_date').val(date);
						$('#expense_date').attr("date", true); 

							//alert(customer_name)

						$('#customer_name').val(customer_name);
						$('#customer_name_html').html(customer_name);
						$('#customer_name').attr("selected","selected");


						$('#project_code').val(project_code);
						//$('#project_code').attr("selected","selected");

						$('#project_name').val(project_name);
						//$('#project_name').attr("selected","selected");
						$('#expensed_by').val(employee_id);
						$('#entry_date').val(entry_date);
						
						//$('#expensed_by').attr("selected","selected");

						
						//$('#supplier_name').attr("disabled", true); 
						//$('#description').attr("readonly", true); 
						//$("#description").attr("type","hidden");


						// alert(response);
						//$("#table_id tbody").html("");
						//$("#table_id tbody").html(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});
		
		
		$("#expense_type").change(function(){
					var expense_type = $('#expense_type').val().trim();
					$('#voucher_no').attr("disabled", true);
					$('#expense_code').attr("disabled", true);
					$("#amount").attr("readonly", false);

		});		
		$('#supplier_name').attr("disabled", true);
		$('#balance').attr("disabled", true);
		$('#type').attr("disabled", true);
		$('#expensed_by').attr("disabled", true);
		$('#bank_name').attr("disabled", true);
		$('#credit_account').attr("disabled", true);
		$('#cheque_no').attr("disabled", true);
		$("#pay_type").change(function(){
					var pay_type = $('#pay_type').val().trim();
					if($('#pay_type').val()=='cash'){
					$('#bank_name').attr("disabled", true);
					$('#cheque_no').attr("disabled", true);
					$('#credit_account').attr("disabled", true);
					
					}
					else if($('#pay_type').val()=='cheque'){
					$('#bank_name').attr("disabled", false);
					$('#cheque_no').attr("disabled", false);
					$('#credit_account').attr("disabled", false);
	
					}			
					else if($('#pay_type').val()=='CreditEmp'){
					$('#bank_name').attr("disabled", true);
					$('#cheque_no').attr("disabled", true);
					$('#credit_account').attr("disabled", true);
	
					}	
					else if($('#pay_type').val()=='CreditSupp'){
					$('#bank_name').attr("disabled", true);
					$('#cheque_no').attr("disabled", true);
					$('#credit_account').attr("disabled", true);
	
					}			
		

		});
		
				$("#customer_name").change(function(){
					//alert("Clicked");
			var customer_name = $('#customer_name').val().trim();
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>project_tracking/pick_project_info_for_expense',
					data:{ 
							customer_name: customer_name
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						//alert(response);
						$('#project_code').html(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});



				$("#project_code").change(function(){
					//alert("Clicked");
			var project_id = $('#project_code').val().trim();
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>project_tracking/pick_project_name_description',
					data:{ 
							project_id: project_id
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						var voucher_info = response.split("#");
						var project_name=voucher_info[0];
						$('#project_name').val(project_name);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});

				//credit_account


				$("#credit_account").change(function(){
					//alert("Clicked");
			var credit_account = $('#credit_account').val().trim();
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Expense/pick_cheque_no',
					data:{ 
							credit_account: credit_account
						},
					//timeout: 4000,
					success: function(result) {
					alert(result);
					
					$('#cheque_no').val(result);
						
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});


				$("#bank_name").change(function(){
					//alert("Clicked");
			var bank_name = $('#bank_name').val().trim();

			//alert(bank_name);
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Expense/pick_account_no',
					data:{ 
							bank_name: bank_name
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						//alert(response);

						$('#credit_account').html(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});
		
		
			$("#btn_clear").click(function(){
			$('#myForm')[0].reset();
		
	});
		
		
	});
	

	
	function form_validation()
	{
		
		//alert("validation");
	
		
				
		return true;
		}
	
	
	   $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	   $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
</script>

	
