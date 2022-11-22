<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "App");
	mysqli_set_charset($db_link, "utf8");
	date_default_timezone_set("Asia/Taipei");
	$time = date("Y-m-d H:i:s");
	// $at=$_GET['at'];
	// $pen=$_GET['pen'];
	$at=$_POST['at'];
	$pen=$_POST['pen'];
	$pointexn = intval($pen)*10;
	//查值
	$sql = "SELECT * FROM user where account='".$at."'";
	$sql_query = mysqli_query($db_link, $sql);
	while($row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC))
		$output=$row;
	$nowpoint = $output['Drop'];
	//計算剩餘
	$newpoint = $nowpoint - $pointexn;
	//更新
	if ($nowpoint >= 0){
		mysqli_query($db_link,"UPDATE app.user SET user.Drop='".$newpoint."' WHERE Account='".$at."'");

		mysqli_query($db_link,"INSERT INTO app.his_re 
			(Account, his_re.Wrile, his_re.Datetime) 
			VALUES ('".$at."','".$pen."','".$time."')");
		//檢查是否成功
		$sql = "SELECT * FROM user where account='".$at."'";
		$sql_query = mysqli_query($db_link, $sql);
		while($row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC))	
			$arr=$row;
		if ($arr['Drop'] == $newpoint){
			$success=1;
			$response["success"]=$success;
		}else{
			$success=0;
			$response["success"]=$success;
		}
	}else{
		$success=0;
		$response["success"]=$success;
	}
	
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');
	die(json_encode($response));
	
	$db_link->close();
?>