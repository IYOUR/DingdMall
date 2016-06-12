<?php
header("Content-Type: text/html;charset=UTF-8");
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
  header("Location:../index.html");
  exit();
}
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
echo $userid;
?>