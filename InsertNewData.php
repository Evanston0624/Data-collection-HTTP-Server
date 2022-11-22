
<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "app");
	mysqli_set_charset($db_link ,"utf8");
	date_default_timezone_set('Asia/Taipei');
	
	$success=0;
	$status="Active";
	$Account = $_POST['at'];
	$time = date("Y-m-d H:i:s");
	$type = $_POST['type'];
	$object_Anger = $_POST['object_Anger'];
	$object_Boredom = $_POST['object_Boredom'];
	$object_Disgust = $_POST['object_Disgust'];
	$object_Anxiety = $_POST['object_Anxiety'];
	$object_Happiness = $_POST['object_Happiness'];
	$object_Sadness = $_POST['object_Sadness'];
	$object_Surprised = $_POST['object_Surprised'];
	$write = str_replace("+", " ", $_POST['content']);

	$sqli = "INSERT INTO app.inf 
		(Account, type, inf.write, object_Anger, object_Boredom, object_Disgust, object_Anxiety, object_Happiness, object_Sadness, object_Surprised, inf.Datetime) 
		VALUES ('".$Account."','".$type."','".$write."','".$object_Anger."','".$object_Boredom."','".$object_Disgust."','".$object_Anxiety."','".$object_Happiness."','".$object_Sadness."','".$object_Surprised."','".$time."')";
	
	
	// echo $sqli;
	
	if($db_link->query($sqli)){
		$success=1;
	}
	$response["success"]=$success;
	die(json_encode($response));
	
	$db_link->close();
?>