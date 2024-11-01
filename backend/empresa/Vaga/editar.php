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
$id = $_POST["id"];

$sql= "UPDATE Vaga SET função = '$funcao', area = '$area', cidade = '$local', periodo = '$periodo', descricao = '$descricao', salario = '$salario', dataExclusao = '$dataExclusao', idEmpresa = '$idEmpresa' WHERE id = '$id'";

$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../../frontend/home.php');
} else {
    echo "Não foi possível realizar a edição ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}