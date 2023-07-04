<?= $this->extend('Admin/layout/main') ?>
<?php $this->section('title') ?>
Editar categoria: <?= $category->name ?>
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<main>
    <form action="<?= base_url(route_to('categories_update')) ?>" method="POST">
        <label for="name" class="label">Nombre de la cateogria</label>
        <input type="hidden" name="id" type="text" value="<?= $category->id ?>">
        <div class="control">
            <input class="input" name="name" id="name" type="text" placeholder="Nombre categoria" value="<?= old('name') ?? $category->name ?>">
        </div>
        <!-- Renderizamos el error -->
        <p class="help is-danger">
            <?= session('errors.name') ?>
        </p>
        <br>
        <div class="control">
            <input type="submit" value="Enviar" class="button is-primary"></input>
        </div>
    </form>
</main>
<?php $this->endSection() ?>