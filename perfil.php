<?php
require_once './func/verificalogin.php';
require_once './componentes/head.php';
require_once './componentes/navBar.php';
require_once './database/conexao.php';


$statement = $pdo->prepare("SELECT * FROM users where iduser=:idlogado");
$statement->bindValue(':idlogado', $_SESSION['iduser']);
$statement->execute();
$userinfo = $statement->fetch(PDO::FETCH_ASSOC);

$userinfo['nomeuser'];
$email = $userinfo['email'];
$passe = $userinfo['passe'];

?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-1"></div>
            <div class="col-md-8 col-10">
                <div class="infos">
                    <div class="logo">
                        <img src="./assets/Logotransp.png" alt="" width="250" height="250">
                    </div>
                    <h1> As suas informações </h1>
                    <br>
                    <h5><i class="far fa-user"></i> Nome: <?php echo $userinfo['nomeuser'] ?> </h5>
                    <h5><i class="far fa-envelope"></i> Email: <?php echo $email ?> </h5>
                    <h5><i class="fas fa-lock"></i> Palavra-passe: <?php echo $passe ?> </h5>
                    <br>
                    <div class="buttons">
                    </div>
                    <a href="editarperfil.php" class="butt">Editar</a>
                    <br>
                    <br>
                    <form action="./desativarconta.php " method="POST">
                        <input type="hidden" name="id" value="<?php echo $_SESSION['iduser'] ?>">
                        <button type="submit" class="butt"> Desativar conta</i> </button>
                    </form>
                    <br>

                </div>
            </div>
        </div>
    </div>
</body>

</html>