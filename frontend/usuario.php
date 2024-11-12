<?php
session_start();    
require "../backend/conexao.php";

$id = $_SESSION["id"];

$selectUsuario = "SELECT * FROM usuario WHERE id = $id";
$resultUsuario = mysqli_query($conexao, $selectUsuario);
$linhaUsuario = mysqli_fetch_assoc($resultUsuario);

$img = $linhaUsuario["img"];

$select = "SELECT * from medalha_usuario WHERE idUsuario = $id";
$result = mysqli_query($conexao, $select);


$medalhas = [];
while($linha = mysqli_fetch_assoc($result)){
    $idMedalha = $linha["idMedalha"]; 
    $selectMedalha = "SELECT * FROM medalha WHERE id = $idMedalha";
    $resultMedalha = mysqli_query($conexao, $selectMedalha);
    $linha = mysqli_fetch_assoc($resultMedalha);

    $medalhas[$linha["nome"]] = $linha["img"];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/usuario.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <header>
        <div class="menu-close">
            <img src="img/logo.png" alt="">
            <span id="botao-menu" class="material-symbols-outlined" onclick="clickMenu()">menu</span>
        </div>
            <nav id="menu" class="nav-list">
                <ol id="menu-open">
                    <li><a class="link" href="home.php">Inicio</a></li>
                    <li><a href="#">Vagas</a></li>
                    <li><a href="#">Cursos</a></li>
                    <li><a href="sobre-nos.html">Sobre Nós</a></li>
                    <li><a href="#">Portal das empresas</a></li>
                </ol>
            </nav>
    </header>
    <div id="container-perfil">
        <img class="img-perfil" src="../backend/usuario/<?=$img?>" alt="foto de perfil">
        <h1 id=""><?= $_SESSION["nome"]?></h1>

    </div>

    <?php
        foreach ($medalhas as $key => $value) {
            ?>
                <img src="../backend/medalha/<?=$value?>" alt="">
                <h2 style="color: white"><?=$key?></h2>
            <?php
        }
    ?>

    <a class="sair" href="../backend/sair.php">Deslogar</a>  
<script>
        function clickMenu () {
            if (menu.style.display == 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
            }
        }
    </script>
</body>
</html>