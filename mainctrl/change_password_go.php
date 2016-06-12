<?php
header("Content-Type: text/html;charset=UTF-8");
session_start();
if(!isset($_POST['submit'])){
	exit('非法访问!');
}
$OldPassword = $_POST['password_old'];
$NewPassword = $_POST['password_new'];
$NewPasswordAgain = $_POST['password_again'];

if(strlen($NewPassword) >= 6 && $NewPassword==$NewPasswordAgain){
$OldPassword = MD5($OldPassword);
$NewPassword = MD5($NewPassword);
include('conn.php');
$check_query = mysql_query("select * from user where username='{$_SESSION['username']}' and password='$OldPassword' limit 1");
if($result = mysql_fetch_array($check_query)){
	$result_update=mysql_query("update user set password='$NewPassword' where username='{$_SESSION['username']}'");
		if($result_update){
			unset($_SESSION['userid']);
			unset($_SESSION['username']);
			header("Location: ../mainhtml/jump_change.html"); 
			exit;
		}
		else{
			header("Location: ../mainhtml/jump_error.html"); 
		}
	}
	else{
		header("Location: ../mainhtml/jump_error.html"); 
		exit;
		}
	
}
else{
	header("Location: ../mainhtml/jump_error.html"); 
	exit;
}
?>