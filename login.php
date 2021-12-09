<?php
require_once './database/conexao.php';

session_start();
   
if($_SERVER["REQUEST_METHOD"] == "POST") {
   
   $email = mysqli_real_escape_string($db,$_POST['email']);
   $passe = mysqli_real_escape_string($db,$_POST['passe']); 
   
   $sql = "SELECT iduser FROM users WHERE email = '$email' and passe = '$passe'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $active = $row['active'];
   
   $count = mysqli_num_rows($result);
        
   if($count == 1) {
      session_register("email");
      $_SESSION['email'] = $email;
      
      header("location: welcome.php");
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

</head>
<body>
<div class="container">
        <h1 class="mt-5">Login</h1>

        <a href="create.php" class="btn btn-outline-info mt-3">Registar-se</a>

        <form class="mt-5" action="login.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control" name="email" value="<?php echo $email ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Palava-passe</label>
                <input type="password" step=".2" class="form-control" name="passe" value="<?php echo $passe ?>">
            </div>
            <button type="submit" class="btn btn-info">Login</button>
        </form>
    </div>
    
</body>
</html>