<?php


require_once('../vendor/autoload.php');

$url = explode('/', $_GET['url']);


if (sizeof($url) <= 1 && $url[0] === 'api') {

  $service = "App\services\\" . 'ApiService';

  $response = call_user_func_array(array(new $service, 'apiVersion'), array(1));

  echo json_encode(array("status" => "success", "data" => $response));

  return;
}


if ($url[1] === "users") { // AQUI VAI VERIFICAR A ROTA DE ACESSO PELA URL 

  $method = $_SERVER["REQUEST_METHOD"];

  if ($method === 'GET') {

    $service = "App\services\\" . 'UserService';

    try {

      $response = call_user_func_array(array(new $service, 'getUsers'), array(1));

      echo json_encode(array("status" => "success", "data" => $response));
    } catch (\Throwable $th) {

      echo json_encode(array("status" => "error request", "data" => $th));
    }
    return;
  }
  
  if ($method === "POST") {   // SE O METODO DE REQUISIÇÃO FOR POST
    $service = "App\services\\" . 'UserService';

    $data = json_decode(file_get_contents('php://input'), true);
    $response = call_user_func_array(array(new $service, 'setUser'), array($data));
    echo json_encode(array("status" => "success", "data" => $response));

  }

  
  if ($method === "PUT") { // SE O METODO DE REQUISIÇÃO FOR PUT
    $service = "App\services\\" . 'UserService';

    $data = json_decode(file_get_contents('php://input'), true);
    $response = call_user_func_array(array(new $service, 'updateUser'), array($data));
    echo json_encode(array("status" => "success", "data" => $response));

  }

  if ($method === "DELETE") { // SE O METODO DE REQUISIÇÃO FOR DELETE
    $service = "App\services\\" . 'UserService';

    $data = json_decode(file_get_contents('php://input'), true);
    $response = call_user_func_array(array(new $service, 'deleteUser'), array($data));
    echo json_encode(array("status" => "success", "data" => $response));

  }
}
