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
?>
<!DOCTYPE html>
<html>
<head>
  <title>叮咚Mall</title>
  <meta charset="gbk">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/foundation.min.css">
  <link rel="stylesheet" type="text/css" href="../css/webuploader.css" />
  <link rel="stylesheet" type="text/css" href="../css/style.css" />
  <script src="../js/jquery.min.js"></script>
  <script src="../js/foundation.min.js"></script>
  <script src="../js/modernizr.js"></script>
  <script type="text/javascript" src="../js/uploader/webuploader.js"></script>
  <script type="text/javascript" src="../js/uploader/upload.js"></script>
  <style>
@media screen and (min-width: 600px) {
.tab-box{
  width: 80%;
  height:auto;
  background: #f9f7f6;
  margin:2% auto;
 }
}
@media screen and (max-width: 600px) {
.tab-box{
  width: 100%;
  height:auto;
  background: #f9f7f6;
  margin: 0 auto;
 }
}

#BlackOver{  display: none;width: 100%;  height: 100%;  background-color: black;  z-index:1;  -moz-opacity: 0.8;  opacity:.80;  filter: alpha(opacity=80);  }  
    #inf_change {  display: none;  position: absolute;  top: 20%;  left: 25%;  width: 50%;  height: 60%;  padding: 16px;  border: 1px solid #222;background-color:#f9f7f6;  z-index:2;  overflow: auto;  }  
