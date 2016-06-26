<?php
header("Content-Type: text/html;charset=UTF-8");
require_once('conn.php');
error_reporting(0);
$last = $_GET['last'];
$amount = $_GET['amount'];
$query=mysql_query("select * from goods order by goods_id  DESC limit $last,$amount");
while($row=mysql_fetch_array($query)){ 
     $goods['list'][] = array( 
        'good_id' => $row['goods_id'], 
        'good_head' => mb_substr( $row['goods_head'], 0, 7, "utf-8"), 
        'good_text' => mb_substr( $row['goods_text'], 0, 25, "utf-8"), 
        'good_image' => $row['goods_image'], 
        'good_much' => $row['goods_much'], 
     ); 
   
} 

echo json_encode($goods);
?>