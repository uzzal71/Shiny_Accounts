
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">

		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading" align = "center">Edit Leave Form</div>
            <div class="table-responsive" id="custom-table">
                <table id="" class="table ">
                    <tbody>
                    		<tr>
                    	 <th align="center">Leave Number</th>
                       <td width="30%">                   
					   <input type="text" id="leave_no" name="leave_no" class="form-control custom-input leave_no" value="<?php echo $each_applied_leave->leave_no; ?>" readonly>	
					    <th align="center">Adress During Leave</th>
                       <td align="center">
						<input type="text" id="adl" name="adl" value="<?php echo $each_applied_leave->adl; ?>"  class="form-control custom-input adl">
					   </td>


                    	</tr>

					<tr>
                       <th align="center">From</th>
                       <td width="30%">                   
					   <input type="text" id="date_time_from" value="<?php echo $each_applied_leave->date_time_from?>" name="date_time_from" class="form-control custom-input dateTimeFrom" required>
					   </td width="30%">  
					   <th align="center">To</th>
                       <td align="center">
						<input type="text" id="date_time_to" value="<?php echo $each_applied_leave->date_time_to?>" name="date_time_to" class="form-control custom-input dateTimeFrom">
					   </td>					   
					  
                    </tr>  			
					<tr>
                      
					   <th align="center">Full/Half Day </th>
                       <td align="center">
						<select name="half_full_day" value="<?php echo $each_applied_leave->half_full_day?>" class="form-control col-sm-6 custom-input" id="half_full_day">
							<option value="">select</option>
							<option <?php if( $each_applied_leave->half_full_day == "full_day"){echo 'selected = "selected"';}?> value="full_day">Full Day</option>
							<option <?php if( $each_applied_leave->half_full_day == "first_half"){echo 'selected = "selected"';}?> value="first_half">First Half</option>
							<option <?php if( $each_applied_leave->half_full_day == "second_half"){echo 'selected = "selected"';}?> value="second_half">Second Half</option>
							</option>
                       </select>
					   </td>	
					    <th align="center">No.of Days</th>
                        <td width="30%">                   
					    <input type="text" id="no_of_days" value="<?php echo $each_applied_leave->no_of_days?>" name="no_of_days" class="form-control custom-input" readonly required>
					    </td width="30%"> 					   
					  
                    </tr>  
                    <tr>

                       <th align="center">Leave types</th>
                       <td >
					  <select name="leave_types"value="<?php echo $each_applied_leave->leave_types?>" class="form-control col-sm-6 custom-input" id="leave_types">
					  <option value="">select</option>
								<?php foreach($all_leave_types as $each_leave_type){?>
                                <option  <?php if( $each_applied_leave->leave_types == $each_leave_type->leave_short_name){echo 'selected = "selected"';}?> value="<?php echo $each_leave_type->leave_short_name?>" >
								<?php echo $each_leave_type->leave_full_name?></option>
								
								<?php }?>
                               
                              
                       </select>
					   </td>   

 
                       <th align="center">Remarks</th>
					   <td colspan="3"> <input type="text" id="remarks"value="<?php echo $each_applied_leave->remarks?>" name="remarks" class="form-control custom-input " required>					   
					   
                    </tr>           

					<tr>
					   <td colspan=""> <input type="hidden" id="id" value="<?php echo $each_applied_leave->id?>" name="id" class="form-control custom-input " required>
					   </td> 
                    </tr> 		
					
					<tr>
                        <th></th> <th></th> <th></th>
                       <td> <button id="btn_update_apply_leave" class="btn btn-info">Update Applied Leave</button> </td>                      
					  
                    </tr>					
           

					</tbody>
					
					</table>
					</form>
            </div>
           
        </div>
      
    </div>
    </div>
	
		
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_update_apply_leave").click(function(){
			//alert("Clicked");
				
			if(form_validation())
			{
				//alert("validation true");
				
				var id = $('#id').val().trim();
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
					url: '<?php echo base_url();?>Leave/update_apply_leave',
					data:{ 
							id: id,
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
						window.location.replace("<?php echo base_url();?>Leave/apply_leave_list");
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
						$('#no_of_days').val(.5);
						}
					else if($('#half_full_day').val()=='second_half'){
						var date_time_from = $('#date_time_from').val().trim();
						$('#date_time_to').val(date_time_from);
						$('#no_of_days').val(.5);
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
		//alert("validation");
		
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
