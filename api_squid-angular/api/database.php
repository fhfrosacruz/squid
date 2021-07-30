<?php
    /*  
    Essas linhas são usadas para adicionar cabeçalhos de resposta, 
    como CORS e os métodos permitidos (PUT, GET, DELETE e POST).   
    Definir o CORS como * permitirá que seu servidor PHP aceite solicitações de outro 
    domínio de onde o servidor Angular 9 está sendo executado sem ser bloqueado pelo navegador
    por causa da Política de Mesma Origem . No desenvolvimento, você executará o servidor PHP
    a partir da localhost:8080porta e do Angular, localhost:4200que são considerados dois domínios
    distintos.
    */

header("Access-Control-Allow-Origin: *"); // CORS.
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

//coneção com o banco de dados

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'toor');
define('DB_NAME', 'proxy');

function connect()
{
  $connect = mysqli_connect(DB_HOST ,DB_USER ,DB_PASS ,DB_NAME);

  if (mysqli_connect_errno($connect)) {
    die("Failed to connect:" . mysqli_connect_error());
  }

  mysqli_set_charset($connect, "utf8");

  return $connect;
}

$con = connect();
