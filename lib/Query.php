<?php

/*
 *PDO Queries
 */
class Query
{	

	private $host = "localhost";
	private $driver = "mysql";
	private $db = "techies_db";
	private $user = "root";
	private $pass = "";
	private $charset = "utf8mb4";
	private $dsn;
	private $options;
	private $pdo;


	/*
	 *Construct PDO
	 */
	public function __construct(){

		//Assign DSN
		$this->dsn = $this->driver.":host=".$this->host.";dbname=".
		$this->db.";charset=".$this->charset;

 	    //Options
		$this->options = array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
		);

        //Start connection
		try {
			$this->pdo = new PDO($this->dsn, $this->user, $this->pass, $this->options);
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}

	}

	/*
	 *Get model class name
	 */
	public function model(){
		return strtolower(get_called_class()).'s';
	}

	/*
	 *Select all
	 */
	public function all(){
		$sql = "SELECT * FROM ".$this->model();
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}

	/*
	 *Insert
	 */
	public function insert(array $item){
		var_dump($item);
	}



}

