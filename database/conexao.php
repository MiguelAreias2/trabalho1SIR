<?php
    $host = 'localhost';
    $dbname = 'trabalhosir';
    $user = 'root';
    $password = 'Miguel#2001';
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erro ao conectar com a DB";
        echo $e->getMessage();
        exit();
    }
    
?>