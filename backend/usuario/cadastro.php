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


$sql= "INSERT INTO Usuario (nome, senha, email, cpf, telefone, rua, cep, numCasa, cidade, linkedin, dNasc) VALUE ('$nome', '$senha', '$email', '$cpf', '$telefone', '$rua', '$cep', '$numCasa', '$cidade', '$linkedin', '$dNasc')";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../frontend/index.php');
} else {
    echo "Não foi possível realizar o cadastro ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}