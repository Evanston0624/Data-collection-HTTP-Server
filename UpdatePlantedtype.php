
<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "app");
	mysqli_set_charset($db_link ,"utf8");
	
	$success=0;
	// $at = $_GET['at'];
	// $pty = $_GET['pty'];

	$at=$_POST['at'];
	$pty=$_POST['pty'];

	$sql = "UPDATE app.user SET Plantedtype='".$pty."' WHERE Account='".$at."'";

	if($db_link->query($sql)){
		$success=1;
		$response["success"]=$success;
	}else{
		$response["success"]=$success;
	}

	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');
	die(json_encode($response));
	$db_link->close();
?>