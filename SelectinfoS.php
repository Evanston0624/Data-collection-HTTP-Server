<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "App");
	mysqli_set_charset($db_link, "utf8");
	$at=$_POST['at'];

	// if (isset($_POST["startdate"]) && isset($_POST["enddate"])){
	// 	$startdate=$_POST['startdate']." 00:00:00";
	// 	$enddate=$_POST['enddate']." 00:00:00";
	// 	$sql = "SELECT * FROM app.inf where Account='".$at."' and Datetime>'".$startdate."' and Datetime<'".$enddate."' and (type = '5') ORDER BY Datetime asc";//DESC asc
	// }else{
	// 	$sql = "SELECT * FROM app.inf where Account='".$at."' and (type = '5') ORDER BY Datetime asc";//DESC asc
	// }
	if (isset($_POST["startdate"]) && isset($_POST["enddate"])){
		$startdate=$_POST['startdate']." 00:00:00";
		$enddate=$_POST['enddate']." 00:00:00";
		$sql = "SELECT type, substring(inf.write, 12, 2) as infh, substring(inf.write, 15, 2) as infm, substring(datetime, 1, 10) as infdate FROM app.inf where Account='".$at."' and Datetime>'".$startdate."' and Datetime<'".$enddate."' and (type = '5' or type = '8') ORDER BY Datetime asc";//DESC asc
	}else{
		$sql = "SELECT type, substring(inf.write, 12, 2) as infh, substring(inf.write, 15, 2) as infm, substring(datetime, 1, 10) as infdate FROM app.inf where Account='".$at."' and (type = '5' or type = '8') ORDER BY Datetime asc";//DESC asc
	}
	
	$sql_query = mysqli_query($db_link, $sql);
	while($row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC))
		$output[]=$row;
	print(json_encode($output));
	//echo json_encode($output);
	mysqli_close($db_link);
?>