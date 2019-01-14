


<!DOCTYPE html>
<html>
<head>
    <title>Individual Leave Report</title>
    <div  id = "report">
    <link rel="stylesheet" href="<?php echo base_url();?>css/main.css" type="text/css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap_3.3.7.min.css">
    <link href="<?php echo base_url();?>css/simple-sidebar.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui_1.12.1.css">
    <link href="<?php echo base_url();?>css/jquery-ui-timepicker-addon.css" rel="stylesheet">
    <script src="<?php echo base_url();?>js/jquery_3.2.1.min.js"></script>
    
    <script src="<?php echo base_url();?>js/bootstrap_3.3.7.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui_1.12.1.js"></script>
    <script src="<?php echo base_url();?>js/jquery-ui-timepicker-addon.js"></script>
<style>
h4   {
    color: #0080ff;
    margin-left:10px;
    border:5px solid #0080ff;
    
    padding:10px;
    display:inline-block;
}
table, td, th { 
     text-align="center"
    
}

table {
    border-collapse: collapse;
    
    width: 85%;
    float :left;
    margin-right : 20px;
    margin-left : 20px;
}
tr:nth-child(even){background-color: #f2f2f2}

th, td {
    padding: 1px;
    
}
th {
    background-color:#42b0f4;
}

td {
    font-size:12px;
}
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 5px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
</head>
<body>

<div class="body">
 <table class="table table-bordered" style="background: white;" >   
<tr>
<td colspan="10" align="right"> <?php echo "Print-date: ".date('y-m-d  h:i:s a')?></td>
</tr>

<tr>
<td colspan="10" align="center">       <span  style="font-size:20px; ">2RA Technology Limited<span><br>
<span  style="font-size:16px;"><p>Individual Leave Report</p><span>
                
</td>
</tr>
</table>
<table class="table table-bordered" style="background: white;" >


<thead >
<tr>
    <th width="350px;"><b>Leave Name</b></th>
     <th><b>Leave Limit</b></th>
    <th width="276px;"><b>Availed</b></th>
    <th width="257px;"><b>Balance</b></th>
   
</tr> 
</thead>  
<?php foreach ($past_leave_data as  $leave_data) {
$balance=$leave_data->limits - $leave_data->no_of_days;

 ?>



    
<tr>
    
    <td><?php echo $leave_data->leave_full_name; ?></td>
     <td><?php echo $leave_data->limits; ?></td>
    <td><?php echo $leave_data->no_of_days; ?></td>
    <td><?php echo $balance; ?></td>
   
</tr>
    
<?php } ?> 

<?php foreach ($past_leave_data_yearly as  $data_yearly) {
$balances=$data_yearly->limits - $data_yearly->no_of_days;

 ?>



    
<tr>
    
    <td><?php echo $data_yearly->leave_full_name; ?></td>
    <td><?php echo $data_yearly->limits; ?></td>
    <td><?php echo $data_yearly->no_of_days; ?></td>
    <td><?php echo $balances; ?></td>
    
</tr>
    
<?php } ?> 


<?php foreach ($remaining_leave_list as  $leave_list) {

 ?>



    
<tr>
    
    <td><?php echo $leave_list->leave_full_name; ?></td>
    <td><?php echo $leave_list->limits; ?></td>
    <td>0</td>
    <td><?php echo $leave_list->limits; ?></td>
    
</tr>
    
<?php } ?>


    </table>


</div>





</div>
</body>

</html>
<script>
    $(document).ready(function() {
 $("#btn_generate_pdf").click(function(){  
  $("#pdf").submit();
    }); 

 $("#btn_generate_excel").click(function(){  
  $("#excel").submit();
    });

        });
            
    function printDiv() {
        var divToPrint = document.getElementById('report').innerHTML;
        var myWindow=window.open();
        myWindow.document.write(divToPrint);
        myWindow.document.close();
        myWindow.focus();
        myWindow.print();
        myWindow.close();
    }
  </script>


