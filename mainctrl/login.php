<?php
header("Content-Type: text/html;charset=UTF-8");
error_reporting(0);
session_start();
//注销登录
if(@$_GET['action'] == "logout"){
	unset($_SESSION['userid']);
	unset($_SESSION['username']);
	header("Location: ../index.html");
	exit;
}

$username = htmlspecialchars($_POST['username'],ENT_COMPAT ,'utf8');
$password = MD5($_POST['password']);

include('conn.php');

$check_query = mysql_query("select user_id from user where username='$username' and password='$password' limit 1");
if($result = mysql_fetch_array($check_query)){

	$_SESSION['username'] = $username;
	$_SESSION['userid'] = $result['user_id'];
	echo "success";
	exit;
} 
else {
	echo "failed";
}
?>
