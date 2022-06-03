<?php
require_once './func/verificalogin.php';
require_once './componentes/head.php';
require_once './componentes/navBar.php';
require_once './database/conexao.php';


$statement = $pdo->prepare("SELECT * FROM users where iduser=:idlogado");
$statement->bindValue(':idlogado', $_SESSION['iduser']);
$statement->execute();
$userinfo = $statement->fetch(PDO::FETCH_ASSOC);

$nomeErr;
$emailErr;
$passwordErr;
$nomeuser = $userinfo['nomeuser'];
$email = $userinfo['email'];
$passe = $userinfo['passe'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include_once './func/funcuser.php';

    if ($userinfo['email'] === $email) {

        $emailErr = '';

        if (empty($nomeErr) && empty($passwordErr)) {

            $statement = $pdo->prepare("UPDATE users SET nomeuser = :nomeuser, email= :email, passe = :passe WHERE iduser = :idlogado ;");

            $statement->bindValue(':nomeuser', $nomeuser);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':passe', $passe);
            $statement->bindValue(':idlogado', $_SESSION['iduser']);

            $statement->execute();

            header('location: perfil.php');
        }
    } else if (empty($nomeErr) && empty($emailErr) && empty($passwordErr)) {

        $statement = $pdo->prepare("UPDATE users SET nomeuser = :nomeuser, email= :email, passe = :passe WHERE iduser = :idlogado ;");
        $statement->bindValue(':nomeuser', $nomeuser);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':passe', $passe);
        $statement->bindValue(':idlogado', $_SESSION['iduser']);

        $statement->execute();

        header('location: perfil.php');
    }
}

?>
<div class="container">
    <div class="row">
        <div class="col-md-2 col-1"></div>
        <div class="col-md-8 col-10">
            <div class="logo">
                <img src="./assets/Logo2.png" alt="" width="250" height="250">
            </div>

            <div>
                <?php include_once 'func\formuser.php' ?>
                <div>
                    <input type="submit" value="Guardar">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

</body>

</html>