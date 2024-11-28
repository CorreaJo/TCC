<?php
session_start();
require "../backend/conexao.php";

$id = $_GET["id"];

$selectCurso = "SELECT * from curso WHERE id = $id";
$resultCurso = mysqli_query($conexao, $selectCurso);
$linhaCurso = mysqli_fetch_assoc($resultCurso);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Finalizar curso</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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

    h1 {
        color: white;
        text-align: center;
        margin-top: 30px;
        font-size: 20px;
    }

    .button-div {
        display: flex;
        justify-content: center;
        margin-top: 20px
    }

    .link-click {
        background-color: #539239;
        color: white;
        padding: 10px 40px;
        border-radius: 40px;
        text-align: center;
        font-weight: bold;
    }

    .img-formando {
        width: 130px;
        margin: auto;
        display: block;
        margin-top: 30px;
    }

</style>
<body>
<?php require "componente/cabecalho.php"?>
    <img class="img-formando" src="img/formando.png" alt="formando">
    <h1>Para continuar esse curso e receber seu certificado.</h1>
    <div class="button-div">
        <a class="link-click" href="<?=$linhaCurso['link']?>" target="_blank">Clique aqui!</a>
    </div>
<?php require "componente/rodape.php"?>
</body>
</html>