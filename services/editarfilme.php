<?php
include './models/Filme.php';
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "GET" && $_REQUEST['id_filme'] != "") {
    $filme = new Filme($_SESSION['id_usuario'], "", "", 0);
    $id_filme = $_REQUEST['id_filme'];
    $sqlBuscar = $mysqli->prepare("SELECT * FROM filme WHERE id_filme= ?");
    $sqlBuscar->bind_param("i", $id_filme);
    if ($sqlBuscar->execute()) {
        $sqlResultado = $sqlBuscar->get_result();


        while ($row = $sqlResultado->fetch_object()) {
            $titulo = $row->titulo;
            $diretor = $row->diretor;
            $ano = $row->ano;
        }


    }

} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (strlen($_POST['titulo']) == 0 || strlen($_POST['diretor']) == 0 || strlen($_POST['ano']) == 0) {
        echo 'Os campos nao podem estar vazios';
    } else {
        $filme = new Filme($_SESSION['id_usuario'], $_POST['titulo'], $_POST['diretor'], $_POST['ano']);
        if ($filme->editar($mysqli)) {
            header("Location: listar.php");
        } else {
            echo "Erro";
        }

    }

} else {
    echo "ERRO";
}
?>