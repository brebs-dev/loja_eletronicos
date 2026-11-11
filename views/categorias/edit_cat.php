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
Descritivo: Exibe o formulário com o nome atual da categoria e envia a alteração ao controlador.
*******************************************************************************/
include_once __DIR__ . '/../../controllers/CategoriaController.php';

$controller = new CategoriaController();

$id = isset($_GET['id']) ? $_GET['id'] : die('ID da categoria não fornecido.');

$categoria = $controller->readOne($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    if ($controller->update($id, $nome)) {
        header('Location: /loja_eletronicos/public/index.php?page=categorias');
        exit();
    } else {
        echo "<p class='error'>Não foi possível atualizar a categoria.</p>";
    }
}

include __DIR__ . '/../../views/includes/header.php';
?>

<h2>Editar Categoria</h2>

<form action="/loja_eletronicos/public/index.php?page=categorias&action=edit&id=<?php echo $id; ?>" method="POST">
    <label for="nome">Nome da Categoria:</label>
    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($categoria->nome, ENT_QUOTES); ?>" required>
    <button type="submit" class="button">Salvar</button>
    <a href="/loja_eletronicos/public/index.php?page=categorias" class="button">Cancelar</a>
</form>

<?php include __DIR__ . '/../../views/includes/footer.php'; ?>
