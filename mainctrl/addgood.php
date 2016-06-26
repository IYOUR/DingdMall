<?php
header("Content-Type: text/html;charset=UTF-8");
require_once('conn.php');
error_reporting(0);

$addhead=$_POST['addhead'];
$addtext=$_POST['addtext'];
$addprice=$_POST['addprice'];
$add_userid=$_POST['add_userid'];

	$sql=  "INSERT INTO goods (goods_number,goods_head,goods_text,goods_much)VALUES('$add_userid', '$addhead', '$addtext','$addprice')";
	if(mysql_query($sql,$conn)){
  		exit("reg_success");
  		} 
		else {
  	exit("reg_failed");
	}

?>