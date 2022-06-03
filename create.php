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
    <div class="buttons">
        <a href="./index.php" class="butt">Pagina Inicial</a>
        <a href="./login.php" class="butt">Iniciar Sessão</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-1"></div>
            <div class="col-md-6 col-10">
                <div class="logo">
                    <img src="./assets/Logo2.png" alt="" width="250" height="250">
                </div>

                <div>

                    <?php include_once 'func\formuser.php' ?>
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