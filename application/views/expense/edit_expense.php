
    <br><br>
    <div class="row">
    	<?php foreach ($expense_infos as  $expense_info) {
    		// echo '<pre>';
    		// print_r($expense_info);
    		// exit();
						
					}  ?>
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 700px;overflow: scroll">
			<div class="panel-heading">Edit Expense</div>
            <div class="table-responsive" id="custom-table">
            	<br>
            	<button id="reload_voucher" class="btn btn-success" style="margin-left: 360px;">Reload Voucher</button>
            	<br>
            	<br>
				<form id="myForm">
                <table id="" class="table ">
                    <tbody>
					<tr>
                       <th align="center">Add Voucher :*</th>
                       <td  width="30%">                   
					   <select name="voucher_no" class="form-control col-sm-7 custom-input" id="voucher_no">
							<option value="">select</option>
							<option selected value="<?php echo $expense_info->voucher_no ?>"><?php echo $expense_info->voucher_no ?></option>
						</select>
					   </td>  

				
					   <th align="center">Expense Code</th>
                       <td align="center" width="30%"><input type="text" value="<?php echo $expense_info->expense_id ?>" name="expense_code" id="expense_code" class="form-control custom-input" readonly required></td>					   
					  
                    </tr>  
                    <tr>
					    <th align="center">Expense Type</th>
                       <td >                   
					   <select name="expense_type" class="form-control col-sm-6 custom-input" id="expense_type">
							<option id="expense_type_html" selected>select</option>
							<?php foreach($all_expense_types as $each_expense_types){?>
								<option value="<?php echo $each_expense_types->expense_type;?>" 
								<?php   if ($expense_info->expense_type==$each_expense_types->expense_type) {
									echo "selected='selected'";
								}?> ><?php echo $each_expense_types->expense_type;?></option>
							<?php }?>
						</select>
					   </td> 
                       <th align="center">Amount</th>
                       <td align="center" style="width:30%">
                       	<input type="number" name="amount" value="<?php echo round($expense_info->expense_amount, 2); ?>" id="amount" step="0.01" min="0" class="form-control custom-input" >
                       	<!-- <?php
                       		$amount = 0;
                       		$con = mysqli_connect("localhost", "root", "", "test_easy_accounts"); 
                       		$query = "SELECT `expense_amount` FROM expense_info WHERE voucher_no = '$expense_info->voucher_no'";
                       		$result = mysqli_query($con, $query);
                       		if(mysqli_num_rows($result) > 0) {
                       			$amount = 0;
                       			while($row = mysqli_fetch_assoc($result)) {
                       				$amount = $amount + $row['expense_amount'];
                       			}
                       		}
                       	 ?> -->
                       	 <!-- <input class="form-control custom-input" type="number" name="amount" id="amount" value="<?php if(isset($amount)){echo $amount;}else{echo "00.00";} ?>"> -->
                       </td>                        
					   
                    </tr>  
			
					<tr>           

					<tr>
                       <th align="center">Pay Type</th>
                       <td>                   
					   <select name="pay_type" class="form-control col-sm-6 custom-input" id="pay_type">
							<option value="select" <?php if ($expense_info->pay_type=="select") {
								echo "selected='selected'"; 
							} ?>>select</option>

							<option value="Cash" <?php if ($expense_info->pay_type=="cash" ||$expense_info->pay_type=="Cash") {
								echo "selected='selected'"; 
							} ?> >Cash</option>

                            <option value="Cheque" <?php if ($expense_info->pay_type=="cheque" ||$expense_info->pay_type=="Cheque") {
								echo "selected='selected'"; 
							} ?>  >Cheque</option>


                            <option value="CreditEmp"  <?php if ($expense_info->pay_type=="CreditEmp") {
								echo "selected='selected'"; 
							} ?>  >CreditEmp</option>

                            <option value="CreditSupp" <?php if ($expense_info->pay_type=="CreditSupp") {
								echo "selected='selected'"; 
							} ?>  >CreditSupp</option>
							
						</select>
					   </td>                         
					   <th align="center">Balance</th>
                       <td align="center" width="30%"><input type="text" name="balance" id="balance" class="form-control custom-inputF" required></td>

                    </tr> 		
					<tr>
                       <th align="center">Exp Date</th>
                       <td align="center" style="width:30%"><input type="text" name="expense_date" value="<?php echo $expense_info->expense_date?>" id="expense_date" class="form-control custom-input dateFrom" required></td>                        
					   <th align="center">Bank Name</th>
                       <td align="center" width="30%">					 
					   <select name="bank_name" class="form-control col-sm-6 custom-input" id="bank_name">
							<option value="">select</option>
							<?php foreach ($bank_name as  $banks) { ?>
							<option selected value="<?php echo $banks->bank_name ?>"><?php echo $banks->bank_name ?></option>	
						<?php	}?>
						</select>
						</td>

                    </tr> 		
					<tr>
                       <th align="center">Credit A/C</th>
                       <td align="center" width="30%">					 
					   <select name="credit_account" class="form-control col-sm-6 custom-input" id="credit_account">
							<option selected="" value="<?php echo $expense_info->cheque_bank; ?>"><?php echo $expense_info->cheque_bank; ?></option>
						
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
					   <select name="customer_name" class="form-control col-sm-6 custom-input" id="customer_name" >
					   <option id="customer_name_html">select</option> 
					   	<?php foreach ($all_customers as $each_customer) { ?>
					   	<option value="<?php echo $each_customer->full_name ?>" <?php if($customer_name==$each_customer->full_name){ echo "Selected";

					   		} ?>><?php echo $each_customer->full_name ?></option>
					  <?php   	} ?>


					   </select>
                            
						
						</td>  
						<th align="center">Project Name</th>
                       <td align="center" width="30%">					 
					   <select name="project_code" class="form-control col-sm-6 custom-input" id="project_code">
					   <option value="select">Select</option>
						<?php foreach ($projects_list as $projects_list) { ?>
							<option value="<?php echo $projects_list->project_id; ?>"<?php if ($expense_project_id==$projects_list->project_id) {
								echo "Selected";
							} ?>><?php echo $projects_list->project_name; ?></option>
					<?php	} ?>	

						</select>	
						
						</td>                          

                    </tr>			
					<tr>
                      
						<th align="center">Project Code</th>
                       <td align="center" width="30%">
                       	<input type="text" id="fake_project_code" value="<?php echo $expense_info->project_id; ?>" readonly class="form-control col-sm-6 custom-input">

					   <input type="hidden" name="project_name" class="form-control col-sm-6 custom-input" id="project_name" value="<?php echo $expense_info->project_name; ?>">
							
							
						
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
						<?php 
			               $all_supplier= $this->db->get('supplier_info')->result_array();
			                foreach ($all_supplier as $row):
						        ?>
							<option value="<?php echo $row['supplier_id']; ?>"><?php echo $row['full_name']; ?></option>
						<?php endforeach; ?>
							</select>
						</td> 						

                    </tr> 	
					<tr>
	                       
						<th align="center">Expensed By</th>
                       <td align="center" width="30%">	


					   <select name="expensed_by" class="form-control col-sm-6 custom-input" id="expensed_by">

					   <?php foreach ($employee_list as $each_emaployee) { ?>
					   <option selected value="<?php echo $each_emaployee->employee_id?>" <?php if ($expense_info->expense_by==$each_emaployee->employee_id){ echo "selected='selected'"; } ?>
					   	
					    ><?php echo $each_emaployee->first_name." ".$each_emaployee->last_name  ?>
					    	<!-- <input type="hidden" name="exp_name" value=""> -->
					    </option>
					<?php    } ?>
						</select>	
						
						</td>
                       <th align="center">Description</th>
                       <td ><input type="text" name="description" id="description" class="form-control custom-input" value="<?php echo $expense_info->description; ?>" required></td>						
						
                       

					   
                    </tr>	
                    <tr>

                       <th align="center">Type</th>
                    <td>
                    	<select name="type" id="type" class="form-control custom-input type">
                    		
                    		<option value="1" <?php if ($expense_info->is_support==1) {
                    			echo "selected";
                    		} ?>>Support</option>
                    		<option value="0" <?php if ($expense_info->is_support==0) {
                    			echo "selected";
                    		} ?> >Project</option>
 
                    	</select>
                    </td>
                    	<td ><input type="hidden" id="entry_date" name="entry_date" class="form-control custom-input entry_date " ></td>
                    </tr>		

					<tr>
                       
                       <td><input type='button' class="btn btn-success" id='btn_add_expense' value='Update Expense'/>	</td>    
                      <!--  <td><input type='button' class="btn btn-success" id='btn_clear' value='Clear'/>	</td> -->                        
					  
                    </tr>					
           

					</tbody>
					
					</table>
					</form>

					<div id="result_me"></div>
            </div>
           
        </div>
      
    </div>
    </div>
	
