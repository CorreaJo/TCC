<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<style>
    footer {
        background-color: #642898;
        margin-top: 50px;
    }

    #h3-rodape {
        color: white;
        margin-left: 20px;
        font-size: 18px;
        padding-top: 30px;
    }

    #menu-rodape {
        margin-left: 20px;
        padding-bottom: 30px;
    }

    ol li .link-rodape {
        color: white;
    }

    #p-rodape {
        color: white;
        text-align: center;
    }

    .rodape2 {
        background-color: #532B77;
        padding: 15px;
        font-size: 15px;
    }

</style>
<footer>
   <div>
    <h3 id="h3-rodape">INFOS</h3>
    <ol id="menu-rodape">
        <li><a class="link-rodape" href="home.php">INICIO</a></li>
        <li><a class="link-rodape" href="vagas.php ">VAGAS</a></li>
        <li><a class="link-rodape" href="curso.php">CURSOS</a></li>
        <li><a class="link-rodape" href="sobre-nos.php">SOBRE NÓS</a></li>
        <?php
                        // verificar se esta logado
                        if(empty($_SESSION["email"]) ) {
                            ?><li><a class="link-rodape" href="index.php">Login</a></li><?php
                        } else {
                            if($_SESSION["categoria"] == "usuario") {
                                ?><li><a class="link-rodape" href="usuario.php">PORTAL DO CANDIDATO</a></li><?php
                            } else {
                                ?><li><a class="link-rodape"href="empresa.php">PORTAL DA EMPRESA</a></li><?php
                            }
                        }
                    ?>
    </ol>
   </div>
   <div class="rodape2">
    <p id="p-rodape">© 2024 Copyright - CordWork</p>
   </div>
</footer>