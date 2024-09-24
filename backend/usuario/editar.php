<?php

require "../conexao.php";

$nome = $_POST['nome'];
$cpf = $_POST["cpf"];
$telefone = $_POST["tel"];
$rua = $_POST["rua"];
$cep = $_POST["cep"];
$numCasa = $_POST["numCasa"];
$cidade = $_POST["cidade"];
$linkedin = $_POST["linkedin"];
$dNasc = $_POST["dNasc"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$sql= "UPDATE usuario SET nome = '$nome', senha = '$senha', telefone = '$telefone', rua = '$rua', cep = '$cep', numCasa = '$numCasa', cidade = '$cidade', linkedin = '$linkedin', dNasc = '$dNasc', email = '$email, WHERE cpf = '$cpf'";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../frontend/index.php');
} else {
    echo "Não foi possível realizar a edição ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}