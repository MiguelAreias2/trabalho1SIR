<?php
require_once './database/conexao.php';
require_once './componentes/head.php';
require_once './componentes/navBar.php';

$email = '';
$passe = '';
$erro;

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
}
?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class>
                <img src="./assets/logo.png" alt="" width="250" height="250">
            </div>

            <div>
                <form action="">
                    <h3>Login</h3>
                    <div>
                        <input type="text" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <div>
                        <input type="text" placeholder="Password" aria-label="password" aria-describedby="addon-wrapping">
                    </div>

                    <div class="rounded m-3 bg-light">
                        <form action="" method="POST">
                            <h3 class="text-center p-3">Login</h3>
                            <?php if (!empty($erro)) : ?>
                                <div class="alert alert-danger">
                                    <div><?php echo $erro ?></div>
                                </div>
                            <?php endif; ?>
                            <div class="input-group flex-nowrap p-3">
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" name="email">
                            </div>
                            <div class="input-group flex-nowrap p-3">
                                <input type="text" class="form-control" placeholder="Password" aria-label="password" aria-describedby="addon-wrapping" name="passe">

                            </div>
                            <div>
                                <button type="submit">Login</button>
                            </div>
                        </form>
                    </div>
            </div>
            <div class="col"></div>
        </div>
    </div>


    </header>
    </body>

    </html>