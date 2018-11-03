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
		
		$result = $this->pdo->query($sql) or die("Failed");

		$data = [];

		while ($product = $result->fetch()) {
			$data[] = $product;
		}

		if($data != NULL){
			return json_encode($data);
		}
	}

	/*
	 *Get by ID
	 *
	 *@param HTTP Request
	 *@return HTTP Response
	 */
	public function find($id){

		$sql = "SELECT * FROM ".$this->model()." WHERE id=$id";

		$result = $this->pdo->query($sql);

		$data = [];

		while ($r = $result->fetch()) {
			$data[] = $r;
		}

		if($data != NULL){
			return json_encode($data);
		}

	}

	/*
	 *Insert
	 *
	 *@param HTTP Request
	 *@return void
	 */
	public function insert(array $product){
		
		$column = implode(', ', array_keys($product));

		$data = implode(', ', $product);
		
		$sql = "INSERT INTO ".$this->model()." ($column) VALUES ($data)";


		//Insert data
		try {

			$this->pdo->exec($sql);

		} catch (\PDOException $e) {

			throw new \PDOException($e->getMessage(), (int)$e->getCode());

		}
		
	}

	/*
	 *Update
	 *
	 *@param HTTP Request
	 *@return void
	 */
	public function update(array $product, $id){


		foreach ($product as $column => $data) {

			$sql = "UPDATE ".$this->model()." SET $column=$data WHERE id=$id";

			try {

				$this->pdo->exec($sql);

			} catch (\PDOException $e) {

				throw new \PDOException($e->getMessage(), (int)$e->getCode());

			}
			
		}

	}

	/*
	 *Destroy
	 *
	 *@param HTTP Request
	 *@return void
	 */
	public function destroy($id){
		$sql = "DELETE FROM ".$this->model()." WHERE id=$id";

		try {

			$this->pdo->exec($sql);

			echo "Item deleted.";

		} catch (\PDOException $e) {

			throw new \PDOException($e->getMessage(), (int)$e->getCode());

		}

	}

	//Validate
	public function validate($request, array $rules){
			
		// var_dump($request);

		// //Input
		// $input = array_keys($rules);

		// $rule = "";

		// //Tama Checkpoint
		// foreach ($input as $value) {


		// }



		// $rule = implode('', $rules);

		// $rule = preg_replace('/\|/', ' ', $rule);
		// $rule =  explode(" ", $rule);

		// var_dump($rule);
		


		// $_SESSION['errors'] = array();

		// foreach ($request as $input => $value) {
		// 	if(empty($value)){
		// 		$_SESSION['errors'][$input] = array(
		// 			$input." is required.",
		// 		);
		// 	}
		// }

		// $_SESSION['errors'] += $_SESSION['errors'];

		// if(count($_SESSION['errors']) > 0){
		// 	return $_SESSION['errors'];
		// }


	}


}

