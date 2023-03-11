<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="stylevasco.css?<?=filemtime("stylevasco.css")?>" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container">
        <?php
        include 'nav.php';
        ?>

        <?php include 'services/cadastrarfilme.php'; ?>

        <h1>Cadastrar Filme</h1>
        <form action="<?php echo htmlspecialchars(pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_FILENAME)); ?>"
            method="POST">
            <input type="hidden" name="acao" value="cadastrar">
            <input name="titulo" type="text" placeholder="titulo">
            <input name="diretor" type="text" placeholder="diretor">
            <input name="ano" type="number" placeholder="ano">
            <input type="submit" value="cadastrar">
        </form>

    </div>
</body>

</html>