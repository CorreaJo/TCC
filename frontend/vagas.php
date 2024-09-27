<?php 

session_start();

require "../backend/conexao.php";

$select = "SELECT * from vaga";
$result= mysqli_query($conexao, $select);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            while($linha = mysqli_fetch_assoc($result)){
                ?>
                    <h1><a href="detalhe-vaga.php?id=<?=$linha["id"]?>"><?=$linha["nome"]?></a></h1>
                    <a href="../backend/empresa/Vaga/delete.php?id=<?=$linha["id"]?>">EXCLUIR</a>
                    <a href="../backend/empresa/Vaga/editar-vaga.php?id=<?=$linha["id"]?>">Editar</a>
                <?php
            }
        ?>
    </div>
</body>
</html>