<?php
session_start();    
require "../../../conexao.php";

$id = $_GET['id'];

$select = "SELECT * from habilidade WHERE id = $id";
$result= mysqli_query($conexao, $select);
$linha = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CordWork - Habilidade</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            background-color: black;
        }


        h1 {
            color: white;
            text-align: center;
            font-family: "Poppins", system-ui;
            font-size: 20px;
            margin-top: 30px
        }

        .container {
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 5px 50px;
        }

        label {
            color:white;
            text-transform: uppercase;
            font-family: "Poppins", system-ui;
            word-break: keep-all;
            font-size: 14px;
            font-weight: bolder;
            font-style: italic;
        }

        input {
            width: 250px;
            padding: 5px;
            margin-bottom: 10px;
            border-style: none;
        }

        .botao {
            margin-top: 20px;
            background-color: #642898;
            padding: 5px 50px;
            border-radius: 10px;
            border: none;
            color: white;
            margin-left: auto;
            margin-right: auto;
            display: block;
            font-size: 18px;
            font-family: "Poppins", sans-serif;
        }

        .botao:hover {
            background-color: #b356ff;
        }

       a {
            text-align: center;
            color: white;
            font-family: "Poppins", sans-serif;
            font-style: italic;
        }

    </style>

</head>
<body>
    <h1>EDITAR HABILIDADE:</h1>
<div class="container">
    <form action="editar.php" method="post">
        <label for="nome">Nome do curso:</label><br>
        <input name="nome" type="text" value="<?=$linha['nome']?>">
        <br>
        <label for="empresa">Empresa: </label><br>
        <input name="empresa" value="<?=$linha['empresa']?>" type="text">
        <br>
        <label for="carga">Carga Horária:</label><br>
        <input name="carga" value="<?=$linha['cargaHoraria']?>" type="text">
        <br>
        <input name="id" type="hidden" value="<?=$linha['id']?>"></label>
        <button class="botao">EDITAR</button>
    </form>
</div>
<a href="../../../../frontend/cadastros-extra.php"><p>< Voltar ao cadastro</p></a>
</body>
</html>