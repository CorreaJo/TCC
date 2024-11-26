<?php 

session_start();

require "../backend/conexao.php";

$select = "SELECT * from vaga";
$result= mysqli_query($conexao, $select);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Vagas</title>
    <link rel="stylesheet" href="styles/vaga.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<?php require "componente/cabecalho.php"?>
    <div class="pesquisar">
        <form method="POST" action="ver-pesquisa.php">
            <input type="text" id="barra-p" name="pesquisar" placeholder="Pesquisar">
            <button>></button>
        </form>
    </div>
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
    <?php require "componente/rodape.php"?>
</body>
</html>


