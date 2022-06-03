<?php
require_once './func/verificalogin.php';
require_once './componentes/head.php';
require_once './componentes/navBar.php';
require_once './database/conexao.php';

$statement = $pdo->prepare("SELECT * FROM tipoapontamento;");
$statement->execute();
$tipoapontamentos = $statement->fetchAll(PDO::FETCH_ASSOC);

$nomeErr;
$descErr;
$nomeapont = '';
$descapont = '';
$tipo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeapont = $_POST['nomeapont'];
    $descapont = $_POST['descapont'];
    $tipo = $_POST['tipo'];
    $filename = $_FILES["imgapont"]["name"];
    $tempname = $_FILES["imgapont"]["tmp_name"];    
        $folder = "image/".$filename;
          

    if (!$nomeapont) {
        $nomeErr = 'O nome é obrigatorio!';
    }

    if (!$descapont) {
        $descErr = 'A descrição é obrigatoria!';
    }

    if (empty($nomeErr) && empty($descErr)) {

        $statement = $pdo->prepare("INSERT INTO apontamento(nomeapontamento, descapontamento, iduser, idtipoapontamento, imagem)
            VALUES(:nomeapont, :descapont, :idlogado, :tipo, :filename )");

        $statement->bindValue(':nomeapont', $nomeapont);
        $statement->bindValue(':descapont', $descapont);
        $statement->bindValue(':idlogado', $_SESSION['iduser']);
        $statement->bindValue(':tipo', $tipo);
        $statement->bindParam(':filename', $filename);

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
                    <input type="submit" value="Criar apontamento">
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>