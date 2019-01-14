
    <div class="row" id="ItemsRow">
        <div style="background-color: #9acfea;padding: 1px;margin-left: 210px;" >
          
   <div class="row" style="margin-left: 5px; margin-right: 800px;">
  <table class="table table-condensed" style="border: 0;">
    
      <tr>
  
        <th >Account Name</th>
        <th align="right">Current Balance</th>
        
      </tr>



          <?php foreach ($bank_infos as $banks) { ?>            
       <tr>
      <!--  <td><?php echo '****'. substr($banks->account_no, -5);  ?></td>   -->
      <td><?php echo$banks->account_name;  ?></td>
       <td align="right"><?php echo $banks->balance ?></td>
       </tr>
         <?php } ?>

         </table>
       </div>
        </div>

        <div id="custom-table"  style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 670px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
                       <h3 align="center">
            <p style = "color:green"><?php echo $this->session->userdata('message');
            $this->session->unset_userdata('message')?></p>
        </h3>
            <h3 align="center" style = "background-color: lightblue;">Expense List For Approval</h3>
                <table class="table table-bordered">
                    <thead>

                    <tr>
                        <th align="center" style="width: 20px;">SL#</th>
                        <th align="center">Expense ID</th>
                        <th align="center">Project Code</th>
                        <th align="center">Pay Type</th>
                        
                        <th align="center">Expense Date</th>
                        <th align="center">Expensed By</th>
                        <th align="center">Expense Amount</th>
                        <th align="center" style="max-width:40px;">View/Edit</th>
                        <th align="center">Action</th>
                    </tr>
                    </thead>
               
                            <tbody>
                                    <?php 
                                    if ($expense_infos!=="") {
                                        
                                
                                        $sl=0;
                                    foreach ($expense_infos as $expense_info) {
                                       $sl++;
                                    

                                     ?>
                            <tr>
                            
                                <td style="width: 20px;" ><?php echo $sl ?></td>
                                <td id="expense_id" ><?php echo $expense_info->expense_id ?></td>
                                <td><?php echo $expense_info->project_id ?></td>
                                <td><?php echo $expense_info->pay_type?></td>
                             
                                <td><?php echo $expense_info->expense_date?></td>
                                <td style="max-width:40px;"><?php echo $expense_info->expense_by?></td>
                                  <td><?php echo $expense_info->expense_amount?></td>
                                <td>
                                    <a href="<?php echo base_url();?>Expense/view_expense_details/<?php echo $expense_info->id ?>"> <img style="margin: 3%" border="0" title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/details.png" width="25" height="20"></a> 

                                         <a href="<?php echo base_url();?>Expense/edit_expense/<?php echo $expense_info->id ?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit" src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
                                    
                                    </td>
                                     <td id='approve_btn'><a class="btn btn-primary approve_btn "  value="<?php  echo $expense_info->id ?>"
                                  
                                   >Approve</a></td>
                                

                            </tr>
                            <?php }} else {?>

                           
                                
                          
                                <tr>
                                    <td colspan="5" align="center">
                                        No Data Available
                                    </td>
                                </tr>
                         <?php } ?>
                            </tbody>
                </table>
            </div>
        </div>

        <div>
            
            <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center" style="color:#010047 ">Summary Of The Expense</h4>
      </div>
      <div class="modal-body">

        <table border="0">
                <tr>
            <td align="right">Employee Name:</td><td><input type="text" id="e_name" style="border: 0;color: #010047" readonly></td>
            <td  align="right">Expense Date:</td><td><input input type="text" id="e_date" style="border: 0;color: #010047" readonly></td>
                </tr>
                     <tr>
            <td align="right">Expense ID:</td><td><input type="text" id="e_id" style="border: 0;color: #010047" readonly></td>
            <td  align="right">Expense Amount:</td><td><input input type="text" id="e_amount" style="border: 0;color: #010047" readonly></td>
                </tr>
                <tr>
                 <td  align="right">Type:</td><td><input type="text" id="e_type" style="border: 0;color: #010047" readonly></td>
            <td  align="right">Approve ID:</td><td><input input type="text" id="e_approve_id" style="border: 0;color: #010047" readonly></td>
                </tr>
                <tr>
                    <td  align="right">Project Name:</td><td><input type="text" id="e_project_name" style="border: 0;color: #010047" readonly ></td>
            <td  align="right" >Expense Type:</td><td><input input type="text" id="e_expense_type" style="border: 0;color: #010047" readonly ></td>
            <input type="hidden" id="original_id">
                </tr>

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="expense_approve">Approve</button>
      </div>
    </div>

  </div>
</div>

        </div>
    </div>
                                <script>



    $("#ItemsRow").on('click','.approve_btn',function(){ 

   var expense_id =$(this).parent().parent().find('#expense_id').text();



          var response;
                $.ajax({
                    async: false,
                    type: 'POST',
                    url: '<?php echo base_url();?>Expense/pick_summary',
                    data:{ 
                            expense_id: expense_id
                        },
                    //timeout: 4000,
                    success: function(result) {
                    //alert(result);
                    
                    var summary_data = result.split("#");

                    var name = summary_data[0].trim();
                    var expense_date=summary_data[1].trim();
                    var expense_id=summary_data[2].trim();
                    var expense_amount=summary_data[3].trim();
                    var type=summary_data[4].trim();
                    var approve_id=summary_data[5].trim();
                    var project_name=summary_data[6].trim();
                    var expense_type=summary_data[7].trim();
                    var original_id=summary_data[8].trim();

                        $('#e_name').val(name);
                      $('#e_date').val(expense_date);
                       $('#e_id').val(expense_id);
                        $('#e_amount').val(expense_amount);
                        $('#e_type').val(type);
                         $('#e_approve_id').val(approve_id);
                          $('#e_project_name').val(project_name);
                          $('#e_expense_type').val(expense_type);
                          $('#original_id').val(original_id);

                          $('#myModal').modal('show');
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
                    }
                });
    
} );


             $("#expense_approve").on('click',function(){

          

        var   original_id= $('#original_id').val();

            //alert(original_id);
        
                $.ajax({
                    async: false,
                    type: 'POST',
                    url: '<?php echo base_url();?>Expense/approve_summary_exepense',
                    data:{ 
                            original_id: original_id
                        },
                    //timeout: 4000,
                    success: function(result) {

                      //alert(result);
                  window.location.assign('../Expense/expense_list_for_approval');
                        
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
                    }
                });

        });

</script>
<style type="text/css">
input[type="text"]{
  width: 500px;
  padding: 5px;
  border-radius: 10px;
  }
</style>



