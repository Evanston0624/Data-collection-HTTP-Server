<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "App");
	mysqli_set_charset($db_link, "utf8");
	$at=$_POST['at'];

	if (isset($_POST["startdate"]) && isset($_POST["enddate"])){
		$startdate=$_POST['startdate']." 00:00:00";
		$enddate=$_POST['enddate']." 00:00:00";
		//$sql = "SELECT SUM(distance) as a, startlng, endlat, endlng FROM app.gps where Account='".$at."' and formatetime>'".$startdate."' and formatetime<'".$enddate."' ORDER BY formatetime asc";//DESC asc
		$sql = "SELECT  count(*) as count, SUM(distance) as distance, SUM(costtime)/1000 as costtime, avg(speed) as speed, substring(formatetime, 1, 10) as datetime FROM app.gps where Account='".$at."' and costtime <= '86400' and formatetime>'".$startdate."' and formatetime<'".$enddate."' group by datetime desc";
	}else{
		//$sql = "SELECT * FROM app.gps where Account='".$at."' ORDER BY formatetime asc";//DESC asc
		$sql = "SELECT  count(*) as count, SUM(distance) as distance, SUM(costtime)/1000 as costtime, avg(speed) as speed, substring(formatetime, 1, 10) as datetime FROM app.gps where Account='".$at."' and costtime <= '86400' group by datetime desc";
	}
	
	$sql_query = mysqli_query($db_link, $sql);
	while($row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC))
		$output[]=$row;
	print(json_encode($output));
	//echo json_encode($output);
	mysqli_close($db_link);
?>