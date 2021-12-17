<?php
require_once './func/verificalogin.php';
require_once './componentes/head.php';
require_once './componentes/navBar.php';
require_once './database/conexao.php';

$statement = $pdo->prepare("SELECT * FROM apontamento where iduser=:idlogado");
$statement->bindValue(':idlogado', $_SESSION['iduser']);
$statement->execute();
$apontamentos = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <h1>ola <?= $_SESSION['nomeuser'] . $_SESSION['iduser']?></h1>
    <h1>Lista apontamentos</h1>
        <a href="create.php" >Registar user</a>
        <ul class=>
            <?php foreach ($apontamentos as $i => $apontamento) : ?>
                <li >
                    <div >
                        <h4><?php echo $i . ' - ' . $apontamento['nomeapontamento'] ?></h4>
                        <span ><?php echo $apontamento['descapontamento'] ?></span>
                            <p ><?php echo $apontamento['dataapontamento'] ?></p>
                            <p ><?php echo $apontamento['localapontamento'] ?></p>
                            <p ><?php echo $apontamento['idtipoapontamento'] ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    
</body>
</html>