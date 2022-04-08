<?php
header('Content-Type: application/json;charset=utf-8'); //回傳JSON的時候,特別是有中文,記得送header

date_default_timezone_set("Asia/Taipei");
mysql_connect("localhost","root","1234") or die ("Could not connect:".mysql_error());
mysql_select_db("coupon");
mysql_query("SET NAMES 'utf8'");


$rs_name=$_GET['rs_name'];

$rs_email=$_GET['rs_email'];

$rs_title=$_GET['rs_title'];

$rs_content=$_GET['rs_content'];


//echo "帳號：".$ac."密碼：".$pw;


$sql="INSERT INTO report(name,title,content,email,type) VALUES ('".$rs_name."','".$rs_title."','".$rs_content."','".$rs_email."','1')";

mysql_query($sql)or die("Query error:".mysql_error());  //設定$result為mysql的傳送語法，並將$sql中的SELECT語法代入

	$rsdone[]=array("rsgood" => "回報成功");	//把 「錯誤訊息」 設定成「陣列變數」。

	echo $_GET['jsoncallback'].'('.json_encode($rsdone).');';  //$_GET裡的jsoncallback會在login.html裡用到。$wrong的資料是php array，透過json_encode轉換成json可傳送的值。


?>