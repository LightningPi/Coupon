<?php
header('Content-Type: application/json;charset=utf-8'); //回傳JSON的時候,特別是有中文,記得送header

date_default_timezone_set("Asia/Taipei");
mysql_connect("localhost","root","1234") or die ("Could not connect:".mysql_error());
mysql_select_db("coupon");
mysql_query("SET NAMES 'utf8'");


$member_id=$_GET['mid'];	//會員主鍵，變數$member_id，接收由cherish_store.html傳送的mid

$store_id=$_GET['sid'];		//商家主鍵，變數$store_id，接收由cherish_store.html傳送的sid

$sql="INSERT INTO collect(class,store_id,member_id) VALUES ('2','".$store_id."','".$member_id."')";  //收藏商家功能(class = 2)，將商家主鍵$store_id、會員主鍵$member_id，寫入收藏資料表collect

mysql_query($sql);  //寫入資料庫

	$msg[]=array("result" => "已收藏商家");	//把 「已收藏商家」 設定成「陣列變數」。

	echo $_GET['jsoncallback'].'('.json_encode($msg).');';  //$_GET裡的jsoncallback會在cherish_store.html裡用到。$msg的資料是php array，透過json_encode轉換成json可傳送的值。


?>
