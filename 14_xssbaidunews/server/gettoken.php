<?php
require_once("config.php");
echo json_encode(array("token"=>$_SESSION['token']));
 ?>
