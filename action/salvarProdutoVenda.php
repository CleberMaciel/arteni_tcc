<?php

include '../dao/produtoVendaDAO.php';
include '../includes/conexao.inc.php';
include '../class/produtoVenda.class.php';


$id_prod = $_POST['id_produto_criacao'];
$imagem = "imagem aqui";
$valor = $_POST['valor'];
$observacao = $_POST["observacao"];





$pvDAO = new produtoVendaDAO();
$pv = new produtoVenda("", $imagem, $valor, $observacao, $id_prod);

$pvDAO->cadastrarProdutoVenda($pv);
