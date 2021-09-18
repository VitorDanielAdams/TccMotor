<?php

Class Usuario{
    
    private $pdo;
    public $msgErro = "";
    
    public function cadastrar($codigo,$nome,$cpf,$telefone,$cargo){
        global $pdo;

        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE nome = :n");
        $sql->bindValue(":n",$nome);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;
        } else {
            $sql = $pdo->prepare("INSERT INTO usuarios (codigo, nome, cpf, telefone, cargo) VALUES (:cd, :n, :cpf, :t, :c)");
            $sql->bindValue(":cd",$codigo);
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":cpf",$cpf);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":c",$cargo);
            $sql->execute();

            $organiza = $pdo->prepare("set @autoid :=0; 
            update usuarios set id = @autoid := (@autoid+1);
            alter table usuarios Auto_Increment = 1;");
            $organiza->execute();

            return true;
        }
    }

    public function logar($nome, $codigo){

        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE nome = :n AND codigo = :cd");
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":cd",$codigo);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            session_start();
            $_SESSION['tipo'] = $dado['cargo'];
            $_SESSION['id_user'] = $dado['id'];
            return true;
        } else {
            return false;
        }
    }

    public function logged($id){

        global $pdo;

        $array = array();

        $sql = $pdo->prepare("SELECT nome FROM usuarios WHERE id = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }

        return $array;

    }
}