CREATE DATABASE cordWork;

USE cordWork;

CREATE TABLE Usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    telefone VARCHAR(25) NOT NULL,
    rua VARCHAR(100) NOT NULL,
    cep VARCHAR(20) NOT NULL,
    numCasa VARCHAR (5) NOT NULL,
    cidade VARCHAR (50) NOT NULL,
    linkedin VARCHAR (100) NULL,
    dNasc VARCHAR(8) NOT NULL
);

CREATE TABLE Empresa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL,
    cnpj VARCHAR(14) NOT NULL,
    telefone VARCHAR(25) NOT NULL,
    cidade VARCHAR (50) NOT NULL,
    linkedin VARCHAR (100) NULL,
);