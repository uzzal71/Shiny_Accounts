 
    <br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 210px;max-height: 450px;overflow: scroll">
            <div class="panel-heading" align = "center">Items Report Form</div>
            <div class="table-responsive" id="custom-table">
             <form name="show_report" autocomplete="off" action="<?php echo base_url();?>Inventory/show_items_report" target ="_blank" method="post">
                <table id="" class="table ">
                    <tbody>                     
                    <tr>
                                           
                       <th align="center">From Date</th>
                       <td align="center"><input type="text" name="from_date"  id="from_date" class="form-control custom-input dateFrom" required></td>     

                       <td align="center">To date<input type="checkbox" name="chk_to_date" value="1" id="chk_to_date" class="form-control custom-input" ></td>     
                      <td align="center"><input type="hidden" name="to_date"  id="to_date" class="form-control custom-input dateFrom" ></td>    

                    </tr>       
                    
                       <tr>
                           
                        <td>Item Type</td>
                        <td>
                            <select id="item_type" name="item_type" class="form-control custom-input">
                                <option value="All">All</option>
                                <option value="0">Component</option>
                                <option value="1">Tools</option>

                            </select>

                        </td>

                       </tr> 
                    <tr>
                       
                       <td> <button type="submit" id="" class="btn btn-info pull-right">Generate Report</button></td>   
                       <td></td><td></td><td></td><td></td>                    
                      
                    </tr>   
                    </tbody>
                    </form>
                    </table>

            </div>
           
        </div>
      
    </div>
    </div>

        
<script type="text/javascript">
    $(document).ready(function() {
    
        
        
$(document).on('change', '#all_department', function(){
    if($(this).prop('checked')){
        $('#department_name').attr('disabled', 'disabled');
        $('#all_department').attr('value', 1);
    } else {
        $('#department_name').removeAttr('disabled');
    }
});



            
    $("#chk_to_date").change(function(){
if(document.getElementById('chk_to_date').checked) {
    //alert("checked");
    $('#to_date').attr('type', 'text');
    $('#to_date').removeAttr('disabled');
    $('#chk_to_date').attr('value', 1);
} else {
   $('#chk_to_date').attr('value', 0);
    $('#to_date').attr('disabled', 'disabled');
}
    });

            
           // $('.dateTimeFrom').datetimepicker({ dateFormat:'yy-mm-dd' });
            $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
           // $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });
            
        
        

    });
    
    
    
</script>