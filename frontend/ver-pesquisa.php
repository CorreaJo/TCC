<?php 
    require "../backend/conexao.php";

        $pesquisar = $_POST['pesquisar'];

        $result = "SELECT * FROM vaga WHERE função LIKE '%$pesquisar%'";
        $resultado = mysqli_query($conexao, $result);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Pesquisar Vaga</title>
    <link rel="stylesheet" href="styles/vaga.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<?php require "componente/cabecalho.php"?>
    <div class="vagas-container">
    <?php
        while($linha = mysqli_fetch_assoc($resultado)) {

            $idEmpresa = $linha['idEmpresa'];
            $selectEmpresa = "SELECT * from empresa WHERE id = $idEmpresa";
            $resultEmpresa = mysqli_query($conexao, $selectEmpresa);
            $linhaEmpresa = mysqli_fetch_assoc($resultEmpresa)

            ?> <div class="vaga-style">
                    <h1 class="title-vaga"><?=$linha["função"]?></h1>
                    <hr>
                    <h1 class="info"><?=$linhaEmpresa["nome"]?></h1>
                    <h1 class="info"><?=$linha["cidade"]?></h1>
                    <h1 class="info periodo"><?=$linha["periodo"]?></h1>
                    <a class="botao-detalhar" href="detalhe-vaga.php?id=<?=$linha['id']?>">VER DETALHES ></a>
                </div> 
        <?php }
        ?> 
</div>
<a class="voltar" href="vagas.php">Voltar para todas as vagas</a>
<?php require "componente/rodape.php"?>
</body>
</html>
