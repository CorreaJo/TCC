<?php

require "../../conexao.php";

$nome = $_POST["nome"];
$dataExclusao = $_POST["data"];
$descricao = $_POST["descricao"];
$salario = $_POST["salario"];
$idEmpresa = $_POST["idEmpresa"];


$sql= "INSERT INTO Vaga (nome, dataExclusao, descricao, salario, idEmpresa) VALUE ('$nome', '$dataExclusao', '$descricao', '$salario', '$idEmpresa')";

$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../../frontend/index.php');
} else {
    echo "Não foi possível realizar o cadastro ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}