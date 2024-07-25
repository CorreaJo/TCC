<?php

require_once 'models/usuario.php';
require_once 'func/inserir.php';

$user = new Usuario;



$user->nome = 'joao';
$user->cpf = 'joao';
$user->email = 'joao';
$user->senha = 'joao';

echo(inserirUsuario($user));

?>