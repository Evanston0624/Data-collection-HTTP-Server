<?php
        date_default_timezone_set('Asia/Taipei');
	include('connectDB.php');
	mysqli_select_db($db_link, "app");
	mysqli_set_charset($db_link ,"utf8");
	
	$success=0;
	$status="Active";
	$Account = $_POST['account'];
	$Datetime = $_POST['time'];
	$tag_Anger = $_POST['tag_Anger'];
	$tag_Boredom = $_POST['tag_Boredom'];
	$tag_Disgust = $_POST['tag_Disgust'];
	$tag_Anxiety = $_POST['tag_Anxiety'];
	$tag_Happiness = $_POST['tag_Happiness'];
	$tag_Sadness = $_POST['tag_Sadness'];
	$tag_Surprised = $_POST['tag_Surprised'];
	$tag_time = date('Y-m-d H:i:s');

	$sqli = "UPDATE app.inf set tag_Anger = ".$tag_Anger.", tag_Boredom = ".$tag_Boredom.", tag_Disgust = ".$tag_Disgust.", tag_Anxiety = ".$tag_Anxiety.", tag_Happiness = ".$tag_Happiness.", tag_Sadness = ".$tag_Sadness.", tag_Surprised = ".$tag_Surprised.", tag_time = '".$tag_time."' where Account='".$Account."' And Datetime='".$Datetime."'";
	
	echo $sqli;
	
	if($db_link->query($sqli)){
		$success=1;
	}
	$response["success"]=$success;
	die(json_encode($response));
	
	$db_link->close();
?>