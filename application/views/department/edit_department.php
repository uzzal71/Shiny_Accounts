<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading" align= "center">Edit Department</div>
				<div class="col-xs-12 col-sm-11">

			<table>
			<tr>
			<td> <label for="description" style="margin-top: 4px">Department Name</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="department_name" name="department_name"value="<?php echo $each_department->department_name?>" class="form-control custom-input" required></td>
			<td style="width:65%"> <input type="hidden" id="id" name="id" value="<?php echo $each_department->id?>" class="form-control custom-input" required></td>
			
			</tr>
	
				<tr>
			<td>
			 <div class="col-md-4" style="float: right;width: 4%;margin-top: 22px;margin-right: 50px">
                            <button id="btn_update_department" class="btn btn-info pull-right">Update Department</button>
                        </div></td>
			 
			<td> </td>
			<td></td>
			</tr>

			</table>

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
		$("#btn_update_department").click(function(){
			//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				
				var id		 = $('#id').val().trim();
				var department_name	= $('#department_name').val().trim();

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url()?>Department/update_department',
					data:{ 
							id: id,
							department_name: department_name
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						window.location.replace("<?php echo base_url();?>Department/department_list");
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				//alert(response);
			
			}

	
	});
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#department_name').val().trim() == "")
		{
			alert("Please Insert Department Name");
			$('#department_name').focus();
			return false;
		}		
		
		return true;
	}
	
});

</script>



	
	
	
	
	