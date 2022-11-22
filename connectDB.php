<?php

$db_link = new mysqli("資料庫IP", "登入ID", "登入密碼", "資料庫名稱");
	// Check connection
	if ($db_link->connect_error) {
		die("Connection failed: " . $db_link->connect_error);
	}
?>