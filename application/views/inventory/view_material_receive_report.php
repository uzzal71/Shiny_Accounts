<!DOCTYPE html>
<html>
<head>
	<title>Items Report</title>
    
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

<table>
<tr>
<td colspan="10" align="right"> <?php echo "print-date: ".date('y-m-d  h:i:s a')?></td>
</tr>

<tr>
<!-- <td> <h4><b>Easy Flow</b></h4> </td> -->
<td colspan="10" align="center">       <span  style="font-size:20px; ">2RA Technology Limited<span><br>
<span  style="font-size:16px;"><p>Material Recieve Report</p><span>
				
</td>
</tr>

<tr>
<td colspan="1"><b>From:</b> <?php if($from_date) echo $from_date;?></td>  <td colspan="1"><b>To Date:</b> <?php echo $to_date?> </td>
</tr>


<tr>
<th>Recieve ID</th><th>Item Name</th><th>Item ID</th> <th>Quantity</th> <th>Unit Price</th> <th>Total Price</th><!-- <th>Supplier ID</th> -->
</tr>
<?php

$sl=0;

//print_r($recieve_items_report_info);exit();


foreach ($recieve_items_report_info as $each_recieved_info){
	$sl++;
?>
<tr >
<th style="background-color: #4CAF50"><?php echo $each_recieved_info->log_id?></th><th style="background-color: #4CAF50"></th><th style="background-color: #4CAF50"></th><th style="background-color: #4CAF50"></th><th style="background-color: #4CAF50"></th><th style="background-color: #4CAF50"></th><th style="background-color: #4CAF50"></th>
</tr>
<?php 

$log_data =json_decode ($each_recieved_info->transaction_log);

foreach ($log_data as $key => $log_info) {?>
<tr>
<td></td>
<td><?php  echo $log_info->item_name?></td>
<td><?php  echo $log_info->item_id?></td>
<td><?php  echo $log_info->quantity?></td>
<td><?php  echo $log_info->unit_price?></td>
<td><?php  echo $log_info->total_price?></td>
<td><?php  //echo $log_info->supplier_id?></td>
<?php } ?>

</tr>
<?php } ?>
</table>

</div>

<form method="post" name="excel" id="excel" action="<?php echo base_url();?>Holiday/show_holiday_report_excel"  target="_blank">
<input type="hidden" name="from_date" value = "<?php echo $from_date;?>">
<input type="hidden" name="to_date" value = "<?php echo $to_date;?>">
<input type="hidden" name="chk_to_date" value = "<?php echo $chk_to_date;?>">
<input type="hidden" name="chk_to_date" value = "<?php echo $supplier_id;?>">
<input type="hidden" name="chk_to_date" value = "<?php echo $transaction_id;?>">
</form>

<form method="post" name="pdf" id="pdf"   action="<?php echo base_url();?>Inventory/show_material_receive_report_pdf"  target="_blank">
<input type="hidden" name="from_date" value = "<?php echo $from_date1;?>">
<input type="hidden" name="to_date" value = "<?php echo $to_date1;?>">
<input type="hidden" name="chk_to_date" value = "<?php echo $chk_to_date;?>">
<input type="hidden" name="supplier_id" value = "<?php echo $supplier_id;?>">
<input type="hidden" name="transaction_id" value = "<?php echo $transaction_id;?>">
</form>

<div class="dropdown">
 <button class="dropbtn">Export</button>
 <div class="dropdown-content">
<button type="submit"  name="submit" id="btn_generate_pdf" class="btn btn-primary">PDF</button><br>
<button type="submit"  name="submit" id="btn_generate_excel" class="btn btn-primary">Excel</button>
<button class="btn btn-primary" onclick="printDiv()">Print Report</button>
  </div>
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


