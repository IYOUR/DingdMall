<?php
error_reporting(0);
header("Content-Type: text/html;charset=UTF-8");
if(!(isset($_SERVER['HTTP_X_REQUESTED_WITH'])&&strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'))   
{
  exit("非法访问!");
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
  exit("smallname");
}
if(strlen($password) < 6){
  exit("smallpassword");
}
if(!preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $email)){
  exit("erroremail");
}

include('conn.php');

$check_query = mysql_query("select username from user where username='$username' limit 1");
if(mysql_fetch_array($check_query)){
  exit("repeatname");
}

$password = MD5($password);
date_default_timezone_set("Asia/Shanghai");
$regdate = date("Y-m-d",time());
$regtime = date("H:i:s",time());
$sql = "INSERT INTO user(username,password,email,regdate,regtime)VALUES('$username','$password','$email','$regdate','$regtime')";
if(mysql_query($sql,$conn)){
  exit("reg_success");
  } 
else {
  exit("reg_failed");
}
?>
