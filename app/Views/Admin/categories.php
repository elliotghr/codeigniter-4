<!-- Cada vez que una vista quiera insertarse en un diseño, debe usar el método extend() en la parte superior del archivo -->
<?= $this->extend('Admin/layout/main') ?>
<!-- Entre el método section y endSection pasamos el contenido de los componentes dinamicos -->
<?php $this->section('title') ?>
Lista de categorias
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<main>
    <div class="field">
        <a class="is-dark button" href="<?= base_url(route_to('categories_create')) ?>">Crear categorias</a>
    </div>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $categoria) : ?>
                <tr>
                    <td><?= $categoria->id ?></td>
                    <td><?= $categoria->name ?></td>
                    <td><?= $categoria->created_at->humanize() ?></td>
                    <td><?= $categoria->updated_at->humanize() ?></td>
                    <td>
                        <a href="<?= $categoria->getEditLink() ?>">Editar</a>
                        <a href="<?= $categoria->getEditLink() ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links() ?>
</main>
<?php $this->endSection() ?>