<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading">Login</div>
              
               <br>
                    <div class="col-xs-12 col-sm-10">
					
							<h3 style="color: green; text-align:center" > 
					 
                                          <?php
                                                $msg=$this->session->userdata('message');
                                                
                                                	//echo $msg;


                                                if($msg)
                                                 {
                                                    echo $msg."<br> <br>";
														
                                                    $this->session->unset_userdata('message');
														
                                                }
                                                
                                                ?>
                                     </h3>
											
				   <form name="save_new_item" action="<?php echo base_url();?>login/check_login_info"  method="post">
			<table >
			
			 <tr>
			<td> <label for="user_name" style="margin-top: 4px">Company:</label></td>
		
			<!-- <td style="width:65%"> <input type="text" id="company_id" value="1" name="company_id" class="form-control custom-input" required></td> -->
			<td style="width:65%">
			<select id="company_id" name="company_id" class="form-control custom-input">
				<option value="select" >Select Company Name</option>
				<?php foreach ($companies as $each_company) { ?>
					<option value="<?php echo $each_company->company_id ?>" ><?php echo $each_company->full_name ?></option>
			<?php	} ?>

			</select>

			</td>
			
			</tr>		
			<tr>
			<td> <label for="user_name" style="margin-top: 4px">User ID:</label></td>
		
			<td style="width:65%">
			<select id="user_name" name="user_name" class="form-control custom-input user_name" >
				
			</select>
			</td>
			
			</tr>
		
			
			 <tr>
			<td> <label for="password" style="margin-top: 4px">Password:</label></td>
			
			<td>  <input type="password" id="password" name="password" class="form-control custom-input" required></td>
			
			</tr>
		
			
			
			
				<tr>
				<td></td>

			<td align="right" width="1">
		
                            <button type="submit" class="btn btn-info pull-right">Login</button>
                            
                        </td>
			 
			
			
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
	$('.user_name').select2();


		$("#company_id").change(function(){
			//alert("Here");
			
			var company_id = $('#company_id').val().trim();
						
			var response;
			$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url();?>Login/pick_user_list',
					data:{ 
							company_id: company_id
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
					//alert(response);
						$('#user_name').html(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
					

			//$('#employee_name').val(response);
		
		});


	});
	</script>
	