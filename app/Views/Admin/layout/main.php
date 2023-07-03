<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->renderSection('title') ?> - Dashboard
    </title>
    <!-- Bulma -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
    <?= $this->include('Admin/layout/header.php') ?>
    <section class="section">
        <div class="container">
            <!-- Notificación -->
            <?php if (session('msg')) { ?>
                <section class="section">
                    <article class="message <?= session('msg.type') ?>">
                        <div class="message-body">
                            <?= session('msg.body') ?>
                        </div>
                    </article>
                </section>
            <?php } ?>
            <!-- renderSection actúa como un marcador de posición para el contenido -->
            <?= $this->renderSection('content') ?>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/55da5f9fc2.js" crossorigin="anonymous"></script>
</body>

</html>