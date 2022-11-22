<?php
	include('connectDB.php');
	mysqli_select_db($db_link, "App");
	mysqli_set_charset($db_link, "utf8");
	//檢查影像檔案是否存在
	// foreach (glob("C:/xampp/htdocs/app_webpage/sql/upload_video/*.mp4") as $filename) {
	// 	$str = strchr($filename, "2");
	// 	$sql = "SELECT * FROM app.inf where inf.write='".$str."' and type='3' ORDER BY Datetime asc";//DESC asc
	//   // echo "檔案名稱：" . $str . "<br>";
	// }
	$sql = "SELECT inf.write FROM app.inf where type='3'";//DESC asc
	$sql_query = mysqli_query($db_link, $sql);
	while($row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC)){
		$output[]=$row;
		// print(json_encode($output));
		// echo "檔案名稱：" . $row['write'] . "<br>";
		$path = "C:/xampp/htdocs/app_webpage/sql/upload_video/".$row['write'];
		if (file_exists($path)) {
		    echo "The file $path exists <br>";
		} else {
			// $sql2 = "SET SQL_SAFE_UPDATES = 0;";
			// $sql_query = mysqli_query($db_link, $sql);

			$sql2 = "DELETE FROM app.inf where inf.type = '3' and inf.write = '".$row['write']."';";
			$sql_query = mysqli_query($db_link, $sql);
			$row=mysqli_fetch_array($sql_query, MYSQLI_ASSOC);
			echo "檔案名稱：" . json_encode($row) . "<br>";
			// $sql2 = "SET SQL_SAFE_UPDATES = 1;";
			// $sql_query = mysqli_query($db_link, $sql);
		}

	}
		
	
	
	mysqli_close($db_link);
?>