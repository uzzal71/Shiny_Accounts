<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Create New Leave Type</div>
				<div class="col-xs-12 col-sm-11">

			<table>
			<tr>
			<td> <label for="leave_full_name" style="margin-top: 4px">Leave Full Name</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="leave_full_name" name="leave_full_name" class="form-control custom-input" required></td>
			
			</tr>		
			<tr>
			<td> <label for="leave_short_name" style="margin-top: 4px">Leave Short Name</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="leave_short_name" name="leave_short_name" class="form-control custom-input" required></td>
			
			</tr>

			<tr>
			<td> <label for="leave_short_name" style="margin-top: 4px">Leave Limit</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="number" id="leave_limit" name="leave_limit" class="form-control custom-input" required></td>
			
			</tr>
			<tr>
			<td> <label for="leave_short_name" style="margin-top: 4px">Period Of Time</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%">
				<select id="period" class="form-control custom-input">
					
					<option value="select">Select</option>
					<option value="monthly"> Per Month</option>
					<option value="yearly"> Per Year</option>

				</select>

			</td>
			
			</tr>
	
				<tr>
			<td>
			 <div class="col-md-4" style="float: right;width: 4%;margin-top: 22px;margin-right: 50px">
                            <button id="btn_add_leave_type" class="btn btn-info pull-right">Add Leave Type</button>
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
		$("#btn_add_leave_type").click(function(){
			if(form_validation())
			{
				//alert("validation true");
				
				var leave_full_name		 = $('#leave_full_name').val().trim();
				var leave_short_name		 = $('#leave_short_name').val().trim();
				var limit=$('#leave_limit').val().trim();
				var period=$('#period').val().trim();

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url()?>leave/save_leave_type',
					data:{ 
							leave_full_name: leave_full_name,
								limit:limit,
								period:period,
							leave_short_name: leave_short_name
						
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
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#leave_full_name').val().trim() == "")
		{
			alert("Please Insert Leave Full Name");
			$('#leave_full_name').focus();
			return false;
		}		
		else if($('#leave_short_name').val().trim() == "")
		{
			alert("Please Insert Leave Short Name");
			$('#leave_short_name').focus();
			return false;
		}
		else if($('#leave_limit').val().trim() == "")
		{
			alert("Please Insert Leave Limit");
			$('#leave_limit').focus();
			return false;
		}

		else if($('#period').val().trim() == "select")
		{
			alert("Please Select Period of Time");
			$('#period').focus();
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



	
	
	
	
	