<?php
session_start();    
require "../../backend/conexao.php";


$select = "SELECT * from curso";
$result= mysqli_query($conexao, $select);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CordWork - Cursos</title>
    <link rel="stylesheet" href="styles/cursos.css">
</head>
<body>
    <?php

while($linha = mysqli_fetch_assoc($result)){
    ?>
    <div>
        <img style="width: 100px" src="../../backend/curso/<?=$linha["img"]?>" alt="Capa do curso">
    </div>
    <div class="desc-curso">
        <h1 class="title"><a href="curso-detalhes.php?id=<?=$linha["id"]?>&link=@&index=100"><?=$linha["nome"]?></a></h1>
        <p class="desc"><?=$linha["descricao"]?></p>
    </div>
    <?php
    if($_SESSION["email"] == "admin@admin") {
        ?>
        <a href="../../backend/curso/cadastrar-aula.php?id=<?=$linha["id"]?>">Cadastrar Aula</a>
    <?php
    }
}
?>  