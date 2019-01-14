<!-- Page Content -->
  <br><br>
  <form action="<?php echo base_url('Inventory/update_item_info');?>" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Edit Iterm Info</div>
				<br><br>
                    <div class="col-xs-12 col-sm-12" style="width: 100%">

			<table style="width: 100%">			
						<tr>

						
							<td><label for="item_id" style="margin-top: 4px">Item ID</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td style="width:75%">
								<input type="text" id="item_id" name="item_id" value="<?php echo $items_data->item_id ?>" class="form-control custom-input" readonly >
								<br class="hidden-xs">
							</td>
						</tr>
						<tr>
							<td><label for="quantity" style="margin-top: 4px">Quantity</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="number" id="quantity" name="quantity" value="<?php echo $items_data->quantity ?>" class="form-control col-sm-6 custom-input" required>
									
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>
						<tr>
							<td><label for="item_name" style="margin-top: 4px">Item Name</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td style="width:75%">
								<input type="text" id="item_name" name="item_name" value="<?php echo $items_data->item_name ?>" class="form-control custom-input" required>
								<br class="hidden-xs">
							</td>
						</tr>

						
						<tr>
							<td><label for="price" style="margin-top: 4px">Price </label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="number"  id="price" name="price" class="form-control col-sm-6 custom-input" value="<?php echo $items_data->unit_price; ?>" required>
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>

							<td><label for="location" style="margin-top: 4px">Location
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="text"  id="location" value="<?php echo $items_data->location; ?>" name="location" class="form-control col-sm-6 custom-input" >
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>


							<tr>
							<td><label for="uom" style="margin-top: 4px">UoM</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<select id="uom" name="uom" class="form-control col-sm-6 custom-input" required >
									<option value="select" selected>Select UoM</option>

		<option <?php if ($items_data->uom=='dzn'){echo 'selected = "selected"';} ?> value='dzn'>dzn</option>
		<option <?php if ($items_data->uom=='kg'){echo 'selected = "selected"';} ?> value='kg'>kg</option>
		<option <?php if ($items_data->uom=='ltr'){echo 'selected = "selected"';} ?> value='ltr'>ltr</option>
		<option <?php if ($items_data->uom=='pcs'){echo 'selected = "selected"';} ?> value='pcs'>pcs</option>
		<option <?php if ($items_data->uom=='m'){echo 'selected = "selected"';} ?> value='m'>m</option>
		<option <?php if ($items_data->uom=='inch'){echo 'selected = "selected"';} ?> value='inch'>inch</option>
		<option <?php if ($items_data->uom=='feet'){echo 'selected = "selected"';} ?> value='feet'>feet</option>
		<option <?php if ($items_data->uom=='pound'){echo 'selected = "selected"';} ?> value='pound'>pound</option>
		<option <?php if ($items_data->uom=='ton'){echo 'selected = "selected"';} ?> value='ton'>ton</option>
								</select>
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>



									<tr>
							<td><label for="item_type" style="margin-top: 4px">Item Type</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<select id="item_type" name="item_type" class="form-control col-sm-6 custom-input" required>
									<option value="">Select Type</option>
									<?php foreach ($all_item_types as  $item_types) { ?>
									<option selected value="<?php echo $item_types->type_id ?>" <?php if ($items_data->item_type==$item_types->type_id){

										echo "Selected";
									} ?>
										
								><?php echo $item_types->type_name ?></option>	
									<?php } ?>
								</select>
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>
						<tr>
							<td><label for="description" style="margin-top: 4px">Description</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="text" id="description" name="description" value="<?php echo $items_data->remarks?>" class="form-control custom-input">
								<br class="hidden-xs">
							</td>

							<td>
								<input type="hidden" id="id" name="id" value="<?php echo $items_data->id?>" class="form-control custom-input">
							</td>
						</tr>
						<tr>
							<td><label for="description" style="margin-top: 4px">Item image</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="checkbox" name="chage_img" value="1" id="check_img">Click to image update
								<input type="file" id="item_image" name="item_image" class="form-control custom-input">
								<br class="hidden-xs">
							</td>
							<input type="hidden" value="<?php echo $items_data->item_image?>" name="old_item_image">
						</tr>
																			 
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							
						</tr>
					</table>
					<div>
					<img src="<?php echo base_url();?><?php echo $items_data->item_image?>" width="80px" height="80px" style="margin-left: 270px;margin-top: -30px;"/>
					</div>
					<div style="margin-left: 260px;margin-top: 10px">
						<button type="submit" class="btn btn-primary" name="btn_create_item">Update Item</button>
					</div>	
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

		document.getElementById("item_image").disabled = true;

		$("#check_img").on("click", function(){
			document.getElementById("item_image").disabled = false;
		})

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
				var id		 		 = $('#id').val().trim();
				var item_type        = $('#item_type').val().trim();
				var location        = $('#location').val().trim();
				// var unit_price		 = $('#unit_price').val().trim();
				// var minimum_quantity = $('#minimum_quantity').val().trim();
				// var reorder_quantity = $('#reorder_quantity').val().trim();
				
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/update_item_info',
					data:{ 
							item_id: item_id,
							quantity: quantity, 
							item_name: item_name, 
							price: price,  
							uom: uom,
							description: description,
							item_type:item_type,
							location:location,
							id: id
							// opening_quantity: opening_quantity, 
							// unit_price: unit_price, 
							// minimum_quantity: minimum_quantity, 
							// reorder_quantity: reorder_quantity
						},
					//timeout: 4000,
					success: function(result) {
						
						response = result;
						//location.replace("../all_items_list");
						window.location.replace("../all_items_list");
						 

					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				alert(response);
			
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

	
	
	
	
	