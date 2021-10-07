<?php

Class Motores{

    private $pdo;
    public $msgErro = "";

    public function cadastrar($sistema,$marca,$potencia,$voltagem,$amperagem,$bitola,
    $fios,$espiras,$rpm,$rotacao,$info, $image){
        
        global $pdo;

        
        $sql = $pdo->prepare("INSERT INTO motores () 
        VALUES (:)");
        $sql->bindValue(":",$sistema);
        $sql->execute();

        $organiza = $pdo->prepare("set @autoid :=0; 
        update motores set id = @autoid := (@autoid+1);
        alter table motores Auto_Increment = 1;");
        $organiza->execute();

        return true;
        
    }

}

?>