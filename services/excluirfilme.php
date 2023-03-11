<?php
include 'connection.php';
include './models/Filme.php';
include 'protect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if($_REQUEST["acao"] == ""){
        header("Location: listar?acao=listar");
    }
    switch ($_REQUEST["acao"]){
        case 'excluir':
            $id_filme = $_REQUEST['id_filme'];
            $filme = new Filme($_SESSION['id_usuario'], "", "", 0);
            $filme->excluir($mysqli);
            break;
    }
   
}
?>