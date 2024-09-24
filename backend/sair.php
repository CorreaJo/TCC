<?php
session_start();
unset($_SESSION["prontuario"]);
unset($_SESSION["senha"]);
unset($_SESSION["nome"]);
session_destroy();

header("location: ../index.html");
?>