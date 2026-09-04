<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

class Database
{
  private static ?PDO $instance = null;

  public static function getConnection(): PDO
  {
    if (self::$instance === null) {
      $host = $_ENV['DB_HOST'];
      $dbName = $_ENV['DB_NAME'];
      $username = $_ENV['DB_USER'];
      $password = $_ENV['DB_PASSWORD'];

      $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

      try {
        self::$instance = new PDO($dsn, $username, $password);
        self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
      }
    }

    return self::$instance;
  }
}
