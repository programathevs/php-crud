<?php

// Carrega o autoload do Composer.
// O __DIR__ representa a pasta onde este arquivo PHP está localizado.
// O ../ volta uma pasta.
// Assim, estamos chegando até a pasta "vendor" e carregando o autoload.php.
require_once __DIR__ . '/../vendor/autoload.php';


// Importa a classe Dotenv para podermos trabalhar com o arquivo .env.
use Dotenv\Dotenv;


// Cria uma instância do Dotenv.
//
// dirname(__DIR__) pega o diretório pai da pasta onde este arquivo está.
// É justamente onde esperamos encontrar o arquivo ".env".
//
// Exemplo:
// projeto/
// ├── .env
// ├── vendor/
// └── src/
//     └── Database.php
//
// dirname(__DIR__) -> projeto/
$dotenv = Dotenv::createImmutable(dirname(__DIR__));


// Carrega as variáveis existentes no arquivo .env
// para que possamos acessá-las através de $_ENV.
$dotenv->load();


// Cria a classe Database.
// Essa classe será responsável por criar e fornecer
// a conexão com o banco de dados.
class Database
{
// Cria uma propriedade estática privada chamada $instance.
//
// "private" significa que só pode ser acessada dentro da própria classe.
// "static" significa que pertence à classe, e não a uma instância específica.
// "?PDO" significa que essa variável pode conter:
//   - um objeto PDO
//   - ou null
//
// Inicialmente ela recebe null porque ainda não existe uma conexão.
  private static ?PDO $instance = null;


  // Cria um método público e estático chamado getConnection().
  //
  // "public" significa que podemos chamar esse método de fora da classe.
  // "static" permite chamá-lo diretamente pela classe:
  //
  // Database::getConnection();
  //
  // ": PDO" significa que esse método promete retornar
  // um objeto do tipo PDO.
  public static function getConnection(): PDO
  {

    // Verifica se ainda NÃO existe uma conexão.
    //
    // Se $instance for null, significa que ainda precisamos
    // criar uma conexão com o banco.
    if (self::$instance === null) {


      // Obtém o endereço/host do banco de dados
      // através da variável DB_HOST do arquivo .env.
      //
      // Exemplo no .env:
      // DB_HOST=localhost
      $host = $_ENV['DB_HOST'];


      // Obtém o nome do banco de dados através
      // da variável DB_NAME do arquivo .env.
      //
      // Exemplo:
      // DB_NAME=meu_banco
      $dbName = $_ENV['DB_NAME'];


      // Obtém o usuário do banco de dados através
      // da variável DB_USER do arquivo .env.
      //
      // Exemplo:
      // DB_USER=root
      $username = $_ENV['DB_USER'];


      // Obtém a senha do banco de dados através
      // da variável DB_PASSWORD do arquivo .env.
      //
      // Exemplo:
      // DB_PASSWORD=123456
      $password = $_ENV['DB_PASSWORD'];


      // Monta a DSN (Data Source Name).
      //
      // A DSN informa ao PDO:
      // - qual banco utilizar (mysql)
      // - onde está o banco (host)
      // - qual banco acessar (dbname)
      // - qual conjunto de caracteres utilizar (charset)
      //
      // O resultado será algo parecido com:
      //
      // mysql:host=localhost;dbname=meu_banco;charset=utf8mb4
      $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";


      // Inicia um bloco para tentar realizar a conexão.
      //
      // Caso aconteça algum erro durante a conexão,
      // o código poderá capturá-lo no bloco catch abaixo.
      try {


        // Cria uma nova conexão PDO.
        //
        // $dsn       -> informações sobre o banco
        // $username  -> usuário do banco
        // $password  -> senha do banco
        //
        // O objeto PDO criado é armazenado em $instance.
        self::$instance = new PDO($dsn, $username, $password);


        // Define o comportamento do PDO quando ocorrer
        // algum erro relacionado ao banco de dados.
        //
        // PDO::ATTR_ERRMODE -> define como os erros serão tratados.
        //
        // PDO::ERRMODE_EXCEPTION -> faz o PDO lançar uma
        // PDOException quando ocorrer um erro.
        //
        // Isso facilita bastante o tratamento de erros.
        self::$instance->setAttribute(
          PDO::ATTR_ERRMODE,
          PDO::ERRMODE_EXCEPTION
        );


      // Finaliza o bloco try.
      } catch (PDOException $e) {


        // Caso a conexão falhe, o código entra aqui.
        //
        // $e contém informações sobre a exceção/erro que aconteceu.
        //
        // getMessage() retorna a mensagem do erro.
        //
        // die() interrompe a execução do programa
        // e mostra a mensagem informada.
        die("Database connection failed: " . $e->getMessage());
      }
    }


    // Retorna a conexão PDO.
    //
    // Se a conexão acabou de ser criada, retorna ela.
    //
    // Se ela já existia, simplesmente retorna a conexão existente.
    return self::$instance;
  }
}


// Fecha a tag PHP.
?>
