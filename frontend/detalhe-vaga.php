<?php
session_start();
require "../backend/conexao.php";

$id = $_GET["id"];

$select = "SELECT * from vaga WHERE id = $id";
$result= mysqli_query($conexao, $select);
$linha = mysqli_fetch_assoc($result);

$idEmpresa = $linha['idEmpresa'];

$selectEmpresa = "SELECT * from Empresa WHERE id = $idEmpresa";
$resultEmpresa = mysqli_query($conexao, $selectEmpresa);
$linhaEmpresa = mysqli_fetch_assoc($resultEmpresa)
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Home</title>
    <link rel="stylesheet" href="styles/detalhe-vaga.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<?php require "componente/cabecalho.php"?>
    <div class="info-div">
        <h1 class="title"><?=$linha["função"]?></h1>
        <div class="info-container">
            <div>
                <img class="img-perfil" src="../backend/<?=$linhaEmpresa['img']?>" alt="foto de perfil">
            </div>
            <div>
                <h3 class="info"><?=$linhaEmpresa["nome"]?></h3>
                <h3 class="info"><?=$linha["cidade"]?></h3>
            </div>
        </div>

    </div>
    <div class="descricao">
        <h2>Descrição</h2>
        <div class="barra-title"></div>
        <h3 id="desc-text" class="info"><?=$linha["descricao"]?></h3>  
    </div>
    <?php
        // se usuario
        if($_SESSION["categoria"] == "usuario") {
            $idUsuario = $_SESSION['id'];
            $selectInscricao = "SELECT * from inscricao_vaga WHERE idUsuario = $idUsuario AND idVaga = $id";
            $resultInscricao= mysqli_query($conexao, $selectInscricao);
            $linha = mysqli_fetch_assoc($resultInscricao);
            // verificar se tem no banco de dados
            if (empty($linha['idUsuario'] )) {
                $idStatus = "n-cadastrado";
            } else {
                $idStatus = "cadastrado";
            }
            // Caso n tenha sido cadastrado
            if ($idStatus == "n-cadastrado") {
                    ?><div class="botao-usuario">
                    <a href="../backend/inscricao.php?idUsuario=<?=$_SESSION['id']?>&idVaga=<?=$id?>">CANDIDATAR-SE</a>
                    </div><?php
            } else { // Caso tenha sido cadastrado
                ?><div class="botao-usuario">
                <p>Você já está cadastrado!</p>
            </div><?php
            }
        // if para a empresa          
        } if ($_SESSION['categoria'] == 'empresa') {
            // se empresa for a mesma logada      
            if ($_SESSION['id'] == $linha['idEmpresa']) {
                ?>
                <div class="usuarios">
                <?php
                    $selectInscricao = "SELECT * from inscricao_vaga WHERE idVaga = $id";
                    $resultInscricao= mysqli_query($conexao, $selectInscricao);
                    // while para pegar id usuario x vaga  
                    while($linha = mysqli_fetch_assoc($resultInscricao))
                    {
                        $idUsuario = $linha['idUsuario'];
                        $selectVaga = "SELECT * from Usuario WHERE id = $idUsuario";
                        $resultVaga = mysqli_query($conexao, $selectVaga);
                        // while para listar usuario 
                            while($linhaVaga = mysqli_fetch_assoc($resultVaga)){
                            ?>
                                <div class="users-info">
                                    <img src="../backend/usuario/<?=$linhaVaga["img"]?>" alt="perfil usuario">
                                    <div>
                                        <h1 class="title-vaga"><?=$linhaVaga["nome"]?></h1>
                                        <a href="ver-perfil.php?id=<?=$linhaVaga['id']?>    " class="link-pefil">VER PERFIL</a>
                                    </div>
                                </div>                      
                            <?php }
                    } ?>
                </div>
                <div class="botao-editar">
                    <a href="../backend/empresa/vaga/editar-vaga.php?id=<?=$id?>">EDITAR</a>
                </div>
                <div class="botao-excluir">
                    <a href="../backend/empresa/vaga/delete.php?id=<?=$id?>">EXCLUIR</a>
                </div>             
                <?php  
            } else {
                ?><div class="botao-usuario">
                <p>Apenas usuarios podem se inscrever.</p>
            </div><?php
            }
        }
    ?>
    <?php require "componente/rodape.php"?>
</body>
</html>


