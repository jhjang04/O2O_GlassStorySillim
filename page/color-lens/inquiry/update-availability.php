<?php
$db_info = array(
  'host' => 'localhost',
  'port' => 3306,
  'user_nm' => 'root',
  'pwd' => null,
  'db_name' => 'o2o_glass_story'
);

$conn = mysqli_connect($db_info['host'].':3306', $db_info['user_nm'], $db_info['pwd'], $db_info['db_name']);


?>