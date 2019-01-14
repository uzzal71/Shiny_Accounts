<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Material Issuing</div>
              
               <br>
                    <div class="col-xs-12 col-sm-12">
								
				  
<table>			
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
							<td><label for="item_code" style="margin-top: 4px">Item Code </label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="text" id="item_code" name="item_code" class="form-control custom-input" readonly="readonly" required/>
								<br class="hidden-xs">
							</td>
						</tr>
						<tr >
							<td><label for="date_of_issuing" style="margin-top: 4px">Issuing Date</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td style="width:75%">
								<input type="text" id="date_of_issuing" name="date_of_issuing" class="form-control custom-input" required/>
								<br class="hidden-xs">
							</td>
						</tr>
						<tr>
							<td><label for="issued_by" style="margin-top: 4px">Issued By</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<select id="issued_by" name="issued_by" class="form-control col-sm-6 custom-input"required>
									<option value="select" selected>Select Issued By</option>
									<?php foreach($issued_by_full_name as $v_full_name){?>
									<option value="<?php echo $v_full_name->full_name?>"><?php echo $v_full_name->full_name?></option>
									<?php }?>
									
								</select><br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>
						<tr>
							<td><label for="project" style="margin-top: 4px">Project</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<select id="project" name="project" class="form-control col-sm-6 custom-input"required>
									<option value="Select" selected>Select Project</option>
									<?php foreach($view_project_info as $v_project){?>
									<option value="<?php echo $v_project->id?>"><?php echo $v_project->project_short_name?></option>
									<?php }?>

								</select><br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>						
						<tr>
							<td><label for="issue_quantity" style="margin-top: 4px">Issuing Qty</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="text" id="issue_quantity" name="issue_quantity" class="form-control custom-input" required/>
								<br class="hidden-xs">
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
								<button type="button" class="btn btn-primary" id="btn_issue_item">Issue Item</button>
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
	

<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_issue_item").click(function(){
			//alert($('#item_name').val().trim());
			if(form_validation())
			{
				//alert("validation true");
				
				var item_info = $('#item_name').val().trim().split('[(');
				var item_name = item_info[0].trim();
				
				var item_code		 = $('#item_code').val().trim();
				var date_of_issuing	 = $('#date_of_issuing').val().trim();
				var issued_by		 = $('#issued_by').val().trim();				
				var project			 = $('#project').val().trim();
				var issue_quantity	 = $('#issue_quantity').val().trim();
				var uom				 = $('#uom').val().trim();
				var unit_price		 = $('#unit_price').val().trim();
				
				
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/save_material_issue',
					data:{ 
							item_name: item_name, 
							item_code: item_code, 
							date_of_issuing: date_of_issuing, 
							issued_by: issued_by,
							project: project, 
							issue_quantity: issue_quantity, 
							uom: uom, 
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
		
		
		
		$( "#date_of_issuing" ).datepicker({
		  appendText: "(yyyy-mm-dd)",
		  dateFormat: "yy-mm-dd"
		});
		
		
		
	});
	
	function form_validation()
	{
		//alert("validation");item_name item_code date_of_issuing issued_by project issue_quantity uom unit_price
		
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
		else if($('#date_of_issuing').val().trim() == "")
		{
			alert("Please insert Issue Date");
			$('#date_of_issuing').focus();
			return false;
		}
		else if($('#issued_by').val().trim() == "select")
		{
			alert("Please select Issued By");
			$('#issued_by').focus();
			return false;
		}
		else if($('#project').val().trim() == "select")
		{
			alert("Please select Project");
			$('#project').focus();
			return false;
		}
		else if($('#issue_quantity').val().trim() == "")
		{
			alert("Please insert Issue Quantity");
			$('#issue_quantity').focus();
			return false;
		}
		else if($.isNumeric($('#issue_quantity').val().trim()) == false)
		{
			alert("Issue Quantity must be numeric");
			$('#issue_quantity').val() = "";
			$('#issue_quantity').focus();
			return false;
		}
		else if($('#uom').val().trim() == "select")
		{
			alert("Please select UOM");
			$('#uom').focus();
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

	
	
	

















