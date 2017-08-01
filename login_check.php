<?php
	require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/core/include/include.php");
	require_once(API_PATH."/loginApi.php");
	session_start();

	$id = $_POST["inputid"];
	$password = $_POST["inputpassword"];
	
	if($admin['password'] == $password){
		//message(1);
		$_SESSION['is_logged'] = 'YES';
		$_SESSION['id'] = $id;
		header("Location:./index.php");
	}
	else{
		//message(3);
		echo "아이디 비밀번호를 확인해주세요.";
	}
	
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
	<script language="javascript">
		function message(int state) {
			if(state == 1) {
				alert("환영합니다.");
				return true;
				
			}
			else if(state==2){
				alert("계정이 일치하지 않습니다.");
			}
			else if(state==3){
				alert("비밀번호가 일치하지 않습니다.");
			}
		}
	</script>
  </body>
</html>
