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
  <script src="../js/jquery.min.js"></script>
  <script src="../js/foundation.min.js"></script>
  <script src="../js/modernizr.js"></script>
  <script type="text/javascript" src="../js/plupload.full.min.js"></script>
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
      <h1><a href="#">叮咚Mall</a></h1>
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
  <li class="tab-title active"><a style="outline: 0;" href="#home">我的主页</a></li>
  <li class="tab-title"><a style="outline: 0;" href="#menu1">交易记录</a></li>
  <li class="tab-title"><a style="outline: 0;" href="#menu2">物品出售</a></li>
  <li class="tab-title"><a style="outline: 0;" href="#menu3">评价管理</a></li>
  <li class="tab-title"><a style="outline: 0;" href="#menu4">账号管理</a></li>
 
</ul>
<div class="tabs-content" style="height:auto;padding: 2%;">
  <div class="content active" id="home">
   <h4><?php echo $username ?>，欢迎登陆！</h4>
    <div class="panel" style="height: 400px;">
    <p>我的收藏：暂无</p>
    <p>我赞过的商品: 暂无</p>
    </div>   
  </div>
  <div class="content" id="menu1">
   <h4>我买过的物品</h4>
    <div class="panel" style="height: 400px;">
    <p>我购买的物品：暂无</p>
    <p>我的商品: 暂无</p>
    </div>
    
  </div>
  <div class="content" id="menu2">
   <h4>我要出售物品</h4>
    <div class="panel" style="height: 100%;">

          <label>物品名称
          <input id="addhead" type="text" placeholder="物品名在七个字以内">
          </label>
          <label>物品价格
          <input id="addprice" type="text" placeholder="物品价钱(单位:元)">
          </label>
          <label>物品详情
           <textarea id="addtext" placeholder="我要出售物品的详情"></textarea>
          </label>
      </div>
    <div class="panel">
     <h3>上传物品图片</h3>
     <ul id="content" class="small-block-grid-2 medium-block-grid-3 large-block-grid-4">
        <div style="margin: 10px;">
         <ol id="ul_pics" class="ul_pics clearfix"></ol>
        </div>
     </ul>
     <button id="addbutton" type="button" class="button expand">点击上传图片</button>
    </div>
    <div id="completepanel" class="panel" style="display: block;">
      <button id="completebutton" type="button" class="button expand">完成</button>
    </div>
  </div>
  <div class="content" id="menu3">
   <h4>我的评价</h4>
    <div class="panel" style="height: 400px;">
    <p>我的评价：暂无</p>
    <p>最近评价的物品：暂无</p>
  </div>
  </div>
   <div class="content" id="menu4">
   <h4>账号详情</h4>
    <div class="panel" style="height: 100%;">
    <p>用户名：暂无</p>
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
<div class="bottom" style="width: 100%;height:4em;background: #333;position: relative;">
    <p style="color: #fff;font-size: 12px;text-align: center;padding: 1em;margin-bottom:0;">西安叮咚科技有限公司 电信与信息服务业务经营许可证150753号 陕ICP备15051023号-1</p> 
  </div>

</body>
<script>
$(document).ready(function() {
  $(document).foundation();

            var uploader = new plupload.Uploader({//创建实例的构造方法
                runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
                browse_button: 'addbutton', // 上传按钮
                url: "ajax.php", //远程上传地址
                flash_swf_url: 'plupload/Moxie.swf', //flash文件地址
                silverlight_xap_url: 'plupload/Moxie.xap', //silverlight文件地址
                filters: {
                    max_file_size: '500kb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
                    mime_types: [//允许文件上传类型
                        {title: "files", extensions: "jpg,png,gif"}
                    ]
                },
                multi_selection: true, //true:ctrl多文件上传, false 单文件上传
                init: {
                    FilesAdded: function(up, files) { //文件上传前
                        if ($("#ul_pics").children("li").length > 30) {
                            alert("您上传的图片太多了！");
                            uploader.destroy();
                        } else {
                            var li = '';
                            plupload.each(files, function(file) { //遍历文件
                                li += "<li id='" + file['id'] + "'><div class='progress'><span class='bar'></span><span class='percent'>0%</span></div></li>";
                            });
                            $("#ul_pics").append(li);
                            uploader.start();
                        }
                    },
                    UploadProgress: function(up, file) { //上传中，显示进度条
                 var percent = file.percent;
                        $("#" + file.id).find('.bar').css({"width": percent + "%"});
                        $("#" + file.id).find(".percent").text(percent + "%");
                    },
                    FileUploaded: function(up, file, info) { //文件上传成功的时候触发
                       var data = eval("(" + info.response + ")");
                        $("#" + file.id).html("<div class='img'><img src='" + data.pic + "'/></div>");
                        $("#completebutton").css("display","block");
                    },
                    Error: function(up, err) { //上传出错的时候触发
                        alert(err.message);
                    }
                }
            });
            uploader.init();
     
  $("#completebutton").click(function(){
      $.post("addgood.php",{addhead:$("#addhead").val(),addtext:$("#addtext").val(),addprice:$("#addprice").val(),add_userid:"<?php echo $userid ?>"},function(data,status){
        console.log(data);
  });
  });   

})

</script>
</html>







