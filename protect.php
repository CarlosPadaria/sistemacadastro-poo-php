<?php 
if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id_usuario'])){
    die('Você não pode acessar esta página pois não está logado. <p><a href="index">Voltar</a></p>');
}
?>