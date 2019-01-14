
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h3 style="color: green; text-align:center" >  
				<?php
                     $msg=$this->session->userdata('message');
                     if($msg)
                     {
                        echo $msg."<br> <br>";
						 $this->session->unset_userdata('message');
					 }
                 ?>
                                     </h3>
	
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">

			<div class="panel-heading" align = "center" >Add Increment</div>
            <div class="table-responsive" id="custom-table">
			<form name="promotion_table" action="<?php echo base_url();?>Increment/save_increment"  method="post">
                <table id="" class="table">
                    <thead>
                    <tr>
                       <td></td>
                       <th align="center">Employee ID</th>
                       <td width="30%">                   
                        <select required name="employee_id" class="form-control col-sm-6 custom-input" id="employee_id">
							<option value="select">select</option>
                            <?php foreach($all_employee as $each_employee){?>
							<option value="<?php echo $each_employee->employee_id?>"><?php echo $each_employee->employee_id?></option>
							
							<?php }?>
                        </select>
					   </td>
					   <tr>
		<th> Employee Name :</th>
		<td colspan="3"><input type="text" name="employee_name" id = "employee_name"class="form-control custom-input" readonly></td>
		
		</tr>
		
		<tr>
		<th> Salary:</th>
		<td> <input type="text" name="basic_salary"  id = "basic_salary"class="form-control custom-input" readonly></td>
		
		<th>Incremented Salary:</th>
		<td> <input type="text" name="incremented_salary"  id = "incremented_salary"class="form-control custom-input"></td>
	
		</tr>
		<tr>
		<th> Effective From :</th>
		 <td align="center" ><input type="date" name="effective_from_date" id="effective_from_date" class ="form-control custom-input dateFrom" required></td>
		 <td align="center" colspan="2"><button type="submit" value="" class="btn btn-primary" id="button">Save Increment</button></td>
		</tr>
						
                    </tr>
					<thead>
					
					</table>
					
					<table id="table_id" class="table">
					<tbody>
				
					</tbody>
				</table>
				</form>
			
            </div>
           
        </div>
        <div class="col-md-1"></div>
    </div>
	
	
<script type="text/javascript">
	$(document).ready(function() {
		$("#employee_id").change(function(){
			if(form_validation())
			{
				
				var employee_id		 = $('#employee_id').val().trim();

			

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url()?>Increment/employee_id_search',
					data:{ 
							employee_id: employee_id
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						var employee_info = response.split('#');
						var employee_name = employee_info[0];
						var basic_salary = employee_info[1];
						var effective_from_date = employee_info[2];
						$('#employee_name').val(employee_name);
						$('#basic_salary').val(basic_salary);
						$('#effective_from_date').val(effective_from_date);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				//alert(response);
			
			}
			
				    //  ======  ######  For Selecting Date Time and DateTime  ######  ======

        $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
        $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
		$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
		});
		
	
	});
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#employee_id').val().trim() == "select")
		{
			alert("Please Select Employee ID");
			$('#employee_id').focus();
			return false;
		}
		
				
				
		return true;
	}
</script>


