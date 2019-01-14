
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Create New Customer</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
					<tr>
                       <th align="center">Customer Full Name*</th>
                       <td colspan="3"><input type="text" name="full_name" value="" id="full_name" class="form-control custom-input" required></td>                        
					  
                    </tr>  
                    <tr>
                        <?php
						/* last_id is used for auto increment of customer_id. last_id returns 7th position to last index value of customer_id using substring function in mysql*/
						
						if($last_id->lastid == null){
							$last_id= 1000;
						   
					   }
						   else{
							   $last_id = (int)$last_id->lastid+1;
							 
						   } ?>
					   <th align="center">Customer Short Name*</th>
                       <td align="center" width="30%"><input type="text" name="short_name" id="short_name" class="form-control custom-input" required></td>
                       <th align="center">Customer ID*</th>
                       <td align="center"style="width:30%"><input type="text" name="customer_id" value="<?php echo "CL".date('Y').$last_id?>" id="customer_id" class="form-control custom-input" readonly required></td>                        
					   
                    </tr>  
			
					<tr>           

					<tr>
                       <th align="center">Customer Address*</th>
                       <td align="center"style="width:30%"><input type="text" name="customer_address" value="" id="customer_address" class="form-control custom-input" required></td>                        
					   <th align="center">Factory Address*</th>
                       <td align="center" width="30%"><input type="text" name="factory_address" id="factory_address" class="form-control custom-inputF" required></td>

                    </tr> 		
					<tr>
                       <th align="center">Customer Contact*</th>
                       <td align="center"style="width:30%"><input type="text" name="customer_contact" value="" id="customer_contact" class="form-control custom-input" required></td>                        
					   <th align="center">Factory Contact*</th>
                       <td align="center" width="30%"><input type="text" name="factory_contact" id="factory_contact" class="form-control custom-input" required></td>

                    </tr> 		
					<tr>
                       <th align="center">Customer Designation*</th>
                       <td align="center"style="width:30%"><input type="text" name="customer_designation" value="" id="customer_designation" class="form-control custom-input" required></td>                        
					   <th align="center">Factory Designation*</th>
                       <td align="center" width="30%"><input type="text" name="factory_designation" id="factory_designation" class="form-control custom-input" required></td>

                    </tr> 			
					<tr>
                       <th align="center">Customer Email*</th>
                       <td align="center"style="width:30%"><input type="text" name="customer_email" value="" id="customer_email" class="form-control custom-input" required></td>                        
					   <th align="center">Factory Email</th>
                       <td align="center" width="30%"><input type="text" name="factory_email" id="factory_email" class="form-control custom-input"></td>

                    </tr>			
					<tr>
                       <th align="center">Customer Mobile*</th>
                       <td align="center"style="width:30%"><input type="text" name="customer_mobile" value="" id="customer_mobile" class="form-control custom-input" required></td>                        
					   <th align="center">Factory Mobile</th>
                       <td align="center" width="30%"><input type="text" name="factory_mobile" id="factory_mobile" class="form-control custom-input"></td>

                    </tr> 	
					<tr>
                       <th align="center">Customer Phone*</th>
                       <td align="center"style="width:30%"><input type="text" name="customer_phone" value="" id="customer_phone" class="form-control custom-input" required></td>                        
					   <th align="center">Factory Phone</th>
                       <td align="center" width="30%"><input type="text" name="factory_phone" id="factory_phone" class="form-control custom-input"></td>

                    </tr> 	
				    <tr>
                       <th align="center">Web Address*</th>
                       <td><input type="text" name="web_address" value="" id="web_address" class="form-control custom-input" required></td>
					   <th align="center">Reference*</th>
                       <td colspan="3"><input type="text" name="reference" value="" id="reference" class="form-control custom-input" required></td>   					   
					  
                    </tr>			
						<tr>
                       <th align="center">Is Active*</th>
                       <td>
					   <select name="is_active" class="form-control col-sm-6 custom-input" id="is_active" required>
								<option value="select" >select</option>
								<option value="1" >Active</option>
                                <option value="0" > Inactive</option>
					   </select></td>                        
					  
                    </tr> 
					<tr>
                       
                       <td><button type="submit" id="btn_create_customer" class="btn btn-info pull-right">Add New Customer</button></td>                        
					  
                    </tr>					
           

					</tbody>
					
					</table>

            </div>
           
        </div>
      
    </div>
    </div>
	
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_create_customer").click(function(){
			//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				
				var full_name = $('#full_name').val().trim();
				var short_name	= $('#short_name').val().trim();
				var customer_id	 = $('#customer_id').val().trim();
				var customer_address = $('#customer_address').val().trim();
				var factory_address	= $('#factory_address').val().trim();
				var customer_contact = $('#customer_contact').val().trim();
				var factory_contact	 = $('#factory_contact').val().trim();
				var customer_designation = $('#customer_designation').val().trim();
				var factory_designation	= $('#factory_designation').val().trim();
				var customer_email	= $('#customer_email').val().trim();
				var factory_email = $('#factory_email').val().trim();
				var customer_mobile = $('#customer_mobile').val().trim();
				var factory_mobile = $('#factory_mobile').val().trim();
				var customer_phone = $('#customer_phone').val().trim();
				var factory_phone = $('#factory_phone').val().trim();
				var web_address = $('#web_address').val().trim();
				var reference = $('#reference').val().trim();
				var is_active = $('#is_active').val().trim();
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Customer/save_new_customer',
					data:{ 
							full_name: full_name,
							short_name: short_name,
							customer_id: customer_id,
							customer_address: customer_address,
							factory_address: factory_address,
							customer_contact: customer_contact,
							factory_contact: factory_contact,
							customer_designation: customer_designation,
							factory_designation: factory_designation,
							customer_email: customer_email,
							factory_email: factory_email,
							customer_mobile: customer_mobile,
							factory_mobile: factory_mobile,
							customer_phone: customer_phone,
							factory_phone: factory_phone,
							web_address: web_address,
							reference: reference,
							is_active: is_active
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						//$("#table_id tbody").html("");
						//$("#table_id tbody").html(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				
				location.reload();
			
			}

		});
		

		
	
	});
	
	function form_validation()
	{
		
		//alert("validation");
		
		if($('#full_name').val().trim() == "")
		{
			alert("Please insert Full Name");
			$('#full_name').focus();
			return false;
		}
		else if($('#short_name').val().trim() == "")
		{
			alert("Please Insert Short Name");
			$('#short_name').focus();
			return false;
		}
		else if($('#customer_address').val().trim() == "")
		{
			alert("Please Insert Customer Address");
			$('#customer_address').focus();
			return false;
		}	
		else if($('#factory_address').val().trim() == "")
		{
			alert("Please Insert Factory Address");
			$('#factory_address').focus();
			return false;
		}		
		else if($('#customer_contact').val().trim() == "")
		{
			alert("Please Insert Customer Contact");
			$('#customer_contact').focus();
			return false;
		}		
		else if($('#factory_contact').val().trim() == "")
		{
			alert("Please Insert Factory Contact");
			$('#factory_contact').focus();
			return false;
		}		
		else if($('#customer_designation').val().trim() == "")
		{
			alert("Please Insert Customer Designation");
			$('#customer_designation').focus();
			return false;
		}		
		else if($('#factory_designation').val().trim() == "")
		{
			alert("Please Insert Factory Designation");
			$('#factory_designation').focus();
			return false;
		}	
		else if($('#customer_email').val().trim() == "")
		{
			alert("Please Insert Customer Email");
			$('#customer_email').focus();
			return false;
		}		
		else if($('#customer_mobile').val().trim() == "")
		{
			alert("Please Insert Customer Mobile");
			$('#customer_mobile').focus();
			return false;
		}		
		else if($('#factory_mobile').val().trim() == "")
		{
			alert("Please Insert Factory Mobile");
			$('#factory_mobile').focus();
			return false;
		}		
		else if($('#customer_phone').val().trim() == "")
		{
			alert("Please Insert Customer Phone");
			$('#customer_phone').focus();
			return false;
		}	
		else if($('#factory_phone').val().trim() == "")
		{
			alert("Please Insert Factory Phone");
			$('#factory_phone').focus();
			return false;
		}	
		else if($('#web_address').val().trim() == "")
		{
			alert("Please Insert Web Address");
			$('#web_address').focus();
			return false;
		}		
		else if($('#reference').val().trim() == "")
		{
			alert("Please Insert Reference");
			$('#reference').focus();
			return false;
		}		
		else if($('#is_active').val().trim() == "select")
		{
			alert("Please Select Is Active");
			$('#is_active').focus();
			return false;
		}		

		
				
		return true;
		}
	
	
	   $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	   $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
</script>

	
