<?php
require "../backend/conexao.php";
session_start();

$idUsuario = $_GET["idUsuario"];
$idVaga = $_GET["idVaga"];

$sql= "INSERT INTO inscricao_vaga (idUsuario, idVaga) VALUE ('$idUsuario', '$idVaga')";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../frontend/home.php');
} else {
    echo "Não foi possível realizar o cadastro ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}