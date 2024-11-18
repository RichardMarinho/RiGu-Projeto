<?php
//Conectando com o banco
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'cadastro';

$conn = new mysqli($host, $user, $password, $database);

//if ($conn->connect_error) {
    //echo "Erro de conexão ";
//}
//else {
   // echo "Sucesso ao Conectar ";
//}
?>
