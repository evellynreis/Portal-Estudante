CREATE TABLE Alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(50) UNIQUE,
    telefone VARCHAR(11),
    valor_mensalidade VARCHAR(50),
    senha VARCHAR(100),
    situacao INT,
    observacao VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO Alunos (nome, email, telefone, valor_mensalidade, senha, situacao, observacao)
VALUES ('Justin Bieber', 'justin@gmail.com', '37987036161','', '123456', 1, '');

