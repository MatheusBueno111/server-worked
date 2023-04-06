<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once  'conexao.php';

$query_users = "SELECT * FROM `users`  ORDER BY id DESC";
$result_users = $conn->prepare($query_users);
$result_users->execute();

$users= array();

if(($result_users) AND ($result_users->rowCount() != 0)) {
  while($row_user = $result_users->fetch(PDO::FETCH_ASSOC)){
  $users[] = $row_user;//único usuaŕio
  }
  http_response_code(200);

  echo json_encode($users);
}

