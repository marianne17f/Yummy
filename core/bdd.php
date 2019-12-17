<?php 
// Statement of constants
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'yummydb');
	define('DB_USER', 'yummyaccess');
	define('DB_PASS', '*Yummy*1704');

// Statement of DB object
class DB
{ 
   //Static attribute (which can be used without instanciating the object, no need for "new DB")
  private static $db;
  
  // Method to create a connection to the Data Base
  public static function connect()
  {
      //if the $db static attribute of this object (self) is empty ( self:: targets a static element of an object)
      if(empty(self::$db))
      {
          //assignment to the attribute $db of the intanciation of the hydrated PDO object with the connection parameters
          self::$db = new PDO(
          "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", 
          DB_USER, DB_PASS,
          [
             // display errors related to the Data Base
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            // return an associative array(string based) not numeric
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
            // request send only to execute / not to prepare 
            PDO::ATTR_EMULATE_PREPARES => false, 
          ]
        );  
      }
      return self::$db;
  }


  // Method to execute a SQL request
  //Declaration of the static "select" method which takes 2 arguments, a sql query and an array of conditions (which can be null)
  public static function select($sql, $cond=null)
  {
    $result = false;
    try
    {
      // prepare the query with the $sql parameter
      $stmt = self::connect()->prepare($sql);
      // execute the query with the $cond parameter
      $stmt->execute($cond);
      // fetchAll on the query to organize the results in a 2-dimensional array
      $result = $stmt->fetchAll();
    }

    // catch errors with stop and display of errors
    catch (Exception $ex)
    {
      die($ex->getMessage());
    }

    $stmt = null;
    return $result;
  }



  // Method to return the last ID inserted in the Data Base
  public static function lastId()
  {
    return self::connect()->lastInsertId();
  }

 
}

 ?>