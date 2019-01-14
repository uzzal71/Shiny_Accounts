<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Add Expense Type</div>
              
               
                    <div class="col-xs-12 col-sm-12">
				 
			<table >


			<tr>
			<td> <label for="expense_type" style="margin-top: 4px">Expense Type</label></td>
			<td> <br>: <br> &nbsp;</td>
			<td style="width:65%"> <input type="text" id="expense_type" name="expense_type" class="form-control custom-input" required></td>
			
			</tr>		

			
			
				<tr>
			<td>
			 <div class="col-md-4" style="float: right;width: 4%;margin-top: 22px;margin-right: 50px">
                            <button type="submit"id="expense_type_btn" class="btn btn-info pull-right">Create</button>
                        </div></td>

			 
			<td> </td>
			<td></td>
			</tr>
			
			
			   
			</table>
			</form>

                    </div>

                    <!-- ........................................... -->

                    <div class="form-horizontal">
                        <div class="form-group">

                        </div>
                    </div>
                
            </div>
        </div>
    </div>
	
		
<script type="text/javascript">
	$(document).ready(function() {
		$("#expense_type_btn").click(function(){
			//alert($('#offer_code').val().trim());
			if(form_validation())
			{
				//alert("validation true");
				
				var expense_type		 = $('#expense_type').val().trim();
				
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Expense/save_expense_types',
					data:{ 
							expense_type: expense_type
							
						},
					//timeout: 4000,
					success: function(result) {
						
						response = result;
						
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				alert(response);
				// location.reload();
			
			}
		});
	});
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#expense_type').val().trim() == "")
		{
			alert("Please insert Expense Type");
			$('#expense_type').focus();
			return false;
		}
				
		return true;
	}
</script>

	
	
	
	
	