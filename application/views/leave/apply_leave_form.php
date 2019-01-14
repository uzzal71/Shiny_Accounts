
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
<?php
$leave_no=$leave->leave_no;
if ($leave_no=="") {
	$leave=10001;
}else{
	$leave=$leave_no+1;
}


 ?>
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;">
			<div class="panel-heading">Apply Leave Form</div>
            <div class="table-responsive" id="custom-table">
				<form enctype="multipart/form-data" id="submit" action="<?php echo base_url();?>employee/save_employee" method="post">
                <table id="" class="table ">
                    <tbody>
                    	<tr>
                    	 <th align="center">Leave Number</th>
                       <td width="30%">                   
					   <input type="text" id="leave_no" name="leave_no" class="form-control custom-input leave_no" value="<?php echo 'LVE'.date('Y').$leave; ?>" readonly>	
					     <th align="center">Address During Leave</th>
                       <td align="center">
						<input type="text" id="adl" name="adl" class="form-control custom-input adl">
					   </td>


                    	</tr>



					<tr>
                       <th align="center">From</th>
                       <td width="30%">                   
					   <input type="text" id="date_time_from" name="date_time_from" class="form-control custom-input dateTimeFrom" required>
					   </td width="30%">  
					   <th align="center">To</th>
                       <td align="center">
						<input type="text" id="date_time_to" name="date_time_to" class="form-control custom-input dateTimeFrom">
					   </td>					   
					  
                    </tr>  			
					<tr>
                      
					   <th align="center">Full/Half Day </th>
                       <td align="center">
						<select name="half_full_day" class="form-control col-sm-6 custom-input" id="half_full_day">
							<option value="">select</option>
							<option value="full_day">Full Day</option>
							<option value="first_half">First Half</option>
							<option value="second_half">Second Half</option>
							</option>
                       </select>
					   </td>	
					    <th align="center">No.of Days</th>
                        <td width="30%">                   
					    <input type="text" id="no_of_days" name="no_of_days" class="form-control custom-input" readonly required>
					    </td width="30%"> 					   
					  
                    </tr>  
                    <tr>

                       <th align="center">Leave types</th>
                       <td >
					  <select name="leave_types" class="form-control col-sm-6 custom-input" id="leave_types">
					  <option value="select">select</option>
								<?php foreach($all_leave_types as $each_leave_type){?>
                                <option value="<?php echo $each_leave_type->leave_short_name?>" >
								<?php echo $each_leave_type->leave_full_name?></option>
								
								<?php }?>
                               
                              
                       </select>
					   </td>  
 
                       <th align="center">Remarks</th>
					   <td colspan="3"> <input type="text" id="remarks" name="remarks" class="form-control custom-input " required>
					   </td>                       
					   
                    </tr> 	
					
					<tr>
                        <th></th> <th></th> <th></th>
                       <td font-size="24"><input type=""id="btn_apply_leave" class="btn btn-success" value="Apply For Leave"/></td>                      
					  
                    </tr>					
           

					</tbody>
					
					</table>
					</form>
            </div>
           
        </div>

        <div style="margin-left: 210px;background: white;max-height: 450px; margin-top: 50px; overflow: scroll">
          <table class="table table-bordered"  >


<thead >
<tr>
	<th><b>Leave Name</b></th>
	<th><b>Availed</b></th>
	<th><b>Balance</b></th>
	<th><b>Leave Limit</b></th>
</tr> 
</thead>  
<?php foreach ($past_leave_data as  $leave_data) {
$balance=$leave_data->limits - $leave_data->no_of_days;

 ?>



	
<tr>
	
	<td><?php echo $leave_data->leave_full_name; ?></td>
	<td><?php echo $leave_data->no_of_days; ?></td>
	<td><?php echo $balance; ?></td>
	<td><?php echo $leave_data->limits; ?></td>
</tr>
	
<?php } ?> 

<?php foreach ($past_leave_data_yearly as  $data_yearly) {
$balances=$data_yearly->limits - $data_yearly->no_of_days;

 ?>



	
<tr>
	
	<td><?php echo $data_yearly->leave_full_name; ?></td>
	<td><?php echo $data_yearly->no_of_days; ?></td>
	<td><?php echo $balances; ?></td>
	<td><?php echo $data_yearly->limits; ?></td>
</tr>
	
<?php } ?> 


