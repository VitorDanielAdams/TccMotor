<?php

Class Motor{

    private $pdo;
    public $msgErro = "";

    public function cadastrar($sistema,$marca,$potencia,$voltagem,$amperagem,$bitola,
    $fios,$espiras,$rpm,$rotacao,$ligacao,$camada,$info, $imagem, $cliente){
        
        global $pdo;

        $sql = $pdo->prepare("INSERT INTO motor (cliente,sistema, potencia, voltagem, amperagem, 
        bitolas, fios, espiras, marca, rpm, rotacao, ligacao, camada, informacoes, imagem) 
        VALUES (:cl,:s,:p,:v,:a,:b,:f,:e,:m,:r,:ro,:l,:c,:i,:img)");
        $sql->bindValue(":cl",$cliente);
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

    public function cadastrarMSP($sistema,$marca,$potencia,$voltagem,$amperagem,$bitola,
    $fios,$espiras,$rpm,$rotacao,$ligacao,$camada,$info, $imagem, $cliente,$obs){
        
        global $pdo;

        $sql = $pdo->prepare("INSERT INTO motorsp (cliente,sistema, potencia, voltagem, amperagem, 
        bitolas, fios, espiras, marca, rpm, rotacao, ligacao, camada, informacoes, imagem, obs) 
        VALUES (:cl,:s,:p,:v,:a,:b,:f,:e,:m,:r,:ro,:l,:c,:i,:img,:obs)");
        $sql->bindValue(":cl",$cliente);
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
        $sql->bindValue(":obs",$obs);
        $sql->execute();

        $organiza = $pdo->prepare("set @autoid :=0; 
        update motorsp set id = @autoid := (@autoid+1);
        alter table motorsp Auto_Increment = 1;");
        $organiza->execute();
        
    }

    public function mostrarMotorCP(){

        global $pdo;

        $sql = "SELECT * FROM motor";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $motor = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $motor;
    }

    public function mostrarMotorSP(){

        global $pdo;

        $sql = "SELECT * FROM motorsp";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $motor = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $motor;
    }

    public function seleciona($id){

        global $pdo;

        $sql = "SELECT * FROM motor WHERE id = $id";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $motor = $sql->fetch();

        return $motor;
    }

    public function editarMotorCP($id,$sistema,$marca,$potencia,$voltagem,$amperagem,$bitola,
    $fios,$espiras,$rpm,$rotacao,$ligacao,$camada,$info, $imagem, $cliente){
        
        global $pdo;

        $sql = $pdo->prepare("UPDATE motor SET sistema = '$sistema', marca = '$marca', potencia = '$potencia',
        voltagem = '$voltagem', amperagem = '$amperagem', bitolas = '$bitola', fios = '$fios', 
        espiras = '$espiras',rpm = '$rpm', rotacao = '$rotacao', ligacao = '$ligacao', camada = '$camada', 
        informacoes = '$info', imagem = '$imagem', cliente = '$cliente' WHERE id = '$id'");
        $sql->execute();

        return true;
    }

    public function deletaCP($id){

        global $pdo;

        $sql = $pdo->prepare("DELETE FROM motor WHERE id = $id");
        $sql->execute();

        $organiza = $pdo->prepare("set @autoid :=0; 
        update motor set id = @autoid := (@autoid+1);
        alter table motor Auto_Increment = 1;");
        $organiza->execute();

    }
}

?>