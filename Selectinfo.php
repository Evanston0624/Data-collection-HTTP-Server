<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "App");
	mysqli_set_charset($db_link, "utf8");
	$at=$_POST['at'];

	if (isset($_POST["startdate"]) && isset($_POST["enddate"])){
		$startdate=$_POST['startdate']." 00:00:00";
		$enddate=$_POST['enddate']." 00:00:00";
		$sql = "SELECT *, substring(datetime, 1, 10) as datetime2 FROM app.inf where Account='".$at."' and Datetime>'".$startdate."' and Datetime<'".$enddate."' and (type='0' or type='1' or type='2' or type='3')ORDER BY Datetime asc";//DESC asc
	}else{
		$sql = "SELECT *, substring(datetime, 1, 10) as datetime2 FROM app.inf where Account='".$at."' and (type='0' or type='1' or type='2' or type='3') ORDER BY Datetime asc";//DESC asc
	}
	
	$sql_query = mysqli_query($db_link, $sql);
	while($row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC))
		$output[]=$row;
	print(json_encode($output));
	//echo json_encode($output);
	mysqli_close($db_link);
?>