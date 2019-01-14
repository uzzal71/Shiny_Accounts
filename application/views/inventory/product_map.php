<!-- Page Content -->
<?php 
//echo "<pre>"; print_r($all_finished_item);
?>
  <br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading"><p style="margin-left: 40%">Product Mapping</p></div>
				<br><br>
                    <div class="col-xs-12 col-sm-12">

					<table>
						
						<tr>
							<td><label for="item_type" style="margin-top: 4px">Finished Item</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td style="width:79%">
								<select id="finished_item" name="finished_item" class="form-control col-sm-6 custom-input" required onchange="show_raw_material_list()">
									<option value="select" selected>Select Finished Item</option>
                              <!--finished item  vlae as code show item name-->
							     	<?php foreach($all_finished_item as $each_finished_item){?>
									
										<option value="<?php echo $each_finished_item->item_code; ?>"><?php echo $each_finished_item->item_name; ?></option>
									<?php }?>

								</select>
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>	
									
					</table><br>
					
					<div id="div_required_raw_material_details">
					
						<h4 style="margin-left:43%">Row Items</h4><hr>
				<!--raw item starts-->
						  <table id="raw_material_table">
						  	<tr>
								<td style="width:65%">
									<select name="raw_item" class="form-control col-sm-6 custom-input" required>
										<option value="select" selected>Select Raw Item</option>
									<!--finished item  vlae as code show item name-->
										<?php foreach($all_raw_item as $each_raw_item){?>					
											<option value="<?php echo $each_raw_item->item_code; ?>"><?php echo $each_raw_item->item_name; ?></option>
										<?php }?>
									
									</select>
								</td>
								<td>
									<input class="form-control" type="text" required="Quantity">
								</td>			
								<td>
									<button class="btn btn-success" onclick="add_more_row()">Add +</button>
								</td>
							</tr>
						  </table>
						  <br/>
						  <button class="btn btn-success" id="btn_save">Save</button>

					</div>

                    </div>

                    <!-- ........................................... -->

                    <div class="form-horizontal">
                        <div class="form-group">

                        </div>
                    </div>
                
            </div>
        </div>
    </div>
	
	<div id="div_raw_material_list" style="visibility:hidden">

		<select name="raw_item" class="form-control col-sm-6 custom-input" required>
			<option value="select" selected>Select Raw Item</option>
		<!--finished item  vlae as code show item name-->
			<?php foreach($all_raw_item as $each_raw_item){?>					
				<option value="<?php echo $each_raw_item->item_code; ?>"><?php echo $each_raw_item->item_name; ?></option>
			<?php }?>
		
		</select>
		
	</div>
	
	<script type="text/javascript">
	$(document).ready(function() {
	
		$('#div_required_raw_material_details').hide();
		
		
		$("#btn_save").click(function(){
		
			if(form_validation())
			{
				
				
				var finished_item = $('#finished_item').val().trim();
				//alert(finished_item);
				var json_data = html2json();
				
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/save_product_map',
					data:{ 
							finished_item: finished_item, 
							json_data: json_data
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						
						if(response == "Product mapping added Successfully")
						{
							$('#finished_item').val('select');
							
							//$("#raw_material_table").find("tr:gt(0)").remove();
							$("#raw_material_table").find( 'tr:not(:first)' ).remove();
							$('#raw_material_table tr:first').find('td:eq(0) :first-child').val('select');//td:eq(0) means first td of this row
							$('#raw_material_table tr:first').find('td:eq(1) :first-child').val('');
							$('#raw_material_table tr:first').find('td:eq(2)').html('<button class="btn btn-success" onclick="add_more_row()">Add +</button>');
							
							$('#div_required_raw_material_details').hide();
							
						}
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				alert(response);
			
			}
		});


	});
	
	
	function html2json() {
		
		var sendData = [];

		$('#raw_material_table tr').each(function(i, el){
			
			var this_row = $(this);
			var raw_item = $.trim(this_row.find('td:eq(0) :first-child').val());//td:eq(0) means first td of this row
			var quantity = $.trim(this_row.find('td:eq(1) :first-child').val());
			
			obj = {};
			obj['raw_item'] = raw_item;
			sendData.join(",");
			
			obj['quantity'] = quantity;
			sendData.push(obj);
		});
		
		var json = JSON.stringify(sendData);
		alert(json);
		
		return json;
	}
	
	
	function show_raw_material_list()
	{
		if($('#finished_item').val().trim() == 'select')
		{
			$("#raw_material_table").find( 'tr:not(:first)' ).remove();
			$('#raw_material_table tr:first').find('td:eq(0) :first-child').val('select');//td:eq(0) means first td of this row
			$('#raw_material_table tr:first').find('td:eq(1) :first-child').val('');
			$('#raw_material_table tr:first').find('td:eq(2)').html('<button class="btn btn-success" onclick="add_more_row()">Add +</button>');
							
			$('#div_required_raw_material_details').hide();
		}
		else
		{
			$('#div_required_raw_material_details').show();
			//$('#raw_material_table > tbody:last-child').after($('#div_raw_material_table_row'.html()));
		}
	}
	
	function add_more_row()
	{
		//alert("se");
		//alert($('#raw_material_table tr:last td:nth-child(2) :first-child').val());
		if($('#raw_material_table tr:last td:first :first-child').val() == 'select')
		{
			alert("Select item in the last row.");
		}
		else if($('#raw_material_table tr:last td:nth-child(2) :first-child').val() == '')
		{
			alert("Enter quantity in the last row.");
		}
		else
		{
			$('#raw_material_table tr:last td:last').html("&nbsp;");
			$('#raw_material_table tr:last').after('<tr><td>' + $('#div_raw_material_list').html() + '</td><td><input class="form-control" type="text" required="Quantity"></td><td><button class="btn btn-success" onclick="add_more_row()">Add +</button></td></tr>');
		}
	}
	


	function form_validation()
	{
		//alert("validation");
		
		if($('#finished_item').val().trim() == "select")
		{
			alert("Please select Finished Item");
			$('#finished_item').focus();
			return false;
		}
		
		$("#raw_material_table tr").each(function () {
			//alert("ahaso");
			
			var this_row = $(this);
			var raw_item = $.trim(this_row.find('td:eq(0) :first-child').val());//td:eq(0) means first td of this row
			//alert(raw_item);
			var quantity = $.trim(this_row.find('td:eq(1) :first-child').val());
			
			if(raw_item == 'select')
			{
				alert("Please select Raw Item");
				this_row.find('td:eq(0) :first-child').focus();
				return false;
			}
			else if(quantity == '')
			{
				alert("Please insert Quantity");
				this_row.find('td:eq(1) :first-child').focus();
				return false;
			}
			else if($.isNumeric(quantity.trim()) == false)
			{
				alert("Quantity must be numeric");
				this_row.find('td:eq(1) :first-child').val("");
				this_row.find('td:eq(1) :first-child').focus();
				return false;
			}
			
		});
			
		return true;
	}
</script>

	
	
	
	
	