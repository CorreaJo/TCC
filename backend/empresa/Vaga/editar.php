<?php

require "../conexao.php";

$idVaga = $_POST["id"];
$nome = $_POST['nome'];
$dataExclusao = $_POST["data"];
$descricao = $_POST["descricao"];
$salario = $_POST["salario"];
$idEmpresa = $_POST["idEmpresa"];

$sql= "UPDATE Vaga SET nome = '$nome', dataExclusao = '$dataExclusao', descricao = '$descricao', salario = '$salario', idEmpresa = '$idEmpresa' WHERE id = '$idVaga'";

$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../frontend/index.php');
} else {
    echo "Não foi possível realizar a edição ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}