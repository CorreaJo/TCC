<?php

require "../conexao.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST["cpf"];
$telefone = $_POST["tel"];
$endereco = $_POST["endereco"];
$cep = $_POST["cep"];
$cidade = $_POST["cidade"];
$linkedin = $_POST["linkedin"];
$dNasc = $_POST["dNasc"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$sql= "UPDATE usuario SET nome = '$nome', senha = '$senha', telefone = '$telefone', endereco = '$endereco', cep = '$cep', cidade = '$cidade', linkedin = '$linkedin', dNasc = '$dNasc', email = '$email', cpf = '$cpf' WHERE id = '$id'";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../frontend/index.php');
} else {
    echo "Não foi possível realizar a edição ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}