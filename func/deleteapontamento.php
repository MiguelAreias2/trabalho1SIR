<?php
require_once './componentes/verificalogin.php';
require_once './database/conexao.php';

$idapontamento = $_POST['id'] ?? null;

if(!$_POST['id']){
    header('location: menu.php');
    exit;
}

$statement = $pdo->prepare("DELETE * FROM apontamento where idapontamento=:id");
$statement->bindValue(':id', $_SESSION['idapontamento']);
$statement->execute();

header('location: menu.php');
?>