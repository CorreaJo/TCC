<?php
session_start();
require "../../conexao.php";

$id = $_GET["id"];

$select = "SELECT * from vaga WHERE id = $id";
$result= mysqli_query($conexao, $select);

$linha = mysqli_fetch_assoc($result)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="editar.php" method="POST">
        <input type="text" name="nome" placeholder="Nome:" value="<?=$linha["nome"]?>">
        <input type="text" name="data" placeholder="Data:" value="<?=$linha["dataExclusao"]?>">
        <textarea name="descricao" id="" ><?=$linha["descricao"]?></textarea>
        <input type="text" name="salario" placeholder="Salario:" value="<?=$linha["salario"]?>">
        <input type="number" name="idEmpresa" value=<?=$_SESSION["id"]?>>
        <button>Editar</button>
    </form>
</body>
</html>