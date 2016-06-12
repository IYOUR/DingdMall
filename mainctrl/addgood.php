<?php
header("Content-Type: text/html;charset=UTF-8");
require_once('conn.php');
error_reporting(0);

$addhead=$_POST['addhead'];
$addtext=$_POST['addtext'];
$addprice=$_POST['addprice'];
$goods_image=$_POST['addimage'];

	$sql=  "INSERT INTO goods (goods_head,goods_text,goods_image,goods_much)VALUES('$addhead', '$addtext','$goods_image','$addprice')";
	if(mysql_query($sql,$conn)){
  		exit("success");
  		} 
		else {
  	exit("failed");
	}

?>