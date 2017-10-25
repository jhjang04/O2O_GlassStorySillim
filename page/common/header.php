<?php
	session_start();
	$is_logged = $_SESSION['is_logged'];

	if($is_logged=='YES'){
		$_id = $_SESSION['id'];
		$message = $_id . ' 님, 로그인 했습니다.';
	}
	else {
    echo "<script>";
    echo "alert('로그인이 실패했습니다.');";
    echo "location.href='".BASE_URL."';";
    echo "</script>";
		//header("Location: ".BASE_URL);
	}
  
  require_once(ROOT_PATH."/page/common/common.php");
  require_once(ROOT_PATH."/page/common/menu.php");
  require_once(ROOT_PATH."/core/db/mysqlConnector.php");
?>

<!DOCTYPE html>
<!--	
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>글라스스토리 관리</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/skin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/skin/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/skin/dist/css/skins/skin-blue.css">

  <!-- bootstrap-toggle -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>/skin/plugins/bootstrap-toggle/bootstrap-toggle.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- jQuery 2.2.3 -->
<script src="<?php echo BASE_URL; ?>/skin/plugins/jQuery/jquery-2.2.3.min.js"></script>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition fixed skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo BASE_URL; ?>/page/index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>O2O</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>O2O</b>Glass Story Sillim</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo BASE_URL; ?>/skin/dist/img/logo.png" class="user-image" alt="Logo Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['id']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo BASE_URL; ?>/skin/dist/img/logo.png" class="img-circle" alt="Logo Image">

                <p>
                  <?php echo $_SESSION['id']; ?> 
                  <small>since 2015</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo BASE_URL; ?>/skin/dist/img/logo.png" class="img-circle" alt="Logo Image">
        </div>
        <div class="pull-left info">
          <p>글라스스토리</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-building"></i> 신림점</a>
        </div>
      </div>

    

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- <li class="header">HEADER</li> -->
        <!-- Optionally, you can add icons to the links -->
		
		<?php
		global $_MENU;
						// 게시판 보여지는 이름
		foreach($_MENU as $name => $menu){
			
			$active = "";
			// LEVEL1 메뉴가 선택되었을 때
			if($_LEVEL1 == $name){	
				$active = "active";
			}
			
			// 서브메뉴가 있을 때
			if(count($menu['menu'])>0){
				echo "<li class=\"treeview {$active}\"><a href=\"{$menu['link']}\"><i class =\"fa {$menu['icon']}\"></i>";
				echo " <span>{$menu['title']}</span><span class=\"pull-right-container\">";
				echo "<i class=\"fa fa-angle-left pull-right\"></i></span></a><ul class=\"treeview-menu\">";
				
				foreach($menu['menu'] as $index => $submenu){
					$subactive = "";
					
          // echo "<pre>";
          // var_dump($index);
          // var_dump($_LEVEL2);
          // var_dump($submenu);
          // echo "</pre>";
          if($index == $_LEVEL2){
						$subactive = "active";
					}
					
					echo "<li class=\"{$subactive}\"><a href=\"{$submenu['link']}\"><i class=\" fa {$submenu['icon']}\"></i>{$submenu['title']}</a></li>";
				}
				echo "</ul></li>";
				
			}
			else{ // 서브메뉴가 없는 단일메뉴일 때
				echo "<li class=\"{$active}\"><a href=\"{$menu['link']}\"><i class=\"fa {$menu['icon']}\"></i>";
				echo "<span>{$menu['title']}</span></a></li>";
			}
			
		}
		?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
	  <h1>
		<?php echo $_TITLE; ?>
        <small></small>
      </h1>
	  
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol> -->
      
      <?php
        // echo "<pre>";
        // var_dump($_LEVEL1);
        // var_dump($_LEVEL2);
        // echo "</pre>";

        echo "<ol class='breadcrumb'>";
        
        echo "<li><i class='fa fa-bookmark-o'></i> {$_LEVEL1}</li>";
        if (!empty($_LEVEL2)) {
          echo "<li>{$_LEVEL2}</li>";
          if (!empty($_LEVEL3)) {
            echo "<li>{$_LEVEL3}</li>";
          }
        }

        echo "<ol>";
      ?>
    </section>
	

    <!-- Main content -->
    <!--<section class="content">-->