CREATE DATABASE cordWork;

USE cordWork;

CREATE TABLE Usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    telefone VARCHAR(25) NOT NULL,
    endereco VARCHAR(100) NOT NULL,
    cep VARCHAR(20) NOT NULL,
    cidade VARCHAR (50) NOT NULL,
    img VARCHAR(100) NOT NULL,
    linkedin VARCHAR (100) NULL,
    dNasc VARCHAR(12) NOT NULL,
    pcd VARCHAR(100) NOT NULL,
    escolaridade VARCHAR(100) NOT NULL,
    curriculo VARCHAR(150) NOT NULL
);

CREATE TABLE Empresa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    img VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    cnpj VARCHAR(14) NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    telefone VARCHAR(25) NOT NULL,
    cidade VARCHAR (50) NOT NULL,
    linkedin VARCHAR (100) NULL
);

CREATE TABLE Vaga (
    id INT AUTO_INCREMENT PRIMARY KEY,
    função VARCHAR(100) NOT NULL,
    area VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    periodo VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    salario VARCHAR(50) NOT NULL,
    dataExclusao VARCHAR(12) NOT NULL,
    idEmpresa INT NOT NULL,
    FOREIGN KEY (idEmpresa) REFERENCES Empresa(id)
);


CREATE TABLE Curso (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    img VARCHAR(100) NOT NULL,
    link VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    tot_aulas INT NOT NULL
);

CREATE TABLE Curso_Aula (
    id INT AUTO_INCREMENT PRIMARY KEY,
    link VARCHAR(100) NOT NULL,
    idCurso INT NOT NULL,
    FOREIGN KEY (idCurso) REFERENCES Curso(id)
);


CREATE TABLE inscricao_vaga (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idVaga INT NOT NULL, 
    idUsuario INT NOT NULL,    
    FOREIGN KEY (idVaga) REFERENCES Vaga(id),
    FOREIGN KEY (idUsuario) REFERENCES Usuario(id)
);

CREATE TABLE habilidade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    empresa VARCHAR(100) NOT NULL,
    cargaHoraria VARCHAR(100) NOT NULL,  
    idUsuario INT NOT NULL,    
    FOREIGN KEY (idUsuario) REFERENCES Usuario(id)
);

CREATE TABLE experiencia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    funcao VARCHAR(100) NOT NULL,
    empresa VARCHAR(100) NOT NULL,
    periodo VARCHAR(100) NOT NULL,  
    idUsuario INT NOT NULL,    
    FOREIGN KEY (idUsuario) REFERENCES Usuario(id)
);
