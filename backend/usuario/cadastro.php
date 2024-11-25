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
$img = $_POST["img"];


$hashSenha =  base64_encode($_POST["senha"]);


$dir = "uploads/"; 
// recebendo o arquivo multipart 
$img = $_FILES["img"];
// Move o arquivo da pasta temporaria de upload para a pasta de destino 

$nomeImg = "$dir".$img["name"];
if (move_uploaded_file($img["tmp_name"], $nomeImg)) { 
    echo "Arquivo enviado com sucesso!"; 
} 
else { 
    echo "Erro"; 
}    

$categoria = $_POST["categoria"];
$pcd = $_POST["pcd"];
$curriculo = $_POST["curriculo"];
$escolaridade = $_POST["escolaridade"];


$sql= "INSERT INTO Usuario (nome, senha, email, cpf, telefone, endereco, cep, cidade, img, linkedin, dNasc, categoria, pcd, escolaridade, curriculo) VALUE ('$nome', '$hashSenha', '$email', '$cpf', '$telefone', '$endereco', '$cep', '$cidade', '$nomeImg', '$linkedin', '$dNasc','$categoria', '$pcd', '$escolaridade','$curriculo')";

$result= mysqli_query($conexao, $sql);

if($result) {
    header('Location: ../../frontend/index.php');
} else {
    echo "Não foi possível realizar o cadastro ";
    echo "<a href='../index.php'>Voltar a página inicial</a>";
    echo mysqli_error($conexao);
}
 