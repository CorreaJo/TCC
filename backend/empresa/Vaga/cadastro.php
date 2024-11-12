<?php

require "../../conexao.php";

$funcao = $_POST["funcao"];
$area = $_POST["area"];
$local = $_POST["cidade"];
$periodo = $_POST["periodo"];
$descricao = $_POST["desc"];
$salario = $_POST["salario"];
$dataExclusao = $_POST["data"];
$idEmpresa = $_POST["idEmpresa"];

$sql= "INSERT INTO Vaga (função, area, cidade, periodo, descricao, salario, dataExclusao, idEmpresa) VALUE ('$funcao', '$area', '$local', '$periodo', '$descricao', '$salario', '$dataExclusao', '$idEmpresa')";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../../frontend/empresa.php');
} else {
    echo "Não foi possível realizar o cadastro ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}