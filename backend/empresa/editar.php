<?php

require "../conexao.php";

$nome = $_POST['nome'];
$cnpj = $_POST["cnpj"];
$telefone = $_POST["tel"];
$cidade = $_POST["cidade"];
$linkedin = $_POST["linkedin"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$sql= "UPDATE usuario SET nome = '$nome', senha = '$senha', telefone = '$telefone', rua = '$rua', cidade = '$cidade', linkedin = '$linkedin', email = '$email, WHERE cnpj = '$cnpj'";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../frontend/index.php');
} else {
    echo "Não foi possível realizar a edição ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}