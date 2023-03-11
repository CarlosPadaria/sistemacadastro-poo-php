<?php
include 'connection.php';
include './models/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['acao'] === "logar") {

    $usuario = new Usuario('', $_POST['email'], $_POST['senha']);
    if($usuario->logar($mysqli)){
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['id_usuario'] = $usuario->getId_usuario();
        $_SESSION['nome'] = $usuario->getNome();
        header("Location: listar");
    }
    else{
        $erro = 'Usuário não encontrado';
        if (isset($erro)) {
            echo $erro;
        }
    }
    

}
?>