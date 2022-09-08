<?php

namespace App\services;
use App\models\User;

class UserService {

public static function getUsers(){
  return User::getUsers();
}

public static function setUser($data){
  return User::setUser($data);
}

public static function updateUser($data){
return User::updateUser($data);
}
public static function deleteUser($id){
  return User::deleteUser($id);
}
}