<section class="hero is-success is-fullheight">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
        <header class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item">
                        <img src="https://bulma.io/images/bulma-type-white.png" alt="Logo">
                    </a>
                    <span class="navbar-burger" data-target="navbarMenuHeroC">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </div>
                <div id="navbarMenuHeroC" class="navbar-menu">
                    <div class="navbar-end">
                        <a class="navbar-item is-active">
                            Home
                        </a>
                        <a class="navbar-item">
                            Examples
                        </a>
                        <a class="navbar-item">
                            Documentation
                        </a>
                        <span class="navbar-item">
                            <a class="button is-success is-inverted">
                                <span class="icon">
                                    <i class="fab fa-github"></i>
                                </span>
                                <span>Download</span>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
        <div class="container has-text-centered">
            <p class="title">
                Bienvenidos a mi blog
            </p>
            <p class="subtitle">
                Lista de entradas
            </p>
        </div>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed is-fullwidth">
            <div class="container">
                <ul>
                    <!-- Creamos validaciones para la clase active -->
                    <li class="<?= service('request')->getUri()->getPath() == 'home' ? 'is-active' : null ?>"><a href="<?= base_url(route_to('home')) ?>">Inicio</a></li>
                    <li class="<?= service('request')->getUri()->getPath() == 'auth/registro' ? 'is-active' : null ?>"><a href="<?= base_url(route_to('register')) ?>">Registro</a></li>
                    <li class="<?= service('request')->getUri()->getPath() == 'auth/login' ? 'is-active' : null ?>"><a href="<?= base_url(route_to('login')) ?>">Ingreso</a></li>
                </ul>
            </div>
        </nav>
    </div>
</section>