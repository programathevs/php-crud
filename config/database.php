<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

class Database
{
  // Guarda a única instância/conexão PDO criada pela aplicação. Começa como null porque ainda não existe uma conexão.
  private static ?PDO $instance = null;

  public static function getConnection(): PDO
  {
    // Verifica se ainda não existe uma conexão.
    // self::$instance é a propriedade $instance da classe Database.
    if (self::$instance === null) {

      // Pega as informações do banco que estão no arquivo .env
      $host = $_ENV['DB_HOST'];
      $dbName = $_ENV['DB_NAME'];
      $username = $_ENV['DB_USER'];
      $password = $_ENV['DB_PASSWORD'];

      // DSN (Data Source Name): informa ao PDO qual banco usar, onde ele está e qual charset deve ser utilizado.
      $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

      try {
        // Cria uma nova instância do PDO, estabelecendo a conexão com o banco.
        self::$instance = new PDO($dsn, $username, $password);

        // Configura o PDO para lançar exceções quando ocorrer algum erro no banco.
        self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        // Interrompe a execução caso a conexão falhe.
        die("Database connection failed: " . $e->getMessage());
      }
    }
    // Retorna a conexão PDO já existente.
    return self::$instance;
  }
}
