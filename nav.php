<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vasco</title>
    <link href="stylevasco.css?<?=filemtime("stylevasco.css")?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php include 'protect.php';?>
    <a href="listar">Listar</a>
    <a href="cadastroFilme">Cadastrar Filme</a>
    <a href="logout">Sair</a>
</body>
</html>