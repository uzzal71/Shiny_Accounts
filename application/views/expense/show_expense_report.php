<!DOCTYPE html>
<html>
<head>
    <title>Expense Report</title>
    
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

tr.danger {
    background-color: #CC9999; color: black;
}
tr.success {
    background-color: #9999CC; color: black;
}
</style>
</head>
<body>

<div class="body">

<table align="center" style="margin-left: 110px;">
<tr>
<td colspan="12" align="right"> <?php echo "Print-date: ".date('y-m-d  h:i:s a')?></td>
</tr>

<tr>
<!-- <td> <h4><b>Easy Flow</b></h4> </td> -->
<td colspan="12" align="center">       <span  style="font-size:20px; ">2RA Technology Limited<span><br>
<span  style="font-size:16px;"><p>Expense  Report</p><span>
                
</td>
</tr>

<tr ><td></td><td></td><td></td>
<td align="center"><b>From:</b><?php if($from_date) echo $from_date;?></td><td><b>To Date:</b> <?php echo $to_date?> </td><td><b>Project:</b><?php if($project=='select'){
    echo " ";
}else{
    echo $project;
} ?></td><td><b>Expense Type:</b><?php if($expense_types=='select'){
    echo " ";
}else{
    echo $expense_types;
} ?></td><td colspan="2" style="margin-left: 80px;"><b>Expense Status:</b><?php if($status=='select'){
    echo " ";
}else if ($status=='approved') {
   
   echo ' '."Approved";

}else if ($status=='pending') {
   
   echo ' '."Pending";

}
 ?></td>
</tr>


<tr>
<th>Sl</th><th>Expense ID</th><th>Expense Date</th><th>Expense Type</th><th>Approve ID</th><th>Approved By</th><th>Voucher No</th> <th>Project ID</th><th>Expensed By</th><th>Type</th><th>Amount</th>
</tr>
<?php

$sl=0;

$total=0;
 $all=0;
foreach ($retrieved_data as $data){
    $sl++; 
    $total=$data->expense_amount;
    $all=$all+$total;
?>


<tr <?php if ($sl%2==0) {
    
    echo "style=\"background-color:#d7dce5\"";
}else{

   
     echo "style=\"background-color:white\"";
    } ?>>
<td width="20px"><?php echo $sl; ?></td>
<td width="100px"><?php  echo $data->expense_id?></td>
<td width="100px" ><?php  echo $data->expense_date?></td>
<td width="100px"><?php  echo $data->expense_type?></td>
<td width="100px"><?php  if($data->approved_id==""){echo "Not Approved";}else{
echo $data->approved_id;
}?></td>
<td width="100px"><?php  if($data->approved_by==""){echo "Not Approved";}else{
echo $data->approved_by;
}?></td>

<td width="80px" ><?php echo $data->voucher_no ?></td>
<td width="80px" ><?php  echo $data->project_id?></td>

<td width="130px" ><?php  echo $data->expense_by?></td>
<td width="70px" ><?php if($data->is_support==1){

echo "Support";}else{
    echo "Project";
}
?></td>

<td width="50px" align="right" ><?php echo sprintf("%.2f", $data->expense_amount);  ?></td>

<?php } ?>

</tr>
<tr>
<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><b style="margin-left:15px;">Total:</b></td><td><?php echo "<b style='margin-left:0px'>".sprintf("%.2f", $all)."</b>"; ?></td>
</tr>
<!--<td><?php var_dump($all);?></td> -->
</table>

</div>
<!-- 
<form method="post" name="excel" id="excel" action="<?php echo base_url();?>Holiday/show_holiday_report_excel"  target="_blank">
<input type="hidden" name="from_date" value = "<?php echo $from_date;?>">
<input type="hidden" name="to_date" value = "<?php echo $to_date;?>">
<input type="hidden" name="chk_to_date" value = "<?php echo $chk_to_date;?>"> -->
<!-- <input type="hidden" name="chk_to_date" value = "<?php echo $supplier_id;?>">
<input type="hidden" name="chk_to_date" value = "<?php echo $transaction_id;?>"> -->
</form>

<!-- <form method="post" name="pdf" id="pdf"   action="<?php echo base_url();?>Inventory/show_issue_report_pdf"  target="_blank">
<input type="hidden" name="from_date" value = "<?php echo $from_date1;?>">
<input type="hidden" name="to_date" value = "<?php echo $to_date1;?>">
<input type="hidden" name="chk_to_date" value = "<?php echo $chk_to_date;?>">
<input type="hidden" name="employee_id" value = "<?php echo $employee_id;?>">
<input type="hidden" name="project_id" value = "<?php echo $project_id;?>">
<input type="hidden" name="issue_id" value = "<?php echo $issue_id;?>">
</form> -->

<!-- <div class="dropdown">
 <button class="dropbtn">Export</button>
 <div class="dropdown-content">
<button type="submit"  name="submit" id="btn_generate_pdf" class="btn btn-primary">PDF</button><br>
<button type="submit"  name="submit" id="btn_generate_excel" class="btn btn-primary">Excel</button>
<button class="btn btn-primary" onclick="printDiv()">Print Report</button>
  </div> -->
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


