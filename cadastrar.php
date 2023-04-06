<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");

require_once  'conexao.php';

$response_json = file_get_contents("php://input");
$data = json_decode($response_json, true);

if($data) {
  $query_user = "INSERT INTO `users` (`email`, `password`) VALUES (:email, :password)";
  $cad_user = $conn->prepare($query_user);

  $cad_user->bindParam('email', $data['email']);
  $cad_user->bindParam('password', $data['password']);

  $cad_user->execute();

  if($cad_user->rowCount()) {
    $response = [
      "erro" => false,
      "mensagem" => "Usuário cadastrado com sucesso!",
    ];
  } else {
    $response = [
      "erro" => true,
      "mensagem" => "Não foi possível efetuar o cadastro!",
    ];
  }

  
} else {
  $response = [
    "erro" => true,
    "mensagem" => "Não foi possível efetuar o cadastro!",
  ];
}

http_response_code(200);
echo json_encode($response);





