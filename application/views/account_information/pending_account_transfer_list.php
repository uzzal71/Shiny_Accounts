<br></br>
    <div class="row" id="ItemsRow">
        <div  class="col-md-10 col-md-offset-1" style="padding: 1px;margin-left: 210px; background-color: white">
            <div >
                         <h3 align="center">
            <p style = "color:green"><?php echo $this->session->userdata('message');
            $this->session->unset_userdata('message')?></p>
        </h3>
        <h3 align="center" style = "background-color: white;">Pending Account Transfer  List</h3>
                <table  id="data_table" class="table table-striped table-bordered" style="width:100%;">
                    <thead>

                    <tr>
                        <th align="center" width="30px;"><b>SL#</b></th>
                        <th align="center"><b>From Account</b></th>
                        
                        <th align="center"><b>To Account</b></th>
                        <th align="center"><b>Re: Amount</b></th>
                        <th align="center"><b>Requested At</b></th>
                        <th align="center"><b>Requested By</b></th>
                        <th align="center">Reference</th>
                        <th align="center"><b>Action</b></th>
                    </tr>
                    </thead>
               
                            <tbody>
                                    <?php 
                                    if ($balance_transfer_list!=="") {
                                      
                                    
                                        $sl=0;
                                    foreach ($balance_transfer_list as $account_transfer) {
                                       $sl++;
                                    

                                     ?>
                            <tr>
                            
                                <td width="30px;"><?php echo $sl ?></td>
                                <td id="from_account"><?php echo $account_transfer->from_account ?></td>
                                <!-- <td><?php echo $voucher_info->project_id ?></td> -->
                                <td id="to_account" ><?php echo $account_transfer->to_account?></td>
                                <td id="req_amount"  style="text-align: right;"><?php echo $account_transfer->requested_amount ?></td>
                                <td><?php echo $account_transfer->requested_at  ?></td>
                                <td><?php echo $account_transfer->requested_by  ?></td>
                                 <td id="reference"><?php echo $account_transfer->reference  ?></td>
                              <td>
                                        <a href="<?php echo base_url();?>Account_information/view_account_transfer/<?php echo $account_transfer->id?>"> <img style="margin: 3%" border="0"title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/details.png"width="25" height="20"></a> 
                  <a href="<?php echo base_url();?>Account_information/edit_account_transfer/<?php echo $account_transfer->id?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit"src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
                                    <a href="<?php echo base_url();?>Inventory/delete_item_info/<?php echo $account_transfer->id?>" id="" onclick="return confirm('Are you sure?')">
                                    <img style="margin: 3%" border="0" title="Delete This Item" alt="Delete"
                                    src="<?php echo base_url();?>images/delete.png" width="25" height="20"></a>

                                 </td>


                            </tr>
                            <?php }} else{?>

                           
                                
                          
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
        <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center" style="color:#010047 ">Summary Of The Transaction</h4>
      </div>
      <div class="modal-body">

        <table border="0">
                <tr>
            <td align="left">From Acc:</td><td>&nbsp;&nbsp;<input type="text" id="f_ac" style="border: 0;color: #010047" readonly></td>
            <td  align="left">To Acc:</td><td>&nbsp;&nbsp;<input input type="text" id="t_ac" style="border: 0;color: #010047" readonly></td>
                </tr>
                     <tr>
            <td  align="left">Ref:</td><td>&nbsp;<input input type="text" id="ref" style="border: 0;color: #010047" readonly>&nbsp;</td>
              <td  align="left">Current Bal:</td><td>&nbsp;<input input type="text" id="balance" style="border: 0;color: #010047" readonly >&nbsp;</td>
                </tr>
                <tr>
            <td align="left">Req Amount:</td><td>&nbsp;&nbsp;<input type="text" id="r_amount" style="border: 0;color: #010047" readonly></td>
            <td  align="left">App Amount:</td><td>&nbsp;&nbsp;<input input type="number" id="app_amount" style="border: 1;color: #010047" ></td>
                </tr>
                 <tr>
            <td align="left" >Re. Balance:</td><td>&nbsp;&nbsp;<input type="text" id="r_balance" style="border: 0;color: #010047" readonly></td>
            <input type="hidden" id="hid">

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="voucher_approve" value="<?php  echo $account_transfer->id ?>" >Approve</button>
      </div>
    </div>

  </div>
</div>
    </div>
                                                  <script>



    $("#ItemsRow").on('click','.approve_btn',function(){ 

   var from_account =$(this).parent().parent().find('#from_account').text();
    var req_amount =$(this).parent().parent().find('#req_amount').text();
    var to_account=$(this).parent().parent().find('#to_account').text();
     var reference=$(this).parent().parent().find('#reference').text();
      var id=$(this).parent().parent().find('#tid').val();

      //alert(id);
          var response;
                $.ajax({
                    async: false,
                    type: 'POST',
                    url: '<?php echo base_url();?>Account_information/retrieve_current_balance',
                    data:{ 
                            from_account: from_account
                        },
                    //timeout: 4000,
                    success: function(result) {
                    //alert(result);
                    
                    var summary_data = result.split("#");

                    //var name = summary_data[1].trim();
                    var expense_date=summary_data[2];
                    

                   

                    $('#f_ac').val(from_account);
                      $('#t_ac').val(to_account);
                       $('#r_amount').val(req_amount);
                    $('#balance').val(result);
                    $('#ref').val(reference);
                    $('#app_amount').val(req_amount);
                    $('#hid').val(id);
                        //  $('#v_printed').val(printed);
                        //   $('#v_project_name').val(project_name);
                        //   $('#v_expense_type').val(expense_type);
                        //   $('#v_iid').val(voucher_no);
                        //    $('#created_at').val(created_at);
                        //    $('#customer_name').val(customer_name);
                           
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
                    }
                });
    
} );


             $("#voucher_approve").on('click',function(){

          
            var from_account =$('#f_ac').val();
             var req_amount =$('#r_amount').val();
            var to_account=$('#t_ac').val();;
             var reference=$('#ref').val();
             var id=$('#hid').val();

            var app_amount=parseFloat($('#app_amount').val().trim());

            //alert(app_amount);
        
                $.ajax({
                    async: false,
                    type: 'POST',
                    url: '<?php echo base_url();?>Account_information/approve_summary_transaction',
                    data:{ 
                            from_account: from_account,
                            app_amount:app_amount,
                            to_account:to_account,
                            reference:reference,
                            id:id
                        },
                    //timeout: 4000,
                    success: function(result) {

                            //alert(result);
                            //console.log(result);
                  window.location.assign('../Account_information/approve_account_transfer');
                        
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
                    }
                });

        });

          $("#app_amount").on('keyup',function(){
var balance =parseFloat($('#balance').val().trim());

var app_amount=parseFloat($('#app_amount').val().trim());

var total=parseFloat(balance-app_amount);
var req_amount =parseFloat($(this).parent().parent().find('#req_amount').text());
// if (app_amount>req_amount) {
//     alert("Are You Sure ?");
// }

$('#r_balance').val(total);
});

                            </script>

<script type="text/javascript">
    $('#item_type').select2();
    $(document).ready(function() {





      $('#data_table').DataTable({
        "dom": '<"pull-right"f><"pull-left"l>tip'   
    });
} );
</script>
<style>
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
  background: none;
  color: black!important;
  border-radius: 1px;
  border: 1px solid #828282;
}
 
.dataTables_wrapper .dataTables_paginate .paginate_button:active {
  background: none;
  color: black!important;
}
</style>
