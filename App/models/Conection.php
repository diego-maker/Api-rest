<?php

namespace App\models;


class Conection {

  public static function conect(){

    return  new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS); // aqui é feita a comunicação pelo PDO

  }
}