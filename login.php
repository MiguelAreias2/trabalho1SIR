<?php
require_once './database/conexao.php';
require_once './head.php';
require_once './navBar.php';

$email = '';
$passe = '';
$erro;
$sessaoIniciada='';

session_start();

//<<<<<<< Updated upstream
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $passe = $_POST['passe'];

    $stmt = $pdo->prepare("SELECT iduser FROM users WHERE email = :email AND passe = :passe");
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':passe', $passe);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        $erro = 'Dados de login incorretos!';
    }
    else
    {
        $sessaoIniciada = 'Sessão Iniciada!';
    }
}
?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-1"></div>
            <div class="col-md-6 col-10">
                <div class="logo">
                    <img src="./assets/logo.png" alt="" width="250" height="250">
                </div>

                <div>
                    <div class="formulario">
                        <form action="" method="POST">
                            <h2 class="">Login</h2>
                            <?php if (!empty($erro)) { ?>
                                <div class="">
                                    <p><?php echo $erro ?></p>
                                </div>
                            <?php } else { ?>
                                <div class="">
                                    <p><?php echo $sessaoIniciada ?></p>
                                </div>                            
                            <?php } ?>

                            <div class="">
                                <i class="iconEmail"></i>
                                <input type="text" class="" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" name="email">
                            </div>
                            <div class="">
                                <input type="text" class="" placeholder="Password" aria-label="password" aria-describedby="addon-wrapping" name="passe">
                            </div>
                            <div>
                                <input type="submit" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-1"></div>
            </div>
        </div>
    </div>
</main>



</header>
</body>

</html>