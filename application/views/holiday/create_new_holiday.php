<br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">

		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Create New Holiday</div>
            <div class="table-responsive" id="custom-table">
			<form id="myForm">
                <table id="" class="table ">
                    <tbody>
					<tr>
                       <th align="center">From Date</th>
                       <td width="30%">                   
						<input type="text" id="from_date" name="from_date" class="form-control custom-input dateFrom" required>
					   </td>                                     
					   <th align="center">To Date</th>
                       <td width="30%">                   
						<input type="text" id="to_date" name="to_date" class="form-control custom-input dateFrom" required>
					   </td>
					</tr>				

					<tr>

					   <th align="center">Type</th>
                       <td align="center">
							<select name="type" class="form-control col-sm-6 custom-input" id="type">
                                <option value="select" >Select</option>
                                <option value="Weekend" >Weekend</option>
                                <option value="Government Holiday" >Govt. Holiday</option>
                                <option value="Special or Company Holiday" >Special or Company Holiday</option>
                              
                            </select>
					   </td>

					   <th align="center">Day</th>
                       <td align="center">
							<select name="day" class="form-control col-sm-6 custom-input" id="day">
                                <option value="" >Select</option>
                                <option value="Friday" >Friday</option>
                                <option value="Saturday" >Saturday</option>
                                <option value="Sunday" >Sunday</option>
                                <option value="Monday" >Monday</option>
                                <option value="Tuesday" >Tuesday</option>
                                <option value="Wednesday" >Wednesday</option>
                                <option value="Thursday" >Thursday</option>
                              
                            </select>
					   </td>	
					   
                    </tr>  	
					<tr>

						<th align="center">Description</th>
                       <td width="30%">                   
						<input type="text" id="description" name="description" class="form-control custom-input" required>
					   </td>
                    </tr>  					
					<tr>
                        
                    <td><button id="btn_add_holiday" class="btn btn-info">Add Holiday</button>   </td>     <th></th> <th></th> <th></th>                 
					  
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
		$("#day").prop('disabled', true);
		$("#btn_add_holiday").click(function(){

			//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				var from_date		 = $('#from_date').val().trim();
				var to_date		 = $('#to_date').val().trim();
				var day		 = $('#day').val().trim();
				var description		 = $('#description').val().trim();
				var type		 = $('#type').val().trim();
			

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url()?>Holiday/save_holiday',
					data:{ 
							from_date: from_date, 
							to_date: to_date, 
							day: day, 
							description: description, 
							type: type, 
							
						
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
	

	$("#type").change(function(){
		if(this.value == "Weekend")
		$("#day").prop('disabled', false);
		else{
			$("#day").prop('disabled', true);
			$("#day").val('');

		}

	});


	function form_validation()
	{
		//alert("validation");
		
		if($('#from_date').val().trim() == "")
		{
			alert("Please Insert Date From");
			$('#from_date').focus();
			return false;
		}
				
		else if($('#type').val().trim() == "select")
		{
			alert("Please Select Holiday Type");
			$('#type').focus();
			return false;
		}	
		else if(($('#to_date').val().trim() != "") && (($('#to_date').val() < $('#from_date').val()) ))
		{
			alert("To Date Must Be Greater Than From Date");
			$('#type').focus();
			return false;
		}
		
				
				
		return true;
	}
	
		//  ======  ######  For Selecting Date Time and DateTime  ######  ======

        $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
        $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
		$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });


        $('.dateFrom').daterangepicker({
        
       singleDatePicker: true,
        showDropdowns: true,
        
        locale: {
           format: 'YYYY-MM-DD'
        }
    });



		});
</script>



	
	
	
	
	