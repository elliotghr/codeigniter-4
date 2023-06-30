<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->renderSection('title') ?>
    </title>
    <!-- Bulma -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
    <!-- Busca a partir de la carpeta Views -->
    <?= $this->include('Front/layout/header.php') ?>
    <!-- renderSection actúa como un marcador de posición para el contenido -->
    <?= $this->renderSection('content') ?>
    <?= $this->include('Front/layout/footer.php') ?>
    <script src="https://kit.fontawesome.com/55da5f9fc2.js" crossorigin="anonymous"></script>
</body>

</html>