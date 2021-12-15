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