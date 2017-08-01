<?php
require_once("../include/include.php");

function example(){
	global $db_example;
	$conn = getConnection($db_example);
	$sql = "select * from ccfruit_user
			where username like concat('%', ? ,'%') ";
	$rs = $conn->excuteQuery($sql,"호준");
	$conn->release();
	return $rs;
}


function example2(){


}
?>
