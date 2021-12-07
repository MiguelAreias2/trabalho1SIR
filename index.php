<?php
require_once './database/conexao.php';

$statement = $pdo->prepare("SELECT * FROM users");
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/index.css">
</head>

<body>
     <div class="container"> 
        <h1 class="mt-5">Lista de users</h1>
        <a href="create.php" class="btn btn-outline-success mt-3">Registar user</a>
        <ul class="list-group mt-5">
            <?php foreach ($users as $i => $user) : ?> 
                <li class="list-group-item">
                    <div class="container">
                        <h4><?php echo $i . ' - ' . $user['nomeuser'] ?></h4>
                        <span class="badge rounded-pill bg-secondary"><?php echo $user['passe'] ?></span>
                        <?php if ($user['email']) : ?>
                            <p class="mt-4"><?php echo $user['email'] ?></p>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>