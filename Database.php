<?php


// Connect to database with PDO
//connect to database and execute query

class Database
{

  public $connection;

  public function __construct()
  {

    $config = [
      'host' => 'localhost',
      'port' => 3306,
      'dbname' => 'laracast',
      'charset' => 'utf8mb4',
    ];
    $username = 'root';
    $password = '';

    //$dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}"; 
    // DSN: Data Source Name (host, dbname, charset)

    $dsn = 'mysql:' . http_build_query($config, '', ';');

    $this->connection = new PDO($dsn, $username, $password,[
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }
  public function query($query)
  {

    $statement = $this->connection->prepare($query); //1.write statement to prepare
    $statement->execute(); //2.execute the statement

    return $statement;
  }
}

