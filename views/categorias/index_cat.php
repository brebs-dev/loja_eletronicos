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
Descritivo: Exibe a lista de categorias e os links para cadastrar, editar e excluir.
*******************************************************************************/
include_once __DIR__ . '/../../controllers/CategoriaController.php';

$controller = new CategoriaController();
$data = $controller->index();
$stmt = $data['stmt'];
$num = $data['num'];

include __DIR__ . '/../../views/includes/header.php';
?>

<h2>Categorias</h2>

<a href="/loja_eletronicos/public/index.php?page=categorias&action=create" class="button">Criar Nova Categoria</a>

<?php
if($num > 0){
    echo "<table>";
        echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nome</th>";
            echo "<th>Ações</th>";
        echo "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$nome}</td>";
            echo "<td>";
                echo "<a href=\"/loja_eletronicos/public/index.php?page=categorias&action=edit&id={$id}\" class=\"button edit\">Editar</a>";
                echo "<a href=\"/loja_eletronicos/public/index.php?page=categorias&action=delete&id={$id}\" class=\"button delete\">Deletar</a>";
            echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Nenhuma categoria encontrada.</p>";
}
?>

<?php include __DIR__ . '/../../views/includes/footer.php'; ?>
