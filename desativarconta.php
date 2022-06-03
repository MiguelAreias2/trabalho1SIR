<?php
require_once './database/conexao.php';
require_once './func/verificalogin.php';

$iduser = $_POST['id'] ?? null;

if (!$_POST['id']) {
    header('location: perfil.php');
    exit;
}

$statement = $pdo->prepare("SELECT * FROM users WHERE iduser = :id");
$statement->bindValue(':id', $iduser);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);

if (!$user['flag']) {
   $flag = 1; 
} else {
    $flag = "";
}

$statement = $pdo->prepare("UPDATE users SET flag = :flag WHERE iduser = :id");
$statement->bindValue(':flag', $flag);
$statement->bindValue(':id', $iduser);

$statement->execute();
header('location: index.php');
?>