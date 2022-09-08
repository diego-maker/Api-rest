<?php


namespace App\models;
use App\models\Conection; // Buscando a configuração do banco, que vai retornar um PDO
class User
{

  public static function getUsers()
  {
   
    $connPdo = Conection::conect();
    $sql = 'SELECT * FROM user';
    $response = $connPdo->prepare($sql);
     $response->execute();
    
    return $response->fetchAll(\PDO::FETCH_ASSOC);
  }
  
  public static function setUser($data){

    $connPdo = Conection::conect();
    $sql = "INSERT INTO user (name, email, phone) VALUES (:na, :em, :ph)";
    $stmt = $connPdo->prepare($sql);
    $stmt->bindValue(':na', $data['name']);
    $stmt->bindValue(':em', $data['email']);
    $stmt->bindValue(':ph', $data['phone']);


    try {
      
      $stmt -> execute();
      return "ususario cadastrado com sucesso!";
    } catch (\Throwable $th) {
      //throw $th;
      echo $th;
      return "erro ao cadastrar!";
    }

  }

  public static function updateUser($data){

    $connPdo = Conection::conect();
    $sql = 'UPDATE '.'user'. ' SET name=:na, email=:em ,phone=:ph  WHERE _id=:idUser';


    $stmt = $connPdo->prepare($sql);

    $stmt->bindValue(':na' , $data['name']);
    $stmt->bindValue(':em', $data['email']);
    $stmt->bindValue('ph', $data['phone']);
    $stmt->bindValue(':idUser', $data['idUser']);

    try {
      //code...

   $stmt->execute();
      return "Usuario atualizado com sucesso!";
    } catch (\Throwable $th) {
      //throw $th;
      echo $th;
      return "Usuario atualizado com sucesso!";

    }
  }

  public static function deleteUser($id){
    $connPdo =Conection::conect();
    $sql = "DELETE FROM user  WHERE _id=:id";
    $stmt= $connPdo->prepare($sql);
    $stmt->bindValue(':id', $id['id']);

    try {
      //code...
      $stmt->execute();
    return "usuario apagado com sucesso!";
    } catch (\Throwable $th) {
      //throw $th;
      echo $th;
      return "erro ao apagar usuario!";
    }
  }
}
