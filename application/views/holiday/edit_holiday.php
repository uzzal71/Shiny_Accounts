
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">

		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Edit Holiday</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
					<tr>
                       <th align="center">From Date</th>
                       <td width="30%">                   
						<input type="text" id="from_date" value = "<?php echo $each_holiday->from_date?>" name="from_date" class="form-control custom-input dateFrom" required>
					   </td>                                     
					   <th align="center">To Date</th>
                       <td width="30%">                   
						<input type="text" id="to_date"value = "<?php echo $each_holiday->to_date?>" name="to_date" class="form-control custom-input dateFrom" required>
					   </td>
					</tr>
					<tr>
					   <th align="center">Description</th>
                       <td width="30%">                   
						<input type="text" id="description" value = "<?php echo $each_holiday->description?>" name="description" class="form-control custom-input" required>
					   </td>
					   <th align="center">Type</th>
                       <td align="center">
							<select name="type" class="form-control col-sm-6 custom-input" id="type">
                                <option  value="select" >Select</option>
                                <option <?php if($each_holiday->type == 'Weekend'){echo 'selected = "selected"';}?> value="Weekend" >Weekend</option>
                                <option <?php if($each_holiday->type == 'Government Holiday'){echo 'selected = "selected"';}?> value="Government Holiday" >Govt. Holiday</option>
                                <option <?php if($each_holiday->type == 'Special or Company Holiday'){echo 'selected = "selected"';}?> value="Special or Company Holiday" >Special or Company Holiday</option>
                              
                            </select>
					   </td>	
                    </tr>  					


		

					<tr>
                     
                    <td><button id="btn_update_holiday" class="btn btn-info">Update Holiday</button> 
					<td><input type="hidden" id="id" value = "<?php echo $each_holiday->id?>" name="id" class="form-control custom-input" required></td></td>     
	 <th></th> <th></th>                 
					  
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
		$("#btn_update_holiday").click(function(){
			//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				
				var id		 = $('#id').val().trim();
				var from_date		 = $('#from_date').val().trim();
				var to_date		 = $('#to_date').val().trim();
				var description		 = $('#description').val().trim();
				var type		 = $('#type').val().trim();
			

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url()?>Holiday/update_holiday',
					data:{ 
							id: id, 
							from_date: from_date, 
							to_date: to_date, 
							description: description, 
							type: type, 
							
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						window.location.replace("<?php echo base_url();?>Holiday/holiday_list");
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
		
		if($('#from_date').val().trim() == "")
		{
			alert("Please insert Date");
			$('#date').focus();
			return false;
		}		
		else if($('#description').val().trim() == "")
		{
			alert("Please insert Description");
			$('#description').focus();
			return false;
		}
				
		else if($('#type').val().trim() == "select")
		{
			alert("Please Select Holiday Type");
			$('#type').focus();
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



	
	
	
	
	