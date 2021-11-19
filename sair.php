<?php 

session_start();
unset($_SESSION['id_user']);

if(!isset($_SESSION['id_user'])){
    echo '<script type = "text/javascript">';
    echo 'alert("Você foi desconectado");';
    echo 'window.location.href = "index.php"';
    echo '</script>';
}

?>