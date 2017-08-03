<?php
require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/core/include/include.php");
function doLogin($id , $password){
	// $conn = getConnection($db_info);
	// $sql = "";
	//$rs = $conn->excuteQuery($sql,"");
	//
	//$conn->release();
	if($password == "1"){
	//if($admin['password'] == $rs[0]['password']){
		session_start();
		$_SESSION['is_logged'] = 'YES';
		$_SESSION['id'] = $id;

		echo "alert('환영합니다.');
			location.href = '".BASE_URL."/page/index.php';";

		//header("Location: ".BASE_URL."page/index.php");
	}
	else{
		echo "alert('사용자 정보를 확인해 주세요.');
			location.href = '".BASE_URL."/index.php';";
		//header("Location: ".BASE_URL."page/index.php");
	}
}
?>
