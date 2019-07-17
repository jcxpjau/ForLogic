<?php include_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="PT-BR"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>INDEX | ForLogic</title>
    <link href="<?php echo ASSETS_URL; ?>/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
<nav class="site-header sticky-top py-1 navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2 d-none d-md-inline-block" href="<?php echo ROOT_URL; ?>">Inicio</a>
        <a class="py-2 d-none d-md-inline-block" href="<?php echo ROOT_URL . 'clientes.php'; ?>">Cadastro de Clientes</a>
        <a class="py-2 d-none d-md-inline-block" href="<?php echo ROOT_URL . 'avaliacoes.php'; ?>">Cadastro de Avaliações</a>
        <a class="py-2 d-none d-md-inline-block" href="<?php echo ROOT_URL . 'pesquisa.php'; ?>">Pesquisa</a>
        <a class="py-2 d-none d-md-inline-block" href="<?php echo ROOT_URL . 'resultados.php'; ?>">Resultados</a>
    </div>
</nav>
