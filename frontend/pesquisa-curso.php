<?php 
    require "../backend/conexao.php";

        $pesquisar = $_POST['pesquisar'];

        $result = "SELECT * FROM curso WHERE nome LIKE '%$pesquisar%'";
        $resultado = mysqli_query($conexao, $result);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Pesquisar Curso</title>
    <link rel="stylesheet" href="styles/cursos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<?php require "componente/cabecalho.php"?>
<div class="cursos">
        <?php
            while($linha = mysqli_fetch_assoc($resultado)){
                ?>
                <div class="cursos-container">
                    <div>
                        <img class="img-curso" src="../backend/curso/<?=$linha["img"]?>" alt="Capa do curso">
                    </div>
                    <div class="desc-curso">
                        <h1 class="title"><a href="curso-detalhes.php?id=<?=$linha["id"]?>&link=@&index=100"><?=$linha["nome"]?></a></h1>
                        <p class="desc"><?=$linha["descricao"]?></p>
                    </div>
                </div>
                <?php
            }
        ?> 
    </div>
<a class="voltar" href="curso.php">Voltar para todas as vagas</a>
<?php require "componente/rodape.php"?>
</body>
</html>
