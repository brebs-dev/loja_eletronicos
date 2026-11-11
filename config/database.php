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
Descritivo: Configura a conexão do sistema com o banco de dados
loja_eletronicos usando PDO.
*******************************************************************************/
class Database {
    private $host = "localhost";
    private $db_name = "loja_eletronicos";
    private $username = "root";
    private $password = ""; // No XAMPP, a senha padrão do root é vazia
    public $conn;

    public function getConnection(){
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Erro de conexão: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

?>
