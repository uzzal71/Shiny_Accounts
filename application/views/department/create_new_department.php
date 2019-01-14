<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Create New Department</div>
				<div class="col-xs-12 col-sm-11">
				<form id="myForm" >
			<table>
			<tr>
			<td> <label for="description" style="margin-top: 4px">Department Name</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="department_name" name="department_name" class="form-control custom-input" required></td>
			
			</tr>
	
				<tr>
			<td>
			 <div class="col-md-4" style="float: right;width: 4%;margin-top: 22px;margin-right: 50px">
                            <button id="btn_add_department" class="btn btn-info pull-right">Add Department</button>
                        </div></td>
			 
			<td> </td>
			<td></td>
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
		$("#btn_add_department").click(function(){
			if(form_validation())
			{
				//alert("validation true");
				
				var department_name		 = $('#department_name').val().trim();

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url()?>Department/save_new_department',
					data:{ 
							department_name: department_name
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
						alert(response);
						document.location.reload(true);
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
			alert("Please Insert Department");
			$('#department_name').focus();
			return false;
		}		
		
		return true;
	}
	
		//  ======  ######  For Selecting Date Time and DateTime  ######  ======

        $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
        $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
		$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
		});
</script>



	
	
	
	
	