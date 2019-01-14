
    <br><br>

    <div class="row" id="ItemsRow">

        <div class="col-md-10 col-md-offset-1" style="background-color:white;padding: 1px;margin-left: 210px;max-height: 450px;">
           
            <div >
                <h4 align="center">
      <p style = "color:green"><?php echo 
      $session_data=$this->session->userdata('message');
      $this->session->unset_userdata('message')?>
        

      </p>
    </h4>
            <h3 align="center">Printed Leaves</h3>
      
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th align="center">SL#</th>
                        <th align="center">Employee ID</th>
                        <th  align="center"> Employee Name</th>
                        <th align="center">From</th>
                        <th align="center">To</th>
                        <th align="center">No of Days</th>
                        <th align="center">Leave Types</th>
                        <th align="center">Remarks</th>
                       
                       
                        <th align="center">Approve</th>
                    </tr>
                    </thead>
               
                            <tbody>
                            <?php 
                            $id=1;
                            foreach($all_pending_leave as $each_pending_leave){?>
                            <tr>
                            
                                <td><?php echo $id?></td>
                                <td id="employee_id"><?php echo $each_pending_leave->employee_id?></td>
                                <td><?php echo $each_pending_leave->first_name.' '.$each_pending_leave->last_name?></td>
                                <td id="from"><?php echo $each_pending_leave->date_time_from?></td>
                                <td id="to"><?php echo $each_pending_leave->date_time_to?></td>
                                <td id="no_of_days"><?php echo $each_pending_leave->no_of_days?></td>
                                <td id="type"><?php echo $each_pending_leave->leave_types?></td>
                                <td><?php echo $each_pending_leave->remarks?></td>
                               
                              
                               
                                 <td width="150px">
                             <button class="btn btn-success approve_btn" id="approve_btn" value="<?php echo $each_pending_leave->id?>" > Approve</button></a>
                             <a href="<?php echo base_url();?>leave/printed_copy/<?php echo $each_pending_leave->id?>"><button class="btn btn-info">Print</button></a>

                                </td>

                              <!--   <td width="130px">
                                 <a href="<?php echo base_url();?>leave/approve_leave/<?php echo $each_pending_leave->id?>"><button class="btn btn-success approve_btn" id="approve" > Approve</button></a>

                                </td> -->
                                
                            
                            </tr>
                            
                            <?php $id++;}?>


                           
                                <?php if($all_pending_leave==null){?>
                          
                                <tr>
                                    <td colspan="5" align="center">
                                        No Data Available
                                    </td>
                                </tr>
                                
                                <?php }?>
                         
                            </tbody>
                </table>
            </div>
            <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center" style="color:#010047 ">Summary Of The Leave</h4>
      </div>
      <div class="modal-body">

        <table border="0">
                <tr>
            <td align="right">Employee Name:</td><td><input type="text" id="e_name" style="border: 0;color: #010047" readonly></td>
              <td  align="right">Type:</td><td><input type="text" id="e_type" style="border: 0;color: #010047; width: 120px;" readonly></td>
         
                </tr>
                     <tr>
            <td align="right">Balance:</td><td><input type="text" id="balance" style="border: 0;color: #010047" readonly></td>
                   <td  align="right">Limit:</td><td><input input type="text" id="e_limit" style="border: 0;color: #010047;width: 120px;" readonly></td>
          
                </tr>
                <tr>
                  <td  align="right">Availed:</td><td><input input type="text" id="availed" style="border: 0;color: #010047;" readonly></td>
                   <td  align="right">Applied:</td><td><input type="text" id="applied" style="border: 0;color: #010047;width: 120px;" readonly></td>
                </tr>
                 <tr>
                 <td  align="right">Period:</td><td><input type="text" id="period" style="border: 0;color: #010047" readonly></td>
                  <td  align="right">B.A.A:</td><td><input type="text" id="baa" style="border: 0;color: #010047;width: 120px;" readonly></td>
                

                 <input type="hidden" id="ap_id" style="border: 0;color: #010047;width: 120px;" readonly></td>
                </tr>
                

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="leave_approve">Approve</button>
      </div>
    </div>

  </div>
</div>


        <div class="col-md-1"></div>
    </div>
    
                                <script>

                                $(document).ready(function () {
                                
                                

        $("#ItemsRow").on('click','.approve_btn',function(){ 

    var employee_id =$(this).parent().parent().find('#employee_id').text();
   var id =$(this).parent().parent().find('#approve_btn').val();
   var type =$(this).parent().parent().find('#type').text();
   var from =$(this).parent().parent().find('#from').text();

   var no_of_days=parseFloat($(this).parent().parent().find('#no_of_days').text());

   var to =$(this).parent().parent().find('#to').text();

   //alert(id);
//$('#myModal').modal('show');
          var response;
                $.ajax({
                    async: false,
                    type: 'POST',
                    url: '<?php echo base_url();?>Leave/pick_leave_data',
                    data:{ 
                            id: id,
                            type:type,
                            from:from,
                            employee_id:employee_id,
                            to:to
                        },
                    //timeout: 4000,
                    success: function(result) {
                        //console.log(result);
                   //alert(result);
               
                    var summary_data = result.split("#");

                    var e_name = summary_data[0].trim();
                    var availed=summary_data[1].trim();
                    var balance=summary_data[2].trim();
                    var e_type=summary_data[3].trim();
                    var limit=summary_data[4].trim();
                    var period=summary_data[5].trim();
                   

                       $('#e_name').val(e_name);
                  $('#availed').val(availed);
                  $('#balance').val(balance);
                $('#e_limit').val(limit);
                   $('#e_type').val(e_type);
                     $('#period').val(period);

                     var balances=parseFloat(balance);

                     var subs=balances-no_of_days;

                    $('#baa').val(subs);
                     $('#applied').val(no_of_days);
                    $('#ap_id').val(id);

                         $('#myModal').modal('show');
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
                    }
                });
    
} );


$("#leave_approve").on('click',function(){

          

        var   id= $('#ap_id').val();

            //alert(id);
        
                $.ajax({
                    async: false,
                    type: 'POST',
                    url: '<?php echo base_url();?>Leave/approve_leave',
                    data:{ 
                            id: id
                        },
                    //timeout: 4000,
                    success: function(result) {

                      //alert(result);
                  window.location.assign('../Leave/printed_leaves');
                        
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        response = "err--" + XMLHttpRequest.status + " -- " + XMLHttpRequest.statusText;
                    }
                });

        });




});


                            </script>


<script type="text/javascript">
   
    $(document).ready(function() {





      $('#data_table').DataTable({
        "dom": '<"pull-right"f><"pull-left"l>tip'   
    });
} );
</script>
