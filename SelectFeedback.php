<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "App");
	mysqli_set_charset($db_link, "utf8");
	$at=$_POST['at'];
	$type=$_POST['type'];
	if ($type == 0){
		$sql = "SELECT inf.type as inf_type, inf.write as inf_write, datetime FROM app.inf where Account='".$at."' and type != '2' ORDER BY Datetime DESC";
	}elseif ($type == 1){
		$sql = "SELECT inf.type as inf_type, inf.write as inf_write, datetime FROM app.inf where Account='".$at."' and (type='0' or type='1' or type='3') ORDER BY Datetime DESC";
	}elseif ($type == 2){
		$sql = "SELECT inf.type as inf_type, inf.write as inf_write, datetime FROM app.inf where Account='".$at."' and (type = '5' or type = '8') ORDER BY Datetime DESC";
	}elseif ($type == 3){
		$sql = "SELECT inf.type as inf_type, inf.write as inf_write, datetime FROM app.inf where Account='".$at."' and type = '4' ORDER BY Datetime DESC";
	}elseif ($type == 4){
		$sql = "SELECT asrm1+asrm2+asrm3+asrm4+asrm5 as asrm, dass1+dass2+dass3+dass4+dass5+dass6+dass7+dass8+dass9+dass10+dass11+dass12+dass13+dass14+dass15+dass16+dass17+dass18+dass19+dass20+dass21 as dass , datetime FROM app.self_scale where Account='".$at."'ORDER BY Datetime DESC";
		// $sql = "SELECT inf.type as inf_type, inf.write as inf_write, datetime FROM app.inf where Account='".$at."' and (type = '6' or type = '7') ORDER BY Datetime DESC";
	}

	
	$sql_query = mysqli_query($db_link, $sql);
	while($row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC))
		$output[]=$row;
	print(json_encode($output));
	//echo json_encode($output);
	mysqli_close($db_link);
?>