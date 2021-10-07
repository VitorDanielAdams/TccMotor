<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcc";

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];


$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM login WHERE cpf = '" . $cpf . "' AND senha = '" . $senha . "';";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "senha certa";
} else {
  echo "senha errada";
}

mysqli_close($conn);
?>