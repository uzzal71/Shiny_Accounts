
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-0">

		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading" align = "center">Check Leave Status</div>
            <div class="table-responsive" id="custom-table">
                <table class="table">
                    <thead>
                    <tr>
                       
                     
                        <th align="center">From<input type="text" name="date_time_from" id="date_time_from" class="form-control custom-input dateFrom" placeholder="Leave Date From" required></th>
                        <th align="center">To<input type="text" name="date_time_to" id="date_time_to" class="form-control custom-input dateFrom" placeholder="Leave Date To" required></th>
                        <th align="center">Status<select name="approval_status" class="form-control col-sm-6 custom-input" id="approval_status" required>
                                <option value="2" >All</option>
                                <option value="1" >Approved</option>
                                <option value="0" >Pending</option>
							</select>
						</th>
                        <th align="center"><button type="button" class="btn btn-primary" id="btn">Submit</button></th>
						<th align="center"></th>
						<th align="center"></th>
                    </tr>
				</table>
				<table id="table_id" class="table ">
				<thead>
					<tr>
                        <th align="center">SL#</th>
                        <th align="center">Employee ID</th>
                        <th align="center">From</th>
                        <th align="center">To</th>
                        <th align="center">No of Days</th>
                        <th align="center">Leave Types</th>
                        <th align="center">Remarks</th>
                        <th align="center">Recorded By</th>
                        <th align="center">Recording Time</th>
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
		$("#btn").click(function(){
			//alert($('#date_time_from').val().trim());
			if(form_validation())
			{
				//alert("validation true");
				
				var date_time_from		 = $('#date_time_from').val().trim();
				var date_time_to		 = $('#date_time_to').val().trim();
				var approval_status		 = $('#approval_status').val().trim();

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url()?>leave/leave_search',
					data:{ 
							date_time_from: date_time_from, 
							date_time_to: date_time_to,  
							approval_status: approval_status
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						//alert(response);
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
		
		 $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
        $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
		$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
	});
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#date_time_from').val().trim() == "")
		{
			alert("Please insert Date Time From");
			$('#date_time_from').focus();
			return false;
		}
		else if($('#date_time_to').val().trim() == "")
		{
			alert("Please insert Date Time To");
			$('#date_time_to').focus();
			return false;
		}
				
				
		return true;
	}
</script>


