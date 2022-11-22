<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "App");
	mysqli_set_charset($db_link, "utf8");
	date_default_timezone_set("Asia/Taipei");
	$at=$_POST['at'];
	$ymrs1=$_POST['ymrs1'];
	$ymrs2=$_POST['ymrs2'];
	$ymrs3=$_POST['ymrs3'];
	$ymrs4=$_POST['ymrs4'];
	$ymrs5=$_POST['ymrs5'];
	$ymrs6=$_POST['ymrs6'];
	$ymrs7=$_POST['ymrs7'];
	$ymrs8=$_POST['ymrs8'];
	$ymrs9=$_POST['ymrs9'];
	$ymrs10=$_POST['ymrs10'];
	$ymrs11=$_POST['ymrs11'];
	$hamd1=$_POST['hamd1'];
	$hamd2=$_POST['hamd2'];
	$hamd3=$_POST['hamd3'];
	$hamd4=$_POST['hamd4'];
	$hamd5=$_POST['hamd5'];
	$hamd6=$_POST['hamd6'];
	$hamd7=$_POST['hamd7'];
	$hamd8=$_POST['hamd8'];
	$hamd9=$_POST['hamd9'];
	$hamd10=$_POST['hamd10'];
	$hamd11=$_POST['hamd11'];
	$hamd12=$_POST['hamd12'];
	$hamd13=$_POST['hamd13'];
	$hamd14=$_POST['hamd14'];
	$hamd15=$_POST['hamd15'];
	$hamd16=$_POST['hamd16'];
	$hamd17=$_POST['hamd17'];
	$hamd18=$_POST['hamd18'];
	$hamd19=$_POST['hamd19'];
	$hamd20=$_POST['hamd20'];
	$hamd21=$_POST['hamd21'];
	$hamd22=$_POST['hamd22'];
	$hamd23=$_POST['hamd23'];
	$hamd24=$_POST['hamd24'];

	$datetime = date("Y-m-d H:i:s");
	$sqli = "INSERT INTO app.clin_scale (Account, datetime, ymrs1, ymrs2, ymrs3, ymrs4, ymrs5, ymrs6, ymrs7, ymrs8, ymrs9, ymrs10, ymrs11, hamd1, hamd2, hamd3, hamd4, hamd5, hamd6, hamd7, hamd8, hamd9, hamd10, hamd11, hamd12, hamd13, hamd14, hamd15, hamd16, hamd17, hamd18, hamd19, hamd20, hamd21, hamd22, hamd23, hamd24)
	VALUES ('".$at."','".$datetime."','".$ymrs1."','".$ymrs2."','".$ymrs3."','".$ymrs4."','".$ymrs5."','".$ymrs6."','".$ymrs7."','".$ymrs8."','".$ymrs9."','".$ymrs10."','".$ymrs11."','".$hamd1."','".$hamd2."','".$hamd3."','".$hamd4."','".$hamd5."','".$hamd6."','".$hamd7."','".$hamd8."','".$hamd9."','".$hamd10."','".$hamd11."','".$hamd12."','".$hamd13."','".$hamd14."','".$hamd15."','".$hamd16."','".$hamd17."','".$hamd18."','".$hamd19."','".$hamd20."','".$hamd21."','".$hamd22."','".$hamd23."','".$hamd24."')";

	//檢查是否成功
	$success=0;
	if($db_link->query($sqli)){
		$success=1;
	}
	$response["success"]=$success;
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');
	die(json_encode([$response]));
	
	$db_link->close();
?>