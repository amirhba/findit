<?php 

class Database{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbname = DB_NAME;

	private $dbh;
	private $stmt;
	private $err;


	public function __construct(){
		$sdn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
		try{
			$this->dbh = new PDO($sdn,$this->user,$this->pass);
		}catch(PDOException $e){
			$this->err = $e->getMessage();
			echo $this->$err;
		}
	}

	public function bind($param, $value, $type = null){
      if(is_null($type)){
        switch(true){
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;
          default:
            $type = PDO::PARAM_STR;
        }
      }

      $this->stmt->bindValue($param, $value, $type);
    }

	public function query($sql){
		$this->stmt = $this->dbh->prepare($sql);
	}

	public function execute(){
		return $this->stmt->execute();
	}

	public function rowCount(){
		return $this->stmt->rowCount();
	}

	public function getAllRows(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function getSingleRow(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	public function fetchCol(){
		$this->stmt->execute();
		return $this->stmt->fetchColumn();
	}

	
}


?>