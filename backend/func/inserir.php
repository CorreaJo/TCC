<?php


function inserirUsuario(Usuario $usuario) {
    $insert = "INSERT INTO users (nome, cpf, email, password) VALUES ($usuario->nome, $usuario->cpf, $usuario->email, $usuario->senha)";
    return $insert;
}

function inserirEmpresa(Empresa $empresa) {
    $insert = "INSERT INTO empresa (nome, cnpj, email, password) VALUES ($empresa->nome, $empresa->cnpj, $empresa->email, $empresa->senha)";
    return $insert;
}

?>