<!-- Cada vez que una vista quiera insertarse en un diseño, debe usar el método extend() en la parte superior del archivo -->
<?= $this->extend('Admin/layout/main') ?>
<!-- Entre el método section y endSection pasamos el contenido de los componentes dinamicos -->
<?php $this->section('title') ?>
Lista de categorias
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<main>
    <h2>Listado de categorias</h2>
    <a href="<?= base_url(route_to('categories_create')) ?>">Crear categorias</a>
</main>
<?php $this->endSection() ?>