<?php foreach ($remaining_leave_list as  $leave_list) {

 ?>



	
<tr>
	
	<td><?php echo $leave_list->leave_full_name; ?></td>
	<td>0</td>
	<td><?php echo $leave_list->limits; ?></td>
	<td><?php echo $leave_list->limits; ?></td>
</tr>
	
<?php } ?>


    </table>
</div>
    </div>


    </div>
	
		
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_apply_leave").click(function(){
								
				//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				
				var date_time_from = $('#date_time_from').val().trim();
				var date_time_to = $('#date_time_to').val().trim();
				var no_of_days = $('#no_of_days').val().trim();
				var leave_types = $('#leave_types').val().trim();
				var half_full_day = $('#half_full_day').val().trim();
				var remarks = $('#remarks').val().trim();
				var leave_no = $('#leave_no').val().trim();
				var adl = $('#adl').val().trim();
				
				//alert("variable assigned");
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>leave/save_apply_leave_info',
					data:{ 
							date_time_from: date_time_from,
							date_time_to: date_time_to,
							no_of_days: no_of_days,
							leave_types: leave_types,
							half_full_day: half_full_day,
							leave_no:leave_no,
							adl:adl,
							remarks: remarks
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						window.location.replace("../Leave/apply_leave_list");
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				//alert(response);
			
			}

	});
	
			$("#half_full_day").change(function(){
					var half_full_day = $('#half_full_day').val().trim();
					if($('#half_full_day').val()=='first_half'){
						var date_time_from = $('#date_time_from').val().trim();
						$('#date_time_to').val(date_time_from);
						$('#no_of_days').val(0.5);
						}
					else if($('#half_full_day').val()=='second_half'){
						var date_time_from = $('#date_time_from').val().trim();
						$('#date_time_to').val(date_time_from);
						$('#no_of_days').val(0.5);
						}
					else if($('#half_full_day').val()=='full_day'){
						$("#no_of_days").attr("readonly", true);
						day_calculation();
					/*	var start = new Date($('#date_time_from').val());
						var end = new Date($('#date_time_to').val());
						// end - start returns difference in milliseconds 
						var diff  = new Date(end - start);
						var days  = diff/1000/60/60/24;
						// get days
						$('#no_of_days').val(days);
						if($('#date_time_to').val()==''){
							$('#no_of_days').val(1);
						}					
						if($('#date_time_from').val()== $('#date_time_to').val() ){
							$('#no_of_days').val(1);
						}
						*/
						}
			});	
			
			$("#date_time_from").change(function(){
					var date_time_from = $('#date_time_from').val().trim();
					day_calculation();
			});			
			$("#date_time_to").change(function(){
					var date_time_to = $('#date_time_to').val().trim();
					day_calculation();
			});
			
			
			
	function day_calculation()
	{
		var start = new Date($('#date_time_from').val());
		var end = new Date($('#date_time_to').val());
		// end - start returns difference in milliseconds 
		
		var diff  = new Date(end - start);
		var days  = diff/1000/60/60/24;
		// get days
		$('#no_of_days').val(days+1);
		if($('#date_time_to').val()==''){
			$('#no_of_days').val(1);
		}					
		
		if($('#date_time_from').val()!= $('#date_time_to').val() ){
			$('#half_full_day').val('full_day');
		}
		if(days<0){
			alert("To date must be Greater Than From Date!");
			$('#date_time_to').focus();
			return false;
		}

	}
	
	function form_validation()
	{
		if($('#adl').val().trim() == "")
		{
			alert("Please Insert Adress During Leave");
			$('#adl').focus();
			return false;
		}
		
		if($('#date_time_from').val().trim() == "")
		{
			alert("Please Insert Date Time From");
			$('#date_time_from').focus();
			return false;
		}

		if($('#date_time_to').val().trim() == "")
		{
			alert("Please Insert Date Time To");
			$('#date_time_to').focus();
			return false;
		}		

		else if($('#half_full_day').val().trim() == "select")
		{
			alert("Please Select Full/Half Day Type.");
			$('#half_full_day').focus();
			return false;
		}			
		else if($('#no_of_days').val().trim() == "")
		{
			alert("Please Insert No of Days.");
			$('#no_of_days').focus();
			return false;
		}	
		else if($('#leave_types').val().trim() == "select")
		{
			alert("Please Select Leave Types");
			$('#leave_types').focus();
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
