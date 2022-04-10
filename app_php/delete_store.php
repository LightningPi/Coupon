<?php
header('Content-Type: application/json;charset=utf-8'); //回傳JSON的時候,特別是有中文,記得送header

date_default_timezone_set("Asia/Taipei");
mysql_connect("localhost","root","1234") or die ("Could not connect:".mysql_error());
mysql_select_db("coupon");
mysql_query("SET NAMES 'utf8'");


$member_id=$_GET['mid'];	//會員主鍵，變數$member_id，接收由delete_store.html傳送的mid

$deletesid=$_GET['sid'];	//商家主鍵，變數$deletesid，接收由delete_store.html傳送的sid

$sql="DELETE FROM collect WHERE member_id=".$member_id." && store_id=".$deletesid;  //刪除已收藏商家功能，從收藏資料表collect，刪除會員主鍵、商家主鍵相符的商家收藏紀錄

mysql_query($sql);  //寫入資料庫

	$msg[]=array("result" => "已刪除商家");	//把 「已刪除商家訊息」 設定成「陣列變數」。

	echo $_GET['jsoncallback'].'('.json_encode($msg).');';  //$_GET裡的jsoncallback會在delete_store.html裡用到。$msg的資料是php array，透過json_encode轉換成json可傳送的值。


?>
