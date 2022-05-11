<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "celke";
$port = 3306;

try{
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname,$user,$pass);
    //echo "Conectado com sucesso!";
} catch(PDOException $err){
    echo "Erro: Falha na conexão com banco de dados. Erro " . $err->getMessage();
}