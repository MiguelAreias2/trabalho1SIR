<?php
require_once './func/verificalogin.php';
require_once './database/conexao.php';
require_once './componentes/head.php';
require_once './componentes/navBar.php';

$idapontamento = $_GET['id'] ?? null;

if (!$_GET['id']) {
    header('location: index.php');
    exit;
}

$statement = $pdo->prepare("SELECT apontamento.nomeapontamento, apontamento.idapontamento, apontamento.imagem, apontamento.descapontamento, apontamento.dataapontamento, tipoapontamento.nometipoapontamento, apontamento.favoritos  FROM apontamento INNER JOIN tipoapontamento ON tipoapontamento.idtipoapontamento = apontamento.idtipoapontamento  where idapontamento = :id ;");
$statement->bindValue(':id', $idapontamento);
$statement->execute();
$apontamento = $statement->fetch(PDO::FETCH_ASSOC);


?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-1"></div>
            <div class="col-md-8 col-10">
                <div class="infos">
                    <?php if ($apontamento['imagem']) : ?>
                        <div class="logo">
                            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($apontamento['imagem']) . '"/width="250" height="250">'; ?>
                        </div>
                    <?php endif; ?>
                    <h1> Informações </h1>
                    <br>
                    <h5>Nome: <?php echo $apontamento['nomeapontamento'] ?> </h5>
                    <br>
                    <h5>Descrição: <?php echo $apontamento['descapontamento'] ?> </h5>
                    <br>
                    <h5> Data de criação: <?php echo $apontamento['dataapontamento'] ?> </h5>
                    <br>
                    <h5>Tipo de apontamento: <?php echo $apontamento['nometipoapontamento'] ?> </h5>
                    <br>
                    <a href="updateapontamento.php?id=<?php echo $apontamento['idapontamento'] ?>" class="butt">Editar</a>
                     <br>
                     <br>
                    <form action="./deleteapontamento.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $apontamento['idapontamento'] ?>">
                        <button type="submit" class="butt"> Eliminar </button>
                    </form>
                    <br>
                    <div> <?php if ($apontamento['favoritos']) : ?>
                            <form action="./favorito.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $apontamento['idapontamento'] ?>">
                                <button type="submit" class="butfav"> <i class="fas fa-star fa-2x"></i> </button>
                            </form>
                        <?php else : ?>
                            <form action="./favorito.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $apontamento['idapontamento'] ?>">
                                <button type="submit" class="butfav"> <i class="far fa-star fa-2x"></i> </button>
                            </form>
                        <?php endif; ?>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</body>

</html>