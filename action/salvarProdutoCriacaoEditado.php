<?php

include "../template/header.php";
if (isset($_POST["acao"])) {
    include '../includes/conexao.inc.php';
    include '../class/produtoCriacao.class.php';
    include '../dao/produtoCriacaoDAO.php';


    $codigo = $_POST["id_prod"];
    $nome = $_POST["nome"];
    $largura = $_POST["largura"];
    $altura = $_POST["altura"];
    $profundidade = $_POST["profundidade"];

    echo $codigo;


    $acoes = new produtoCriacaoDAO();
    $prod = new produtoCriacao("", $nome, $largura, $altura, $profundidade, "", "", $codigo);
    $acoes->atualizarProdutoCriacao($prod);
}

include "../template/footer.php";
