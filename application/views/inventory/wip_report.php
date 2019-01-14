
    <br><br>
    <div class="row">
		<div class="col-md-7 col-md-offset-1">
		<div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;">
			<div class="panel-heading" align="center">Requisiton Report</div>
            <div  id="custom-table">
			 <form name="show_report" autocomplete="off" action="<?php echo base_url();?>Inventory/show_wip_report" target="_blank" method="post">
                <table id="custom-table" class="table ">
                    <tbody>
					
					<tr>
					<td></td>
                                     
					   <th align="center">Item ID</th>
						<td width="20%"><select name="item_id" class="form-control  custom-input" id="item_id">
								<option value="select">Select All Items</option>
									<?php foreach($wip_report as $wip_data ){?>
										 <option value="<?php echo $wip_data->item_id?>"><?php echo $wip_data->item_name?></option>
									<?php }?>
										</select>
						</td>  
			
					 
							

                    </tr> 						
							
					
						
					<tr>
					<td></td>
                      <td></td>
                       <td><button type="submit" id="" class="btn btn-info pull-right">Generate Report</button></td>   
					   <td></td><td></td><td></td><td></td>					   
					  
                    </tr>	
					</tbody>
					</form>
					</table>

            </div>
           
        </div>
      
    </div>
    </div>
<!-- Page Content -->

		
<script type="text/javascript">
	$(document).ready(function() {
		
		
			
			//if($('#chk_to_date').checked == true)
				
$("#all_item").checked(function(){
if(document.getElementById('all_item').checked) {
	//alert("checked");
	
	$('#all_item').attr('value', 1);
} else {
   $('#all_item').attr('value', 0);
}
	});


			
		    $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
			$('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
			$('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
			
		
		

	});
	
	
</script>
	
	