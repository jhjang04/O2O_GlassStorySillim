<?php
require_once($_SERVER['DOCUMENT_ROOT']."/core/include/include.php");

// header("Status: 200");

global $db_info;

$dbconnector = getConnection($db_info);


$availability = ($_POST['checked']=='true')?1:0;
$color_lens_id = (int)$_POST['id'];

$update_sql = "UPDATE o2ocolorlens as cl SET cl.availability={$availability} WHERE cl.id={$color_lens_id} LIMIT 1";

// var_dump($update_sql);

$res = $dbconnector->executeRawQuery($update_sql);

?>