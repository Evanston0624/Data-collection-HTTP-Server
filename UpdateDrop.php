
<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "app");
	mysqli_set_charset($db_link ,"utf8");
	
	$success=0;
	// $at = $_GET['at'];
	$at=$_POST['at'];

	$sql = "SELECT * FROM app.user where Account = '".$at."'";
	$sql_query = mysqli_query($db_link, $sql);
	while($row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC))	
		$arr=$row;
	$pt = $arr['Point_v2'];

	if ($pt >= 1000){
		$Drop =$arr['Drop'];

		$pt = $pt - 1000;
		$Drop = $Drop + 10;
		$sql = "UPDATE app.user SET Point_v2='".$pt."' , user.Drop = '".$Drop."' WHERE Account='".$at."'";
		// print($sql);

		if($db_link->query($sql)){
			$success=1;
			$response["success"]=$success;
		}else{
			$response["success"]=$success;
		}
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