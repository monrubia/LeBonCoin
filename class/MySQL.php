<?php

require_once (dirname(__FILE__) . '/../config.inc.php');

class MySQL
{
    private $pdo;
    private static $sharedIstance = null;

    // The db connection is established in the private constructor.
    private function __construct()
    {
        $this->pdo = new PDO('mysql:host=' . _DB_MYSQL_HOST_ . ';dbname=' . _DB_MYSQL_DBNAME_ , _DB_MYSQL_USER_, _DB_MYSQL_PASSW_);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Pattern Singleton
    public static function getInstance()
    {
        if (self::$sharedIstance === null) {
            self::$sharedIstance = new MySQL();
        }
        return self::$sharedIstance;
    }

    // General function to INSERT info into a table.
    public function execute($query)
    {
		try {
			return $this->pdo->query($query);
		} catch(Exception $e) {
			
			//Error management
			if (_DEBUG_) {
				echo "ERROR on query : ".$query." <br />";
			}
			return false;
		} 
    }

    // General function to SELECT info from the table of my DB.
    public function executeS($query)
    {
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //function to get a row from the query.
    public function getRow($query)
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    //function to get a field from a specific row from a query.
    public function getValue($query, $field)
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row[$field];
    }
    
    //function to get a field from a specific row from a query.
    public function getLastInsertedId()
    {
		return $this->pdo->lastInsertId();
    }
}
