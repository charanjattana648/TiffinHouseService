<?php
//require_once("./config.inc.php");
class PDOAgent {
    // private $serverName=DB_HOST;
    // private $dbName=DB_NAME;
    // private $user=DB_USER;
    // private $pass=DB_PASS;

    private $serverName="localhost";
    private $dbName="tiffinhousedb";
    private $user="root";
    private $pass="";

    private $className;
    private $dsn;
    private $error;
    private $dbConn;
    private $stmt;

    public function __construct($className)
    {
        //Record the className
        $this->className=$className;
        //set DSN
        $this->dsn="mysql:host=".$this->serverName.";dbName=".$this->dbName;
        //set options
        $options =array(
            PDO::ATTR_PERSISTENT=>true,
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        );        
        //Initialize the PDO Object
        try{
            $this->dbConn=new PDO($this->dsn,$this->user,$this->pass,$options);
        }catch(PDOException $err)
        {
            $this->error=$err->getMessage();
        }
    }

    // Take a query then prepare and store it in stmt.
    public function query(string $query)    
    { 
        $this->stmt = $this->dbConn->prepare($query);  
    }

        //Bind Parmemters and values for the prepared statement 
public function bind(string $param, string $value, $type=null)
{
    if(is_null($type))
    {
        switch(true){
            case is_int($value):
            $type=PDO::PARAM_INT;
            break;
            case is_bool($value):
            $type=PDO::PARAM_BOOL;
            break;
            case is_null($value):
            $type=PDO::PARAM_NULL;
            break;
            default:            
            $type=PDO::PARAM_STR;
        }
    }
    $this->stmt->bindValue($param,$value,$type);    
}
// execute the prepared statement
public function execute($data=null)
{
    if(is_null($data))
    {
        return $this->stmt->execute();
    }else{
        return $this->stmt->execute($data);
    }
}

//Return the resultset (more than one record)
public function resultSet()
{
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_CLASS,$this->className);
}
 //Return a single result (single record)
public function singleResult()
{
    $this->execute();
    $this->stmt->setFetchMode(PDO::FETCH_CLASS,$this->className);
    return $this->stmt->fetch(PDO::FETCH_CLASS);
}

/**returns row count */
public function rowCount():int
{
    return $this->stmt->rowCount();
}

/**last inserted id */
public function lastInsertedId():string
{
    return $this->dbConn->lastInsertId();
}
public function rowsAffected():int
{
    return $this->stmt->rowCount();
}





}


?>