<script type="text/javascript">
	$(document).ready(function() {


		/*
		Reload voucher click event
		*/
		$("#reload_voucher").click(function(){
			var voucher_no = $("#voucher_no").val();
			//alert(voucher_no);
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Expense/reload_voucher_select',
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
						var project_id= voucher_info[4].trim();
						var project_name = voucher_info[5].trim();
						var employee_id = voucher_info[6].trim();
						var entry_date = voucher_info[7].trim();
						var description = voucher_info[8].trim();

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


						$('#project_code').val(project_id);
						//$('#project_code').attr("selected","selected");

						$('#project_name').val(project_name);
						//$('#project_name').attr("selected","selected");
						$('#expensed_by').val(employee_id);
						$('#entry_date').val(entry_date);
						$('#description').val(description);

						//console.log()
					//window.location.reload(true);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
		});
		/*
		Reload voucher click event
		*/



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
				var type = $('#type').val().trim();
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Expense/update_expense',
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
							type:type,
							entry_date:entry_date
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);

						//console.log()
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

		$('#balance').attr("disabled", true);
		$('#bank_name').attr("disabled", true);
		$('#credit_account').attr("disabled", true);
		$('#cheque_no').attr("disabled", true);
		$('#voucher_no').attr("disabled", true);
		
		$("#pay_type").change(function(){
					var pay_type = $('#pay_type').val().trim();
					if($('#pay_type').val()=='Cash'){
					$('#bank_name').attr("disabled", true);
					$('#cheque_no').attr("disabled", true);
					$('#credit_account').attr("disabled", true);
					
					}
					else if($('#pay_type').val()=='Cheque'){
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
						$('#fake_project_code').val(project_id);
						
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




				$("#pay_type").click(function(){

					var pay_type = $('#pay_type').val();

					if (pay_type=='Cash') {
						
						// alert(pay_type);

								var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Expense/pick_account_details',
					data:{ 
							pay_type: pay_type
						},
					//timeout: 4000,
					success: function(result) {
						
						//alert(result);

						 var cash_info = result.split("#");

						 var account_no = cash_info[0].trim();
						 var balance = cash_info[1].trim();

						$('#credit_account').html(account_no);
						$('#credit_account').attr("selected","selected");

						$('#balance').val(balance);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
}

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
	
	
	  // $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd', maxDate:'0' });
	  // $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });


    // $('.dateFrom').daterangepicker({
        
    //    singleDatePicker: true,
    //     showDropdowns: true,

        
    //     locale: {
    //        format: 'YYYY-MM-DD',
    //           applyLabel: "Apply",
    //           maxDate:'0',
    //     }
    // });


/*
 Voucher reload function
 work for again reload by voucher entry table
 */


</script>

	
