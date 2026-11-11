<?php
/******************************************************************************
Curso: Tecnologia em Análise e Desenvolvimento de Sistemas
Disciplina: Linguagem e Técnicas de Programação
Professor: Flores
Turma: ADS2A
Componentes:
    26014141-2 - Brenda Isabela
    26007377-2 - Bruno Santian
    26004109-2 - Gustavo Souza Rosevics
    26009642-2 - Joao Victor de Souza
    26010196-2 - Vitor Leandro
Data: 11 de novembro de 2026
Descritivo: Coordena o cadastro, a listagem, a edição e a exclusão
de categorias e chama o modelo Categoria para acessar o banco.
*******************************************************************************/
include_once '../config/database.php';
include_once '../models/Categoria.php';

class CategoriaController {
    private $conn;
    private $categoria;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->categoria = new Categoria($this->conn);
    }

    public function index() {
        $stmt = $this->categoria->read();
        $num = $stmt->rowCount();
        return ['stmt' => $stmt, 'num' => $num];
    }

    public function create($nome) {
        $this->categoria->nome = $nome;
        if($this->categoria->create()) {
            return true;
        }
        return false;
    }

    public function readOne($id) {
        $this->categoria->id = $id;
        $this->categoria->readOne();
        return $this->categoria;
    }

    public function update($id, $nome) {
        $this->categoria->id = $id;
        $this->categoria->nome = $nome;
        if($this->categoria->update()) {
            return true;
        }
        return false;
    }

    public function delete($id) {
        $this->categoria->id = $id;
        if($this->categoria->delete()) {
            return true;
        }
        return false;
    }
}
?>
