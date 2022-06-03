<?php
require_once './database/conexao.php';
require_once './func/verificalogin.php';

$idapontamento = $_POST['id'] ?? null;

if(!$_POST['id']){
    header('location: apontamentos.php');
    exit;
}

$statement = $pdo->prepare("DELETE FROM apontamento where idapontamento=:id");
$statement->bindValue(':id', $idapontamento);
$statement->execute();

header('location: apontamentos.php');
?>