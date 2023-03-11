<?php
include 'connection.php';
include './models/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $cadastroInvalido = false;
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    $confirmarSenha = $mysqli->real_escape_string($_POST['confirmarSenha']);

    $usuario = new Usuario($nome, $email, $senha);

    if (strlen($_POST['email']) == 0 || strlen($_POST['senha']) == 0 || strlen($_POST['email']) == 0) {
        $erro = 'Os campos não podem estar vázios!';
        $cadastroInvalido = true;
        if (isset($erro)) {
            echo $erro;
        }
    } else if ($confirmarSenha != $senha) {
        $erro = 'As senhas precisam ser idênticas!';
        $cadastroInvalido = true;
        if (isset($erro)) {
            echo $erro;
        }
    }

    //   echo $_POST['acao'];
    if ($_POST['acao'] === "cadastrar" && $cadastroInvalido == false) {

        if ($usuario->cadastrar($mysqli)) {
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id_usuario'] = $usuario->getId_usuario();
            $_SESSION['nome'] = $usuario->getNome();
            
            header('Location: listar');
        } else {

            $erro = 'Falha ao cadastrar!';
            if (isset($erro)) {
                echo $erro;
            }

        }

    }
}





?>