
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Par</title>
<link href="stylevasco.css?<?=filemtime("stylevasco.css")?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container">
       
    <div class="container">
    <?php
        include 'connection.php';
        include 'nav.php';
        include 'services/excluirfilme.php';
        $thisfilme = new Filme($_SESSION['id_usuario'], "", "", 0);

        $thisfilme->listar($mysqli);
        ?>
    </div>
</body>

</html>