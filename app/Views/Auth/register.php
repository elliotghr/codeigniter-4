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
        <div class="field">
            <label class="label">Nombre</label>
            <div class="control">
                <input class="input" type="text" placeholder="" name="name">
            </div>
        </div>
        <div class="field">
            <label class="label">Apellidos</label>
            <div class="control">
                <input class="input" type="text" placeholder="" name="surname">
            </div>
        </div>
        <div class="field">
            <label class="label">Correo</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="email" name="email">
                <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>
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
                            echo '
                                <option value="' . $pais['country_id'] . '">' . $pais['name'] . '</option>
                                ';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Contraseña</label>
            <div class="control">
                <input class="input" type="password" placeholder="" name="c-password">
            </div>
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
    </section>
</main>
<?php $this->endSection() ?>