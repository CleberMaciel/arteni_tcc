<?php

include "../template/header.php";
if (isset($_POST["acao"])) {
    include '../includes/conexao.inc.php';
    include '../class/produtoCriacao.class.php';
    include '../dao/produtoCriacaoDAO.php';


    $nome = $_POST["nome"];
    $largura = $_POST["largura"];
    $altura = $_POST["altura"];
    $profundidade = $_POST["profundidade"];
    $codigo = $_POST["codigo"];


    $acoes = new produtoCriacaoDAO();


    $produto = new produtoCriacao("", $nome, $largura, $altura, $profundidade, $codigo);
    $acoes->cadastrarProduto($produto);


    header('location:../view/cad_prod_criacao2.php?codigo=' . $codigo);
    include "../template/footer.php";

    //header("../view/cad_prod_criacao2.php");
}


    