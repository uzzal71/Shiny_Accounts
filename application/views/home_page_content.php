<div class="row">
        <div class="col-md-12">
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="row">
                            <div style="margin-left: 220px;" >
                                
                                <table class="table table-bordered" style="background: white;">
                                    <thead>
                                        <tr>
                                            
                                            <th><b>Name</b></th>
                                            <th><b>Employee ID</b></th>
                                            <th><b>Card ID</b></th>
                                            <th><b>Employee Due</b></th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td><?php //echo ->first_name.' '.$employee_data->last_name; ?></td>
                                        <td><?php  //echo $employee_data->employee_id ?></td>
                                        <td><?php  //echo $employee_data->card_id ?></td>
                                        <td><button type="button" class="btn btn-info" id="due">View Due</button></td>
                                        

                                    </tr>

                                </table>

                                <br>
                                        <table class="table table-bordered" style="background: white;" >


<thead >
<tr>
    <th width="259px;"><b>Leave Name</b></th>
    <th width="276px;"><b>Availed</b></th>
    <th width="257px;"><b>Balance</b></th>
    <th><b>Leave Limit</b></th>
</tr> 
</thead>  
<?php foreach ($past_leave_data as  $leave_data) {
$balance=$leave_data->limits - $leave_data->no_of_days;

 ?>



    
<tr>
    
    <td><?php echo $leave_data->leave_full_name; ?></td>
    <td><?php echo $leave_data->no_of_days; ?></td>
    <td><?php echo $balance; ?></td>
    <td><?php echo $leave_data->limits; ?></td>
</tr>
    
<?php } ?> 

<?php foreach ($past_leave_data_yearly as  $data_yearly) {
$balances=$data_yearly->limits - $data_yearly->no_of_days;

 ?>



    
<tr>
    
    <td><?php echo $data_yearly->leave_full_name; ?></td>
    <td><?php echo $data_yearly->no_of_days; ?></td>
    <td><?php echo $balances; ?></td>
    <td><?php echo $data_yearly->limits; ?></td>
</tr>
    
<?php } ?> 


<?php foreach ($remaining_leave_list as  $leave_list) {

 ?>



    
<tr>
    
    <td><?php echo $leave_list->leave_full_name; ?></td>
    <td>0</td>
    <td><?php echo $leave_list->limits; ?></td>
    <td><?php echo $leave_list->limits; ?></td>
</tr>
    
<?php } ?>


    </table>

                            </div>
                            <div class="col-md-4" style="background-color: white;padding: 1px" >
                                
                                

                            </div>


                            <div class="col-md-6">
                                <h4 style="color: #75ce02;text-align: center">Your Pending Tasks...</h4><br>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div id="custom-table" class="col-sm-12 col-md-10" style="background-color: white;padding: 1px">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th align="center" class="col-xs-1" >SL#</th>
                                            <th align="center" class="col-xs-1" >Project ID</th>
                                            <th align="center" class="col-xs-1" >Section ID</th>
                                            <th align="center" class="col-xs-2" >Assigned Date</th>
                                            <th align="center" class="col-xs-2" >Primary Estimated Days</th>
                                            <th align="center" class="col-xs-2" >Latest Estimated Days</th>
                                            <th align="center" class="col-xs-1" >Priority</th>
                                            <th align="center" class="col-xs-2" >Assigned By</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="8" align="center">
                                                <h5><b>No Data Available</b></h5>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        
        $("#due").click(function(){
                    var employee_due = <?php echo $employee_data->employee_due; ?>;
                    var message =" Your Due is : ";
                    var res = message.concat(employee_due).concat(" BDT");
                    alert(res);
                    
            });
    </script>