<?php 
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'yummydb');
	define('DB_USER', 'yummyaccess');
	define('DB_PASS', '*Yummy*1704');

class DB
{
  private static $db;
  
  // Méthode pour créer une connection à la BDD
  public static function connect()
  {
        if(empty(self::$db))
        {
            self::$db = new PDO(
            "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", 
            DB_USER, DB_PASS,
            [
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
              PDO::ATTR_EMULATE_PREPARES => false,
            ]
          );  
        }
        return self::$db;
    }

 // Méthode pour exécuter une réquête SQL
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

  // Méthode pour récupérer le dernier ID crée dans la BDD
  public static function lastId()
  {
    return self::connect()->lastInsertId();
  }

 
}

 ?>