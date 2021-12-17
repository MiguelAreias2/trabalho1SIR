<?php
session_start();
$_SESSION['iduser'] = "";
$_SESSION['nomeuser'] = "";

?>

<?php include_once './componentes/head.php';?>

<body>
    <div class="modal-body row">
        <div class="col-md-6">
            <img class="logowcp" src="./assets/Logotransp.png" alt="">
        </div>
        <div class="col-md-6">
            <div class="centrar">
                <h1>Bem-vindo ao 221B</h1>
                <p>Onde aquele livro? Onde é que eu guardei as chaves do carro? Esqueci o aniversário de um familiar!
                    Com 221B estes problemas acabam agora. Aqui podes apontar todas as datas importantes e tudo o que não quiseres esquecer!  </p>
            <a href="login.php">login</a>
            <a href="create.php">registo</a>
            </div>
            
        </div>
    </div>
</body>

</html>