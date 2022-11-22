<?php
	include('connectDB.php');
	error_reporting(0);
	mysqli_select_db($db_link, "App");
	mysqli_set_charset($db_link, "utf8");
	date_default_timezone_set("Asia/Taipei");
	$at=$_POST['at'];
	$ThisDay = date("Y-m-d H:i:s");
	$ThisDayU = strtotime($ThisDay); // 將日期轉為Unix時間戳記
	$CheckDay = date("Y-m-d 05:00:00");
	$CheckDayU = strtotime($CheckDay); // 將日期轉為Unix時間戳記
	if ($ThisDayU >= $CheckDayU){
		$type = 0;
	}else if ($ThisDayU < $CheckDayU){
		$type = 1;
	}else{
		$success=0;
		$response["success"]=$success;
		die(json_encode($response));
	}
	for ($i=0 ; $i<6 ; $i++){
		if($type == 0){
			if ($i > 4){
				$CheckDayU2 = strtotime("-6 day",$CheckDayU); // 計算$ThisDay的後一天
				$CheckDay= date("Y-m-d H:i:s",$CheckDayU2);
			}
			// print($ThisDay);
			// print($CheckDay);
		}else if($type == 1){
			if ($i <= 4 ){
				$CheckDayU2 = strtotime("-1 day",$CheckDayU); // 計算$ThisDay的後一天
				$CheckDay= date("Y-m-d H:i:s",$CheckDayU2);
			}else if($i > 4){
				$CheckDayU2 = strtotime("-7 day",$CheckDayU); // 計算$ThisDay的後一天
				$CheckDay= date("Y-m-d H:i:s",$CheckDayU2);
			}
			// print($ThisDay);
			// print($CheckDay);
		}

		if      ($i == 0) {//emo_audio-vasual
			$sql = "SELECT count(*) as count FROM app.inf where Account='".$at."' AND Datetime >= '".$CheckDay."' AND Datetime < '".$ThisDay."' AND type='3'";
		}elseif ($i == 1){//emo_voice
			$sql = "SELECT count(*) as count FROM app.inf where Account='".$at."' AND Datetime >= '".$CheckDay."' AND Datetime < '".$ThisDay."' AND type='1'";

		}elseif ($i == 2){//emo_text
			$sql = "SELECT count(*) as count FROM app.inf where Account='".$at."' AND Datetime >= '".$CheckDay."' AND Datetime < '".$ThisDay."' AND type='0'";

		}elseif ($i == 3){//sleep+getup
			$sql = "SELECT count(*) as count FROM app.inf where Account='".$at."' AND Datetime >= '".$CheckDay."' AND Datetime < '".$ThisDay."' AND (type='5' or type='8')";

		}elseif ($i == 4){//Daily mood
			$sql = "SELECT count(*) as count FROM app.inf where Account='".$at."' AND Datetime >= '".$CheckDay."' AND Datetime < '".$ThisDay."' AND type='4'";

		}elseif ($i == 5){//self-scale
			$sql = "SELECT count(*) as count FROM app.self_scale where Account='".$at."' AND Datetime >= '".$CheckDay."' AND Datetime < '".$ThisDay."'";

		}elseif ($i == 6){//sleep
			$sql = "SELECT count(*) as count FROM app.inf where Account='".$at."' AND Datetime >= '".$CheckDay."' AND Datetime < '".$ThisDay."' AND type='5'";

		}elseif ($i == 7){//getup
			$sql = "SELECT count(*) as count FROM app.inf where Account='".$at."' AND Datetime >= '".$CheckDay."' AND Datetime < '".$ThisDay."' AND type='8'";

		}
		$sql_query = mysqli_query($db_link, $sql);
		while($row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC))	
			$arr=$row;

		$datanum = $arr['count'];
		$dataname = "data".$i;
		$dataarr[] = [$dataname => $datanum];
	}
	if (empty($arr)){
		$success=0;
		$response["success"]=$success;

	}else{
		$success=1;
		$response["success"]=$success;
		$response["data"]=$dataarr;		
	}
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/json');
	die(json_encode($response));
	mysqli_close($db_link);
?>