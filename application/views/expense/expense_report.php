 
    <br><br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <div id="custom-table" class="panel panel-primary custom-panel" style="background-color: ;padding: 1px;margin-left: 150px;max-height: 450px;overflow: scroll">
            <div class="panel-heading" align = "center">Expense Report Form</div>
            <div class="table-responsive" id="custom-table">
             <form name="show_report" action="<?php echo base_url();?>Expense/show_expense_report" target ="_blank" method="post">
                <table id="" class="table ">
                    <tbody>                     
                    <tr>
                                           
                       <th align="center">From Date</th>
                       <td align="center"><input type="text" name="from_date"  id="from_date" class="form-control custom-input dateFrom" required></td>     

                       <td align="center">To date<input type="checkbox" name="chk_to_date" value="1" id="chk_to_date" class="form-control custom-input" ></td>     
                      <td align="center"><input type="hidden" name="to_date"  id="to_date" class="form-control custom-input dateFrom" ></td>    
                      <td></td>

                    </tr>       
                    <tr>
                                                  
                       <th align="center">Project</th>
                       <td align="center"><select name="project"  id="project" class="form-control custom-input project" required>
                       <option value="select"selected >Select</option>
                       <?php foreach ($project_data as $project) { ?>
                          <option value="<?php echo $project->project_id ?>"><?php echo $project->project_name.'-'.$project->customer_name ?></option>
                     <?php   } ?>
                       </select>
                       </td>     

                       <th align="center">Expense Type</th>     
                      <td align="center" style="width: 200px;" ><select name="expense_type"  id="expense_type" class="form-control custom-input expense_type" >
                       <option value="select" selected >Select</option>
                       <?php   foreach ($expense_tpes as $expense) { ?>
                           <option value="<?php echo $expense->expense_type ?>"><?php echo $expense->expense_type ?></option>
                     <?php  } ?>
                       </select>

                       </td>  


                    </tr>
                        <tr>
                        <td align="center">Status</td>
                        <td>
                        <select name="status" name="status"  id="status" class="form-control custom-input status">
                            <option value="select" selected>Select</option>
                            <option value="approved">Approved</option>
                            <option value="pending">Pending</option>
                        </select>
                        </td>

                           <td align="center">Type</td>
                        <td>
                        <select name="type"  id="type" class="form-control custom-input status">
                            <option value="select" selected>Select</option>
                            <option value="project">Project</option>
                            <option value="support">Support</option>
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

            
            
          $('.dateFrom').datepicker({ dateFormat:'yy-mm-dd' });
            $('.timeFrom').timepicker({ dateFormat:'hh-mm-ss' });



            
        










    });
    
    
    
</script>