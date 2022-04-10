<?php
header('Content-Type: application/json;charset=utf-8'); //回傳JSON的時候,特別是有中文,記得送header

date_default_timezone_set("Asia/Taipei");
mysql_connect("localhost","root","1234") or die ("Could not connect:".mysql_error());
mysql_select_db("coupon");
mysql_query("SET NAMES 'utf8'");


$registerac=$_GET['registerac'];	//信箱，變數$registerac，接收由register.html傳送的registerac

$registerpw=$_GET['registerpw'];	//密碼，變數$registerpw，接收由register.html傳送的registerpw

$registername=$_GET['registername'];	//稱呼，變數$registername，接收由register.html傳送的registername


//echo "帳號：".$ac."密碼：".$pw;


$sql="SELECT member_id FROM member WHERE ac='".$registerac."'";		//驗證信箱是否已被註冊過

$result=mysql_query($sql)or die("Query error:".mysql_error());  //設定$result為mysql的傳送語法，並將$sql中的SELECT語法代入

	$num_rows = mysql_num_rows($result);	//透過mysql_num_rows()，確認會員資料表member，是否有相同信箱已被註冊過

if($num_rows > 0){	//如果變數$num_rows > 0，代表信箱已被註冊過

	$done[]=array("mailcheck" => "信箱已被註冊過");	//把 「信箱已被註冊過訊息」 設定成「陣列變數」。

	echo $_GET['jsoncallback'].'('.json_encode($done).');';  //$_GET裡的jsoncallback會在register.html裡用到。$done的資料是php array，透過json_encode轉換成json可傳送的值。

}else{	//如果變數$num_rows 不大於0，代表信箱尚未被註冊過，可使用

	$registersql="INSERT INTO member(ac,pw,name,class) VALUES ('".$registerac."','".$registerpw."','".$registername."','2')";  //註冊會員功能(class = 2)，將信箱、密碼、稱呼，寫入會員資料表member

	mysql_query($registersql)or die("Query error:".mysql_error());  //寫入資料庫


	$done[]=array("mailcheck" => "註冊成功");	//把 「註冊成功訊息」 設定成「陣列變數」。

	echo $_GET['jsoncallback'].'('.json_encode($done).');';  //$_GET裡的jsoncallback會在register.html裡用到。$done的資料是php array，透過json_encode轉換成json可傳送的值。



}

?>
