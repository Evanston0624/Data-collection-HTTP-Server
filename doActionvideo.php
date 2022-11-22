<?php
/**
 * 表單接收頁面
 */
// 網頁編碼宣告（防止產生亂碼）
header('content-type:text/html;charset=utf-8');

// 封裝好的單一 PHP 檔案上傳 function
include_once 'upload_Video_en.php';

// 取得 HTTP 文件上傳變數
$fileInfo = $_FILES['myFile1'];

// // // 取得上傳檔案的擴展名
// $ext = pathinfo($fileInfo['name'], PATHINFO_EXTENSION);
// $fileInfo['name'] = $newname.'.'.$ext;
// print_r($fileInfo['name']);

// 進入上傳Function
$result = uploadFile($fileInfo);

print($result);
?>