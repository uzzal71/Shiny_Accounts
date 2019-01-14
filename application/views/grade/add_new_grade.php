
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Add New Grade</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
						<tr> 
						 <th align="center">Grade Name</th>
							<td align="center"style="width:30%">
								<input type="text" id="grade_name" name="grade_name" class="form-control custom-input" required>
							</td>  
							<th align="center">Grade Description</th>
							<td align="center"style="width:30%">                           
								<input type="text" id="description" name="description" class="form-control custom-input" required>
							</td> 	
						</tr> 		
						
						
						<tr>
						   <td><button type="submit" id="btn_add_grade" class="btn btn-info pull-right">Add New Grade</button></td>   
						</tr>					
           

					</tbody>
					
				</table>

            </div>
           
        </div>
      
    </div>
    </div>
	
<script type="text/javascript">
	$(document).ready(function() {

		$("#btn_add_grade").click(function(){
			//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				var grade_name = $('#grade_name').val().trim();
				var description = $('#description').val().trim();
				//alert("Variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Grade/save_new_grade',
					data:{
							grade_name: grade_name,
							description: description
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
		if($('#grade_name').val().trim() == "")
		{
			alert("Please Insert Grade Name");
			$('#grade_name').focus();
			return false;
		}			
		else if($('#description').val().trim() == "")
		{
			alert("Please Insert Grade Description");
			$('#description').focus();
			return false;
		}
		return true;
		}

</script>

	
