<?php

class db {
  protected $connection;
  protected $query_result;

  public function __construct($dbhost='localhost', $dbuser='root', $dbpass='', $dbname) {
    try {
      $this -> connection = new PDO("mysql:host=$dbhost; dbname=$dbname", $dbuser, $dbpass);
      $this -> connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      die("ERROR: Could not connect. " . $e->getMessage());
    }
    
  }

  public function query($sql) {
    $this -> query_result = $this -> connection -> query($sql);
    return $this -> query_result;
  }
}