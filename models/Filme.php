<?php 
include 'connection.php';

class Filme{


    private int $id_filme;
    private int $id_usuario;
    private string $titulo;
    private string $diretor;
    private int $ano;

    public function __construct($id_usuario, $titulo, $diretor, $ano){
        $this->id_usuario = $id_usuario;
        $this->titulo = $titulo;
        $this->diretor = $diretor;
        $this->ano = $ano;

    }

    public function getId_filme(){
        return $this->id_filme;
    }
    public function getId_usuario(){
        return $this->id_usuario;
        
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getDiretor(){
        return $this->diretor;
    }
    public function getAno(){
        return $this->ano;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setDiretor($diretor){
        $this->diretor = $diretor;
    }

    public function setAno(){
        return $this->ano;
    }

    public function cadastrar(mysqli $mysqli){
        $id_usuario = $mysqli->real_escape_string($this->id_usuario);
        $titulo = $mysqli->real_escape_string($this->titulo);
        $diretor = $mysqli->real_escape_string($this->diretor);
        $ano = $mysqli->real_escape_string($this->ano);

        $sqlInsert = $mysqli->prepare("INSERT INTO filme(id_usuario, titulo, diretor, ano) VALUES (?, ?, ?, ?)");
        $sqlInsert->bind_param("issi", $id_usuario, $titulo, $diretor, $ano);
         

        if($sqlInsert->execute()){
            $this->id_filme = $sqlInsert->insert_id;
            return true;
        }

        return false;
       


    }
    public function excluir(mysqli $mysqli){
        $id_filme = $_REQUEST['id_filme'];
        
        $sqlExcluir = $mysqli->prepare("DELETE FROM filme WHERE id_filme= ?");
        $sqlExcluir->bind_param("i", $id_filme);

        if($sqlExcluir->execute()){
            return true;
        }
        return false;
    }

    public function editar(mysqli $mysqli){
        $id_filme = $_REQUEST["id_filme"];
        $titulo = $this->titulo;
        $diretor = $this->diretor;
        $ano = $this->ano;
        $sqlBuscar = $mysqli->prepare("UPDATE filme SET titulo= ?, diretor= ?, ano= ? WHERE id_filme= ?");
        $sqlBuscar->bind_param("ssii", $titulo, $diretor, $ano, $id_filme);
        if($sqlBuscar->execute()){
            return true;
            
        }
        return false;
    }

    public function listar(mysqli $mysqli){
        $id_usuario = $_SESSION['id_usuario'];

        $sqlBuscar = $mysqli->prepare("SELECT * FROM filme WHERE id_usuario= ?");
        $sqlBuscar->bind_param("i", $id_usuario);


        if($sqlBuscar->execute()){
            $sqlTempResultado = $sqlBuscar->get_result();
            print "<table class='styled-table'>";
            print "<tr>";
            print "<th>Titulo</th>";
            print "<th>Diretor</th>";
            print "<th>Ano</th>";
            print "<th>Excluir</th>";
            print "<th>Editar</th>";
            print "</tr>";
            while($row = $sqlTempResultado->fetch_object()){
                print "<tr>";
                print "<td>" . $row->titulo . "</td>";
                print "<td>" . $row->diretor . "</td>";
                print "<td>" . $row->ano . "</td>";
                print "<td><button class='btn btn-success' onclick=\"location.href='editar.php?id_filme=".$row->id_filme."';\">Editar</button></td>";
                print "<td><button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='listar?acao=excluir&id_filme=".$row->id_filme."';}else{false;}\">Excluir</button></td>";
                print "</tr>";
            }
            print "</table>"
            ;
            return true;
        }
        return false;

    }
}
?>