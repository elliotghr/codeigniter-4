<!-- Cada vez que una vista quiera insertarse en un diseño, debe usar el método extend() en la parte superior del archivo -->
<?= $this->extend('Front/layout/main') ?>
<!-- Entre el método section y endSection pasamos el contenido de los componentes dinamicos -->
<?php $this->section('title') ?>
<?= $post->titl ?>
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<main>
    <section class="section">
        <div class="content">
            <img src="<?= $post->getLink() ?>" alt="" style="width:100%;height:300px;object-fit:cover">
            <h1>Titulo: <?= $post->title ?></h1>
            <h3>Por: <?= $post->author->getFullName() ?></h3>
            <p>Fecha: <?= $post->publish_at->humanize() ?></p>
            <?php foreach ($post->getCategories() as $value) : ?>
                <div class="tags are-medium">
                    <span class="tag"><?= $value->name ?></span>
                </div>
            <?php endforeach; ?>
            <p><?= $post->body ?></p>
        </div>
    </section>
</main>
<?php $this->endSection() ?>