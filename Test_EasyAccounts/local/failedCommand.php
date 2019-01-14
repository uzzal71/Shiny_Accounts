<?php
    require_once 'dbConnect.php';
    $failedIds=$_GET['failedId'];
    $failedId=explode(',',$failedIds);
    $success='';
    foreach ($failedId as $failId){
        $sql = "UPDATE tbl_command_list set status=0 WHERE id=$failId";
        $row=$db->query($sql);
        if($row==true){
			$success=$failId .';' .$success;
        }
    }
    if ($success==''){
        echo 'Failed';
    }
    else{
        echo $success;
    }
?>

