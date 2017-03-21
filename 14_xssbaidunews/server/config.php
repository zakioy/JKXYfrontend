<?php
// 开启session
session_start();
function set_token() {
    $_SESSION['token'] = md5(microtime(true));
}
//如果token为空则生成一个token
if(!isset($_SESSION['token']) || $_SESSION['token']=='') {
    set_token();
}


error_reporting(0);//屏蔽mysql错误提示
//php文件不能直接通过url访问
if( $_SERVER['HTTP_REFERER'] == "" ){define('IN_SYS', TRUE);}
if(defined('IN_SYS')) {exit('禁止访问');}
header("Content-type:application/json;charset=utf-8");



//配置数据库信息
$hostname = 'localhost';
$port = '3306';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'baidunews';




//连接数据库
$link = mysqli_connect($hostname,$dbuser,$dbpassword,$dbname,$port);
//判断是否连接成功
if(!$link){
  exit(json_encode(array("msg"=>"数据库连接失败!")));
}



?>
