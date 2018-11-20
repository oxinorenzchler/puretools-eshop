<?php

include($_SERVER['DOCUMENT_ROOT'].'/techies/vendor/plural-master/lib/Plural.php');

/**
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
	private $deleted_at;
	private $updated_at;
	private $created_at;
	private $data;

	/**
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

	/**
	 *Get model class name
	 *
	 *@return child class
	 */
	public function model(){
		return strtolower(Plural::pluralize(get_called_class()));
	}

	/**
	 *Select all
	 *
	 *@return HTTP Response
	 */
	public function all(){
		$sql = "SELECT * FROM ".$this->model()." WHERE deleted_at IS NULL";
		
		$result = $this->pdo->query($sql) or die("Failed");

		$data = [];

		while ($request = $result->fetch()) {
			$data[] = $request;
		}

		if($data != NULL){
			return json_encode($data);
		}
	}

	/**
	 *Get by ID
	 *
	 *@param HTTP Request
	 *@return HTTP Response
	 */
	public function find($id){

		$sql = "SELECT * FROM ".$this->model()." WHERE id=:id LIMIT 1";

		$query = $this->pdo->prepare($sql);

		$query->execute([':id'=>$id]);

		$result = $query->fetch();

		if($result != NULL){
			return json_encode($result);
		}

	}

	/**
	 *Insert
	 *
	 *@param HTTP Request
	 *@return boolean
	 */
	public function insert(array $request){

		$this->created_at = date('Y-m-d H:i:s');

		$this->updated_at = $this->created_at;

		$request = $this->escapeHTML($request);

		$column = implode(', ', array_keys($request));

		$data = implode("', '", $request);

		$sql = "INSERT INTO ".$this->model()." ($column,
		created_at,updated_at) VALUES ('$data','$this->created_at','$this->updated_at')";

		//Insert data
		try {

			$this->pdo->exec($sql);
			return true;

		} catch (\PDOException $e) {

			throw new \PDOException($e->getMessage(), (int)$e->getCode());

		}
		
	}

	/**
	 *Update
	 *
	 *@param HTTP Request
	 *@return boolean
	 */
	public function update(array $request, $id){

		$this->updated_at = date('Y-m-d H:i:s');

		$request = $this->escapeHTML($request);

		foreach ($request as $column => $data) {

			$sql = "UPDATE ".$this->model()." SET $column='$data', updated_at='$this->updated_at' WHERE id=$id";
			try {
				$this->pdo->exec($sql);
			} catch (\PDOException $e) {
				$_SESSION['errors']['duplicate'] = "Data already taken.";
				header("Location: ".$_SERVER['HTTP_REFERER']."");
			}

		}

		return true;


	}

	/**
	 *Destroy
	 *
	 *@param HTTP Request
	 *@return boolean
	 */
	public function destroy($id){

		$this->deleted_at = date('Y-m-d H:i:s');

		$sql = "UPDATE ".$this->model()." SET deleted_at='$this->deleted_at' WHERE id=$id";

		try {

			$this->pdo->exec($sql);

			return true;

		} catch (\PDOException $e) {

			throw new \PDOException($e->getMessage(), (int)$e->getCode());

		}

	}


	/**
	 *Validate request
	 *
	 *@param HTTP Request and array Rules
	 *@return HTTP Response	 
	 */
	//Validate
	public function validate($request, array $rules){

		
		//Get indexes of $request and $rules then merge them into a single array
		$input = array_keys($rules);
		$req = array_keys($request);
		$grouped = array_intersect($input, $req);

		//Declare variables
		$_SESSION['errors'] = [];
		
		/*Loop through the grouped arrays and use it to loop through the request array and filter the values of that array.*/ 
		foreach ($grouped as $value) {

			foreach($rules[$value] as $k => $v) {
				
				switch ($v) {

					case 'required':
					if($request[$value] === ''){
						$_SESSION['errors'][$value] = $value . ' is required.';
					}
					break;

					case 'string':
					if(!is_string($request[$value])){
						$_SESSION['errors'][$value] = $value . ' must be a string.';
					}
					break;

					case 'numeric':
					if(!is_numeric($request[$value])){
						$_SESSION['errors'][$value] = $value . ' must be a number';
					}
					break;

					case 'min':
					if(is_string($request[$value]) && strlen($request[$value]) < 8 ){
						$_SESSION['errors'][$value] = $value . ' must be at least 8 character';
					}
					break;

					case 'email':
					if (!filter_var($request[$value], FILTER_VALIDATE_EMAIL)) {
						$_SESSION['errors'][$value] = $value . ' must be a valid email';
					}
					break;

					case 'password_confirmation':
					if ($request['password'] != $request['password_confirmation']){
						$_SESSION['errors']['password_confirm'] =  "password does not match.";
					}
					break;

					case 'tel':
					if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $request[$value])) {
						$_SESSION['errors'][$value] = $value ." must be a valid. (xxx-xxxx-xxxx).";
					}
					break;

					default:

					throw new Exception("Invalid rule.", 1);

					break;
				}

			}
		}

		//Check for errors then redirect to previous page
		if(count($_SESSION['errors']) > 0){
			header("Location: ".$_SERVER['HTTP_REFERER']."");
		}else{
			unset($_SESSION['errors']);
		}


	}

	/**
	 *Escape HTML characters
	 *
	 *@param HTTP Request
	 *@return HTTP Request
	 */
	public function escapeHTML(array $request){
		//Escape html characters
		$req = [];

		foreach ($request as $key => $value) {
			$req[$key] = htmlspecialchars($value);
		}

		return $req;
	}


	/**
	 *OrderBy
	 *
	 *@param HTTP Request
	 *@return HTTP Response
	 */
	public function orderBy($column, $sort){

		$rule = strtoupper($sort);

		$sql = $this->data."ORDER BY $column $rule ";

		$this->data = $sql;

		return $this;

	}

	/**
	 *Where
	 *
	 *@param HTTP Request
	 *@return HTTP Response
	 */
	public function where($column, $data){

		$sql = $this->data."WHERE $column='$data' AND deleted_at IS NULL ";

		$this->data = $sql;

		return $this;

	}

	/**
	 *Limit
	 *
	 *@param HTTP Request
	 *@return HTTP Response
	 */
	public function limit($counter){

		$sql = $this->data."LIMIT $counter ";

		$this->data = $sql;

		return $this;
	}

	/**
	 *Raw
	 *
	 */
	public function raw($sql){
		$this->data = $sql;
		return $this;
	}
	/**
	 *Get
	 *
	 *@param HTTP Request
	 *@return HTTP Response
	 */
	public function get(){

		$sql = "SELECT * FROM ".$this->model()." ".$this->data;

		// return $sql;

		$result = $this->pdo->query($sql) or die("Failed");

		$data = [];

		while ($request = $result->fetch()) {
			$data[] = $request;
		}

		if($data != NULL){
			return json_encode($data);
		}
		
	}

	/**
	 * Auth
	 * Login
	 */
	public function login
	($email, $password){
		//Prepare sql for login
		$sql = "SELECT * FROM ".$this->model()." WHERE email=:email AND password=:password AND deleted_at IS NULL";

		$query = $this->pdo->prepare($sql);

		$query->execute([':email'=>$email, ':password'=>$password]);

		$result = $query->fetch();

		return json_encode($result);
	
	}

	
}


