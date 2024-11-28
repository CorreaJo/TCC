<?php
session_start();    
require "../backend/conexao.php";


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
<?php require "componente/cabecalho.php"?>
<div class="pesquisar">
        <form method="POST" action="pesquisa-curso.php">
            <input type="text" id="barra-p" name="pesquisar" placeholder="Pesquisar">
            <button>></button>
        </form>
    </div>
    <div class="cursos">
        <?php
            while($linha = mysqli_fetch_assoc($result)){
                ?>
            
                <div class="cursos-container">
                    <div>
                        <img class="img-curso" src="../backend/curso/<?=$linha["img"]?>" alt="Capa do curso">
                    </div>
                    <div class="desc-curso">
                    <h1 class="title"><?=$linha["nome"]?></h1>
                        <p class="desc"><?=$linha["descricao"]?></p>
                        <a href="curso-detalhes.php?id=<?=$linha["id"]?>&link=@&index=100" style="background-color: #539239; margin-top: 10px; color: white; padding: 5px 20px; border-radius: 40px; text-align: center; font-weight: bold;">COMEÇAR</a></h1>
                    </div>
                </div>
                <?php
            }
        ?> 
    </div>
    <?php require "componente/rodape.php"?>
</body>
</html>