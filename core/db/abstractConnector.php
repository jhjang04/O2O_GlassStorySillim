<?php

abstract class abstractConnector {
	protected $m_host;
	protected $m_port;
	protected $m_user;
	protected $m_pwd;
	protected $m_db_name;
	protected $m_conn = null;
	protected $mLogger = null;

	public function set($_host , $_port , $_user , $_pwd , $_db_name) {
		$this->m_host = $_host;
		$this->m_port = $_port;
		$this->m_user = $_user;
		$this->m_pwd = $_pwd;
		$this->m_db_name = $_db_name;
	}

	abstract protected function getConnection();
	abstract public function excuteQuery($sql , $params);
	abstract public function commit();
	abstract public function rollback();
	abstract public function release($command);

	public function getDbInfo(){
		return json_encode(
			array("host"=>$this->$m_host 
				, "port" => $this->$m_port
				, "user" => $this->$m_user
				, "db_name" => $this->$m_db_name));
	}
}

?>


