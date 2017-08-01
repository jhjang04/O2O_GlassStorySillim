<?php

class SimpleLogger{
	private static $LOGGER = null;
	private $m_level;
	private $m_file;
	private $m_buffer = "";
	
	private $levelDepth = array(  "NONE"=>0 
								, "ERROR"=>1 
								, "INFO"=>2 
								, "DEBUG"=>3
			);
	
	public static function getLogger() {
		
		if(SimpleLogger::$LOGGER == null) {
			global $log_info;
			SimpleLogger::$LOGGER = new SimpleLogger($log_info);
		}
		return SimpleLogger::$LOGGER;
	}
	
	
	public function __construct($log_info){
		$this->set($log_info);
		if(!is_dir($log_info['path'])){
			mkdir($log_info['path'] , 0777 , true);
		}
		$this->debug("logger constructed");
	}
	
	public function __destruct(){
		$this->debug("logger destroyed");
		$this->flush();
	}
	
	
	private function levelCheck($level){
		if($this->levelDepth[$level] <= $this->levelDepth[$this->m_level])
			return true;
		else
			return false;
	}
	
	public function set($log_info){
		$this->m_file = $log_info['path']."/".date("Y-m-d").".log";
		$this->m_level = strtoupper($log_info['level']);
	}
	
	
	public function error($txt){
		if($this->levelCheck("ERROR"))
			$this->m_buffer .= date("Y-m-d H:i:s")." error :: ".$txt.PHP_EOL;
	}
	
	public function info($txt){
		if($this->levelCheck("INFO"))
			$this->m_buffer .= date("Y-m-d H:i:s")."  info :: ".$txt.PHP_EOL;
	}
	
	public function debug($txt){
		if($this->levelCheck("DEBUG"))
			$this->m_buffer .= date("Y-m-d H:i:s")." debug :: ".$txt.PHP_EOL;
	}
	
	
	public function flush(){
		$fileNm = $this->m_file;
		
		$file = fopen($fileNm, "a");
		if($file){
			fwrite( $file, $this->m_buffer );
			$this->m_buffer = "";
			fclose( $file );
		}
	}
}
?>
