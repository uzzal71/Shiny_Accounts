<br></br>
    <div class="row" id="ItemsRow">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 750px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
                         <h3 align="center">
            <p style = "color:green"><?php echo $this->session->userdata('message');
            $this->session->unset_userdata('message')?></p>
        </h3>
        <h3 align="center" style = "background-color: lightblue;">Payment Approval List</h3>
                <table class="table table-bordered">
                    <thead>

                    <tr>
                        <th align="center"><b>SL#</b></th>
                        <th align="center"><b>Credit Number</b></th>
                        
                        <th align="center"><b>Debited Amount</b></th>
                        <th align="center"><b>Paying To </b></th>
                        <th align="center"><b>Payment Type</b></th>
                        <th align="center"><b>Payment Method</b></th>
              
                        <th align="center"><b>Approve</b></th>
                    </tr>
                    </thead>
               
                            <tbody>
                                    <?php 
                                    if ($payment_approval_list!=="") {
                                      
                                    
                                        $sl=0;
                                    foreach ($payment_approval_list as $payment_approval) {
                                       $sl++;
                                    

                                     ?>
                            <tr>
                            
                                <td><?php echo $sl ?></td>
                                <td id="credit_number"><?php echo $payment_approval->credit_number ?></td>
                                <!-- <td><?php echo $voucher_info->project_id ?></td> -->
                                <td id="debited_amount" ><?php echo $payment_approval->debited_amount?></td>
                                <td id="paying_to" ><?php echo $payment_approval->paying_to ?></td>
                                <td id="payment_type"><?php echo $payment_approval->payment_type  ?></td>
                                <td id="payment_method"><?php echo $payment_approval->payment_method ?></td>
                              
                                <td  id='approve_btn' ><a class="btn btn-primary approve_btn " data-toggle="modal" data-target="#myModal"  value="<?php  echo $payment_approval->id ?>"
                                  
                                   >Approve</a> <input type="hidden" id="tid" value="<?php  echo $payment_approval->id ?>"></td>


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
        <h4 class="modal-title" align="center" style="color:#010047 ">Summary Of The Payment</h4>
      </div>
      <div class="modal-body">

        <table border="0">
                <tr>
            <td align="left">Credit No:</td><td>&nbsp;&nbsp;<input type="text" id="f_credit_no" style="border: 0;color: #010047" readonly></td>
            <td  align="left">Paying To:</td><td>&nbsp;&nbsp;<input input type="text" id="f_paying_to" style="border: 0;color: #010047" readonly></td>
                </tr>
                     <tr>
            <td  align="left">Debt. Amount:</td><td>&nbsp;<input input type="Number" id="f_debited_amount" style="border: 0;color: #010047" readonly>&nbsp;</td>
              <td  align="left">Payee Name:</td><td>&nbsp;<input input type="text" id="f_payee_name" style="border: 0;color: #010047" readonly >&nbsp;</td>
                </tr>
                <tr>
            <td align="left">Payment Type:</td><td>&nbsp;&nbsp;<input type="text" id="f_payment_type" style="border: 0;color: #010047" readonly></td>
            <td  align="left">Remarks:</td><td>&nbsp;&nbsp;<input input type="text" id="f_remarks" style="border: 0;color: #010047" >
            <input input type="hidden" id="f_id" style="border: 0;color: #010047" >

            </td>

                </tr>
                 <tr>
            
            

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="payment_approve"  >Approve</button>
      </div>
    </div>

  </div>
</div>
    </div>
                                                  <script>



    $("#ItemsRow").on('click','.approve_btn',function(){ 

   var credit_number =$(this).parent().parent().find('#credit_number').text();
    var debited_amount =$(this).parent().parent().find('#debited_amount').text();
    var paying_to=$(this).parent().parent().find('#paying_to').text();
     var payment_type=$(this).parent().parent().find('#payment_type').text();
     var payment_method=$(this).parent().parent().find('#payment_method').text();
      var id=$(this).parent().parent().find('#tid').val();

      //alert(id);
          var response;
                $.ajax({
                    async: false,
                    type: 'POST',
                    url: '<?php echo base_url();?>Account_information/pick_payment_approval_data',
                    data:{ 
                            id: id
                        },
                    //timeout: 4000,
                    success: function(result) {
                   // alert(result);
                    
                    //console.log(result);
                    var summary_data = result.split("#");

                    //var name = summary_data[1].trim();
                    var payee=summary_data[0];
                    var remarks=summary_data[1];

                   //alert(payee);

                    $('#f_credit_no').val(credit_number);
                      $('#f_paying_to').val(paying_to);
                       $('#f_debited_amount').val(debited_amount);
                    $('#f_payment_type').val(payment_type);
                    $('#f_payee_name').val(payee);
                    $('#f_remarks').val(remarks);
                     $('#f_id').val(id);
                    
                    // $('#hid').val(id);
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


             $("#payment_approve").on('click',function(){

          
       
             var id=$('#f_id').val();

           

 //alert(id);
        
                $.ajax({
                    async: false,
                    type: 'POST',
                    url: '<?php echo base_url();?>Account_information/approve_payment',
                    data:{ 
                            
                            id:id
                        },
                    //timeout: 4000,
                    success: function(result) {

                            //alert(result);
                            //console.log(result);
                  window.location.assign('../Account_information/payment_approval_list');
                        
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


