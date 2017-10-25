<?php
require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/core/include/include.php");
require_once(ROOT_PATH."/core/db/mysqlConnector.php");

// header("Status: 200");

global $db_info;

$dbconnector = new mysqlConnector($db_info);

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

$availability = ($_POST['checked']=='true')?1:0;
$goods_id = (int)$_POST['id'];

$update_sql = "UPDATE o2oglassstory as gla SET gla.Availability={$availability} WHERE gla.Goods_Code={$goods_id} LIMIT 1";
// var_dump($update_sql);
$res = $dbconnector->executeRawQuery($update_sql);
// var_dump($res);

?>