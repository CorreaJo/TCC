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


//CODIGO PRA VISULIZAR AS MEDALHAS

/*<?php
        foreach ($medalhas as $key => $value) {
            ?>
                <img src="../backend/medalha/<?=$value?>" alt="">
                <h2 style="color: white"><?=$key?></h2>
            <?php
        }
    ?>
*/

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/usuario.css">
    <title>CORDWORK - Perfil</title>
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
                            <li><a class="link" href="vagas.php">Vagas</a></li>
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
                    <p><strong>Contato:</strong> <?= $_SESSION["telefone"]?></p>
                    <p><strong>Linkedin:</strong> <?= $_SESSION["linkedin"]?></p>
                    <p><strong>CPF:</strong> <?= $_SESSION["cpf"]?></p>
                    <p><strong>Data de nascimento:</strong> <?= $_SESSION["dNasc"]?></p>
                    <p><strong>Endereço:</strong> <?= $_SESSION["endereco"]?> - <?= $_SESSION["cidade"]?> - <?= $_SESSION["cep"]?></p>  
                </div>
                <a class="botao-editar" href="../backend/usuario/editar-usuario.php">Editar</a>
            </div>
            <?php
                // VERIFICAÇÃO CASO TENHA ALGUM DOS CADASTROS FALTANDO: 
                $idUsuario = $_SESSION['id'];
                $selectHAB = "SELECT * from habilidade WHERE idUsuario = $idUsuario";
                $resultHAB = mysqli_query($conexao, $selectHAB);
                // while pra pegar os id das habilidades
                    while($linhaHAB = mysqli_fetch_assoc($resultHAB)){
                    $idUserHAB = $linhaHAB['idUsuario'];                    
                    }

                $selectEXP = "SELECT * from experiencia WHERE idUsuario = $idUsuario";
                $resultEXP = mysqli_query($conexao, $selectEXP);
                // while pra pegar os id da experiencia
                    while($linhaEXP = mysqli_fetch_assoc($resultEXP)){
                    $idUserEXP = $linhaEXP['idUsuario'];                    
                    }
                ?>
                <div id="background-infos">
                    <div>
                        <h1 class="title-divs black-title">Experiencias Profissionais</h1>
                        <?php if(empty($idUserEXP)) {
                            ?>
                            <h1 class="h1-textVazio">Você não possui experiencias profissionais cadastradas!</h1>
                            <?php
                        } else {
                            $selectEXP2 = "SELECT * from experiencia WHERE idUsuario = $idUsuario";
                            $resultEXP2 = mysqli_query($conexao, $selectEXP2);
                            // while pra pegar os id das habilidades
                            while($linhaEXP2 = mysqli_fetch_assoc($resultEXP2)){
                                ?>
                                <div class="infos-style ">
                                    <div>
                                        <h3><?=$linhaEXP2['funcao']?></h3>
                                        <h3><?=$linhaEXP2['empresa']?></h3>
                                        <h3><?=$linhaEXP2['periodo']?></h3>
                                    </div>
                                    <div class="infos-style-son">
                                        <h3 class="edit"><a href="../backend/usuario/cadastros/experiencias/editar-experiencia.php?id=<?=$linhaEXP2['id']?>">Editar</a></h3>
                                        <h3 class="remove"><a href="../backend/usuario/cadastros/experiencias/excluir-experiencia.php?id=<?=$linhaEXP2['id']?>">Excluir</a></h3>
                                    </div>
                                </div>
                            <?php                   
                        } }?>
                    </div>
                    <div>
                        <h1 class="title-divs black-title">Habilidades Profissionais</h1>
                        <?php if(empty($idUserHAB)) {
                            ?>
                            <h1 class="h1-textVazio">Você não possui habilidades profissionais cadastradas!</h1>
                            <?php
                        } else {
                            $selectHAB2 = "SELECT * from habilidade WHERE idUsuario = $idUsuario";
                            $resultHAB2 = mysqli_query($conexao, $selectHAB2);
                            // while pra pegar os id das habilidades
                            while($linhaHAB2 = mysqli_fetch_assoc($resultHAB2)){
                                ?>
                                <div class="infos-style">
                                    <div>
                                        <h3><?=$linhaHAB2['nome']?></h3>
                                        <h3><?=$linhaHAB2['empresa']?></h3>
                                        <h3><?=$linhaHAB2['cargaHoraria']?> Horas</h3>
                                    </div>
                                    <div class="infos-style-son">
                                        <h3 class="edit"><a href="../backend/usuario/cadastros/habilidade/editar-habilidade.php?id=<?=$linhaHAB2['id']?>">Editar</a></h3>
                                        <h3 class="remove"><a href="../backend/usuario/cadastros/habilidade/excluir-habilidade.php?id=<?=$linhaHAB2['id']?>">Excluir</a></h3>
                                    </div>
                                </div>
                            <?php  
                        }}?>
                    </div>
                    <div>
                        <h1 class="title-divs black-title">Seu Curriculo</h1>
                        <?php if($_SESSION['curriculo'] == "vazio") {
                            ?>
                            <h1 class="h1-textVazio">Você não possui curriculo cadastrado!</h1>
                            <?php
                        } else {
                            $selectCU = "SELECT * from usuario WHERE id = $idUsuario";
                            $resultCU = mysqli_query($conexao, $selectCU);
                            // while pra pegar os id do usuario e curriculo
                            while($linhaCU = mysqli_fetch_assoc($resultCU)){
                                $caminho = $_SESSION['curriculo'];
                                ?>
                                <div class="infos-style">
                                    <div>
                                        <a href="../backend/usuario/cadastros/curriculo/upload/<?=$caminho?>" download="Curriculo <?=$_SESSION['nome']?>.pdf"><h3>BAIXE SEU CURRICULO</h3></a>
                                    </div>
                                    <div class="infos-style-son">
                                        <h3 class="remove"><a href="../backend/usuario/cadastros/curriculo/curriculo-excluir.php">Excluir</a></h3>
                                    </div>
                                </div>
                            <?php                   
                            }
                         }?>
                    </div>
            <?php
                // Caso tenha, aparecer botão cadastros: 
                if (empty($idUserHAB) OR (empty($idUserEXP)) OR $_SESSION['curriculo'] == "vazio") {
                    ?><div class="botao-extra-back">
                        <h1>Você possui etapas pedentes!</h1>
                        <a class="botao-extra" href="cadastros-extra.php">FINALIZAR CADASTRO</a>
                    </div>
                <?php } else {
                    ?><div class="botao-extra-back">
                    <a class="botao-extra" href="cadastros-extra.php">EDITAR CADASTRO</a>
                </div>
            <?php
                }?>
            </div>



            <div>
                <h1 class="title-divs ">Meus Cursos</h1>
            </div>

                <h1 class="title-divs">Vagas Inscritas</h1>
            <div class="vagas-container">
                <?php
                    // vagas cadastradas no usuario
                    $idUsuario = $_SESSION['id'];
                    $selectInscricao = "SELECT * from inscricao_vaga WHERE idUsuario = $idUsuario";
                    $resultInscricao= mysqli_query($conexao, $selectInscricao);
                    // while pra pegar os id da vaga
                    while($linha = mysqli_fetch_assoc($resultInscricao)){
                    $idVaga = $linha['idVaga'];                    
                    $selectVaga = "SELECT * from Vaga WHERE id = $idVaga";
                    $resultVaga = mysqli_query($conexao, $selectVaga);
                        // while para fazer ligação vaga x usuario
                        while($linhaVaga = mysqli_fetch_assoc($resultVaga)){
                            $idEmpresa = $linhaVaga['idEmpresa'];
                            $selectEmpresa = "SELECT * from empresa WHERE id = $idEmpresa";
                            $resultEmpresa = mysqli_query($conexao, $selectEmpresa);
                            $linhaEmpresa = mysqli_fetch_assoc($resultEmpresa)             
                        ?> 
                            <div class="vaga-style">
                                <h1 class="title-vaga"><?=$linhaVaga["função"]?></h1>
                                <hr>
                                <h1 class="info"><?=$linhaEmpresa["nome"]?></h1>
                                <h1 class="info"><?=$linhaVaga["cidade"]?></h1>
                                <h1 class="info periodo"><?=$linhaVaga["periodo"]?></h1>
                                <a class="botao-detalhar" href="../backend/usuario/cancelar-inscricao.php?id=<?=$_SESSION['id']?>&idVaga=<?=$linhaVaga['id']?>">CANCELAR</a>
                            </div>
                        <?php }} ?>
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

    
