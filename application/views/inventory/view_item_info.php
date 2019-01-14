<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">View Item Info</div>
				<br><br>
                    <div class="col-xs-10 col-sm-8">

			<table>			
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
								<input type="text" id="quantity" name="quantity" value="<?php echo $items_data->quantity ?>" class="form-control col-sm-6 custom-input" readonly>
									
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>
						<tr>
							<td><label for="item_name" style="margin-top: 4px">Item Name</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td style="width:75%">
								<input type="text" id="item_name" name="item_name" value="<?php echo $items_data->item_name ?>" class="form-control custom-input" readonly>
								<br class="hidden-xs">
							</td>
						</tr>

						
						<tr>
							<td><label for="price" style="margin-top: 4px">Unit Price </label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="text"  id="price" name="price" class="form-control col-sm-6 custom-input" value="<?php echo $items_data->unit_price; ?>" readonly>
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>


							<tr>
							<td><label for="location" style="margin-top: 4px">Location
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="text"  id="location" value="<?php echo $items_data->location; ?>" name="location" class="form-control col-sm-6 custom-input" readonly>
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>


							<tr>
							<td><label for="uom" style="margin-top: 4px">UoM</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<select id="uom" name="uom" class="form-control col-sm-6 custom-input" required readonly >
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
							<select id="item_type" name="item_type" class="form-control col-sm-6 custom-input" disabled>
									<option value="" selected>Select Type</option>
									<?php foreach ($all_item_types as  $item_types) { ?>
									<option value="<?php echo $item_types->type_id ?>" <?php if ($items_data->item_type==$item_types->type_id){

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
								<input type="text" id="description" name="description" value="<?php echo $items_data->remarks?>" class="form-control custom-input" readonly>
								<br class="hidden-xs">
							</td>

							<td>
								<input type="hidden" id="id" name="id" value="<?php echo $items_data->id?>" class="form-control custom-input">
							</td>
						</tr>
						<tr>
							<td><label>Item images</label></td>
						</tr>
						
						<!--  -->						
						
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							
						</tr>
					</table>
					<div>
						<img src="<?php echo base_url()?><?php echo $items_data->item_image?>" width="300px" height="250px">
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
	
	
	
	
	
	
	