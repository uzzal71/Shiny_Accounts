<!-- Page Content -->
  <br><br>
  <form action="<?php echo base_url('Inventory/save_new_item') ?>" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Create New Item</div>
				<br><br>
                    <div class="col-xs-10 col-sm-8">

			<table>			
						<tr>

						<?php
						
						if($last_id->last_id==null){
							$last_id= 1000;
						   
					   }
						   else{
							   $last_id = $last_id->last_id+1;
							 
						   } ?>
							<td><label for="item_id" style="margin-top: 4px">Item ID</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td style="width:75%">
								<input type="text" id="item_id" name="item_id" value="<?php echo "ITMN".date('Y').$last_id; ?>" class="form-control custom-input" readonly >
								<br class="hidden-xs">
							</td>
						</tr>
						<tr>
							<td><label for="quantity" style="margin-top: 4px">Quantity</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="number" id="quantity" name="quantity" class="form-control col-sm-6 custom-input" required>
									
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>
						<tr>
							<td><label for="item_name" style="margin-top: 4px">Item Name</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td style="width:75%">
								<input type="text" id="item_name" name="item_name" class="form-control custom-input" required>
								<br class="hidden-xs">
							</td>
						</tr>

						
						<tr>
							<td><label for="price" style="margin-top: 4px">Unit Price </label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="number"  id="price" name="price" class="form-control col-sm-6 custom-input" required>
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>

							<tr>
							<tr>
							<td><label for="location" style="margin-top: 4px">Location
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="text"  id="location" name="location" class="form-control col-sm-6 custom-input" required>
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>

							<tr>
							<td><label for="uom" style="margin-top: 4px">UoM</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<select id="uom" name="uom" class="form-control col-sm-6 custom-input" required>
									<option value="select" selected>Select UoM</option>
									<option value='dzn'>dzn</option>
									<option value='kg'>kg</option>
									<option value='ltr'>ltr</option>
									<option value='pcs'>pcs</option>
									<option value='m'>m</option>
									<option value='inch'>inch</option>
									<option value='feet'>feet</option>
									<option value='pound'>pound</option>
									<option value='ton'>ton</option>
								</select>
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>

								<tr>
							<td><label for="item_type" style="margin-top: 4px">Item Type</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<select id="item_type" name="item_type" class="form-control col-sm-6 custom-input" required>
									<option value="" selected>Select Type</option>

									<?php foreach ($all_item_types as  $item_types) { ?>
									<option value="<?php echo $item_types->type_id ?>"><?php echo $item_types->type_name ?></option>	
									<?php } ?>
									
									
								</select>
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>

						<tr>
							<td><label for="description" style="margin-top: 4px">Description</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="text" id="description" name="description" class="form-control custom-input" required>
								<br class="hidden-xs">
							</td>
						</tr>

						<tr>
							<td><label for="description" style="margin-top: 4px">Item image</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="file" id="item_image" name="item_image" class="form-control custom-input" required>
								<br class="hidden-xs">
							</td>
						</tr>
												
										 	
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>
								<button type="submit" class="btn btn-primary" name="btn_create_item" id="">Create Item</button>
							</td>
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
	</form>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_create_item").click(function(){
			//alert($('#item_name').val().trim());
			if(form_validation())
			{
				//alert("validation true");
				var item_id			 = $('#item_id').val().trim();
				var quantity		 = $('#quantity').val().trim();
				var item_name		 = $('#item_name').val().trim();
				var price			 = $('#price').val().trim();
				var uom				 = $('#uom').val().trim();
				var description		 = $('#description').val().trim();
				var item_type 		= $('#item_type').val().trim();
				var location        = $('#location').val().trim();
				var item_image        = $('#item_image').val().trim();
				// var opening_quantity = $('#opening_quantity').val().trim();
				// var unit_price		 = $('#unit_price').val().trim();
				// var minimum_quantity = $('#minimum_quantity').val().trim();
				// var reorder_quantity = $('#reorder_quantity').val().trim();
				
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/save_new_item',
					data:{ 
							item_id: item_id,
							quantity: quantity, 
							item_name: item_name, 
							price: price,  
							uom: uom,
							item_type:item_type,
							location:location,
							description: description
							item_image: item_image
							
							// opening_quantity: opening_quantity, 
							// unit_price: unit_price, 
							// minimum_quantity: minimum_quantity, 
							// reorder_quantity: reorder_quantity
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
				window.location.reload(true);
			
			}
		});
	});
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#item_id').val().trim() == "")
		{
			alert("Please insert Item ID");
			$('#item_id').focus();
			return false;
		}
		else if($('#quantity').val().trim() == "")
		{
			alert("Please Insert Quantity");
			$('#quantity').focus();
			return false;
		}

		else if($('#item_name').val().trim() == "")
		{
			alert("Please insert Item Name");
			$('#item_name').focus();
			return false;
		}
		

		else if($('#price').val().trim() == "")
		{
			alert("Please Insert Price");
			$('#item_type').focus();
			return false;
		}

		// 	else if($('#location').val().trim() == "")
		// {
		// 	alert("Please Write Down Location");
		// 	$('#location').focus();
		// 	return false;
		// }

		else if($('#uom').val().trim() == "select")
		{
			alert("Please select Unit of Measurement UoM");
			$('#uom').focus();
			return false;
		}

		// 	else if($('#item_type').val().trim() == "select")
		// {
		// 	alert("Please select Item Type");
		// 	$('#item_type').focus();
		// 	return false;
		// }
		 
		
		
		
				
				
		return true;
	}
</script>

	
	
	
	
	