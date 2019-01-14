<br></br>
    <div class="row" id="myDiv">
        <div class="col-md-7 col-md-offset-3">
        		                 
      	   <h3 style = "color:green" align="center"><?php  echo $this->session->userdata('message');
            ?></h3> 
            <?php $this->session->unset_userdata('message'); ?>
        
            <div class="panel panel-primary custom-panel">
          
                <div class="panel-heading">Payment Entry</div>
              
               
                    <div class="col-xs-12 col-sm-12">
						 
			 <form class="form-inline" method="POST">
  <div class="form-group" style="min-height: 50px;">
    <label for="credit_number" style="min-width: 110px;">Credit Number:</label>
    <input type="text" class="form-control" id="credit_number" name="credit_number">
  </div>
   <div class="form-group" style="min-height: 50px;">
    <label for="date" style="min-width: 110px;">Date:</label>
    <input type="text" class="form-control" id="date" name="date" class="dateFrom">
  </div>
  <div class="form-group" style="min-height: 50px;">
    <label for="debited_amount" style="min-width: 110px;">Debited Amount:</label>
    <input type="Number" class="form-control" id="debited_amount">
  </div>
   <div class="form-group" style="min-height: 50px;">
    <label for="payment_method"  style="min-width: 110px;">Payment Type:</label>
    
    <select  style="min-width: 198px;" id="payment_type" name="payment_type" >
    	<option value="select">Select</option>
    	<option value="salary">Salary</option>
    	<option value="advance">Advance</option>
    	<option value="due_payment">Due Payment</option>
    	<option value="investment">Investment & Installment</option>
    	<option value="others">Others</option>

    </select>
  </div>
 <div class="form-group" style="min-height: 50px;">
    <label for="payment_method"  style="min-width: 110px;">Payment Method:</label>
    
    <select  style="min-width: 198px;" id="payment_method" name="payment_method" >
    	<option value="select">Select</option>
    	<option value="cash">Cash</option>
    	<option value="cheque">Cheque</option>

    </select>
  </div>
  <div class="form-group" style="min-height: 50px;">
    <label for="payment_method"  style="min-width: 110px;">Account Name:</label>
    
    <select  style="min-width: 198px;" id="account_name" name="account_name" >
    

    </select>
  </div>


