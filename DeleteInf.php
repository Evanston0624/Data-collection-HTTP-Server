
<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "app");
	mysqli_set_charset($db_link ,"utf8");
	
	$success=0;
	$status="Active";
	$at = $_GET['at'];
	$time = str_replace("+", " ", $_GET['time']);
	$write = str_replace("+", " ", $_GET['content']);

	$sql = "UPDATE app.inf SET inf.write='".$write."' WHERE Account='".$at."' and Datetime = '".$time."'";
	if($db_link->query($sql)){
	}
	// echo $sql;
	$sql = "SELECT inf.write as infwrite, Datetime FROM app.inf where Account='".$at."' and Datetime = '".$time."'";

	$sql_query = mysqli_query($db_link, $sql);
	while($row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC))	
		$arr=$row;
	if(empty($arr) || is_null($arr)){
		$response["success"]=$success;
	}else{
		$infwrite = $arr['infwrite'];
		if(strcmp($write,$infwrite)){
			$response["success"]=$success;
		}else{
			$success=1;
			$response["success"]=$success;
		}
	}
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');
	die(json_encode($response));
	$db_link->close();
?>