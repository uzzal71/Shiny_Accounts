		<!-- Page Content -->
		  <br><br>
		    <div class="row">
		        <div class="col-md-6 col-md-offset-3">
				
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
		            <div class="panel panel-primary custom-panel">
		                <div class="panel-heading">Enter Income Form</div>
			              
		               
		                    <div class="col-xs-12 col-sm-12">
						   <form name="save_new_income" action="<?php echo base_url();?>Income/save_new_income"  method="post">
					<table >
					<?php if ($income_id->income_id!="") {
						$last_id=$income_id->income_id+1;
					}else{

						$last_id=100001;

					}


					 ?>

					<tr>
					<td> <label for="income_id" style="margin-top: 4px">Income ID</label></td>
					<td> <br>: <br> &nbsp;</td>
					<td colspan="2"> <input type="text" id="income_code" name="income_code" class="form-control custom-input" value="<?php echo'INC'.date('Y').$last_id; ?>" readonly ></td>
					
					</tr>		

					<tr>
					<td> <label for="income_amount" style="margin-top: 4px">Income Amount</label></td>
					<td> <br>: <br> &nbsp;</td>
					<td colspan="2"> <input type="number" id="income_amount" name="income_amount" class="form-control custom-input" ></td>
					
					</tr>
					
					<tr>
					<td> <label for="income_date" style="margin-top: 4px">Income Date</label></td>
					<td> <br>: <br> &nbsp;</td>
					<td colspan="2"> <input type="text" id="income_date" name="income_date" class="form-control custom-input dateFrom" ></td>
					
					</tr>
					
					<tr>
					<td> <label for="vat" style="margin-top: 4px">VAT %</label></td>
					<td> <br>: <br> &nbsp;</td>
					<td> <input type="number" id="vat" name="vat" step="0.01" class="form-control custom-input"  ></td>
					<td > <input type="number" id="fvat" name="fvat" step="0.01" class="form-control custom-input"  ></td>
					
					</tr>		

					<tr>
					<td> <label for="ait" style="margin-top: 4px">AIT %</label></td>
					<td> <br>: <br> &nbsp;</td>
					<td> <input type="number" id="ait" name="ait"  step="0.01" class="form-control custom-input"  ></td>

					<td><input type="number" id="fait" name="fait" step="0.01" class="form-control custom-input"  ></td>
					
					</tr>
				
							
					
					<tr>
					<td> <label for="amount" style="margin-top: 4px">Amount</label></td>
					<td> <br>: <br> &nbsp;</td>
					<td colspan="2"> <input type="number" id="amount" name="amount" class="form-control custom-input" readonly ></td>
					
					</tr>	

					<tr>
					<td> <label for="pay_type" style="margin-top: 4px">Pay Type</label></td>
					<td> <br>: <br> &nbsp;</td>
					<td colspan="2"> 
					<select name="pay_type" class="form-control  custom-input" id="pay_type">
								
									 <option value="cash">Cash</option>
									 <option value="cheque">Cheque</option>

								
		            </select>
					</td>
					
					</tr>
					
					<tr>
					<td> <label for="cheque_no" style="margin-top: 4px">Cheque No</label></td>
					<td> <br>: <br> &nbsp;</td>
					<td colspan="2"> <input type="text" id="cheque_no" name="cheque_no" class="form-control custom-input" ></td>
					</tr>		
					<tr>
					<td> <label for="bank_name" style="margin-top: 4px">Bank Name</label></td>
					<td> <br>: <br> &nbsp;</td>
					<td colspan="2"> <select id="bank_name" name="bank_name" class="form-control custom-input"  >

							<option value="select">Select</option>
							<?php foreach ($bank_name as  $banks) { ?>
							<option value="<?php echo $banks->bank_name ?>"><?php echo $banks->bank_name ?></option>	
						<?php	}?>

					</select></td>
					</tr>				

					
					<tr>
					<td> <label for="deposit_account" style="margin-top: 4px">Deposit A/C</label></td>
					<td> <br>: <br> &nbsp;</td>
					<td colspan="2"><select name="deposit_account" class="form-control  custom-input" id="deposit_account" >
								
							
								
		            </select>
					</td>
					
					</tr>			
								
					<tr>
					<td> <label for="project_name" style="margin-top: 4px">Project Name</label></td>
					<td> <br>: <br> &nbsp;</td>
					<td colspan="2"><select name="project_name" class="form-control  custom-input" id="project_name" >
						<option value="select">Select</option>
						<?php foreach ($project_data as $project) { ?>
							
				
								
									 <option value="<?php echo$project->project_id ?>"><?php echo$project->project_name.'-'.$project->customer_name ; ?></option>
							
							<?php }?>	
		            </select>
					</td>
					
					</tr>			

							
					
						
					<tr>
					<td> <label for="description" style="margin-top: 4px">Description</label></td>
					<td> <br>: <br> &nbsp;</td>
					<td colspan="2"> <input type="text" id="description" name="description" class="form-control custom-input" ></td>
					
					</tr>	

					
					<!-- RECORDING TIME AND RECORDED BY-->
				
					
					
						<tr>

							<td></td>				
							<td></td>
							<td></td>
							<td>
				
		                            <button type="submit" id="submit" class="btn btn-info pull-right">Add Income</button>
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


					//  $(window).keydown(function(event) {
     //   if (event.keyCode == 13) {
     //   $(this).find().next('input').focus();
     
     // alert('got it');
     // event.keyCode = 9;
     	
     //   }
     // });
    $('#income_amount').keypress(function(e) {
                        var keyCode = e.keyCode || e.which;
                        if (keyCode == 13) {
                            e.preventDefault();
                           //alert('what');
                            var income_date =$('#income_date').val();
                            if (income_date==""){
                                $('#income_date').focus();
                            }
                            return false;
                        }
                    });



 $('#income_date').keypress(function(e) {
                        var keyCode = e.keyCode || e.which;
                        if (keyCode == 13) {
                            e.preventDefault();
                           //alert('what');
                            var vat =$('#vat').val();
                            if (vat==""){
                                $('#vat').focus();
                            }
                            return false;
                        }
                    });
