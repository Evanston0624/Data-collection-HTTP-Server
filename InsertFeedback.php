
<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "app");
	mysqli_set_charset($db_link ,"utf8");
	date_default_timezone_set("Asia/Taipei");

	$success=0;
	$Account = $_POST['at'];
	$type = $_POST['type'];
	$write = $_POST['write'];
	$ThisDay = date("Y-m-d H:i:s");
	
	$sqli = "INSERT INTO app.feedback
		(feedback.Account, feedback.type, feedback.datetime, feedback.write) 
		VALUES ('".$Account."','".$type."','".$ThisDay."','".$write."')";
	
	// echo $sqli;
	
	if($db_link->query($sqli)){
		$success=1;
	}
	$response["success"]=$success;
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');
	die(json_encode($response));
	$db_link->close();
?>