<?php
include 'connection.php';
class Usuario
{
    private int $id_usuario;
    private string $nome;
    private string $email;
    private string $senha;

    public function __construct($nome, $email, $senha)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function getSenha()
    {
        return $this->senha;
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function cadastrar(mysqli $mysqli)
    {
        $nome = $mysqli->real_escape_string($this->nome);
        $email = $mysqli->real_escape_string($this->email);
        $senha = $mysqli->real_escape_string($this->senha);

        $sqlInsert = $mysqli->prepare("INSERT INTO usuario(nome, email, senha) VALUES (?, ?, ?)");
        $sqlInsert->bind_param("sss", $nome, $email, $senha);
        $sqlInsert->execute();

        $sqlBuscar = $mysqli->prepare("SELECT * FROM usuario WHERE email= ?");
        $sqlBuscar->bind_param("s", $email);
        $sqlBuscar->execute();


        if ($sqlBuscar->execute()) {
            $busca = $sqlBuscar->get_result();
            $usuarioQuery = $busca->fetch_object();
            $this->id_usuario = $usuarioQuery->id_usuario;
            return true;
        }

        return false;


    }

    public function logar(mysqli $mysqli)
    {
        $email = $mysqli->real_escape_string($this->email);
        $senha = $mysqli->real_escape_string($this->senha);

        $sqlBuscar = $mysqli->prepare("SELECT * FROM usuario WHERE email= ? AND senha= ?");
        $sqlBuscar->bind_param("ss", $email, $senha);
        $sqlBuscar->execute();

        $busca = $sqlBuscar->get_result();
        $usuarioQuery = $busca->fetch_object();

        $quantidade = $busca->num_rows;


        if ($quantidade > 0) {
            $this->id_usuario = $usuarioQuery->id_usuario;
            $this->nome = $usuarioQuery->nome;
            return true;
        }

        return false;
    }

}
?>