$('#vat').keypress(function(e) {
                        var keyCode = e.keyCode || e.which;
                        if (keyCode == 13) {
                            e.preventDefault();
                           //alert('what');
                            var ait =$('#ait').val();
                            if (ait==""){
                                $('#ait').focus();
                            }
                            return false;
                        }
                    });



	$('#ait').keypress(function(e) {
                        var keyCode = e.keyCode || e.which;
                        if (keyCode == 13) {
                            e.preventDefault();
                           //alert('what');
                            var pay_type =$('#pay_type').val();
                            if (pay_type!==""){
                                $('#pay_type').focus();
                            }
                            return false;
                        }
                    });


	$('#project_name').keypress(function(e) {
                        var keyCode = e.keyCode || e.which;
                        if (keyCode == 13) {
                            e.preventDefault();
                           //alert('what');
                            var description =$('#description').val();
                            if (description==""){
                                $('#description').focus();
                            }
                            return false;
                        }
                    });


	



				$("#project_name").select2();

				$("#deposit_account").attr("disabled", true);
				$('#bank_name').attr("disabled", true);
				$('#cheque_no').attr("disabled", true);

				 $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });


				 	$("#vat").keyup(function(){
			var income_amount =parseFloat( $('#income_amount').val().trim());
			var percentages =parseFloat( $('#vat').val().trim());

			var multiplication =0;
			 multiplication=((percentages*income_amount)/100);

			$('#fvat').val(multiplication);

				
		
		});


				 			 	$("#ait").keyup(function(){
			var income_amount =parseFloat( $('#income_amount').val().trim());
			var percentages_ait =parseFloat( $('#ait').val().trim());

			var multiplications =0;
			 multiplications=((percentages_ait*income_amount)/100);

			$('#fait').val(multiplications);

				
		
		});


				 $("#amount").click(function(){
			var fvat =parseFloat( $('#fvat').val().trim());
			var fait =parseFloat( $('#fait').val().trim());
			var income_amount =parseFloat( $('#income_amount').val().trim());
			var add =0;
			 add=(income_amount-(fvat+fait));

			$('#amount').val(add);

				
		
		});


				  $("#pay_type").change(function(){

				  	var pay_type=$('#pay_type').val().trim();

				  	if (pay_type=='cheque') {

				  			$("#deposit_account").attr("disabled", false);
					$('#bank_name').attr("disabled", false);
					$('#cheque_no').attr("disabled", false);

				  	}



				  });

				$("#bank_name").change(function(){
					
			var bank_name = $('#bank_name').val().trim();

			
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
						

						$('#deposit_account').html(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});

		});


$("#submit").click(function(){
		 if($('#income_amount').val()=="")
		{
			alert("Please Enter Income Amount");
			$('#income_amount').focus();
			return false;
			event.preventDefault()
		}


			 if($('#income_date').val()=="")
		{
			alert("Please Enter Income Date");
			$('#income_date').focus();
			return false;
			event.preventDefault();
		}
		

			 if($('#vat').val()=="")
		{
			alert("Please Enter Vat Percentages");
			$('#vat').focus();
			return false;
			event.preventDefault();
		}

			 if($('#ait').val()=="")
		{
			alert("Please Enter AIT Percentages");
			$('#ait').focus();
			return false;
			event.preventDefault();
		}
		
		

		 if($('#amount').val()== "")
		{
			alert("Please Click On Amount");
			$('#amount').focus();
			return false;
			event.preventDefault();
		
		}

		 if(($('#pay_type').val()== "cheque")&&($('#cheque_no').val()== ""))
		{
			alert("Please Enter Cheque No");
			$('#cheque_no').focus();
			return false;
			event.preventDefault();
		
		}

		 if(($('#pay_type').val()== "cheque")&&($('#bank_name').val()== "select"))
		{
			alert("Please Select Bank Name");
			$('#bank_name').focus();
			return false;
			event.preventDefault();
		
		}


		 if(($('#pay_type').val()== "cheque")&&($('#deposit_account').val()== "select"))
		{
			alert("Please Select Account Number");
			$('#deposit_account').focus();
			return false;
			event.preventDefault();
		
		}
		 if($('#project_name').val()== "select")
		{
			alert("Please Select Project Name");
			$('#project_name').focus();
			return false;
			event.preventDefault();
		
		}



	});
});
			</script>
			
			
			