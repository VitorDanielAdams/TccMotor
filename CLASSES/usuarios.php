<?php

Class Usuario{
    
    private $pdo;
    public $msgErro = "";
    
    public function cadastrar($codigo,$nome,$cpf,$telefone,$password,$cargo){
        global $pdo;

        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE cpf = :cpf");
        $sql->bindValue(":cpf",$cpf);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;
        } else {
            $sql = $pdo->prepare("INSERT INTO usuarios (codigo, nome, cpf, telefone, senha, cargo) 
            VALUES (:cd, :n, :cpf, :t, :s, :c)");
            $sql->bindValue(":cd",$codigo);
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":cpf",$cpf);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":s",md5($password));
            $sql->bindValue(":c",$cargo);
            $sql->execute();

            $organiza = $pdo->prepare("set @autoid :=0; 
            update usuarios set id = @autoid := (@autoid+1);
            alter table usuarios Auto_Increment = 1;");
            $organiza->execute();

            return true;
        }
    }

    public function logar($cpf, $password){

        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE cpf = :cpf AND senha = :s");
        $sql->bindValue(":cpf",$cpf);
        $sql->bindValue(":s",md5($password));
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

    public function createuser() {
            
        global $pdo;

        $sql = $pdo->prepare("SELECT id FROM usuarios");
        $sql->execute();
        if($sql->rowCount() == 0){
            $sql = $pdo->prepare("INSERT INTO usuarios (id, codigo, nome, cpf, telefone, senha, cargo)  
            VALUES  ('1','000000', 'Admin', '000.000.000-00', '0000-0000', :s, '1')");
            $sql->bindValue(":s",md5(12345678));
            $sql->execute();
        }
    }
}