
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">

		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
			<div class="panel-heading">Create New User Role</div>
            <div class="table-responsive" id="custom-table">
			
                <table id="" class="table ">
                    <tbody>
					<tr>
                       <th align="center">User Role Name</th>
                       <td width="30%">                   
						<input type="text" id="user_role_name" name="user_role_name" class="form-control custom-input" required>
					   </td>
					   <th align="center">Parent/Parent Name</th>
                       <td align="center">
			<select required name="parent_id" class="form-control col-sm-6 custom-input" id="parent_id">
					<option value="select">select</option>
                    <option value="0">Self Parent</option>
					<?php if($all_role) {foreach($all_role as $each_role){?>
                    <option value="<?php echo $each_role->id;?>"><?php echo $each_role->user_role_name?></option>
					<?php }}?>
            </select>
					   </td>	
                    </tr>  			
					<tr>
                      
					   <th align="center">URL Link</th>
                       <td align="center">
						<input type="text" id="url_link" name="url_link" class="form-control custom-input" required>
					   </td>						 

                    </tr>  					


			</div>

					<tr>
                        <th></th> <th></th> <th></th>
                       <td font-size="24"><input type="" id="btn_add_user_role" class="btn btn-success" value="Add User Role"/></td>                      
					  
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
		$("#btn_add_user_role").click(function(){
			if(form_validation())
			{
				//alert("validation true");
				
				var user_role_name		 = $('#user_role_name').val().trim();
				var parent_id		 = $('#parent_id').val().trim();
				var url_link		 = $('#url_link').val().trim();

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url()?>user/save_new_user_role',
					data:{ 
							user_role_name: user_role_name,
							parent_id: parent_id,
							url_link: url_link
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						alert(response);
						window.location.reload(true);
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
		
		if($('#user_role_name').val().trim() == "")
		{
			alert("Please Insert User Role");
			$('#user_role_name').focus();
			return false;
		}			
		else if($('#parent_id').val().trim() == "select")
		{
			alert("Please Select Parent Name");
			$('#parent_id').focus();
			return false;
		}		
		else if($('#url_link').val().trim() == "")
		{
			alert("Please Insert Url Link");
			$('#url_link').focus();
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
