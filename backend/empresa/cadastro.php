<?php

require "../conexao.php";

$nome = $_POST['nome'];
$cnpj = $_POST["cnpj"];
$telefone = $_POST["tel"];
$cidade = $_POST["cidade"];
$linkedin = $_POST["linkedin"];
$email = $_POST["email"];
$senha = $_POST["senha"];


$sql= "INSERT INTO empresa (nome, senha, email, cnpj, telefone, cidade, linkedin) VALUE ('$nome', '$senha', '$email', '$cnpj', '$telefone', '$cidade', '$linkedin')";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../frontend/index.php');
} else {
    echo "Não foi possível realizar o cadastro ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}