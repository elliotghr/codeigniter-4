<!-- Hacemos uso de nuestra plantilla main -->
<?= $this->extend('Front/layout/main') ?>

<?php $this->section('title') ?>
Registro
<?php $this->endSection() ?>

<?php $this->section('content') ?>
<main>
    <section class="section">
        <h1 class="title">Registrate Ahora!</h1>
        <h2 class="subtitle">
            Solo debes ingresar algunos datos para comenzar
        </h2>
    </section>
    <section class="section">
        <form action="<?= base_url('auth/store') ?>" method="POST">
            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <!-- En el value accedemos a los valores anteriores de cada inpurt -->
                    <input class="input" type="text" placeholder="" name="name" value="<?= old('name') ?>">
                </div>
                <!-- Accedemos al arreglo errors y la propiedad de cada uno para traer el mensaje de error -->
                <p class="is-danger help"><?= session('errors.name') ?></p>
            </div>
            <div class="field">
                <label class="label">Apellidos</label>
                <div class="control">
                    <input class="input" type="text" placeholder="" name="surname" value="<?= old('surname') ?>">
                </div>
                <p class="is-danger help"><?= session('errors.surname') ?></p>
            </div>
            <div class="field">
                <label class="label">Correo</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="email" name="email" value="<?= old('email') ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
                <p class="is-danger help"><?= session('errors.email') ?></p>
            </div>
            <div class="field">
                <label class="label">Elige país</label>
                <div class="control">
                    <div class="select">
                        <select name="country_id">
                            <option value="">Elige un país</option>
                            <!-- Renderizamos los datos de los paises -->
                            <?php
                            foreach ($paises as $pais) {
                                $selected = $pais['country_id'] == old('country_id') ? 'selected' : null;
                                echo '
                                    <option value="' . $pais['country_id'] . '"' . $selected . '>' . $pais['name'] . '</option>
                                    ';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <p class="is-danger help"><?= session('errors.country_id') ?></p>
            </div>
            <div class="field">
                <label class="label">Contraseña</label>
                <div class="control">
                    <input class="input" type="password" placeholder="" name="password">
                </div>
                <p class="is-danger help"><?= session('errors.password') ?></p>
            </div>
            <div class="field">
                <label class="label">Confirmación de contraseña</label>
                <div class="control">
                    <input class="input" type="password" placeholder="" name="c-password">
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-info">Submit</button>
                </div>
            </div>
        </form>
    </section>
</main>
<?php $this->endSection() ?>