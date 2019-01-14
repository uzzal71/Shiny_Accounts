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
	$successEmpId='';
	$successEmpDate='';

    for ($i=0; $i<count($deviceId); $i++){
        if ($deviceType=='FD'){
            $employ_id=$cardId[$i];
            $sql="SELECT card_id, first_name, last_name FROM tbl_employee WHERE employee_id='$employ_id'";
            $row=$db->query($sql)->fetch(PDO::FETCH_ASSOC);
            $card_id=$row['card_id'];
            $employ_name=$row['first_name'] .' ' .$row['last_name'];
        }
        elseif ($deviceType=='EF'){
            $card_id=$cardId[$i];
            $sql="SELECT employee_id, first_name, last_name FROM tbl_employee WHERE card_id='$card_id'";
            $row=$db->query($sql)->fetch(PDO::FETCH_ASSOC);
            $employ_id=$row['employee_id'];
            $employ_name=$row['first_name'] .' ' .$row['last_name'];
        }
        $selectDev="SELECT company_id,location FROM tbl_devices WHERE DevId='$deviceId[$i]'";
        $selectDevRow=$db->query($selectDev)->fetch(PDO::FETCH_ASSOC);
        $company_id=$selectDevRow['company_id'];
        $location=$selectDevRow['location'];
        // $sql="INSERT INTO tbl_attendense (company_id,cid,employee_id,employee_name,ctime,purpose,location,sl_no,device_id) VALUES ('$company_id','$card_id','$employ_id','$employ_name','$punchTime[$i]','$purpose[$i]','$location','$sleveNo[$i]','$deviceId[$i]')";
        $sql="INSERT INTO `tbl_card`(`company_id`, `cid`, `employee_id`, `employee_name`, `ctime`, `device_id`, `purpose`, `sl_no`, `entry_time`) 
		                      VALUES('$company_id','$card_id','$employ_id','$employ_name','$punchTime[$i]','$deviceId[$i]','$purpose[$i]','$sleveNo[$i]','$curTime')";
        $row=$db->query($sql);
        if ($row==true){
            $successEmpId=$successEmpId . ',' . $employ_id;
			$successEmpDate=$successEmpDate .',' . $punchTime[$i];
        }
    }
	
	if($successEmpId=='' && $successEmpDate==''){
		echo 'Failed';
	}
	else{
		echo $successEmpId .';' .$successEmpDate;
	}




