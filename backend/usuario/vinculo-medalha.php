<?php
session_start();

require "../conexao.php";

$nomeMedalha = $_GET["nome"];
$idUsuario = $_SESSION["id"];

$select= "SELECT * from medalha WHERE nome = '$nomeMedalha'";
$result = mysqli_query($conexao, $select);
$linha = mysqli_fetch_assoc($result);

$idMedalha = $linha["id"];

$sql= "INSERT INTO medalha_usuario (idUsuario, idMedalha) VALUE ($idUsuario, $idMedalha)";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../frontend/usuario.php');
} else {
    echo "Não foi possível realizar o cadastro ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}