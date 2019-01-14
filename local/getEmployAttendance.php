<?php
require_once ('dbConnect.php');

date_default_timezone_set('Asia/Dhaka');
$curTime=date('Y-m-d H:i:s');

$deviceType = $_GET['deviceType'];
$cardId=explode(',',$_GET['cardId']);
$punchTime=explode(',',$_GET['punchTime']);
$purpose=explode(',',$_GET['purpose']);
$deviceId=explode(',',$_GET['deviceId']);
$sleveNo=explode(',',$_GET['sleveNo']);
$company_id = $_GET['companyID'];

$successEmpData='';

if ($deviceType == 'FD') 
{
	for ($i=0; $i<count($deviceId); $i++)
    {
    	if($cardId[$i] !='')
	   {
			$employ_id=$cardId[$i];

			$sql="SELECT card_id, first_name, last_name FROM tbl_employee WHERE employee_id = '$employ_id' AND company_id = '$company_id'";

			$row=$db->query($sql)->fetch(PDO::FETCH_ASSOC);

			$card_id=$row['card_id'];
			$employ_name=$row['first_name'] .' ' .$row['last_name'];

			$sql= "INSERT INTO `tbl_card`(`company_id`, `card_id`, `employee_id`, `employee_name`, `ctime`, `device_id`, `purpose`, `sl_no`, `entry_time`) 
			      VALUES('$company_id','$card_id','$employ_id','$employ_name','$punchTime[$i]','$deviceId[$i]','$purpose[$i]','$sleveNo[$i]','$curTime')";

			$row=$db->query($sql);

			if ($row==true)
			{
				if($successEmpData=='')
				{
					$successEmpData = $employ_id .',' .$punchTime[$i];
				}
				else
				{
					$successEmpData = $successEmpData .';' .$employ_id .',' .$punchTime[$i];
				}
			}
		}


    }

}
else if($deviceType == 'EF')
{
	for ($i=0; $i<count($deviceId); $i++)
    {
    	if ($cardId[$i] != '') 
    	{
    		$card_id=$cardId[$i];

			$sql="SELECT employee_id, first_name, last_name FROM tbl_employee WHERE card_id = '$card_id' AND company_id = '$company_id'";
			$row=$db->query($sql)->fetch(PDO::FETCH_ASSOC);

			$employ_id=$row['employee_id'];
			$employ_name=$row['first_name'] .' ' .$row['last_name'];

			$sql="INSERT INTO `tbl_card`(`company_id`, `card_id`, `employee_id`, `employee_name`, `ctime`, `device_id`, `purpose`, `sl_no`, `entry_time`) 
			VALUES('$company_id','$card_id','$employ_id','$employ_name','$punchTime[$i]','$deviceId[$i]','$purpose[$i]','$sleveNo[$i]','$curTime')";

			$row=$db->query($sql);

			if ($row==true)
			{
				if($successEmpData=='')
				{
					$successEmpData = $card_id .',' .$punchTime[$i];
				}
				else
				{
					$successEmpData = $successEmpData .';' .$card_id .',' .$punchTime[$i];
				}
			}
    	}

    }

}

if($successEmpData=='')
{
	echo 'Failed';
}
else
{
	echo $successEmpData;
}




