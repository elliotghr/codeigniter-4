<!-- Cada vez que una vista quiera insertarse en un diseño, debe usar el método extend() en la parte superior del archivo -->
<?= $this->extend('Admin/layout/main') ?>
<!-- Entre el método section y endSection pasamos el contenido de los componentes dinamicos -->
<?php $this->section('title') ?>
Agregar una categoria
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<main>
    <form action="<?= base_url(route_to('categories_store')) ?>" method="POST">
        <label for="name" class="label">Nombre de la cateogria</label>
        <div class="control">
            <input class="input" name="name" id="name" type="text" placeholder="Text input">
        </div>
        <br>
        <div class="control">
            <input type="submit" value="Enviar" class="button is-primary"></input>
        </div>
    </form>
</main>
<?php $this->endSection() ?>