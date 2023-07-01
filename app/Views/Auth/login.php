<!-- Obtenemos el mensaje previamente pasado en el redirect -->

<?= $this->extend('Front/Layout/main') ?>
<?= $this->section('content') ?>
<?= session('msg') ?>
<section class="section">
    <div class="container">
        <section class="section">
            <h1 class="title">Login</h1>
            <h2 class="subtitle">
                Ingresa al sistema ahora
            </h2>
        </section>
        <form action="" method="POST">
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input class="input" type="email" placeholder="Email">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="password" placeholder="Password">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <button class="button is-success">
                        Login
                    </button>
                </p>
            </div>
        </form>
    </div>
</section>
<?= $this->endSection() ?>