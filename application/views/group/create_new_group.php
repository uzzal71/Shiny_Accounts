
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Add New Group</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
						<tr>  
						 <th align="center">Group Name</th>
							<td align="center"style="width:30%">
								<input type="text" id="group_name" name="group_name" class="form-control custom-input" required>
							</td> 
							<td></td>
						</tr> 		
						
						
						<tr>
						   <td><button type="submit" id="btn_add_group" class="btn btn-info pull-right">Add New Group</button></td>   
						</tr>					
           

					</tbody>
					
				</table>

            </div>
           
        </div>
      
    </div>
    </div>
	
<script type="text/javascript">
	$(document).ready(function() {

		$("#btn_add_group").click(function(){
			//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				var group_name = $('#group_name').val().trim();
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Group/save_new_group',
					data:{
							group_name: group_name
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
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
		if($('#group_name').val().trim() == "")
		{
			alert("Please Insert Group Name");
			$('#group_name').focus();
			return false;
		}
		return true;
		}

</script>

	