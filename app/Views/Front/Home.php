<!-- Cada vez que una vista quiera insertarse en un diseño, debe usar el método extend() en la parte superior del archivo -->
<?= $this->extend('Front/layout/main') ?>
<!-- Entre el método section y endSection pasamos el contenido de los componentes dinamicos -->
<?php $this->section('title') ?>
Home
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<main>
    <div class="container">
        <section class="section">
            <div class="columns is-mobile is-multiline">
                <!-- Ciclamos los posts existentes -->
                <?php foreach ($posts as $value) : ?>
                    <div class="column is-one-third">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4"><?= $value->title ?></p>
                                        <p class="subtitle is-6">@johnsmith</p>
                                    </div>
                                </div>
                                <div class="content">
                                    <?= $value->body ?>
                                    <a>@bulmaio</a>.
                                    <a href="#">#css</a> <a href="#">#responsive</a>
                                    <br>
                                    <time datetime="2016-1-1"><?= $value->publish_at ?></time>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?= $pager->links() ?>
        </section>
    </div>
</main>
<?php $this->endSection() ?>