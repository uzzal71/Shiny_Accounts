
    <div class="row" id="ItemsRow" style="background: #FFF">
        <div style="padding: 1px;margin-left: 210px;" >
    <br>
   <div class="row">
    <div class="col-md-6">
      <table class="table table-bordered" style="border: 1;">
    
      <tr style="background: gray;color: #FFF">
  
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
    <div class="col-md-6">

      <div style="height: 56px;width: 100%;">
        <h3 align="center">
            <p style = "color:green"><?php echo $this->session->userdata('message');
            $this->session->unset_userdata('message')?></p>
        </h3>
      </div>
      

      <div style="margin-top:62px">
        <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon">Search</span>
        <input style="width: 480px;" type="text" name="search_text" id="search_text" placeholder="Search Expense ID">
      </div>
    </div>
      </div>

      

       <div style="margin-top: 20px;
    font-size: 20px;
    font-weight: bold;
    color: #808080;
    border-bottom: 1px solid #eee;
    padding: 5px;">
        Total Data:
        <?php 

          $query = $this->db->query('SELECT * FROM expense_info WHERE `is_approved`=0');
          echo $query->num_rows();

         ?>
      </div>

    </div>
  
       </div>
        </div>



        
        <div id="custom-table"  style="background-color: #white;padding: 1px;margin-left: 200px;max-height: 670px;overflow: scroll">
            <div class="table-responsive" id="custom-table">                       
            
            <!-- Ajax search result -->

            <div id="result"></div>


            </div>
        </div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center" style="color:#010047 ">Summary Of The Expense</h4>
      </div>
      <div class="modal-body">

        <table class="table table-bordered">
               <tr>
                 <td>Employee Name</td>
                 <td><input type="text" id="e_name" style="border: 0;color: #010047" readonly></td>
               </tr>
               <tr>
                 <td>Expense Date</td>
                 <td><input input type="text" id="e_date" style="border: 0;color: #010047" readonly></td>
               </tr>
               <tr>
                 <td>Expense ID</td>
                 <td><input type="text" id="e_id" style="border: 0;color: #010047" readonly></td>
               </tr>
               <tr>
                 <td>Expense Amount</td>
                 <td><input input type="text" id="e_amount" style="border: 0;color: #010047" readonly></td>
               </tr>
               <tr>
                 <td>Type</td>
                 <td><input type="text" id="e_type" style="border: 0;color: #010047" readonly></td>
               </tr>
               <tr>
                 <td>Approve ID</td>
                 <td><input input type="text" id="e_approve_id" style="border: 0;color: #010047" readonly></td>
               </tr>
               <tr>
                 <td>Project Name</td>
                 <td><input type="text" id="e_project_name" style="border: 0;color: #010047" readonly ></td>
               </tr>
               <tr>
                 <td>Expense Type</td>
                 <td><input input type="text" id="e_expense_type" style="border: 0;color: #010047" readonly >
                  <input type="hidden" id="original_id">
                 </td>
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



<script>
$(document).ready(function(){
  load_data();
  function load_data(query)
  {
    $.ajax({
      url:'<?php echo base_url();?>Expense/search_expense_to',
      method:"post",
      data:{query:query},
      success:function(data)
      {
        $('#result').html(data);
      }
    });
  }
  
  $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search == '')
    {
      
      load_data();
    }
    else
    {
      load_data(search);      
    }
  });
});
</script>



