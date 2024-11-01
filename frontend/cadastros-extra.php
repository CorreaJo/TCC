<?php
session_start();    
require "../backend/conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CordWork - Finalizar cadastro</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            background-color: black;
        }

        h1  {
            color: white;   
            text-align: center;
            font-size: 17px;
            margin-top: 20px;
            font-family: "Poppins", system-ui; 
        }

        h2 {
            color: gray;
            font-size: 17px;
            text-align: center;
        }

        .text-h1{
            text-align: left;
        }

        .botao-cadastrar {
            text-align: center;
            color: white;
            background-color: #539239;
            padding: 5px 30px;
            border-radius: 20px;
            text-decoration: none;
            margin-left: 10px;
            font-family: "Poppins", system-ui; 
        }
        
        h3 {
            color: gray;
            font-size: 15px;
            font-family: "Poppins", system-ui;
            margin: 0px
        }

        .infos-style {
            background-color: white;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            gap:70px;
            padding: 10px;
            width: 300px;
            border-radius: 10px 0px 10px 0px;
            margin-bottom: 20px;
        }

        .infos-style-son a{
            text-decoration: none;
        }

        .infos-style-son .edit a{
           color: #642898;
        }

        .infos-style-son .remove a{
            color: rgb(192, 1, 1);
        }

        #voltar {
            color:white;
            font-family: "Poppins", system-ui;
            right: 10px;
            font-style: italic;
            display: inline;
            position: relative;
            text-align: end;
            margin: 0px
        }

        a {
            text-decoration: none;
        }

    </style>
</head>
<body>

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

    <h1>Olá, <?=$_SESSION['nome']?></h1>
    <div>
        <h1 class="text-h1">Habilidades:</h1>
        <?php
            if(empty($idUserHAB)) {
                ?>
                <h2>Você não possui habilidades cadastradas.</h2>
                <a class="botao-cadastrar" href="../backend/usuario/cadastros/habilidade/habilidade.php">CADASTRAR</a>
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
          }
          ?>
            <a class="botao-cadastrar" href="../backend/usuario/cadastros/habilidade/habilidade.php">ADICIONAR +</a>
          <?php
        }        
?>
    </div>
    <div>
        <h1 class="text-h1">Experiencia:</h1>
        <?php
            if(empty($idUserEXP)) {
                ?>
                <h2>Você não possui experiencias cadastradas.</h2>
                <a class="botao-cadastrar" href="../backend/usuario/cadastros/experiencias/experiencia.php">CADASTRAR</a>
                <?php
            } else {
                $selectEXP2 = "SELECT * from experiencia WHERE idUsuario = $idUsuario";
                $resultEXP2 = mysqli_query($conexao, $selectEXP2);
                // while pra pegar os id das habilidades
                while($linhaEXP2 = mysqli_fetch_assoc($resultEXP2)){
                    ?>
                    <div class="infos-style">
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
          }
          ?>
            <a class="botao-cadastrar" href="../backend/usuario/cadastros/experiencias/experiencia.php">ADICIONAR +</a>
          <?php
        }        
?>
    </div>
    <div>
        <h1 class="text-h1">Curriculo:</h1>
        <?php
            if($_SESSION['curriculo'] == 'vazio') {
                ?>
                <h2>Você não possui um curriculo cadastrado.</h2>
                <a class="botao-cadastrar" href="../backend/usuario/cadastros/curriculo/curriculo.php">CADASTRAR</a>
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
          ?>
            <a class="botao-cadastrar" href="../backend/usuario/cadastros/curriculo/curriculo.php">EDITAR ENVIO</a>
          <?php
        }        
?>
    </div>
    <a id="voltar" href="usuario.php"><p>< Voltar ao perfil</p></a>
</body>
</html>