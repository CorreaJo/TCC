<?php
session_start();    
require "../backend/conexao.php";

$idUser = $_SESSION['id'];
$select = "SELECT * from vaga WHERE idEmpresa = $idUser";
$result= mysqli_query($conexao, $select);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/empresa.css">
    <title>CORDWORK - Perfil</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<?php
    // verificação caso n tenha logado
    if (empty($_SESSION['email'])) {
            ?> <h1 id="h1-error">Voce nao tem permissão!</h1>
                <a id="a-error" href="index.php">Iniciar login!</a><?php
    } else {
        if ($_SESSION['categoria'] == 'usuario') {
            ?> <h1 id="h1-error">Voce nao tem permissão!</h1>
                <a id="a-error" href="home.php">Voltar para a página inicial!</a><?php
        } else {
            ?>
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
                        </ol>
                    </nav>
            </header>
            <div id="fundo-verde"></div>
            <div id="container-perfil">
                <img class="img-perfil" src="img/perfil.png" alt="foto de perfil">
                <div class="users-info">
                    <h1 id="name"><?= $_SESSION["nome"]?></h1>
                </div>   
            </div>
                <div>
                    <h1 class="title-divs">Informações Pessoais</h1>
                    <div class="barra-title"></div>
                    <div class="infos-div">
                    <p><strong>Email:</strong> <?= $_SESSION["email"]?></p>
                    <p><strong>CNPJ:</strong> <?= $_SESSION["cnpj"]?></p>
                    <p><strong>Contato:</strong> <?= $_SESSION["telefone"]?></p>
                    <p><strong>Linkedin:</strong> <?= $_SESSION["linkedin"]?></p>
                    <p><strong>Cidade:</strong> <?= $_SESSION["cidade"]?></p>  
                </div>
                <a class="botao-editar" href="../backend/empresa/editar-empresa.php">Editar</a>
            </div>
            <div>
                <h1 class="title-divs">Minhas Vagas</h1>
                <div class="barra-title"></div>
                    <div class="botao-add">
                        <a href="../backend/empresa/vaga/cadastro-vaga.php">NOVA VAGA</a>
                    </div>
                    <div class="vagas-container">
                            <?php
                            // vagas cadastradas na empresa
                            while($linha = mysqli_fetch_assoc($result)){
                            ?>
                            <div class="vaga-style">
                                <h1 class="title-vaga"><?=$linha["função"]?></h1>
                                <hr>
                                <h1 class="info"><?=$linha["area"]?></h1>
                                <h1 class="info"><?=$linha["cidade"]?></h1>
                                <h1 class="info periodo"><?=$linha["periodo"]?></h1>
                                <a class="botao-detalhar" href="detalhe-vaga.php?id=<?=$linha['id']?>">VER DETALHES ></a>
                                </div>
                                <?php } ?>
                    </div>
                </div>
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
        <?php
        }   
    }
?>  
</html>