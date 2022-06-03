<?php
require_once './func/verificalogin.php';
require_once './database/conexao.php';
require_once './componentes/head.php';
require_once './componentes/navBar.php';

$idapontamento = $_GET['id'] ?? null;

if (!$_GET['id']) {
    header('location: apontamentos.php');
    exit;
}

$statement = $pdo->prepare("SELECT * FROM tipoapontamento;");
$statement->execute();
$tipoapontamentos = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT * FROM apontamento where idapontamento=:id;");
$statement->bindValue(':id', $idapontamento);
$statement->execute();
$apontamento = $statement->fetch(PDO::FETCH_ASSOC);

$nomeapont = $apontamento['nomeapontamento'];
$descapont = $apontamento['descapontamento'];
$imgapont = $apontamento['imagem'];
$tipo = $apontamento['idtipoapontamento'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $nomeapont = $_POST['nomeapont'];
    $descapont = $_POST['descapont'];
    $imgapont = $_POST['imgapont'];
    $tipo = $_POST['tipo'];

    if (!$nomeapont) {
        $nomeErr = 'O nome é obrigatorio!';
    }

    if (!$descapont) {
        $descErr = 'A descrição é obrigatoria!';
    }

    if (empty($nomeErr) && empty($descErr)) {

        $statement = $pdo->prepare("UPDATE apontamento set nomeapontamento=:nomeapont, descapontamento=:descapont, idtipoapontamento=:tipo, imagem=:imgapont where idapontamento=:idapont");

        $statement->bindValue(':nomeapont', $nomeapont);
        $statement->bindValue(':descapont', $descapont);
        $statement->bindValue(':idapont', $idapontamento);
        $statement->bindValue(':tipo', $tipo);
        $statement->bindValue(':imgapont', $imgapont);

        $statement->execute();

        header('location: apontamentos.php');
    }
}
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-1"></div>
            <div class="col-md-8 col-10">
                <?php include_once 'func\formapontamento.php' ?>
                <div>
                    <input type="submit" value="Editar apontamento">
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>