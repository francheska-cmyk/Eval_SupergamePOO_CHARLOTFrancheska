<?php
// namespace Model;

// use PDO;

class Model {
    //ATTRIBUT
    private PDO $bdd;

    //CONSTRUCTOR
    public function __construct(){
        $this->bdd = new PDO(
            'mysql:host='.$_ENV['dbhost'].';dbname='.$_ENV['dbname'],
            $_ENV['login'],
            $_ENV['password'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    //GETTER ET SETTER
    public function getBdd():PDO{
        return $this->bdd;
    }
}
