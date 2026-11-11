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
Descritivo: Cria o banco da loja de eletrônicos, define o relacionamento
entre categorias e produtos e cadastra dados de exemplo.
*******************************************************************************/

CREATE DATABASE IF NOT EXISTS loja_eletronicos
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE loja_eletronicos;

-- Cada categoria tem um nome único.
CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL UNIQUE,
    descricao VARCHAR(255)
) ENGINE=InnoDB;

-- Cada produto pertence a uma categoria cadastrada.
CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    estoque INT UNSIGNED NOT NULL DEFAULT 0,
    categoria_id INT NOT NULL,
    CONSTRAINT fk_produtos_categorias
        FOREIGN KEY (categoria_id) REFERENCES categorias(id)
        ON DELETE RESTRICT
) ENGINE=InnoDB;

-- Categorias de exemplo.
INSERT INTO categorias (nome) VALUES
    ('Áudio e Som'),
    ('Informática'),
    ('Acessórios')
ON DUPLICATE KEY UPDATE nome = VALUES(nome);

-- Busca o ID da categoria pelo nome e insere cada exemplo uma vez.
INSERT INTO produtos (nome, descricao, preco, categoria_id)
SELECT 'Fone Bluetooth', 'Fone sem fio com microfone', 129.90, id
FROM categorias
WHERE nome = 'Áudio e Som'
    AND NOT EXISTS (
        SELECT 1 FROM produtos WHERE nome = 'Fone Bluetooth'
    );

INSERT INTO produtos (nome, descricao, preco, categoria_id)
SELECT 'Caixa de Som Bluetooth', 'Caixa portátil com bateria recarregável', 189.90, id
FROM categorias
WHERE nome = 'Áudio e Som'
    AND NOT EXISTS (
        SELECT 1 FROM produtos WHERE nome = 'Caixa de Som Bluetooth'
    );

INSERT INTO produtos (nome, descricao, preco, categoria_id)
SELECT 'Mouse sem Fio', 'Mouse com receptor USB', 69.90, id
FROM categorias
WHERE nome = 'Informática'
    AND NOT EXISTS (
        SELECT 1 FROM produtos WHERE nome = 'Mouse sem Fio'
    );

INSERT INTO produtos (nome, descricao, preco, categoria_id)
SELECT 'Carregador USB-C', 'Carregador de tomada de 20 W', 79.90, id
FROM categorias
WHERE nome = 'Acessórios'
    AND NOT EXISTS (
        SELECT 1 FROM produtos WHERE nome = 'Carregador USB-C'
    );