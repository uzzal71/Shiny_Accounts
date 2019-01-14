<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-8 col-md-offset-3">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Update Cheque Book Information</div>
              
               
                    <div class="col-xs-12 col-sm-12">

					

                <table id="" class="table ">
                    <tbody>
					<tr><td></td>
					   <th align="center">Account No</th>
                       <td align="center">
						<select name="account_no" class="form-control col-sm-8 custom-input" id="account_no">
							<option  value="select">Select</option>
									<?php foreach($view_account as $each_account){?>
                                <option <?php if($each_account->account_no == $each_cheque_book->account_no){echo 'selected = "selected"';} ?> value="<?php echo $each_account->account_no?>" ><?php echo $each_account->account_no?></option>
                             
							<?php }?>
								</select></td>
			 			
					<tr>

					<tr>
                       <th align="center">Starting Cheque No</th>
                       <td align="center">
                       <input type="text" value="<?php echo $each_cheque_book->cheque_starting_no?>" id="cheque_starting_no" name="cheque_starting_no" class="form-control custom-input ">
					   </td>  
					   <th align="center">End Cheque No</th>
                       <td align="center">
						<input type="text" id="cheque_end_no" name="cheque_end_no" value="<?php echo $each_cheque_book->cheque_end_no?>" class="form-control custom-input ">
					   </td>					   
					  
                    </tr>  

                   
					
					<tr>
                                               <td align="center">
						<input type="hidden" id="id" name="id" value="<?php echo $each_cheque_book->id?>" class="form-control custom-input ">
					   </td>

                       <td font-size="24"><input type="button" id="update_cheque_book" class="btn btn-success" value="Update Cheque Book"/></td>                      
					  
                    </tr>					
           	<tr>
			
			</tr>

					</tbody>
					
					</table>
					</form>
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

		$("#update_cheque_book").click(function(){
								
				//alert("Button Clicked");
			if(form_validation())
			{
				//alert("validation true");
				var id = $('#id').val().trim();
				var account_no = $('#account_no').val().trim();
				var cheque_starting_no = $('#cheque_starting_no').val().trim();
				var cheque_end_no = $('#cheque_end_no').val().trim();


				
				//alert("variable assigned");
				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Cheque_book/update_cheque_book',
					data:{ 
							id: id,
							account_no: account_no,
							cheque_starting_no: cheque_starting_no,
							cheque_end_no: cheque_end_no
						
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
		
		if($('#account_no').val().trim() == "Select")
		{
			alert("Please Select An Account No");
			$('#account_no').focus();
			return false;
		}
		else if($('#cheque_starting_no').val().trim() == "")
		{
			alert("Please Insert Cheque Starting  No");
			$('#cheque_starting_no').focus();
			return false;
		}
		else if($('#cheque_end_no').val().trim() == "")
		{
			alert("Please Insert Cheque Ending No");
			$('#cheque_end_no').focus();
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
