
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">

            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table table-bordered">
                    <thead>
                    <tr>
                       <th align="center">Offer Code</th>
					   
					   <?php
						
						if($last_id->lastid==null){
							$last_id= 1000;
						   
					   }
						   else{
							   $last_id = (int)$last_id->lastid+1;
							 
						   } ?>
						   
                       <td align="center" width="30%"><input type="text" name="offer_code" id="offer_code" value="<?php echo "OF".date('Y').$last_id?>" class="form-control custom-input" readonly required></td>
                       <th align="center">Amount</th>
                       <td align="center" width="30%"><input type="amount" name="amount" id="amount" class="form-control custom-input" required></td>
					</tr>                  
					<tr>
                       <th align="center">Customer Name</th>
                       <td align="center" width="30%">
					   <select name="customer_name" class="form-control col-sm-6 custom-input" id="customer_name" required>
								<option value="select" >Select</option>
								<?php foreach($all_customers as $each_customer){?>
								<option value="<?php echo $each_customer->id?>" ><?php echo $each_customer->full_name?></option>
								
								<?php }?>
						</select>
						</td>
                       <th align="center">Phone</th>
                       <td align="center" width="30%"><input type="phone_no" name="phone_no" id="phone_no" class="form-control custom-input" required></td>
                   </tr>
					
					<tr>
                       <th align="center">Contact Person</th>
                       <td align="center" width="30%"><input type="text" name="contact_person"  id="contact_person" class="form-control custom-input" required></td>
                       <th align="center">Mobile Phone</th>
                       <td align="center" width="30%"><input type="text" name="mobile_phone_no" id="mobile_phone_no" class="form-control custom-input" required></td>
					</tr>  
					
					<tr>
                       <th align="center">Promoted By</th>
                       <td align="center" width="30%">
					   <select name="promoted_by" class="form-control col-sm-6 custom-input" id="promoted_by" required>
								<option value="select" >Select</option>
								<?php foreach($all_employees as $each_employee){?>
								<option value="<?php echo $each_employee->employee_id?>" ><?php echo $each_employee->employee_id?></option>
								
								<?php }?>
						</select>
						</td>
                       <th align="center">Offer date</th>
                       <td align="center" width="30%"><input type="text" name="offer_date" id="offer_date" class="form-control custom-input dateFrom" required></td>
                       
					</tr>
					<tr>
                       <th align="center">Description</th>
                       <td align="center" width="30%"><input type="text" name="description" id="description"  class="form-control custom-input" required></td>
                       <td align="center" colspan="2"><button type="button" class="btn btn-primary" id="btn_offer">Submit</button></td>
					</tr> 
					<thead>
					
					</table>
					
					<table id="table_id" class="table table-bordered">
					<tbody>
				
					</tbody>
				</table>
			
			
            </div>
           
        </div>
        <div class="col-md-1"></div>
    </div>
	
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_offer").click(function(){
			//alert($('#offer_code').val().trim());
			if(form_validation())
			{
				//alert("validation true");
				
				var offer_code		 = $('#offer_code').val().trim();
				var amount		 = $('#amount').val().trim();
				var customer_name		 = $('#customer_name').val().trim();
				var phone_no		 = $('#phone_no').val().trim();
				var contact_person				 = $('#contact_person').val().trim();
				var mobile_phone_no = $('#mobile_phone_no').val().trim();
				var promoted_by		 = $('#promoted_by').val().trim();
				var offer_date = $('#offer_date').val().trim();
				var description = $('#description').val().trim();
				
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>offer/save_new_offer',
					data:{ 
							offer_code: offer_code, 
							amount: amount,  
							customer_name: customer_name, 
							phone_no: phone_no, 
							contact_person: contact_person, 
							mobile_phone_no: mobile_phone_no, 
							promoted_by: promoted_by, 
							offer_date: offer_date, 
							description: description
						},
					//timeout: 4000,
					success: function(result) {
						
						response = result;
						
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				alert(response);
				 location.reload();
			
			}
		});
	});
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#offer_code').val().trim() == "")
		{
			alert("Please insert Offer Code");
			$('#offer_code').focus();
			return false;
		}
		else if($('#amount').val().trim() == "")
		{
			alert("Please insert Amount");
			$('#amount').focus();
			return false;
		}
		else if($('#customer_name').val().trim() == "select")
		{
			alert("Please select customer Name");
			$('#customer_name').focus();
			return false;
		}
		else if($('#phone_no').val().trim() == "")
		{
			alert("Please insert Phone NO");
			$('#phone_no').focus();
			return false;
		}
		else if($('#contact_person').val().trim() == "")
		{
			alert("Please Insert Contact Person");
			$('#contact_person').focus();
			return false;
		}
		else if($('#mobile_phone_no').val().trim() == "")
		{
			alert("Please insert Mobile Phone No");
			$('#mobile_phone_no').focus();
			return false;
		}

		else if($('#promoted_by').val().trim() == "select")
		{
			alert("Please Select promoted by");
			$('#promoted_by').focus();
			return false;
		}
				else if($('#offer_date').val().trim() == "")
		{
			alert("Please insert Mobile Phone No");
			$('#offer_date').focus();
			return false;
		}
				else if($('#description').val().trim() == "")
		{
			alert("Please insert Mobile Phone No");
			$('#description').focus();
			return false;
		}

	
				
		return true;
	}
</script>

