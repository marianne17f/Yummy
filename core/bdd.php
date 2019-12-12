<?php 
// Defining constants
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'yummydb');
	define('DB_USER', 'yummyaccess');
	define('DB_PASS', '*Yummy*1704');

class DB
{
  private static $db;
  
  
  // Method to create a connection to the DB
  public static function connect()
  {
      if(empty(self::$db))
      {
          self::$db = new PDO(
          "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", 
          DB_USER, DB_PASS,
          [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // display errors
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // return an associative array(string based) not numeric
            PDO::ATTR_EMULATE_PREPARES => false, // request send only to execute / not to prepare
          ]
        );  
      }
      return self::$db;
  }


 // Method to execute a SQL request
  public static function select($sql, $cond=null)
  {
    $result = false;
    try
    {
      $stmt = self::connect()->prepare($sql);
      $stmt->execute($cond);
      $result = $stmt->fetchAll();
    }
    catch (Exception $ex)
    {
      die($ex->getMessage());
    }

    $stmt = null;
    return $result;
  }



  // Method to recover the last ID created in the BDD
  public static function lastId()
  {
    return self::connect()->lastInsertId();
  }

 
}

 ?>