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
de produtos e chama o modelo Produto para acessar o banco de dados.
*******************************************************************************/
include_once '../config/database.php';
include_once '../models/Produto.php';
include_once '../models/Categoria.php';

class ProdutoController {
    private $conn;
    private $produto;
    private $categoria;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->produto = new Produto($this->conn);
        $this->categoria = new Categoria($this->conn);
    }

    public function index() {
        $stmt = $this->produto->read();
        $num = $stmt->rowCount();
        return ['stmt' => $stmt, 'num' => $num];
    }

    public function create($nome, $descricao, $preco, $categoria_id) {
        $this->produto->nome = $nome;
        $this->produto->descricao = $descricao;
        $this->produto->preco = $preco;
        $this->produto->categoria_id = $categoria_id;
        if($this->produto->create()) {
            return true;
        }
        return false;
    }

    public function readOne($id) {
        $this->produto->id = $id;
        $this->produto->readOne();
        return $this->produto;
    }

    public function update($id, $nome, $descricao, $preco, $categoria_id) {
        $this->produto->id = $id;
        $this->produto->nome = $nome;
        $this->produto->descricao = $descricao;
        $this->produto->preco = $preco;
        $this->produto->categoria_id = $categoria_id;
        if($this->produto->update()) {
            return true;
        }
        return false;
    }

    public function delete($id) {
        $this->produto->id = $id;
        if($this->produto->delete()) {
            return true;
        }
        return false;
    }

    public function getCategorias() {
        $stmt = $this->categoria->read();
        return $stmt;
    }
}
?>
