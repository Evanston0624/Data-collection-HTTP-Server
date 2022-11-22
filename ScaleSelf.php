<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "App");
	mysqli_set_charset($db_link, "utf8");
	date_default_timezone_set("Asia/Taipei");
	$at=$_POST['at'];
	$asrm1=$_POST['asrm1'];
	$asrm2=$_POST['asrm2'];
	$asrm3=$_POST['asrm3'];
	$asrm4=$_POST['asrm4'];
	$asrm5=$_POST['asrm5'];
	$dass1=$_POST['dass1'];
	$dass2=$_POST['dass2'];
	$dass3=$_POST['dass3'];
	$dass4=$_POST['dass4'];
	$dass5=$_POST['dass5'];
	$dass6=$_POST['dass6'];
	$dass7=$_POST['dass7'];
	$dass8=$_POST['dass8'];
	$dass9=$_POST['dass9'];
	$dass10=$_POST['dass10'];
	$dass11=$_POST['dass11'];
	$dass12=$_POST['dass12'];
	$dass13=$_POST['dass13'];
	$dass14=$_POST['dass14'];
	$dass15=$_POST['dass15'];
	$dass16=$_POST['dass16'];
	$dass17=$_POST['dass17'];
	$dass18=$_POST['dass18'];
	$dass19=$_POST['dass19'];
	$dass20=$_POST['dass20'];
	$dass21=$_POST['dass21'];
	//新增
	$datetime = date("Y-m-d H:i:s");

	$sqli = "INSERT INTO app.self_scale (Account, datetime, asrm1, asrm2, asrm3, asrm4, asrm5, dass1, dass2, dass3, dass4, dass5, dass6, dass7, dass8, dass9, dass10, dass11, dass12, dass13, dass14, dass15, dass16, dass17, dass18, dass19, dass20, dass21)
	VALUES ('".$at."','".$datetime."','".$asrm1."','".$asrm2."','".$asrm3."','".$asrm4."','".$asrm5."','".$dass1."','".$dass2."','".$dass3."','".$dass4."','".$dass5."','".$dass6."','".$dass7."','".$dass8."','".$dass9."','".$dass10."','".$dass11."','".$dass12."','".$dass13."','".$dass14."','".$dass15."','".$dass16."','".$dass17."','".$dass18."','".$dass19."','".$dass20."','".$dass21."')";

	//檢查是否成功
	$success=0;
	if($db_link->query($sqli)){
		$success=1;
	}
	$response["success"]=$success;
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');
	die(json_encode([$response]));
	
	$db_link->close();
?>