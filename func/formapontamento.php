<div class="formulario">
    <form action="" method="post">
        <h2 class="">Criar apontamento</h2>
        <div class="">
            <label class="form-label">Nome</label>
            <br>
            <?php if (!empty($nomeErr)) : ?>
                <div class="">
                    <p class="alerta"><?php echo $nomeErr ?></p>
                </div>
            <?php endif; ?>
            <input type="text" class="" placeholder="Nome" aria-label="Nome" aria-describedby="addon-wrapping" name="nomeapont" <?php if (empty($nomeErr)) : ?>value="<?php echo $nomeapont ?>" <?php endif; ?>>
        </div>
        <div class="">
            <label class="form-label">Descrição</label>
            <br>
            <?php if (!empty($descErr)) : ?>
                <div class="">
                    <p class="alerta"><?php echo $descErr ?></p>
                </div>
            <?php endif; ?>
            <textarea type="text" class="" placeholder="Descrição" aria-label="descrição" aria-describedby="addon-wrapping" name="descapont" <?php if (empty($descErr)) : ?>value="<?php echo $descapont ?>" <?php endif; ?>></textarea>
            </div>
        <div class="">
            <label class="form-label">tipoapontamento</label>
            <br>
            <select name="tipo" id="" >
            <?php foreach ($tipoapontamentos as $tipoapontamento) : ?>
                <option value="<?php echo $tipoapontamento['idtipoapontamento'] ?>">
                    <?php echo $tipoapontamento['nometipoapontamento'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        </div>
        <div class="">
            <label class="form-label">Imagem</label>
            <br>
            <input type="file" class="" placeholder="Imagem" aria-label="imagem" aria-describedby="addon-wrapping" name="imgapont" value="<?php echo $imgapont ?>">
        </div>