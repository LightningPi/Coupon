<?php
header('Content-Type: application/json;charset=utf-8'); //回傳JSON的時候,特別是有中文,記得送header

date_default_timezone_set("Asia/Taipei");
mysql_connect("localhost","root","1234") or die ("Could not connect:".mysql_error());
mysql_select_db("coupon");
mysql_query("SET NAMES 'utf8'");


$report_name=$_GET['report_name'];	//稱呼，變數$report_name，接收由report.html傳送的report_name

$report_email=$_GET['report_email'];	//信箱，變數$report_email，接收由report.html傳送的report_email

$report_title=$_GET['report_title'];	//標題，變數$report_title，接收由report.html傳送的report_title

$report_content=$_GET['report_content'];	//內容，變數$report_content，接收由report.html傳送的report_content


//echo "帳號：".$ac."密碼：".$pw;


$sql="INSERT INTO report(name,title,content,email,type) VALUES ('".$report_name."','".$report_title."','".$report_content."','".$report_email."','2')";  //問題回報功能(type = 2)，將稱呼、標題、內容、信箱，寫入回報資料表report

mysql_query($sql)or die("Query error:".mysql_error());  //設定$result為mysql的傳送語法，並將$sql中的SELECT語法代入

	$reportdone[]=array("reportgood" => "回報成功");	//把 「回報成功訊息」 設定成「陣列變數」。

	echo $_GET['jsoncallback'].'('.json_encode($reportdone).');';  //$_GET裡的jsoncallback會在report.html裡用到。$reportdone的資料是php array，透過json_encode轉換成json可傳送的值。


?>
