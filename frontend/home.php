<?php
require "../backend/conexao.php";
session_start();


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
<body>
    <header>
        <div class="menu-close">
            <img src="img/logo.png" alt="">
            <span id="botao-menu" class="material-symbols-outlined" onclick="clickMenu()">menu</span>
        </div>
            <nav id="menu" class="nav-list">
                <ol id="menu-open">
                <?php
                    if(empty($_SESSION["email"]) ) {
                        ?><li><a class="link" href="index.php">Login</a></li><?php
                    } else {
                        ?><li><a class="link" href="usuario.php">Portal do Candidato</a></li><?php
                    }?>
                    <li><a href="vagas.php">Vagas</a></li>
                    <li><a href="#">Cursos</a></li>
                    <li><a href="sobre-nos.html">Sobre Nós</a></li>
                    <li><a href="empresa.php">Portal das empresas</a></li>
                    <li><a href="../backend/curso/cadastrar-curso.php">cadastrar curso</a></li>
                    <li><a href="../backend/medalha/cadastrar-medalha.php">cadastrar medalha</a></li>
                    <li><a href="curso.php">Curso</a></li>
                    <li><a href="medalha.php">medalhas</a></li>
                </ol>
            </nav>
    </header>
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