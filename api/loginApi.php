<?php
require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/core/include/include.php");
echo "login";
function doLogin($id, $password){
	// echo "dologin";
	if($password == "1"){
	//if($admin['password'] == $rs[0]['password']){
		session_start();
		// if (isset($_SESSION['is_logged']) && ($_SESSION['is_logged']=='YES')) {
		// 	echo "location.href = '".BASE_URL."/page/index.php';";
		// 	return;
		// }

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
