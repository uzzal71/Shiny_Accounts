
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Edit Supplier</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
					<tr>
                       <th align="center">Supplier Full Name*</th>
                       <td colspan="3"><input type="text" name="full_name" value="<?php echo $view_each_supplier->full_name?>" id="full_name" class="form-control custom-input" required></td>                        
                       <td colspan="3"><input type="hidden" name="id" value="<?php echo $view_each_supplier->id?>" id="id" class="form-control custom-input" required></td>                        
					  
                    </tr>  
                    <tr>
                   
					   <th align="center">Supplier Short Name*</th>
                       <td align="center" width="30%"><input type="text" name="short_name" value="<?php echo $view_each_supplier->short_name?>" id="short_name" class="form-control custom-input" required></td>
                       <th align="center">supplier ID*</th>
                       <td align="center"style="width:30%"><input type="text" name="supplier_id" value="<?php echo $view_each_supplier->supplier_id?>" id="supplier_id" class="form-control custom-input" readonly required></td>                        
					   
                    </tr>  
			
					<tr>           

					<tr>
                       <th align="center">Supplier Address*</th>
                       <td align="center"style="width:30%"><input type="text" name="supplier_address" value="<?php echo $view_each_supplier->supplier_address?>" id="supplier_address" class="form-control custom-input" required></td>                        
					   <th align="center">Factory Address*</th>
                       <td align="center" width="30%"><input type="text" name="factory_address"value="<?php echo $view_each_supplier->factory_address?>" id="factory_address" class="form-control custom-inputF" required></td>

                    </tr> 		
					<tr>
                       <th align="center">Supplier Contact*</th>
                       <td align="center"style="width:30%"><input type="text" name="supplier_contact" value="<?php echo $view_each_supplier->supplier_contact?>" id="supplier_contact" class="form-control custom-input" required></td>                        
					   <th align="center">Factory Contact*</th>
                       <td align="center" width="30%"><input type="text" name="factory_contact" value="<?php echo $view_each_supplier->factory_contact?>" id="factory_contact" class="form-control custom-input" required></td>

                    </tr> 		
					<tr>
                       <th align="center">Supplier Designation*</th>
                       <td align="center"style="width:30%"><input type="text" name="supplier_designation" value="<?php echo $view_each_supplier->supplier_designation?>" id="supplier_designation" class="form-control custom-input" required></td>                        
					   <th align="center">Factory Designation*</th>
                       <td align="center" width="30%"><input type="text" name="factory_designation" value="<?php echo $view_each_supplier->factory_designation?>" id="factory_designation" class="form-control custom-input" required></td>

                    </tr> 			
					<tr>
                       <th align="center">Supplier Email*</th>
                       <td align="center"style="width:30%"><input type="text" name="supplier_email" value="<?php echo $view_each_supplier->supplier_email?>" id="supplier_email" class="form-control custom-input" required></td>                        
					   <th align="center">Factory Email</th>
                       <td align="center" width="30%"><input type="text" name="factory_email" value="<?php echo $view_each_supplier->factory_email?>" id="factory_email" class="form-control custom-input"></td>

                    </tr>			
					<tr>
                       <th align="center">Supplier Mobile*</th>
                       <td align="center"style="width:30%"><input type="text" name="supplier_mobile" value="<?php echo $view_each_supplier->supplier_mobile?>" id="supplier_mobile" class="form-control custom-input" required></td>                        
					   <th align="center">Factory Mobile</th>
                       <td align="center" width="30%"><input type="text" name="factory_mobile" value="<?php echo $view_each_supplier->factory_mobile?>" id="factory_mobile" class="form-control custom-input"></td>

                    </tr> 	
					<tr>
                       <th align="center">Supplier Phone*</th>
                       <td align="center"style="width:30%"><input type="text" name="supplier_phone" value="<?php echo $view_each_supplier->supplier_phone?>" id="supplier_phone" class="form-control custom-input" required></td>                        
					   <th align="center">Factory Phone</th>
                       <td align="center" width="30%"><input type="text" name="factory_phone" value="<?php echo $view_each_supplier->factory_phone?>" id="factory_phone" class="form-control custom-input"></td>

                    </tr> 	
				    <tr>
                       <th align="center">Web Address*</th>
                       <td><input type="text" name="web_address" value="<?php echo $view_each_supplier->web_address?>" id="web_address" class="form-control custom-input" required></td>
					   <th align="center">Reference*</th>
                       <td colspan=""><input type="text" name="reference" value="<?php echo $view_each_supplier->reference?>" id="reference" class="form-control custom-input" required></td>   					   
					  
                    </tr>			
						<tr>
                       <th align="center">Is Active*</th>
                       <td>
					   <select name="is_active" class="form-control col-sm-6 custom-input" value="<?php echo $view_each_supplier->is_active?>" id="is_active" required>
								<option value="select" >select</option>
								<option <?php if($view_each_supplier->is_active == '1'){echo 'selected == "selected"';}?> value="1" >Active</option>
                                <option <?php if($view_each_supplier->is_active == '0'){echo 'selected == "selected"';}?> value="0" > Inactive</option>
					   </select></td>                        
					  
                    </tr> 
					<tr>
                       
                       <td><button type="submit" id="btn_create_supplier" class="btn btn-info pull-right">Update Supplier</button></td>                        
					  
                    </tr>					
           

					</tbody>
					
					</table>

            </div>
           
        </div>
      
    </div>
    </div>
	
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_create_supplier").click(function(){
			//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				
				var full_name = $('#full_name').val().trim();
				var short_name	= $('#short_name').val().trim();
				var supplier_id	 = $('#supplier_id').val().trim();
				var id	 = $('#id').val().trim();
				var supplier_address = $('#supplier_address').val().trim();
				var factory_address	= $('#factory_address').val().trim();
				var supplier_contact = $('#supplier_contact').val().trim();
				var factory_contact	 = $('#factory_contact').val().trim();
				var supplier_designation = $('#supplier_designation').val().trim();
				var factory_designation	= $('#factory_designation').val().trim();
				var supplier_email	= $('#supplier_email').val().trim();
				var factory_email = $('#factory_email').val().trim();
				var supplier_mobile = $('#supplier_mobile').val().trim();
				var factory_mobile = $('#factory_mobile').val().trim();
				var supplier_phone = $('#supplier_phone').val().trim();
				var factory_phone = $('#factory_phone').val().trim();
				var web_address = $('#web_address').val().trim();
				var reference = $('#reference').val().trim();
				var is_active = $('#is_active').val().trim();
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>supplier/update_supplier',
					data:{ 
							full_name: full_name,
							short_name: short_name,
							supplier_id: supplier_id,
							id: id,
							supplier_address: supplier_address,
							factory_address: factory_address,
							supplier_contact: supplier_contact,
							factory_contact: factory_contact,
							supplier_designation: supplier_designation,
							factory_designation: factory_designation,
							supplier_email: supplier_email,
							factory_email: factory_email,
							supplier_mobile: supplier_mobile,
							factory_mobile: factory_mobile,
							supplier_phone: supplier_phone,
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
				
				
				//location.reload();
			
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
		else if($('#supplier_address').val().trim() == "")
		{
			alert("Please Insert supplier Address");
			$('#supplier_address').focus();
			return false;
		}	
		else if($('#factory_address').val().trim() == "")
		{
			alert("Please Insert Factory Address");
			$('#factory_address').focus();
			return false;
		}		
		else if($('#supplier_contact').val().trim() == "")
		{
			alert("Please Insert supplier Contact");
			$('#supplier_contact').focus();
			return false;
		}		
		else if($('#factory_contact').val().trim() == "")
		{
			alert("Please Insert Factory Contact");
			$('#factory_contact').focus();
			return false;
		}		
		else if($('#supplier_designation').val().trim() == "")
		{
			alert("Please Insert supplier Designation");
			$('#supplier_designation').focus();
			return false;
		}		
		else if($('#factory_designation').val().trim() == "")
		{
			alert("Please Insert Factory Designation");
			$('#factory_designation').focus();
			return false;
		}	
		else if($('#supplier_email').val().trim() == "")
		{
			alert("Please Insert supplier Email");
			$('#supplier_email').focus();
			return false;
		}		
		else if($('#supplier_mobile').val().trim() == "")
		{
			alert("Please Insert supplier Mobile");
			$('#supplier_mobile').focus();
			return false;
		}		
		else if($('#factory_mobile').val().trim() == "")
		{
			alert("Please Insert Factory Mobile");
			$('#factory_mobile').focus();
			return false;
		}		
		else if($('#supplier_phone').val().trim() == "")
		{
			alert("Please Insert supplier Phone");
			$('#supplier_phone').focus();
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

	
