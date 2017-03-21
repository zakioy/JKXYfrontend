<?php
require_once("config.php");
//判断token是否合法
function valid_token() {
    $return = $_POST['token'] == $_SESSION['token'] ? true : false;
    set_token();
    return $return;
}
if(!valid_token()){
		echo json_encode(array("insertmsg"=>"fftj"));
}else{
	//获得POST发来的数据
	$newstitle = htmlspecialchars($_POST['newstitle']);
	$newstype = htmlspecialchars($_POST['newstype']);
	$newsimg = $_POST['newsimg'];
	$newstime = $_POST['newstime'];
	$newssrc = htmlspecialchars($_POST['newssrc']);
	$onfocus = $_POST['onfocus'];
//插入到数据库中
	$sql = "INSERT INTO news VALUES ('','{$newstitle}', '{$newstype}', '{$newsimg}', '{$newstime}','{$newssrc}','{$onfocus}')";
	mysqli_query($link,"SET NAMES utf8");
	mysqli_query($link,$sql);
	echo json_encode(array("insertmsg"=>"from server:添加成功!"));
}

mysqli_close($link);

?>
