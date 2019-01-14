<?php
	require_once ('dbConnect.php');
	$deviceID = explode(',',$_GET['deviceID']);
    $cardQuantity = explode(',',$_GET['cardQuantity']);
    $FreeCard = explode(',',$_GET['FreeCard']);
    $success='';
	
	for ($i=0;$i<count($deviceID);$i++){
		if($deviceID[$i] !=''){
			$sql = "UPDATE tbl_devices SET CardQty ='$cardQuantity[$i]', CardqtyApp = '$FreeCard[$i]' WHERE DevId='$deviceID[$i]' ";
			$row=$db->query($sql);
			if ($row == true){
			    $success = $deviceID[$i] .';' .$success;
            }
		}
	}
	if ($success==''){
	    echo 'Failed';
    }
	else{
		echo $success;
	}

?>
