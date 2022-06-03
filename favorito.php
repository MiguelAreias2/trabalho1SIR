<?php
require_once './database/conexao.php';
require_once './func/verificalogin.php';

$idapontamento = $_POST['id'] ?? null;

if (!$_POST['id']) {
    header('location: apontamentos.php');
    exit;
}

$statement = $pdo->prepare("SELECT * FROM apontamento WHERE idapontamento = :id");
$statement->bindValue(':id', $idapontamento);
$statement->execute();
$apontamento = $statement->fetch(PDO::FETCH_ASSOC);

if (!$apontamento['favoritos']) {
   $fav = 1; 
} else {
    $fav = "";
}

$statement = $pdo->prepare("UPDATE apontamento SET favoritos = :fav WHERE idapontamento = :id");
$statement->bindValue(':fav', $fav);
$statement->bindValue(':id', $idapontamento);

$statement->execute();
header('location: apontamentos.php');
?>