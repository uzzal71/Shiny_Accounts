
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">View Bank Cheques</div>
            <div class="table-responsive" id="custom-table">
			 <form name="show_report" action="<?php echo base_url();?>Account_information/show_cheques" target="_blank" method="post">
                <table id="" class="table ">
                    <tbody>
					
					<tr>
                                 
					   <th align="center">Bank Name</th>
						<td width="30%"><select name="bank_name" class="form-control  custom-input" id="bank_name">
								<option value="">select</option>
									<?php foreach($bank_name as $bank){?>
										 <option value="<?php echo $bank->bank_name?>"><?php echo $bank->bank_name?></option>
									<?php }?>
										</select>
						</td>  
			

                 
                                              
					   <th align="center">Account Number</th> 
					    <td align="center" width="30%">
					    	<select name="account_name" id="account_name" class="form-control  custom-input" >
				

					    	</select>

					    </td>
					 
							

                    </tr> 		
					
						
					<tr>
                       <td></td>
                             <td></td>
                                  <td></td>
                         

                       <td><button type="submit" id="" class="btn btn-info pull-right">View Details</button></td>   
								   
					  
                    </tr>	
					</tbody>
					</form>
					</table>

            </div>
           
        </div>
      
    </div>
    </div>
<!-- Page Content -->

		
<script type="text/javascript">
	$(document).ready(function() {




		$("#bank_name").change(function(){
					
			var bank_name = $('#bank_name').val().trim();


			//alert(bank_name)
			
			var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Expense/pick_account_no',
					data:{ 
							bank_name: bank_name
						},
					
					success: function(result) {
						response = result;
						

						$('#account_name').html(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});
		
		
			
			//if($('#chk_to_date').checked == true)
				
$("#chk_to_date").change(function(){
if(document.getElementById('chk_to_date').checked) {
	//alert("checked");
	$('#to_date').attr('type', 'text');
	$('#chk_to_date').attr('value', 1);
} else {
   $('#chk_to_date').attr('value', 0);
}
	});


			
		    $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
			$('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
			$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
			
		
		

	});
	
	
</script>
	
	