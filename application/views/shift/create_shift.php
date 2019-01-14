
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Create New Shift</div>
            <div class="table-responsive" id="custom-table">
				<form id="myForm">
                <table id="" class="table ">
                    <tbody>
					<tr>
                       <th align="center">Shift Name</th>
                       <td  width="30%">                   
					   <input type="text" id="shift_name" name="shift_name"  class="form-control custom-input" required>

					   	<th align="center">Grace Minute</th>
                       <td align="center"style="width:30%">
					  <input type="text" id="grace" name="grace" class="form-control custom-input" required></td>

					  
					   				   
					  
                    </tr>  
                    <tr>

                    <th align="center">Shift Start Time</th>
                       <td align="center" width="30%">
					  <input type="time" id="shift_start" name="shift_start" class="form-control custom-input timeFrom" required>
					  </td>	
					    <th align="center">Shift End Time</th>
                       <td >                   
					  <input type="time" id="shift_end" name="shift_end"  class="form-control custom-input timeFrom" required>
					   </td> 					   
					 
                     
					   
                    </tr>  
			
					<tr>           

					<tr>
					  <th align="center">Shift Start From</th>
                       <td >                   
					  <input type="time" id="shift_start_from" name="shift_start_from"  class="form-control custom-input timeFrom" required>
					   </td> 
					   <th align="center">Shift End From</th>
                       <td >                   
					  <input type="time" id="shift_end_from" name="shift_end_from"  class="form-control custom-input timeFrom" required>
					   </td> 
                        
					
                       


                    </tr> 		
					<tr>
							 

                       <th align="center">Lunch Start Time</th>
                       <td>                   
					  <input type="text" id="lunch_start" name="lunch_start"   class="form-control custom-input timeFrom" required>
					   </td>  
					   
					   <th align="center">Lunch End Time</th>
                       <td align="center" width="30%"><input type="text" id="lunch_end" name="lunch_end"   class="form-control custom-input timeFrom" required></td>
                       </tr> 
					<tr>
                       <th align="center">First Half Margin Time</th>
                       <td align="center"style="width:30%" colspan=""><input type="text" id="first_half_margin" name="first_half_margin"   class="form-control custom-input timeFrom" required></td>


                       <th align="center">Second Half Margin Time</th>
                       <td align="center"style="width:30%" colspan=""><input type="text" id="second_half_margin" name="second_half_margin"   class="form-control custom-input timeFrom" required></td>
              				
					<tr>
                     
                    
                    </tr> 	
                    <tr>
                       <th align="center">Second Half Start</th>
                       <td align="center"style="width:30%" colspan=""><input type="text" id="second_half_start" name="second_half_start"   class="form-control custom-input timeFrom" required></td>

                        </td>  
					     <th align="center">Over Time Start From</th>
                       <td align="center"style="width:30%" colspan=""><input type="text" id="over_time_start" name="over_time_start"   class="form-control custom-input timeFrom" required></td>
                    
                    </tr> 		
					
				

					<tr>
                       
                       <td font-size="24"><input type='button' class="btn btn-success" id='btn_add_shift' value='Add Shift'/></td>                      
					  
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
		$("#btn_add_shift").click(function(){
			if(form_validation())
			{
				//alert("validation true");
				
				var shift_name = $('#shift_name').val().trim();
				var shift_start = $('#shift_start').val().trim();
				var second_half_start = $('#second_half_start').val().trim();
				var shift_end = $('#shift_end').val().trim();
				var shift_start_from = $('#shift_start_from').val().trim();
				var shift_end_from = $('#shift_end_from').val().trim();
				var grace = $('#grace').val().trim();
				var lunch_start = $('#lunch_start').val().trim();
				var lunch_end = $('#lunch_end').val().trim();
				var first_half_margin = $('#first_half_margin').val().trim();
				var second_half_margin = $('#second_half_margin').val().trim();
				var over_time_start = $('#over_time_start').val().trim();
				var  internal_division = 0;
				if ((first_half_margin=="" ||first_half_margin=="0" )&&(second_half_margin==""||second_half_margin=="0")&&(second_half_start=="" || second_half_start=="0")) {

					internal_division ='1';
				}else if ((first_half_margin!=="" ||first_half_margin!=="0" )&&(second_half_margin!==""||second_half_margin!=="0")&&(second_half_start=="" || second_half_start!=='0')) {

				 internal_division ='0'
				} else {

						Alert("Please Enter These Values Correclty or Leave These Empty ");
						event.preventDefault();
						return false;

				}



				//alert("variable assigned");

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>shift/save_new_shift',
					data:{ 
							shift_name: shift_name,
							shift_start: shift_start,
							second_half_start: second_half_start,
							shift_end: shift_end,
							shift_start_from: shift_start_from,
							shift_end_from: shift_end_from,
							grace: grace,
							lunch_start: lunch_start,
							lunch_end: lunch_end,
							first_half_margin: first_half_margin,
							second_half_margin: second_half_margin,
							internal_division:internal_division,
							over_time_start: over_time_start

						
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
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#shift_name').val().trim() == "")
		{
			alert("Please Insert Shift Name");
			$('#shift_name').focus();
			return false;
		}		
		else if($('#shift_start').val().trim() == "")
		{
			alert("Please Insert Shift Start Time");
			$('#shift_start').focus();
			return false;
		}	
		// else if($('#second_half_start').val().trim() == "")
		// {
		// 	alert("Please Insert Second Half Start Time");
		// 	$('#second_half_start').focus();
		// 	return false;
		// }		
		else if($('#shift_end').val().trim() == "")
		{
			alert("Please Insert Shift End Time");
			$('#shift_end').focus();
			return false;
		}		
		else if($('#shift_start_from').val().trim() == "")
		{
			alert("Please Insert Shift Start From Time");
			$('#shift_start_from').focus();
			return false;
		}	
		else if($('#shift_end_from').val().trim() == "")
		{
			alert("Please Insert Shift End From Time");
			$('#shift_end_from').focus();
			return false;
		}		
		else if($('#grace').val().trim() == "")
		{
			alert("Please Insert Grace Time");
			$('#grace').focus();
			return false;
		}			
		else if($('#lunch_start').val().trim() == "")
		{
			alert("Please Insert Lunch Start Time");
			$('#lunch_start').focus();
			return false;
		}			
		else if($('#lunch_end').val().trim() == "")
		{
			alert("Please Insert Lunch End Time");
			$('#lunch_end').focus();
			return false;
		}		
		// else if($('#first_half_margin').val().trim() == "")
		// {
		// 	alert("Please Insert Half Day Margin Time");
		// 	$('#half_day_margin').focus();
		// 	return false;
		// }
		// else if($('#second_half_margin').val().trim() == "")
		// {
		// 	alert("Please Insert Second Half Margin Time");
		// 	$('#half_day_margin').focus();
		// 	return false;
		// }			
		
		return true;
	}
	
		//  ======  ######  For Selecting Date Time and DateTime  ######  ======
        $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
        $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
		$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
		});

</script>
