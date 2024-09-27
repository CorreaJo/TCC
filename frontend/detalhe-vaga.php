<?php
session_start();    
require "../backend/conexao.php";


$id = $_GET["id"];

$select = "SELECT * from vaga WHERE id = $id";
$result= mysqli_query($conexao, $select);

$linha = mysqli_fetch_assoc($result)

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Perfil</title>
</head>
<body>

<h1><?=$linha["nome"]?></h1>

</body>
</html>