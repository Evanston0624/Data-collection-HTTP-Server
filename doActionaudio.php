<?php
/**
 * 表單接收頁面
 */
// 網頁編碼宣告（防止產生亂碼）
header('content-type:text/html;charset=utf-8');

// 封裝好的單一 PHP 檔案上傳 function
include_once 'upload_Audio_en.php';

// 取得 HTTP 文件上傳變數
$fileInfo = $_FILES['myFile2'];

// // 取得上傳檔案的擴展名
// $ext = pathinfo($fileInfo['name'], PATHINFO_EXTENSION);

// 進入上傳Function
$result = uploadFile($fileInfo);
// //擴展名
// $allowV = array('mp4', 'MOV', 'M4V')
// $allowA = array('WAV', 'MP3', 'AAC')
// if (in_array($ext, $allowV)){
// 	upload_Video($fileInfo);
// }else if(in_array($ext, $allowA)){
// 	upload_Audio($fileInfo);
// }
 
print_r($result);
?>