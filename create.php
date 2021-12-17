<?php
require_once './database/conexao.php';
$nomeErr;
$emailErr;
$passwordErr;
$nomeuser = '';
$email = '';
$passe = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    include_once './func/funcuser.php';

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
<?php include_once './componentes/head.php' ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-1"></div>
            <div class="col-md-6 col-10">
                <div class="logo">
                    <img src="./assets/Logo2.png" alt="" width="250" height="250">
                </div>

                <div>
                    <a href="index.php" class="btn btn-outline-success mt-3">Pagina Inicial</a>
                    <a href="login.php" class="btn btn-outline-success mt-3">Login</a>
                    <div class="formulario">
                        <form action="" method="POST">
                            <h2 class="">Registar-se</h2>
                            <div class="">
                                <label class="form-label">Nome</label>
                                <br>
                                <?php if (!empty($nomeErr)) : ?>
                                    <div class="">
                                        <p class="alerta"><?php echo $nomeErr ?></p>
                                    </div>
                                <?php endif; ?>
                                <input type="text" class="" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" name="nomeuser" <?php if (empty($nomeErr)) : ?>value="<?php echo $nomeuser ?>" <?php endif; ?>>
                            </div>
                            <div class="">
                                <label class="form-label">Email</label>
                                <?php if (!empty($emailErr)) : ?>
                                    <div class="">
                                        <p class="alerta"><?php echo $emailErr ?></p>
                                    </div>
                                <?php endif; ?>
                                <i class="iconEmail"></i>
                                <input type="text" class="" placeholder="Email" aria-label="email" aria-describedby="addon-wrapping" name="email" <?php if (empty($emailErr)) : ?>value="<?php echo $email ?>" <?php endif; ?>>
                            </div>
                            <div class="">
                                <label class="form-label">Palavra-passe</label>
                                <?php if (!empty($passwordErr)) : ?>
                                    <div class="">
                                        <p class="alerta"><?php echo $passwordErr ?></p>
                                    </div>
                                <?php endif; ?>
                                <input type="password" class="" placeholder="Password" aria-label="password" aria-describedby="addon-wrapping" name="passe" <?php if (empty($passeErr)) : ?>value="<?php echo $passe ?>" <?php endif; ?>>
                            </div>
                            <div>
                                <input type="submit" value="Registar-se">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-1"></div>
            </div>
        </div>
    </div>
</main>

</html>