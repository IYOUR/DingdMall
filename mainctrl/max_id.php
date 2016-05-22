<?php
header("Content-Type: text/html;charset=UTF-8");
require_once('conn.php');
error_reporting(0);
$query=mysql_query("select goods_id from goods order by goods_id DESC limit 1");
$row=mysql_fetch_array($query);

echo $row['goods_id'];
     
?>