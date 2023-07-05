<!-- Cada vez que una vista quiera insertarse en un diseño, debe usar el método extend() en la parte superior del archivo -->
<?= $this->extend('Admin/layout/main') ?>
<!-- Entre el método section y endSection pasamos el contenido de los componentes dinamicos -->
<?php $this->section('title') ?>
Crear articulo
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<main>
    <h2 class="title has-text-centered">Crear articulo</h2>
    <section class="section">
        <form action="<?= base_url(route_to('posts_store')) ?>" enctype="multipart/form-data" method="POST">
            <div class="columns">
                <div class="column is-three-fifths">
                    <div class="field">
                        <label for="title" class="label">Titulo</label>
                        <div class="control">
                            <input class="input" type="text" name="title" id="title" value="">
                        </div>
                    </div>
                    <div class="field">
                        <label for="body" class="label">Cuerpo</label>
                        <div class="control has-icons-left has-icons-right">
                            <textarea class="textarea" name="body" id="body" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <div class="file has-name is-boxed">
                            <label class="file-label">
                                <input class="file-input" type="file" name="cover">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                        Choose a file…
                                    </span>
                                </span>
                                <span class="file-name">
                                    Screen Shot 2017-07-29 at 15.54.25.png
                                </span>
                            </label>
                        </div>
                        <br>
                        <div class="field">
                            <label for="published_at" class="label">Fecha de publicación</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-success" type="date" name="published_at" id="published_at">
                            </div>
                        </div>
                        <div class="field">
                            <label for="categories" class="label">Categorias</label>
                            <?php if (empty($categories)) : ?>
                                <a href="<?= base_url(route_to('categories_create')) ?>">Agregar una categoria</a>
                            <?php else : ?>
                                <?php foreach ($categories as $value) : ?>
                                    <div class="field">
                                        <label class="checkbox">
                                            <input type="checkbox" name="categories[]" id="categories" value="<?= $value->name ?>">
                                            <?= $value->name ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <input type="submit" class="button is-dark is-fullwidth" value="Enviar"></input>
            </div>
        </form>
    </section>
</main>
<!-- Traemos la librería tinymce -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.5.1/tinymce.min.js" integrity="sha512-UhysBLt7bspJ0yBkIxTrdubkLVd4qqE4Ek7k22ijq/ZAYe0aadTVXZzFSIwgC9VYnJabw7kg9UMBsiLC77LXyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Configuramos tinymce -->
<script>
    tinymce.init({
        selector: '#body',
        height: 500,
        menubar: false,
        content_style: 'body { font-famili:Helvetica,Arial,san-serif; font-size:14px}'
    });
</script>
<?php $this->endSection() ?>