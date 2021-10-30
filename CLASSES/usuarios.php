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

    public function paginacao($itens_por_pagina){

        global $pdo;

        $sql = "SELECT COUNT(id) FROM usuarios";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $row = $sql->fetch();
        $numrecords = $row[0];

        $numlinks = ceil($numrecords/$itens_por_pagina);

        return $numlinks;

    }

    public function paginacaoPesquisa($busca,$pagina,$itens_por_pagina){

        global $pdo;

        $sql = "SELECT * FROM usuarios WHERE nome LIKE '%$busca%' OR codigo = '$busca' LIMIT $pagina,$itens_por_pagina";
        $run = $pdo->query($sql);
        $numlinks = $run->rowCount();

        return $numlinks;

    }

    public function mostraFuncionarios($pagina,$itens_por_pagina){

        global $pdo;

        $sql = "SELECT * FROM usuarios LIMIT $pagina,$itens_por_pagina";
        $sql = $pdo->prepare($sql);
        $sql->execute();
        if($sql->rowCount() > 0){
            $funcionarios = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            return $funcionarios;
        } else {
            return false;
        }
    }

    public function mostraPesquisa($busca,$pagina,$itens_por_pagina){

        global $pdo;

        $sql = "SELECT * FROM usuarios WHERE nome LIKE '%$busca%' OR codigo = '$busca' AND id != 0 LIMIT $pagina,$itens_por_pagina";
        $sql = $pdo->prepare($sql);
        $sql->execute();
            
        $funcionarios = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $funcionarios;
    }

    public function alterarSenha($id, $oldPassword,$password){

        global $pdo;
        
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE id = '$id' AND senha != :s");
        $sql->bindValue(":s",md5($oldPassword));
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;
        } else {
            $newPassword = md5($password);
            $sql = $pdo->prepare("UPDATE usuarios SET senha = '$newPassword' WHERE id = $id");
            $sql->execute();

            return true;
        }
    }

    public function editar($codigo,$nome,$cpf,$telefone,$cargo,$id){

        global $pdo;
        
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE cpf = :cpf AND id != :i");
        $sql->bindValue(":cpf",$cpf);
        $sql->bindValue(":i",$id);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false;
        } else {
            $sql = $pdo->prepare("UPDATE usuarios SET codigo = '$codigo', nome = '$nome', cpf = '$cpf', 
            cargo = '$cargo', telefone = '$telefone' WHERE id = $id");
            $sql->execute();

            return true;
        }
    }

    public function deleta($id){

        global $pdo;

        $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = $id AND cargo != 1 OR cpf = '000.000.000-00'");
        $sql->execute();

        $organiza = $pdo->prepare("set @autoid :=0; 
        update usuarios set id = @autoid := (@autoid+1);
        alter table usuarios Auto_Increment = 1;");
        $organiza->execute();

    }

    public function seleciona($id){

        global $pdo;

        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $funcionarios = $sql->fetch();

        return $funcionarios;
    }

    public function senha($id){

        global $pdo;

        $sql = "SELECT senha FROM usuarios WHERE id = $id";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $senha = $sql->fetch();

        return $senha;

    }
}