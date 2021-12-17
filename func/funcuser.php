<?php
$nomeuser = $_POST['nomeuser'];
$email = $_POST['email'];
$passe = $_POST['passe'];

if (!$nomeuser) {
    $nomeErr = 'O nome é obrigatorio!';
}

if (!$email) {
    $emailErr = 'O email é obrigatorio!';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr  = "Formato de email inválido!";
}

$stmt = $pdo->prepare("SELECT email FROM users WHERE email = :email");
$stmt->bindValue(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($user) && !empty($user)) {
    $emailErr = 'Este email já tem uma conta associada!';
}
if (!$passe) {
    $passwordErr  = 'A palavra-passe é obrigatorio!';
}

if (!preg_match("#[0-9]+#", $passe)) {
    $passwordErr  = "A palavra-passe deve conter pelo menos um número!";
}

if (!preg_match("#[A-Z]+#", $passe)) {
    $passwordErr  = "A palavra-passe deve conter pelo menos uma letra maiscula!";
}

if (!preg_match("#[a-z]+#", $passe)) {
    $passwordErr  = "A palavra-passe deve conter pelo menos uma letra minuscula!";
}
?>