#ExportContent{   position: relative;  top: 1%; margin: 0 auto; width: 99%;  height: 90%;background:#f9f7f6;}

 .ul_pics li{float:left;width:280px;height:250px;text-align: center;margin:10px;border: 1px solid #222;}
 .ul_pics li .img{width: 280px;height: 250px;display: table-cell;vertical-align: middle;}
 .ul_pics li img{max-width: 280px;max-height: 250px;vertical-align: middle;}
 .percent{position:absolute; height:20px; display:inline-block;top:3px; left:2%; color:#fff } 
 .progress{position:relative;padding: 1px; border-radius:3px; margin:60px 0 0 0;} 
 .bar {background-color: green; display:block; width:0%; height:20px; border-radius:3px; } 

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
      <li class="active"><a>Home</a></li>
    </ul>
    <ul class="right">
      <li ><a href="login.php?action=logout">注销</a></li>
    </ul>
  </section>
</nav>
</div>

<div class="tab-box">

<ul class="tabs" data-tab style="margin: 2%;">
  <li class="tab-title"><a style="outline: 0;" href="#home">我的主页</a></li>
  <li class="tab-title"><a style="outline: 0;" href="#menu1">交易记录</a></li>
  <li class="tab-title active"><a style="outline: 0;" href="#menu2">物品出售</a></li>
  <li class="tab-title"><a style="outline: 0;" href="#menu3">评价管理</a></li>
  <li class="tab-title"><a style="outline: 0;" href="#menu4">账号管理</a></li>
 
</ul>
<div class="tabs-content" style="height:auto;padding: 2%;">
  <div class="content" id="home">
   <h4><?php echo $username ?>，欢迎登陆！</h4>
    <div class="panel" style="height: 400px;">
    <p>我的收藏：暂无</p>
  <table>
  <thead>
    <tr>
      <th>编号</th>
      <th>物品名称</th>
      <th>收藏日期</th>
      <th>物品详情</th>
      <th>物品价格</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>01</td>
      <td>简约手表</td>
      <td>2016-04-25</td>
      <td>这款表是2013年度德国红点设计大奖钟表类获奖作品</td>
      <td>335</td>
     
    </tr>
    <tr>
      <td>02</td>
      <td>简约手表</td>
      <td>2016-04-25</td>
      <td>这款表是2013年度德国红点设计大奖钟表类获奖作品</td>
      <td>335</td>
     
    </tr>
    <tr>
      <td>03</td>
      <td>简约手表</td>
      <td>2016-04-25</td>
      <td>这款表是2013年度德国红点设计大奖钟表类获奖作品</td>
      <td>335</td>
     
    </tr>
  </tbody>
</table>

    </div>   
  </div>
  <div class="content" id="menu1">
   <h4>我买过的物品</h4>
    <div class="panel" style="height: 400px;">
    <p>我购买的物品：暂无</p>
    <table style="width:100%">
  <thead>
    <tr>
      <th>编号</th>
      <th>物品名称</th>
      <th>购买日期</th>
      <th>物品详情</th>
      <th>物品价格(元)</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>01</td>
      <td>简约手表</td>
      <td>2016-05-02</td>
      <td>这款表是2013年度德国红点设计大奖钟表类获奖作品</td>
      <td>335</td>
     
    </tr>
    <tr>
      <td>02</td>
      <td>简约手表</td>
      <td>2016-05-02</td>
      <td>这款表是2013年度德国红点设计大奖钟表类获奖作品</td>
      <td>335</td>
     
    </tr>
    <tr>
      <td>03</td>
      <td>简约手表</td>
      <td>2016-05-02</td>
      <td>这款表是2013年度德国红点设计大奖钟表类获奖作品</td>
      <td>335</td>
     
    </tr>
  </tbody>
</table>
   

    </div>
    
  </div>
  <div class="content active" id="menu2">
   <h4>我要出售物品</h4>
    <div class="panel" style="height: 100%;">

          <label>物品名称
          <input id="addhead" type="text" placeholder="物品名在七个字以内">
          </label>
          <label>物品价格
          <input id="addprice" type="text" placeholder="物品价钱(单位:元)">
          </label>
          <label>物品详情
           <textarea id="addtext" style="height: 60%;" placeholder="我要出售物品的详情"></textarea>
          </label>
      </div>
    <div class="panel">
     <h3>上传物品图片</h3>
     <ul id="content" class="small-block-grid-2 medium-block-grid-3 large-block-grid-4">
        <div style="margin: 10px;">
         <ol id="ul_pics" class="ul_pics clearfix"></ol>
        </div>
     </ul>
          <div id="wrapper">
            <div id="container">
                <div id="uploader">
                    <div class="queueList">
                        <div id="dndArea" class="placeholder">
                            <div id="filePicker"></div>
                        
                        </div>
                    </div>
                    <div class="statusBar" style="display:none;">
                        <div class="progress">
                            <span class="text">0%</span>
                            <span class="percentage"></span>
                        </div><div class="info"></div>
                        <div class="btns">
                            <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="completepanel" class="panel" style="display: block;">
      <button id="completebutton" type="button" data-reveal-id="addModal" class="button expand">完成</button>
    </div>
  </div>
  <div class="content" id="menu3">
   <h4>我的评价</h4>
    <div class="panel" style="height: 400px;">
    <p>我的评价：暂无</p>
     <table style="width:100%">
  <thead>
    <tr>
      <th>编号</th>
      <th>物品名称</th>
      <th>我的评价</th>
      <th>评价日期</th>
      <th>物品价格(元)</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>01</td>
      <td>简约手表</td>
      <td>很不错的商品，物超所值</td>
      <td>2016-05-03</td>
      <td>335</td>
     
    </tr>
    <tr>
      <td>02</td>
      <td>简约手表</td>
      <td>很不错的商品，物超所值</td>
      <td>2016-05-03</td>
      <td>335</td>
     
    </tr>
    <tr>
      <td>03</td>
      <td>简约手表</td>
      <td>很不错的商品，物超所值</td>
      <td>2016-05-03</td>
      <td>335</td>
     
    </tr>
  </tbody>
</table>
  </div>
  </div>
   <div class="content" id="menu4">
   <h4>账号详情</h4>
    <div class="panel" style="height: 100%;">
    <p>用户名：<?php echo $username ?></p>
    <p>手机号: 暂无</p>
    <p>邮箱: 暂无</p>
    <p>收货地址: 暂无</p>
    <ul class="button-group round">
    <button id="change_password" data-reveal-id="myModal"  class="button round small" type="button">修改密码</button>
    </ul>
  </div>
  </div>
</div>
</div>
<div id="myModal" class="reveal-modal medium" data-reveal>
    <form name="LoginForm" method="post" action="change_password_go.php">
      <fieldset>
        <legend>密码修改</legend>
          <label>原密码
          <input type="password" id="username" name="password_old"  placeholder="输原始密码">
        </label>
        <label>新密码
          <input type="password" id="password" name="password_new" placeholder="输入新密码">
        </label>
        <label>重复新密码
          <input type="password" id="password" name="password_again" placeholder="再次输入新密码">
        </label>
      </fieldset>
        <button type="submit" name="submit" class="button expand">确 定</button>
    </form>
    <a class="close-reveal-modal">&times;</a>
  </div>
  <div id="addModal" class="reveal-modal tiny" data-reveal>
  <h3>物品添加成功！</h3>
  <a class="close-reveal-modal">&times;</a>
</div>
<div class="bottom" style="width: 100%;height:4em;background: #333;position: relative;">
    <p style="color: #fff;font-size: 12px;text-align: center;padding: 1em;margin-bottom:0;">西安叮咚科技有限公司 电信与信息服务业务经营许可证150753号 陕ICP备15051023号-1</p> 
  </div>

</body>
<script>
$(document).ready(function() {
  $(document).foundation();

     
  $("#completebutton").click(function(){ 
     $.post("addgood.php",{addhead:$("#addhead").val(),addtext:$("#addtext").val(),addimage:"shubiao",addprice:$("#addprice").val()},function(data,status){
       if (data=="success") {

      }
         console.log(data);
      });

     });
     
  
  });   



</script>
</html>







