<?php
 	date_default_timezone_set("Asia/Taipei");
	include('connectDB.php');
	mysqli_select_db($db_link, "app");
	mysqli_set_charset($db_link ,"utf8");
	
	$success=0;
	$ckn=$_POST['ckn'];
	$account=$_POST['at'];
	$password=$_POST['pw'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	//
	// $ckn= $_GET['ckn'];
	// $account= $_GET['at'];
	// $password= $_GET['pw'];
	// $name = preg_replace("/[^\x{4e00}-\x{9fa5}^0-9^A-Z^a-z]+/u", '_', $_GET['name']);
	// $email= $_GET['email'];
	// $mobile= $_GET['mobile'];
	$registtime = date("Y-m-d H:i:s");
	if ($ckn == 0){
		$sqli = "INSERT INTO app.user_web (Account, user_web.Name, password, user_web.mobile, user_web.email, registtime)
	VALUES ('".$account."','".$name."','".$password."','".$mobile."','".$email."','".$registtime."')";

	}else if($ckn == 1){
		$mednum=$_POST['mednum'];
		// $mednum= $_GET['mednum'];
		$sqli = "INSERT INTO app.user (Account, user.Name, password, user.mobile, user.email, user.Mednum, registtime)
	VALUES ('".$account."','".$name."','".$password."','".$mobile."','".$email."','".$mednum."','".$registtime."')";

	}else if($ckn == 2){
		$sqli = "INSERT INTO app.user (Account, user.Name, password, user.mobile, user.email, registtime)
	VALUES ('".$account."','".$name."','".$password."','".$mobile."','".$email."','".$registtime."')";
	}
	
	
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