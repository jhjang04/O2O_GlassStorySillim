<?php
require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/core/include/include.php");
function doLogin($id, $password){
	if($password == "dasom"){
		session_start();

		$_SESSION['is_logged'] = 'YES';
		$_SESSION['id'] = $id;

		echo "location.href = '".BASE_URL."/page/index.php';";
	}
	else{
		echo "alert('사용자 정보를 확인해 주세요.');
			location.href = '".BASE_URL."/index.php';";
	}
}
?>
