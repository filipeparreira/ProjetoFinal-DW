CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    perfil ENUM('admin', 'editor') DEFAULT 'editor'
);

CREATE TABLE grupos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomegrupo VARCHAR(100) NOT NULL,
    corgrupo VARCHAR(7) NOT NULL,
    situacaogrupo ENUM('ativo', 'inativo') DEFAULT 'ativo'
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    desconto DECIMAL(10,2) DEFAULT 0,
    imagem VARCHAR(255),
    grupo_id INT,
    situacao VARCHAR(10) DEFAULT 'ativo',
    fornecedor VARCHAR(100),
    promocao ENUM('sim', 'nao') DEFAULT 'nao',
    FOREIGN KEY (grupo_id) REFERENCES grupos(id)
);

INSERT INTO usuarios (nome, email, senha, perfil)
VALUES ('admin', 'admin@email.com', '1234', 'editor');

INSERT INTO grupos (nomegrupo, corgrupo, situacaogrupo) VALUES
('Tatuadeiras', '#FF5733', 'ativo'),
('Tintas e Pastas', '#33C3FF', 'ativo'),
('Brincos e Aplicadores', '#9D33FF', 'ativo'),
('Marcadores e Fogareiros', '#33FF57', 'ativo'),
('Diversos', '#FF33B8', 'ativo');
