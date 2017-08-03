<?php
require_once($_SERVER['CONTEXT_DOCUMENT_ROOT']."/core/include/include.php");
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bootstrap-3.3.2/docs/favicon.ico">

    <title>Glass Story 신림점</title>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
<!-- 합쳐지고 최소화된 최신 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- 부가적인 테마 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	
    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <!--
	<script language="javascript">
		function check() {
			var id = $("#inputEmail").val();
			var pw = $("#inputPassword").val();
			if(id == "ccfruit") {
				if(pw == "ccfruit09") {
					alert("환영합니다.");
					return true;
				}
			}
			alert("계정이 일치하지 않습니다.");
			return false;
		}
	</script>
	-->
    <div class="container">

      <div class="form-signin">
        <h2 class="form-signin-heading">관리자님 반갑습니다!</h2>
        
        <!--<div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> 기억하기
          </label>
        </div>-->
        <form name="login_from" method="post" action="<?php echo API_URL."/loginApi.php"?>">
		<label for="inputEmail" class="sr-only">아이디</label>
        <input name="script_name" type="hidden" value="doLogin">
        <input type="text" name="id" id="id" class="form-control" placeholder="ID" required autofocus>
        <label for="password" class="sr-only">비밀번호</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        
          <button class="btn btn-lg btn-primary btn-block" type="submit">관리하러 가기</button>
        </form>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--
    2017.08.03 jhajng04
    file not exists..
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    -->
  </body>
</html>
