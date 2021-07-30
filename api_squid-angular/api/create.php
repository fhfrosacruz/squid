<?php 
require 'database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

  // preparação dos dados e criptografia de senha.
  $login = mysqli_real_escape_string($con, trim($request->login));
  $criptografada = md5($senha = mysqli_real_escape_string($con, $request->senha));
  $administrador = mysqli_real_escape_string($con, $request->administrador);

  // Create.
  $sql = "INSERT INTO `squid`(`id`,`login`,`senha`,`administrador` ) VALUES (null,'{$login}','{$criptografada}','{$administrador}')";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $squid = [
      'administrador' => $administrador,
      'login' => $login,
      'senha' => $criptografada,
      'id'    => mysqli_insert_id($con)
    ];
    echo json_encode($squid);
  }
  else
  {
    http_response_code(422);
  }
}
/*
md5:
<?php
// Variável com a senha guardada
$senha = "mypassword";
$criptografada = md5($senha);
echo $criptografada; // Exibe: 34819d7beeabb9260a5c854bc85b3e44
?>
Não existe função para decodificar md5.

Observação:
Caso você precise fazer uma verificação de senhas, por exemplo, deverá usar este código:
if($senhadigitada == md5($senhaguardada)) echo "Login efetuado com sucesso";

Read more: http://www.linhadecodigo.com.br/artigo/1749/tutorial-criptografando-senhas-em-php.aspx#ixzz723wkr1om
*/