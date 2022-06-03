<?php
session_start();
$_SESSION['iduser'] = "";
$_SESSION['nomeuser'] = "";

?>

<?php include_once './componentes/head.php'; ?>

<body>
    <div class="modal-body row">
        <div class="col-md-6">
            <div class="buttons">
                <a href="./create.php" class="butt">Registar</a>
                <a href="./login.php" class="butt">Iniciar Sessão</a>
            </div>
            <div class="centrar">
                <h1 class="tit">Bem-vindo ao 221B</h1>
                <p class="intro">Onde está aquele livro? Onde é que eu guardei as chaves do carro? Esqueci o aniversário de um familiar!
                    Com 221B estes problemas acabam agora. Aqui podes apontar todas as datas importantes, todos os objetos que guardas e tudo mais o que não quiseres esquecer! </p>

            </div>
        </div>
        <div class="col-md-6">
            <img class="logowcp" src="./assets/Logotransp.png" alt="">

        </div>
    </div>
</body>

</html>