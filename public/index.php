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
Descritivo: Recebe a página e a ação solicitadas e encaminha a requisição
para a tela ou operação correspondente de produtos e categorias.
*******************************************************************************/
$page = isset($_GET["page"]) ? $_GET["page"] : "produtos";
$action = isset($_GET["action"]) ? $_GET["action"] : "index";
$id = isset($_GET["id"]) ? $_GET["id"] : null;

switch ($page) {
    case "produtos":
        switch ($action) {
            case "index":
                include __DIR__ . '/../views/produtos/index_prod.php';
                break;
            case "create":
                include __DIR__ . '/../views/produtos/create_prod.php';
                break;
            case "edit":
                include __DIR__ . '/../views/produtos/edit_prod.php';
                break;
            case "delete":
                include_once __DIR__ . '/../controllers/ProdutoController.php';
                $controller = new ProdutoController();
                if ($controller->delete($id)) {
                    header("Location: /loja_eletronicos/public/index.php?page=produtos");
                    exit();
                } else {
                    echo "<p class=\'error\'>Não foi possível deletar o produto.</p>";
                }
                break;
            default:
                include __DIR__ . '/../views/produtos/index_prod.php';
                break;
        }
        break;
    case "categorias":
        switch ($action) {
            case "index":
                include __DIR__ . '/../views/categorias/index_cat.php';
                break;
            case "create":
                include __DIR__ . '/../views/categorias/create_cat.php';
                break;
            case "edit":
                include __DIR__ . '/../views/categorias/edit_cat.php';
                break;
            case "delete":
                include_once __DIR__ . '/../controllers/CategoriaController.php';
                $controller = new CategoriaController();
                if ($controller->delete($id)) {
                    header("Location: /loja_eletronicos/public/index.php?page=categorias");
                    exit();
                } else {
                    echo "<p class=\'error\'>Não foi possível deletar a categoria.</p>";
                }
                break;
            default:
                include __DIR__ . '/../views/categorias/index_cat.php';
                break;
        }
        break;
    default:
        include __DIR__ . '/../views/produtos/index_prod.php';
        break;
}

?>
