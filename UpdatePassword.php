<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "App");
	mysqli_set_charset($db_link, "utf8");
	date_default_timezone_set("Asia/Taipei");
	$success=0;
	$at=$_POST['at'];
	$pd=$_POST['pd'];

	// $at=$_GET['at'];
	// $pd=$_GET['pd'];
	//更新
	// mysqli_query($db_link,"UPDATE app.user SET password='".$pd."' WHERE Account='".$at."' and user.Name='".$ne."' and user.mobile='".$mobi."'");
	mysqli_query($db_link,"UPDATE app.user SET password='".$pd."' WHERE Account='".$at."'");

	//檢查是否成功
	$sql = "SELECT * FROM user where account='".$at."'";
	$sql_query = mysqli_query($db_link, $sql);
	while($row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC))	
		$arr=$row;
	if ($arr['password'] == $pd){
		$success=1;
		$response["success"]=$success;
	}else{
		$success=0;
		$response["success"]=$success;
	}
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');
	die(json_encode([$response]));
	
	$db_link->close();
?>