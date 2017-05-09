<?php

if (isset($_POST["acoes"])) {
    include "../includes/conexao.inc.php";
    include "../class/usuario.class.php";
    include "../dao/usuarioDAO.php";
    $nome = $_POST["user"];
    $password = $_POST["pass"];

    $usuario = new usuario("", $nome, $password);
    $dao = new usuarioDAO();

    if (($retorno = $dao->validarUsuario($usuario)) == null) {
        header("Location:../index.php");
     
    } else {
        session_start();
       
        $_SESSION["id"] = session_id();
        $_SESSION["tipo_usuario"] = $retorno;
        header("Location:../index.php");
    }
}
    
        