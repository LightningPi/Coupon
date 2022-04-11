<?php
header('Content-Type: application/json;charset=utf-8'); //回傳JSON的時候,特別是有中文,記得送header

date_default_timezone_set("Asia/Taipei");
mysql_connect("localhost","root","1234") or die ("Could not connect:".mysql_error());
mysql_select_db("coupon");
mysql_query("SET NAMES 'utf8'");


$ac=$_GET['ac'];	//信箱，變數$ac，接收由login.html傳送的ac

$pw=$_GET['pw'];	//密碼，變數$pw，接收由login.html傳送的pw

//echo "帳號：".$ac."密碼：".$pw;


$sql="SELECT member_id FROM member WHERE ac='".$ac."'&&pw='".$pw."'";

  //從會員資料表member，撈取會員資料

$result=mysql_query($sql)or die("Query error:".mysql_error());  //設定$result為mysql的傳送語法，並將$sql中的SELECT語法代入

	$num_rows = mysql_num_rows($result);

	if($num_rows > 0){

$record=array(); //設定$record變數(可自己更名)為array陣列，因為json是陣列型式。

while($row=mysql_fetch_assoc($result)){ //傳送mysql語法從資料庫抓值，並用$row變數接收從資料庫抓取的值。用while迴圈把資料一筆一筆抓出

	$record[]=$row;	//把$row抓到的值指定給$record陣列。

	}

echo $_GET['jsoncallback'].'('.json_encode($record).');';  //$_GET裡的jsoncallback會在index_sql_view.html裡用到。$record的資料是php array，透過json_encode轉換成json可傳送的值。

}else{

	$wrong[]=array("member_id" => "信箱或密碼輸入錯誤");	//把 「錯誤訊息」 設定成「陣列變數」。

	echo $_GET['jsoncallback'].'('.json_encode($wrong).');';  //$_GET裡的jsoncallback會在login.html裡用到。$wrong的資料是php array，透過json_encode轉換成json可傳送的值。

}

?>
