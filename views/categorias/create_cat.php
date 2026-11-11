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
Descritivo: Exibe o formulário de cadastro e envia o nome da nova categoria ao controlador.
*******************************************************************************/
include_once __DIR__ . '/../../controllers/CategoriaController.php';

$controller = new CategoriaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    if ($controller->create($nome)) {
        header('Location: /loja_eletronicos/public/index.php?page=categorias');
        exit();
    } else {
        echo "<p class='error'>Não foi possível criar a categoria.</p>";
    }
}

include __DIR__ . '/../../views/includes/header.php';
?>

<h2>Criar Categoria</h2>

<form action="/loja_eletronicos/public/index.php?page=categorias&action=create" method="POST">
    <label for="nome">Nome da Categoria:</label>
    <input type="text" id="nome" name="nome" required>
    <button type="submit" class="button">Salvar</button>
    <a href="/loja_eletronicos/public/index.php?page=categorias" class="button">Cancelar</a>
</form>

<?php include __DIR__ . '/../../views/includes/footer.php'; ?>
