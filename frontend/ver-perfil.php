<?php
require "../backend/conexao.php";
session_start();

$id = $_GET["id"];

$select = "SELECT * from Usuario WHERE id = $id";
$result= mysqli_query($conexao, $select);


$selectHAB = "SELECT * from habilidade WHERE idUsuario = $id";
$resultHAB= mysqli_query($conexao, $selectHAB);
// while pra pegar os id da experiencia
while($linhaHAB = mysqli_fetch_assoc($resultHAB)){
    $idUserHAB = $linhaHAB['idUsuario'];
                    
}

$selectEXP = "SELECT * from experiencia WHERE idUsuario = $id";
$resultEXP = mysqli_query($conexao, $selectEXP);
// while pra pegar os id da experiencia
    while($linhaEXP = mysqli_fetch_assoc($resultEXP)){
    $idUserEXP = $linhaEXP['idUsuario'];                    
}


$linha = mysqli_fetch_assoc($result);

$idCurriculo = $linha['curriculo'];
$linhaHAB = mysqli_fetch_assoc($resultHAB);

?>


<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Ver candidato</title>
    <link rel="stylesheet" href="styles/candidatos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>

<?php
    // verificar se esta logado
    if (empty($_SESSION['email'])) {
            ?> <h1 id="h1-error">Voce nao tem permissão!</h1>
                <a id="a-error" href="index.php">Iniciar login!</a><?php
    } else {
        // verifica se for empresa, nao permite
        if ($_SESSION['categoria'] == 'empresa') {
            ?>
            <?php require "componente/cabecalho.php"?>
            <div id="fundo-verde"></div>
            <div id="container-perfil">
                <img class="img-perfil" src="img/perfil.png" alt="foto de perfil">
                <div class="users-info">
                    <h1 id="name"><?= $linha["nome"]?></h1>   
                </div>   
            </div>    
            <div>
            <h1 class="title-divs">Informações Pessoais</h1>
                <div class="barra-title"></div>
                <div class="infos-div">
                    <p><strong>Email:</strong> <?= $linha["email"]?></p>
                    <p><strong>Contato:</strong> <?= $linha["telefone"]?></p>
                    <p><strong>Linkedin:</strong> <?= $linha["linkedin"]?></p>
                    <p><strong>CPF:</strong> <?= $linha["cpf"]?></p>
                    <p><strong>Data de nascimento:</strong> <?= $linha["dNasc"]?></p>
                    <p><strong>Endereço:</strong> <?= $linha["endereco"]?> - <?= $linha["cidade"]?> - <?= $linha["cep"]?></p>  
                </div>
            <div>
                <h1 class="title-divs">Habilidades</h1>
                <div class="barra-title"></div>
                    <?php if(empty($idUserHAB)) {
                        ?>
                        <h1 class="h1-textVazio">O Candidato não possui habilidades profissionais cadastradas!</h1>
                        <?php
                    } else {
                        $selectHAB2 = "SELECT * from habilidade WHERE idUsuario = $id";
                        $resultHAB2 = mysqli_query($conexao, $selectHAB2);
                            // while pra pegar os id das habilidades
                            while($linhaHAB2 = mysqli_fetch_assoc($resultHAB2)){
                                ?>
                                <div class="infos-style">
                                    <div>
                                        <h3 id="title"><?=$linhaHAB2['nome']?></h3>
                                        <h3 id="empresa"><?=$linhaHAB2['empresa']?></h3>
                                        <h3 id="hora"><?=$linhaHAB2['cargaHoraria']?> Horas</h3>
                                    </div>
                                </div>
                                <?php  
                        }
                    }
                    ?>
            </div>
            <div>
                <h1 class="title-divs">Experiencias</h1>
                <div class="barra-title"></div>
                    <?php if(empty($idUserEXP)) {
                        ?>
                        <h1 class="h1-textVazio">O Candidato não possui habilidades profissionais cadastradas!</h1>
                        <?php
                    } else {
                        $selectEXP2 = "SELECT * from experiencia WHERE idUsuario = $id";
                        $resultEXP2 = mysqli_query($conexao, $selectEXP2);
                            // while pra pegar os id das habilidades
                            while($linhaEXP2 = mysqli_fetch_assoc($resultEXP2)){
                                ?>
                                <div class="infos-style">
                                    <div>
                                        <h3 id="title"><?=$linhaEXP2['funcao']?></h3>
                                        <h3 id="empresa"><?=$linhaEXP2['empresa']?></h3>
                                        <h3 id="hora"><?=$linhaEXP2['periodo']?> Horas</h3>
                                    </div>
                                </div>
                                <?php  
                        }
                    }
                    ?>
            </div>
            <div>
                <h1 class="title-divs">Curriculo</h1>
                <div class="barra-title"></div>
                    <?php if($idCurriculo == "vazio") {
                        ?>
                        <h1 class="h1-textVazio">O Candidato não possui habilidades profissionais cadastradas!</h1>
                        <?php
                    } else {
                        $selectCU = "SELECT * from usuario WHERE id = $id";
                        $resultCU = mysqli_query($conexao, $selectCU);
                            // while pra pegar os id do usuario e curriculo
                            while($linhaCU = mysqli_fetch_assoc($resultCU)){
                                $caminho = $linhaCU['curriculo'];
                                ?>
                                <div class="infos-style curriculos">
                                    <div>
                                        <a href="../backend/usuario/cadastros/curriculo/upload/<?=$caminho?>" download="Curriculo <?=$linhaCU['nome']?>.pdf"><h3>BAIXAR CURRICULO > </h3></a>
                                    </div>
                                </div>
                            <?php                   
                            }
                         }?>
            </div>
        <?php
        } else {
        ?> 
            <h1 id="h1-error">Voce nao tem permissão!</h1>
            <a id="a-error" href="home.php">Voltar para a página inicial!</a><?php
        }}?>
        <?php require "componente/rodape.php"?>
</body>
</html>