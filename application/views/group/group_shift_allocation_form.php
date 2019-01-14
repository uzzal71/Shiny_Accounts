
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">

		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Create Group Shift Allocation</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
					<tr>
                       <th align="center">Group</th>
                       <td width="30%">                   
                        <select required name="group_id" class="form-control col-sm-6 custom-input" id="group_id">
							<option value="select">select</option>
                            <?php foreach($all_group as $each_group){?>
							<option value="<?php echo $each_group->id?>"><?php echo $each_group->group_name?></option>
							
							<?php }?>
                        </select>
					   </td width="30%">
					   <th align="center">From Date</th>
                       <td align="center">
							<input type="text"  class="form-control custom-input dateFrom" id="from_date" name="from_date">
					   </td>					   
					  
                    </tr>  			
					<tr>
					   <th align="center">To Date</th>
                       <td align="center">
						<input type="text"  class="form-control custom-input dateFrom" id="to_date" name="to_date">
					   </td>						 
					   <th align="center">Working Day</th>
                       <td align="center">
						<input type="text"  class="form-control custom-input" id="working_day" name="working_day">
					   </td>	
                    </tr>  					
 						
					<tr>
					   <th align="center">Gap</th>
                       <td align="center">
						<input type="text"  class="form-control custom-input" id="gap" name="gap">
					   </td>						 

					   <th align="center">Starting Shift</th>
                       <td align="center">
                        <select required name="starting_shift" class="form-control col-sm-6 custom-input" id="starting_shift">
							<option value="select">select</option>
                            <?php foreach($all_shift as $each_shift){?>
							<option value="<?php echo $each_shift->id?>"><?php echo $each_shift->shift_name?></option>
							
							<?php }?>
                        </select>
					   </td>						 
	
                    </tr>  	
					<tr>
                       <td  style="text-align:left" colspan="2">
							<label>Other Shift: </label> <br>
							<?php foreach($all_shift as $each_shift){?>
							<label><input type="checkbox" name="other_shift[]" id="<?php echo $each_shift->id;?>" class="shift_check_box_class" value="<?php echo $each_shift->id;?>"> <?php echo $each_shift->shift_name;?></label>
							<br> 
							<?php }?>
                           
					   </td>	   					
	

</div>

					<tr>
                        <th></th> <th></th> <th></th>
                       <td font-size="24"><input type=""id="btn_group_shift" class="btn btn-success" value="Submit"/></td>                      
					  
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
		$("#btn_group_shift").click(function(){
								
				//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				
				var group_id = $('#group_id').val().trim();
				var from_date = $('#from_date').val().trim();
				var to_date = $('#to_date').val().trim();
				var working_day = $('#working_day').val().trim();
				var gap = $('#gap').val().trim();
				var starting_shift = $('#starting_shift').val().trim();
				
				var other_shift = [];
				$(".shift_check_box_class:checked").each(function() {
					if($(this).is(":checked")){
						other_shift.push($(this).val());
					}
				});
				other_shift = other_shift.toString();	
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Group/save_group_shift_allocation',
					data:{ 
							group_id: group_id,
							from_date: from_date,
							to_date: to_date,
							working_day: working_day,
							gap: gap,
							starting_shift: starting_shift,
							other_shift: other_shift
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
		
		if($('#group_id').val().trim() == "select")
		{
			alert("Please Select Group Name");
			$('#group_id').focus();
			return false;
		}		

		else if($('#from_date').val().trim() == "")
		{
			alert("Please Insert From Date.");
			$('#from_date').focus();
			return false;
		}			
		else if($('#to_date').val().trim() == "")
		{
			alert("Please Insert To date");
			$('#to_date').focus();
			return false;
		}			
				
		else if($('#working_day').val().trim() == "")
		{
			alert("Please Insert Working Day");
			$('#working_day').focus();
			return false;
		}			
		else if($('#gap').val().trim() == "")
		{
			alert("Please Insert Gap");
			$('#gap').focus();
			return false;
		}			
				
		else if($('#starting_shift').val().trim() == "select")
		{
			alert("Please Select Starting Shift Name");
			$('#starting_shift').focus();
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

