
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Create Designation</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>

						<tr>
						   <th align="center">Designation Name</th>
						   <td align="center"style="width:30%"><input type="text" name="designation_name" id="designation_name" class="form-control custom-input" required></td>                         
						   <th align="center">Is Active</th>
						   <td align="center"style="width:30%">
								<select required name="is_active" class="form-control col-sm-6 custom-input" id="is_active">
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select><br class="hidden-xs"></td>
						   </td>  	
						</tr> 		

						<tr>
						   <td><button type="submit" id="btn_designation" class="btn btn-info pull-right">Create Designation</button></td>   
						</tr>					
           

					</tbody>
					
				</table>

            </div>
           
        </div>
      
    </div>
    </div>
	
<script type="text/javascript">
	$(document).ready(function() {

		$("#btn_designation").click(function(){
			//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				var designation_name = $('#designation_name').val().trim();
				var is_active = $('#is_active').val().trim();
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Designation/save_new_designation',
					data:{
							designation_name: designation_name,
							is_active: is_active
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						document.location.reload(true);
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

	
