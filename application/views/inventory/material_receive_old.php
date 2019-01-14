

<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Material Receiving</div>
              
               <br>
                    <div class="col-xs-12 col-sm-12">
										
				  <form name="myForm" action="<?php echo base_url();?>Inventory/save_material_receive"  method="post">
			<table >			
						<tr>
							<td><label for="item_name" style="margin-top: 4px">Item Name </label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td style="width:75%">
								<select id="item_name" name="item_name" class="form-control col-sm-6 custom-input"required/>
									<option value="select" selected>Select Item Name</option>
									<?php foreach($view_item_name as $v_item_name){?>
									<option value="<?php echo $v_item_name->item_name?>[(<?php echo $v_item_name->item_code?>)]"><?php echo $v_item_name->item_name?>[(<?php echo $v_item_name->item_code?>)]</option>
									<?php }?>
								</select>
								<br class="hidden-xs">
								<br class="hidden-xs">
							</td>
						</tr>
							<tr>
								<td><label for="item_code" style="margin-top: 4px">Item Code</label></td>
								<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
								<td>
									<input type="text" id="item_code" name="item_code" class="form-control custom-input" readonly="readonly" required/>
									<br class="hidden-xs">
								</td>
							</tr>
							<tr >
								<td><label for="receiveing_date" style="margin-top: 4px">Receiving Date</label></td>
								<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
								<td style="width:75%">
									<input type="text" id="receiveing_date" name="receiveing_date" class="form-control custom-input" required/>
									<br class="hidden-xs">
								</td>
							</tr>							
							<tr>
								<td><label for="received_by" style="margin-top: 4px">Received By</label></td>
								<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
								<td>
									<select id="received_by" name="received_by" class="form-control col-sm-6 custom-input"required/>
										<option value="select" selected>Select Received By</option>
										<?php foreach($received_by_full_name as $v_full_name){?>
									<option value="<?php echo $v_full_name->id?>"><?php echo $v_full_name->full_name?></option>
									<?php }?>
									</select><br class="hidden-xs"><br class="hidden-xs">
								</td>
							</tr>
							<tr>
								<td><label for="supplier" style="margin-top: 4px">Supplier</label></td>
								<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
								<td>
									<select id="supplier" name="supplier" class="form-control col-sm-6 custom-input"required/>
										<option value="select" selected>Select Supplier</option>
										<?php foreach($supplier_list as $v_supplier){?>
										<option value="<?php echo $v_supplier->id?>" selected><?php echo $v_supplier->full_name?></option>
										<?php }?>
									</select><br class="hidden-xs"><br class="hidden-xs">
								</td>
							</tr>							
						<tr>
							<td><label for="uom" style="margin-top: 4px">UOM</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<select id="uom" name="uom" class="form-control col-sm-6 custom-input" required>
									<option value="select" selected>Select UOM</option>
									<?php foreach($uom_short_name as $v_uom){?>
										<option value="<?php echo $v_uom->uom_short_name?>"><?php echo $v_uom->uom_short_name?></option>
									<?php }?>
								</select>
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>	
							<tr>
								<td><label for="receiving_quantity" style="margin-top: 4px">Receiving Qty</label></td>
								<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
								<td>
									<input type="text" id="receiving_quantity"  name="receiving_quantity" class="form-control custom-input" required/>
									<br class="hidden-xs">
								</td>
							</tr>
							<tr>
								<td><label for="unit_price" style="margin-top: 4px">Unit Price</label></td>
								<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
								<td>
									<input type="text" id="unit_price"  name="unit_price" class="form-control custom-input" required/>
									<br class="hidden-xs">
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>
									<button type="button" class="btn btn-primary" id="btn_receive_item">Receive Item</button>
								</td>
							</tr>
							<tr>
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
	
	
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_receive_item").click(function(){
			//alert($('#item_name').val().trim());
			if(form_validation())
			{
				//alert("validation true");
				
				var item_info = $('#item_name').val().trim().split('[(');
				var item_name = item_info[0].trim();
				
				var item_code		 = $('#item_code').val().trim();
				var receiveing_date	 = $('#receiveing_date').val().trim();
				var received_by		 = $('#received_by').val().trim();				
				var supplier		 = $('#supplier').val().trim();
				var uom				 = $('#uom').val().trim();
				var receiving_quantity = $('#receiving_quantity').val().trim();
				var unit_price		 = $('#unit_price').val().trim();
				
				
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/save_material_receive',
					data:{ 
							item_name: item_name, 
							item_code: item_code, 
							receiveing_date: receiveing_date, 
							received_by: received_by,
							supplier: supplier, 
							uom: uom, 
							receiving_quantity: receiving_quantity, 
							unit_price: unit_price
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
			
			}
		});
		
		
		
		
		$("#item_name").change(function(){
			//alert("Here");
			
			var item_info = $('#item_name').val().trim().split('[(');
			//var item_name = item_info[0];
			var item_code = item_info[1].substr(0, (item_info[1].length - 2));
			//alert(item_name+"---"+item_code);
			$('#item_code').val(item_code);
		
		});
		
		
		
		
		$( "#receiveing_date" ).datepicker({
		  appendText: "(yyyy-mm-dd)",
		  dateFormat: "yy-mm-dd"
		});
		
	});
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#item_name').val().trim() == "select")
		{
			alert("Please select Item Name");
			$('#item_name').focus();
			return false;
		}
		else if($('#item_code').val().trim() == "select")
		{
			alert("Please select Item Code");
			$('#item_code').focus();
			return false;
		}
		else if($('#receiveing_date').val().trim() == "")
		{
			alert("Please insert Receiveing Date");
			$('#receiveing_date').focus();
			return false;
		}
		else if($('#received_by').val().trim() == "select")
		{
			alert("Please select Received By");
			$('#received_by').focus();
			return false;
		}
		else if($('#supplier').val().trim() == "select")
		{
			alert("Please select Supplier");
			$('#supplier').focus();
			return false;
		}
		else if($('#uom').val().trim() == "select")
		{
			alert("Please select UOM");
			$('#uom').focus();
			return false;
		}
		else if($('#receiving_quantity').val().trim() == "")
		{
			alert("Please insert Receiving Quantity");
			$('#receiving_quantity').focus();
			return false;
		}
		else if($.isNumeric($('#receiving_quantity').val().trim()) == false)
		{
			alert("Receiving Quantity must be numeric");
			$('#receiving_quantity').val() = "";
			$('#receiving_quantity').focus();
			return false;
		}
		else if($('#unit_price').val().trim() == "")
		{
			alert("Please insert Unit Price");
			$('#unit_price').focus();
			return false;
		}
		else if($.isNumeric($('#unit_price').val().trim()) == false)
		{
			alert("Unit Price must be numeric");
			$('#unit_price').val() = "";
			$('#unit_price').focus();
			return false;
		}
				
				
		return true;
	}
</script>

	
	
	
	
	








































