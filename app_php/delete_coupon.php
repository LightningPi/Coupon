<?php
header('Content-Type: application/json;charset=utf-8'); //回傳JSON的時候,特別是有中文,記得送header

date_default_timezone_set("Asia/Taipei");
mysql_connect("localhost","root","1234") or die ("Could not connect:".mysql_error());
mysql_select_db("coupon");
mysql_query("SET NAMES 'utf8'");


$member_id=$_GET['mid'];	//會員主鍵，變數$member_id，接收由delete_coupon.html傳送的mid

$delete_id=$_GET['cid'];	//優惠券主鍵，變數$delete_id，接收由delete_coupon.html傳送的cid

$sql="DELETE FROM collect WHERE member_id=".$member_id." && coupon_id=".$delete_id;  //刪除優惠功能，從收藏資料表collect，刪除會員主鍵、優惠券主鍵相符的優惠券收藏紀錄

mysql_query($sql);  //寫入資料庫

	$msg[]=array("result" => "已刪除優惠券");	//把 「已刪除優惠券訊息」 設定成「陣列變數」。

	echo $_GET['jsoncallback'].'('.json_encode($msg).');';  //$_GET裡的jsoncallback會在delete_coupon.html裡用到。$msg的資料是php array，透過json_encode轉換成json可傳送的值。


?>
