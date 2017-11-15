<?php
require_once($_SERVER['DOCUMENT_ROOT']."/core/include/include.php");
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Glass Story 신림점</title>
  
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/skin/bootstrap/css/bootstrap.min.css">
    <link href="login.css" rel="stylesheet">
  </head>
  <body>
      <div class="container">
        <div class="card card-container">
          <img id="profile-img" class="profile-img-card" src="<?php echo BASE_URL; ?>/skin/dist/img/logo.png">
          <p id="profile-name" class="profile-name-card"></p>
          <form class="form-signin" method="post" action="<?php echo API_URL."/loginApi.php"; ?>">
            <input name="script_name" type="hidden" value="doLogin">
            <input type="text" name="id" id="inputID" class="form-control" placeholder="ID" required autofocus>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
          </form><!-- /form -->
        </div><!-- /card-container -->
      </div><!-- /container -->



    <!-- <hr>
    <div class="container">

      <div class="form-signin">
        <h2 class="form-signin-heading">관리자님 반갑습니다!</h2>
        
        <form name="login_from" method="post" action="<?php echo API_URL."/loginApi.php"?>">
          <label for="inputEmail" class="sr-only">아이디</label>
          <input name="script_name" type="hidden" value="doLogin">
          <input type="text" name="id" id="id" class="form-control" placeholder="ID" required autofocus>
          <label for="password" class="sr-only">비밀번호</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        
          <button class="btn btn-lg btn-primary btn-block" type="submit">관리하러 가기</button>
        </form>
      </form>
    </div> -->
  </body>
</html>
