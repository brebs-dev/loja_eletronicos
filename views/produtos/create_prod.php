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
Descritivo: Exibe o formulário de cadastro de produtos e encaminha
o nome, a descrição, o preço e a categoria ao controlador.
*******************************************************************************/
include_once __DIR__ . '/../../controllers/ProdutoController.php';

$controller = new ProdutoController();
$categorias_stmt = $controller->getCategorias();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $categoria_id = $_POST['categoria_id'];

    if ($controller->create($nome, $descricao, $preco, $categoria_id)) {
        header('Location: /loja_eletronicos/public/index.php?page=produtos');
        exit();
    } else {
        echo "<p class='error'>Não foi possível criar o produto.</p>";
    }
}

include __DIR__ . '/../../views/includes/header.php';
?>

<h2>Criar Produto</h2>

<form action="/loja_eletronicos/public/index.php?page=produtos&action=create" method="POST">
    <label for="nome">Nome do Produto:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="descricao">Descrição:</label>
    <textarea id="descricao" name="descricao"></textarea>

    <label for="preco">Preço:</label>
    <input type="number" id="preco" name="preco" step="0.01" required>

    <label for="categoria_id">Categoria:</label>
    <select id="categoria_id" name="categoria_id" required>
        <?php
        while ($categoria = $categorias_stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value=\"" . $categoria['id'] . "\">" . $categoria['nome'] . "</option>";
        }
        ?>
    </select>

    <button type="submit" class="button">Salvar</button>
    <a href="/loja_eletronicos/public/index.php?page=produtos" class="button">Cancelar</a>
</form>

<?php include __DIR__ . '/../../views/includes/footer.php'; ?>
