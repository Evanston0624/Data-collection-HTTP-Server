
<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "app");
	mysqli_set_charset($db_link ,"utf8");
	
	$success=0;
	$at = $_GET['at'];

	$sql = "SELECT * FROM app.user where Account = '".$at."'";
	$sql_query = mysqli_query($db_link, $sql);
	while($row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC))	
		$arr=$row;

	$pt = $arr['Point_v2'];
	$Disappear =$arr['Disappear'];
	if ($Disappear == 1){
		if ($pt%1000 >= 250){
			$new_pt = $pt - 250;
		}else if($pt%1000 < 250){
			$new_pt = $pt-$pt%1000;
		}
		// print($Disappear."\n");
		// print($pt."\n");
		// print(($pt - 250)."\n");
		// print($pt-$pt%1000);

		$sql = "UPDATE app.user SET Point_v2='".$new_pt."' , Disappear = '0' WHERE Account='".$at."'";

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