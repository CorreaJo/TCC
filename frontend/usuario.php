<?php
session_start();    
require "../backend/conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Perfil</title>
</head>
<body>

<h1><?= $_SESSION["nome"]?></h1>


</body>
</html>