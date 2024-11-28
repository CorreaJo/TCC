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
    <title>CordWork - <?=$linhaCurso['nome']?></title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
    margin: 0px;
    padding: 0px;
    text-decoration: none;
    list-style: none;
    font-family: "Poppins", system-ui;
}

iframe {
    border: 0px;
    width: 100%;
    height: 400px;
    background-color: black;
    margin-top: 30px
}

.container {
    margin-left: 10px;
}

h1 {
    color: white;
}

.title {
    text-align: center;
    margin-bottom: 10px;
    margin-top: 30px
}

p {
    color: white;   
}

.container-extra {
    margin-top: 30px;
    margin-bottom: 20px;
}

.total {
    font-weight: bold;
}

.img-curso {
    width: 300px;
    height: 300px;
    margin: auto;
    display: block;
}

.button-div {
    display: flex;
    justify-content: center;
}

.botton {
    background-color: #539239;
    color: white;
    padding: 10px 40px;
    border-radius: 40px;
    text-align: center;
    font-weight: bold;
}

.link {
    color: white;
    background-c
}

</style>
<body>
<?php require "componente/cabecalho.php"?>
    <?php
    
    if($link != '@'){
        ?>
                <iframe title="YouTube video player" src="https://www.youtube.com/embed/<?=$link?>"></iframe>
        <?php        
    }
        if($index < count($aulas)){
            ?>
            <div class="button-div">
                <a class="botton" href="curso-detalhes.php?id=<?=$id?>&link=<?=$aulas[$index]?>&index=<?=$index+1?>">Próxima aula</a>
            </div>
                <?php
        } else if($index == count($aulas)){
            ?>
            <div class="button-div">
                <a class="botton" href="../frontend/finalizar.php?id=<?=$id?>">Finalizar curso</a>
            </div>
            <?php
        } else if($index == 100){
            ?>
            <div class="container">
                <h1 class="title"><?=$linhaCurso['nome']?></h1>
                <img class="img-curso" src="../backend/curso/<?=$linhaCurso["img"]?>" alt="Capa do curso">
                <div class="container-extra">
                    <p class="total">Total de aulas: <?=$linhaCurso['totAulas']?></p>
                    <p><?=$linhaCurso['descricao']?></p>
                </div>
                <div class="button-div">
                    <a class="botton" href="curso-detalhes.php?id=<?=$id?>&link=<?=$aulas[0]?>&index=1">INICIAR CURSO</a>
                </div>
                
            </div>
                
            <?php
        }

        
    ?>
</body>
</html>