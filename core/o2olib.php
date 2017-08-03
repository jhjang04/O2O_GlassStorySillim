<?php
$G_SCRIPT = 0;
$G_API = 1;

## 에러 만들어 리턴
function return_error($code, $result_text) {
	$arr = array();
	$arr['id'] = $_REQUEST["id"]?$_REQUEST["id"]:0;
	$arr['code'] = $code;
	$arr['msg'] = $result_text;
	$arr['result'] = array();
	$arr['meta'] = array();
	//return_result($arr);
	return $arr;
}


## 성공 + 데이터 리턴
function return_ok($return = array("result"=>"ok")
				, $page=0
				, $pagesize=0) {

	$arr = array();
	$arr['id'] = $_REQUEST["id"]?$_REQUEST["id"]:0;
	$arr['code'] = 0;
	$arr['msg'] = "";
	$arr['result'] = $return;
	$arr['meta'] = array(
		"page"=>$_REQUEST["page"] ? $_REQUEST["page"]:0, 
		"pagesize"=>$_REQUEST["pagesize"] ? $_REQUEST["pagesize"]:0
	);
	//return_result($arr);
	return $arr;
}


function callMethod($method){
	$func = new ReflectionFunction($method);
	
	// 파라미터 리스트 받아옴
	$params = $func->getParameters();
	
	// 파라미터 전부 있는지 확인
	$args = array();
	foreach($params as $param) {
		$name = $param->getName();
		$optional = $param->isOptional();
		if(isset($_REQUEST[$name])) {
			$args[$name] = $_REQUEST[$name];
		} else if($optional) {
			$args[$name] = $param->getDefaultValue();
		} else {
			return return_error(0, "{$name} 인자를 찾을 수 없습니다.");
		}
	}

	// 함수 호출
	$result = $func->invokeArgs($args);
	return $result;
	// if($result == null) {
	// 	return_error(1, "데이터를 찾을 수 없습니다.");
	// }
}



function script_call($method){
// 함수 목록에 존재하는지 확인
	echo "<script>";
    try {
		// 결과 반환
		$result = callMethod($method);
		$rtn = return_ok(array("result"=>$result));
		//echo json_encode($arr,JSON_UNESCAPED_UNICODE);
	} catch(ReflectionException $Exception) {
		//$rtn = return_error(0, "함수를 찾을 수 없습니다.");
		//echo json_encode($arr,JSON_UNESCAPED_UNICODE);
		echo "alert('함수를 찾을 수 없습니다.');";
		echo "history.back()";
	}
	echo "</script>";
}


function api_call($method) {
	@header("Content-Type: application/json;charset=utf-8");
    try {
		$result = callMethod($method);
		// 결과 반환
		return_ok(array("result"=>$result));
		echo json_encode($arr,JSON_UNESCAPED_UNICODE);
	} catch(ReflectionException $Exception) {
		$rtn = return_error(0, "함수를 찾을 수 없습니다.");
		echo json_encode($arr,JSON_UNESCAPED_UNICODE);
	}
}


function getConnection($db_info) {
	$conn;
	$srcpath = ROOT_PATH."/core/db/";
	$eval = "\$conn = new ";
	if(strtoupper($db_info['type']) == "MYSQL") {
		$srcpath = $srcpath."mysqlConnector.php";
		$eval = $eval."mysqlConnector";
	}
	else if(strtoupper($db_info['type']) == "POSTGRE"){
		$srcpath = $srcpath."postgreConnector.php";
		$eval = $eval."postgreConnector";
	}
	else{
		throw new Exception("db type is invalid");
	}
	$eval = $eval."(\$db_info);";
	require_once($srcpath);
	eval($eval);
	return $conn;
}





function exception_handler($exception) {
	$logger = SimpleLogger::getLogger();
	$logger->error($exception->getMessage());
	echo "Uncaught exception: " , $exception->getMessage(), "\n";
}

?>