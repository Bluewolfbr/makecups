<?php

class Connect {

	public static $instance; 
	private $host = "localhost";
	private $dbname = "makecups";
	private $user = "postgres";
	private $pass = "postgres";
	private $port = "5432";

	public static function getInstance() { 
	
		if (!isset(self::$instance)) { 
			self::$instance = new Connect();
	
		} 
	
		return self::$instance; 
	
	}

	public function establishConnection() {
       
		$connectionResources = pg_connect("host=$this->host port=$this->port dbname=$this->dbname user=$this->user password=$this->pass")
			or die ("Erro ao se conectar ao banco de dados");
        
        
        return $connectionResources;
    }

    public function executeQuery($con, $query) {

        $result=pg_query($con, $query);

        return $result;

    }

    public function executeQueryParams($con, $query, $params) {

        $result=pg_query_params($con, $query, $params);

        return $result;

    }

}