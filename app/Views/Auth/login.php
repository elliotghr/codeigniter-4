<!-- Obtenemos el mensaje previamente pasado en el redirect -->

<?= $this->extend('Front/Layout/main') ?>
<?= $this->section('content') ?>
<section class="section">
    <div class="container">
        <section class="section">
            <h1 class="title">Login</h1>
            <h2 class="subtitle">
                Ingresa al sistema ahora
            </h2>
        </section>
        <?php if (session('msg')) { ?>
            <section class="section">
                <article class="message <?= session('msg.type') ?>">
                    <div class="message-body">
                        <?= session('msg.body') ?>
                    </div>
                </article>
            </section>
        <?php } ?>
        <form action="<?= base_url('auth/check') ?>" method="POST">
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input class="input" type="email" placeholder="Email" name="email" value="<?= old('email') ?>">
                </p>
                <p class="is-danger help"><?= session('errors.email') ?></p>
            </div>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="password" placeholder="Password" name="password">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </p>
                <p class="is-danger help"><?= session('errors.password') ?></p>
            </div>
            <div class="field">
                <p class="control">
                    <input type="submit" class="button is-success" value="Login">
                    </input>
                </p>
            </div>
        </form>
    </div>
</section>
<?= $this->endSection() ?>