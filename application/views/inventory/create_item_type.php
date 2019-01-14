<!-- Page Content -->


  <br><br>
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
        	 <h3 style = "color:green" align="center"><?php  echo $this->session->userdata('message');
            $this->session->unset_userdata('message')?></h3> 
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Create New Item Type</div>
				<br><br>
                    <div class="col-xs-10 col-sm-8">

			<table>			
						<tr>

						 <?php
						
						if($type_id->type_id==null){
							$last_id= 100001;
						   
					   }
						   else{
							   $last_id = $type_id->type_id+1;
							 
						   } ?>
							<td><label for="item_id" style="margin-top: 4px">Type ID</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td style="width:75%">
								<input type="text" id="item_id" name="item_id" value="<?php echo "ITT".date('Y').$last_id; ?>" class="form-control custom-input" readonly >
								<br class="hidden-xs">
							</td>
						</tr>
						
						<tr>
							<td><label for="item_name" style="margin-top: 4px">Type Name</label></td>
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td style="width:75%">
								<input type="text" id="type_name" name="type_name" class="form-control custom-input" required>
								<br class="hidden-xs">
							</td>
						</tr>

						
						
						

					
							<tr>
							<td><label for="location" style="margin-top: 4px">Description
							<td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;</td>
							<td>
								<input type="text"  id="description" name="location" class="form-control col-sm-6 custom-input" required>
								<br class="hidden-xs"><br class="hidden-xs">
							</td>
						</tr>

							

								

					
												
										 	
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>
								<button type="button" class="btn btn-primary" name="btn_create_item" id="btn_create_item">Create Item Type</button>
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
			//alert($('#item_name').val().trim());
			if(form_validation())
			{
				//alert("validation true");
				var type_id			 = $('#item_id').val();
				
				var type_name		 = $('#type_name').val();
				
				var description		 = $('#description').val();
				
				
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Inventory/save_item_type',
					data:{ 
							type_id: type_id,
							description: description, 
							type_name: type_name 
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
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

	
	
	
	
	