-- Criação da base de dados, se ainda não existir
CREATE DATABASE IF NOT EXISTS ministerio_casais;

-- Seleção da base de dados
USE ministerio_casais;

-- Cria a tabela se não existir
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    estado_civil ENUM('Casado', 'Solteiro') NOT NULL default 'Solteiro',
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    endereco VARCHAR(255) NOT NULL,
    receber_informacoes TINYINT(1) NOT NULL DEFAULT 0,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    nome_conjuge VARCHAR(255),
    foto VARCHAR(255),
	tipo ENUM('admin', 'usuario') DEFAULT 'usuario',
    ativo TINYINT(1) NOT NULL DEFAULT 1,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserção de um usuário admin para testes
INSERT INTO usuarios (nome, email, usuario, senha, tipo) VALUES
('Administrador','admin@ministeriocasais.com', 'admin', PASSWORD('admin123'), 'admin'),
('Usuario Comum','user@ministeriocasais.com', 'user', PASSWORD('user123'),'usuario');

select * from usuarios;

CREATE TABLE depoimentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id int,
    depoimento TEXT NOT NULL,
    data_inclusao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ativo TINYINT(1) NOT NULL DEFAULT 1,
    constraint fk_usuario_id foreign key(usuario_id) references usuarios(id)
);

select * from depoimentos;

CREATE TABLE fotos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nomearquivo VARCHAR(255),
    caminho VARCHAR(255),
    tipo VARCHAR(255),
    tamanho INT,
    data_upload DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE videos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nomearquivo VARCHAR(255),
    caminho VARCHAR(255),
    tipo VARCHAR(255),
    tamanho INT ,
    data_upload DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE audios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nomearquivo VARCHAR(255),
    caminho VARCHAR(255),
    tipo VARCHAR(255),
    tamanho INT,
    data_upload DATETIME DEFAULT CURRENT_TIMESTAMP
);

select * from fotos;
select * from videos;
select * from audios;

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255),
    nome_usuario varchar(255),
    estado_civil enum('Selecione uma opção','Casado(a)', 'Solteriro(a)' , 'Viuvo(a)') default "Selecione uma opção",
    nome_conjuge varchar(255),
    telefone varchar(15),
    email varchar(255),
    rua varchar(255),
    bairro varchar(255),
    cidade varchar(255),
    estado varchar(5),
    cep varchar(10),
    fotoUsuario varchar(255),
    receber_informacoes tinyint(1),
    tipo enum('admin', 'usuario'),
    ativo tinyint(1),
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP
);

create table depoimentos (
id int primary key auto_increment,
nome_usuario int,
depoimento text,
data_inclusao datetime default current_timestamp,
ativo tinyint(1)
);

