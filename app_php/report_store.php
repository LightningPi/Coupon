<?php
header('Content-Type: application/json;charset=utf-8'); //回傳JSON的時候,特別是有中文,記得送header

date_default_timezone_set("Asia/Taipei");
mysql_connect("localhost","root","1234") or die ("Could not connect:".mysql_error());
mysql_select_db("coupon");
mysql_query("SET NAMES 'utf8'");


$rs_name=$_GET['rs_name'];	//稱呼，變數$rs_name，接收由report_store.html傳送的rs_name

$rs_email=$_GET['rs_email'];	//信箱，變數$rs_email，接收由report_store.html傳送的rs_email

$rs_title=$_GET['rs_title'];	//標題，變數$rs_title，接收由report_store.html傳送的rs_title

$rs_content=$_GET['rs_content'];	//內容，變數$rs_content，接收由report_store.html傳送的rs_content


//echo "帳號：".$ac."密碼：".$pw;


$sql="INSERT INTO report(name,title,content,email,type) VALUES ('".$rs_name."','".$rs_title."','".$rs_content."','".$rs_email."','1')";  //聯絡我們，商家或優惠券問題回報功能(type = 1)，將稱呼、標題、內容、信箱，寫入回報資料表report

mysql_query($sql)or die("Query error:".mysql_error());  //寫入資料庫

	$rsdone[]=array("rsgood" => "回報成功");	//把 「回報成功訊息」 設定成「陣列變數」。

	echo $_GET['jsoncallback'].'('.json_encode($rsdone).');';  //$_GET裡的jsoncallback會在report_store.html裡用到。$rsdone的資料是php array，透過json_encode轉換成json可傳送的值。


?>
