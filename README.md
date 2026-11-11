# Loja de Eletrônicos

Projeto da disciplina de Linguagem e Técnicas de Programação, turma ADS2A,
do professor Flores.

O sistema foi desenvolvido em PHP e MySQL a partir do CRUD da Parte 1.
Ele permite cadastrar, listar, editar e excluir produtos e categorias.
Cada produto é vinculado a uma categoria cadastrada.

## Como executar no XAMPP

1. Baixe o projeto pelo GitHub e extraia os arquivos, se estiverem em um ZIP.
2. Coloque a pasta do projeto em `C:\xampp\htdocs\loja_eletronicos`.
   Confira se `database.sql` e a pasta `public` estão diretamente dentro dela.
3. No painel do XAMPP, inicie o Apache e o MySQL.
4. Abra o [phpMyAdmin](http://localhost/phpmyadmin/).
5. Na aba **Importar**, selecione o arquivo `database.sql` e confirme.
   O script cria o banco `loja_eletronicos`, as tabelas `categorias` e
   `produtos` e insere os dados de exemplo.
6. Abra a [Loja de Eletrônicos](http://localhost/loja_eletronicos/public/)
   no navegador.

A conexão com o MySQL fica em `config/database.php`. A configuração do
projeto usa `localhost`, usuário `root` e senha vazia. Se o seu MySQL
usar outras credenciais, ajuste esse arquivo.

## Como testar

Após a primeira importação, a tela de **Produtos** exibe quatro exemplos:
Fone Bluetooth, Caixa de Som Bluetooth, Mouse sem Fio e Carregador USB-C.

Para testar o cadastro, crie uma categoria chamada **Monitores** e cadastre
um produto chamado **Monitor LED** vinculado a ela. Edite o preço do produto
e confira o novo valor na lista. Depois, renomeie a categoria para
**Monitores e Telas** e confira se o nome atualizado aparece na lista de
produtos.

Para testar a exclusão, exclua primeiro o **Monitor LED** e depois a categoria
**Monitores e Telas**. O banco impede a exclusão de uma categoria enquanto
houver produtos vinculados a ela.

## Organização do projeto

| Caminho | Função |
| --- | --- |
| `config/` | Configuração da conexão com o MySQL |
| `controllers/` | Controle das operações de produtos e categorias |
| `models/` | Consultas e alterações no banco de dados |
| `views/` | Listagens, formulários, cabeçalho e rodapé |
| `public/` | Arquivo de entrada do sistema e folha de estilos |
| `database.sql` | Criação do banco e das tabelas e inserção dos dados de exemplo |

## Integrantes

- 26014141-2 — Brenda Isabela
- 26007377-2 — Bruno Santian
- 26004109-2 — Gustavo Souza Rosevics
- 26009642-2 — Joao Victor de Souza
- 26010196-2 — Vitor Leandro