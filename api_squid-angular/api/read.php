<?php
/*
  Retorna a lista com os dados da tabela squid.
 */
require 'database.php';

$squid = [];
$sql = "SELECT id, logins, administrador FROM squid";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $squid[$i]['id']    = $row['id'];
    $squid[$i]['logins'] = $row['logins'];
    $squid[$i]['administrador'] = $row['administrador'];
    $i++;
  }

  echo json_encode($squid);
}
else
{
  http_response_code(404);
}