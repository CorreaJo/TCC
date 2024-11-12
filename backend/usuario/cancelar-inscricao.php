<?php

require "../conexao.php";

$id = $_GET["id"];
$idVaga = $_GET["idVaga"];

echo $id;
echo $idVaga;

$sql= "DELETE FROM inscricao_vaga WHERE idVaga = '$idVaga' AND idUsuario = '$id'";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../frontend/home.php');
} else {
    echo "Não foi possível realizar a edição ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}