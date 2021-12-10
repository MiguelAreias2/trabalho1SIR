<?php
require_once './componentes/header.php';
require_once './componentes/navBar.php';
require_once './database/conexao.php';
$email = '';
$passe = '';
$erro;

session_start();

<<<<<<< Updated upstream
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $passe = $_POST['passe'];

    $stmt = $pdo->prepare("SELECT iduser FROM users WHERE email = :email AND passe = :passe");
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':passe', $passe);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        $erro = 'Dados de login incorretos!';
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="text-center">
                <img src="./assets/logo.png" class="rounded m-3" alt="" width="250" height="250">
=======
$email = '';
$passe = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
   
   $email = mysqli_real_escape_string($db,$_POST['email']);
   $passe = mysqli_real_escape_string($db,$_POST['passe']); 
   
   $sql = "SELECT iduser FROM users WHERE email = '$email' and passe = '$passe'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $active = $row['active'];
   
   $count = mysqli_num_rows($result);
        
   if($count == 1) {
    //   session_register("iduser");
      $_SESSION['iduser'] = $iduser;
      
    //   header("location: welcome.php");
   }else {
    $error = "Email ou Palavra-passe inválidas.";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">

</head>
<body>
<div class="container">
        <h1 class="mt-5">Login</h1>

        <a href="create.php" class="btn btn-outline-info mt-3">Registar-se</a>

        <form class="mt-5" action="login.php" method="POST">
            <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger">
                        <div><?php echo $error ?></div>
                    </div>
            <?php endif; ?>
        
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control" name="email" value="<?php echo $email ?>">
>>>>>>> Stashed changes
            </div>

            <div class="rounded m-3 bg-light">
                <form action="" method="POST">
                    <h3 class="text-center p-3">Login</h3>
                    <?php if (!empty($erro)) : ?>
                            <div class="alert alert-danger">
                                <div><?php echo $erro ?></div>
                            </div>
                        <?php endif; ?>
                    <div class="input-group flex-nowrap p-3">
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" name="email">
                    </div>
                    <div class="input-group flex-nowrap p-3">
                        <input type="text" class="form-control" placeholder="Password" aria-label="password" aria-describedby="addon-wrapping"  name="passe">
                    </div>
                    <div class="input-group flex-nowrap p-3">
                        <button type="submit" class="btn btn-outline-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</div>


</header>
</body>

</html>