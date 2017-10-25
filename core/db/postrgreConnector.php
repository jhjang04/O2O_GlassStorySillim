<?php
require_once(ROOT_PATH."/core/db/abstractConnector.php");
class postgreConnector extends abstractConnector{
	
	public function __construct($db_info) {
		$this->set($db_info['host'] 
			, $db_info['port'] 
			, $db_info['user_nm'] 
			, $db_info['pwd'] 
			, $db_info['db_name']
		);
		$this->mLogger = SimpleLogger::getLogger();
	}

	
	public function set($_host , $_port , $_user , $_pwd , $_db_name) {
		$this->m_host = $_host;
		$this->m_port = $_port;
		$this->m_user = $_user;
		$this->m_pwd = $_pwd;
		$this->m_db_name = $_db_name;
	}

	
	public function getConnection() {
		if($this->m_conn != null){
			return $this->m_conn;
		}

		$this->m_conn = pg_connect("host=".$this->m_host
			." port=".$this->m_port
			." dbname=".$this->m_db_name
			." user=".$this->m_user
			." password=".$this->m_pwd
		);
		
		if(pg_connection_status($this->m_conn) == PGSQL_CONNECTION_BAD){
			throw new Exception("db connection error");
		}

		pg_query($this->m_conn, "BEGIN")
		
		return $this->m_conn;
	}
	
	
	
	public function executeQuery($sql , $params)
	{
		if(!isset($types)){ $types = "";}
		if(!isset($params)){ $params = array();}
		if(!is_array($params)){ $params = [$params]; }
		
		// $this->mLogger->info("call from :: ".debug_backtrace()[1]['function']);
		$this->mLogger->debug("excuqte Query :: $sql");
		$this->mLogger->debug("params :: ".json_encode($params));
		$this->mLogger->debug("types :: ".$types);
		
		$conn = $this->getConnection();
		$result = pg_prepare($conn, "my_query", $sql );
		$result = pg_execute($dbconn, "my_query", array("Joe's Widgets"));
		$rs = array();
		$idx = 0;
		while ($row = pg_fetch_assoc($result)){
			$rs[$idx++] = $row;
		}
		
		return $rs;
	}

	public function executeRawQuery($sql) {
		//TODO
		return null;
	}
	
	
	public function commit(){
		pg_query($this->m_conn , "COMMIT");
		pg_query($this->m_conn, "BEGIN");
		return;
	}
	
	public function rollback(){
		pg_query($this->m_conn , "ROLLBACK");
		pg_query($this->m_conn, "BEGIN");
		return;
	}
	
	public function release($command){
		if($this->m_conn == null ){
			return;
		}
		if(!isset($command)){
			$command = "COMMIT";
		}
		
		if(strtoupper($command) == "ROLLBACK"){
			pg_query($this->m_conn , "ROLLBACK");
		}
		else if(strtoupper($command) == "COMMIT"){
			pg_query($this->m_conn , "COMMIT");
		}
		
		pg_close($this->m_conn);
		$this->m_conn = null;
	}
	
	public function getError() {
		return null;
	}
}
?>


