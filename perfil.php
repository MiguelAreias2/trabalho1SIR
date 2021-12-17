<?php
require_once './func/verificalogin.php';
require_once './componentes/head.php';
require_once './componentes/navBar.php';
require_once './database/conexao.php';

$statement = $pdo->prepare("SELECT * FROM users where iduser=:idlogado");
$statement->bindValue(':idlogado', $_SESSION['iduser']);
$statement->execute();
$userinfo = $statement->fetch(PDO::FETCH_ASSOC);

$nome = $userinfo['nomeuser'];
$email = $userinfo['email'];
$passe = $userinfo['passe'];
?>

<?php 
require_once './componentes/head.php';
require_once './componentes/navBar.php';
?>

<body>
    <div class="infos">
        <h1>  As suas informações</h1>
      
        <h2>ola  <?php echo $nome ?> </h2>
        <p>Nome:  <?php echo $nome ?> </p>
        <p>Email:  <?php echo $email ?> </p>
        <p>Palavra-passe:  <?php echo $passe ?> </p>

    </div>
</body>

</html>