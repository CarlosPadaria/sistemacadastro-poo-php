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
        <?php include 'services/cadastrar.php';?>
        <h1>Cadastro</h1>
        <form action="<?php echo htmlspecialchars(pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_FILENAME)); ?>" method="POST">
            <input type="hidden" name="acao" value="cadastrar">
            <input type="text" placeholder="Nome" name="nome">
            <br><br>
            <input type="text" placeholder="Email" name="email">
            <br><br>
            <input type="password" placeholder="Senha" name="senha">
            <br><br>
            <input type="password" placeholder="Confirmar Senha" name="confirmarSenha">
            <br><br>
            <input value="Cadastrar-se" type="submit">
            <br><br>
            <a href="login">Ja possuo conta</a>
        </form>
    </div>
</body>

</html>