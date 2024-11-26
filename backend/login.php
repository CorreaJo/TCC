<?php 

require "conexao.php";
session_start();

if(isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['senha'])){

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $select = "SELECT * from usuario WHERE email='$email'";
    $resul = mysqli_query($conexao, $select);
    

    if(mysqli_num_rows($resul) < 1){

        $select = "SELECT * from empresa WHERE email='$email'";
        $resulEmpresa = mysqli_query($conexao, $select);

        $linha = mysqli_fetch_assoc($resulEmpresa);

        if(base64_decode($linha["senha"]) != $senha ){
            $_SESSION["erro"] = "Email ou senha errados!";
            header("location: ../frontend/index.php");
        } else {
            $_SESSION["email"] = $email;
            $_SESSION["nome"] = $linha["nome"];
            $_SESSION["cnpj"] = $linha["cnpj"];
            $_SESSION["telefone"] = $linha["telefone"];
            $_SESSION["cidade"] = $linha["cidade"];
            $_SESSION["linkedin"] = $linha["linkedin"];
            $_SESSION["id"] = $linha["id"];
            $_SESSION["categoria"] = $linha["categoria"];

            header("location: ../frontend/home.php");
        }
            
    } else {

        $linha = mysqli_fetch_assoc($resul);
        if(base64_decode($linha["senha"]) != $senha ){
            $_SESSION["erro"] = "Email ou senha errados!";
            header("location: ../frontend/index.php");
        } else {
            $_SESSION["email"] = $email;
            $_SESSION["categoria"] = $linha["categoria"];
            $_SESSION["nome"] = $linha["nome"];
            $_SESSION["id"] = $linha["id"];
            $_SESSION["cpf"] = $linha["cpf"];
            $_SESSION["telefone"] = $linha["telefone"];
            $_SESSION["cep"] = $linha["cep"];
            $_SESSION["endereco"] = $linha["endereco"];
            $_SESSION["cidade"] = $linha["cidade"];
            $_SESSION["linkedin"] = $linha["cidade"];
            $_SESSION["dNasc"] = $linha["cidade"];
            $_SESSION["curriculo"] = $linha["curriculo"];
        
        header("location: ../frontend/home.php");
        }
        
    }
   
}