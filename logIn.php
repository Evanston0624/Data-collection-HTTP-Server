<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "App");
	mysqli_set_charset($db_link, "utf8");
	// $at=$_GET['at'];
	$at=$_POST['at'];
	$pw=$_POST['pw'];
	$sql = "SELECT * FROM user where account='".$at."' and password='".$pw."'";
	$sql_query = mysqli_query($db_link, $sql);
	while($row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC))
		$arr=$row;
	if (empty($arr)){
		$success=0;
	}else{
		$success=1;
	}
	$response["success"]=$success;
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');
	print(json_encode([$response]));
	mysqli_close($db_link);
?>