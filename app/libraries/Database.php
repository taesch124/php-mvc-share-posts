<?php
//PDO Database class
//Connect to DB and create/execute prepared statements

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct() {
        //set DSN
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        );

        //create PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //Prepare statement with query
    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }

    //bind parameters
    public function bind($param, $value, $type = null) {
        if(is_null($type)) {
            switch(true) {
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

    public function execute() {
        return $this->stmt->execute();
    }

    //Get results as array
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll();
    }

    //Get single row result
    public function getOne() {
        $this->execute();
        return $this->stmt->fetch();
    }

    //Get row count
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}