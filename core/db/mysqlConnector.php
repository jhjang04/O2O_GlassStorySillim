<?php
require_once(ROOT_PATH."/core/db/abstractConnector.php");

class mysqlConnector extends abstractConnector{
	public function __construct($db_info) {
		$this->set($db_info['host'] 
			, $db_info['port'] 
			, $db_info['user_nm'] 
			, $db_info['pwd'] 
			, $db_info['db_name']
		);
		$this->mLogger = SimpleLogger::getLogger();
	}


	
	protected function getConnection() {
		if (!empty($this->m_conn)) {
			return $this->m_conn;
		}
		
		$this->m_conn = mysqli_connect($this->m_host . ":" . $this->m_port , $this->m_user , $this->m_pwd , $this->m_db_name);
		
		if(mysqli_connect_error($this->m_conn)){
			//error
			throw new Exception("db connection error");
		}
		// mysqli_query($this->m_conn, "SET AUTOCOMMIT=0");
		// mysqli_query($this->m_conn, "START TRANSACTION");
		mysqli_query($this->m_conn, "SET NAMES utf8");
		mysqli_query($this->m_conn, "SET SESSION character_set_connection=utf8");
		mysqli_query($this->m_conn, "SET SESSION character_set_results=utf8");
		mysqli_query($this->m_conn, "SET SESSION character_set_client=utf8");
		
		return $this->m_conn;
	}
	
	
	
	public function executeQuery($sql , $params=array())
	{
		//if(!isset($params)){ $params = array();}
		if(!is_array($params)){ $params = [$params]; }

		// $this->mLogger->info("call dao : ".debug_backtrace()[1]['function']);
		$this->mLogger->debug("excuqte Query :: $sql");
		$this->mLogger->debug("params :: ".json_encode($params,JSON_UNESCAPED_UNICODE));

		$types = "";
		$strParamCode = "";
		$conn = $this->getConnection();
		$stmt = mysqli_prepare($conn, $sql);
		
		for($i = 0 ; $i<count($params) ; $i++) {
			$strParamCode = $strParamCode." , \$params[".$i."]";
			$type = gettype($params[$i]);
			if($type == "integer"){
				$types = $types."i";
			}
			else if($type == "double"){
				$types = $types."d";
			}
			else if($type == "string"){
				$types = $types."s";
			}
			else{
				$types = $types."b";
			}
		}

		if(count($params) > 0 ){
			$strEvalCode = "mysqli_stmt_bind_param(\$stmt , \"".$types."\"".$strParamCode." );";
			eval($strEvalCode);
		}
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		if(is_bool($result)){
			mysqli_stmt_close($stmt);
			return $result;
		}
		$rs = array();
		$idx = 0;
		while ($row = mysqli_fetch_assoc($result)){
			$rs[$idx++] = $row;
		}
		mysqli_stmt_close($stmt);

		return $rs;
	}

	public function executeRawQuery($sql) {
		$conn = $this->getConnection();
		
		$result = mysqli_query($this->m_conn, $sql);

		return $result;
	}
	
	
	public function commit(){
		mysqli_query($this->m_conn, "COMMIT");
		mysqli_query($this->m_conn, "START TRANSACTION");
		return;
	}
	
	public function rollback(){
		mysqli_query($this->m_conn, "ROLLBACK");
		mysqli_query($this->m_conn, "START TRANSACTION");
		return;
	}
	
	public function release($command="COMMIT"){
		if($this->m_conn == null ){
			return;
		}
		if(!isset($command)){
			$command = "COMMIT";
		}
		
		if(strtoupper($command) == "ROLLBACK"){
			mysqli_query($this->m_conn, "ROLLBACK");
		}
		else if(strtoupper($command) == "COMMIT"){
			mysqli_query($this->m_conn, "COMMIT");
		}
		
		mysqli_close($this->m_conn);
		$this->m_conn = null;
	}
	
}
?>


