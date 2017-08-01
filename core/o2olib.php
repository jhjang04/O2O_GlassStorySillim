<?php


function recursive_escape(&$arr) {
	foreach($arr as $k=>$v) {
		//echo $arr[$k]." = ".gettype($arr[$k]);
		
		if(gettype($arr[$k]) == "array" || gettype($arr[$k]) == "object")
			recursive_escape($arr[$k]);
		else if(gettype($arr[$k]) == "string")
			$arr[$k] = str_replace("\"", "\\\"", $arr[$k]);
		else if(gettype($arr[$k]) == "NULL")
			$arr[$k] = "";
	}
}

function urlencode_data($arg){
	if(is_array($arg)){
		foreach($arg as $k => $v){
			$arg[$k] = urlencode_data($v);
		}
	}else{
		if(gettype($arg) == "string")
			$arg = urlencode($arg);
		if(is_numeric($arg))
			$arg = $arg;
	}

	return $arg;
}

function unpack_object($str) {
	return json_decode(urldecode(stripslashes($str)), true);
}
	
## 에러 만들어 리턴
function return_error($code, $result_text) {
	$arr = array();
	
	$arr['id'] = $_REQUEST["id"]?$_REQUEST["id"]:0;
	$arr['code'] = $code;
	$arr['msg'] = $result_text;
	$arr['result'] = array();
	$arr['meta'] = array();

	return_result($arr);
}

## 성공 + 데이터 리턴
function return_ok($return = array("result"=>"ok"), $page=0, $pagesize=0) {
	recursive_escape($return);

	$arr = array();
	$arr['id'] = $_REQUEST["id"]?$_REQUEST["id"]:0;
	$arr['code'] = 0;
	$arr['msg'] = "";
	$arr['result'] = $return;
	$arr['meta'] = array(
		"page"=>$_REQUEST["page"]?$_REQUEST["page"]:0, 
		"pagesize"=>$_REQUEST["pagesize"]?$_REQUEST["pagesize"]:0
	);
	
	return_result($arr);
}

function return_result($arr) {
	@header("Content-Type: application/json;charset=utf-8");
	$arr = urlencode_data($arr);
	echo urldecode(json_encode($arr));
	exit;
}

function api_call($method) {
	// 함수 목록에 존재하는지 확인
    try {
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
				return_error(0, "{$name} 인자를 찾을 수 없습니다.");
			}
		}
		
		// 함수 호출
		$result = $func->invokeArgs($args);
		if($result == null) {
			return_error(1, "데이터를 찾을 수 없습니다.");
		}
		
		// 결과 반환
		return_ok(array("result"=>$result));
	} catch(ReflectionException $Exception) {
		return_error(0, "함수를 찾을 수 없습니다.");
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