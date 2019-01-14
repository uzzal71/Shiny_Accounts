<br></br>

    <div class="row" id="ItemsRow">
        <div id="custom-table" class="col-md-10 col-md-offset-1" style="background-color: #9acfea;padding: 1px;margin-left: 210px;max-height: 750px;overflow: scroll">
            <div class="table-responsive" id="custom-table">
			                  <h3 align="center">
            <p style = "color:green"><?php echo $this->session->userdata('message');
            $this->session->unset_userdata('message')?></p>
        </h3>
                <table class="table table-bordered">
                    <thead>

                    <tr>
                        <th align="center"><b>SL#</b></th>
                        <th align="center"><b>Voucher No</b></th>
                        
                        <th align="center"><b>Project Code</b></th>
                        <th align="center"><b>Employee Name</b></th>
                        <th align="center"><b>Date</b></th>
                        <th align="center"><b>Entry By</b></th>
						<th align="center"><b>Action</b></th>
						<th align="center"><b>Approve</b></th>
                    </tr>
                    </thead>
               
                            <tbody>
                                    <?php 
                                        $sl=0;
                                    foreach ($voucher_infos as $voucher_info) {
                                       $sl++;
                                    

                                     ?>
                            <tr>
							
                                <td><?php echo $sl ?></td>
                                <td id="voucher_no" ><?php echo $voucher_info->voucher_no ?></td>
                                <td><?php echo $voucher_info->project_id ?></td>
                                <td id="employee_name" ><?php echo $voucher_info->employee_name?></td>
                                <td><?php echo $voucher_info->date ?></td>
                                <td><?php echo $voucher_info->entry_by ?></td>
                                <td>
                                    <a href="<?php echo base_url();?>Voucher_entry/view_voucher_details/<?php echo $voucher_info->voucher_no ?>"> <img style="margin: 3%" border="0" title="See Details" alt="Details"
                                    src="<?php echo base_url();?>images/details.png" width="25" height="20"></a> 
                                     <a href="<?php echo base_url();?>Voucher_entry/edit_voucher_info/<?php echo $voucher_info->voucher_no?>"> <img style="margin: 3%" border="0"
                                    title="Edit User Info" alt="Edit" src="<?php echo base_url();?>images/edit.png" width="25" height="20"></a>
                                    </td>
                                <td  id='approve_btn' ><a class="btn btn-primary approve_btn " data-toggle="modal" data-target="#myModal" value="<?php  echo $voucher_info->voucher_no ?>"
                                  
                                   >Approve</a></td>

                            </tr>
                            <?php }?>

                           
								
                          
                                <tr>
                                    <td colspan="5" align="center">
                                        No Data Available
                                    </td>
                                </tr>
                         
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
        <h4 class="modal-title" align="center" style="color:#010047 ">Summary Of The Voucher</h4>
      </div>
      <div class="modal-body">

        <table border="0">
                <tr>
            <td align="left">Employee Name:</td><td>&nbsp;&nbsp;<input type="text" id="v_name" style="border: 0;color: #010047" readonly></td>
            <td  align="left">Expense Date:</td><td>&nbsp;&nbsp;<input input type="text" id="v_date" style="border: 0;color: #010047" readonly></td>
                </tr>
                     <tr>
            <td align="left">Voucher No:</td><td>&nbsp;&nbsp;<input type="text" id="v_id" style="border: 0;color: #010047" readonly></td>
            <td  align="left">Amount:</td><td>&nbsp;<input input type="text" id="v_amount" style="border: 0;color: #010047" readonly>&nbsp;</td>
                </tr>
                <tr>
                 <td  align="left">Type:</td><td>&nbsp;&nbsp;<input type="text" id="v_type" style="border: 0;color: #010047" readonly>&nbsp;</td>
            <td  align="left">Printed:</td><td>&nbsp;<input input type="text" id="v_printed" style="border: 0;color: #010047" readonly></td>
                </tr>
                <tr>
                    <td  align="left">Project Name:</td><td>&nbsp;&nbsp;<input type="text" id="v_project_name" style="border: 0;color: #010047" readonly ></td>
            <td  align="left" >Expense Type:</td><td>&nbsp;&nbsp;<input input type="text" id="v_expense_type" style="border: 0;color: #010047" readonly ></td>
            <input type="hidden" id="v_iid">
                </tr>
                <tr>   
                    <td align="left">Submit Date:</td>
                    <td>&nbsp;&nbsp;<input type="text" id="created_at" style="border: 0;color: #010047" readonly ></td></td>

                     <td align="left">Client Name:</td>
                    <td>&nbsp;&nbsp;<input type="text" id="customer_name" style="border: 0;color: #010047" readonly ></td></td>
                </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="voucher_approve">Approve</button>
      </div>
    </div>

  </div>
</div>
    </div>
	                             <script>



    $("#ItemsRow").on('click','.approve_btn',function(){ 

   var voucher_no =$(this).parent().parent().find('#voucher_no').text();
    var employee_name =$(this).parent().parent().find('#employee_name').text();

           // alert(employee_name);
          var response;
                $.ajax({
                    async: false,
                    type: 'POST',
                    url: '<?php echo base_url();?>Voucher_entry/pick_voucher_info_expenses',
                    data:{ 
                            voucher_no: voucher_no
                        },
                    //timeout: 4000,
                    success: function(result) {
                    //alert(result);
                    
                    var summary_data = result.split("#");

                    //var name = summary_data[1].trim();
                    var expense_date=summary_data[2].trim();
                   var customer_name=summary_data[3].trim();
                    var expense_amount=summary_data[1].trim();
                    var type=summary_data[8].trim();
                    var created_at=summary_data[7].trim();
                    var project_name=summary_data[5].trim();
                    var expense_type=summary_data[0].trim();
                    //var original_id=summary_data[8].trim();
                     var printed=summary_data[9].trim();

                    if (type=='1'){

                        type='Support';
                    }else{

                        type='Project';

                    }

                    if (printed=='1') {
                        printed='Yes';
                    }else{
                        printed='No';
                    }


                        $('#v_name').val(employee_name);
                      $('#v_date').val(expense_date);
                       $('#v_id').val(voucher_no);
                        $('#v_amount').val(expense_amount);
                        $('#v_type').val(type);
                         $('#v_printed').val(printed);
                          $('#v_project_name').val(project_name);
                          $('#v_expense_type').val(expense_type);
                          $('#v_iid').val(voucher_no);
                           $('#created_at').val(created_at);
                             $('#customer_name').val(customer_name);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
                    }
                });
    
} );


             $("#voucher_approve").on('click',function(){

          
            var v_printed=$('#v_printed').val();
             var   voucher_no= $('#v_iid').val();

            if (v_printed=='No') {

                alert('Please Print The Voucher');
            window.location.assign('../Voucher_entry/voucher_approval');
            }

         if (v_printed=='Yes') {
        
                $.ajax({
                    async: false,
                    type: 'POST',
                    url: '<?php echo base_url();?>Voucher_entry/approve_summary_voucher',
                    data:{ 
                            voucher_no: voucher_no
                        },
                    //timeout: 4000,
                    success: function(result) {

                            //alert(result)
                  window.location.assign('../Voucher_entry/printed_vouchers');
                        
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
                    }
                });

        }});

                            </script>





