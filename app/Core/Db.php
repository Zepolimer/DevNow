<?php

namespace devnowMVC\app\Core;
use PDO;
use PDOException;

class Db extends PDO
{
  private static $instance; // Instance unique de la classe

  private const HOST = 'localhost';
  private const NAME = 'stagence';
  private const USER = 'root';
  private const PASS = 'root';

  private function __construct()
  {
    $_dsn = 'mysql:dbname=' . self::NAME . ';host=' . self::HOST;

    try {
      parent::__construct($_dsn, self::USER, self::PASS);

      $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8mb4');
      $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      die($e->getMessage());
    }
  }

  public static function getInstance():self
  {
    if(self::$instance === null){
      self::$instance = new self();
    }
    return self::$instance;
  }
}