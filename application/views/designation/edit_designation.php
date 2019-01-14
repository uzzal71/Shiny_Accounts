
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading" align = "center">Edit Designation</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
						<tr>
						   <th align="center">Designation Name</th>
						   <td align="center"style="width:30%"><input type="text" name="designation_name" <?php if($each_designation){?> value = "<?php echo $each_designation->designation_name?>" <?php }?>id="designation_name" class="form-control custom-input" required></td>                         
						   <th align="center">Is Active</th>
						   <td align="center"style="width:30%">
								<select required name="is_active" class="form-control col-sm-6 custom-input" id="is_active">
									<option value="select">Select Status</option>
									<option  <?php if($each_designation){if($each_designation->is_active == '1'){?> selected = "selected" <?php }}?> value="1">Active</option>
									<option <?php if($each_designation){if($each_designation->is_active == '0'){?> selected = "selected" <?php }}?> value="0">Inactive</option>
								</select><br class="hidden-xs">
						   </td> 
						<tr>   
							<td><input type = "hidden" name = "id"  value = "<?php echo $each_designation->id?>" id="id"></td> <td></td><td></td><td></td>
						</tr> 		

						<tr>
						   <td><button type="submit" id="btn_update_designation" class="btn btn-info pull-right">Update Designation</button></td>   
						</tr>					
           

					</tbody>
					
				</table>

            </div>
           
        </div>
      
    </div>
    </div>
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_update_designation").click(function(){
			//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				var designation_name = $('#designation_name').val().trim();
				var is_active = $('#is_active').val().trim();
				var id = $('#id').val().trim();
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Designation/update_designation',
					data:{
							designation_name: designation_name,
							is_active: is_active,
							id: id
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						window.location.replace("<?php echo base_url();?>Designation/designation_list");
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				
				//alert(response);
			
			}

		});
		
	});
	
	function form_validation()
	{
		
		//alert("validation");
		
		if($('#designation_name').val().trim() == "")
		{
			alert("Please Select Over Time Rate Based On");
			$('#designation_name').focus();
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

</script>

	