<div class="form-group" style="min-height: 50px;">
    <label for="payment_method"  style="min-width: 110px;">Account Number:</label>
    
    <input type="text" style="min-width: 198px;" id="account_no" name="account_no" readonly >
    
  </div>


  <div class="form-group" style="min-height: 50px;">
    <label for="payment_method"  style="min-width: 110px;">Cheque Number:</label>
    
    <select  style="min-width: 198px;" id="cheque_number" name="cheque_number" >
    

    </select>
  </div>

 <div class="form-group" style="min-height: 50px;">
    <label for="paying_to"  style="min-width: 110px;">Paying To:</label>
    <select  style="min-width: 198px;" id="paying_to" name="paying_to" >
    	<option value="select">Select</option>
    	<option value="employee">Employee</option>
    	<option value="supplier">Supplier</option>
    	<option value="miscellaneous">Miscellaneous</option>

    </select>
  </div>
  <div class="form-group" style="min-height: 50px;" id="employee_div">
    <label for="employee_name"  style="min-width: 110px;">Employee Name:</label>
    <select  style="min-width: 198px;" id="employee_name" name="employee_name" >
    	<option value="select">Select</option>
    	<?php  foreach ($all_employee as $employee) { ?>
    		<option value="<?php echo $employee->employee_id?>"><?php echo $employee->first_name.' '.$employee->last_name?></option>
    	<?php } ?>

    </select>
  </div>

    <div class="form-group" style="min-height: 50px;" id="supplier_div">
    <label for="supplier_name"  style="min-width: 110px;">Supplier Name:</label>
    <select  style="min-width: 198px;" id="supplier_name" name="supplier_name" >
    	<option value="select">Select</option>
    	<?php  foreach ($all_supplier_list as $supplier) { ?>
    		<option value="<?php echo $supplier->supplier_id?>"><?php echo $supplier->full_name?></option>
    	<?php } ?>

    </select>
  </div>
    <div class="form-group" style="min-height: 50px;" id="miscellaneous_div">
    <label for="miscellaneous"  style="min-width: 110px;">Miscellaneous</label>
   <select id="miscellaneous" name="miscellaneous" style="min-width: 198px;">
   	<option value="select">Select</option>
   <?php foreach ($all_miscellaneous as $miscellaneous) { ?>
  
  	<option value="<?php echo $miscellaneous->recipient_id; ?>"><?php echo $miscellaneous->recipient_name; ?></option>

  <?php } ?>
   </select>
  </div>

      <div class="form-group" style="min-height: 50px;">
    <label for="remarks"  style="min-width: 110px;">Remarks:</label>
    <input type="text" class="form-control" id="remarks">
  </div>
  <button class="btn btn-primary pull-right" id="submit" style="margin-right: 100px;">Submit</button>
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
	
	<script >
		$(document).ready(function() {
		
			$('#account_name').select2();
			$('#supplier_name').select2();
			$('#cheque_number').select2();
			$('#employee_name').select2();

  		$("#employee_div").hide();
  		 $("#supplier_div").hide();
  		  $("#miscellaneous_div").hide();
		var val=0;
        $('#date').datepicker({ dateFormat:'yy-mm-dd' });
	$("#paying_to").change(function(){

		$("#employee_div").hide();
  		 $("#supplier_div").hide();
  		  $("#miscellaneous_div").hide();
  		  $('#employee_name').val('');
			$('#supplier_name').val('');
			$('#miscellaneous').val('');
	
		
			var paying_to = $('#paying_to').val().trim();
						
					
			
			if (paying_to=='employee') {
				$("#employee_div").show();

			}if (paying_to=='supplier') {
				$("#supplier_div").show();

			}if (paying_to=='miscellaneous') {
				$("#miscellaneous_div").show();

			}
					});

$("#submit").click(function(){
	
			if(form_validation()){
			var credit_number = $('#credit_number').val().trim();
			var date	= $('#date').val().trim();
			var debited_amount = $('#debited_amount').val().trim();
			var payment_method = $('#payment_method').val().trim();
			var paying_to = $('#paying_to').val().trim();
			var employee_name = $('#employee_name').val();
			var supplier_name = $('#supplier_name').val();
			var miscellaneous = $('#miscellaneous').val();
			var remarks = $('#remarks').val().trim();
			var payment_type=$('#payment_type').val().trim();
			var account_name =$('#account_name').val();
			var account_no =$('#account_no').val();
			var cheque_number =$('#cheque_number').val();
			
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Account_information/save_payment_entry',
					data:{ 
							credit_number: credit_number,
							date: date,
							debited_amount: debited_amount,
							payment_method:payment_method,
							paying_to:paying_to,
							employee_name:employee_name,
							supplier_name:supplier_name,
							miscellaneous:miscellaneous,
							payment_type:payment_type,
							account_name:account_name,
							account_no:account_no,
							cheque_number:cheque_number,
							remarks: remarks
						},
					
					success: function(result) {
						
						alert(result);
						console.log(result);

						
						
		
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
					

			
		
		}});


$("#payment_method").change(function(){

		var payment_method = $('#payment_method').val().trim();
		if (payment_method=='cheque') {

			
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Account_information/pick_bank_accounts',
					data:{ 
							payment_method: payment_method
						},
					
					success: function(result) {
						

				

					
				

						
						$('#account_name').html(result);
						
					
					
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		}});


$("#account_name").change(function(){

		var account_no = $('#account_name').val().trim();
		$('#account_no').val(account_no);
		
		});

$("#account_name").change(function(){

		var account_no = $('#account_name').val().trim();
	

			
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Cheque_book/pick_cheque',
					data:{ 
							account_no: account_no
						},
					
					success: function(result) {
						

				

					
				

						
						$('#cheque_number').html(result);
						
					
					
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});

function form_validation(){


	if($('#credit_number').val()==""){

		alert("Please Write Credit Number");
			$('#credit_number').focus();
	
				event.preventDefault();
				return false;
			
		
	}

	if ($('#date').val()=="") {

		alert("Please Select Payment Date");
			$('#date').focus();

				event.preventDefault();
				return false;
			
			
	}if ($('#debited_amount').val()=="") {

		alert("Please Enter Debited Amount");
			$('#debited_amount').focus();
				event.preventDefault();
				return false;
			
			
	}if ($('#payment_method').val()=="select") {

		alert("Please Select Payment Method");
			$('#payment_method').focus();
				event.preventDefault();
				return false;
			
			
	}if ($('#paying_to').val()=="select") {

		alert("Please Select Paying To");
			$('#paying_to').focus();
				event.preventDefault();
				return false;
			
			
	}if (($('#paying_to').val()=="employee")&&($('#employee_name').val()=="select")) {

			alert("Please Select Employee Name");
			$('#employee_name').focus();
				event.preventDefault();
				return false;
			

	}if (($('#paying_to').val()=="supplier")&&($('#supplier_name').val()=="select")) {

			alert("Please Select Supplier Name");
			$('#supplier_name').focus();
				event.preventDefault();
				return false;
			

	}

	if (($('#paying_to').val()=="miscellaneous")&&($('#miscellaneous').val()=="select")) {

			alert("Please Select Miscellaneous Name");
			$('#miscellaneous').focus();
				event.preventDefault();
				return false;
			

	}


	return true;
}

});
	</script>
	
	
	