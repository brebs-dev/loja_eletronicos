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
Descritivo: Define o título da página, carrega o CSS e exibe o menu
de navegação entre Produtos e Categorias.
*******************************************************************************/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Eletrônicos</title>
    <link rel="stylesheet" href="/loja_eletronicos/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>LOJA DE ELETRÔNICOS</h1>
        <nav>
            <a href="/loja_eletronicos/public/index.php?page=produtos">Produtos</a>
            <a href="/loja_eletronicos/public/index.php?page=categorias">Categorias</a>
        </nav>
        <hr>
