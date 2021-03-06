<?php
require_once './func/verificalogin.php';
require_once './componentes/head.php';
require_once './componentes/navBar.php';
require_once './database/conexao.php';

$statement = $pdo->prepare("SELECT * FROM apontamento where iduser=:idlogado and favoritos = 1");
$statement->bindValue(':idlogado', $_SESSION['iduser']);
$statement->execute();
$apontamentos = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<body>

    <div class="container">
        <h1>Os seus destaques</h1>
        <br>
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
                                    <button type="submit" class="butt">Apagar</button>
                                </form>
                            </div>
                            <div class="col">

                                <a href="infoapontamento.php?id=<?php echo $apontamento['idapontamento'] ?>" class="butt">Editar</a>
                            </div>

                        </div>
                    <?php endforeach;
                elseif (!$apontamentos) : ?>
                    <h4>Não tem destaques. Crie apontamentos e selecione os seus destaques.</h4>
                <?php endif; ?>


            </div>

        </div>
    </div>

</body>

</html>