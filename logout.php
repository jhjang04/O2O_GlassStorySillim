<?php
$ROOT_PATH = $_SERVER['CONTEXT_DOCUMENT_ROOT'];
define("ROOT_PATH", $ROOT_PATH);
require_once(ROOT_PATH."/config/common.php");
unset($_SESSION['is_logged']);
unset($_SESSION['id']);
$url = BASE_URL;
header("location: {$url}");
?>