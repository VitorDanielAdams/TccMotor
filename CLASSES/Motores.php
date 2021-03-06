<?php

Class Motor{

    private $pdo;
    public $msgErro = "";

    public function cadastrar($sistema,$marca,$potencia,$voltagem,$amperagem,$bitolaP,
    $fiosP,$espirasP,$bitolaA,$fiosA,$espirasA,$rpm,$rotacao,$ligacao,$camada,$info, $imagem, $cliente){
        
        global $pdo;

        $sql = $pdo->prepare("SELECT id FROM motor WHERE cliente = :c AND sistema = :s AND 
        ligacao = :l AND camada = :ca AND rotacao = :r AND informacoes = :inf");
        $sql->bindValue(":c",$cliente);
        $sql->bindValue(":s",$sistema);
        $sql->bindValue(":l",$ligacao);
        $sql->bindValue(":ca",$camada);
        $sql->bindValue(":r",$rotacao);
        $sql->bindValue(":inf",$info);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;
        } else {

            $sql = $pdo->prepare("INSERT INTO motor (cliente,sistema, potencia, voltagem, amperagem, 
            bitolasP, fiosP, espirasP, bitolaAux, fiosAux, espirasAux, marca, rpm, rotacao, ligacao, camada, informacoes, imagem) 
            VALUES (:cl,:s,:p,:v,:a,:b,:f,:e,:bA,:fA,:eA,:m,:r,:ro,:l,:c,:i,:img)");
            $sql->bindValue(":cl",$cliente);
            $sql->bindValue(":s",$sistema);
            $sql->bindValue(":p",$potencia);
            $sql->bindValue(":v",$voltagem);
            $sql->bindValue(":a",$amperagem);
            $sql->bindValue(":b",$bitolaP);
            $sql->bindValue(":f",$fiosP);
            $sql->bindValue(":e",$espirasP);
            $sql->bindValue(":bA",$bitolaA);
            $sql->bindValue(":fA",$fiosA);
            $sql->bindValue(":eA",$espirasA);
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

            return true;
        }
        
    }

    public function cadastrarMSP($bitolaP,$fiosP,$espirasP,$bitolaA,$fiosA,$espirasA,$info,$imagem,$cliente){
        
        global $pdo;

        $sql = $pdo->prepare("SELECT id FROM motorsp WHERE cliente = :c AND bitolasP = :b AND 
        fiosP = :f AND espirasP = :e AND bitolaAux = :bA AND fiosAux = :fA AND espirasAux = :eA 
        AND informacoes = :inf");
        $sql->bindValue(":c",$cliente);
        $sql->bindValue(":b",$bitolaP);
        $sql->bindValue(":f",$fiosP);
        $sql->bindValue(":e",$espirasP);
        $sql->bindValue(":bA",$bitolaA);
        $sql->bindValue(":fA",$fiosA);
        $sql->bindValue(":eA",$espirasA);
        $sql->bindValue(":inf",$info);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;
        } else {
            $sql = $pdo->prepare("INSERT INTO motorsp (cliente, bitolasP, fiosP, espirasP, bitolaAux, fiosAux, espirasAux, informacoes, imagem) 
            VALUES (:cl,:b,:f,:e,:bA,:fA,:eA,:i,:img)");
            $sql->bindValue(":cl",$cliente);
            $sql->bindValue(":b",$bitolaP);
            $sql->bindValue(":f",$fiosP);
            $sql->bindValue(":e",$espirasP);
            $sql->bindValue(":bA",$bitolaA);
            $sql->bindValue(":fA",$fiosA);
            $sql->bindValue(":eA",$espirasA);
            $sql->bindValue(":i",$info);
            $sql->bindValue(":img",$imagem);
            $sql->execute();

            $organiza = $pdo->prepare("set @autoid :=0; 
            update motorsp set id = @autoid := (@autoid+1);
            alter table motorsp Auto_Increment = 1;");
            $organiza->execute();
            return true;
        }
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

    public function mostraPesquisa($busca){

        global $pdo;

        $sql = "SELECT * FROM motor WHERE cliente LIKE '%$busca%' OR marca LIKE '%$busca%' 
        OR voltagem = '$busca' OR amperagem = '$busca' OR rpm = '$busca'";
        $sql = $pdo->prepare($sql);
        $sql->execute();
            
        $motor = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $motor;
    }

    public function mostraPesquisaSP($busca){

        global $pdo;

        $sql = "SELECT * FROM motorsp WHERE cliente LIKE '%$busca%'";
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

    public function selecionaSP($id){

        global $pdo;

        $sql = "SELECT * FROM motorsp WHERE id = $id";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $motor = $sql->fetch();

        return $motor;
    }

    public function editarMotorCP($id,$sistema,$marca,$potencia,$voltagem,$amperagem,$bitolaP,
    $fiosP,$espirasP,$bitolaA,$fiosA,$espirasA,$rpm,$rotacao,$ligacao,$camada,$info, $imagem, $cliente){
        
        global $pdo;

        $sql = $pdo->prepare("UPDATE motor SET sistema = '$sistema', marca = '$marca', potencia = '$potencia',
        voltagem = '$voltagem', amperagem = '$amperagem', bitolasP = '$bitolaP', fiosP = '$fiosP', 
        espirasP = '$espirasP', bitolaAux = '$bitolaA', fiosAux = '$fiosA', espirasAux = '$espirasA', 
        rpm = '$rpm', rotacao = '$rotacao', ligacao = '$ligacao', camada = '$camada', 
        informacoes = '$info', imagem = '$imagem', cliente = '$cliente' WHERE id = '$id'");
        $sql->execute();

        return true;
    }

    public function editarMotorSP($id, $bitolaP,$fiosP,$espirasP,$bitolaA,$fiosA,
    $espirasA, $info, $imagem, $cliente){
        
        global $pdo;

        $sql = $pdo->prepare("UPDATE motorsp SET bitolasP = '$bitolaP', fiosP = '$fiosP', 
        espirasP = '$espirasP', bitolaAux = '$bitolaA', fiosAux = '$fiosA', 
        espirasAux = '$espirasA',  informacoes = '$info', imagem = '$imagem', 
        cliente = '$cliente' WHERE id = '$id'");
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

    public function deletaSP($id){

        global $pdo;

        $sql = $pdo->prepare("DELETE FROM motorsp WHERE id = $id");
        $sql->execute();

        $organiza = $pdo->prepare("set @autoid :=0; 
        update motorsp set id = @autoid := (@autoid+1);
        alter table motorsp Auto_Increment = 1;");
        $organiza->execute();

    }
}

?>