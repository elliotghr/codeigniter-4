<!-- Cada vez que una vista quiera insertarse en un diseño, debe usar el método extend() en la parte superior del archivo -->
<?= $this->extend('Admin/layout/main') ?>
<!-- Entre el método section y endSection pasamos el contenido de los componentes dinamicos -->
<?php $this->section('title') ?>
Lista de articulos
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<main>
    <h2>Lista de articulos</h2>
    <a href="<?= base_url(route_to('posts_create')) ?>">Alta articulos</a>
</main>
<?php $this->endSection() ?>