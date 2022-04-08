<?php
header('Content-Type: application/json;charset=utf-8'); //回傳JSON的時候,特別是有中文,記得送header

date_default_timezone_set("Asia/Taipei");
mysql_connect("localhost","root","1234") or die ("Could not connect:".mysql_error());
mysql_select_db("coupon");
mysql_query("SET NAMES 'utf8'");

$store_id=$_GET['id'];

//$sql="SELECT store_id,name,tel,address,pic,introduce,time,rest FROM store WHERE store_id=".$store_id;
$sql="SELECT store_id,name,tel,address,pic,introduce,time,rest FROM store WHERE store_id='".$store_id."'";

$result=mysql_query($sql)or die("Query error:".mysql_error());  //設定$result為mysql的傳送語法，並將$sql中的SELECT語法代入

$record=array(); //設定$record變數(可自己更名)為array陣列，因為json是陣列型式。
while($row=mysql_fetch_assoc($result)){ //傳送mysql語法從資料庫抓值，並用$row變數接收從資料庫抓取的值。用while迴圈把資料一筆一筆抓出
	$record[]=$row;	//把$row抓到的值指定給$record陣列。
	}
	
echo $_GET['jsoncallback'].'('.json_encode($record).');';  //$_GET裡的jsoncallback會在index_sql_view.html裡用到。$record的資料是php array，透過json_encode轉換成json可傳送的值。

?>