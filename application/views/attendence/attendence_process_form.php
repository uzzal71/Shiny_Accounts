<style type="text/css">
	
	.modal {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('http://i.stack.imgur.com/FhHRx.gif') 
                50% 50% 
                no-repeat;
}

/* When the body has the loading class, we turn
   the scrollbar off with overflow:hidden */
body.loading .modal {
    overflow: hidden;   
}

/* Anytime the body has the loading class, our
   modal element will be visible */
body.loading .modal {
    display: block;
}
</style>
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;">
			<div class="panel-heading">Attendance Process Form</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>

			
					<tr>           

					<tr>
                       <th align="center">Company ID</th>
                       <td align="center" style="width:30%"><input type="text" name="company_id" value="<?php echo $this->session->userdata('company_id');?>" id="company_id" class="form-control custom-input" readonly required></td>                        
					   <th align="center">Company Name</th>
					   <td align="center" style="width:30%"><input type="text" name="company_name" value="<?php echo $company_info->full_name?>" id="company_name" class="form-control custom-input" readonly required></td>  
                    </tr> 			
					<tr>
                       <th align="center">Date From</th>
                       <td align="center" style="width:30%"><input type="text" name="date_from" value="" id="date_from" class="form-control custom-input dateFrom" required></td>                        
					   <th align="center">Date To</th>
					   <td align="center" style="width:30%"><input type="text" name="date_to" value="" id="date_to" class="form-control custom-input dateFrom" required></td>  
					</tr> 		
	
					<tr>
                    
				                     
					   <!-- <th align="center">Employee IDs</th>
					   <td align="center"style="width:30%">
							<select required name="employee_ids" class="form-control col-sm-6 custom-input" id="employee_ids">
								<option value="">Select</option>
								<?php foreach($all_employee as $each_employee){?>
								<option value="<?php echo $each_employee->employee_id?>"><?php echo $each_employee->employee_id?></option>
								<?php }?>
							</select>
					   </td>  --> 


                    </tr> 		
	
						
					<tr>
						<td></td>
                       <td></td>
                       <td></td>
                       <td><button type="submit" href="#myModal" id="btn_process_attendence" class="btn btn-info pull-right hellomodal" >Process Attendence</button></td>                        
					  
                    </tr>					
           

					</tbody>
					
					</table>

            </div>
           
        </div>
      
    </div>
    </div>

  <div class="modal fade" id="myModal" role="dialog">
   <h3 style="margin-left: 420px;margin-top: 350px;">Please Wait For A While! Processing Takes Time!</h3>
  </div>
<script type="text/javascript">
	$(document).ready(function() {





		$("#btn_process_attendence").click(function(){
			
			//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				$("#myModal").modal('show');
				 var company_id = $('#company_id').val().trim();
				var company_name = $('#company_name').val().trim();
				var date_from = $('#date_from').val().trim();
				var date_to = $('#date_to').val().trim();

				  



				var response;
				$.ajax({
					async: true,
					type: 'POST',
					url: '<?php echo base_url();?>Attendence/process_attendence',
					data:{ 
							company_id: company_id,
							company_name: company_name,
							date_from: date_from,
							date_to: date_to
						
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
					$("#myModal").modal('hide');
						console.log(response)
						//alert(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				
				//alert(response);
			
			}

		});



		

			
			$("#all_employee").change(function(){
				if(document.getElementById('all_employee').checked) {
					//alert("checked");
					$( "#employee_ids" ).val("");
					$( "#employee_ids" ).prop( "disabled", true );
				} 					
				else{
					//alert("Unchecked");
					$( "#employee_ids" ).prop( "disabled", false );
					if($('#employee_ids').val().trim() == "")
						{
							alert("Please Select Employee ID");
							$('#employee_ids').focus();
							return false;
						}
				}
			});
		
	});
	
	function form_validation()
	{
		
		//alert("validation");
		
		if($('#date_from').val().trim() == "")
		{
			alert("Please Insert Date From ");
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


	    
 
	
	
	   $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
       $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
	   $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
</script>

	
