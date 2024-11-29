<?php
require "../backend/conexao.php";
session_start();

$select = "SELECT * FROM Vaga LIMIT 3";
$result = mysqli_query($conexao, $select);

$selectCurso = "SELECT * FROM curso LIMIT 3";
$resultCurso = mysqli_query($conexao, $selectCurso);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Home</title>
    <link rel="stylesheet" href="styles/home.css">
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

body {
    background-color: black;
}

.menu-close {
    background-color: #642898;
    display: block;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px
}

.menu-close img {
    width: 100px;
}

#botao-menu {
    display: block;
    background-color: #642898;  
    width: 30px;
    cursor: pointer;
    font-size: 40px;
    color: white;
    margin-right: 10px;
}

.nav-list {
    display: none;
    background-color: white;
}

.nav-list ol{
    flex-direction: column;
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 10px;
}

.nav-list a {
    color: black;
    font-family: "Poppins", system-ui;
    font-size: 18px;
}

#row {
    background-color: #462856;
    height: 3px;
}

.title-divs {
    color: white;
    font-size: 25px;
    margin-left: 10px;
    margin-top: 20px;
    margin-bottom: 10px;
}

.barra-title {
    height: 4px;
    width: 60px;
    margin-left: 10px;
    background-color: #539239;
    margin-bottom: 10px;
}

.vagas-container {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-bottom: 20px;
}

.vaga-style {
    background-color: white;
    margin: auto;
    display: block;
    padding: 10px;
    width: 300px;
    border-radius: 10px 0px 10px 0px;
}

.vaga-style .title-vaga {
    color: #000;
    font-size: 20px;
    margin-bottom: 5px;
}

.vaga-style h1 {
    font-size: 16px;
}

.vaga-style .info {
    color: #8A8686;
    font-weight: normal;
}

.vaga-style .periodo {
    margin-bottom: 10px;
    color: black;
    font-style: italic;
}

.vaga-info hr {
    margin-bottom: 10px;
}

.botao-detalhar {
    text-align: center;
    margin: auto;
    display: block;
    color: #642898;
    font-weight: bold;
}

#botao-mais {
    background-color: #539239;
    padding: 10px 40px;
    color: white;
    font-weight: bold;
    border-radius: 50px;
}

#div-botao {
    display: flex;
    justify-content: center;
    margin-top: 20px
}

.img-curso {
    width: 100px;
    height: 100px;
    border-radius: 10px 0px 10px 0px;
}

.cursos-container {
    display: flex;
    margin-left: 10px;
    margin-right: 10px;
    gap: 20px;
    margin-top: 10px;
    margin-bottom: 10px
}

.title {
    color: white;
    font-size: 20px;
}

.desc-curso .desc {
    color: white;
    margin-bottom: 10px;
}

.cursos {
    padding-top: 20px;
    padding-bottom: 20px;
    margin-top: 30px
}

</style>
<body>
    <?php require "componente/cabecalho.php"?>
    <img src="img/banner01.png" alt="banner01">
    <h1 class="title-divs">Vagas</h1>
    <div class="barra-title"></div>
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
    <div id="div-botao">
        <a id="botao-mais" href="vagas.php">VER TODAS</a>
    </div>
    <div class="cursos" style="background-color: #642898;">
    <h1 class="title-divs">Capacitação</h1>
    <div class="barra-title"></div>
    <?php
            while($linha = mysqli_fetch_assoc($resultCurso)){
                ?> 
                <div class="cursos-container">
                    <div>
                        <img class="img-curso" src="../backend/curso/<?=$linha["img"]?>" alt="Capa do curso">
                    </div>
                    <div class="desc-curso">
                    <h1 class="title"><?=$linha["nome"]?></h1>
                        <p class="desc"><?=$linha["descricao"]?></p>
                        <a href="curso-detalhes.php?id=<?=$linha["id"]?>&link=@&index=100" style="background-color: #539239; color: white; padding: 5px 20px; border-radius: 40px; text-align: center; font-weight: bold;">COMEÇAR</a></h1>
                    </div>
                </div>
                <hr style="background-color: black; height: 1px; border: none">
                <?php
            } 
        ?>
    <div id="div-botao">
        <a id="botao-mais" href="curso.php">VER TODOS</a>
    </div>
    </div>

    <?php
    if ($_SESSION['categoria'] == "empresa") {
        ?><div style="margin: 60px 5px 10px 5px">
           <h1 style="font-size: 30px; text-align: center; color: white">ANUNCIE SUA VAGA DE EMPREGO AQUI!</h1>
           <h3 style="font-weight: normal; text-align: center; color: white">Anuncie sua vaga em questão de minutos e sem enrolação.</h3>
           <div id="div-botao">
                <a id="botao-mais" href="../backend/empresa/vaga/cadastro-vaga.php">CRIAR VAGA</a>
           </div>
        </div>
        <?php
    } else {
        ?><div style="margin: 60px 5px 10px 5px">
           <h1 style="font-size: 30px; text-align: center; color: white">CONHEÇA SOBRE A GENTE!</h1>
           <h3 style="font-weight: normal; text-align: center; color: white" >Entenda um pouco mais sobre nosso projeto!.</h3>
           <div id="div-botao">
                <a id="botao-mais" href="sobre-nos.php">SOBRE NÓS</a>
           </div>
        </div>
        <?php
    }

    require "componente/rodape.php"?>
</body>
</html>