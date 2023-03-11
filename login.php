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
        <?php include 'services/logar.php'?>
        <h1>Logar-se</h1>
        <form action="<?php echo htmlspecialchars(pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_FILENAME)); ?>" method="POST">
            <input type="hidden" name="acao" value="logar">
            <input type="text" name="email" placeholder="Email">
            <br>
            <br>
            <input type="password" name="senha" placeholder="senha">
            <br><br>
            <input type="submit" value="Logar">
            <br>
            <br>
            <a href="cadastro">Não possuo conta</a>
        </form>
    </div>
</body>

</html>