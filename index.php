<?php
include_once './componentes/head.php';
session_start();
$_SESSION['iduser']="";
$_SESSION['nomeuser']="";

 ?>

<body>
    <h1>Pagina inicial</h1>

    <a href="login.php">login</a>
    <a href="create.php">registo</a>
</body>

</html>