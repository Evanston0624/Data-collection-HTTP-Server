<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "App");
	mysqli_set_charset($db_link, "utf8");
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');
	$mn=$_POST['mn'];

	$sql = "SELECT account, Mednum FROM app.user where Mednum='".$mn."'";//DESC asc

	
	$sql_query = mysqli_query($db_link, $sql);
	while($row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC))
		$arr[]=$row;
	if (empty($arr)){
		$arr["account"]="";
		print(json_encode([$arr]));
	}else{
		print(json_encode($arr));
	}
	// print(json_encode($arr));
	// echo json_encode($output);
	mysqli_close($db_link);
?>