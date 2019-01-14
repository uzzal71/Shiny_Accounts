<!-- Page Content -->


  <br><br>
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
        	 <h3 style = "color:green" align="center"><?php  echo $this->session->userdata('message');
            $this->session->unset_userdata('message')?></h3> 
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Update Item Type</div>
				<br><br>
                    <div class="col-xs-10 col-sm-8">

			<table>			
						<tr>
							<td><label for="item_id" style="margin-top: 4px">Type ID</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td style="width:75%">
								<input type="text" id="item_id" name="item_id" value="<?php echo $item_data_for_edit->type_id ?>" class="form-control custom-input" readonly >
								<br class="hidden-xs">
							</td>
						</tr>
						
						<tr>
							<td><label for="item_name" style="margin-top: 4px">Type Name</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td style="width:75%">
								<input type="text" id="type_name" name="type_name" class="form-control custom-input" value="<?php echo $item_data_for_edit->type_name ?>" required>
								<br class="hidden-xs">
							</td>
						</tr>

						
						
						

					
							<tr>
							<td><label for="location" style="margin-top: 4px">Description
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="text"  id="description" name="description" class="form-control col-sm-6 custom-input" value="<?php echo $item_data_for_edit->description ?>"  required>
								<input type="hidden" id="tid" value="<?php echo $item_data_for_edit->id ?>">
							</td>
						</tr>

							

								

					
												
										 	
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>
								<button class="btn btn-primary" name="btn_create_item" id="btn_create_item">Update Item Type</button>
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
		$("#btn_create_item").click(function(){
			
			if(form_validation())
			{
				
				var type_id			 = $('#item_id').val();
				
				var type_name		 = $('#type_name').val();
				
				var description		 = $('#description').val();
				var tid		 = $('#tid').val();
				
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/update_item_type',
					data:{ 
							type_id: type_id,
							description: description, 
							type_name: type_name,
							tid:tid
						},
					//timeout: 4000,
					success: function(result) {
						//response = result;
						//console.log(response);
						//alert(response);
						window.location.reload(true);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				//alert(response);
				window.location.reload(true);
			
			}
		});
	});
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#type_id').val()=="")
		{
			alert("Please insert Item ID");
			$('#type_id').focus();
			return false;
		}
		

		else if($('#type_name').val()== "")
		{
			alert("Please insert Item Name");
			$('#type_name').focus();
			return false;
		}
		

		
		
		
		
				
				
		return true;
	}
</script>

	
	
	
	
	