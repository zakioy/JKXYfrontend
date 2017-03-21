<?php
require_once("config.php");
$newsid = intval($_POST['newsid']);

	$sql = "SELECT * FROM news WHERE id = {$newsid}";
	mysqli_query($link,"SET NAMES utf8");
	$result = mysqli_query($link,$sql);
	$senddata = array();
	//循环结果集，并把值赋给$senddata
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($senddata, array(
			'id' => $row['id'],
			'newstype' => htmlspecialchars_decode($row['newstype']),
			'newstitle' => htmlspecialchars_decode($row['newstitle']),
			'newsimg' => $row['newsimg'],
			'newstime' => $row['newstime'],
			'newssrc' => htmlspecialchars_decode($row['newssrc']),
			'onfocus' => $row['onfocus']
			));
	}
	//判断$senddata的长度, 确定结果集中是否有值
	if (count($senddata) > 0) {
		echo json_encode($senddata);
	}else{
		echo json_encode(array('updatemsg'=>'from server:查询'));
	}

mysqli_close($link);
?>
