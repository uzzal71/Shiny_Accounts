
    <br><br>
    <div class="row">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			<h3 align="center" style = "background-color: lightblue;"> Promotion List</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Employee ID</th>
                        <th align="center">Employee Name</th>
                        <th align="center">Designation</th>
                        <th align="center">Promoted Designation</th>
                        <th align="center">Effective From Date</th>
                        <th align="center">Recorded By</th>
                        <th align="center">Recording Time</th>
						<th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
							<?php 
							$id=1;
							foreach($all_promotion as $each_promotion){?>
                            <tr>
							
                                <td><?php echo $id?></td>
                                <td><?php echo $each_promotion->employee_id?></td>
                                <td><?php echo $each_promotion->employee_name?></td>
                                <td><?php echo $each_promotion->designation?></td>
                                <td><?php echo $each_promotion->promoted_designation?></td>
                                <td><?php echo $each_promotion->effective_from_date?></td>
                                <td><?php echo $each_promotion->recorded_by?></td>
                                <td><?php echo $each_promotion->recording_time?></td>
                               
                                
                               <td width="130px">
									<a href="<?php echo base_url();?>promotion/edit_promotion/<?php echo $each_promotion->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
                                    <a href="<?php echo base_url();?>promotion/delete_promotion/<?php echo $each_promotion->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This User" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                </td>
								
							
                            </tr>
							
							<?php $id++;}?>


                           
								<?php if($all_promotion==null){?>
                          
                                <tr>
                                    <td colspan="5" align="center">
                                        No Data Available
                                    </td>
                                </tr>
								
								<?php }?>
                         
                            </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
		
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn_update_promotion").click(function(){
								
				//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				
				var id = $('#id').val().trim();
				var employee_id = $('#employee_id').val().trim();
				var employee_name = $('#employee_name').val().trim();
				var designation = $('#designation').val().trim();
				var promoted_designation = $('#promoted_designation').val().trim();
				var salary = $('#salary').val().trim();
				var incremented_salary = $('#incremented_salary').val().trim();
				var effective_from_date = $('#effective_from_date').val().trim();

				
				//alert("variable assigned");
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>promotion/update_promotion',
					data:{ 
							id: id,
							employee_id: employee_id,
							employee_name: employee_name,
							designation: designation,
							promoted_designation: promoted_designation,
							salary: salary,
							incremented_salary: incremented_salary,
							effective_from_date: effective_from_date
						
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
		
		if($('#promoted_designation').val().trim() == "")
		{
			alert("Please Insert Promoted designation");
			$('#promoted_designation').focus();
			return false;
		}		
		else if($('#incremented_salary').val().trim() == "")
		{
			alert("Please Insert Incremented Salary");
			$('#incremented_salary').focus();
			return false;
		}		

		else if($('#effective_from_date').val().trim() == "")
		{
			alert("Please Insert Effective from Date.");
			$('#effective_from_date').focus();
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

