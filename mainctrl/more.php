<?php
header("Content-Type: text/html;charset=UTF-8");
require_once('conn.php');
error_reporting(0);
session_start();
if(isset($_SESSION['userid'])){
  $username = $_SESSION['username'];
  $url = "myhome.php";
}
else{
	$username="注册/登录";
	$url = "../mainhtml/login.html";
}
$good_id = $_GET['good_id'];
$query=mysql_query("select * from goods where  goods_id='$good_id' limit 1");
$row=mysql_fetch_array($query);
        $goods_head=$row['goods_head']; 
        $goods_text=$row['goods_text']; 
        $goods_image=$row['goods_image']; 
        $goods_much=$row['goods_much']; 

?>
<!DOCTYPE html>
<html>
<head>
  <title>叮咚Mall</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/foundation.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/foundation.min.js"></script>
  <script src="../js/modernizr.js"></script>
  <style>
  #content{
    width:100;
    height:auto;
    background: #f2f2f2;
    padding: 0;
    border:none;
    overflow: hidden;
    transition-duration: 0.5s;
  }

  @media screen and (min-width: 600px) {
 #content{
  width: 80%;
  height:auto;
  margin: 2% auto;
 }
}
@media screen and (max-width: 600px) {
#content{
  width: 100%;
  height:auto;
  margin: 1% auto;
 }
}

 </style>
</head>
<body>

<div class="fixed">
<nav id="nav" class="top-bar" data-topbar>
  <ul class="title-area">
    <li class="name">
     
      <h1><a href="../mainctrl/home.php">叮咚Mall</a></h1>
    </li>
      
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <ul class="left">
      <li class="active"><a href="#">Home</a></li>

    </ul>
    <ul class="right">
      <li ><a href="<?php echo $url ?>"><?php echo $username ?></a></li>
    </ul>
  </section>
</nav>
</div>

<div id="content" class="panel">
	<div class="panel" style="padding: 1%;">
		<p style="font-size: 1.2em;"><?php echo $goods_head ?></p>
	</div>

	<a class="th radius"><img  style="margin: 10px;" src="../images/goods/<?php echo $goods_image ?>.jpg" alt="goods"></a>
  <a class="th radius"><img  style="margin: 10px;" src="../images/goods/<?php echo $goods_image ?>.jpg" alt="goods"></a>

 <div class="panel">
 	<p><?php echo $goods_text ?></p>
 </div>
  <ul class="pricing-table">
    <li class="title">服务详情</li>
    <li class="price">￥<?php echo $goods_much ?></li>
    <li class="description">七天无理由退换</li>
    <li class="description">一年保修</li>
    <li class="description">正品保证</li>
    <li class="bullet-item">数量(件): <code>1</code>
    </li>
    <li class="cta-button"><a class="a button" href="#">购买</a></li>
  </ul>
</div>


<div class="bottom" style="width: 100%;height:4em;background: #333;position: relative;top: 5%;">
    <p style="color: #fff;font-size: 12px;text-align: center;padding: 1em;margin-bottom:0;">Copyright 2015-2016 www.DingdMall.com 叮咚Mall All Rights Reserved</p> 
  </div>
<script>

$(document).ready(function() {
    $(document).foundation();


  })

</script>

</body>
</html>
