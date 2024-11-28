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
            <?php require "componente/cabecalho.php"?>
            <div id="fundo-verde"></div>
            <div id="container-perfil">
                <img class="img-perfil" src="../backend/<?=$_SESSION["img"]?>" alt="foto de perfil">
                <div class="users-info">
                    <h1 id="name"><?=$_SESSION["nome"]?></h1>
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
                <?php
                if($_SESSION["email"] == "admin@admin") {
                ?>
                <a href="../backend/curso/cadastrar-curso.php" style="color: red; margin-left: 5px">Cadastrar curso</a>
                <a href="../backend/curso/cursos-adm.php" style="color: red; margin-left: 5px">Cursos cadastrados</a>
            <?php } require "componente/rodape.php"?> 
        </body>
        <?php
        }   
    }
?>  
</html>