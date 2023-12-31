<div class="columns is-mobile is-multiline">
    <!-- Ciclamos los posts existentes -->
    <?php foreach ($posts as $value) : ?>
        <div class="column is-one-third">
            <a href="<?= $value->getLinkArticle() ?>">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <!-- Traemos la imagen -->
                            <img src="<?= $value->getLink() ?>" alt="Placeholder image">
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
                                <!-- Accedemos a la propiedad author que devuelve los datos del UsersInfoModel pero con los métodos de la entidad, con eso accedemos a getFullName -->
                                <p class="subtitle is-6"><?= $value->author->getFullName() ?></p>
                            </div>
                        </div>
                        <div class="content">
                            <!-- Usamos el helper para deliminar 10 palabras y usamos la función strip_tags para escapar los caracteres HTML y PHP -->
                            <?= character_limiter(strip_tags($value->body), 10) ?>
                            <?php
                            if (!empty($value->getCategories())) :
                                foreach ($value->getCategories() as $category) :
                            ?>
                                    <a href="#"><?= $category->name ?></a>
                            <?php
                                endforeach;
                            endif;
                            ?>
                            <br>
                            <!-- Usamos el helper para los datetime -->
                            <time datetime="2016-1-1"><?= $value->publish_at->humanize() ?></time>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>