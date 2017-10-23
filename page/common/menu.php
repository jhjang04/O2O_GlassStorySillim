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



// $_MENU['shop'] = add_menu("매장관리", "fa-home", "#");  ///shop.php
// $_MENU['shop']['menu'][] = add_menu("매장정보관리", "fa-book", BASE_URL."/page/shop/index.php"); // shop_info
// $_MENU['shop']['menu'][] = add_menu("과일정보관리", "fa-apple", BASE_URL."/page/shop/fruit/index.php");
// $_MENU['shop']['menu'][] = add_menu("재고관리", "fa-bar-chart", BASE_URL."/page/shop/stock/index.php"); // /shop_stock.php

// $_MENU['product'] = add_menu("상품관리", "fa-bars", "#");
// $_MENU['product']['menu'][] = add_menu("판매상품관리", "fa-barcode", BASE_URL."/page/product/product.php");
// $_MENU['product']['menu'][] = add_menu("판매추이", "fa-line-chart", "#"); ///sales_manage.php

// $_MENU['order'] = add_menu("주문관리", "fa-shopping-basket", "#");
// $_MENU['order']['menu'][] = add_menu("현재주문현황", "fa-cart-arrow-down", BASE_URL."/page/order/index.php?state=1"); // 1이면 오늘 배달완료
// $_MENU['order']['menu'][] = add_menu("이전주문내역", "fa-history", BASE_URL."/page/order/index.php?state=0"); // 0이면 이전 배달완료 내역
 

// $_MENU['regularship'] = add_menu("정기배송관리", "fa-rocket", "#"); // /ship_manage.php
// $_MENU['regularship']['menu'][] = add_menu("배송현황관리", "fa-truck", "#"); // /ship_status.php
// $_MENU['regularship']['menu'][] = add_menu("이용고객관리", "fa-user-circle-o", "#");


// $_MENU['app'] = add_menu("앱관리", "fa-tablet", "#");  //app_manage.php
// $_MENU['app']['menu'][] = add_menu("메인배너관리", "fa-picture-o", "#"); // /mainbanner_manage.php
// $_MENU['app']['menu'][] = add_menu("리뷰관리", "fa-instagram", BASE_URL."/page/app/review/index.php"); // /review_manage.php
// $_MENU['app']['menu'][] = add_menu("버전관리", "fa-clone", "#"); // /version_manage.php
 

// title icon menu array


?>


