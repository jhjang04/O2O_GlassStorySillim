<?php
header("Content-Type: text/html; charset=UTF-8");
header("Pragma: no-cache");
header("Cache-Control: no-store, no-cache, must-revalidate");
date_default_timezone_set('Asia/Seoul');

error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", 1);

//$ROOT_PATH = $_SERVER['CONTEXT_DOCUMENT_ROOT'];
//define("ROOT_PATH", $ROOT_PATH);

require_once("../../config/common.php");
require_once("../../config/db.php");
require_once("../../config/log.php");
require_once("../../core/o2olib.php");
require_once("../../core/logger/SimpleLogger.php");

define("API_PATH", ROOT_PATH."/api");

$logger = SimpleLogger::getLogger();
$logger->debug("REQUEST_URI : ".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);

if($_REQUEST['api_name']) {
	api_call($_REQUEST['api_name']);
}


set_exception_handler('exception_handler');

?>
