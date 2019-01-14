<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Easy Accounts</title>
    <link href="<?php echo base_url()?>login_assets/asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>login_assets/asset/css/style.css" rel="stylesheet">
  </head>
 <body>

<div class="content container-fluid">
	<div class="row">
		<div class="col-md-7">
			<div class="company">
				<img src="<?php echo base_url()?>login_assets/media/funcanimation2.gif" width="100%" height="100%">
				<div class="title">
					<h2>Easy Accounts <span>2RA Technology Limitted @ <?php echo date("d-m-Y H:i:s"); ?></span></h2>
						
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<br>
			<?php
		        $msg=$this->session->userdata('message');
		        
		        if($msg)
		         {
		            ?>
		            <div class="alert alert-danger" id="error" style="position: fixed;width: 40%">
					  <strong>Danger!</strong> <?php echo $msg;$this->session->unset_userdata('message');?>
					</div>
		            <?php
						
		        }
		        
		        ?>
			<div class="login">
				<h2>Login</h2>
				<form name="save_new_item" action="<?php echo base_url();?>login/check_login_info"  method="post">
				  <div class="form-group">
					  <label for="sel1">Company:</label>
					 <select id="company_id" name="company_id" class="form-control custom-input" required>
						<option value="select" >Select Company Name</option>
						<?php foreach ($companies as $each_company) { ?>
							<option value="<?php echo $each_company->company_id ?>" ><?php echo $each_company->full_name ?></option>
					<?php	} ?>

					</select>
					</div>
					<div class="form-group">
					  <label for="sel1">User ID:</label>
					  <select id="user_name" name="user_name" class="form-control" required>
						<!-- User id ajax request -->
					</select>
					</div>
				  <div class="form-group">
				    <label for="pwd">Password:</label>
				    <input type="password" class="form-control" id="password" name="password" required>
				  </div>
				  <button type="submit" class="btn btn-default">Request Login</button>
				</form>
			</div>

		</div>
	</div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url()?>login_assets/login_assetsasset/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/select2.min.js"></script>
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

$("#error").fadeOut(5000);
});


</script>
</body>
</html>