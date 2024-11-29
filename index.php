<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CORDWORK - Login</title>
    <link rel="stylesheet" href="frontend/styles/index.css">
</head>

<body>
    <div class="container">
            <div><img src="frontend/img/img-login.png" alt="imagem de mulher login"></div>
            <div>
                <form action="backend/login.php" method="post">
                    <?php
                        if(isset($_SESSION["erro"])){
                            
                            //mexer no style
                            ?>
                                <h3 style="color: red;"><?=$_SESSION["erro"]?></h3>
                            <?php
                        }
                    ?>
                    
                    <label for="email">Email</label><br>
                    <input type="text" name="email"> 

                    <label for="senha">Senha</label><br>
                    <input type="password" name="senha">  

                    <button class="botao" name="login" type="submit" value="login">ENTRAR</button>
                </form>
            </div>
        <p>Não possui conta? <a href="frontend/escolher.html" id="text-cadastro">Cadastre-se aqui!</a></p>
    </div>
</body>
</html>