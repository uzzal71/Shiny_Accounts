
    <br><br>
    <div class="row">
		<div class="col-md-10 col-md-offset-1">
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
	
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">

			<div class="panel-heading">Enter Promotion</div>
            <div class="table-responsive" id="custom-table">
			<form name="promotion_table" action="<?php echo base_url();?>promotion/save_promotion_info"  method="post">
                <table id="" class="table">
                    <thead>
                    <tr>
                       
                       
                        <th align="center">Employee ID</th>
                       <td align="center" width="30%"><input type="text" name="emp_id" id="emp_id" class="form-control custom-input" placeholder="Employee ID" required></td>
                       
                        <td align="center"><button type="button" class="btn btn-primary" id="btn">Submit</button></td>
						
                    </tr>
					<thead>
					
					</table>
					
					<table id="table_id" class="table">
					<tbody>
				
					</tbody>
				</table>
				</form>
			
            </div>
           
        </div>
        <div class="col-md-1"></div>
    </div>
	
	
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn").click(function(){
			//alert($('#emp_id').val().trim());
			if(form_validation())
			{
				//alert("validation true");
				
				var emp_id		 = $('#emp_id').val().trim();
			

				var response;
				$.ajax({
					async: false,
					type: 'POST',
					url: '<?php echo base_url()?>promotion/emp_id_search',
					data:{ 
							emp_id: emp_id, 
							
						
						},
					//timeout: 4000,
					success: function(result) {
						response = result;
						//alert(response);
						$("#table_id tbody").html("");
						$("#table_id tbody").html(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
					}
				});
				
				//alert(response);
			
			}
			
				    //  ======  ######  For Selecting Date Time and DateTime  ######  ======

        $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
        $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
		$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
		});
		
	
	});
	
	function form_validation()
	{
		//alert("validation");
		
		if($('#emp_id').val().trim() == "")
		{
			alert("Please insert Employee ID");
			$('#date_time_from').focus();
			return false;
		}
		
				
				
		return true;
	}
</script>


