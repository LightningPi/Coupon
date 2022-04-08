<?php
header('Content-Type: application/json;charset=utf-8'); //回傳JSON的時候,特別是有中文,記得送header

date_default_timezone_set("Asia/Taipei");
mysql_connect("localhost","root","1234") or die ("Could not connect:".mysql_error());
mysql_select_db("coupon");
mysql_query("SET NAMES 'utf8'");


$registerac=$_GET['registerac'];

$registerpw=$_GET['registerpw'];

$registername=$_GET['registername'];


//echo "帳號：".$ac."密碼：".$pw;


$sql="SELECT member_id FROM member WHERE ac='".$registerac."'";

$result=mysql_query($sql)or die("Query error:".mysql_error());  //設定$result為mysql的傳送語法，並將$sql中的SELECT語法代入

	$num_rows = mysql_num_rows($result);

if($num_rows > 0){

	$done[]=array("mailcheck" => "信箱已被註冊過");	//把 「錯誤訊息」 設定成「陣列變數」。

	echo $_GET['jsoncallback'].'('.json_encode($done).');';  //$_GET裡的jsoncallback會在login.html裡用到。$wrong的資料是php array，透過json_encode轉換成json可傳送的值。

}else{

	$registersql="INSERT INTO member(ac,pw,name,class) VALUES ('".$registerac."','".$registerpw."','".$registername."','2')";

	mysql_query($registersql)or die("Query error:".mysql_error());


	$done[]=array("mailcheck" => "註冊成功");	//把 「錯誤訊息」 設定成「陣列變數」。

	echo $_GET['jsoncallback'].'('.json_encode($done).');';  //$_GET裡的jsoncallback會在login.html裡用到。$wrong的資料是php array，透過json_encode轉換成json可傳送的值。



}

?>