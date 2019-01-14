<!-- Page Content -->
  <br><br>
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-primary custom-panel">
                <div class="panel-heading center">Change Password</div>
              
               <br>
                    <div class="col-xs-12 col-sm-12">
					
					 <h3 style="color: red"> 
					 
                                                <?php
                                                    $msg=$this->session->userdata('message');
                                                    if($msg)
                                                    {
                                                        echo $msg."<br> <br>";
														
                                                        $this->session->unset_userdata('message');
														
                                                    }
                                                
                                                ?>
                                            </h3>
											
				   <form name="change_password" action="<?php echo base_url();?>welcome/update_password"  method="post">
			<table >

			
			 <tr>
			<td> <label for="password" style="margin-top: 4px">Old Password:</label></td>
			
			<td width = 100%>  <input type="password" id="password" name="password" class="form-control custom-input" required></td>
			
			</tr>
			
			 <tr>
			<td> <label for="new_password" style="margin-top: 4px">New Password:</label></td>
			
			<td>  <input type="password" id="new_password" name="new_password" class="form-control custom-input" required></td>
			
			</tr>	
			<tr>
			<td> <label for="confirm_password" style="margin-top: 4px">Confirm New Password:</label></td>
			
			<td>  <input type="password" id="confirm_password" name="confirm_password" class="form-control custom-input" required></td>
			
			</tr>
			
				<tr>
			<td>
			 <div class="col-md-4" style="float: right;width: 4%;margin-top: 22px;margin-right: 50px">
                            <button type="submit" class="btn btn-info pull-left">Change Password</button>
                            
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
	
	
	
	
	