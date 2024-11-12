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
                        if($_SESSION["categoria"] == "usuario") {
                            ?><li><a class="link" href="usuario.php">Portal do Candidato</a></li><?php
                        } else {
                            ?><li><a class="link" href="empresa.php">Portal da Empresa</a></li><?php
                        }
                    }?>
                    <li><a href="vagas.php">Vagas</a></li>
                    <li><a href="#">Cursos</a></li>
                    <li><a href="sobre-nos.html">Sobre Nós</a></li>
                </ol>
            </nav>
    </header>
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
