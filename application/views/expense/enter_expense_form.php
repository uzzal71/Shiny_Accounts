
    <br><br>
    <div class="row">


   	    <div class="col-md-2" style="background-color:white; margin-left: 200px;width: 150px;padding: 0px;max-height:450px;overflow: scroll;" ><table  class="table responsive">
   	    	<thead>
   	    		<tr>
   	
   	    	<th>Expense No</th>
   	    	</tr>
   	   		</thead>
   	   		<?php  foreach ($expense_infos as  $expense) { ?>
   	 	 <tr>
   	 	 
   	    	 <td style="margin-left: 0px; min-width: 120px; height: 20px;"><a href="<?php echo base_url();?>Expense/edit_expense/<?php echo $expense->id ?>" class="btn btn-primary" style="margin-left: 0px; min-width: 120px;padding: 2px;"  "><?php echo $expense->expense_id ?></a></td>
   	    </tr>
   	   <?php  } ?>
   	</table>
   	    	
      
    	</div>



		<div class="col-md-8">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left:10px;max-height: 700px;overflow: scroll">
			<div class="panel-heading">Add New Expense</div>
            <div class="table-responsive" id="custom-table">
				<form id="myForm">
                <table id="" class="table ">
                    <tbody>
					<tr>
                       <th align="center">Add Voucher :*</th>
                       <td  width="30%">                   
					   <select name="voucher_no" class="form-control col-sm-7 custom-input" id="voucher_no">
							<option value=" " selected>Select</option>
							<?php foreach($all_voucher as $each_voucher){?>
							<option value="<?php echo $each_voucher->voucher_no?>"><?php echo $each_voucher->voucher_no?></option>
							<?php
							}
							?>
						</select>
					   </td>  

					   <?php foreach ($expense_ids as $expense_id) {
					   
					   } ?>


					<?php   $value=$expense_id->expense_id+1;
					
					
					
					
					 $check=$expense_id->expense_id;

					 if ($check=="") {
					 	$value=101;
					 }

					 $expense_code= "EX".date("Y").date("m").$value;
					   ?>
					   <th align="center">Expense Code</th>
                       <td align="center" width="30%"><input type="text" value="<?php echo $expense_code ?>" name="expense_code" id="expense_code" class="form-control custom-input" readonly required></td>					   
					  
                    </tr>  
                    <tr>
					    <th align="center">Expense Type*</th>
                       <td >                   
					   <select name="expense_type" class="form-control col-sm-6 custom-input" id="expense_type">
							<option id="expense_type_html" selected>select</option>
							<?php foreach($all_expense_types as $each_expense_types){?>
								<option  value="<?php echo $each_expense_types->expense_type;?>"><?php echo $each_expense_types->expense_type;?></option>
							<?php }?>
						</select>
					   </td> 
                       <th align="center">Amount*</th>
                       <td align="center" style="width:30%"><input type="number" name="amount" value="" id="amount" step="0.01" min="0" class="form-control custom-input"required></td>                        
					   
                    </tr>  
			
					<tr>           

					<tr>
                       <th align="center">Pay Type*</th>
                       <td>                   
					   <select name="pay_type" class="form-control col-sm-6 custom-input" id="pay_type">
							<option value="select">select</option>
							<option value="Cash">Cash</option>
                            <option value="Cheque">Cheque</option>
                            <option value="CreditEmp">CreditEmp</option>
                            <option value="CreditSupp">CreditSupp</option>
							
						</select>
					   </td>                         
					   <th align="center">Balance</th>
                       <td align="center" width="30%"><input type="text" name="balance" id="balance" class="form-control custom-inputF" required></td>

                    </tr> 		
					<tr>
                       <th align="center">Expense Date*</th>
                       <td align="center" style="width:30%"><input type="text" name="expense_date" value="<?php echo date("Y-m-d"); ?>" id="expense_date" class="form-control custom-input dateFrom" required></td>                        
					   <th align="center">Bank Name</th>
                       <td align="center" width="30%">					 
					   <select name="bank_name" class="form-control col-sm-6 custom-input" id="bank_name">
							<option value="select">Select</option>
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
							<option value="select">select</option>
							
						</select>
						</td>       
						<th align="center">Cheque No</th>
                       <td align="center" width="30%">					 
					   <select name="cheque_no" class="form-control col-sm-6 custom-input" id="cheque_no">
					
						</select>	
						
						</td>                     
					   

                    </tr> 			
					<tr>
						<th align="center">Customer Name*</th>
                       <td align="center">					 
					   <select name="customer_name" class="form-control col-sm-6 custom-input" id="customer_name" >
					   <option id="customer_name_html" value="select">select</option> 
					   	<?php foreach ($all_customers as $each_customer) { ?>
					   	<option value="<?php echo $each_customer->full_name ?>" ><?php echo $each_customer->full_name ?></option>
					  <?php   	} ?>


					   </select>
                            
						
						</td>  
						<th align="center">Project Name*</th>
                       <td align="center" width="30%">					 
					   <select name="project_code" class="form-control col-sm-6 custom-input" id="project_code">
					   <option id="project_code_html" value="select">select</option>
							

						</select>	
						
						</td>                          

                    </tr>			
					<tr>
                      
						<th align="center">Project Code</th>
                       <td align="center" width="30%">	
                       	<input type="text" name="" id="fake_project_code" class="form-control col-sm-6 custom-input readonly">
					   <input type="hidden" name="project_name" class="form-control col-sm-6 custom-input" id="project_name" readonly>
							
							
						
						</td>
					<th align="center">Supplier Name</th>
                       <td align="center" width="30%">					 
					   <select name="supplier_name" class="form-control col-sm-6 custom-input" id="supplier_name">

					   	<option value="">Select Supplier Name</option>
							<?php

								foreach ($supplier_info as  $suppliers) { ?>
									<option value="<?php echo $suppliers->supplier_id ?>"><?php echo $suppliers->full_name ?></option>
							<?php	}
                             ?>
								  </select>
						</td> 						

                    </tr> 	
					<tr>
	                       
						<th align="center">Expensed By*</th>
                       <td align="center" width="30%">	


					   <select name="expensed_by" class="form-control col-sm-6 custom-input" id="expensed_by">

					   <option value="select" selected>Select</option>

					   <?php foreach ($employee_list as $each_emaployee) { ?>
					   <option value="<?php echo $each_emaployee->employee_id?>"><?php echo $each_emaployee->first_name." ".$each_emaployee->last_name  ?></option>
					<?php    } ?>
						</select>	
						
						</td>
                       <th align="center">Description</th>
                       <td ><input type="text" name="description" value="" id="description" class="form-control custom-input" required></td>						
						
                       

					   
                    </tr>	
                    <tr>
                    <th align="center">Type*</th>
                    <td>
                    	<select name="type" id="type" class="form-control custom-input type">
                    		<option id="type_html" value="select">select</option>
                    		<option value="1">Support</option>
                    		<option value="0">Project</option>
 
                    	</select>
                    </td>

                    	<td ><input type="hidden" id="entry_date" name="entry_date" class="form-control custom-input entry_date " value="<?php echo date('Y-m-d H:i:s') ?>" ></td>
                    </tr>		

					<tr>
                       
                       <td><input type='button' class="btn btn-success" id='btn_add_expense' value='Add Expense'/>	</td>    
                       <td><input type='button' class="btn btn-success" id='btn_clear' value='Clear'/>	</td>                        
					  
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

		$('#supplier_name').select2();
		//$('#cheque_no').select2();
		$("#btn_add_expense").click(function(){
			
			if(form_validation())
			{
				
				var expense_code = $('#expense_code').val().trim();
				var expense_type = $('#expense_type').val().trim();
				var amount = $('#amount').val().trim();
				var pay_type = $('#pay_type').val().trim();
				var balance = $('#balance').val();
				var expense_date = $('#expense_date').val().trim();
				var bank_name = $('#bank_name').val();
				var credit_account = $('#credit_account').val();
				var cheque_no = $('#cheque_no').val();
				var customer_name = $('#customer_name').val().trim();
				var project_code = $('#project_code').val().trim();
				var project_name = $('#project_name').val().trim();
				var supplier_name = $('#supplier_name').val().trim();
				var expensed_by = $('#expensed_by').val().trim();
				var description = $('#description').val().trim();
				var entry_date = $('#entry_date').val().trim();
				var voucher_no=$('#voucher_no').val().trim();
				var type=$('#type').val();
				

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
							voucher_no:voucher_no,
							type:type,
							entry_date:entry_date
						
						},
					
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
			
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Voucher_entry/pick_voucher_info_expenses',
					data:{ 
							voucher_no: voucher_no
						},
					
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
						var type =voucher_info[8].trim();
						var description =voucher_info[10].trim();

						$('#expense_type').val(expense_type);
						$('#expense_type_html').html(expense_type);
						$('#expense_type').attr("selected","selected");

						var amounts=parseFloat(amount).toFixed(2);
						$('#amount').val(amounts);
						
						$('#amount').attr("readonly", true); 
						$('#expense_date').val(date);
						$('#expense_date').attr("date", true); 

							

						$('#customer_name').val(customer_name);
						$('#customer_name_html').html(customer_name);
						$('#customer_name').attr("selected","selected");


						$('#project_code').val(project_code);
						$('#project_code').attr("selected","selected");

						$('#project_name').val(project_name);
						
						$('#expensed_by').val(employee_id);
						$('#entry_date').val(entry_date);
						
						$('#fake_project_code').val(project_code);
						$("#type").val(type).change();
						$("#description").val(description);
						

						
						
						
						
						


						
						
						
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});
		
		$("#voucher_no").change(function(){

		var customer_name = $('#customer_name').val().trim();
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>project_tracking/pick_project_info_for_expense',
					data:{ 
							customer_name: customer_name
						},
					
					success: function(result) {
						response = result;
						
						$('#project_code').html(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});



		$("#voucher_no").change(function(){

		var voucher_no = $('#voucher_no').val().trim();
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Voucher_entry/pick_project_codes_expenses',
					data:{ 
							voucher_no: voucher_no
						},
					
					success: function(result) {
						var voucher_info = result;

				

					
				

						$('#project_code').val(voucher_info);
						$('#project_code_html').html(voucher_info);
						$('#project_code').attr("selected","selected");
					
					
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});


		$("#voucher_no").change(function(){
					
			var expense_date = $('#expense_date').val();

			
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Expense/pick_latest_expense_no',
					data:{ 
							expense_date: expense_date
						},
					
					success: function(result) {
					
					
					$('#expense_code').val(result);
						
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
		
		$('#cheque_no').attr("disabled", true);
		$("#pay_type").change(function(){
					var pay_type = $('#pay_type').val().trim();
					if($('#pay_type').val()=='Cash'){
						$('#bank_name').val('');
					$('#bank_name').attr("disabled", true);
					$('#cheque_no').attr("disabled", true);
					
					
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
					
			var customer_name = $('#customer_name').val().trim();
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>project_tracking/pick_project_info_for_expense',
					data:{ 
							customer_name: customer_name
						},
					
					success: function(result) {
						response = result;
						
						$('#project_code').html(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});



				$("#project_code").change(function(){
					
			var project_id = $('#project_code').val().trim();
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>project_tracking/pick_project_name_description',
					data:{ 
							project_id: project_id
						},
					
					success: function(result) {
						response = result;
						var voucher_info = response.split("#");
						var project_name=voucher_info[0];
						var type=voucher_info[2];
						$('#project_name').val(project_name);
						
						$('#fake_project_code').val(project_id);
						$("#type").val(type).change();
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});

				


				$("#credit_account").change(function(){
					
			var credit_account = $('#credit_account').val().trim();
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Expense/pick_cheque_no',
					data:{ 
							credit_account: credit_account
						},
					
					success: function(result) {
					
					
					
						
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});



		$("#expense_date").change(function(){
					
			var expense_date = $('#expense_date').val();

			
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Expense/pick_latest_expense_no',
					data:{ 
							expense_date: expense_date
						},
					
					success: function(result) {
					
					
					$('#expense_code').val(result);
						
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

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
	


				$("#pay_type").change(function(){

					var pay_type = $('#pay_type').val();

					if (pay_type=='Cash') {
						
						

								var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Expense/pick_account_details',
					data:{ 
							pay_type: pay_type
						},
					
					success: function(result) {
						
						

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


$("#credit_account").change(function(){

		var account_no = $('#credit_account').val().trim();
	

			
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Cheque_book/pick_cheque',
					data:{ 
							account_no: account_no
						},
					
					success: function(result) {
						

				

					
				

						
						$('#cheque_no').html(result);
						
					
					
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});



	$("#pay_type").change(function(){

		var pay_type = $('#pay_type').val().trim();

		if (pay_type=="CreditEmp") {

			$('#bank_name').val(' ');
			$('#credit_account').val(' ');
			$('#cheque_no').val(' ');
			//$('#cheque_no').get(0).selectedIndex = 0;


		}

		});


		$("#pay_type").change(function(){

		var pay_type = $('#pay_type').val().trim();

		if (pay_type=="CreditSupp") {

			$('#bank_name').val(' ');
			$('#credit_account').val(' ');
			$('#cheque_no').val(' ');
			//$('#cheque_no').get(0).selectedIndex = 0;


		}

		});

	
	function form_validation()
	{
	
		 if($('#expense_type').val()== "select")
		{
			alert("Please Select Expense Type");
			$('#expense_type').focus();
			return false;
		}

		else if($('#amount').val()=="")
		{
			alert("Please Enter Amount");
			$('#amount').focus();
			return false;
		}

		else if($('#pay_type').val()=="select")
		{
			alert("Please Select Pay Type");
			$('#pay_type').focus();
			return false;
		}
				else if($('#expense_date').val()=="")
		{
			alert("Please Select Date");
			$('#expense_date').focus();
			return false;
		}


				else if((($('#pay_type').val()=="Cheque")&&($('#bank_name').val()=="select")))
		{
			alert("Please Select Bank Name");
			$('#bank_name').focus();
			return false;
		}



				else if((($('#pay_type').val()=="Cheque")&&($('#credit_account').val()=="select")))
		{
			alert("Please Select Account No");
			$('#credit_account').focus();
			return false;
		}


					else if((($('#pay_type').val()=="Cheque")&&($('#cheque_no').val()=="select")))
		{
			alert("Please Select Cheque No");
			$('#cheque_no').focus();
			return false;
		}

		else if($('#customer_name').val()=="select")
		{
			alert("Please Select Customer Name");
			$('#customer_name').focus();
			return false;
		}


		else if($('#project_code').val()=="select")
		{
			alert("Please Select Proejct Code");
			$('#project_code').focus();
			return false;
		}


		else if($('#expensed_by').val()=="select")
		{
			alert("Please Select Expensed By");
			$('#expensed_by').focus();
			return false;
		}
		else if($('#type').val()=="select")
		{
			alert("Please Select Type");
			$('#type').focus();
			return false;
		}

	
		
				
		return true;
		};
	
	
	   
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd', 
       			changeMonth: true,
                changeYear: true,
                yearRange: "-100:+20",maxDate:'0' });
	  



    
        
    
    

        
    
    
    
    
    
    

</script>

	
