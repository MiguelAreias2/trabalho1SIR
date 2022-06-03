<?php
require_once './func/verificalogin.php';
require_once './componentes/head.php';
require_once './componentes/navBar.php';
require_once './database/conexao.php';

$statement = $pdo->prepare("SELECT * FROM tipoapontamento;");
$statement->execute();
$tipoapontamentos = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT * FROM apontamento where iduser = :idlogado ;");
$statement->bindValue(':idlogado', $_SESSION['iduser']);
$statement->execute();
$apontamentos = $statement->fetchAll(PDO::FETCH_ASSOC);

$pesq = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'];
    $pesq = '%' . $_POST['pesq'] . '%';

    if ($tipo == 0) {
        $statement = $pdo->prepare("SELECT * FROM apontamento where iduser = :idlogado and nomeapontamento LIKE :pesq ;");
        $statement->bindValue(':pesq', $pesq);
        $statement->bindValue(':idlogado', $_SESSION['iduser']);
        $statement->execute();
        $apontamentos = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {

        $statement = $pdo->prepare("SELECT * FROM apontamento where iduser = :idlogado and idtipoapontamento = :tipo and nomeapontamento LIKE :pesq ;");
        $statement->bindValue(':tipo', $tipo);
        $statement->bindValue(':pesq', $pesq);
        $statement->bindValue(':idlogado', $_SESSION['iduser']);
        $statement->execute();
        $apontamentos = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

<body>
    <div class="container">
        <h1>Lista apontamentos</h1>
        <form action="" method="POST">
            <select name="tipo" id="">
                <option value="0">Tipo de apontamento</option>
                <?php foreach ($tipoapontamentos as $tipoapontamento) : ?>
                    <option value="<?php echo $tipoapontamento['idtipoapontamento'] ?>">
                        <?php echo $tipoapontamento['nometipoapontamento'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="text" class="" placeholder="Pesquisa" name="pesq" <?php if ($pesq) : ?>value="<?php echo $_POST['pesq'] ?>" <?php endif; ?>>

            <input type="submit" value="pesquisar">
        </form>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-1 col-2"></div>
            <div class="col-md-10 col-10">
                <?php if ($apontamentos) : ?>
                    <div class="row row-cols-lg-5">

                        <div class="col">
                            <h3>Nome</h3>
                        </div>
                        <div class="col">
                            <h3>Descrição</h3>
                        </div>
                        <div class="col">
                            <h3>Favoritos</h3>
                        </div>
                        <div class="col">
                            <h3>Apagar</h3>
                        </div>
                        <div class="col">
                            <h3>Informações</h3>
                        </div>
                    </div>
                    <?php foreach ($apontamentos as $apontamento) : ?>

                        <div class="row row-cols-lg-5">
                            <div class="col"><?php echo $apontamento['nomeapontamento'] ?></div>
                            <div class="col"><?php echo $apontamento['descapontamento'] ?></div>
                            <div class="col"> <?php if ($apontamento['favoritos']) : ?>
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
                            <div class="col">
                                <form action="./deleteapontamento.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $apontamento['idapontamento'] ?>">
                                    <button type="submit" class="butt">Eliminar</button>
                                </form>
                            </div>
                            <div class="col">
                                
                                <a href="infoapontamento.php?id=<?php echo $apontamento['idapontamento'] ?>"  class="butt">Infos.</a>
                            </div>

                        </div>
                    <?php endforeach;
                elseif (!$apontamentos) : ?>
                    <h4>Não foram encontrados dados</h4>
                <?php endif; ?>


            </div>

        </div>
    </div>

</body>

</html>