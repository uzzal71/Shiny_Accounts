<br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;">Approve Promotion<br><br></h3>
			<table>
			<thead>
			<tr style="margin:10;">
			<td>Date From</td>
			<td><input type= "text" id = "date_from" name = "date_from"  class ="form-control custom-input dateFrom"></td>
			<td>Date To</td>
			<td><input type= "text" id = "date_to" name = "date_to"  class ="form-control custom-input dateFrom"></td>
			<td><button type="submit" value="" class="btn btn-primary" id="promotion_list">Promotion List</button></td>
			</tr>
			</thead>
			</table>
                <table class="table table-bordered" id= "table_id">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Employee ID</th>
                        <th align="center">Employee Name</th>
                        <th align="center">Designation</th>
                        <th align="center">Promoted Designation</th>
                        <th align="center">Effective From Date</th>
						<th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							
                         
                            </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
		
<script type="text/javascript">
	$(document).ready(function() {
		$("#promotion_list").click(function(){
			//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				
				var date_from = $('#date_from').val().trim();
				var date_to = $('#date_to').val().trim();

				
				//alert("variable assigned");
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Promotion/search_promotion',
					data:{ 
							date_from: date_from,
							date_to: date_to
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						$("#table_id tbody").html("");
						$("#table_id tbody").html(response);
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
		
		if($('#date_from').val().trim() == "")
		{
			alert("Please Insert Date From");
			$('#date_from').focus();
			return false;
		}		
		else if($('#date_to').val().trim() == "")
		{
			alert("Please Insert Date To");
			$('#date_to').focus();
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

