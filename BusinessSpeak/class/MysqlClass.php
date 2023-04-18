<?php
namespace App\class;

if(session_status() == PHP_SESSION_DISABLED) session_start();

class MySQL {
  private $host;
  private $user;
  private $password;
  private $database;
  public $connection;

  public function __construct() {
    require_once('../config/connect.php');
    $this->host = $connect['host'];
    $this->database = $connect['database'];
    $this->user = $connect['user'];
    $this->password = $connect['password'];
  }

  public function connect() {
    $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);

    if (!$this->connection) {
      die('Could not connect: ' . mysqli_connect_error($this->connection));
    }
  }

  public function query($sql) {
    $result = mysqli_query($this->connection, $sql);

    if (!$result) {
      die('Query error: ' . mysqli_error($this->connection));
    }

    return $result;
  }

  public function fetch_array($result) {
    return mysqli_fetch_array($result);
  }

  public function num_rows($result) {
    return mysqli_num_rows($result);
  }

  public function affected_rows($result){
    return mysqli_affected_rows($result);
  }

  public function close() {
    mysqli_close($this->connection);
  }
}

?>