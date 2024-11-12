<?php
session_start();    
require "../backend/conexao.php";


$select = "SELECT * from medalha";
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
    <div>
        <?php
            while($linha = mysqli_fetch_assoc($result)){
                ?>
                    <img src="../backend/medalha/<?=$linha["img"]?>" alt="">
                    <h1><?=$linha["nome"]?></h1>
                    <a href="../backend/medalha/delete.php?id=<?=$linha["id"]?>">Deletar medalha</a>
                <?php
            }
        ?>
    </div>
</body>
</html>