<?php
require_once './database/conexao.php';
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

    $stmt = $pdo->prepare("SELECT email FROM users WHERE email = :email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($user) && !empty($user)) {
        $emailErr = 'Este email já tem uma conta associada';
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

        header('location: login.php');
    }
}
?>
<?php include_once './componentes/header.php' ?>

<body>
    <div class="container">
        <h1 class="mt-5">Registar</h1>

        <a href="index.php" class="btn btn-outline-success mt-3">Lista de users</a>
        <a href="login.php" class="btn btn-outline-success mt-3">Login</a>

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