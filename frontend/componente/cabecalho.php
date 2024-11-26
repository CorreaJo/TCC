<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<header>
        <div class="menu-close">
            <img src="img/logo.png" alt="">
            <span id="botao-menu" class="material-symbols-outlined" onclick="clickMenu()">menu</span>
        </div>
            <nav id="menu" class="nav-list">
                <ol id="menu-open">
                    <li><a href="home.php">Ínicio</a></li>
                    <?php
                        // verificar se esta logado
                        if(empty($_SESSION["email"]) ) {
                            ?><li><a class="link" href="index.php">Login</a></li><?php
                        } else {
                            if($_SESSION["categoria"] == "usuario") {
                                ?><li><a class="link" href="usuario.php">Portal do Candidato</a></li><?php
                            } else {
                                ?><li><a class="link" href="empresa.php">Portal da Empresa</a></li><?php
                            }
                        }
                    ?>
                    <li><a href="vagas.php">Vagas</a></li>
                    <li><a href="sobre-nos.php ">Sobre Nós</a></li>
                    <li><a href="curso.php">Cursos</a></li>
                    <li><a href="../backend/sair.php" style="color: rgb(192, 1, 1); font-weight: bold; font-style: italic;">Deslogar</a></li>
                </ol>
            </nav>
    </header>
    <script>
        function clickMenu () {
            if (menu.style.display == 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
            }
        }
    </script>