<div class="formulario">
    <form action="" method="POST">
        <h2 class="">Registar-se</h2>
        <div class="">
            <label class="form-label"> Nome</label>
            <br>
            <?php if (!empty($nomeErr)) : ?>
                <div class="">
                    <p class="alerta"><?php echo $nomeErr ?></p>
                </div>
            <?php endif; ?>
            <input type="text" class="" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" name="nomeuser" <?php if (empty($nomeErr)) : ?>value="<?php echo $nomeuser ?>" <?php endif; ?>>
        </div>
        <div class="">
            <label class="form-label">Email</label>
            <br>
            <?php if (!empty($emailErr)) : ?>
                <div class="">
                    <p class="alerta"><?php echo $emailErr ?></p>
                </div>
            <?php endif; ?>
            <input type="text" class="" placeholder="Email" aria-label="email" aria-describedby="addon-wrapping" name="email" <?php if (empty($emailErr)) : ?>value="<?php echo $email ?>" <?php endif; ?>>
        </div>
        <div class="">
            <label class="form-label">Palavra-passe</label>
            <br>
            <?php if (!empty($passwordErr)) : ?>
                <div class="">
                    <p class="alerta"><?php echo $passwordErr ?></p>
                </div>
            <?php endif; ?>
            <input type="password" class="" placeholder="Password" aria-label="password" aria-describedby="addon-wrapping" name="passe" <?php if (empty($passeErr)) : ?>value="<?php echo $passe ?>" <?php endif; ?>>
        </div>