<?php

require "../conexao.php";

$nome = $_POST['nome'];
$cpf = $_POST["cpf"];
$telefone = $_POST["tel"];
$cep = $_POST["cep"];
$rua = $_POST["rua"];
$numCasa = $_POST["numCasa"];
$bairro = $_POST["bairro"];
$endereco = $rua . ", " . $numCasa . ", " . $bairro;
$cidade = $_POST["cidade"];
$linkedin = $_POST["linkedin"];
$dNasc = $_POST["dNasc"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$categoria = $_POST["categoria"];
$pcd = $_POST["pcd"];
$curriculo = $_POST["curriculo"];
$escolaridade = $_POST["escolaridade"];


$sql= "INSERT INTO Usuario (nome, senha, email, cpf, telefone, endereco, cep, cidade, linkedin, dNasc, categoria, pcd, escolaridade, curriculo) VALUE ('$nome', '$senha', '$email', '$cpf', '$telefone', '$endereco', '$cep', '$cidade', '$linkedin', '$dNasc','$categoria', '$pcd', '$escolaridade','$curriculo')";
$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../frontend/index.php');
} else {
    echo "Não foi possível realizar o cadastro ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}
 