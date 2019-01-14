
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">

		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Create New Company</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
					<tr>
                       <th align="center">Company ID</th>
                       <td width="30%">                   
						<input type="text" id="company_id" name="company_id" class="form-control custom-input" required>
					   </td>                 
					   <th align="center">Short Name</th>
                       <td width="30%">                   
						<input type="text" id="short_name" name="short_name" class="form-control custom-input" required>
					   </td>
                    </tr>  			
					<tr>
                      
					   <th align="center">Full Name</th>
                       <td align="center">
						<input type="text" id="full_name" name="full_name" class="form-control custom-input" required>
					   </td>			
					   <th align="center">Address</th>
                       <td align="center">
						<input type="text" id="address" name="address" class="form-control custom-input" required>
					   </td>						 

                    </tr>  					


			</div>

					<tr>
                        <th></th> <th></th> <th></th>
                       <td font-size="24"><input type=""id="btn_add_company" class="btn btn-success" value="Add New Company"/></td>                      
					  
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
		$("#btn_add_company").click(function(){
			if(form_validation())
			{
				//alert("validation true");
				
				var company_id		 = $('#company_id').val().trim();
				var short_name		 = $('#short_name').val().trim();
				var full_name		 = $('#full_name').val().trim();
				var address		 = $('#address').val().trim();

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url()?>Company/save_new_company',
					data:{ 
							company_id: company_id,
							short_name: short_name,
							full_name: full_name,
							address: address
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						//window.location.reload(true);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				//alert("Dhat");
			
			}
			

		
	
	});
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#company_id').val().trim() == "")
		{
			alert("Please Insert Company ID");
			$('#company_id').focus();
			return false;
		}			
		else if($('#short_name').val().trim() == "")
		{
			alert("Please Company Short Name");
			$('#short_name').focus();
			return false;
		}		
		else if($('#full_name').val().trim() == "")
		{
			alert("Please Insert Company Short Name");
			$('#full_name').focus();
			return false;
		}			
		else if($('#address').val().trim() == "")
		{
			alert("Please Insert Address");
			$('#address').focus();
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
