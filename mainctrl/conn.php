<?php
/*****************************
*数据库连接
*****************************/
$conn = @mysql_connect("localhost","Test-01","Test-01");
if (!$conn){
    die("连接数据库失败：" . mysql_error());
}
mysql_select_db("test", $conn);
//字符转换，读库
mysql_query("set character set 'utf8'");
//写库
mysql_query("set names 'utf8'");
?>