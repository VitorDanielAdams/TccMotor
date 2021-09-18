<?php

    try{
        $pdo = new PDO("mysql:dbname=tcc2;host=localhost","root","");
    } catch (PDOException $e){
        echo "Erro com o banco de dados: ".$e->getMessage();
    } catch (Exception $e){
        echo "Erro generico: ".$e->getMessage();
    }

?>