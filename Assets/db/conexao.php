<?php
$host = 'localhost';
$dbname = 'ministerio_casais';
$username = 'root';
$password = '';

try{
    $conexao = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Erro na conexao: ". $e->getMessage());
}

?>
