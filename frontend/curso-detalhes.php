<?php
session_start();    
require "../backend/conexao.php";


$id = $_GET["id"];
$link = $_GET["link"];
$index = $_GET["index"];

$selectCurso = "SELECT * from curso WHERE id = $id";
$resultCurso = mysqli_query($conexao, $selectCurso);
$linhaCurso = mysqli_fetch_assoc($resultCurso);

$select = "SELECT * from curso_aula WHERE idCurso = $id";
$result = mysqli_query($conexao, $select);

$aulas = [];
while($linha = mysqli_fetch_assoc($result)){
    $aulas[] = $linha["link"];
}

$nomeMedalha = $linhaCurso["nome"];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/curso-detalhe.css" />
    <title>Curso - <?=$linhaCurso['nome']?></title>
</head>
<body>
<?php require "componente/cabecalho.php"?>
    <?php
        if($index < count($aulas)){
            ?>
                <a href="curso-detalhes.php?id=<?=$id?>&link=<?=$aulas[$index]?>&index=<?=$index+1?>">Próxima aula</a>
            <?php
        } else if($index == count($aulas)){
            ?>
                <a href="../backend/usuario/vinculo-medalha.php?nome=<?=$nomeMedalha?>">Finalizar curso</a>
            <?php
        } else if($index == 100){
            ?>
                <a href="curso-detalhes.php?id=<?=$id?>&link=<?=$aulas[0]?>&index=1">Começar Curso</a>
            <?php
        }

        if($link != '@'){
            ?>
                <div id="player"><iframe src="<?=$link?>" frameborder="0"></iframe></div>
            <?php        
        }
    ?>
    
    <?php require "componente/rodape.php"?>
</body>
</html>