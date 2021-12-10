<?php
require_once './database/conexao.php';
$erros = [];
$nomeErr;
$emailErr;
$passwordErr;
$nomeuser = '';
$email = '';
$passe = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $emailErr  = "Formato de email inválido";
    }

    if (!$passe) {
        $passwordErr  = 'A palavra-passe é obrigatorio!';
    }

    if (!preg_match("#[0-9]+#", $passe)) {
        $passwordErr  = "A palavra-passe deve conter pelo menos um número!";
    }

    if (!preg_match("#[A-Z]+#", $passe)) {
        $passwordErr  = "A palavra-passe deve conter pelo menos uma letra maiscula!!";
    }

    if (!preg_match("#[a-z]+#", $passe)) {
        $passwordErr  = "A palavra-passe deve conter pelo menos uma letra minuscula!";
    }

    if (empty($nomeErr) && empty($emailErr) && empty($passwordErr)) {

        $statement = $pdo->prepare("INSERT INTO users(nomeuser, email, passe)
            VALUES(:nomeuser, :email, :passe)");

        $statement->bindValue(':nomeuser', $nomeuser);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':passe', $passe);

        $statement->execute();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar user</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Registar</h1>

        <a href="index.php" class="btn btn-outline-success mt-3">Lista de users</a>

        <form class="mt-5" action="create.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <?php if (!empty($nomeErr)) : ?>
                    <div class="alert alert-danger">
                        <div><?php echo $nomeErr ?></div>
                    </div>
                <?php endif; ?>
                <input type="text" class="form-control" name="nomeuser" value="<?php echo $nomeuser ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <?php if (!empty($emailErr)) : ?>
                    <div class="alert alert-danger">
                        <div><?php echo $emailErr ?></div>
                    </div>
                <?php endif; ?>
                <input class="form-control" name="email" value="<?php echo $email ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Palava-passe</label>
                <?php if (!empty($passwordErr)) : ?>
                    <div class="alert alert-danger">
                        <div><?php echo $passwordErr ?></div>
                    </div>
                <?php endif; ?>
                <input type="password" step=".2" class="form-control" name="passe" value="<?php echo $passe ?>">
            </div>
            <button type="submit" class="btn btn-primary">Registar-se</button>
        </form>

    </div>
</body>

</html>