<?php

Class Motor{

    private $pdo;
    public $msgErro = "";

    public function cadastrar($sistema,$marca,$potencia,$voltagem,$amperagem,$bitola,
    $fios,$espiras,$rpm,$rotacao,$ligacao,$camada,$info, $imagem){
        
        global $pdo;

        $sql = $pdo->prepare("INSERT INTO motor (sistema, potencia, voltagem, amperagem, 
        bitolas, fios, espiras, marca, rpm, rotacao, ligacao, camada, informacoes, imagem) 
        VALUES (:s,:p,:v,:a,:b,:f,:e,:m,:r,:ro,:l,:c,:i,:img)");
        $sql->bindValue(":s",$sistema);
        $sql->bindValue(":p",$potencia);
        $sql->bindValue(":v",$voltagem);
        $sql->bindValue(":a",$amperagem);
        $sql->bindValue(":b",$bitola);
        $sql->bindValue(":f",$fios);
        $sql->bindValue(":e",$espiras);
        $sql->bindValue(":m",$marca);
        $sql->bindValue(":r",$rpm);
        $sql->bindValue(":ro",$rotacao);
        $sql->bindValue(":l",$ligacao);
        $sql->bindValue(":c",$camada);
        $sql->bindValue(":i",$info);
        $sql->bindValue(":img",$imagem);
        $sql->execute();

        $organiza = $pdo->prepare("set @autoid :=0; 
        update motor set id = @autoid := (@autoid+1);
        alter table motor Auto_Increment = 1;");
        $organiza->execute();
        
    }

}

?>