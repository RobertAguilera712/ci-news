<option value="">Seleccionar subcategoría</option>
<?php foreach ($subcategorias as $sub) : ?>
    <?php if ($sub->estatus == 'A') : ?>
        <option value="<?= $sub->id ?>"><?= $sub->nombre ?></option>
    <?php endif ?>
<?php endforeach; ?>