
<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "app");
	mysqli_set_charset($db_link ,"utf8");
	
	$success=0;
	$status="Active";
	$at = $_POST['at'];
	$date = str_replace("+", " ", $_POST['date']);
	$write = str_replace("+", " ", $_POST['write']);
	$type = str_replace("+", " ", $_POST['type']);

	$sql = "UPDATE app.inf SET inf.write='".$write."' WHERE inf.Account='".$at."' and inf.datetime='".$date."' and inf.type='".$type."'";
	$sql_query = mysqli_query($db_link, $sql);

	$sql = "SELECT inf.write as infwrite FROM app.inf where inf.Account='".$at."' and inf.datetime='".$date."' and inf.type='".$type."'";

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