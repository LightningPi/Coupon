<?php
header('Content-Type: application/json;charset=utf-8'); //回傳JSON的時候,特別是有中文,記得送header

date_default_timezone_set("Asia/Taipei");
mysql_connect("localhost","root","1234") or die ("Could not connect:".mysql_error());
mysql_select_db("coupon");
mysql_query("SET NAMES 'utf8'");


$member_id=$_GET['mid'];

$cherish_id=$_GET['cid'];

$sql="INSERT INTO collect(class,coupon_id,member_id) VALUES ('1','".$cherish_id."','".$member_id."')";

mysql_query($sql);  //寫入資料庫

	$msg[]=array("result" => "已收藏優惠券");	//把 「錯誤訊息」 設定成「陣列變數」。

	echo $_GET['jsoncallback'].'('.json_encode($msg).');';  //$_GET裡的jsoncallback會在login.html裡用到。$msg的資料是php array，透過json_encode轉換成json可傳送的值。


?>