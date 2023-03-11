<?php
include 'connection.php';
include './models/Filme.php';
include 'protect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['acao'] === "cadastrar") {

    $id_usuario = $mysqli->real_escape_string($_SESSION['id_usuario']);
    $titulo = $mysqli->real_escape_string($_POST['titulo']);
    $diretor = $mysqli->real_escape_string($_POST['diretor']);
    $ano = $mysqli->real_escape_string($_POST['ano']);

    if (strlen($_POST['titulo']) > 0 && strlen($_POST['diretor']) > 0 && strlen($_POST['ano'] > 0)) {
        $filme = new Filme($_SESSION['id_usuario'], $_POST['titulo'], $_POST['diretor'], $_POST['ano']);
        $filme->cadastrar($mysqli);
    }
    else{
        $erro = "Favor preencher todos os campos";
        if (isset($erro)) {
            echo $erro;
        }
    }

}
?>