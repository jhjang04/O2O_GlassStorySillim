<?php

function add_menu($title, $icon, $link) {
	return array("title" => $title , "icon" => $icon , "link" => $link );
}

$_MENU = array();

$_MENU['dashboard'] = add_menu("대시보드", "fa-tachometer", BASE_URL."/page/index.php");

$_MENU['color-lens'] = add_menu("컬러렌즈", "fa-eye", BASE_URL."/page/color-lens/index.php");
$_MENU['color-lens']['menu'][] = add_menu("조회", "fa-list", BASE_URL."/page/color-lens/inquiry/index.php");
$_MENU['color-lens']['menu'][] = add_menu("관리", "fa-file-text-o", BASE_URL."/page/color-lens/manage/index.php");

$_MENU['glasses'] = add_menu("안경/일반렌즈", "fa-user-circle", BASE_URL."/page/glasses/index.php");
$_MENU['glasses']['menu'][] = add_menu("조회", "fa-list", BASE_URL."/page/glasses/inquiry/index.php");

$_MENU['sales'] = add_menu("매출", "fa-line-chart", BASE_URL."/page/sales/index.php");
$_MENU['sales']['menu'][] = add_menu("조회", "fa-list", BASE_URL."/page/sales/inquiry/index.php");
$_MENU['sales']['menu'][] = add_menu("예측", "fa-desktop", BASE_URL."/page/sales/predict/index.php");

?>


