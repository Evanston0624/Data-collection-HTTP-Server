<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "App");
	mysqli_set_charset($db_link, "utf8");
	$at=$_POST['at'];

	if (isset($_POST["startdate"]) && isset($_POST["enddate"])){
		$startdate=$_POST['startdate']." 00:00:00";
		$enddate=$_POST['enddate']." 00:00:00";
		$sql = "SELECT * FROM app.user_phone where Account='".$at."' and date>'".$startdate."' and date<'".$enddate."' ORDER BY date asc";//DESC asc
	}else{
		$sql = "SELECT * FROM app.user_phone where Account='".$at."' ORDER BY date asc";//DESC asc
	}
	
	$sql_query = mysqli_query($db_link, $sql);
	while($row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC))
		$output[]=$row;
	print(json_encode($output));
	//echo json_encode($output);
	mysqli_close($db_link);
?>