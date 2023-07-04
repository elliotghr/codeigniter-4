<section class="hero is-dark is-fullheight">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
        <header class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item">
                        Mi blog con CI4
                    </a>
                    <span class="navbar-burger" data-target="navbarMenuHeroC">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </div>
                <div id="navbarMenuHeroC" class="navbar-menu">
                    <div class="navbar-end">
                        <span class="navbar-item is-active">
                            <?= session('user_name') ?>
                        </span>
                        <a href="<?= base_url(route_to('signout')) ?>" class="navbar-item">
                            Cerrar sesión
                        </a>
                        <!-- <a class="navbar-item">
                            Documentation
                        </a>
                        <span class="navbar-item">
                            <a class="button is-success is-inverted">
                                <span class="icon">
                                    <i class="fab fa-github"></i>
                                </span>
                                <span>Download</span>
                            </a>
                        </span> -->
                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
        <div class="container has-text-centered">
            <p class="title">
                Dashboard del blog
            </p>
            <p class="subtitle">
                Administra tu blog
            </p>
        </div>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed is-fullwidth">
            <div class="container">
                <ul>
                    <!-- Creamos validaciones para la clase active -->
                    <li class="<?= service('request')->getUri()->getPath() == 'admin/articulos' ? 'is-active' : null ?>"><a href="<?= base_url(route_to('posts')) ?>">Inicio</a></li>
                    <!-- Se crea una expresión regular para validar que se contenga esta cadena -->
                    <li class="<?= preg_match('|^admin/categorias(\S)*$|', service('request')->getUri()->getPath()) ? 'is-active' : null ?>"><a href="<?= base_url(route_to('categories')) ?>">Categorías</a></li>
                    <li class="<?= service('request')->getUri()->getPath() == '/' ? 'is-active' : null ?>"><a href="<?= base_url(route_to('home')) ?>">Usuarios</a></li>
                </ul>
            </div>
        </nav>
    </div>
</section>