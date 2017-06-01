<?php

include "../template/header.php";
if (isset($_POST["acao"])) {
    include '../includes/conexao.inc.php';
    include '../class/produtoCriacao.class.php';
    include '../dao/produtoCriacaoDAO.php';


    $id = $_POST['id_prod'];
    $nome = $_POST["nome"];
    $largura = $_POST["largura"];
    $altura = $_POST["altura"];
    $profundidade = $_POST["profundidade"];




    $acoes = new produtoCriacaoDAO();
    $prod = new produtoCriacao($id, $nome, $largura, $altura, $profundidade, "", "", "");

    $acoes->atualizarProdutoCriacao($prod);
    var_dump($prod);
    include "../template/footer.php";
}


