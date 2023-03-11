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
        $titulo = "";
        $diretor = "";
        $ano = "";
        include './services/editarfilme.php';
        ?>
        <h1>Editar Filme</h1>
    <form action="" method="POST">
        <label>Titulo</label>
        <br>
        <?php 
        echo "<input type='text' value='$titulo' name='titulo'>";
        ?>
        <br><br>
        <label>Diretor</label>
        <br><br>
        <?php 
        echo "<input type='text' value='$diretor' name='diretor'>";
        ?>
        <br><br>
        <label>Ano</label>
        <br><br>
        <?php 
        echo "<input type='number' value='$ano' name='ano'>";
        ?>
        <br><br>
        <input type="submit">
    </form>
    </div>
</body>
</html>