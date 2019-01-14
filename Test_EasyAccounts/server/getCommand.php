<?php
    require_once ('dbConnect.php');
    $response ='';
    $sql="SELECT * FROM tbl_command_list WHERE status=1 ORDER BY id LIMIT 50";
    $row=$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    foreach ($row as $data){
        $response = $data['id'] .',' .$data['deviceId'] .',' .$data['actionCode'] .',' .$data['value'] .';' .$response;
    }
    $updateData="UPDATE tbl_command_list set status=2 WHERE status=1 ORDER BY id LIMIT 50";
	$db->query($updateData);
    if ($response == ''){
        echo 0;
    }
    else{
        echo $response;
    }
?>
