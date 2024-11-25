<?php
session_start();    
require "../backend/conexao.php";


$select = "SELECT * from curso";
$result= mysqli_query($conexao, $select);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
</head>
<body>
<?php require "componente/cabecalho.php"?>
    <div>
        <?php
            while($linha = mysqli_fetch_assoc($result)){
                ?>
                    <img src="../backend/curso/<?=$linha["img"]?>" alt="">
                    <h1><a href="curso-detalhes.php?id=<?=$linha["id"]?>&link=@&index=100"><?=$linha["nome"]?></a></h1>
                    <a href="../backend/curso/cadastrar-aula.php?id=<?=$linha["id"]?>">Cadastrar Aula</a>
                <?php
            }
        ?>
    </div>
    <?php require "componente/rodape.php"?>
</body>
</html>