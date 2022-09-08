<?php


namespace App\models;


class Api {

  public $Message = 'Bem vindo a minha APi';
  public $Contact = 'deroberto950gmail.com';
  public $Version = 0.1;

  public static function getApi(){
    return new Api;
  }
}