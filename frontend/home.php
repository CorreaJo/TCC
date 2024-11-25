<?php
require "../backend/conexao.php";
session_start();

$select = "SELECT * FROM Vaga LIMIT 3";
$result = mysqli_query($conexao, $select);

$selectCurso = "SELECT * FROM curso LIMIT 3";
$resultCurso = mysqli_query($conexao, $selectCurso);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Home</title>
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="styles/vaga.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <?php require "componente/cabecalho.php"?>
    <div class="vagas-container">
        <?php
            while($linha = mysqli_fetch_assoc($result)){
                // while para listar vagas
                $idEmpresa = $linha['idEmpresa'];
                $selectEmpresa = "SELECT * from empresa WHERE id = $idEmpresa";
                $resultEmpresa = mysqli_query($conexao, $selectEmpresa);
                $linhaEmpresa = mysqli_fetch_assoc($resultEmpresa)
                ?> 
                <div class="vaga-style">
                    <h1 class="title-vaga"><?=$linha["função"]?></h1>
                    <hr>
                    <h1 class="info"><?=$linhaEmpresa["nome"]?></h1>
                    <h1 class="info"><?=$linha["cidade"]?></h1>
                    <h1 class="info periodo"><?=$linha["periodo"]?></h1>
                    <a class="botao-detalhar" href="detalhe-vaga.php?id=<?=$linha['id']?>">VER DETALHES ></a>
                </div>
                <?php 
            } 
        ?>
    </div>
    <div class="cursos-container">
    <?php
            while($linha = mysqli_fetch_assoc($resultCurso)){
                ?> 
                <div class="curso-style">
                    <h1 class="title-vaga"><?=$linha["nome"]?></h1>
                </div>
                <?php 
            } 
        ?>
    </div>
    <?php require "componente/rodape.php"?>
</body>
</html>