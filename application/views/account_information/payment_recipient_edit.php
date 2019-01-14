<br></br>
    <div class="row" id="myDiv">
        <div class="col-md-7 col-md-offset-3">
        		                 
      	   <h3 style = "color:green" align="center"><?php  echo $this->session->userdata('message');
            $this->session->unset_userdata('message')?></h3> 
        
            <div class="panel panel-primary custom-panel">
          
                <div class="panel-heading">Payment Recipient Edit(Miscellaneous)</div>
              
               
                    <div class="col-xs-12 col-sm-12">
						 
			 <form class="form-inline" method="POST">
  <div class="form-group" style="min-height: 50px;">
  
    <label for="recipient_id" style="min-width: 110px;">Recipient ID:*</label>
    <input type="text" class="form-control" id="recipient_id" name="recipient_id" value="<?php echo $recipient_data->recipient_id; ?>" readonly>
  </div>
   <div class="form-group" style="min-height: 50px;">
    <label for="recipient_name" style="min-width: 110px;">Recipient Name:*</label>
    <input type="text" class="form-control" id="recipient_name" name="recipient_name" class="recipient_name" value="<?php echo $recipient_data->recipient_name ?>" >
  </div>
  <div class="form-group" style="min-height: 50px;">
    <label for="debited_amount" style="min-width: 110px;">Contact:*</label>
    <input type="text" class="form-control" id="contact"  value="<?php echo $recipient_data->contact ?>" >
  </div>
 <div class="form-group" style="min-height: 50px;">
    <label for="payment_method"  style="min-width: 110px;">Company Name:*</label>
    
    <input type="text" class="form-control" id="company_name"  value="<?php echo $recipient_data->company_name ?>" >
  </div>
 	
 	   <div class="form-group" style="min-height: 50px;">
    <label for="designation"  style="min-width: 110px;">Designation:*</label>
    <input type="text" class="form-control" id="designation"  value="<?php echo $recipient_data->designation ?>" >
  </div>

      <div class="form-group" style="min-height: 50px;">
    <label for="remarks"  style="min-width: 110px;">Remarks:</label>
    <input type="text" class="form-control" id="remarks"  value="<?php echo $recipient_data->remarks ?>">

    <input type="hidden" class="form-control" id="pid"  value="<?php echo $recipient_data->id ?>">

  </div>
  <button class="btn btn-primary pull-right" id="submit" style="margin-right: 100px;">Update</button>
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
	
	<script >
		$(document).ready(function() {
		
			
			$('#supplier_name').select2();
			$('#employee_name').select2();

  		$("#employee_div").hide();
  		 $("#supplier_div").hide();
  		  $("#miscellaneous_div").hide();
		var val=0;
        $('#date').datepicker({ dateFormat:'yy-mm-dd' });
	$("#paying_to").change(function(){

		$("#employee_div").hide();
  		 $("#supplier_div").hide();
  		  $("#miscellaneous_div").hide();
  		  $('#employee_name').val('');
			$('#supplier_name').val('');
			$('#miscellaneous').val('');
	
		
			var paying_to = $('#paying_to').val().trim();
						
					
			
			if (paying_to=='employee') {
				$("#employee_div").show();

			}if (paying_to=='supplier') {
				$("#supplier_div").show();

			}if (paying_to=='miscellaneous') {
				$("#miscellaneous_div").show();

			}
					});

$("#submit").click(function(){
	
			if(form_validation()){

					//alert('Got It');
			var recipient_id = $('#recipient_id').val().trim();
			var recipient_name	= $('#recipient_name').val().trim();
			var contact = $('#contact').val().trim();
			var company_name = $('#company_name').val().trim();
			var designation = $('#designation').val().trim();
			var remarks = $('#remarks').val().trim();
			var id = $('#pid').val().trim();
			
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Account_information/update_payment_recipient',
					data:{ 
							recipient_id: recipient_id,
							recipient_name: recipient_name,
							contact: contact,
							company_name:company_name,
							designation:designation,
							id:id,
							remarks: remarks
						},
					//timeout: 4000,
					success: function(result) {
						//console.log(result);
						//alert(result);
						//console.log(result);

						window.location.assign('../Account_information/payment_recipient_list');
						
		
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
					

			
		
		}});


function form_validation(){


	if($('#recipient_id').val()==""){

		alert("Please Write Credit Number");
			$('#recipient_id').focus();
	
				event.preventDefault();
				return false;
			
		
	}

	if ($('#recipient_name').val()=="") {

		alert("Please Enter Recipient Name");
			$('#recipient_name').focus();

				event.preventDefault();
				return false;
			
			
	}if ($('#contact').val()=="") {

		alert("Please Enter Contact Info");
			$('#contact').focus();
				event.preventDefault();
				return false;
			
			
	}if ($('#company_name').val()=="") {

		alert("Please Enter Company Name");
			$('#company_name').focus();
				event.preventDefault();
				return false;
			
			
	}if ($('#designation').val()=="") {

		alert("Please Enter Recipient Designation");
			$('#designation').focus();
				event.preventDefault();
				return false;
			
			
	}


	return true;
}

});
	</script>
	
	
	