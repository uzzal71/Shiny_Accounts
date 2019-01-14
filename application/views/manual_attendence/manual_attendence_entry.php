<link rel="stylesheet" href="<?php echo base_url();?>css/wickedpicker.min.css">
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Manual Attendance Enrty form</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
					<tr>
					    <th align="center" colspan="">Employee ID</th>
                        <td align="center"style="" colspan="">                           
                            <select name="employee_id" class="form-control col-sm-3 custom-input" id="employee_id">

                            <?php if ($user_type=="Operator") { ?>
                            	<option value="<?php echo $this->session->userdata('user_id'); ?>" ><?php echo $this->session->userdata('user_id'); ?></option>
                          <?php   } else{ ?>


							<option value="select" >select</option>
								<?php foreach($all_employee as $each_employee){?>
									<option value="<?php echo $each_employee->employee_id?>">
										<?php echo $each_employee->employee_id?>
									</option>
							
							<?php }}?>
                            </select>
					   </td>  



					   <th align="center">Date</th>
                       <td align="center" width="30%">
							<input type="text"class="form-control  custom-input dateFrom" id="date" name="date">
					  </td>	    					   
					  
                    </tr>  				
					<tr>
                       <th align="center">In Time</th>
                       <td colspan="">
							<input type="text"class="form-control  custom-input" id="in_time" name="in_time" required >
					   </td>  
					   <th align="center">Out Time</th>
                       <td align="center"style="width:30%">
					   		<input type="text"class="form-control  custom-input"  id="out_time" name="out_time" required >
						</td>    					   
					  
                    </tr>  				
					<tr>
                       <th align="center">Under Consideration</th>
                       <td colspan="">
                            <select name="under_consideration" class="form-control col-sm-3 custom-input" id="under_consideration">
							<option value="select" >select</option>
								<?php foreach($all_employee as $each_employee){?>
									<option value="<?php echo $each_employee->employee_id?>">
										<?php echo $each_employee->first_name." ".$each_employee->last_name?>
									</option>
							
							<?php }?>
                            </select>
						</td>
					   <th align="center">Remarks</th>
                       <td align="center"style="width:30%">
					   		<input type="text" id="remarks" name="remarks" class="form-control custom-input" required>
						</td>    					   
					  
                    </tr>  
                   
					<tr>
                       
                       <td><button type="" id="btn_attendence" class="btn btn-info pull-right">Insert Attendence</button></td>                        
					  
                    </tr>					
           

					</tbody>
					
					</table>

            </div>
           
        </div>
      
    </div>
    </div>
		
<script type="text/javascript">
	$(document).ready(function() {


		$("#btn_attendence").click(function(){
			//alert("Button clicked");
			if(form_validation())
			{
				//alert("validation true");

				var employee_id		 = $('#employee_id').val().trim();
				var date		 = $('#date').val().trim();				
				var in_time		 = $('#in_time').val().trim();				
				var out_time			 = $('#out_time').val().trim();
				var under_consideration	 = $('#under_consideration').val().trim();
				var remarks	 = $('#remarks').val().trim();
				
				
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>manual_attendence/add_manual_attendence',
					data:{ 
							employee_id: employee_id, 
							date: date, 
							in_time: in_time, 
							out_time: out_time,
							under_consideration: under_consideration, 
							remarks: remarks
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						//console.log(response);

						document.location.reload(true);
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
			$('#in_time').timepicker({ dateFormat:'hh-mm-ss' });
			$('#out_time').timepicker({ dateFormat:'hh-mm-ss' });




		});

		// 		   $('#in_time').timepicki({
		// show_meridian:false,
		// min_hour_value:0,
		// max_hour_value:23,
		// step_size_minutes:1,
		// overflow_minutes:true,
		// increase_direction:'up',
		// disable_keyboard_mobile: false});

		//  $('#out_time').timepicki({
		// show_meridian:false,
		// min_hour_value:0,
		// max_hour_value:23,
		// step_size_minutes:1,
		// overflow_minutes:true,
		// increase_direction:'up',
		// disable_keyboard_mobile: false});



	
	function form_validation()
	{
	
		if($('#employee_id').val().trim() == "select")
		{
			alert("Please Select Employee ID");
			$('#employee_id').focus();
			return false;
		}	
		else if($('#date').val().trim() == "")
		{
			alert("Please Insert Date");
			$('#date').focus();
			return false;
		}		
		else if(($('#in_time').val().trim() == "") && $('#out_time').val().trim() == "")
		{
			alert("Please Insert In or Out Time");
			$('#in_time').focus();
			return false;
		}
		else if($('#under_consideration').val().trim() == "select")
		{
			alert("Please select Under Consiretation");
			$('#under_consideration').focus();
			return false;
		}
		else if($('#remarks').val().trim() == "")
		{
			alert("Please insert Remarks");
			$('#remarks').focus();
			return false;
		}
		
				
		return true;
	}


</script>
	
	
	