<?php 

require "conexao.php";
session_start();

if(isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['senha'])){

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $select = "SELECT * from usuario WHERE email='$email' and senha='$senha'";

    $resul = mysqli_query($conexao, $select);
    $linha = mysqli_fetch_assoc($resul);

    if(mysqli_num_rows($resul) < 1){
        unset($_SESSION["email"]);
        unset($_SESSION["senha"]);
        header("location: ../index.html");
    } else {
        $_SESSION["senha"] = $senha;
        $_SESSION["email"] = $email;
        $_SESSION["nome"] = $linha["nome"];
        $_SESSION["cpf"] = $linha["cpf"];
        $_SESSION["telefone"] = $linha["telefone"];
        $_SESSION["rua"] = $linha["rua"];
        $_SESSION["cep"] = $linha["cep"];
        $_SESSION["numCasa"] = $linha["numCasa"];
        $_SESSION["cidade"] = $linha["cidade"];
        $_SESSION["linkedin"] = $linha["linkedin"];
        $_SESSION["dNasc"] = $linha["dNasc"];
        header("location: ../paginaprincipal.php");
    }
   
}

?>